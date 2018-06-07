<?php

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

        
      <!-- Tabs -->
    <div class="row">
    <div class="col-md-12">
    <!-- Nav tabs --><div class="card">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#a" aria-controls="a" role="tab" data-toggle="tab">關於 <?php the_title();?></a></li>
        <li role="presentation"><a href="#b" aria-controls="b" role="tab" data-toggle="tab">診斷</a></li>
        <li role="presentation"><a href="#c" aria-controls="c" role="tab" data-toggle="tab">治療</a></li>
        <li role="presentation"><a href="#d" aria-controls="d" role="tab" data-toggle="tab">相關醫療照顧</a></li>
        <li role="presentation"><a href="#e" aria-controls="e" role="tab" data-toggle="tab">有用資訊</a></li>
    </ul>
      <?php

          $queried_object = get_queried_object();
          $query = new WP_Query( array(
          'post_type' => 'cancer', // name of post type.
          'posts_per_page' => -1,
          'post__in' => [$queried_object->ID]
      ));

      while ( $query->have_posts() ) : $query->the_post();?>
              
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="a">
          <?php the_field('about'); ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="b">
          <?php the_field('diagnose'); ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="c">
          <?php the_field('treatment'); ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="d">
          <?php the_field('related_service'); ?>
        </div>
     <?php endwhile;
      /**
        * reset the orignal query
        * we should use this to reset wp_query
        */
      wp_reset_query();

      ?>
        <div role="tabpanel" class="tab-pane" id="e">
        <div class="row">
          <?php
              $queried_object = get_queried_object();

               //List of tag slugs
              $tags = array($queried_object->post_title);

              // Get all the taxonomies for this post type
$taxonomies = get_object_taxonomies( array( 'post_type' => 'post' ) );

 foreach( $taxonomies as $taxonomy ) :

  $terms = get_terms( $taxonomy );

  foreach( $terms as $term ) :

  // echo '<pre>' . print_r($term, 1) . '</pre>';

  if ($term->name === $queried_object->post_title) { // post cancer cate = cancer name
      $args = array(
                'post_type' => 'post',
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

        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); 
        $thumbnail = get_the_post_thumbnail_url();?>
 
                    <div class="col-xs-12 col-sm-6">
                <div class="news-list-item-wrap">
                  <div class="row equal">
                    <div class="col-xs-3 col-sm-4">
                      <div class="top-left-line"></div>
                      <div class="news-list-image-wrap"><a href="<?php the_permalink();?>"><img src="<?php echo $thumbnail;?>" class="img-responsive"></a></div>
                    </div>
                    <div class="col-xs-9 col-sm-8">
                      <a class="news-list-title" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                      <div class="news-list-date"><?php echo get_the_date('d-m-Y');?></div>
                      <div class="doctor-article">
                        <?php the_excerpt_max_charlength(60); ?>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
                   
 
        <?php endwhile; endif;
  }
  endforeach; endforeach;
          /**
            * reset the orignal query
            * we should use this to reset wp_query
            */
          wp_reset_query();

          ?>
          </div>
        </div>
    </div>
    </div>
    </div>
	</div>
      <!-- ./Tabs -->
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
