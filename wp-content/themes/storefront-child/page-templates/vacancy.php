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
            </div>
        </div>

        <div class="vacancy__footer">
            <div class="container">
                <h3 class="vacancy__footer-title">Откликнуться на вакансию</h3>
                <div class="feedback p-0">
                    <?= do_shortcode('[caldera_form id="CF5f69eed40f993"]') ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            document.getElementById('fld_1939953_1').value = '<?= $post->post_title ?>';
        })
    </script>

<?php get_footer(); ?>