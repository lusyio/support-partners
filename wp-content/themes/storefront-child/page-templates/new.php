<?php
/*
Template Name: new
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>


    <div class="container">
        <ul class="breadcrumb-primary">
            <li>
                <a class="breadcrumb-primary__link" href="#">Главная</a>
            </li>
            <li class="breadcrumb-primary__separator">/</li>
            <li>
                <a class="breadcrumb-primary__link breadcrumb-primary__link_active" href="#">Проект 1</a>
            </li>
            <li class="breadcrumb-primary__separator">/</li>
            <li>
                <a class="breadcrumb-primary__link breadcrumb-primary__link_active" href="#">Кейсы</a>
            </li>
        </ul>
    </div>

    <div class="new-post">
        <div class="container">
            <?php if (catSlug($post->post_category[0]) === 'cases'): ?>
                <div class="new-post__cases">
                    <?= get_the_post_thumbnail($post->ID) ?>
                </div>
            <?php else: ?>
                <?= get_the_post_thumbnail($post->ID) ?>
            <?php endif; ?>
            <h1 class="new-post__title"><?= $post->post_title ?></h1>
            <?php the_content() ?>
        </div>
    </div>

<?php get_footer(); ?>