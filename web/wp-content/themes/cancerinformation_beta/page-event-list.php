<?php
/**
 * Template Name: Event List Tmeplate
 */
get_header();
?>
<!--gd page-event-list -->
<div class="main-content">
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="inner-title-wrap cancer-inner-title-wrap">
                        <div class="inner-title">城中活動</div>
                        <?php
                        include(locate_template('gdsearchinput.php'));
                        ?>
                    </div>
                    <div style="font-size: 13px; padding: 8px 15px; background-color: #f5f5f5;">
                        <span class="color-orange"><a href="<?php echo get_permalink(get_page_by_path('城中活動')); ?>" class="color-orange">全部</a></span>
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'event_categories',
                        ));
                        foreach ($terms as $term) {
                            if ($term->name == '過往活動花絮') {
                                ?>
                                / <a href="<?php echo get_permalink(get_page_by_path('過往活動花絮')); ?>"><?php echo $term->name; ?></a>
                                <?php
                            } else {
                                ?>
                                / <a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a>
                                <?php
                            }
                        };
                        ?>
                    </div>
                    <div class="inner-content events-list-inner">
                        <div class="row equal">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $query = new WP_Query(array(
                                'post_type' => 'events',
                                'posts_per_page' => 12,
                                'post_status' => 'publish',
                                'paged' => $paged,
                            ));
                            while ($query->have_posts()) {
                                $query->the_post();
                                $thumbnail = get_the_post_thumbnail_url();
                                $term_list = wp_get_post_terms($post->ID, 'event_categories', array('fields' => 'all'));
                                $term_name = array_pop($term_list);
                                ?>
                                <div class="col-sm-6">
                                    <div class="news-list-item-wrap">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4">
                                                <div class="top-left-line"></div>
                                                <div class="news-list-image-wrap"><img src="<?php echo $thumbnail; ?>" class="img-responsive"></div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="event-cate"><?php echo $term_name->name; ?></div>
                                                <a class="event-list-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <div class="event-list-item">開始日期: <?php the_field('start_date'); ?></div>
                                                <div class="event-list-item">結束日期: <?php the_field('end_date'); ?></div>
                                                <div class="event-list-item">地點: <?php the_field('place'); ?></div>
                                                <?php if (get_field('contact')) { ?>
                                                    <div class="event-list-item">報名熱線: <?php the_field('contact'); ?></div>
                                                <?php } ?>
                                                <br/>
                                            </div>
                                        </div>
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
