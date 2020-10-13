<?php
/*
Template Name: main-landing
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>

<div class="swiper-container swiper-container-header main-slider mt-5">
    <div class="swiper-wrapper">
        <?= get_events_slides() ?>
        <?= get_main_slides() ?>
    </div>
    <div class="container">
        <div class="main-slider__control">
            <a href="<?= get_permalink(21) ?>">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="1.32353" cy="1.32353" r="1.32353" fill="black" fill-opacity="0.5"/>
                    <circle cx="1.32353" cy="7.5" r="1.32353" fill="black" fill-opacity="0.5"/>
                    <circle cx="1.32353" cy="13.6765" r="1.32353" fill="black" fill-opacity="0.5"/>
                    <circle cx="7.49931" cy="1.32353" r="1.32353" fill="black" fill-opacity="0.5"/>
                    <circle cx="7.49931" cy="7.5" r="1.32353" fill="black" fill-opacity="0.5"/>
                    <circle cx="7.49931" cy="13.6765" r="1.32353" fill="black" fill-opacity="0.5"/>
                    <circle cx="13.677" cy="1.32353" r="1.32353" fill="black" fill-opacity="0.5"/>
                    <circle cx="13.677" cy="7.5" r="1.32353" fill="black" fill-opacity="0.5"/>
                    <circle cx="13.677" cy="13.6765" r="1.32353" fill="black" fill-opacity="0.5"/>
                </svg>
                Контакты
            </a>
            <div>
                <div id="numberSlides" class="main-slider__count">
                    <span>3</span>/6
                </div>
                <div class="main-slider__btns">
                    <div class="carousel-control-prev carousel-control"
                         data-slide="prev">
                        <svg class="icon">
                            <use xlink:href="#arrow"></use>
                        </svg>
                    </div>
                    <div class="carousel-control-next carousel-control"
                         data-slide="next">
                        <svg class="icon">
                            <use xlink:href="#arrow"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= getLastThreeEvents(9) ?>

<section class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="about__inner">
                    <h2 class="about__heading"><?php the_field('about_heading'); ?></h2>
                    <div class="about__subheading"><?php the_field('about_subheading'); ?></div>
                    <div class="about__descr">
                        <?php the_field('about_descr'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="about__img">
                    <?= get_field('about_photo') ? '<img src=' . get_field('about_photo') . '" alt="' . strip_tags(get_field('about_heading')) . '">'
                        : '<img src="/wp-content/themes/storefront-child/img/about.jpg" alt="">' ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= getCycle(12) ?>

<?= getCases(7) ?>

<?= get_clients(get_field('client_gallery', 9, false)) ?>

<section class="feedback">
    <div class="container">
        <h2 class="heading">Обсудить сотрудничество</h2>
        <?= do_shortcode('[caldera_form id="CF5f69e12d73670"]') ?>
    </div>
</section>

<script>
    const swiperHeader = new Swiper('.swiper-container-header', {
        navigation: {
            nextEl: '.carousel-control-next',
            prevEl: '.carousel-control-prev',
        },
        runCallbacksOnInit: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        on: {
            init: function () {
                const offer = document.querySelector('#numberSlides');
                offer.innerHTML = `<span>${this.activeIndex + 1}</span>/${this.slides.length}`
            },
            slideChange: function () {
                const offer = document.querySelector('#numberSlides');
                offer.innerHTML = `<span>${this.activeIndex + 1}</span>/${this.slides.length}`
            }
        },
    });

    const swiperCase = new Swiper('.swiper-container-case', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
        }
    });
</script>

<?php get_footer(); ?>
