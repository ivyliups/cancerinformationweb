<?php
/**
 * Template Name: Tags
 */
get_header();
?>
<div class="main-content">
    <div class="inner-page">
        <!--tag inner -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <div class="inner-title-wrap">
                        <div class="inner-title">"<?php echo get_query_var('tag'); ?>"的相關文章</div>
                        <div class="breadcrumb">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $query = new WP_Query(array(
                                'post_type' => 'any',
                                'post_status' => 'publish',
                                'posts_per_page' => 10,
                                'tag' => get_query_var('tag'),
                                'paged' => $paged
                            ));
                            ?>
                            <span >共 <?php echo $query->post_count; ?> 則"<?php echo get_query_var('tag'); ?>"的相關文章</span>
                        </div>
                        <div class="search-input">
                            <?php
                            include(locate_template('template-parts/content-search-input.php'));
                            ?>
                        </div>
                    </div>
                    <div class="inner-content">
                        <div class="div">
                            <?php
                            while ($query->have_posts()) {
                                $query->the_post();
                                $thumbnail = get_the_post_thumbnail_url();
                                ?>
                                <div class="news-list-item-wrap">
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-2">
                                            <div class="top-left-line"></div>
                                            <div class="news-list-image-wrap"><img src="<?php echo $thumbnail; ?>" class="img-responsive"></div>
                                        </div>
                                        <div class="col-xs-9 col-sm-10">
                                            <a class="news-list-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <div class="news-list-date"><?php echo get_the_date('d-m-Y'); ?></div>
                                            <div class="doctor-article">
                                                <?php the_excerpt_max_charlength(120); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            };
                            ?>
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <nav aria-label="...">
                                        <ul class="pagination pagination-sm">
                                            <?php
                                            if (function_exists("pagination")) {
                                                pagination($query->max_num_pages);
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
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
        <!--tag inner end-->
    </div>
    <div class="inner-foo">
        <?php get_template_part('template-parts/content-footer', 'topic'); ?>
    </div>
</div>
<?php
get_footer();
