<?php
/**
 * Article Single Cate Tmeplate
 */
get_header();
?>
<!-- gd category -->
<div class="main-content">
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="inner-title-wrap">
                        <div class="inner-title">文章</div>
                        <?php
                        include(locate_template('gdsearchinput.php'));
                        ?>
                    </div>
                    <div style="font-size: 13px; padding: 8px 15px; background-color: #f5f5f5;">
                        <span class="color-orange"><a class="color-inherit" href="<?php echo get_permalink(get_page_by_path('文章')); ?>">全部</a></span>
                        / <span><?php echo get_queried_object()->name; ?></span>
                    </div>
                    <div class="inner-content">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $query = new WP_Query(array(
                            'category_name' => get_queried_object()->slug,
                            'post_status' => 'publish',
                            'posts_per_page' => 12,
                            'paged' => $paged,
                        ));
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="news-list-item-wrap">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="top-left-line"></div>
                                        <div class="search-list-wrap">
                                            <a class="search-list-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <div class="search-article">
                                                <?php the_excerpt_max_charlength(120); ?>
                                            </div>
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
