<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cancerinformation
 */
get_header();
$categories = get_the_category();
$cat_name = $categories[0]->cat_name;
$date = get_the_date('d-m-Y');
?>
<!-- gd single -->
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
                        <?php
                        if ($cat_name) {
                            ?>
                            <span class="color-orange"><a class="color-inherit" href="<?php echo get_category_link($categories[0]->cat_ID); ?>"><?php echo $cat_name ?></a></span> > 
                            <?php
                        };
                        the_title();
                        ?>
                    </div> 
                    <div class="article-header">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="detail-content">
                        <div class="detail-date">
                            <?php
                            echo $date;
                            ?>
                        </div>
                        <div class="detail-content-wrap">
                            <?php
                            if (have_posts()) :
                                while (have_posts()) {
                                    the_post();
                                    $content = gdcontent1();
                                    if (has_tag()) {
                                        $content .= '<div class="row"><div class="col-xs-12"><span class="gdtag">' . gdtags() . '</span></div></div><style>.gdtag a { padding: 5px 10px; background: #b4d843; color: white; margin: 0 10px 10px 0; display: inline-block;}</style>';
                                    }
                                    gdcontent2($content);
                                };
                            endif;
                            ?>
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
