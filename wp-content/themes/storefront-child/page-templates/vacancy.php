<?php
/*
Template Name: vacancy
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>

    <div class="vacancy">
        <div class="vacancy__header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="vacancy__header-title"><?= $post->post_title ?></h1>
                        <h2 class="vacancy__header-subtitle"><?= get_field('salary') ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="vacancy__body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="vacancy__body-inner">
                            <ul class="vacancy__body-list">
                                <li>График</li>
                                <li>Опыт работы</li>
                                <li>Образование</li>
                            </ul>
                            <ul class="vacancy__body-list">
                                <li><?= get_field('schedule') ?></li>
                                <li><?= get_field('work_exp') ?></li>
                                <li><?= get_field('education') ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <?php the_content() ?>
                </div>
                <!--         <div class="row">-->
                <!--            <div class="col-md-12">-->
                <!--               <div class="vacancy__body-item">-->
                <!--                  <h2 class="vacancy__subtitle">Обязанности</h2>-->
                <!--                  <div class="vacancy__body-sublist vacancy__body-sublist_unmarked">-->
                <!--                     <li>Развитие бизнеса (10 точек);</li>-->
                <!--                     <li>Организация бесперебойной работы мини-кафе в Бизнес- центре;</li>-->
                <!--                     <li>Обеспечение выполнения основных финансовых показателей;</li>-->
                <!--                     <li>Бюджетирование;</li>-->
                <!--                     <li>Контроль расходов и прибыли, анализ и оптимизация затрат, ведение отчетной документации;</li>-->
                <!--                     <li>Контроль документооборота;</li>-->
                <!--                  </div>-->
                <!--               </div>-->
                <!--            </div>-->
                <!--         </div>-->
                <!--         <div class="row">-->
                <!--            <div class="col-md-12">-->
                <!--               <div class="vacancy__body-item">-->
                <!--                  <h2 class="vacancy__subtitle">Условия</h2>-->
                <!--                  <div class="vacancy__body-sublist vacancy__body-sublist_marked">-->
                <!--                     <li>график работы 5/2 с 9-18</li>-->
                <!--                     <li>много работы, интересные задачи</li>-->
                <!--                     <li>дружный коллектив</li>-->
                <!--                     <li>официальное оформление</li>-->
                <!--                     <li>зп по результатам собеседования (в зависимости от опыта и навыков)</li>-->
                <!--                     <li>своевременная выплата заработной платы 2 раза в месяц</li>-->
                <!--                     <li>оплачиваемый отпуск</li>-->
                <!--                     <li>офис м. Краснопресненская</li>-->
                <!--                  </div>-->
                <!--               </div>-->
                <!--            </div>-->
                <!--         </div>-->
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
                            <textarea name="message"
                                      placeholder="Расскажите, почему вы хотите работать именно в этой компании"
                                      required></textarea>
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