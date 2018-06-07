<?php

/**
 * cancerinformation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cancerinformation
 */
if (!function_exists('cancerinformation_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cancerinformation_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on cancerinformation, use a find and replace
         * to change 'cancerinformation' to the name of your theme in all the template files.
         */
        load_theme_textdomain('cancerinformation', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'cancerinformation'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('cancerinformation_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }

endif;
add_action('after_setup_theme', 'cancerinformation_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cancerinformation_content_width() {
    $GLOBALS['content_width'] = apply_filters('cancerinformation_content_width', 640);
}

add_action('after_setup_theme', 'cancerinformation_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cancerinformation_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'cancerinformation'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'cancerinformation'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'cancerinformation_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cancerinformation_scripts() {
    wp_enqueue_style('plugins-style', get_stylesheet_directory_uri() . '/assets/styles/plugins-css.css', array(), filemtime(get_stylesheet_directory() . '/assets/styles/plugins-css.css'));
    wp_enqueue_style('shortcodes-style', get_stylesheet_directory_uri() . '/assets/styles/shortcodes/shortcodes.css', array(), filemtime(get_stylesheet_directory() . '/assets/styles/shortcodes/shortcodes.css'));

    wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css');
    wp_enqueue_style('slick-theme-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css');
    wp_enqueue_style('light-slider-style', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css');

    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/styles/style.css'));
    wp_enqueue_style('responsive-style', get_stylesheet_directory_uri() . '/assets/styles/responsive.css', array(), filemtime(get_stylesheet_directory() . '/assets/styles/responsive.css'));


    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-1.12.4.min.js', array(), '20180102', true);
    wp_enqueue_script('jquery-plugin', get_template_directory_uri() . '/assets/js/plugins-jquery.js', array(), '20180102', true);
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js', array(), '20171215', true);
//  wp_enqueue_script( 'light-slider-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js', array(), '20171215', true );
    wp_enqueue_script('stellarnav-js', get_template_directory_uri() . '/js/stellarnav.js', array(), '20171215', true);

    wp_enqueue_script('cancerinformation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('cancerinformation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_enqueue_script('customizer', get_template_directory_uri() . '/js/customizer.js?v=2-4', array(), '20180508', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'cancerinformation_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Diable admin bar on frontend
 */
show_admin_bar(false);

/**
 * Custom Menu
 */
function register_my_menus() {
    register_nav_menus(
            array(
                'header-menu' => __('Header Menu'),
                'footer-menu' => __('Footer Menu'),
                'footer-menu-2' => __('Footer Menu Col 2'),
                'footer-bottom-menu' => __('Footer Bottom Menu '),
                'extra-menu' => __('Extra Menu')
            )
    );
}

add_action('init', 'register_my_menus');

class custom_nav_walker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . $item->title . '-menu"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

/**
 * Search post only
 */
// function wpb_search_filter($query) {
// if ($query->is_search) {
//   $query->set('post_type', 'post');
// }
// return $query;
// }
// add_filter('pre_get_posts','wpb_search_filter');

/**
 * Optional Fields
 */
if (function_exists('acf_add_options_page')) {
    /**
     * ADS Group
     */
    acf_add_options_page(array(
        'page_title' => 'Theme Aside Ads',
        'menu_title' => 'Aside Ads',
        'menu_slug' => 'theme-aside-ads',
        'capability' => 'edit_posts',
        'redirect' => false,
            // 'parent_slug'	=> 'ADs',
    ));

    acf_add_options_page(array(
        'page_title' => 'Theme Header Ads',
        'menu_title' => 'Header Ads',
        'menu_slug' => 'theme-header-ads',
        'capability' => 'edit_posts',
        'redirect' => false,
            // 'parent_slug'	=> 'ADs',
    ));

    // acf_add_options_page(array(
    // 	'page_title' 	=> 'ADs',
    // 	'menu_title'	=> 'ADs',
    // 	'menu_slug' 	=> 'ADs',
    // ));
    /**
     * Footer Group
     */
    // acf_add_options_page(array(
    // 	'page_title' 	=> 'Contact Info',
    // 	'menu_title'	=> 'Header Ads',
    // 	'menu_slug' 	=> 'contact_info',
    //   'redirect'		=> false,
    //   'parent_slug'	=> 'footer_content',
    // ));

    acf_add_options_page(array(
        'page_title' => 'Footer Content',
        'menu_title' => 'Footer Content',
        'menu_slug' => 'footer_content',
    ));
    /**
     * Social media group
     */
    acf_add_options_page(array(
        'page_title' => 'Social Media',
        'menu_title' => 'Social Media',
        'menu_slug' => 'social_link',
    ));

    acf_add_options_page(array(
        'page_title' => 'Facebook',
        'menu_title' => 'Facebook',
        'menu_slug' => 'facebook',
        'redirect' => false,
        'parent_slug' => 'social_link',
    ));

    acf_add_options_page(array(
        'page_title' => 'Youtube',
        'menu_title' => 'Youtube',
        'menu_slug' => 'Youtube',
        'redirect' => false,
        'parent_slug' => 'social_link',
    ));

    acf_add_options_page(array(
        'page_title' => 'Instagram',
        'menu_title' => 'Instagram',
        'menu_slug' => 'Instagram',
        'redirect' => false,
        'parent_slug' => 'social_link',
    ));
	
	  /**
   * Side content group
  */

  acf_add_options_page(array(
		'page_title' 	=> 'Aside QA',
		'menu_title'	=> 'Aside QA',
		'menu_slug' 	=> 'aside-qa',
    'redirect'		=> false,
  ));

  acf_add_options_page(array(
		'page_title' 	=> 'Aside Member',
		'menu_title'	=> 'Aside Member',
		'menu_slug' 	=> 'aside-member',
    'redirect'		=> false,
  ));
}

/**
 * Pagination
 */
function pagination($pages = '', $range = 4) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class=\"pagination\"><li class='page-item'><span>第 " . $paged . " / " . $pages . " 頁</span></li>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li class='page-item'><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li class='page-item'><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; </a></li>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li class=\"page-item\"><a href='" . get_pagenum_link($i) . "' class=\"current-page\">" . $i . "</a></li>" : "<li class=\"page-item\"><a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li class='page-item'><a href=\"" . get_pagenum_link($paged + 1) . "\"> &rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li class='page-item'><a href='" . get_pagenum_link($pages) . "'> &raquo;</a></li>";
        echo "</div>\n";
    }
}

/**
 * get page url by template name
 */
function get_page_url($template_name) {
    $pages = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => [
                [
                'key' => '_wp_page_template',
                'value' => $template_name . '.php',
                'compare' => '='
            ]
        ]
    ]);
    if (!empty($pages)) {
        foreach ($pages as $pages__value) {
            return get_permalink($pages__value->ID);
        }
    }
    return get_bloginfo('url');
}

function add_iframe($initArray) {
    $initArray['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
    return $initArray;
}

// this function alters the way the WordPress editor filters your code
add_filter('tiny_mce_before_init', 'add_iframe');

function wpb_image_editor_default_to_gd($editors) {
    $gd_editor = 'WP_Image_Editor_GD';
    $editors = array_diff($editors, array($gd_editor));
    array_unshift($editors, $gd_editor);
    return $editors;
}

add_filter('wp_image_editors', 'wpb_image_editor_default_to_gd');

// add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
// /**
//  * This function modifies the main WordPress query to include an array of 
//  * post types instead of the default 'post' post type.
//  *
//  * @param object $query  The original query.
//  * @return object $query The amended query.
//  */
// function tgm_io_cpt_search( $query ) {
//     if ( $query->is_search ) {
// 	    $query->set( 'post_type', array( 'post', 'video', 'doctor', 'portfolio' ) );
//     }
//     return $query;
// }

function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
        if ($excut < 0) {
            echo mb_substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo '[...]';
    } else {
        echo $excerpt;
    }
}

function gdcontent1() {
	$content = get_the_content();
	return $content;
}
function gdcontent2($content) {
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	echo $content;
}
function gdtags() {
    return get_the_tag_list();
}