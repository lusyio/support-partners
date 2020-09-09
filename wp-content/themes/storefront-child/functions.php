<?php
/**
 * Richbee functions and definitions
 *
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );
/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style()
{
    wp_dequeue_style('storefront-style');
    wp_dequeue_style('storefront-woocommerce-style');
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */
function enqueue_child_theme_styles()
{
// load bootstrap css
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/inc/assets/css/bootstrap.min.css', false, NULL, 'all');
// fontawesome cdn
    wp_enqueue_style('wp-bootstrap-pro-fontawesome-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css');
// load bootstrap css
// load AItheme styles
// load WP Bootstrap Starter styles
    wp_enqueue_style('wp-bootstrap-starter-style', get_stylesheet_uri(), array('theme'));
    if (get_theme_mod('theme_option_setting') && get_theme_mod('theme_option_setting') !== 'default') {
        wp_enqueue_style('wp-bootstrap-starter-' . get_theme_mod('theme_option_setting'), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/' . get_theme_mod('theme_option_setting') . '.css', false, '');
    }
    wp_enqueue_style('wp-bootstrap-starter-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap');

    wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
    wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');

// load swiper js and css
    wp_enqueue_script('wp-swiper-js', get_stylesheet_directory_uri() . '/inc/assets/js/swiper.min.js', array(), '', true);
    wp_enqueue_style('wp-swiper-js', get_stylesheet_directory_uri() . '/inc/assets/css/swiper.min.css', array(), '', true);

// load bootstrap js
    wp_enqueue_script('wp-bootstrap-starter-popper', get_stylesheet_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_stylesheet_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-themejs', get_stylesheet_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-skip-link-focus-fix', get_stylesheet_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
//enqueue my child theme stylesheet
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('theme'));
}

add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);

remove_action('wp_head', 'feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head', 'feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head', 'rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head', 'wp_generator');  // скрыть версию wordpress

/**
 * Load custom WordPress nav walker.
 */
if (!class_exists('wp_bootstrap_navwalker')) {
    require_once(get_stylesheet_directory() . '/inc/wp_bootstrap_navwalker.php');
}

/**
 * Удаление json-api ссылок
 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11);

/**
 * Cкрываем разные линки при отображении постов блога (следующий, предыдущий, короткий url)
 */
remove_action('wp_head', 'start_post_rel_link', 10);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);

/**
 * `Disable Emojis` Plugin Version: 1.7.2
 */
if ('Отключаем Emojis в WordPress') {

    /**
     * Disable the emoji's
     */
    function disable_emojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
        add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
    }

    add_action('init', 'disable_emojis');

    /**
     * Filter function used to remove the tinymce emoji plugin.
     *
     * @param array $plugins
     * @return   array             Difference betwen the two arrays
     */
    function disable_emojis_tinymce($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        }

        return array();
    }

    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     *
     * @param array $urls URLs to print for resource hints.
     * @param string $relation_type The relation type the URLs are printed for.
     * @return array                 Difference betwen the two arrays.
     */
    function disable_emojis_remove_dns_prefetch($urls, $relation_type)
    {

        if ('dns-prefetch' === $relation_type) {

            // Strip out any URLs referencing the WordPress.org emoji location
            $emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
            foreach ($urls as $key => $url) {
                if (strpos($url, $emoji_svg_url_bit) !== false) {
                    unset($urls[$key]);
                }
            }

        }

        return $urls;
    }

}

/**
 * Удаляем стили для recentcomments из header'а
 */
function remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action('widgets_init', 'remove_recent_comments_style');

/**
 * Удаляем ссылку на xmlrpc.php из header'а
 */
remove_action('wp_head', 'wp_bootstrap_starter_pingback_header');

/**
 * Удаляем стили для #page-sub-header из  header'а
 */
remove_action('wp_head', 'wp_bootstrap_starter_customizer_css');

/*
*Обновление количества товара
*/
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
    ?>
    <span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
    <?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

/**
 * Замена надписи на кнопке Добавить в корзину
 */
add_filter('woocommerce_product_single_add_to_cart_text', 'woocust_change_label_button_add_to_cart_single');
function woocust_change_label_button_add_to_cart_single($label)
{

    $label = 'Добавить в корзину';

    return $label;
}

/**
 * Удаляем поля адрес и телефон, если нет доставки
 */

add_filter('woocommerce_checkout_fields', 'new_woocommerce_checkout_fields', 10, 1);

function new_woocommerce_checkout_fields($fields)
{
    if (!WC()->cart->needs_shipping()) {
        unset($fields['billing']['billing_address_1'],
            $fields['billing']['billing_address_2'],
            $fields['billing']['billing_city'],
            $fields['billing']['billing_postcode'],
            $fields['billing']['billing_country'],
            $fields['billing']['billing_state'],
            $fields['billing']['billing_company'],
            $fields['billing']['phone']);
    }
    return $fields;
}

remove_action('storefront_footer', 'storefront_credit', 20);

/**
 * Remove product data tabs
 */
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{

    unset($tabs['description'],
        $tabs['reviews'],
        $tabs['additional_information']);

    return $tabs;
}

//Количество товаров для вывода на странице магазина
add_filter('loop_shop_per_page', 'wg_view_all_products');

function wg_view_all_products()
{
    return '9999';
}

//Удаление сортировки
add_action('init', 'bbloomer_delay_remove');

function bbloomer_delay_remove()
{
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);

}

/*
*Изменение количетсва товара на строку на страницах woo
*/
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3; // 3 products per row
    }
}


//Удаление сторфронт-кредит
add_action('init', 'custom_remove_footer_credit', 10);

function custom_remove_footer_credit()
{
    remove_action('storefront_footer', 'storefront_credit', 20);
    add_action('storefront_footer', 'custom_storefront_credit', 20);
}


//Добавление favicon
function favicon_link()
{
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />' . "\n";
}

add_action('wp_head', 'favicon_link');

//Изменение entry-content
function storefront_page_content()
{
    ?>
    <div class="row">
        <?php the_content(); ?>
        <?php
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __('Pages:', 'storefront'),
                'after' => '</div>',
            )
        );
        ?>
    </div>
    <?php
}

add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);
function my_custom_sale_flash($text, $post, $_product)
{
    return '<span class="onsale">SALE!</span>';
}

// Колонки related
add_filter('woocommerce_output_related_products_args', 'jk_related_products_args');
function jk_related_products_args($args)
{
    $args['posts_per_page'] = 6; // количество "Похожих товаров"
    $args['columns'] = 4; // количество колонок
    return $args;
}

/**
 * get post gallery images with info
 * @param null $postvar
 * @param int $pos
 * @return array
 */
function get_post_gallery_images_with_info($postvar = NULL, $pos = 0)
{
    if (!isset($postvar)) {
        global $post;
        $postvar = $post;
    }
    $post_content = $postvar->post_content;
    if ($pos) {
        $post_content = preg_split('~\(:\)~', $post_content)[1];
    }
    preg_match('/\[gallery.*ids=.(.*).]/', $post_content, $ids);
    $images_id = explode(",", $ids[1]);
    $image_gallery_with_info = array();
    foreach ($images_id as $image_id) {
        $attachment = get_post($image_id);
        $image_gallery_with_info[] = array(
            'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink($attachment->ID),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    }
    return $image_gallery_with_info;
}

/**
 * Clear post content
 * @param $content
 * @return string|string[]
 */
function strip_shortcode_gallery($content)
{
    preg_match_all('/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER);

    if (!empty($matches)) {
        foreach ($matches as $shortcode) {
            if ('gallery' === $shortcode[2]) {
                $pos = strpos($content, $shortcode[0]);
                if (false !== $pos) {
                    return substr_replace($content, '', $pos, strlen($shortcode[0]));
                }
            }
        }
    }

    return $content;
}

/**
 * Render activities by category id
 * @param $cat_id
 * @return false|string
 */
function get_activities($cat_id)
{
    $args = array(
        'category' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1
    );
    $activities = get_posts($args);
    $upcomingActivities = [];
    $pastActivities = [];
    foreach ($activities as $activity) {
        $activityId = $activity->ID;
        if (get_field('relevance', $activityId) === 'upcoming') {
            $upcomingActivities[] = $activity;
        } else {
            $pastActivities[] = $activity;
        }
    }
    ob_start();
    if (count($upcomingActivities)):?>
        <section class="upcoming-events">
            <div class="container">
                <h2 class="upcoming-events__title">Предстоящие мероприятия</h2>
                <?php foreach ($upcomingActivities as $upcomingActivity):
                    $upcomingActivityId = $upcomingActivity->ID;
                    $upcomingActivityLink = get_field('landing-link', $upcomingActivityId);
                    $upcomingActivityImage = get_the_post_thumbnail($upcomingActivityId);
                    ?>
                    <div class="upcoming-events__inner">
                        <a href="<?= $upcomingActivityLink ?>" class="upcoming-events__img">
                            <?= $upcomingActivityImage ?>
                        </a>
                        <div class="upcoming-events__content">
                            <div class="upcoming-events__content-title"><?= $upcomingActivity->post_title ?></div>
                            <div class="upcoming-events__content-descr">
                                <?= $upcomingActivity->post_content ?>
                            </div>
                            <div class="upcoming-events__content-date"><?= get_field('date', $upcomingActivityId) ?></div>
                            <a href="<?= $upcomingActivityLink ?>"
                               class="upcoming-events__content-link">
                                Узнать больше
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php
    endif;
    if (count($pastActivities)): ?>
        <section class="past-events">
            <div class="container">
                <h2 class="past-events__title">Прошедшие мероприятия</h2>
                <div class="row">
                    <?php foreach ($pastActivities as $pastActivity):
                        $pastActivityId = $pastActivity->ID;
                        $pastActivityLink = get_field('landing-link', $pastActivityId);
                        $pastActivityImage = get_the_post_thumbnail($pastActivityId);
                        ?>
                        <div class="col-md-4">
                            <a href="<?= $pastActivityLink ?>" class="past-events__item">
                                <div class="past-events__item-header">
                                    <div class="past-events__item-img">
                                        <?= $pastActivityImage ?>
                                    </div>
                                    <div class="past-events__item-date"><?= get_field('date', $pastActivityId) ?></div>
                                </div>
                                <div class="past-events__item-content">
                                    <div class="past-events__item-wrap">
                                        <div class="past-events__item-title"><?= $pastActivity->post_title ?></div>
                                    </div>
                                    <div class="past-events__item-descr">
                                        <?= $pastActivity->post_content ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif;
    return ob_get_clean();
}

/**
 * Render services posts by category id
 * @param $cat_id
 * @return false|string
 */
function get_services($cat_id)
{
    $args = array(
        'category' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1
    );
    $servicesPosts = get_posts($args);
    ob_start();
    foreach ($servicesPosts as $servicesPost):
        $postId = $servicesPost->ID;
        $gallery = get_post_gallery_images_with_info($servicesPost);
        $servicesPoints = explode(";", get_field('service_points', $postId));
        $servicesPointsParts = array_chunk($servicesPoints, ceil(count($servicesPoints) / 2));
        ?>
        <div class="heading-wrap heading-wrap_services">
            <div class="container">
                <h2 class="heading"><?= $servicesPost->post_title ?></h2>
                <div class="descr"><?= strip_shortcode_gallery($servicesPost->post_content) ?></div>
            </div>
        </div>

        <section class="search">
            <div class="container">
                <div class="row">
                    <?php foreach ($servicesPointsParts as $servicesPointsPart): ?>
                        <div class="col-md-6">
                            <ul class="search__list">
                                <?php foreach ($servicesPointsPart as $item):
                                    if ($item): ?>
                                        <li class="search__list-item"><?= $item ?></li>
                                    <?php endif;
                                endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php foreach ($gallery as $image_obj): ?>
        <div class="description <?= $image_obj['title'] ?>">
            <div class="container">
                <div class="description__inner">
                    <img src="<?= $image_obj['src'] ?>" alt="">
                    <div class="description__box">
                        <div class="description__text">
                            <?= $image_obj['description'] ?>
                        </div>
                        <button class="btn-primary">Отправить заявку</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
        <?php $vacancies = array_filter(explode(";", get_field('vacancies', $postId))); ?>
        <?= get_vacancies($vacancies) ?>
    <?php
    endforeach;
    return ob_get_clean();
}

/**
 * Render $vacancies by array of slugs
 * @param $vacancies
 * @return bool|false|string
 */
function get_vacancies($vacancies)
{
    if (count($vacancies)):
        ob_start(); ?>
        <section class="vacancies">
            <div class="container">
                <h2 class="vacancies__title">Актуальные вакансии</h2>
                <div class="row">
                    <?php
                    foreach ($vacancies as $vacancy_slug):
                        $args = array(
                            'name' => $vacancy_slug,
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'numberposts' => 1
                        );
                        $vacancy = get_posts($args);
                        if ($vacancy_slug):
                            ?>
                            <div class="col-md-3">
                                <a href="<?= get_post_permalink($vacancy[0]->ID) ?>" class="vacancies__item">
                                    <div class="vacancies__item-title"><?= $vacancy[0]->post_title ?></div>
                                    <svg class="icon">
                                        <use xlink:href="#help"></use>
                                    </svg>
                                    <div class="vacancies__item-wrap">
                                        Подробнее
                                        <svg class="icon">
                                            <use xlink:href="#arrow"></use>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        <?php
                        endif;
                    endforeach; ?>
                </div>
            </div>
        </section>
        <?php
        return ob_get_clean();
    endif;
    return false;
}

/**
 * Render online products by category id
 * @param $cat_id
 * @return false | string
 */
function get_online_products($cat_id)
{
    $args = array(
        'category' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1
    );
    $onlineProducts = get_posts($args);
    ob_start(); ?>
    <div class="product">
        <div class="container">
            <div class="row">
                <?php foreach ($onlineProducts as $onlineProduct):
                    $postId = $onlineProduct->ID;
                    $link = get_field('landing-link', $postId);
                    $featured_image = get_the_post_thumbnail($postId);
                    ?>
                    <div class="col-md-12">
                        <div class="product-item">
                            <div class="product-item__content">
                                <div class="product-item__content-title"><?= $onlineProduct->post_title ?></div>
                                <div class="product-item__content-descr">
                                    <?= $onlineProduct->post_content ?>
                                </div>
                                <?php if ($link): ?>
                                    <a href="<?= $link ?>" class="product-item__content-link">
                                        Узнать больше
                                        <svg class="icon">
                                            <use xlink:href="#arrow"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php if ($link): ?>
                                <a href="<?= $link ?>" class="product-item__img">
                                    <?= $featured_image ?>
                                </a>
                            <?php else: ?>
                                <?= $featured_image ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * normalize menu
 * @param $current_menu
 * @return array
 */
function wp_get_menu_array($current_menu)
{
    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['children'] = array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID'] = $m->ID;
            $submenu[$m->ID]['title'] = $m->title;
            $submenu[$m->ID]['url'] = $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
}
