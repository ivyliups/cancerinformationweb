<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cancerinformation
 */

?>

<div class="news-list-item-wrap">
  <div class="row">
    <div class="col-xs-12">
      <div class="top-left-line"></div>
      <div class="search-list-wrap">
        <a class="search-list-title" href="<?php the_permalink();?>"><?php the_title(); ?></a>
        <div class="search-article">
          <?php the_excerpt_max_charlength(120); ?>
        </div>
      </div>
    </div>
  </div>
</div>
