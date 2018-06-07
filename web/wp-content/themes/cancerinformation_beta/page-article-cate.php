<?php
/**
 * Template Name: Article Cate Tmeplate
 */
get_header();
?>
<!-- gd page-article-cate -->
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
                    <div class="inner-content" style="display: flex; flex-wrap: wrap; margin: 0 -7.5px;">
                        <?php
                        $categories = get_categories(array(
                            'type' => 'post',
                            'parent' => 0,
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => false,
                            'hierarchical' => 1,
                            'taxonomy' => 'category',
                            'pad_counts' => false
                        ));
                        foreach ($categories as $cate) {
                            ?>
                            <div class="col-xs-12 col-sm-6  col-md-4" style="padding: 0 7.5px; margin-bottom: 15px;">
                                <div style="background: #F99631; height: 4px; margin-bottom: 15px;"></div>
                                <div class="cate-type-wrapper" style="padding: 0 15px 10px;">
                                    <div class="cate-header">
                                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $cate->name; ?></h5>
                                    </div>
                                    <ul>
                                        <?php
                                        $sub_categories = get_categories(
                                                array('parent' => $cate->cat_ID)
                                        );
                                        foreach ($sub_categories as $sub_cate) {
                                            ?>
                                            <li>
                                                <a href="<?php echo get_category_link($sub_cate->term_id); ?>">
                                                    <?php echo $sub_cate->name; ?>
                                                </a>
                                            </li>
                                            <?php
                                        };
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        };
                        ?>
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
