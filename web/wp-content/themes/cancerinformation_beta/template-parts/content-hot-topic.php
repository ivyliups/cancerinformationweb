<?php
/**
 * The template part for hot topic
 *
 */
?>
<div class="hot-topic-item">
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      <h4 class="title mg-zero">城中活動</h4>
      <?php
          // echo print_r($top_cate);
              $query = new WP_Query( array(
              'post_type' => 'events', // name of post type.
              //'category__in' => $top_cate, // only in this category.
              'post_status' => 'publish',
              'posts_per_page' => 3,
              // 'tag' => 'news release',
          ));

          $count = 1;
          
          while ( $query->have_posts() ) : $query->the_post();?>
            <div class="hot-topic">
              <i class="fa fa-caret-right" aria-hidden="true"></i>
              <div class="hot-topic-wrap">
                <?php 
                  if ($count === 1){
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                    $count ++;
                  }
                ?>
                <span class="hot-top-date"><?php echo get_the_date('Y年n月j日'); ?></span>
                <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
              </div>
            </div> 
          <?php endwhile;

          /**
            * reset the orignal query
            * we should use this to reset wp_query
            */
          
        ?>
      <!-- <div class="hot-topic">
        <i class="fa fa-caret-right" aria-hidden="true"></i>
        <div class="hot-topic-wrap">
          <span class="hot-top-date">2017年5月23日</span>
          <a href="#">城中活動題目</a>
        </div>
      </div> -->
    </div>
    <div class="col-xs-6 col-sm-6">
      <div class="hot-topic-image" style="background-image: url('<?php echo $featured_img_url; ?>"></div>
    </div>
  </div>
  <?php wp_reset_query();?>
</div>