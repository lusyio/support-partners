<?php
/**
 * The template for displaying search results pages.
 *
 * @package storefront
 */

get_header(); ?>
    <div class="container pb-5">
        <div class="row">
            <div id="primary" class="col-sm-12">
                <main id="main" class="site-main" role="main">

                    <?php if (have_posts()) : ?>

                        <header class="page-header">
                            <h1 class="page-title mb-5">
                                <?php
                                /* translators: %s: search term */
                                printf(esc_attr__('Search Results for: %s', 'storefront'), '<span>' . get_search_query() . '</span>');
                                ?>
                            </h1>
                        </header>

                        <?php
                        get_template_part('loop');

                    else :

                        get_template_part('content', 'none');

                    endif;
                    ?>

                </main>
            </div>
        </div>
    </div>
<?php
get_footer();
