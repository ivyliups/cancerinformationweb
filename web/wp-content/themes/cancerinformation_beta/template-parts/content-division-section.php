    <?php  get_template_part( 'template-parts/content-ad', 'items' ); ?>
      <?php
      /*
      * Loop through Categories and Display Posts within
      */
      $post_type = 'post';
      $slug = 'page';

      $cateObj = get_category_by_slug($slug); 
      $page_cate_id = $cateObj->term_id;

      // Get all the taxonomies for this post type
      $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type, ) );

      foreach( $taxonomies as $taxonomy ) :
        // Gets every "category" (term) in this taxonomy to get the respective posts
        $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            'parent' => $page_cate_id
        ));
        foreach( $terms as $term ) : ?>
        <div class="col-xs-12 col-sm-4">
        <div class="cate-page-image">
        <?php 
          $image = get_field('thumbnail', $term->$name . '_' . $term->term_id );
          $category_id = get_cat_ID( 'Category Name' );
          // Get the URL of this category
          $category_link = get_category_link( $term->term_id );
        ?>
        <img src="<?php echo $image['url']?>" class="img-responsive"/>

        </div>
         <div class="cate-page-list">
           <h4 class="cate-page-title"><a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></h4>
           
           <?php query_posts(array('cat=' . $term->term_id, 'posts_per_page' => 2)); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="cate-page-item">
             <ul class="display-inline">
               <li><i class="fa fa-caret-right" aria-hidden="true"></i></li>
               <li><?php the_title(); ?></li>
             </ul>
           </div>

            <?php endwhile; endif; ?>
            
            <?php wp_reset_query(); ?>
           
           <!-- <div class="cate-page-item">
             <ul class="display-inline">
               <li><i class="fa fa-caret-right" aria-hidden="true"></i></li>
               <li>有用資訊</li>
             </ul>
           </div> -->
         </div>
      </div>
        
        <?php endforeach;
        wp_reset_query();
      endforeach; ?>