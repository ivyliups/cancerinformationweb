<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cancerinformation
 */
get_header();
?>
<!-- gd front-page -->
<div class="main-content">
    <div class="main-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <div class="main-gallery-wrap">
                        <?php
                        $images = get_field('main_gallery');
                        if ($images) {
                            ?>
                            <ul id="imageGallery">
                                <?php
                                foreach ($images as $image) {
                                    ?>
                                    <li data-thumb="<?php echo $image['url']; ?>" data-src="<?php echo $image['url']; ?>">
                                        <a href="<?php echo $image['caption']; ?>" target="_blank">
                                            <img src="<?php echo $image['url']; ?>" />
                                        </a>
                                    </li>
                                    <?php
                                };
                                ?>
                            </ul>
                            <?php
                        };
                        ?>
                    </div>
                </div>
                <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
                <div class="col-xs-12 col-sm-3">
                    <div style="margin-bottom: 15px;">
                        <a data-fancybox href="<?php echo get_field('ad_link', 'option'); ?>">
                            <img style="width: 100%;" src="<?php echo get_field('Ad', 'option')['url']; ?>"/>
                        </a>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <a data-fancybox href="<?php echo get_field('ad_link_2', 'option'); ?>">
                            <img style="width: 100%;" src="<?php echo get_field('Ad_2', 'option')['url']; ?>"/>
                        </a>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <a data-fancybox href="<?php echo get_field('ad_link_3', 'option'); ?>">
                            <img style="width: 100%;" src="<?php echo get_field('Ad_3', 'option')['url']; ?>"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-news-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <a style="text-decoration: none;" href="<?php echo get_permalink(get_page_by_path('文章')); ?>">
                        <h4 class="title">最新文章</h4>
                    </a>
                    <div class="gdfp">
                        <a href="<?php echo get_object_vars(get_field('new1'))['guid']; ?>">
                            <?php echo get_object_vars(get_field('new1'))['post_title']; ?>
                        </a>
                    </div>
                    <div class="gdfp">
                        <a href="<?php echo get_object_vars(get_field('new2'))['guid']; ?>">
                            <?php echo get_object_vars(get_field('new2'))['post_title']; ?>
                        </a>
                    </div>
                    <div class="gdfp">
                        <a href="<?php echo get_object_vars(get_field('new3'))['guid']; ?>">
                            <?php echo get_object_vars(get_field('new3'))['post_title']; ?>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a style="text-decoration: none;" href="<?php echo get_permalink(get_page_by_path('文章')); ?>">
                        <h4 class="title">熱門文章</h4>
                    </a>
                    <div class="gdfp">
                        <a href="<?php echo get_object_vars(get_field('hot1'))['guid']; ?>">
                            <?php echo get_object_vars(get_field('hot1'))['post_title']; ?>
                        </a>
                    </div>
                    <div class="gdfp">
                        <a href="<?php echo get_object_vars(get_field('hot2'))['guid']; ?>">
                            <?php echo get_object_vars(get_field('hot2'))['post_title']; ?>
                        </a>
                    </div>
                    <div class="gdfp">
                        <a href="<?php echo get_object_vars(get_field('hot3'))['guid']; ?>">
                            <?php echo get_object_vars(get_field('hot3'))['post_title']; ?>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="video-responsive">
                        <?php the_field('video_full_link', get_object_vars(get_field('video'))['ID']); ?>
                    </div>
                </div>
                <style>
                    .gdfp {
                        padding: 10px 0px;
                        font-size: 15px;
                        line-height: 15px;
                        border-top: 1px solid #dadada;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
    </div>
    <div class="cate-page-section ">
        <div class="container">
            <h4 class="section-title">分頁專區 <i class="fa fa-chevron-right" aria-hidden="true"></i></h4>
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center gallery-division">
                        <?php
                        $images = get_field('main_gallery_a');
                        $myBanner = ['Immunotherapy' => 'http://cancerinformation.com.hk/immunotherapy/',
                            'Immunonutrition' => 'http://www.cancerinformation.com.hk/cancer_sub_new.php?nid=6',
                            'breast_canacer' => 'http://www.cancerinformation.com.hk/cancer_sub_new.php?nid=1',
                            'breast_cancer_2' => 'http://www.cancerinformation.com.hk/banner_redirect.php?id=153',
                            'keep the moment' => 'http://www.cancerinformation.com.hk/banner_redirect.php?id=13'
                        ];
                        if ($images):
                            ?>
                            <ul id="imageGalleryA">
                                <?php
                                foreach ($images as $image):
                                    $aurl = '#';
                                    $bannerKey = $image['title'];
                                    if (array_key_exists($bannerKey, $myBanner)) {
                                        $aurl = $myBanner[$bannerKey];
                                    }
                                    ?>
                                    <li data-thumb="<?php echo $image['url']; ?>" data-src="<?php echo $image['url']; ?>">
                                        <a href="<?= $aurl ?>" target="_blank">
                                            <img src="<?php echo $image['url']; ?>" />
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="article-page-section ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <div>
                        <h4 class="section-title article-title article-title-inline"><a href="<?php echo get_permalink(get_page_by_path('杏林專欄')); ?>" class="color-inherit">杏林專欄</a> <i class="fa fa-chevron-right" aria-hidden="true"></i></h4>
                        <ul class="display-inline cate-mini-list">
                            <li>全部</li>
                            <?php
                            $post_type = 'doctor';
                            $count = 0;
                            $taxonomies = get_object_taxonomies(array('post_type' => $post_type));
                            foreach ($taxonomies as $taxonomy) {
                                $terms = get_terms(array(
                                    'taxonomy' => $taxonomy,
                                    'hide_empty' => false,
                                ));
                                foreach ($terms as $term) {
                                    $count++;
                                    if ($count < 16) {
                                        ?>
                                        <li><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a></li>
                                        <?php
                                    }
                                    $args = array(
                                        'post_type' => $post_type,
                                        'posts_per_page' => -1,
                                        'post_parent' => 0,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => $taxonomy,
                                                'field' => 'slug',
                                                'terms' => $term->slug,
                                            )
                                        )
                                    );
                                    $posts = new WP_Query($args);
                                };
                            };
                            ?>
                        </ul>
                    </div>
                    <div class="article-list-wrap">
                        <div class="row min-pad equal">
                            <?php
                            $query = new WP_Query(array(
                                'p' => get_object_vars(get_field('hot1'))['ID'],
                            ));
                            $query->the_post();
                            get_template_part('template-parts/content-frontpage', 'doctor');
                            wp_reset_query();
                            $query = new WP_Query(array(
                                'p' => get_object_vars(get_field('hot2'))['ID'],
                            ));
                            $query->the_post();
                            get_template_part('template-parts/content-frontpage', 'doctor');
                            wp_reset_query();
                            $query = new WP_Query(array(
                                'p' => get_object_vars(get_field('hot3'))['ID'],
                            ));
                            $query->the_post();
                            get_template_part('template-parts/content-frontpage', 'doctor');
                            wp_reset_query();
                            $query = new WP_Query(array(
                                'p' => get_object_vars(get_field('hot4'))['ID'],
                            ));
                            $query->the_post();
                            get_template_part('template-parts/content-frontpage', 'doctor');
                            wp_reset_query();
                            $query = new WP_Query(array(
                                'p' => get_object_vars(get_field('hot5'))['ID'],
                            ));
                            $query->the_post();
                            get_template_part('template-parts/content-frontpage', 'doctor');
                            wp_reset_query();
                            $query = new WP_Query(array(
                                'p' => get_object_vars(get_field('hot6'))['ID'],
                            ));
                            $query->the_post();
                            get_template_part('template-parts/content-frontpage', 'doctor');
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <h4 class="section-title article-title article-title-inline">最新杏林專欄 </h4>
                    <div class="article-latest-list-wrap">
                        <?php
                        $query = new WP_Query(array(
                            'p' => get_object_vars(get_field('new1'))['ID'],
                        ));
                        $query->the_post();
                        ?>
                        <div class="article-latest-list">
                            <h5><a href="<?php echo the_permalink(); ?>" class="color-inherit"><?php the_title(); ?></a></h5>
                            <?php
                            $posts = get_field('doctor');
                            if ($posts) {
                                ?>
                                <?php
                                $get_post_obj = get_post($posts[0]);
                                ?>
                                <i class="fa fa-file-text-o" aria-hidden="true"></i> <div class="article-latest-list-writer"><?php echo $get_post_obj->post_title; ?></div>
                                <?php
                            };
                            ?>
                        </div>
                        <?php
                        wp_reset_query();
                        $query = new WP_Query(array(
                            'p' => get_object_vars(get_field('new2'))['ID'],
                        ));
                        $query->the_post();
                        ?>
                        <div class="article-latest-list">
                            <h5><a href="<?php echo the_permalink(); ?>" class="color-inherit"><?php the_title(); ?></a></h5>
                            <?php
                            $posts = get_field('doctor');
                            if ($posts) {
                                ?>
                                <?php
                                $get_post_obj = get_post($posts[0]);
                                ?>
                                <i class="fa fa-file-text-o" aria-hidden="true"></i> <div class="article-latest-list-writer"><?php echo $get_post_obj->post_title; ?></div>
                                <?php
                            };
                            ?>
                        </div>
                        <?php
                        wp_reset_query();
                        $query = new WP_Query(array(
                            'p' => get_object_vars(get_field('new3'))['ID'],
                        ));
                        $query->the_post();
                        ?>
                        <div class="article-latest-list">
                            <h5><a href="<?php echo the_permalink(); ?>" class="color-inherit"><?php the_title(); ?></a></h5>
                            <?php
                            $posts = get_field('doctor');
                            if ($posts) {
                                ?>
                                <?php
                                $get_post_obj = get_post($posts[0]);
                                ?>
                                <i class="fa fa-file-text-o" aria-hidden="true"></i> <div class="article-latest-list-writer"><?php echo $get_post_obj->post_title; ?></div>
                                <?php
                            };
                            ?>
                        </div>
                        <?php
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cancer-type-section ">
        <div class="container">
            <a style="text-decoration: none;" href="/web/cancer/乳癌/">
                <h4 class="section-title">癌症分類</h4>
            </a>
            <div class="cancer-type-list" style="margin-left:-10px;">
                <?php
                $query = new WP_Query(array(
                    'post_type' => 'cancer',
                    'posts_per_page' => -1,
                ));
                while ($query->have_posts()) {
                    $query->the_post();
                    $queried_object = get_queried_object();
                    $current_page_title = get_the_title();
                    ?>
                    <div>
                        <?php
                        if ($queried_object->post_title === $current_page_title) {
                            ?>
                            <div class="cancer-type-item active-cancer-type-item">
                                <span>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </span>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="cancer-type-item">
                                <span>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </span>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                };
                wp_reset_query();
                ?>
                <br clear="all"/>
            </div>
        </div>
    </div>
    <div class="health-channel-section ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a style="text-decoration: none;" href="<?php echo get_permalink(get_page_by_path('節目重溫')); ?>">
                        <h4 class="section-title article-title article-title-inline">健康頻道 <i class="fa fa-chevron-right" aria-hidden="true"></i></h4>
                    </a>
                    <ul class="display-inline cate-mini-list">
                        <?php
                        $post_type = 'video';
                        $slug = 'video_health';
                        $taxonomies = get_object_taxonomies(array('post_type' => $post_type,));
                        foreach ($taxonomies as $taxonomy) {
                            $terms = get_terms(array(
                                'taxonomy' => $taxonomy,
                                'hide_empty' => false,
                                'slug' => $slug
                            ));
                            foreach ($terms as $term) {
                                ?>
                                <li><?php echo $term->name; ?></li>
                                <?php
                            };
                            wp_reset_query();
                        };
                        ?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <?php
                $post_type = 'video';
                $slug = 'video_health';
                $taxonomies = get_object_taxonomies(array('post_type' => $post_type));
                foreach ($taxonomies as $taxonomy) {
                    $terms = get_terms(array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false,
                        'slug' => $slug
                    ));
                    foreach ($terms as $term) {
                        $args = array(
                            'post_type' => $post_type,
                            'posts_per_page' => 6,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                )
                            )
                        );
                        $posts = new WP_Query($args);
                        while ($posts->have_posts()) {
                            $posts->the_post();
                            ?>
                            <div class="col-xs-6 col-sm-2">
                                <div class="health-channel-item">
                                    <div class="health-channel-image">
                                        <a href="<?php echo get_permalink(); ?>"><img src="http://img.youtube.com/vi/<?php the_field('video_link'); ?>/hqdefault.jpg"/></a> 
                                    </div>
                                    <h4 class="health-channel-cate"><?php echo $term->name; ?></h4>
                                    <h3 class="health-channel-title"><?php the_title(); ?></h3>
                                </div>
                            </div>
                            <?php
                        };
                    };
                    wp_reset_query();
                };
                ?>
            </div>
        </div>
    </div>
    <div class="news-and-media-channel-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a style="text-decoration: none;" href="<?php echo get_permalink(get_page_by_path('城中活動')); ?>">
                        <h4 class="section-title article-title-inline">城中活動 <i class="fa fa-chevron-right" aria-hidden="true"></i></h4>
                    </a>
                </div>
            </div>
            <div class="row">
                <?php
                $post_type = 'events';
                $count = 0;
                $taxonomies = get_object_taxonomies(array('post_type' => $post_type));
                foreach ($taxonomies as $taxonomy) {
                    $terms = get_terms(array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false,
                    ));
                    foreach ($terms as $term) {
                        ?>
                        <?php
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type' => $post_type,
                            'posts_per_page' => 1,
                            'paged' => $paged,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                )
                            )
                        );
                        $posts = new WP_Query($args);
                        while ($posts->have_posts()) {
                            $posts->the_post();
                            $count++;
                            if ($count == 6) {
                                break;
                            }
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            ?>
                            <div class="col-xs-6 col-sm-2">
                                <div class="health-channel-item">
                                    <div class="health-channel-image">
                                        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $featured_img_url; ?>"></a> 
                                    </div>
                                    <h4 class="health-channel-cate">
                                        <?php echo $term->name; ?>
                                    </h4>
                                    <h3 class="health-channel-title">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <?php
                        };
                    };
                    wp_reset_query();
                };
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12"><div class="line"></div></div>
        </div>
    </div>
    <div class="useful-link-section ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="section-title article-title article-title-inline">有用連結</h4>
                </div>
            </div>
            <div class="link-icon-wrap">
                <div class="row">
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'useful_link',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                    ));
                    while ($query->have_posts()) {
                        $query->the_post();
                        $link = get_field('useful_link');
                        if ($link) {
                            ?>
                            <div class="col-sm-2 col-xs-4"><a href="<?php echo $link; ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" /></a></div>
                            <?php
                        };
                    };
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="facebook-link-section ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="section-title article-title-inline">Facebook 群組</h4>
                </div>
            </div>
            <div class="facebook-link-wrap">
                <div class="row">
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'facebook_group',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                    ));
                    while ($query->have_posts()) {
                        $query->the_post();
                        $link = get_field('link');
                        if ($link) {
                            ?>
                            <div class="col-sm-3 col-xs-4">
                                <div class="facebook-link-item"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo $link; ?>" target="_blank"><?php the_title(); ?></a></div>
                            </div>
                            <?php
                        };
                    };
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="hot-topic-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <?php get_template_part('template-parts/content-hot', 'topic'); ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php get_template_part('template-parts/content-hot', 'question'); ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php get_template_part('template-parts/content-hot', 'member'); ?>
                </div>
            </div>
        </div>
        <div style="margin-top: 40px;">
            <?php
            include(locate_template('gdfooterhot.php'));
            ?>
        </div>
    </div>
</div>
<!-- gd front-page end -->
<?php
get_footer();
