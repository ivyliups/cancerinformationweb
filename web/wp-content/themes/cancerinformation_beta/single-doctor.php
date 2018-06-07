<?php
/**
 * Template Name: Doctor Detail Tmeplate
 */
get_header();
?>
<div class="main-content">
    <div class="inner-page">
        <!--single-doctor inner -->
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
                            if (get_the_terms(get_the_ID(), 'doctor_categories')[0]->name === $term->name) {
                                ?>
                                / <a href="<?php echo get_term_link($term->term_id); ?>"><span style="color: #99CC32;"><?php echo $term->name; ?></span></a>
                                <?php
                            } else {
                                ?>
                                / <a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a>
                                <?php
                            }
                        };
                        ?>
                    </div>
                    <div class="doctor-list-item-detail">
                        <div class="doctor-detail-wrap">
                            <div class="doctor-detail-left">
                                <img class="doctor-img" src="<?php echo get_the_post_thumbnail_url(); ?>">
                            </div>
                            <div class="doctor-detail-right">
                                <div class="doctor-list-content">
                                    <div class="doctor-name"><h4><?php echo get_the_title(); ?></h4></div>
                                    <span class="doctor-cate">( <?php echo get_the_terms(get_the_ID(), 'doctor_categories')[0]->name; ?> )</span>
                                </div>
                                <div>
                                    <?php
                                    echo '<pre class="gdpre">' . get_queried_object()->post_content . '</pre>';
                                    ?>
                                    <style>
                                        .gdpre {
                                            background: transparent;
                                            padding: 0px;
                                            margin: 0px;
                                            border: none;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <?php
                    $obj_thubmbail = get_the_post_thumbnail_url();
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                    ));
                    while ($query->have_posts()) {
                        $query->the_post();
                        $queried_object = get_queried_object();
                        $people = get_field('doctor');
                        if ($people) {
                            foreach ($people as $person) {
                                if (get_post($person)->post_title === $queried_object->post_title) {
                                    ?>
                                    <ul class="doctor-article-list">
                                        <li>
                                            <div class="row" style="display: flex; padding: 0 15px;">
                                                <div style="min-width: 45px; max-width: 45px; margin-right: 30px;">
                                                    <div class="author-doctor-wrap">
                                                        <div class="author-doctor-wrap-image">
                                                            <div class="arrow-right"></div>
                                                            <img class="img-responsive" src="<?php echo $obj_thubmbail; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="<?php echo the_permalink(); ?>" class="under-line-none">
                                                            <ul class="doctor-article-item">
                                                                <li>
                                                                    <span class="color-link doctor-article-name"><?php echo get_the_title($person->ID); ?></span><br/>
                                                                    <span class="date doctor-article-date"><?php echo get_the_date('d-m-Y'); ?></span>
                                                                    <div class="doctor-article">
                                                                        <?php
                                                                        $content = get_the_content($person->ID);
                                                                        $content = strip_tags($content);
                                                                        echo substr($content, 0, 220);
                                                                        ?>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <?php
                                }
                            }
                        }
                    };
                    wp_reset_query();
                    ?>
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
