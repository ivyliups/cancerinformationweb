<?php

namespace wpai_acf_add_on\acf;

use PMXI_API;
use wpai_acf_add_on\acf\fields\Field;

/**
 * Class ACFService
 * @package wpai_acf_add_on\acf
 */
final class ACFService{

    /**
     * @param $version
     * @return bool
     */
    public static function isACFNewerThan($version) {
        global $acf;
        return version_compare($acf->settings['version'], $version) >= 0;
    }

    /**
     *
     * Set ACF field value
     *
     * @param \wpai_acf_add_on\acf\fields\Field $field
     * @param $pid
     * @param $name
     * @param $value
     */
    public static function update_post_meta(Field $field, $pid, $name, $value) {

        $cf_value = apply_filters('pmxi_acf_custom_field', $value, $pid, $name);

        switch ($field->getImportType()) {
            case 'import_users':
                update_user_meta($pid, $name, $cf_value);
                break;
            case 'taxonomies':
                $option = $field->getTaxonomyType() . '_' . $pid . '_' . $name;
                if (strpos($cf_value, 'field_') === 0 && strpos($name, '_') === 0) {
                    $option = '_' . $field->getTaxonomyType() . '_' . $pid . $name;
                }
                update_option($option, $cf_value);
                update_term_meta($pid, $name, $value);
                break;
            default:
                update_post_meta($pid, $name, $cf_value);
                break;
        }
    }

    /**
     *
     * Get ACF field value
     *
     * @param Field $field
     * @param $pid
     * @param $name
     * @return mixed
     */
    public static function get_post_meta(Field $field, $pid, $name) {
        switch ($field->getImportType()) {
            case 'import_users':
                $value = get_user_meta($pid, $name, TRUE);
                break;
            case 'taxonomies':
                $value = get_option($field->getTaxonomyType() . '_' . $pid . '_' . $name);
                break;
            default:
                $value = get_post_meta($pid, $name, TRUE);
                break;
        }
        return $value;
    }

    /**
     *
     * Assign taxonomy terms with particular post
     *
     * @param $pid
     * @param $assign_taxes
     * @param $tx_name
     * @param bool $logger
     */
    public static function associate_terms($pid, $assign_taxes, $tx_name, $logger = FALSE) {

        global $wpdb;

        $term_ids = wp_get_object_terms( $pid, $tx_name, array( 'fields' => 'ids' ) );

        $assign_taxes = ( is_array( $assign_taxes ) ) ? array_filter( $assign_taxes ) : false;

        if ( ! empty( $term_ids ) && ! is_wp_error( $term_ids ) ) {
            $in_tt_ids = "'" . implode( "', '", $term_ids ) . "'";
            $wpdb->query( "UPDATE {$wpdb->term_taxonomy} SET count = count - 1 WHERE term_taxonomy_id IN ($in_tt_ids) AND count > 0" );
            $wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->term_relationships} WHERE object_id = %d AND term_taxonomy_id IN ($in_tt_ids)", $pid ) );
        }

        if ( empty( $assign_taxes ) ) return;

        $values     = array();
        $term_order = 0;

        $term_ids = array();
        foreach ( $assign_taxes as $tt ) {
            do_action( 'wp_all_import_associate_term', $pid, $tt, $tx_name );
            $values[] = $wpdb->prepare( "(%d, %d, %d)", $pid, $tt, ++ $term_order );
            $term_ids[] = $tt;
        }

        $in_tt_ids = "'" . implode("', '", $term_ids) . "'";
        $wpdb->query("UPDATE {$wpdb->term_taxonomy} SET count = count + 1 WHERE term_taxonomy_id IN ($in_tt_ids)");

        if ( $values ) {
            if ( false === $wpdb->query( "INSERT INTO {$wpdb->term_relationships} (object_id, term_taxonomy_id, term_order) VALUES " . join( ',', $values ) . " ON DUPLICATE KEY UPDATE term_order = VALUES(term_order)" ) ) {
                $logger and call_user_func( $logger, __( '<b>ERROR</b> Could not insert term relationship into the database', 'wp_all_import_plugin' ) . ': ' . $wpdb->last_error );
            }
        }

        wp_cache_delete( $pid, $tx_name . '_relationships' );
    }

    /**
     * @param $img_url
     * @param $pid
     * @param $logger
     * @param bool $search_in_gallery
     * @return bool|int|\WP_Error
     */
    public static function import_image($img_url, $pid, $logger, $search_in_gallery = FALSE) {

        // search image attachment by ID
        if ($search_in_gallery and is_numeric($img_url)) {
            if (wp_get_attachment_url($img_url)) {
                return $img_url;
            }
        }

        return PMXI_API::upload_image($pid, $img_url, "yes", $logger, true);
    }

    /**
     * @param $atch_url
     * @param $pid
     * @param $logger
     * @param bool $fast
     * @param bool $search_in_gallery
     * @return bool|int|\WP_Error
     */
    public static function import_file($atch_url, $pid, $logger, $fast = FALSE, $search_in_gallery = FALSE) {

        // search file attachment by ID
        if ($search_in_gallery and is_numeric($atch_url)) {
            if (wp_get_attachment_url($atch_url)) {
                return $atch_url;
            }
        }

        return PMXI_API::upload_image($pid, $atch_url, "yes", $logger, true, "", "files");
    }

    /**
     * @param $values
     * @param array $post_types
     * @return array
     */
    public static function get_posts_by_relationship($values, $post_types = array()){
        global $wpdb;
        $post_ids = array();
        foreach ($values as $ev) {
            $relation = false;
            if (ctype_digit($ev)) {
                $relation = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->posts} WHERE ID = %s", $ev));
            }
            if (empty($relation)){
                if (empty($post_types)){
                    $sql = "SELECT * FROM {$wpdb->posts} WHERE post_type != %s AND ( post_title = %s OR post_name = %s )";
                    $relation = $wpdb->get_row($wpdb->prepare($sql, 'revision', $ev, sanitize_title_for_query($ev)));
                }
                else{
                    $sql = "SELECT * FROM {$wpdb->posts} WHERE post_type IN ('%s') AND ( post_title = %s OR post_name = %s )";
                    $relation = $wpdb->get_row($wpdb->prepare($sql, implode("','", $post_types), $ev, sanitize_title_for_query($ev)));
                }
            }
            if ($relation) {
                $post_ids[] = (string) $relation->ID;
            }
        }
        return $post_ids;
    }
}