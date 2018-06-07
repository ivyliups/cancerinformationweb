<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cancerinformation
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
    <div class="footer-inner">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-3">
            <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=141162145974723&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page" data-href="https://www.facebook.com/cancerinformationhk" data-tabs="timeline" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/cancerinformationhk" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cancerinformationhk">癌症資訊網 cancerinformation.com.hk</a></blockquote></div>
          </div>
          <div class="col-xs-12 col-sm-3">
            <ul class="foo-nav">
              <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
                <?php
                  wp_nav_menu( array(
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'items_wrap'    => '%3$s',
                    'walker'  => new custom_nav_walker()
                  ) );
                ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-3">
           <ul class="foo-nav">
              <?php if ( has_nav_menu( 'footer-menu-2' ) ) : ?>
                <?php
                  wp_nav_menu( array(
                    'theme_location' => 'footer-menu-2',
                    'container' => false,
                    'items_wrap'    => '%3$s',
                    'walker'  => new custom_nav_walker()
                  ) );
                ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-3">
            <div class="footer-info">
              <ul class="display-inline"><li><i class="fa fa-envelope" aria-hidden="true"></i></li><li>
                <?php
                  $mail = get_field('mail', 'option');

                  if( !empty($mail) ): ?>

                    <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>

                <?php endif; ?>
              </li></ul>
              <ul class="display-inline"><li><i class="fa fa-phone" aria-hidden="true"></i></i></li><li>
                <?php
                  $phone = get_field('phone', 'option');

                  if( !empty($phone) ): ?>

                    <?php echo $phone; ?>

                <?php endif; ?>
              </li></ul>
              <ul class="display-inline"><li><i class="fa fa-map-marker" aria-hidden="true"></i></i></li><li>
                <?php
                  $location = get_field('location', 'option');

                  if( !empty($location) ): ?>

                    <?php echo $location; ?>

                <?php endif; ?>
              </li></ul>
            </div>  
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
    <div class="container">  
      <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="footer-bottm-list">
              <ul class="display-inline foo-bottom-nav">
                 <?php if ( has_nav_menu( 'header-menu' ) ) : ?>
                    <?php
                      wp_nav_menu( array(
                        'theme_location' => 'footer-bottom-menu',
                        'container' => false,
                        'items_wrap'    => '%3$s',
                        'walker'  => new custom_nav_walker()
                      ) );
                    ?>
                  <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 text-right">
            <div class="footer-bottm-list">
              <div class="copy-right">版權所有 不得轉載 © Copyright Cancer - information Co. </div>
              <ul class="display-inline icon-list">
                <?php
            $fb_link = get_field('facebook_link', 'option');

            if( !empty($fb_link) ): ?>

            <li><a href="<?php echo $fb_link; ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>

          <?php endif; ?>
          <?php
            $ig_link = get_field('instagram_link', 'option');

            if( !empty($ig_link) ): ?>

              <li><a href="<?php echo $ig_link; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

          <?php endif; ?>
          <?php
            $youtube_link = get_field('youtube_link', 'option');

            if( !empty($youtube_link) ): ?>

              <li><a href="<?php echo $youtube_link; ?>" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>

          <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
