<div class="search-div">
    <form id="searchForm" role="search" method="get" class="search-form"
          action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" class="search-field form-control"
               placeholder="Поиск"
               value="<?php echo esc_attr(get_search_query()); ?>" name="s"
               title="<?php _ex('Search for:', 'label', 'wp-bootstrap-starter'); ?>">
    </form>
</div>
