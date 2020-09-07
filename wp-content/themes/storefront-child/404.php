<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area col-12">

   <main id="main" class="site-main" role="main">

      <div class="error-404 not-found">

         <div class="page-content">

            <div class="error-nf">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="error-nf__inner">
                           <div class="error-nf__numbers">
                              <div>4</div>
                              <img src="/wp-content/themes/storefront-child/svg/error.svg" alt="">
                              <div>4</div>
                           </div>
                           <div class="error-nf__content">
                              <h1 class="error-nf__content-title">Ошибка</h1>
                              <div class="error-nf__content-descr">К сожалению, запрашиваемая вами страница не найдена</div>
                           </div>
                        </div>
                        <a href="#" class="error-nf__link">
                           <svg class="icon">
                              <use xlink:href="#arrow"></use>
                           </svg>
                           Вернуться на главную
                        </a>
                     </div>
                  </div>
               </div>
            </div>




            <header class="page-header">
               <!-- <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'storefront'); ?></h1> -->
            </header><!-- .page-header -->

            <!-- <p class="error-text"><?php esc_html_e('Nothing was found at this location. Try searching, or check out the links below.', 'storefront'); ?></p>

         					<?php
                        echo '<section aria-label="' . esc_html__('Search', 'storefront') . '">';

                        if (storefront_is_woocommerce_activated()) {
                           the_widget('WC_Widget_Product_Search');
                        } else {
                           get_search_form();
                        }

                        echo '</section>';

                        if (storefront_is_woocommerce_activated()) {

                           echo '<div class="row">';

                           echo '<section class="col" aria-label="' . esc_html__('Promoted Products', 'storefront') . '">';

                           storefront_promoted_products();

                           echo '</section>';

                           echo '<nav class="col" aria-label="' . esc_html__('Product Categories', 'storefront') . '">';

                           echo '<h2>' . esc_html__('Product Categories', 'storefront') . '</h2>';

                           the_widget(
                              'WC_Widget_Product_Categories',
                              array(
                                 'count' => 1,
                              )
                           );

                           echo '</nav>';

                           echo '</div>';

                           echo '<section aria-label="' . esc_html__('Popular Products', 'storefront') . '">';

                           echo '<h2>' . esc_html__('Popular Products', 'storefront') . '</h2>';

                           $shortcode_content = storefront_do_shortcode(
                              'best_selling_products',
                              array(
                                 'per_page' => 4,
                                 'columns'  => 4,
                              )
                           );

                           echo $shortcode_content; // WPCS: XSS ok.

                           echo '</section>';
                        }
                        ?> -->




         </div><!-- .page-content -->
      </div><!-- .error-404 -->

   </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
