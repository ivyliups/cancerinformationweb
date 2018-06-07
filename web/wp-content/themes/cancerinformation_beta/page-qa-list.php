<?php
/**
 * Template Name: QA List Tmeplate
 */
get_header();
?>
<!-- gd page-qa-list -->
<div class="main-content">
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="inner-title-wrap">
                        <div class="inner-title">疑難排解</div>
                    </div>
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="#gdtob" style="font-size: 16px; text-align: center; display: inline-block; background: #99CC32; color: #fff; padding: 15px 20px;">立即按此提問問題</a>
                    </div>
                    <div class="inner-content">
                        <?php
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                        $post_type = 'qa';
                        $query = new WP_Query(array(
                            'post_type' => $post_type,
                            'post_status' => 'publish',
                            'posts_per_page' => 12,
                            'paged' => $paged
                        ));
                        while ($query->have_posts()) {
                            $query->the_post();
                            $thumbnail = get_the_post_thumbnail_url();
                            $date = get_the_date('d-m-Y');
                            ?>
                            <article class="question question-type-normal">
                                <h2><?php the_field('question'); ?></h2>
                                <div class="question-author">
                                    <span original-title="ahmed" class="question-author-img"><span></span><img src="<?php echo $thumbnail; ?>"></span>
                                </div>
                                <div class="question-inner">
                                    <div class="clearfix"></div>
                                    <div class="question-desc"><?php the_field('answer'); ?></div>
                                    <span class="question-category"><i class="fa fa-clock-o" aria-hidden="true"></i>日期: <?php echo $date ?></span>
                                    <span class="question-category">解答: <?php the_field('doctor'); ?></span>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                            <?php
                        };
                        wp_reset_query();
                        ?>
                    </div>
                    <div class="row" style="margin-top: -60px;">
                        <div class="col-xs-12 text-right">
                            <ul class="pagination pagination-sm">
                                <?php
                                pagination($query->max_num_pages);
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div id="gdtob" style="margin-top: 40px;ar">
                        <?php echo do_shortcode('[contact-form-7 id="96" title="QA Form"]'); ?>
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
