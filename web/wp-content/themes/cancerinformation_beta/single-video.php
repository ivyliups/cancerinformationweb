<?php
/**
* Template Name: Video Detail Tmeplate
*/

get_header(); ?>

<?php 
  $categories = get_the_category(); 
  $cat_name = $categories[0]->cat_name;
  $cat_slug = $categories[0]->slug;
  $date = get_the_date('d-m-Y');

  $queried_object = get_queried_object();
  $terms = get_terms( array(
                  'hide_empty' => false,
                  'term_id' => 66,
              ));
  $categorie_two = get_the_category( $queried_object->ID );
  $term_list = wp_get_post_terms( $queried_object->ID, 'video_categories', array( 'fields' => 'names' ) );

  // echo '<pre>',print_r($categorie_two,1),'</pre>';
  // echo '<pre>',print_r($queried_object,1),'</pre>';
  // echo '<pre>',print_r($term_list,1),'</pre>';
?>

<!-- <?php $terms = get_terms("video_categories"); $count = count($terms); if ( $count > 0 ){ foreach ( $terms as $term ) { echo $term->name; } } ?> -->


<div class="main-content">
  <div class="inner-page">
  <!--=================================
  inner -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-9">
        <div class="inner-title-wrap">
          <div class="inner-title">節目重溫</div>
            <div class="breadcrumb"><span class="color-orange"><?php echo $term_list[0] ?></span> > <?php the_title();?></div>
          <div class="search-input">
          <div class="input-group custom-searh">
            <input type="text" class="form-control" placeholder="文字">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">搜尋</button>
            </span>
          </div><!-- /input-group -->
        </div>  
        </div>

        <div class="article-header">
          <h2><?php the_title();?></h2>
        </div>
          <div class="detail-content">
            <div class="detail-date"><?php the_date();?></div>
            <div class="detail-content-wrap"><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; ?>
              <?php endif; ?></div>
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
        <?php get_template_part( 'template-parts/content-ad', 'items' ); ?>
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
