<?php
/*
Template Name: new
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>

    <div class="new-post">
        <div class="container">
            <!--            catSlug($post->post_category[0]) === 'cases')-->
            <?= get_the_post_thumbnail($post->ID) ?>
            <h1 class="new-post__title"><?= $post->post_title ?></h1>
            <?php the_content() ?>
        </div>
    </div>

<?php get_footer(); ?>