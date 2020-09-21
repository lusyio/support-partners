<div class="search-div">
    <form id="searchForm" role="search" method="get" class="search-form"
          action="<?php echo esc_url(home_url('/')); ?>">
        <div class="input-group search-field-group">
            <input type="search" class="search-field form-control" placeholder="Введите текст"
                   value="<?php echo esc_attr(get_search_query()); ?>" name="s" required
                   title="<?php _ex('Search for:', 'label', 'wp-bootstrap-starter'); ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Найти</button>
            </div>
        </div>
    </form>
</div>
