<?php
/**
 * Template Name: Media List Tmeplate
 */
get_header();
?>
<!-- gd page-news-list -->
<div class="main-content">
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="inner-title-wrap">
                        <div class="inner-title">傳媒專區</div>
                        <div class="breadcrumb">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $query = new WP_Query(array(
                                'post_type' => 'article',
                                'post_status' => 'publish',
                                'posts_per_page' => 12,
                                'paged' => $paged
                            ));
                            ?>
                        </div>
                        <div class="search-input">
                            <?php
                            include(locate_template('gdsearchinput.php'));
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
                            <?php
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
