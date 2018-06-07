<?php
get_header();
?>
<!--gd taxonomy-video_categories -->
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
                            if (get_queried_object()->name === $term->name) {
                                ?>
                                / <a href="<?php echo get_term_link($term->term_id); ?>">
                                    <span style="color: #99CC32;">
                                        <?php echo $term->name; ?>
                                    </span>
                                </a>
                                <?php
                            } else {
                                ?>
                                / <a href="<?php echo get_term_link($term->term_id); ?>">
                                    <?php echo $term->name; ?>
                                </a>
                                <?php
                            }
                        };
                        ?>
                    </div>
                    <div class="inner-content">
                        <div class="row" style="display: flex; flex-wrap: wrap;">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $query = new WP_Query(array(
                                'post_type' => 'video',
                                'post_status' => 'publish',
                                'posts_per_page' => 12,
                                'paged' => $paged,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'video_categories',
                                        'field' => 'slug',
                                        'terms' => get_queried_object()->slug,
                                    )
                                )
                            ));
                            while ($query->have_posts()) {
                                $query->the_post();
                                ?>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="video-list-video">
                                        <a href="<?php echo get_permalink(); ?>"><img src="http://img.youtube.com/vi/<?php the_field('video_link'); ?>/hqdefault.jpg"/></a>
                                    </div>
                                    <div class="video-list-title">
                                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                </div>
                                <?php
                            };
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 text-right">
                        <ul class="pagination pagination-sm">
                            <?php
                            pagination($query->max_num_pages);
                            ?>
                        </ul>
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
