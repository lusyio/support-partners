<?php
/*
Template Name: about
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>

    <section class="values">
        <div class="container">
            <h2 class="heading">Наши ценности</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="values__inner">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= get_team(11) ?>

<!--    <div class="heading__wrap heading__wrap_about">-->
<!--        <div class="container">-->
<!--            <h2 class="heading">Наши достижения</h2>-->
<!--        </div>-->
<!--    </div>-->

    <section class="clients">
        <div class="container">
            <h2 class="heading">Наши клиенты</h2>
            <?= get_field('client_gallery', 9) ?>
        </div>
    </section>

    <div class="container">
        <h2 class="heading mb-5">Преимущества</h2>
    </div>

    <section class="benefits">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="benefits__item">
                        <div class="benefits__item-img"><img
                                    src="/wp-content/themes/storefront-child/svg/benefits/rocket.svg" alt=""></div>
                        <div class="benefits__item-descr">
                            Мы работаем быстрее, чем большие компании executive search со сложной иерархией и
                            бюрократическими процедурами
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefits__item">
                        <div class="benefits__item-img"><img
                                    src="/wp-content/themes/storefront-child/svg/benefits/like.svg" alt=""></div>
                        <div class="benefits__item-descr">
                            Мы не опускаем руки, когда клиенты ставят сложные задачи или меняют видение
                            проекта по мере знакомства
                            с представленными кандидатами
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefits__item">
                        <div class="benefits__item-img"><img
                                    src="/wp-content/themes/storefront-child/svg/benefits/boss.svg" alt=""></div>
                        <div class="benefits__item-descr">
                            Зрелость наших консультантов, глубоко знающих свои рынки, позволяет нам найти
                            кандидатов, недоступных большинству конкурентов
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefits__item">
                        <div class="benefits__item-img"><img
                                    src="/wp-content/themes/storefront-child/svg/benefits/job.svg" alt=""></div>
                        <div class="benefits__item-descr">
                            Мы не забираем сотрудников у наших клиентов, и это записано в нашем стандартном
                            контракте
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefits__item">
                        <div class="benefits__item-img"><img
                                    src="/wp-content/themes/storefront-child/svg/benefits/speak.svg" alt=""></div>
                        <div class="benefits__item-descr">
                            С нами приятно общаться
                            и поддерживать отношения
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= getReviews(18) ?>

<?php get_footer(); ?>