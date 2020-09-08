<div class="col-md-4">
    <div class="works__item">
        <div class="works__item-title"><?= $post->post_title ?></div>
        <div class="works__item-img">
            <a href="<?= get_post_permalink($post->ID) ?>">
                <?= get_the_post_thumbnail($post->ID) ?>
            </a>
        </div>
        <div class="works__item-box">
            <div class="works__item-descr">
                <?= $post->post_content ?>
            </div>
            <a href="<?= get_post_permalink($post->ID) ?>" class="works__item-link">
                Узнать больше
                <svg class="icon">
                    <use xlink:href="#arrow"></use>
                </svg>
            </a>
        </div>
    </div>
</div>