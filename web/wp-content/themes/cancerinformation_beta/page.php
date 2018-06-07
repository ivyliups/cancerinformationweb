<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cancerinformation
 */

get_header(); ?>

<div class="main-content">
  <div class="inner-page">
  <!--=================================
  inner -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-9">
      <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
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
