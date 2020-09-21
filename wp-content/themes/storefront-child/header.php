<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
    <!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
              rel="stylesheet">
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

<?php do_action('storefront_before_site'); ?>

<div id="page" class="hfeed site">
<?php do_action('storefront_before_header'); ?>

    <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

        <div class="container">
            <nav class="navbar navbar-light navbar-expand-xl p-0 justify-content-between">
                <div class="navbar-brand">
                    <a href="<?= get_home_url() ?>">
                        <img src="/wp-content/themes/storefront-child/svg/logo.svg" alt="logo">
                    </a>
                </div>

                <div class="d-flex">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => 'div',
                        'container_id' => '',
                        'container_class' => 'collapse navbar-collapse justify-content-end mr-5',
                        'menu_id' => false,
                        'menu_class' => 'navbar-nav',
                        'depth' => 3,
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker()
                    ));
                    ?>
                    <?php
                    $phone_header = get_field('phone', 21);
                    if ($phone_header): ?>
                        <a class="phone-link" href="tel:<?= $phone_header ?>">
                            <?= $phone_header ?>
                        </a>
                    <?php endif; ?>
                    <div class="outer-menu">
                        <button class="navbar-toggler position-relative" type="button" style="z-index: 1">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <input class="checkbox-toggle" data-toggle="collapse" data-target="#main-nav" aria-controls=""
                               aria-expanded="false" aria-label="Toggle navigation" type="checkbox"/>
                        <div class="menu">
                            <div>
                                <div class="border-header">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'container' => 'div',
                                        'container_id' => 'main-nav',
                                        'container_class' => 'collapse navbar-collapse justify-content-end',
                                        'menu_id' => false,
                                        'menu_class' => 'navbar-nav',
                                        'depth' => 3,
                                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                        'walker' => new wp_bootstrap_navwalker()
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <?php if (!is_front_page() && !is_single() && !is_search()): ?>
            <section class="intro">
                <div class="container">
                    <div class="intro__inner"
                         style="background: linear-gradient(180.13deg, rgba(0, 88, 150, 0.3) 0.11%,#005896 98.33%),url(<?= get_field('image') ?>) center center / cover no-repeat;">
                        <h2 class="intro__title"><?= get_field('title') ?></h2>
                        <div class="intro__descr">
                            <?= get_field('description') ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif ?>


    </header><!-- #masthead -->

<?php if (function_exists('yoast_breadcrumb') && !is_front_page()): ?>
    <div class="container">
        <?php yoast_breadcrumb('<p class="breadcrumb-primary" id="breadcrumbs">', '</p>'); ?>
    </div>
<?php endif; ?>

<?php
/**
 * Functions hooked in to storefront_before_content
 *
 * @hooked storefront_header_widget_region - 10
 * @hooked woocommerce_breadcrumb - 10
 */
do_action('storefront_before_content');
?>

    <!-- <div id="content" class="site-content">
      <div class="container">
          <div class="row"> -->

<?php
do_action('storefront_content_top');
