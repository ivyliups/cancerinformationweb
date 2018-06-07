<?php
/**
 * The template part for footer member list
 *
 */
?>
<div class="hot-topic-footer">
  <div class="hot-topic-icon"><i class="fa fa-commenting" aria-hidden="true"></i>熱門話題</div>
    <div class="div-inline"><ul class="display-inline">
      <?php
          // echo print_r($top_cate);
              $query = new WP_Query( array(
              'post_type' => 'post', // name of post type.
              //'category__in' => $top_cate, // only in this category.
              'post_status' => 'publish',
              'posts_per_page' => 4,
              'orderby' => 'rand',
              'order'    => 'ASC'
              // 'tag' => 'news release',
          ));

          $count = 0; //set up counter variable
          
          while ( $query->have_posts() ) : $query->the_post();?>
             <li class="hot-topic-link"><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></li>
          <?php endwhile;

          /**
            * reset the orignal query
            * we should use this to reset wp_query
            */
          wp_reset_query();
        ?>
    </ul>
  </div>
</div>