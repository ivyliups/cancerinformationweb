<div class="gdcft0">
    <div class="gdcft1">
        <i class="fa fa-commenting" aria-hidden="true"></i>熱門話題
    </div>
    <?php
    $query = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby' => 'rand',
        'order' => 'ASC'
    ));
    while ($query->have_posts()) {
        $query->the_post();
        ?>
        <div class="gdcft2">
            <a style="color: #fff;" href="<?php echo get_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </div>
        <?php
    };
    wp_reset_query();
    ?>
</div>
<style>
    .gdcft0 {
        margin: 0;
        background: #99CC33;
        color: #fff;
        line-height: 48px;
        font-size: 15px;
    }
    .gdcft1 {
        background: #69C000;
        display: block;
        padding: 0 10px;
    }
    .gdcft2 {
        padding: 0 10px;
    }
    @media (min-width: 850px) {
        .gdcft0 {
            height: 48px;
        }
        .gdcft1 {
            display: inline-block;
        }
        .gdcft2 {
            display: inline-block;
        }
    }
</style>