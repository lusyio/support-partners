<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-12">
                <main id="main" class="site-main" role="main">

                    <?php if (have_posts()) : ?>

                        <?php
                        get_template_part('loop');

                    else :

                        get_template_part('content', 'none');

                    endif;
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
<?php
get_footer();
