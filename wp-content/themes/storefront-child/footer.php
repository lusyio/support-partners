<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div><!-- .row -->
</div><!-- .container -->

<?php do_action('storefront_before_footer'); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
   <div class="container pt-3 pb-3">
      <div class="row">
         <?php
         if ($menu_items = wp_get_nav_menu_items('second')) {
            $menu_list = '';
            echo '<div class="col-12 text-center col-md-6 text-lg-left">';
            echo '<div class="footer-menu">';
            echo '<ul class="menu" id="menu-second">';
            $menu_number = 0;
            $half_count = ceil(count($menu_items) / 2);
            foreach ((array)$menu_items as $key => $menu_item) {
               $title = $menu_item->title; // заголовок элемента меню (анкор ссылки)
               $url = $menu_item->url; // URL ссылки
               if ($menu_number != $half_count) {
                  echo '<li class="mb-lg-3 mb-3"><a href="' . $url . '">' . $title . '</a></li>';
               } else {
                  echo '</ul>';
                  echo '</div>';
                  echo '</div>';
                  echo '<div class="col-12 text-center col-md-6 text-lg-left">';
                  echo '<div class="footer-menu">';
                  echo '<ul class="menu" id="menu-second_1">';
                  echo '<li class="mb-lg-3 mb-3"><a href="' . $url . '">' . $title . '</a></li>';
               }
               $menu_number++;
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
         }
         ?>
      </div>
   </div>
   <div class="col-12 footer-socials text-center col-lg-3 text-lg-right">
      <div class="social">
         <a class="text-decoration-none socials" href="#"><img src="/wp-content/themes/storefront-child/svg/vk.svg" alt=""></a>
         <a class="text-decoration-none ml-3 socials" href="#"><img src="/wp-content/themes/storefront-child/svg/facebook.svg" alt=""></a>
      </div>
      <!-- <p class="mb-0">
                    <a class="footer-terms" href="/terms/">Политика конфиденциальности</a>
                </p>
                <p class="footer-name-p">
                    &copy; <?php echo '<a class="footer-name" href="' . home_url() . '">' . get_bloginfo('name') . '</a>'; ?>
                    , 2015 - <?php echo date('Y'); ?>
                </p> -->
      <p class="mb-0 footer-credits d-lg-none d-block">
         <a class="credits" href="https://richbee.ru/" target="_blank"><img src="/wp-content/themes/storefront-child/svg/Richbee-black.svg" alt=""></a>
      </p>
   </div>

   <!-- </div>
   </div> -->


   <div class="col-full">

      <?php
      /**
       * Functions hooked in to storefront_footer action
       *
       * @hooked storefront_footer_widgets - 10
       * @hooked storefront_credit         - 20
       */
      do_action('storefront_footer');
      ?>

   </div><!-- .col-full -->
</footer><!-- #colophon -->

<?php do_action('storefront_after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<svg width="0" height="0" class="hidden">
   <symbol viewBox="0 0 82 10" xmlns="http://www.w3.org/2000/svg" id="arrow">
      <path d="M81.46 5.46a.65.65 0 0 0 0-.92L77.323.404a.65.65 0 1 0-.92.919L80.082 5l-3.677 3.677a.65.65 0 0 0 .919.92L81.46 5.46zM0 5.65h81v-1.3H0v1.3z"></path>
   </symbol>
   <symbol viewBox="0 0 76 76" xmlns="http://www.w3.org/2000/svg" id="help">
    <mask id="a">
      <path d="M60.16 40.583l-3.117-.743v-.564c2.019-1.425 3.355-3.77 3.355-6.412v-4.052c0-4.32-3.518-7.838-7.838-7.838a7.756 7.756 0 0 0-5.076 1.885c-1.53-3.726-5.196-6.368-9.47-6.368-4.276 0-7.957 2.642-9.471 6.383a7.808 7.808 0 0 0-5.091-1.9c-4.32 0-7.838 3.518-7.838 7.837v4.053a7.78 7.78 0 0 0 3.355 6.412v.564l-3.117.743a8.197 8.197 0 0 0-6.309 8v3.266c0 .965.787 1.752 1.752 1.752h8.045c-.015.207-.015.43-.015.638v6.294c0 .965.787 1.751 1.752 1.751H31.6c.965 0 1.751-.786 1.751-1.751 0-.965-.786-1.752-1.751-1.752h-1.81v-3.622c0-.965-.787-1.751-1.752-1.751s-1.751.786-1.751 1.751v3.622h-3.459v-4.542a7.24 7.24 0 0 1 5.581-7.066l4.81-1.158 3.22 7.318a1.74 1.74 0 0 0 1.604 1.04c.698 0 1.321-.416 1.603-1.04l3.206-7.303 4.795 1.143a7.256 7.256 0 0 1 5.581 7.066v4.542h-3.503v-3.622c0-.965-.787-1.751-1.752-1.751-.964 0-1.751.786-1.751 1.751v3.622h-1.99c-.964 0-1.75.787-1.75 1.752s.786 1.751 1.75 1.751h10.703c.965 0 1.752-.786 1.752-1.751v-6.294c0-.223-.015-.43-.015-.653h8.06c.965 0 1.752-.787 1.752-1.752V48.57a8.178 8.178 0 0 0-6.324-7.986zm-7.6-16.106c2.286 0 4.171 1.796 4.32 4.052h-2.435c-2.048 0-4.052-.49-5.863-1.424a4.332 4.332 0 0 1 3.978-2.628zm-4.32 8.12v-1.811a16.197 16.197 0 0 0 6.22 1.232h2.45v.831a4.34 4.34 0 0 1-4.335 4.334 4.34 4.34 0 0 1-4.334-4.334v-.252zm-16.95-5.893a6.728 6.728 0 0 1 6.723-6.724c3.34 0 6.13 2.449 6.635 5.655l-2.939-1.722a1.753 1.753 0 0 0-2.226.386 7.519 7.519 0 0 1-5.79 2.702h-2.39l-.014-.297zm-7.838-2.227a4.35 4.35 0 0 1 3.978 2.613 12.805 12.805 0 0 1-5.864 1.425h-2.434c.134-2.257 2.019-4.038 4.32-4.038zm-4.335 7.54h2.45c2.137 0 4.26-.43 6.219-1.231v2.078a4.34 4.34 0 0 1-4.334 4.334 4.34 4.34 0 0 1-4.335-4.334v-.846zm8.446 11.742a10.735 10.735 0 0 0-7.436 6.338H13.03v-1.514a4.717 4.717 0 0 1 3.622-4.601l4.453-1.069a1.762 1.762 0 0 0 1.351-1.707v-.594c.327.045.653.06.98.06.326 0 .653-.03.98-.06v.579c0 .58.281 1.143.801 1.47.193.133.4.208.623.252l2.613.623-.89.223zm4.884-2.716a9.077 9.077 0 0 0-1.395-.475l-3.133-.742v-.55a8.373 8.373 0 0 0 1.515-1.38 10.408 10.408 0 0 0 3.013 3.013v.134zm7.6 2.568l-2.049 4.66-2.048-4.675v-1.247a10.16 10.16 0 0 0 4.097 0v1.262zm-2.034-4.542a6.728 6.728 0 0 1-6.724-6.725V30.49h2.405c2.775 0 5.418-1.04 7.436-2.88l3.607 2.123v2.85c-.133 3.607-3.102 6.487-6.724 6.487zm5.537 1.989v-.12a10.381 10.381 0 0 0 3.043-3.027c.445.52.95.98 1.5 1.365v.55l-3.133.742c-.49.119-.95.282-1.41.49zm19.43 9.04h-7.124a10.716 10.716 0 0 0-7.437-6.324l-.876-.208 2.627-.623c.223-.045.43-.119.639-.253.52-.341.801-.89.801-1.47v-.577c.327.044.638.06.98.06.326 0 .653-.03.98-.06v.594c0 .816.549 1.514 1.35 1.707l4.453 1.069a4.704 4.704 0 0 1 3.622 4.601l-.014 1.484z"></path>
    </mask>
    <path d="M60.16 40.583l-3.117-.743v-.564c2.019-1.425 3.355-3.77 3.355-6.412v-4.052c0-4.32-3.518-7.838-7.838-7.838a7.756 7.756 0 0 0-5.076 1.885c-1.53-3.726-5.196-6.368-9.47-6.368-4.276 0-7.957 2.642-9.471 6.383a7.808 7.808 0 0 0-5.091-1.9c-4.32 0-7.838 3.518-7.838 7.837v4.053a7.78 7.78 0 0 0 3.355 6.412v.564l-3.117.743a8.197 8.197 0 0 0-6.309 8v3.266c0 .965.787 1.752 1.752 1.752h8.045c-.015.207-.015.43-.015.638v6.294c0 .965.787 1.751 1.752 1.751H31.6c.965 0 1.751-.786 1.751-1.751 0-.965-.786-1.752-1.751-1.752h-1.81v-3.622c0-.965-.787-1.751-1.752-1.751s-1.751.786-1.751 1.751v3.622h-3.459v-4.542a7.24 7.24 0 0 1 5.581-7.066l4.81-1.158 3.22 7.318a1.74 1.74 0 0 0 1.604 1.04c.698 0 1.321-.416 1.603-1.04l3.206-7.303 4.795 1.143a7.256 7.256 0 0 1 5.581 7.066v4.542h-3.503v-3.622c0-.965-.787-1.751-1.752-1.751-.964 0-1.751.786-1.751 1.751v3.622h-1.99c-.964 0-1.75.787-1.75 1.752s.786 1.751 1.75 1.751h10.703c.965 0 1.752-.786 1.752-1.751v-6.294c0-.223-.015-.43-.015-.653h8.06c.965 0 1.752-.787 1.752-1.752V48.57a8.178 8.178 0 0 0-6.324-7.986zm-7.6-16.106c2.286 0 4.171 1.796 4.32 4.052h-2.435c-2.048 0-4.052-.49-5.863-1.424a4.332 4.332 0 0 1 3.978-2.628zm-4.32 8.12v-1.811a16.197 16.197 0 0 0 6.22 1.232h2.45v.831a4.34 4.34 0 0 1-4.335 4.334 4.34 4.34 0 0 1-4.334-4.334v-.252zm-16.95-5.893a6.728 6.728 0 0 1 6.723-6.724c3.34 0 6.13 2.449 6.635 5.655l-2.939-1.722a1.753 1.753 0 0 0-2.226.386 7.519 7.519 0 0 1-5.79 2.702h-2.39l-.014-.297zm-7.838-2.227a4.35 4.35 0 0 1 3.978 2.613 12.805 12.805 0 0 1-5.864 1.425h-2.434c.134-2.257 2.019-4.038 4.32-4.038zm-4.335 7.54h2.45c2.137 0 4.26-.43 6.219-1.231v2.078a4.34 4.34 0 0 1-4.334 4.334 4.34 4.34 0 0 1-4.335-4.334v-.846zm8.446 11.742a10.735 10.735 0 0 0-7.436 6.338H13.03v-1.514a4.717 4.717 0 0 1 3.622-4.601l4.453-1.069a1.762 1.762 0 0 0 1.351-1.707v-.594c.327.045.653.06.98.06.326 0 .653-.03.98-.06v.579c0 .58.281 1.143.801 1.47.193.133.4.208.623.252l2.613.623-.89.223zm4.884-2.716a9.077 9.077 0 0 0-1.395-.475l-3.133-.742v-.55a8.373 8.373 0 0 0 1.515-1.38 10.408 10.408 0 0 0 3.013 3.013v.134zm7.6 2.568l-2.049 4.66-2.048-4.675v-1.247a10.16 10.16 0 0 0 4.097 0v1.262zm-2.034-4.542a6.728 6.728 0 0 1-6.724-6.725V30.49h2.405c2.775 0 5.418-1.04 7.436-2.88l3.607 2.123v2.85c-.133 3.607-3.102 6.487-6.724 6.487zm5.537 1.989v-.12a10.381 10.381 0 0 0 3.043-3.027c.445.52.95.98 1.5 1.365v.55l-3.133.742c-.49.119-.95.282-1.41.49zm19.43 9.04h-7.124a10.716 10.716 0 0 0-7.437-6.324l-.876-.208 2.627-.623c.223-.045.43-.119.639-.253.52-.341.801-.89.801-1.47v-.577c.327.044.638.06.98.06.326 0 .653-.03.98-.06v.594c0 .816.549 1.514 1.35 1.707l4.453 1.069a4.704 4.704 0 0 1 3.622 4.601l-.014 1.484z" stroke-width="2" mask="url(#a)"></path>
    <path d="M37.121 61.396l-.008-.007a1.195 1.195 0 0 1-.365-.871c0-.321.136-.641.373-.879.23-.23.547-.358.879-.358.332 0 .648.129.878.358.236.236.373.57.373.879 0 .321-.136.641-.373.878a1.255 1.255 0 0 1-.878.373c-.322 0-.641-.135-.879-.373zm-.373-52.608c0-.689.563-1.252 1.252-1.252.691 0 1.251.55 1.251 1.252V11.4c0 .689-.563 1.252-1.251 1.252a1.255 1.255 0 0 1-1.252-1.252V8.788zm-5.566 6.051l-.008.008a1.245 1.245 0 0 1-.878.373 1.23 1.23 0 0 1-.879-.359l-1.84-1.84a1.256 1.256 0 0 1 0-1.772 1.256 1.256 0 0 1 1.771 0l1.841 1.84c.49.49.483 1.28-.007 1.75zm17.171-1.778l-.004.004-1.826 1.826a1.245 1.245 0 0 1-.879.373c-.322 0-.637-.118-.878-.358a1.256 1.256 0 0 1 0-1.772l1.826-1.826a1.256 1.256 0 0 1 1.772 0 1.225 1.225 0 0 1-.011 1.753z"></path>
  </symbol>
</svg>


<!--
   
<svg class="icon">
   <use xlink:href="#arrow"></use>
</svg>

<svg class="icon">
  <use xlink:href="#help"></use>
</svg>

-->


</body>

</html>