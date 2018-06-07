<form role="search" method="get" id="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group custom-searh">
        <input type="text" class="form-control" placeholder="<?php echo esc_attr('內容...', 'presentation'); ?>" name="s" id="search-input" value="<?php echo esc_attr(get_search_query()); ?>" />
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">搜尋</button>
        </span>
    </div>
</form>
<style>
    @media (max-width: 369px) {
        .custom-searh {
            width: 150px;
        }
    }
    @media (max-width: 309px) {
        .custom-searh {
            display: none;
        }
    }
</style>