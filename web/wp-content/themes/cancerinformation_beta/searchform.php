<?php
/**
 * default search form
 */
?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group custom-searh">
      <input type="text" class="form-control" placeholder="<?php echo esc_attr( '內容...', 'presentation' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
      <input type="hidden" name="post_type" value="<?php echo htmlspecialchars($_GET["post_type"]) ?>">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">搜尋</button>
      </span>
      
    </div><!-- /input-group -->
</form>