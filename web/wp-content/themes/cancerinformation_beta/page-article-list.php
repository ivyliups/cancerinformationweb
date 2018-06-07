<?php
/**
* Template Name: Article List Tmeplate
*/

get_header(); ?>
    
<div class="main-content">
  <div class="inner-page">
  <!--=================================
  inner -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-9">
        <div class="inner-title-wrap">
          <div class="inner-title">文章</div>
          <div class="breadcrumb"><span class="color-orange">實用資訊</span> > 醫療費用暖助</div>
          <?php
            $post_type = 'article';
            include(locate_template('template-parts/content-search-input.php'));
          ?> 
        </div>

        <!-- <div class="row">
          <div class="col-xs-12 text-right">
            <nav aria-label="...">
              <ul class="pagination pagination-sm">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1"><</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">></a>
                </li>
              </ul>
            </nav>
          </div>
        </div> -->

        <div class="inner-content">
          <grid-two-container>
            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>

            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>

            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>

            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>

            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>

            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>

            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>

            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>

            <grid-item short class="border-none">
              <div class="article-item-border"></div>
              <div class="grid-inner">
                <a href="<?php echo get_permalink( get_page_by_path( 'article_details' ) ) ?>">
                <div class="cate-type-wrapper">
                  <div class="row">
                    <div class="col-xs-3">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo_ad.png" class="img-responsive" />
                    </div>
                    <div class="col-xs-9">
                      <div class="cate-header">
                        <h5><i class="fa fa-file-text-o" aria-hidden="true"></i>文章題目</h5>
                        <span class="date">18/12/2015</span>
                        <p>內容</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </grid-item>
          </grid-container>
        </div>
      </div>
      <div class="col-xs-12 col-sm-3">
        <?php  get_template_part( 'template-parts/content-ad', 'items' ); ?>
        <br/>
        <?php get_template_part( 'template-parts/content-hot', 'topic' ); ?>
        <br/>
        <?php get_template_part( 'template-parts/content-hot', 'question' ); ?>
        <br/>
        <?php get_template_part( 'template-parts/content-hot', 'member' ); ?>
        <br/>
      </div>
    </div>
  </div>
  <!--=================================
  inner end-->
  </div>
  <div class="inner-foo">
    <?php get_template_part( 'template-parts/content-footer', 'topic' ); ?>
  </div>
</div>
<?php
get_footer();
