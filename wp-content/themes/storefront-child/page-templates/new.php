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
            <!--            catSlug($post->post_category[0]) === 'cases')-->
            <?= get_the_post_thumbnail($post->ID) ?>
            <h1 class="new-post__title"><?= $post->post_title ?></h1>
            <?php the_content() ?>
        </div>
    </div>

<?php get_footer(); ?>