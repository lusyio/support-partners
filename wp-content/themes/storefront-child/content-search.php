<div class="col-md-12">
    <div class="news-item">
        <a href="<?= get_post_permalink($post->ID) ?>" class="news-item__img">
            <?= get_the_post_thumbnail($post->ID) ?>
        </a>
        <div class="news-item__content">
            <div class="news-item__content-title"><?= $post->post_title ?></div>
            <div class="news-item__content-descr">

                <?= mb_strimwidth($post->post_content, 0, 200, '...') ?>
            </div>
            <a href="<?= get_post_permalink($post->ID) ?>" class="news-item__content-link">
                <svg class="icon">
                    <use xlink:href="#arrow"></use>
                </svg>
            </a>
        </div>
    </div>
</div>
