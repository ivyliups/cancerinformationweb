<?php
/**
 * The template part for ad item
 *
 */
?>
<div class="aside-list">
  <ul>
    <li>
    <?php
      $ad = get_field('Ad', 'option');
      $ad_link = get_field('ad_link', 'option');
      
      if( !empty($ad) ): ?>

        <a href="<?php echo $ad_link; ?>"><img src="<?php echo $ad['url']; ?>" alt="<?php echo $ad['alt']; ?>" /></a>

      <?php endif; ?>
    </li>
    <li>
    <?php
      $ad_2 = get_field('Ad_2', 'option');
      $ad_link_2 = get_field('ad_link_2', 'option');
      
      if( !empty($ad_2) ): ?>

        <a href="<?php echo $ad_link_2; ?>"><img src="<?php echo $ad_2['url']; ?>" alt="<?php echo $ad_2['alt']; ?>" /></a>

      <?php endif; ?>
    </li>
    <li>
    <?php
      $ad_3 = get_field('Ad_3', 'option');
      $ad_link_3 = get_field('ad_link_3', 'option');
      
      if( !empty($ad_3) ): ?>

        <a href="<?php echo $ad_link_3; ?>"><img src="<?php echo $ad_3['url']; ?>" alt="<?php echo $ad_3['alt']; ?>" /></a>

      <?php endif; ?>
    </li>
  </ul>
</div>