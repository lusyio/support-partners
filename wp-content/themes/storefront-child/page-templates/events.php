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
         <div class="upcoming-events__img">
            <img src="/wp-content/themes/storefront-child/img/events/img-1.png" alt="dreamteamforum">
         </div>
         <div class="upcoming-events__content">
            <div class="upcoming-events__content-title">#dreamteamforum</div>
            <div class="upcoming-events__content-descr">Масштабная конференция о создании <br> сильных команд</div>
            <div class="upcoming-events__content-date">08.11.2020</div>
            <a href="#" class="upcoming-events__content-link">
               Узнать больше
               <svg class="arrow">
                  <use xlink:href="#arrow-white"></use>
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
            <div class="past-events__item">
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
            </div>
         </div>
         <div class="col-md-4">
            <div class="past-events__item">
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
            </div>
         </div>
         <div class="col-md-4">
            <div class="past-events__item">
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
            </div>
         </div>
      </div>
   </div>
</section>



<svg width="0" height="0" class="hidden">
   <symbol viewBox="0 0 82 10" fill="none" xmlns="http://www.w3.org/2000/svg" id="arrow-white">
      <path d="M81.46 5.46a.65.65 0 0 0 0-.92L77.323.404a.65.65 0 1 0-.92.919L80.082 5l-3.677 3.677a.65.65 0 0 0 .919.92L81.46 5.46zM0 5.65h81v-1.3H0v1.3z" fill="#fff"></path>
   </symbol>
</svg>


<?php get_footer(); ?>