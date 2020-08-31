<?php
/*
Template Name: products
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>


<section class="intro">
   <div class="container">
      <div class="intro__inner" style="background: linear-gradient(180.13deg,rgba(0, 88, 150, 0.3) 0.11%,#005896 98.33%), url(/wp-content/themes/storefront-child/img/intro/products.png) center center / cover no-repeat;">
         <h2 class="intro__title">онлайн-продукты</h2>
      </div>
   </div>
</section>

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

<div class="product">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="product__item">
               <div class="product__item-title">Командос</div>
               <div class="product__item-descr">
                  Онлайн-тренинг для руководителей, которые
                  хотят внедрить в бизнес инновационные
                  практики управления, найма, мотивации
                  и вовлечения команды
               </div>
               <a href="#" class="product__item-link">Узнать больше</a>
            </div>
         </div>
         <div class="col-md-6">
            <img src="/wp-content/themes/storefront-child/img/product/img-1.png" alt="">
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <img src="/wp-content/themes/storefront-child/img/product/img-1.png" alt="">
         </div>
         <div class="col-md-6">
            <div class="product__item">
               <div class="product__item-title">Карьера</div>
               <div class="product__item-descr">
                  Онлайн-тренинг для руководителей, которые
                  хотят внедрить в бизнес инновационные
                  практики управления, найма, мотивации
                  и вовлечения команды
               </div>
               <a href="#" class="product__item-link">Узнать больше</a>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="product__item">
               <div class="product__item-title">Частная практика</div>
               <div class="product__item-descr">
                  Онлайн-тренинг для руководителей, которые
                  хотят внедрить в бизнес инновационные
                  практики управления, найма, мотивации
                  и вовлечения команды
               </div>
               <a href="#" class="product__item-link">Узнать больше</a>
            </div>
         </div>
         <div class="col-md-6">
            <img src="/wp-content/themes/storefront-child/img/product/img-1.png" alt="">
         </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>