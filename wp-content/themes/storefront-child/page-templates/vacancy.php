<?php
/*
Template Name: vacancy
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
         <a class="breadcrumb-primary__link breadcrumb-primary__link_active" href="#">Услуги</a>
      </li>
      <li class="breadcrumb-primary__separator">/</li>
      <li>
         <a class="breadcrumb-primary__link breadcrumb-primary__link_active" href="#">Вакансия Директор по развитию</a>
      </li>
   </ul>
</div>

<div class="vacancy">
   <div class="vacancy__header">
      <div class="container">
         <h1 class="vacancy__header-title">Директор по развитию</h1>
         <h2 class="vacancy__header-subtitle">100 000 - 150 000 руб</h2>
      </div>
   </div>
   <div class="vacancy__body">
      <div class="container">
         <div class="vacancy__body-inner">
            <ul class="vacancy__body-list">
               <li>График</li>
               <li>Опыт работы</li>
               <li>Образование</li>
            </ul>
            <ul class="vacancy__body-list">
               <li>Полный рабочий день</li>
               <li>От 5 лет</li>
               <li>Высшее</li>
            </ul>
         </div>
         <div class="vacancy__body-item">
            <h2 class="vacancy__body-item-title">Обязанности</h2>
            <div class="vacancy__item-text">
               Развитие бизнеса (10 точек); <br>
               Организация бесперебойной работы мини-кафе в Бизнес- центре; <br>
               Обеспечение выполнения основных финансовых показателей; <br>
               Бюджетирование; <br>
               Контроль расходов и прибыли, анализ и оптимизация затрат, ведение отчетной документации; <br>
               Контроль документооборота; <br>
            </div>
         </div>
         <div class="vacancy__body-item">
            <h2 class="vacancy__body-item-title">Условия</h2>
            <div class="vacancy__item-text">
               - график работы 5/2 с 9-18 <br>
               - много работы, интересные задачи <br>
               - дружный коллектив <br>
               - официальное оформление <br>
               - зп по результатам собеседования (в зависимости от опыта и навыков) <br>
               - своевременная выплата заработной платы 2 раза в месяц <br>
               - оплачиваемый отпуск <br>
               - офис м. Краснопресненская <br>
            </div>
         </div>
      </div>
   </div>
   <div class="vacancy__footer">
      <div class="container">
         <h3 class="vacancy__footer-title">Откликнуться на вакансию</h3>
         <div class="row no-gutters">
            <div class="col-md-8">
               <form action="#">
                  <input type="text" name="name" placeholder="Имя Фамилия Отчество" required>
                  <input type="tel" name="tel" placeholder="Мобильный телефон" required>
                  <input type="email" name="email" placeholder="Электронная почта" required>
                  <label for="check">
                     <input type="checkbox" name="" id="check">
                     Добавить сопроводительное письмо
                  </label>
                  <textarea name="message" placeholder="Расскажите, почему вы хотите работать именно в этой компании" required></textarea>
                  <button class="btn-primary" type="submit">Отправить</button>
               </form>
            </div>
            <div class="col-md-4">
               <button class="vacancy__footer-file">
                  <img src="/wp-content/themes/storefront-child/svg/pen.svg" alt="">
                  <div>
                     <span>Прикрепить файл с резюме</span>
                     <span>до 5 Mb doc, docx, pdf</span>
                  </div>
               </button>
               <input type="file" name="file">
            </div>
         </div>
      </div>
   </div>
</div>



<?php get_footer(); ?>