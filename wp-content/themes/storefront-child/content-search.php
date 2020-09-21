<?php
global $post;
$post_id = $post->ID;
$landing_link = get_field('landing-link', $post_id);
$link = $landing_link ?: get_permalink($post_id);

if (in_array(4, (array)$post->post_category, true)) {
    $link = get_permalink(11) . '#' . $post->post_name;
}
?>
<div class="col-md-12">
    <div class="news-item">
        <a href="<?= $link ?>" class="news-item__img">
            <?= get_the_post_thumbnail($post->ID) ?>
        </a>
        <div class="news-item__content">
            <div class="news-item__content-title"><?= $post->post_title ?></div>
            <div class="news-item__content-descr">
                <?= mb_strimwidth($post->post_content, 0, 200, '...') ?>
            </div>
            <a href="<?= $link ?>" class="news-item__content-link">
                <svg class="icon">
                    <use xlink:href="#arrow"></use>
                </svg>
            </a>
        </div>
    </div>
</div>
