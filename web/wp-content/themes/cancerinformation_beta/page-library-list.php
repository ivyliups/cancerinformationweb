<?php
/**
 * Template Name: Library List Tmeplate
 */
get_header();
?>
<!-- gd page-library-list -->
<div class="main-content">
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="inner-title-wrap">
                        <div class="inner-title">網上圖書館</div>
                        <div class="breadcrumb">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $query = new WP_Query(array(
                                'post_type' => 'library',
                                'post_status' => 'publish',
                                'posts_per_page' => 12,
                                'paged' => $paged
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="inner-content">
                        <div class="library-wrap">
                            <div class="row">
                                <?php
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    $thumbnail = get_the_post_thumbnail_url();
                                    $file = get_field('file');
                                    $library_file_link = get_field('library_file_link');
                                    ?>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="library-list-item">
                                            <div class="library-list-image">
                                                <?php
                                                if (!empty($file)) {
                                                    ?>
                                                    <a href="<?php echo $file['url']; ?>" target="_blank"><img src="<?php echo $thumbnail; ?>" class="img-responsive" /></a>
                                                    <?php
                                                } elseif (!empty($library_file_link)) {
                                                    ?>
                                                    <a href="<?php echo $library_file_link; ?>" target="_blank"><img src="<?php echo $thumbnail; ?>" class="img-responsive" /></a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="library-list-title">
                                                <?php the_title(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                };
                                wp_reset_query();
                                ?>
                            </div>
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
