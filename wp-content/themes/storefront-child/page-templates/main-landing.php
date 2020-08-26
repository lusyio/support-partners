<?php
/*
Template Name: main-landing
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>


<div class="main-screen">
    <div class="container pt-5 pb-5">
        <div class="row no-gutters">
            <div class="col-6">
                <div class="main-screen__date">27.06.2020</div>
                <h1 class="main-screen__title">название мероприятия</h1>
                <div class="main-screen__descr">Масштабная конференция о создании сильных команд</div>
                <div class="main-screen__inner">
                    <button class="main-screen__btn btn-primary">Узнать больше</button>
                    <a class="main-screen__link" href="#">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="16" r="15.35" stroke="#ED002F" stroke-width="1.3" />
                            <path d="M22.3496 16L12.8258 21.4985L12.8258 10.5014L22.3496 16Z" fill="#ED002F" />
                        </svg>
                        Смотреть видео
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="video-plug">
                    <img src="/wp-content/themes/storefront-child/img/video-plug.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>