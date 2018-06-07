<?php
/**
 * Template Name: Doctor List Tmeplate
 */
get_header();
?>
<!-- gd page-doctor-list -->
<div class="main-content">
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="inner-title-wrap">
                        <div class="inner-title">杏林專欄</div>
                        <?php
                        include(locate_template('gdsearchinput.php'));
                        ?>
                    </div>
                    <div style="font-size: 13px; padding: 8px 15px; background-color: #f5f5f5;">
                        <span class="color-orange"><a href="<?php echo get_permalink(get_page_by_path('杏林專欄')); ?>" class="color-orange">全部</a></span>
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'doctor_categories',
                            'hide_empty' => false,
                        ));
                        foreach ($terms as $term) {
                            ?>
                            / <a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a>
                            <?php
                        };
                        ?>
                    </div>
                    <div class="inner-content inner-doctor-list">
                        <div class="row equal">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $query = new WP_Query(array(
                                'post_type' => 'doctor',
                                'posts_per_page' => 12,
                                'order' => 'DESC',
                                'paged' => $paged
                            ));
                            $count = 0;
                            while ($query->have_posts()) {
                                $query->the_post();
                                $terms = get_the_terms(get_the_ID(), 'doctor_categories');
                                ?>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="doctor-list-item">
                                        <div class="doctor-img-wrap">
                                            <a href="<?php echo get_permalink(); ?>"><img class="doctor-img" src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
                                        </div>
                                        <div class="doctor-list-content">
                                            <div class="doctor-name">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <h4><?php echo get_the_title(); ?></h4>
                                                </a>
                                            </div>
                                            <span class="doctor-cate">( <?php echo $terms[0]->name; ?> )</span>
                                        </div>
                                        <div class="gdgd">
                                            <?php
                                            the_content();
                                            ?>
                                            <style>
                                                .doctor-img {
                                                    max-height: 184px;
                                                }
                                                .gdgd div {
                                                    display: none;
                                                }
                                            </style>
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
