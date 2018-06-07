<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cancerinformation
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <div class="wrapper">
                <!--gd header -->
                <header id="header" class="header">
                    <div class="header-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="logo-wrap">
                                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_v2.png?v=2" alt="" /></a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 hidden-xs">
                                    <div class="top-banner">
                                        <?php
                                        $header_ad = get_field('Header_Ad', 'option');
                                        $header_ad_link = get_field('header_ad_link', 'option');
                                        if (!empty($header_ad)):
                                            ?>
                                            <a href="<?php echo $ad_link; ?>"><img src="<?php echo $header_ad['url']; ?>" alt="<?php echo $header_ad['alt']; ?>" class="img-responsive" /></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mobile-menu visible-xs">
                                    <div class="stellarnav">
                                        <ul>
                                            <?php if (has_nav_menu('header-menu')) : ?>
                                                <?php
                                                wp_nav_menu(array(
                                                    'theme_location' => 'header-menu',
                                                    'container' => false,
                                                    'items_wrap' => '%3$s',
                                                    'walker' => new custom_nav_walker()
                                                ));
                                                ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 hidden-xs">
                                    <div class="top-info-link">
                                        <div class="row min-pad">
                                            <div class="col-xs-4">
                                                <a href="<?php echo get_permalink(get_page_by_path('城中活動')); ?>">
                                                    <div class="top-info-image">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-right-icon-1.png" alt="" />
                                                    </div>
                                                    <h5 class="text-center">城中活動</h5>
                                                </a>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="top-info-image">
                                                    <a href="<?php echo esc_url(home_url('/event_categories/醫生講座/')); ?>">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-right-icon-2.png" alt="" />
                                                </div>
                                                <h5 class="text-center">醫生講座</h5>
                                                </a>
                                            </div>
                                            <div class="col-xs-4">
                                                <a href="<?php echo esc_url(home_url('/城中活動/?expire_event')); ?>">
                                                    <div class="top-info-image">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-right-icon-3.png" alt="" />
                                                    </div>
                                                    <h5 class="text-center">過往活動花絮</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--gd mega menu -->
                    <div>
                        <!-- menu start -->
                        <div class="main-menu-wrap hidden-xs">
                            <div class="container">
                                <ul class="nav">
                                    <?php if (has_nav_menu('header-menu')) : ?>
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'header-menu',
                                            'container' => false,
                                            'items_wrap' => '%3$s',
                                            'walker' => new custom_nav_walker()
                                        ));
                                        ?>
                                    <?php endif; ?>
                                </ul>
                                <div class="nav-scoial-icon">
                                    <ul class="display-inline">
                                        <li id="gd">
                                            <div class="search bar8">
                                                <form role="search" method="get" id="search-form2" action="<?php echo esc_url(home_url('/')); ?>">
                                                    <div>
                                                        <input type="text"  style="cursor: pointer;" placeholder="搜尋..." name="s" id="search-input2" value="<?= $_GET['q'] ?>" required>
                                                        <button type="submit"></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                        <style>
                                            .bar8 form {
                                                position: relative;
                                                width: 300px;
                                                margin: 0 auto;
                                            }
                                            .bar8 input, button {
                                                border: none;
                                                outline: none;
                                            }
                                            .bar8 input {
                                                width: 100%;
                                                height: 33px;
                                                padding-left: 13px;
                                            }
                                            .bar8 button {
                                                background: #fff;
                                                height: 29px;
                                                width: 29px;
                                                cursor: pointer;
                                                position: absolute;
                                                border-radius: 5px;
                                                top: 2px;
                                                right: 0;
                                                padding: 0px;
                                            }
                                            .bar8 input {
                                                width: 0;
                                                padding: 0 15px;
                                                border-bottom: 2px solid transparent;
                                                background: transparent;
                                                transition: .3s linear;
                                                position: absolute;
                                                top: 0;
                                                right: 0;
                                                z-index: 2;
                                            }
                                            .bar8 input:focus {
                                                width: 200px;
                                                z-index: 1;
                                                border-bottom: 2px solid #fff;
                                                border-radius: 0px;
                                                margin-right: 40px;
                                            }
                                            .bar8 button:before {
                                                content: "\f002";
                                                font-family: FontAwesome;
                                                font-size: 20px;
                                                color: #b4d843;
                                            }
                                        </style>
                                        <?php
                                        $fb_link = get_field('facebook_link', 'option');
                                        if (!empty($fb_link)) {
                                            ?>
                                            <li><a href="<?php echo $fb_link; ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                            <?php
                                        };
                                        $ig_link = get_field('instagram_link', 'option');
                                        if (!empty($ig_link)) {
                                            ?>
                                            <li><a href="<?php echo $ig_link; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            <?php
                                        };
                                        $youtube_link = get_field('youtube_link', 'option');
                                        if (!empty($youtube_link)) {
                                            ?>
                                            <li><a href="<?php echo $youtube_link; ?>" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
                                            <?php
                                        };
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- menu end -->
                    </div>
                </header>
                <!--gd header -->
                <div id="content" class="site-content">
