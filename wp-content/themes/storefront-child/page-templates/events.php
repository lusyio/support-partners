<?php
/*
Template Name: events
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
         <a class="breadcrumb-primary__link breadcrumb-primary__link_active" href="#">Мероприятия</a>
      </li>
   </ul>
</div>

<section class="upcoming-events">
   <div class="container">
      <h2 class="upcoming-events__title">Предстоящие мероприятия</h2>
      <div class="upcoming-events__inner">
         <a href="#" class="upcoming-events__img">
            <img src="/wp-content/themes/storefront-child/img/events/img-1.png" alt="dreamteamforum">
         </a>
         <div class="upcoming-events__content">
            <div class="upcoming-events__content-title">#dreamteamforum</div>
            <div class="upcoming-events__content-descr">Масштабная конференция о создании <br> сильных команд</div>
            <div class="upcoming-events__content-date">08.11.2020</div>
            <a href="#" class="upcoming-events__content-link">
               Узнать больше
               <svg class="icon">
                  <use xlink:href="#arrow"></use>
               </svg>
            </a>
         </div>
      </div>
   </div>
</section>

<section class="past-events">
   <div class="container">
      <h2 class="past-events__title">Прошедшие мероприятия</h2>
      <div class="row">
         <div class="col-md-4">
            <a href="#" class="past-events__item">
               <div class="past-events__item-header">
                  <div class="past-events__item-img">
                     <img src="/wp-content/themes/storefront-child/img/events/img-2.png" alt="">
                  </div>
                  <div class="past-events__item-date">08.11.2019</div>
               </div>
               <div class="past-events__item-content">
                  <div class="past-events__item-wrap">
                     <div class="past-events__item-title">extreme <br> #dreamteamforum</div>
                  </div>
                  <div class="past-events__item-descr">Бизнес-встреча об управлении командой компании в экстремальных условиях</div>
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="#" class="past-events__item">
               <div class="past-events__item-header">
                  <div class="past-events__item-img">
                     <img src="/wp-content/themes/storefront-child/img/events/img-2.png" alt="">
                  </div>
                  <div class="past-events__item-date">08.11.2019</div>
               </div>
               <div class="past-events__item-content">
                  <div class="past-events__item-wrap">
                     <div class="past-events__item-title">командос</div>
                  </div>
                  <div class="past-events__item-descr">Открытая программа для руководителей, которые <br> хотят внедрить в бизнес инновационные практики управления</div>
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="#" class="past-events__item">
               <div class="past-events__item-header">
                  <div class="past-events__item-img">
                     <img src="/wp-content/themes/storefront-child/img/events/img-2.png" alt="">
                  </div>
                  <div class="past-events__item-date">08.11.2019</div>
               </div>
               <div class="past-events__item-content">
                  <div class="past-events__item-wrap">
                     <div class="past-events__item-title">клубный формат <br> upgreat</div>
                  </div>
                  <div class="past-events__item-descr">Самое яркое и полезное <br> HR-событие весны для тех, <br> кто развивается и делает карьеру в HR</div>
               </div>
            </a>
         </div>
      </div>
   </div>
</section>


<?php get_footer(); ?>