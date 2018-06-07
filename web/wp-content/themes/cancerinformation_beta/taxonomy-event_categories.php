<?php get_header(); ?>
<div class="main-content">
    <div class="inner-page">
        <!--taxonomy-event_categories inner -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <div class="inner-title-wrap cancer-inner-title-wrap">
                        <div class="inner-title">城中活動</div>
                        <div class="breadcrumb">
                            <span class="color-orange"><a href="<?php echo get_permalink(get_page_by_path('城中活動')); ?>" class="color-orange">全部</a></span>
                            <?php
                            $queried_object = get_queried_object();
                            ?>
                            / <?php echo $queried_object->name; ?>
                        </div>
                        <?php
                        include(locate_template('gdsearchinput.php'));
                        ?> 
                    </div>
                    <div class="row hidden">
                        <div class="col-xs-12 text-right">
                            <nav aria-label="...">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="inner-content events-list-inner">
                        <div class="row equal">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $query = new WP_Query(array(
                                'post_type' => 'events',
                                'post_status' => 'publish',
                                'posts_per_page' => 12,
                                'paged' => $paged,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => $taxonomy,
                                        'field' => 'slug',
                                        'terms' => get_queried_object()->slug,
                                    )
                                )
                            ));
                            while ($query->have_posts()) {
                                $query->the_post();
                                $thumbnail = get_the_post_thumbnail_url();
                                ?>
                                <div class="col-sm-6">
                                    <div class="news-list-item-wrap">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4">
                                                <div class="top-left-line"></div>
                                                <div class="news-list-image-wrap"><img src="<?php echo $thumbnail; ?>" class="img-responsive"></div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
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
                            ?>
                            <div class="col-xs-12 text-center">
                                <ul class="pagination pagination-sm">
                                    <?php
                                    pagination($query->max_num_pages);
                                    ?>
                                </ul>
                            </div>
                            <?php
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <?php get_template_part('template-parts/content-ad', 'items'); ?>
                    <br/>
                    <?php get_template_part('template-parts/content-hot', 'topic'); ?>
                    <br/>
                    <?php get_template_part('template-parts/content-hot', 'question'); ?>
                    <br/>
                    <?php get_template_part('template-parts/content-hot', 'member'); ?>
                    <br/>
                </div>
            </div>
        </div>
        <!--taxonomy-event_categories inner end-->
    </div>
    <div class="inner-foo">
        <?php get_template_part('template-parts/content-footer', 'topic'); ?>
    </div>
</div>
<?php
get_footer();
