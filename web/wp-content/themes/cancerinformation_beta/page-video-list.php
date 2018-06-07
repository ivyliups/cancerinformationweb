<?php
/**
 * Template Name: Video List Tmeplate
 */
get_header();
?>
<!--gd page-video-list -->
<div class="main-content">
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="inner-title-wrap">
                        <div class="inner-title">節目重溫</div>
                        <?php
                        include(locate_template('gdsearchinput.php'));
                        ?>
                    </div>
                    <div style="font-size: 13px; padding: 8px 15px; background-color: #f5f5f5;">
                        <span class="color-orange"><a href="<?php echo get_permalink(get_page_by_path('節目重溫')); ?>" class="color-orange">全部</a></span>
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'video_categories',
                            'hide_empty' => false,
                        ));
                        foreach ($terms as $term) {
                            ?>
                            / <a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a>
                            <?php
                        };
                        ?>
                    </div>
                    <div class="inner-content video-inner-content">
                        <div class="row equal">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'video',
                                'posts_per_page' => 12,
                                'paged' => $paged,
                            );
                            $query = new WP_Query($args);
                            while ($query->have_posts()) {
                                $query->the_post();
                                $term_list = wp_get_post_terms($post->ID, "video_categories", array('fields' => 'all'));
                        foreach ($term_list as $term) {
                            $a[] = $term->name;
                        }
                                $term_name = array_pop($term_list);
                                ?>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="video-list-video">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <img src="http://img.youtube.com/vi/<?php the_field('video_link'); ?>/hqdefault.jpg"/>
                                        </a>
                                    </div>
                                    <div class="video-list-cate">
                                        <?php echo $term_name->name; ?>
                                    </div>
                                    <div class="video-list-title">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            };
                            wp_reset_query();
                            ?>
                            <div class="col-xs-12 text-right">
                                <ul class="pagination pagination-sm">
                                    <?php
                                    pagination($query->max_num_pages);
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include(locate_template('gdsidebar.php'));
                ?>
            </div>
        </div>
    </div>
    <?php
    include(locate_template('gdfooterhot.php'));
    ?>
</div>
<?php
get_footer();
