<?php
/**
* Template Name: Article Detail Tmeplate
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
          <?php 
          global $post;
          $postcat = get_the_category( $post->ID );

          // try print_r($postcat) ;  

          if ( ! empty( $postcat ) ) { ?>  
              <div class="breadcrumb"><span class="color-orange"><?php echo esc_html( $postcat[0]->name ); ?></span> > <?php the_title();?></div>
          <?php } ?>
           
        </div>

        <div class="article-header">
          <h2><?php the_title();?></h2>
        </div>
          <div class="detail-content">
            <div class="detail-date">09/09/2017</div>
            <div class="detail-content-wrap"><?php the_content();?></div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-2">
              <ul class="detail-tag">
                <li></li>
              </ul>
            </div>
            <div class="col-xs-12 col-sm-2">
              <div class="detail-social-share"></div>
            </div>
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
