<?php
/*
Template Name: main-landing
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>

    <div class="swiper-container swiper-container-header main-slider mt-5">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="main-screen main-screen_video">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="main-screen__inner">
                                    <div class="main-screen__date">27.06.2020</div>
                                    <h1 class="main-screen__title">название мероприятия</h1>
                                    <div class="main-screen__descr">Масштабная конференция о создании <br> сильных
                                        команд
                                    </div>
                                    <div>
                                        <button class="main-screen__btn btn-primary">Узнать больше</button>
                                        <a class="main-screen__link" href="#">
                                            <img src="/wp-content/themes/storefront-child/svg/play.svg" alt="">
                                            Смотреть видео
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-screen__video">
                                    <video poster="/wp-content/themes/storefront-child/img/main-screen/video-plug.png"
                                           preload="none" controls>
                                        <source src="https://youtu.be/sZBM492Ufco"
                                                type='video/webm; codecs="vp8, vorbis"'/>
                                        <source src="https://youtu.be/sZBM492Ufco"
                                                type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'/>
                                        <source src="https://youtu.be/sZBM492Ufco"
                                                type='video/ogg; codecs="theora, vorbis"'/>
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="main-screen main-screen_photo">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-screen__inner">
                                    <h1 class="main-screen__title">создаем <br> <span>сильные</span> команды</h1>
                                    <div class="main-screen__descr">Масштабная конференция о создании <br> сильных
                                        команд
                                    </div>
                                    <div>
                                        <button class="main-screen__btn btn-primary">Посмотреть услуги</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-screen__img">
                                    <img src="/wp-content/themes/storefront-child/img/main-screen/img-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-slider__control">
                <a href="">
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
                    <div class="main-slider__count">
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
                        <?= get_field('about_photo')
                            ?: '<img src="/wp-content/themes/storefront-child/img/about.png" alt="">' ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= getCycle(12) ?>

<?= getCasesForMain(7) ?>

    <section class="clients">
        <div class="container">
            <h2 class="heading">Наши клиенты</h2>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <img src="/wp-content/themes/storefront-child/svg/clients/luhta.svg" alt="">
                </div>
                <div class="col-md-2">
                    <img src="/wp-content/themes/storefront-child/svg/clients/skolkovo.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img src="/wp-content/themes/storefront-child/svg/clients/vtb.svg" alt="">
                </div>
                <div class="col-md-2">
                    <img src="/wp-content/themes/storefront-child/svg/clients/forex.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img src="/wp-content/themes/storefront-child/svg/clients/enel.svg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="feedback">
        <div class="container">
            <h2 class="heading">Обсудить сотрудничество</h2>
            <form action="#" class="feedback__form">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Имя Фамилия Отчество">
                        <input type="tel" name="phone" placeholder="Мобильный телефон">
                        <input type="email" name="email" placeholder="Электронная почта">
                        <div class="feedback__form-group">
                            <input type="checkbox" name="" id="check">
                            <label for="check">
                                Я принимаю условия <a href="#">передачи данных</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <textarea name="message" placeholder="Ваше сообщение"></textarea>
                        <button class="feedback__form-btn btn-primary">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        const swiper = new Swiper('.swiper-container-header', {
            navigation: {
                nextEl: '.carousel-control-next',
                prevEl: '.carousel-control-prev',
            },
        });

        const swiperCase = new Swiper('.swiper-container-case', {
            slidesPerView: 3,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

<?php get_footer(); ?>