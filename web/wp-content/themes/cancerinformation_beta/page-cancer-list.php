<?php
/**
* Template Name: Cancer List Tmeplate
*/

get_header(); ?>

<div class="main-content">
  <div class="inner-page">
  <!--=================================
  inner -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-9">
        <div class="cancer-inner-title-wrap">
          <div class="inner-title">癌症分類</div>
        </div>
        <div class="cancer-list-wrap">
         <div class="cancer-type-list">
              <?php

              // echo print_r($top_cate);
                  $query = new WP_Query( array(
                  'post_type' => 'cancer', // name of post type.
                  'posts_per_page' => -1,
              ));

              while ( $query->have_posts() ) : $query->the_post();?>
              <?php
              $queried_object = get_queried_object();
              $current_page_title = get_the_title();
              ?>
              <div>
                  <?php if($queried_object->post_title === $current_page_title) {?>
                    <div class="cancer-type-item active-cancer-type-item">
                      <span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span>
                    </div>
                  <?php } else{ ?>
                    <div class="cancer-type-item">
                      <span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span>
                    </div>
                  <?php } ?>
              </div>
              
              <?php endwhile;
            /**
              * reset the orignal query
              * we should use this to reset wp_query
              */
            wp_reset_query();

            ?>
            <br clear="all"/>
          </div>
        </div>

         <div class="cancer-type-list">
          <div class="row min-pad">
          <?php
            $parent = get_category_by_slug( 'cancer' );
            $cates = get_categories( array(
                'parent' => $parent->term_id,
                'hide_empty' => true,
            ));
            ?>
            <?php foreach ( $cates as $cate ) :
              $category_link = get_category_link( $cate->cat_ID );
              ?>
              <div class="col-xs-3 col-sm-1">
                <div class="cancer-type-item">
                  <?php if($category_link): ?>
                  <span><a href="<?php echo $category_link; ?>"><?php echo $cate->cat_name; ?></a><span>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach;?>
          </div>  
        </div>

        <div class="inner-content">
          <div class="row">
            <?php
            /*
            * Loop through Categories and Display Posts within
            */
            $post_type = 'video';

            // Get all the taxonomies for this post type
            $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

            foreach( $taxonomies as $taxonomy ) :
              // Gets every "category" (term) in this taxonomy to get the respective posts
              $terms = get_terms( array(
                  'taxonomy' => $taxonomy,
                  'hide_empty' => false,
              ));
              foreach( $terms as $term ) : ?>
                  <?php
                  $args = array(
                          'post_type' => $post_type,
                          'posts_per_page' => -1,  //show all posts
                          'tax_query' => array(
                              array(
                                  'taxonomy' => $taxonomy,
                                  'field' => 'slug',
                                  'terms' => $term->slug,
                              )
                          )

                      );
                  $posts = new WP_Query($args);

                  while ( $posts->have_posts() ) : $posts->the_post();?>
                  <div class="col-xs-6 col-sm-3">
                    <div class="video-list-video">
                      <a href="<?php echo get_permalink(); ?>"><img src="http://img.youtube.com/vi/<?php the_field('video_link'); ?>/hqdefault.jpg"/></a>
                    </div>
                    <div class="video-list-cate">
                      <?php echo $term->name; ?>
                    </div>
                    <div class="video-list-title">
                      <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                    </div>
                  </div>
                <?php endwhile;

              ?>

              <?php endforeach;
              wp_reset_query();
            endforeach; ?>

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