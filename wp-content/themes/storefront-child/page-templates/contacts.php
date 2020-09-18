<?php
/*
Template Name: contacts
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>

<div class="contacts">
   <div class="container">
      <div class="row no-gutters align-items-center">
         <div class="col-md-4">
            <div class="contacts__content">
               <address class="contacts__content-address">
                  <span>Москва</span>
                  <div>
                     Метро Парк Культуры, <br>
                     БЦ Крымский мост
                  </div>
                  <div>Турчанинов переулок 6, <br> строение 2</div>
               </address>
               <div class="contacts__social">
                  <a href="#" class="contacts__social-link">cv@support-partners.ru</a>
                  <a href="tel:+74991101095" class="contacts__social-link">+7 (499)-110-10-95</a>
               </div>
            </div>
         </div>
         <div class="col-md-8">
            <div class="contacts__map">
               <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae80ffcb59c171efcc95e96855e7ac2a63f3fe26a5dc703b0f60a59ffa6108733&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>
            </div>
         </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>