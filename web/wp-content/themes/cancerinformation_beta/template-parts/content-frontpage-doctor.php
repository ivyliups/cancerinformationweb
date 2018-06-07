<?php
/**
 * The template part for front page doctort
 *
 */
?>
<div class="col-xs-12 col-sm-4">
  <div class="article-item">
    <div class="triangle-top-right"></div>
    <div class="article-item-inner">
      <div class="row">
        <div class="col-xs-4">
          <div class="article-writer">
             <?php 

              $posts = get_field('doctor');

              // echo '<pre>' . print_r(get_post( $posts[0] ), 1) . '</pre>';

              $get_post_obj = get_post( $posts[0] );

              if( $posts ): ?>
              <?php /* grab the url for the full size featured image */
              $doctor_post_id = $posts[0]->ID;
              $featured_img_url = get_the_post_thumbnail_url($get_post_obj->ID, 'full'); ?>
              <a href="<?php echo get_permalink( $doctor_post_id ); ?>" class="img-responsive"><img class="doctor-img" src="<?php echo $featured_img_url; ?>"></a>
              
              <div class="article-writer-name">
         
                  <?php echo $posts[0]->post_title; ?>
                  
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-xs-8">
          <div class="article-mini-title"> <a href="<?php echo the_permalink(); ?>" class="color-inherit"><?php echo get_the_title(); ?></a></div>
          <div class="article-mini-content">
            <?php $content = get_the_content();
                  $content = strip_tags($content);
                  echo substr($content, 0, 100); ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>