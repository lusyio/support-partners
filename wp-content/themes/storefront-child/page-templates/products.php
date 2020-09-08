<?php
/*
Template Name: products
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
                <a class="breadcrumb-primary__link breadcrumb-primary__link_active" href="#">Онлайн-продукты</a>
            </li>
        </ul>
    </div>


<?= get_online_products(6) ?>

<?php get_footer(); ?>