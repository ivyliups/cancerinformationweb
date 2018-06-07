<?php
/**
* Template Name: Event Detail Tmeplate
*/

get_header(); ?>

<?php 
  $categories = get_the_category(); 
  $cat_name = $categories[0]->cat_name;
  $cat_slug = $categories[0]->slug;
  $date = get_the_date('d-m-Y');
   $thumbnail = get_the_post_thumbnail_url();

  $queried_object = get_queried_object();

  $categorie_two = get_the_category( $queried_object->ID );
  $term_list = wp_get_post_terms( $queried_object->ID, 'event_categories', array( 'fields' => 'names' ) );
  // echo '<pre>',print_r($categorie_two,1),'</pre>';
  // echo '<pre>',print_r($queried_object,1),'</pre>';
  // echo '<pre>',print_r($term_list,1),'</pre>';
  $today = date("Y-m-d");
  $the_end_date = get_field('end_date');
  $today_time = strtotime($today);
  $expire_time = strtotime($the_end_date);
?>
    
<div class="main-content">
  <div class="inner-page">
  <!--=================================
  inner -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-9">
        <div class="inner-title-wrap cancer-inner-title-wrap">
          <div class="inner-title">城中活動</div>
          <div class="breadcrumb">
            <span class="color-orange">全部</span>
          </div> 
        </div>



        <div class="inner-content">
          <div class="row">
            <div class="col-sm-12">
              <div class="news-list-item-wrap">
                <div class="event-top-left-line"></div>
                <div class="event-detail-cate"><?php echo $term_list[0]; ?></div>
              </div>
            </div>
          </div>

          <div class="event-detail-content">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="event-list-item event-detail-title"><?php the_title(); ?></div>
                <div class="event-list-item event-detail-date">開始日期: <?php the_field('start_date'); ?></div>
                <div class="event-list-item event-detail-date">結束日期: <?php the_field('end_date'); ?></div>
                <div class="event-list-item event-detail-place">地點: <?php the_field('place'); ?></div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <div class="text-center"><img src="<?php echo $thumbnail;?>" class="img-responsive"></div>
                <?php
                if(get_field('contact')){?>
                  <div class="contact-no">報名及查詢: <?php the_field('contact'); ?><span>(辦公時間)</span></div>
                <?php }?>
              </div>
            </div>
            <div class="single-event-content">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
              the_content();
              endwhile; else: ?>
              <p>没有內容</p>
              <?php endif; ?>
            </div>
          </div>

          <!-- <div class="event-detail-apply">
            <div class="article-header detail-article-header">
              <h2>網上報名</h2>
            </div>
            <div class="event-detail-apply-inner">
              <div class="event-detail-notice">請填寫以下表格作報名講座/活動，並自動成為本網站會員。</div>
              <div class="event-detail-event-item">報名項目: <span class="event-detail-event-title"></span></div>
            </div>
          </div> -->
          <!-- expire_time: <?php echo $expire_time; ?><br/>
          today_time: <?php echo $today_time; ?> -->
          <?php if ($today_time < $expire_time) { ?>
            <div class="event-detail">
              <?php echo do_shortcode( '[contact-form-7 id="3425" title="Event Form"]' ); ?>
            </div>
          <?php }  ?>
          
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
