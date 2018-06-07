<?php
/**
 * The template part for hot qustion
 *
 */
?>
<div class="hot-topic-item">
  <div class="row">
    <div class="col-xs-12">
      <h4 class="title mg-zero">疑難排解</h4>
    </div>
    <div class="col-xs-12">
      <div class="hot-topic-link-content">
       <?php $qa_text = get_field('qa_text');
        if ($qa_text) {
          echo $qa_text;
        } else {
          $qa_text = get_field('qa_text', 'option');
          echo $qa_text;
        }
        ?>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="hot-topic-link-image">
      <?php $image = get_field('qa_image');

        if ($image) { ?>
          <div class="hot-topic-link-image" style="background-image: url('<?php echo $image['url']; ?>"></div>
        <?php } else {
          $image = get_field('qa_image', 'option'); ?>
         <div class="hot-topic-link-image" style="background-image: url('<?php echo $image['url']; ?>"></div>
      <?php } ?>
      </div>
    </div>
    <div class="col-xs-12">
      <?php $qa_link = get_field('qa_link');

        if ($qa_link) { ?>
          <div class="hot-topic-button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            <a href="<?php echo $qa_link ?>">按此問問題</a>
            </div>
        <?php } else {
          $qa_link = get_field('qa_link', 'option'); ?>
         <div class="hot-topic-button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
          <a href="<?php echo $qa_link ?>">按此問問題</a>
          </div>
      <?php } ?>

    </div>
  </div>
</div>