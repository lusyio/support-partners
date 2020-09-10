<?php
/*
Template Name: about
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
         <a class="breadcrumb-primary__link breadcrumb-primary__link_active" href="#">О компании</a>
      </li>
   </ul>
</div>

<section class="values">
   <div class="container">
      <h2 class="heading">Наши ценности</h2>
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="values__inner">
               <?php the_field('values_descr'); ?>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="specialists">
   <div class="container">
      <h2 class="heading">Наша команда</h2>
      <div class="row">
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-1.jpg" alt="">
               </a>
               <div class="specialists__card-title">Светлана Никитина</div>
               <div class="specialists__card-descr">Руководитель практики <br> Потребительские рынки</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-2.jpg" alt="">
               </a>
               <div class="specialists__card-title">Имя Фамилия</div>
               <div class="specialists__card-descr">Должность</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-3.jpg" alt="">
               </a>
               <div class="specialists__card-title">Станислав Сметана</div>
               <div class="specialists__card-descr">Ведущий эксперт <br> практики Промышленность</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-4.jpg" alt="">
               </a>
               <div class="specialists__card-title">Людмила Ушакова</div>
               <div class="specialists__card-descr">Управляющий партнёр, <br> Руководитель практики <br> Стратегические
                  сессии</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-5.jpg" alt="">
               </a>
               <div class="specialists__card-title">Имя Фамилия</div>
               <div class="specialists__card-descr">Должность</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-6.jpg" alt="">
               </a>
               <div class="specialists__card-title">Имя Фамилия</div>
               <div class="specialists__card-descr">Должность</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-7.jpg" alt="">
               </a>
               <div class="specialists__card-title">Соколова Анна</div>
               <div class="specialists__card-descr">Консультант практики <br> Потребительские рынки</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-8.jpg" alt="">
               </a>
               <div class="specialists__card-title">Елена Макеева</div>
               <div class="specialists__card-descr">Руководитель практики <br> IT\Digital\Telco</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-3">
            <div class="specialists__card">
               <a href="#" class="specialists__card-img">
                  <img src="/wp-content/themes/storefront-child/img/specialists/img-9.jpg" alt="">
               </a>
               <div class="specialists__card-title">Антон Миллер</div>
               <div class="specialists__card-descr">Руководитель практики <br> Финансы и Инвестиции</div>
               <a class="specialists__card-link" href="#">Подробнее</a>
            </div>
         </div>
         <div class="col-md-3">
            <a href="#" class="specialists__card specialists__card_empty">
               <div class="specialists__card-title">Стать частью <br> команды</div>
               <div class="specialists__card-imgwrap">
                  <img class="specialists__card-img" src="/wp-content/themes/storefront-child/svg/cup.svg" alt="">
               </div>
               <svg class="icon">
                  <use xlink:href="#arrow"></use>
               </svg>
            </a>
         </div>
      </div>
   </div>
</section>

<div class="heading__wrap heading__wrap_about">
   <div class="container">
      <h2 class="heading">Наши достижения</h2>
   </div>
</div>

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
      <div class="row align-items-center">
         <div class="col-md-2">
            <img src="/wp-content/themes/storefront-child/svg/clients/cargill.svg" alt="">
         </div>
         <div class="col-md-2">
            <img src="/wp-content/themes/storefront-child/svg/clients/helloggs.svg" alt="">
         </div>
         <div class="col-md-3">
            <img src="/wp-content/themes/storefront-child/svg/clients/unicredit.svg" alt="">
         </div>
         <div class="col-md-2">
            <img src="/wp-content/themes/storefront-child/svg/clients/knauf.svg" alt="">
         </div>
         <div class="col-md-3">
            <img src="/wp-content/themes/storefront-child/svg/clients/avon.svg" alt="">
         </div>
      </div>
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
               <div class="benefits__item-img"><img src="/wp-content/themes/storefront-child/svg/benefits/rocket.svg" alt=""></div>
               <div class="benefits__item-descr">
                  Мы работаем быстрее, чем большие компании executive search со сложной иерархией и
                  бюрократическими процедурами
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="benefits__item">
               <div class="benefits__item-img"><img src="/wp-content/themes/storefront-child/svg/benefits/like.svg" alt=""></div>
               <div class="benefits__item-descr">
                  Мы не опускаем руки, когда клиенты ставят сложные задачи или меняют видение
                  проекта по мере знакомства
                  с представленными кандидатами
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="benefits__item">
               <div class="benefits__item-img"><img src="/wp-content/themes/storefront-child/svg/benefits/boss.svg" alt=""></div>
               <div class="benefits__item-descr">
                  Зрелость наших консультантов, глубоко знающих свои рынки, позволяет нам найти
                  кандидатов, недоступных большинству конкурентов
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="benefits__item">
               <div class="benefits__item-img"><img src="/wp-content/themes/storefront-child/svg/benefits/job.svg" alt=""></div>
               <div class="benefits__item-descr">
                  Мы не забираем сотрудников у наших клиентов, и это записано в нашем стандартном
                  контракте
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="benefits__item">
               <div class="benefits__item-img"><img src="/wp-content/themes/storefront-child/svg/benefits/speak.svg" alt=""></div>
               <div class="benefits__item-descr">
                  С нами приятно общаться
                  и поддерживать отношения
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="reviews">
   <div class="container">
      <h2 class="heading">Отзывы</h2>
      <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-6">
            <div class="reviews__item">
               <div class="reviews__item-header">
                  <div class="reviews__item-img">
                     <img src="/wp-content/themes/storefront-child/img/reviews/img-1.png" alt="">
                  </div>
                  <div>
                     <div class="reviews__item-title">Иванов Иван</div>
                     <div class="reviews__item-subtitle">Генеральный директор «Ромашка»</div>
                  </div>
               </div>
               <div class="reviews__item-descr">
                  Мы работаем быстрее, чем большие компании executive search со сложной иерархией
                  и бюрократическими процедурами
               </div>
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
   </div>
</section>


<?php get_footer(); ?>