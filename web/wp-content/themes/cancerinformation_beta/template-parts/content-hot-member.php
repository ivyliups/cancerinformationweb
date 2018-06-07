<?php
/**
 * The template part for hot member
 *
 */
?>
<div class="hot-topic-item">
<div class="row">
    <div class="col-xs-12">
      <h4 class="title mg-zero">會員註冊</h4>
    </div>
    <div class="col-xs-12">
      <div class="hot-topic-link-content">
       <?php $member_registration_text = get_field('member_registration_text');
        if ($member_registration_text) {
          echo $member_registration_text;
        } else {
          $member_registration_text = get_field('member_registration_text', 'option');
          echo $member_registration_text;
        }
        ?>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="hot-topic-link-image">
      <?php $image = get_field('member_registration_image');

        if ($image) { ?>
          <div class="hot-topic-link-image" style="background-image: url('<?php echo $image['url']; ?>"></div>
        <?php } else {
          $image = get_field('member_registration_image', 'option'); ?>
         <div class="hot-topic-link-image" style="background-image: url('<?php echo $image['url']; ?>"></div>
      <?php } ?>
      </div>
    </div>
    <div class="col-xs-12">
      <?php $member_registration_link = get_field('member_registration_link');

        if ($member_registration_link) { ?>
          <div class="hot-topic-button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            <a href="<?php echo $member_registration_link ?>">按此註冊</a>
            </div>
        <?php } else {
          $member_registration_link = get_field('member_registration_link', 'option'); ?>
         <div class="hot-topic-button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
          <a href="<?php echo $member_registration_link ?>">按此註冊</a>
          </div>
      <?php } ?>

    </div>
  </div>

  <!-- <div class="row">
    <div class="col-xs-12">
      <h4 class="title mg-zero">會員註冊</h4>
    </div>
    <div class="col-xs-12">
      <div class="hot-topic-link-content">
        <?php $member_registration_text = get_field('member_registration_text');
        if( $member_registration_text ): ?>
            <?php echo $member_registration_text; ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="hot-topic-link-image">
      <?php
      $member_registration_image = get_field('member_registration_image');

      if( $member_registration_image ) {?>
        <div class="hot-topic-link-image" style="background-image: url('<?php echo $member_registration_image['url']; ?>"></div>
      <?php }?>
      </div>
    </div>
    <div class="col-xs-12">
    <?php
      $regi_link = get_field('member_registration_link');

      if( $regi_link ) {?>
      <div class="hot-topic-button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
        <a href="<?php echo $regi_link ?>">按此註冊</a>
        </div>
      <?php }?>
    </div>
  </div> -->
</div>
