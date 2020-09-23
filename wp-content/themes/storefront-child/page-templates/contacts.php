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
                <div class="col-lg-4 col-12">
                    <div class="contacts__content">
                        <?php
                        $phone = get_field('phone');
                        $address = get_field('address');
                        $telegram = get_field('telegram');
                        ?>
                        <?php if ($address): ?>
                            <address class="contacts__content-address">
                                <?= $address ?>
                            </address>
                        <?php endif; ?>
                        <div class="contacts__social">
                            <?php if ($telegram): ?>
                                <a href="<?= $telegram ?>" class="contacts__social-link"><?= $telegram ?></a>
                            <?php endif;
                            if ($phone): ?>
                                <a href="tel:<?= $phone ?>" class="contacts__social-link"><?= $phone ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="contacts__map">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae80ffcb59c171efcc95e96855e7ac2a63f3fe26a5dc703b0f60a59ffa6108733&amp;source=constructor"
                                width="500" height="400" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>