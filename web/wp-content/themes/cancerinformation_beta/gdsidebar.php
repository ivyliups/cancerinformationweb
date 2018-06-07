<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<div class="col-xs-12 col-md-3 gdsb">
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
    <div class="hot-topic-item" style="margin-bottom: 15px;">
        <div class="row">
            <div class="col-xs-6">
                <h4 class="title mg-zero">城中活動</h4>
                <?php
                $query = new WP_Query(array(
                    'post_type' => 'events',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                ));
                $count = 1;
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <div class="hot-topic">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                        <div class="hot-topic-wrap">
                            <?php
                            if ($count === 1) {
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                $count ++;
                            }
                            ?>
                            <span class="hot-top-date"><?php echo get_the_date('Y年n月j日'); ?></span>
                            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                    </div> 
                    <?php
                };
                ?>
            </div>
            <div class="col-xs-6" style="text-align: center;">
                <img style="max-height: 250px;" src="<?php echo $featured_img_url; ?>"/>
            </div>
        </div>
        <?php wp_reset_query(); ?>
    </div>
    <div class="hot-topic-item" style="margin-bottom: 15px;">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="title mg-zero">疑難排解</h4>
            </div>
            <div class="col-xs-12">
                <div class="hot-topic-link-content">
                    <?php echo get_field('qa_text', 'option'); ?>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="hot-topic-link-image">
                    <div class="hot-topic-link-image" style="background-image: url('<?php echo get_field('qa_image', 'option')['url']; ?>');"></div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="hot-topic-button">
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    <a href="<?php echo get_field('qa_link', 'option'); ?>">按此問問題</a>
                </div>
            </div>
        </div>
    </div>
    <div class="hot-topic-item">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="title mg-zero">會員註冊</h4>
            </div>
            <div class="col-xs-12">
                <div class="hot-topic-link-content">
                    <?php echo get_field('member_registration_text', 'option'); ?>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="hot-topic-link-image">
                    <div class="hot-topic-link-image" style="background-image: url('<?php echo get_field('member_registration_image', 'option')['url']; ?>');"></div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="hot-topic-button">
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    <a href="<?php echo get_field('member_registration_link', 'option') ?>">按此註冊</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    @media (max-width: 849px) {
        .gdsb {
            margin-top: 20px;
        }
    }
</style>