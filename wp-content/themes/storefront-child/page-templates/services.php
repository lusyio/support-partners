<?php
/*
Template Name: services
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>

<?= get_services(4) ?>

    <div class="modal sp-modal feedback p-0 fade" id="vacancyModal" tabindex="-1" aria-labelledby="vacancyModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="heading">Обсудить сотрудничество</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="/wp-content/themes/storefront-child/svg/close.svg" alt="close modal">
                    </button>
                    <?= do_shortcode('[caldera_form id="CF5f69e53cf2a2c"]') ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>