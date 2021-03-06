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
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/inc/assets/css/bootstrap.min.css', false, NULL, 'all');
    wp_enqueue_style('wp-bootstrap-starter-style', get_stylesheet_uri(), array('theme'));
    if (get_theme_mod('theme_option_setting') && get_theme_mod('theme_option_setting') !== 'default') {
        wp_enqueue_style('wp-bootstrap-starter-' . get_theme_mod('theme_option_setting'), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/' . get_theme_mod('theme_option_setting') . '.css', false, '');
    }
    wp_enqueue_style('wp-bootstrap-starter-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap');

    wp_enqueue_script('jquery');

    wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
    wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');

    wp_enqueue_script('chart-js', get_stylesheet_directory_uri() . '/inc/assets/js/Chart.bundle.min.js', array(), '1.0', false);
    wp_enqueue_script('chartjs-plugin-labels', get_stylesheet_directory_uri() . '/inc/assets/js/chartjs-plugin-labels.min.js', array(), '1.0', false);
    wp_enqueue_style('chart-css', get_stylesheet_directory_uri() . '/inc/assets/css/Chart.min.css', array(), '1.0', false);

    wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/inc/assets/js/swiper.min.js', array(), '1.0', false);
    wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/inc/assets/css/swiper.min.css', array(), '1.0', false);

    // load bootstrap js
    wp_enqueue_script('wp-bootstrap-starter-popper', get_stylesheet_directory_uri() . '/inc/assets/js/popper.min.js', array(), '1.0', true);
    wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_stylesheet_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '1.0', true);
    wp_enqueue_script('wp-bootstrap-starter-themejs', get_stylesheet_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '1.0', true);
    wp_enqueue_script('wp-bootstrap-starter-skip-link-focus-fix', get_stylesheet_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '1.0', true);

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
    function disable_emojis_tinymce(array $plugins)
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
    function disable_emojis_remove_dns_prefetch(array $urls, string $relation_type)
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
    echo '<link rel="shortcut icon" type="image/x-icon" href="/wp-content/themes/storefront-child/favicon.jpg" />' . "\n";
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
 * @throws Exception
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
    $upcoming_activities = [];
    $past_activities = [];
    $now_date = new DateTime('now');
    foreach ($activities as $activity) {
        $activity_id = $activity->ID;
        $activity_date = get_field('date', $activity_id);
        if (new DateTime($activity_date) > $now_date) {
            $upcoming_activities[] = $activity;
        } else {
            $past_activities[] = $activity;
        }
    }
    ob_start();
    if (count($upcoming_activities)):?>
        <section class="upcoming-events">
            <div class="container">
                <h2 class="upcoming-events__title">Предстоящие мероприятия</h2>
                <?php foreach ($upcoming_activities as $upcoming_activity):
                    $upcoming_activity_id = $upcoming_activity->ID;
                    $upcoming_activity_link = get_field('landing-link', $upcoming_activity_id);
                    $upcoming_activity_image = get_the_post_thumbnail($upcoming_activity_id);
                    ?>
                    <div class="upcoming-events__inner">
                        <a href="<?= $upcoming_activity_link ?>" class="upcoming-events__img">
                            <?= $upcoming_activity_image ?>
                        </a>
                        <div class="upcoming-events__content">
                            <div class="upcoming-events__content-title"><?= $upcoming_activity->post_title ?></div>
                            <div class="upcoming-events__content-descr">
                                <?= $upcoming_activity->post_content ?>
                            </div>
                            <div class="upcoming-events__content-date"><?= get_field('date', $upcoming_activity_id) ?></div>
                            <a href="<?= $upcoming_activity_link ?>"
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
    if (count($past_activities)): ?>
        <section class="past-events">
            <div class="container">
                <h2 class="past-events__title">Прошедшие мероприятия</h2>
                <div class="row">
                    <?php foreach ($past_activities as $past_activity):
                        $past_activity_id = $past_activity->ID;
                        $past_activity_link = get_field('landing-link', $past_activity_id);
                        $past_activity_image = get_the_post_thumbnail($past_activity_id);
                        ?>
                        <div class="col-xl-4 col-lg-6 col-6">
                            <a href="<?= $past_activity_link ?>" class="past-events__item">
                                <div class="past-events__item-header">
                                    <div class="past-events__item-img">
                                        <?= $past_activity_image ?>
                                    </div>
                                    <div class="past-events__item-date"><?= get_field('date', $past_activity_id) ?></div>
                                </div>
                                <div class="past-events__item-content">
                                    <div class="past-events__item-wrap">
                                        <div class="past-events__item-title"><?= $past_activity->post_title ?></div>
                                    </div>
                                    <div class="past-events__item-descr">
                                        <?= mb_strimwidth($past_activity->post_content, 0, 130, '...') ?>
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
        $gallery = array_reverse(get_post_gallery_images_with_info($servicesPost));
        $servicesPoints = explode(";", get_field('service_points', $postId));
        $servicesPointsParts = array_chunk($servicesPoints, ceil(count($servicesPoints) / 2));
        ?>
        <div class="heading-wrap heading-wrap_services">
            <div class="container">
                <h2 id="<?= $servicesPost->post_name ?>" class="heading"><?= $servicesPost->post_title ?></h2>
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

        <?php foreach ($gallery as $key => $image_obj): ?>
        <div class="description <?= $image_obj['title'] ?>">
            <div class="container">
                <div class="description__inner">
                    <img src="<?= $image_obj['src'] ?>" alt="">
                    <div class="description__box">
                        <div class="description__text">
                            <?= $image_obj['description'] ?>
                        </div>
                        <?php if (array_key_last($gallery) === $key): ?>
                            <button data-title="<?= $servicesPost->post_title ?>"
                                    data-toggle="modal" data-target="#vacancyModal"
                                    class="btn-primary">Отправить заявку
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
        <?php $vacancies = get_field('service_vacancy', $postId); ?>
        <?= get_vacancies($vacancies) ?>
    <?php
    endforeach;
    return ob_get_clean();
}

/**
 * Render vacancies from custom field
 * @param $vacancies
 * @return bool|false|string
 */
function get_vacancies($vacancies)
{
    if ($vacancies):
        ob_start(); ?>
        <section class="vacancies">
            <div class="container">
                <h2 class="vacancies__title">Актуальные вакансии</h2>
                <div class="row vacancies__wrapper">
                    <?php foreach ($vacancies as $key => $vacancy): ?>
                        <div class="col-lg-3 col-6 vacancies__target <?= $key > 3 ? 'd-none' : '' ?>">
                            <a href="<?= get_post_permalink($vacancy->ID) ?>" class="vacancies__item">
                                <div class="vacancies__item-title"><?= $vacancy->post_title ?></div>
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
                    endforeach; ?>
                </div>
                <?php if (count($vacancies) > 3): ?>
                    <button class="btn-empty">Смотреть все вакансии</button>
                <?php endif; ?>
            </div>
        </section>
    <?php
    endif;
    return ob_get_clean();
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
                    $post_id = $onlineProduct->ID;
                    $link = get_field('landing-link', $post_id);
                    $featured_image = get_the_post_thumbnail($post_id);
                    ?>
                    <div class="col-xl-12 col-lg-6 col-12">
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

/**
 * Get category slug by id
 * @param $cat_id
 * @return mixed
 */
function catSlug($cat_id)
{
    $cat_id = (int)$cat_id;
    return get_category($cat_id)->slug;
}

/**
 * Render Our team block by category id
 * @param $cat_id
 * @return false|string
 */
function get_team($cat_id)
{
    $args = array(
        'category' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1
    );
    $team_posts = array_reverse(get_posts($args));
    ob_start();
    if ($team_posts): ?>
        <section id="specialists" class="specialists">
            <div class="container">
                <h2 class="heading">Наша команда</h2>
                <div class="row">
                    <?php
                    $vacancy = [];
                    $vacancy_img = '';
                    foreach ($team_posts as $team_post):
                        $post_id = $team_post->ID;
                        $featured_image = get_the_post_thumbnail($post_id);
                        $team_post_type = get_field('team_vacancy', $post_id);
                        if ($team_post_type === 'team'):
                            $content = $team_post->post_content;
                            $content = apply_filters('the_content', $content);
                            $content = str_replace(']]>', ']]&gt;', $content);
                            ?>
                            <div class="col-lg-3 col-6">
                                <div class="specialists__card">
                                    <div class="specialists__card-img">
                                        <?= $featured_image ?>
                                    </div>
                                    <div class="specialists__card-title"><?= $team_post->post_title ?></div>
                                    <div class="specialists__card-descr">
                                        <?= get_field('position', $post_id) ?>
                                    </div>
                                    <?php if ($content): ?>
                                        <a class="specialists__card-link" data-title="<?= $team_post->post_title ?>"
                                           data-toggle="modal" data-target="#teamModal"
                                           data-info='<?= $content ?>' href="#">Подробнее</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php else:
                            $vacancy = $team_post;
                            $vacancy_img = get_the_post_thumbnail($vacancy->ID);
                        endif;
                    endforeach; ?>
                    <?php if ($vacancy): ?>
                        <div class="col-lg-3 col-6">
                            <a href="<?= get_permalink($vacancy->ID) ?>"
                               class="specialists__card specialists__card_empty">
                                <div class="specialists__card-title"><?= $vacancy->post_title ?></div>
                                <?= $vacancy_img ?>
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <script>
            window.addEventListener('DOMContentLoaded', function () {
                document.addEventListener('click', function (e) {
                    for (let target = e.target; target && target !== this; target = target.parentNode) {
                        if (target.matches('[data-target="#teamModal"]')) {
                            clickHandler.call(target, e);
                            break;
                        }
                    }
                }, false);

                function clickHandler() {
                    const title = this.dataset.title
                    const content = this.dataset.info
                    const $modalTitle = document.getElementById('teamModalTitle')
                    const $modalContent = document.getElementById('teamModalContent')

                    $modalTitle.textContent = title
                    $modalContent.innerHTML = content
                }
            })
        </script>

        <div class="modal sp-modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="heading" id="teamModalTitle">Станислав Сметана</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="/wp-content/themes/storefront-child/svg/close.svg" alt="close modal">
                        </button>
                        <div id="teamModalContent" class="sp-modal__content">
                            <p>Более 15 лет в индустрии поиска ключевых сотрудников</p>
                            <p>Сертифицированный коуч.</p>
                            <p>С 2011 года в команде Support Partners.</p>
                            <p>Более 100 успешно реализованных проектов, в том числе:</p>
                            <ul>
                                <li>Генеральный директор проектного института для крупного металлургического холдинга
                                </li>
                                <li>Генеральный директор проектного института для крупного металлургического холдинга
                                </li>
                                <li>Генеральный директор проектного института для крупного металлургического холдинга
                                </li>
                                <li>Генеральный директор проектного института для крупного металлургического холдинга
                                </li>
                                <li>Генеральный директор проектного института для крупного металлургического холдинга
                                </li>
                                <li>Генеральный директор проектного института для крупного металлургического холдинга
                                </li>
                                <li>Генеральный директор проектного института для крупного металлургического холдинга
                                </li>
                            </ul>
                            <p>Кроме этого: ультрамарафонец, дистанции до 162 км</p>
                            <p>Страница в FB: <a href="https://www.facebook.com/smetana3000">https://www.facebook.com/smetana3000</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endif;
    return ob_get_clean();
}

/**
 * Render cases by category id and page
 * @param $cat_id
 * @param $page
 * @return false|string
 */
function getCases($cat_id, $page = false)
{
    $args = array(
        'category' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => (!$page || $page === 'main') ? 9 : -1
    );
    $cases = get_posts($args);
    ob_start();
    if ($cases): ?>
        <?php if (!$page || $page === 'main'): ?>
            <section class="project">
                <div class="container">
                    <h2 class="heading">Кейсы и проекты</h2>
                    <?php if (count($cases) <= 3): ?>
                        <div class="row">
                            <?php foreach ($cases as $case):
                                $case_id = $case->ID;
                                $featured_image = get_the_post_thumbnail_url($case_id);
                                ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <a href="<?= get_post_permalink($case_id) ?>" class="project__item"
                                       style="background-image: url(<?= $featured_image ?>)">
                                        <div class="project__title"><?= $case->post_title ?></div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="swiper-container swiper-container-case">
                            <div class="swiper-wrapper">
                                <?php foreach ($cases as $case):
                                    $case_id = $case->ID;
                                    $featured_image = get_the_post_thumbnail_url($case_id);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?= get_post_permalink($case_id) ?>" class="project__item"
                                           style="background-image: url(<?= $featured_image ?>)">
                                            <div class="project__title"><?= $case->post_title ?></div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="position-relative main-project-slider__control">
                            <div class="swiper-button-prev">
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            </section>
        <?php else: ?>
            <div class="container pb-5">
                <div class="row">
                    <?php foreach ($cases as $case):
                        $case_id = $case->ID;
                        $featured_image = get_the_post_thumbnail($case_id);
                        $link = get_post_permalink($case_id);
                        ?>
                        <div class="col-xl-4 col-lg-6 col-6 mt-auto">
                            <div class="works__item">
                                <div class="works__item-title"><?= $case->post_title ?></div>
                                <div class="works__item-img">
                                    <a href="<?= $link ?>">
                                        <?= $featured_image ?>
                                    </a>
                                </div>
                                <div class="works__item-box">
                                    <div class="works__item-descr">
                                        <?= mb_strimwidth(get_field('short_descr', $case_id), 0, 130, '...') ?>
                                    </div>
                                    <a href="<?= $link ?>" class="works__item-link">
                                        Узнать больше
                                        <svg class="icon">
                                            <use xlink:href="#arrow"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php
        endif;
    endif;
    return ob_get_clean();
}

/**
 * Render last three events
 * @param $cat_id
 * @return false|string
 */
function getLastThreeEvents($cat_id)
{
    $args = array(
        'category' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'desc',
        'numberposts' => 3
    );
    $events = get_posts($args);
    ob_start();
    if ($events): ?>
        <section class="last-events">
            <div class="container">
                <h2 class="heading mb-5">Календарь мероприятий</h2>
                <div class="row">
                    <?php foreach ($events as $event):
                        $event_id = $event->ID;
                        $event_link = get_field('landing-link', $event_id);
                        $featured_image = get_the_post_thumbnail_url($event_id);
                        $event_date = get_field('date', $event_id);
                        ?>
                        <div class="col-lg-4 col-md-6 col-12 last-events__col">
                            <a href="<?= $event_link ?>" class="last-events__item"
                               style="background-image: url(<?= $featured_image ?>)">
                                <p class="last-events__date"><?= $event_date ?></p>
                                <div class="last-events__title"><?= $event->post_title ?></div>
                            </a>
                            <a class="last-events__link" href="<?= $event_link ?>">
                                Узнать больше
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php
    endif;
    return ob_get_clean();
}

/**
 * Render news by category id
 * @param $cat_id
 * @return false|string
 */
function getNews($cat_id)
{
    $args = array(
        'category' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1
    );
    $news = get_posts($args);
    ob_start();
    ?>
    <?php if ($news): ?>
    <section class="news">
        <div class="container">
            <div class="row">
                <?php foreach ($news as $new):
                    $new_id = $new->ID;
                    $link = get_post_permalink($new_id);
                    $featured_image_url = get_the_post_thumbnail_url($new_id);
                    ?>
                    <div class="col-md-12">
                        <div class="news-item">
                            <a href="<?= $link ?>" class="news-item__img">
                                <img src="<?= $featured_image_url ?>" alt="<?= $new->post_title ?>">
                            </a>
                            <div class="news-item__content">
                                <div class="news-item__content-title"><?= $new->post_title ?></div>
                                <div class="news-item__content-date"><?= get_the_date('d.m.Y', $new_id) ?></div>
                                <div class="news-item__content-descr">
                                    <?= get_field('short_descr', $new_id) ?>
                                </div>
                                <a href="<?= $link ?>" class="news-item__content-link">
                                    <svg class="icon">
                                        <use xlink:href="#arrow"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif;
    return ob_get_clean();
}

/**
 * Render cycle with js scripts by cycle category id
 * @param $cat_id
 * @return false|string
 */
function getCycle($cat_id)
{
    $args = array('parent' => $cat_id);
    $parent = get_categories($args);
    $childrens_titles = [];
    $childrens = [];
    foreach ($parent as $child) {
        $childrens_titles[] = $child->name;
        $childrens[] = $child;
    }
    $childrens_titles_JSON = '';
    try {
        $childrens_titles_JSON = json_encode($childrens_titles, JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
    ob_start(); ?>
    <section class="cycle">
        <div class="container">
            <h2 class="heading">Цикл создания сильных команды</h2>
            <?php if ($childrens_titles): ?>
                <div class="chart">
                    <div class="chart-wrapper">
                        <canvas data-labels='<?= $childrens_titles_JSON ?>'
                                id="myChart" width="100%"
                                height="100%">
                        </canvas>
                        <div id="tooltip">
                            <div><p><span id="tooltip-target">1</span>/<?= count($childrens) ?></p></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
    foreach ($childrens as $key => $children):
        $child_cat_id = $children->term_id;
        getCycleChildren($child_cat_id, $key);
    endforeach;
    ?>
    <script>
        const chartNode = document.getElementById('myChart')
        const ctx = chartNode.getContext('2d');
        const labels = JSON.parse(chartNode.dataset.labels)
        const values = new Array(labels.length).fill(1)
        const data = {
            datasets: [{
                data: values,
                backgroundColor: '#E3EEF7',
                hoverBackgroundColor: '#005896',
                borderWidth: 1,
                borderAlign: 'inner',
            }],
            labels: labels
        };

        let chart_config = {
            type: 'doughnut',
            data: data,
            options: {
                plugins: {
                    labels: {
                        render: function (args) {
                            return args.index + 1;
                        },
                        fontSize: 36,
                        fontStyle: 'bold',
                        fontColor: '#fff',
                        fontFamily: 'Roboto'
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    animateScale: true
                },
                cutoutPercentage: 60,
                onHover: debounce(handleHover, 50),
                legend: false,
                tooltips: {
                    enabled: false,
                    custom: customTooltip
                }
            }
        }

        const chart = new Chart(ctx, chart_config);

        function customTooltip(tooltipModel) {
            // Tooltip Element
            let tooltipEl = document.getElementById('chartjs-tooltip');

            // Create element on first render
            if (!tooltipEl) {
                tooltipEl = document.createElement('div');
                tooltipEl.id = 'chartjs-tooltip';
                tooltipEl.innerHTML = '<table></table>';
                document.body.appendChild(tooltipEl);
            }

            // Hide if no tooltip
            if (tooltipModel.opacity === 0) {
                tooltipEl.style.opacity = 0
                return;
            }

            // Set caret Position
            tooltipEl.classList.remove('above', 'below', 'no-transform');
            if (tooltipModel.yAlign) {
                tooltipEl.classList.add(tooltipModel.yAlign);
            } else {
                tooltipEl.classList.add('no-transform')
            }

            function getBody(bodyItem) {
                return bodyItem.lines;
            }

            // Set Text
            if (tooltipModel.body) {
                let titleLines = tooltipModel.title || []
                let bodyLines = tooltipModel.body.map(getBody)

                let innerHtml = '<thead>'

                titleLines.forEach(function (title) {
                    innerHtml += '<tr><th>' + title + '</th></tr>'
                });
                innerHtml += '</thead><tbody>'

                bodyLines.forEach(function (body, i) {
                    let normalizedBody = body[0].replace(/[^A-Za-zА-Яа-я\s]/g, '')
                    let style = 'background: #F4F8FB'
                    style += '; border-color: #F4F8FB'
                    style += '; border-width: 2px'
                    const span = `<span style="${style}"></span>`
                    innerHtml += `<tr><td>${span} ${normalizedBody}</td></tr>`
                });
                innerHtml += '</tbody>';

                let tableRoot = tooltipEl.querySelector('table');
                tableRoot.innerHTML = innerHtml;
            }

            // `this` will be the overall tooltip
            let position = this._chart.canvas.getBoundingClientRect();

            // Display, position, and set styles for font
            tooltipEl.style.opacity = 1
            tooltipEl.style.position = 'absolute'
            tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px'
            tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px'
            tooltipEl.style.fontFamily = tooltipModel._bodyFontFamily
            tooltipEl.style.fontSize = tooltipModel.bodyFontSize + 'px'
            tooltipEl.style.fontStyle = tooltipModel._bodyFontStyle
            tooltipEl.style.padding = tooltipModel.yPadding + 'px ' + tooltipModel.xPadding + 'px'
            tooltipEl.style.pointerEvents = 'none'
            tooltipEl.style.color = '#005896'
            tooltipEl.style.textTransform = 'uppercase'
            tooltipEl.style.zIndex = 2
        }

        /**
         * Handle hover event on chart bar
         * @todo show active bar
         * @param e
         */
        function handleHover(e) {
            let activeElement = chart.getElementAtEvent(e);

            if (activeElement[0]) {
                const index = activeElement[0]._index
                // console.log(activeElement[0]._index)

                changeCenterNumber(index + 1)
                showTeamBlock(index)
            }
        }

        /**
         * Change number in center of chart
         * @param number
         */
        function changeCenterNumber(number) {
            const $target = document.getElementById('tooltip-target')
            $target.textContent = number
        }

        /**
         * Hide all team block and show selected by id
         * @param id
         */
        function showTeamBlock(id) {
            const items = document.querySelectorAll('.team')
            const $target = document.getElementById(`team-${id}`)
            items.forEach((item, _) => {
                item.classList.add('d-none')
            })
            $target.classList.remove('d-none')
        }

        /**
         * Debounce functions
         * @param fn
         * @param wait
         * @return {function(...[*]=)}
         */
        function debounce(fn, wait) {
            let timeout
            return function (...args) {
                const later = () => {
                    clearTimeout(timeout)
                    fn.apply(this, args)
                }
                clearTimeout(timeout)
                timeout = setTimeout(later, wait)
            }
        }
    </script>
    <?php
    return ob_get_clean();
}

/**
 * Return children posts for cycle
 * @param $child_cat_id
 * @param $key
 */
function getCycleChildren($child_cat_id, $key)
{
    $args = array(
        'category' => $child_cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => 6
    );
    $children_posts = array_reverse(get_posts($args));
    ?>
    <section id="team-<?= $key ?>" class="team <?= $key !== 0 ? 'd-none' : '' ?>">
        <div class="container">
            <h2 class="team__title"><?= get_cat_name($child_cat_id) ?></h2>
            <div class="row">
                <?php
                $small_cards = [];
                foreach ($children_posts as $children_post):
                    $children_post_id = $children_post->ID;
                    $card_type = get_field('card_type', $children_post_id);
                    $card_desc = get_field('card_desc', $children_post_id);
                    $card_color = get_field('card_bg', $children_post_id);
                    $card_img = get_field('card_img', $children_post_id);
                    $landing_link = get_field('landing-link', $children_post_id)
                        ?: get_field('vacancies_link', $children_post_id);
                    $link = $landing_link ?: get_permalink($children_post_id);

                    $small_cards[] = $card_type === 'small' ? $children_post : '';

                    if (in_array(4, (array)$children_post->post_category, true)) {
                        $link = get_permalink(11) . '#' . $children_post->post_name;
                    }
                    if ($card_type === 'big'):
                        ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="team__item <?= $card_color === 'white' ? 'team__item_white' : '' ?>">
                                <div class="team__item-title"><?= $children_post->post_title ?></div>
                                <?php if ($card_desc): ?>
                                    <div class="team__item-descr"><?= $card_desc ?></div>
                                <?php endif; ?>
                                <?php if ($card_img): ?>
                                    <img class="team__item-img"
                                         src="<?= $card_img ?>"
                                         alt="<?= $children_post->post_title ?>">
                                <?php endif; ?>
                                <a class="team__item-link"
                                   href="<?= $link ?>">
                                    Подробнее
                                    <svg class="icon">
                                        <use xlink:href="#arrow"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php
                    endif;
                endforeach;

                $small_cards_normalize = array_filter($small_cards);
                $count = 1;
                foreach ($small_cards_normalize as $small_card_key => $small_card):
                    $small_card_id = $small_card->ID;
                    $card_desc = get_field('card_desc', $small_card_id);
                    $landing_link = get_field('landing-link', $small_card_id)
                        ?: get_field('vacancies_link', $small_card_id);
                    $link = $landing_link ?: get_permalink($small_card_id);

                    if (in_array(4, (array)$small_card->post_category, true)) {
                        $link = get_permalink(11) . '#' . $small_card->post_name;
                    }
                    if ($count === 1 && array_key_first($small_cards_normalize) === $small_card_key): ?>
                        <div class="col-lg-4 col-md-6 col-12">
                        <div class="team__item team__item_small team__item_white">
                    <?php endif; ?>
                    <div class="team__item-box">
                        <div class="team__item-title team__item-title_small"><?= $small_card->post_title ?></div>
                        <?php if ($card_desc): ?>
                            <div class="team__item-descr team__item-descr_small"><?= $card_desc ?></div>
                        <?php endif; ?>
                        <a class="team__item-link team__item-link_blue"
                           href="<?= $link ?>">
                            Подробнее
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                    <?php if ($count === 2 && array_key_last($small_cards_normalize) !== $small_card_key):
                    $count = 0; ?>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                    <div class="team__item team__item_small team__item_white">
                    <?php if (array_key_last($small_cards_normalize) === $small_card_key): ?>
                    </div>
                    </div>
                <?php
                endif;
                endif;
                    $count++;
                endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Get post or custom field gallery images
 * @param null $postvar
 * @param int $pos
 * @param string $post_content
 * @return array
 */
function get_post_gallery_or_custom_field($postvar = NULL, $pos = 0, $post_content = '')
{
    if (!isset($postvar)) {
        global $post;
        $postvar = $post;
    }
    if (!$post_content) {
        $post_content = $postvar->post_content;
        if ($pos) {
            $post_content = preg_split('~\(:\)~', $post_content)[1];
        }
    }
    preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
    $images_id = explode(",", $ids[1]);
    $image_gallery_with_info = array();
    foreach ($images_id as $image_id) {
        $attachment = get_post($image_id);
        $image_gallery_with_info[] = array(
            'src' => $attachment->guid,
            'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)
        );
    }
    return $image_gallery_with_info;
}

/**
 * Render clients images
 * @param $post_content
 * @return false|string
 */
function get_clients($post_content)
{
    $gallery = get_post_gallery_or_custom_field(null, 0, $post_content);
    ob_start();
    if ($gallery): ?>
        <section id="clients" class="clients">
            <div class="container">
                <h2 class="heading">Наши клиенты</h2>
                <div class="swiper-container swiper-container-client">
                    <div class="swiper-wrapper">
                        <?php foreach ($gallery as $image_obj): ?>
                            <div class="swiper-slide">
                                <img src="<?= $image_obj['src'] ?>"
                                     alt="<?= $image_obj['alt'] ?>"/>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <script>
            const swiperClient = new Swiper('.swiper-container-client', {
                slidesPerView: 5,
                spaceBetween: 30,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    991: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });
        </script>
    <?php endif;
    return ob_get_clean();
}

/**
 * Render reviews by category id
 * @param $cat_id
 * @return false|string
 */
function getReviews($cat_id)
{
    $args = array(
        'category' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => 9
    );
    $reviews = get_posts($args);
    ob_start(); ?>
    <?php if ($reviews): ?>
    <section id="reviews" class="reviews">
        <div class="container">
            <h2 class="heading">Отзывы</h2>
            <div class="row">
                <div class="col-3 d-lg-block d-none mt-auto mb-auto">
                    <div class="reviews__item reviews__item--small">
                        <img src="/wp-content/themes/storefront-child/svg/review-placeholder.svg" alt="placeholder">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="position-relative">
                        <div class="swiper-container swiper-container-reviews reviews__item p-0">
                            <div class="swiper-wrapper">
                                <?php foreach ($reviews as $review):
                                    $review_id = $review->ID;
                                    $featured_image_url = get_the_post_thumbnail_url($review_id);
                                    $position = get_field('position', $review_id);
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="reviews__item">
                                            <div class="reviews__item-header">
                                                <div class="reviews__item-img">
                                                    <img src="<?= $featured_image_url ?: '/wp-content/themes/storefront-child/svg/user-profile.svg' ?>"
                                                         alt="<?= $review->post_title ?>">
                                                </div>
                                                <div>
                                                    <div class="reviews__item-title"><?= $review->post_title ?></div>
                                                    <?php if ($position): ?>
                                                        <div class="reviews__item-subtitle"><?= $position ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="reviews__item-descr">
                                                <?= mb_strimwidth($review->post_content, 0, 150, '...') ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="reviews-control">
                            <div class="reviews-control__prev reviews-control__item"
                                 data-slide="prev">
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </div>
                            <div class="reviews-control__next reviews-control__item"
                                 data-slide="next">
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-lg-block d-none mt-auto mb-auto">
                    <div class="reviews__item reviews__item--small">
                        <img src="/wp-content/themes/storefront-child/svg/review-placeholder.svg" alt="placeholder">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const swiperReviews = new Swiper('.swiper-container-reviews', {
            spaceBetween: 0,
            effect: 'fade',
            navigation: {
                nextEl: '.reviews-control__next',
                prevEl: '.reviews-control__prev',
            },
        });
    </script>
<?php endif;
    return ob_get_clean();
}

/**
 * Render simple slides on main-page
 * @return false|string
 */
function get_main_slides()
{
    $gallery = get_post_gallery_images_with_info();
    ob_start();
    if ($gallery): ?>
        <?php foreach ($gallery as $image_obj): ?>
            <div class="swiper-slide">
                <div class="main-screen main-screen_photo">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-screen__inner">
                                    <h1 class="main-screen__title"><?= $image_obj['title'] ?></h1>
                                    <div class="main-screen__descr">
                                        <?= $image_obj['description'] ?>
                                    </div>
                                    <div>
                                        <a href="<?= get_permalink(11) ?>" class="main-screen__btn btn-primary">Посмотреть
                                            услуги</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-screen__img">
                                    <img style="<?= $image_obj['caption'] ?>" src="<?= $image_obj['src'] ?>"
                                         alt="<?= $image_obj['title'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php
    endif;
    return ob_get_clean();
}

/**
 * Render events slides for main-page
 * @return false|string
 */
function get_events_slides()
{
    $event_slides = get_field('events_slider');
    ob_start();
    foreach ($event_slides as $event_slide):
        $event_id = $event_slide->ID;
        $event_link = get_field('landing-link', $event_id);
        $event_date = get_field('date', $event_id);
        $event_img = get_the_post_thumbnail_url($event_id);
        $event_video = get_field('youtube_link', $event_id);
        ?>
        <div class="swiper-slide <?= $event_video ? 'swiper-slide-video' : '' ?>">
            <div class="main-screen <?= $event_video ? 'main-screen_video' : 'main-screen_photo' ?>">
                <div class="container">
                    <div class="row <?= $event_video ? 'align-items-center' : '' ?>">
                        <div class="col-md-6">
                            <div class="main-screen__inner">
                                <div class="main-screen__date"><?= $event_date ?></div>
                                <h1 class="main-screen__title"><?= $event_slide->post_title ?></h1>
                                <div class="main-screen__descr">
                                    <?= $event_slide->post_content ?>
                                </div>
                                <div>
                                    <a href="<?= $event_link ?>" class="main-screen__btn btn-primary">Узнать больше</a>
                                    <?php if ($event_video): ?>
                                        <a class="main-screen__link start-video">
                                            <img src="/wp-content/themes/storefront-child/svg/play.svg" alt="">
                                            Смотреть видео
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if ($event_video): ?>
                                <div class="thumbnail_container position-relative text-center">
                                    <div id="player">
                                        <div id="ytplayer"></div>
                                    </div>
                                    <div class="thumbnail-block" style="background-image: url('<?= $event_img ?>');">
                                    </div>
                                </div>
                                <script>
                                    // Load the IFrame Player API code asynchronously.
                                    let tag = document.createElement('script');
                                    tag.src = "https://www.youtube.com/player_api";
                                    let firstScriptTag = document.getElementsByTagName('script')[0];
                                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                                    // YouTube player after the API code downloads.
                                    let player;

                                    function onYouTubePlayerAPIReady() {
                                        player = new YT.Player('ytplayer', {
                                            height: '300px',
                                            width: '100%',
                                            videoId: '<?= $event_video ?>'
                                        });
                                    }

                                    document.addEventListener('click', function (e) {
                                        // loop parent nodes from the target to the delegation node
                                        for (let target = e.target; target && target !== this; target = target.parentNode) {
                                            if (target.matches('.start-video')) {
                                                handlerClick.call(target, e);
                                                break;
                                            }
                                        }
                                    }, false);

                                    function handlerClick() {
                                        document.getElementById('player').style.display = 'block'
                                        document.querySelector('.thumbnail-block').style.display = 'none'
                                        player.playVideo();
                                    }
                                </script>
                            <?php else: ?>
                                <div class="main-screen__img">
                                    <img src="<?= $event_img ?>" alt="<?= $event_slide->post_title ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    return ob_get_clean();
}

/**
 * Modify yoast breadcrumbs
 * /category/news -> /news/
 * @param $links
 * @return mixed
 */
function yoast_seo_breadcrumb_modify_link($links)
{
    if (is_single()) {
        $current_url = home_url($_SERVER['REQUEST_URI']);
        $current_url_hash = parse_url($current_url, PHP_URL_PATH);

        $category_url_hash = array_filter(explode("/", $current_url_hash));

        $breadcrumb[] = array(
            'url' => site_url($category_url_hash[1]),
            'text' => $links[1]['text'],
        );

        unset($links[1]);

        array_splice($links, 1, -2, $breadcrumb);
    }
    return $links;
}

add_filter('wpseo_breadcrumb_links', 'yoast_seo_breadcrumb_modify_link');

/**
 * Search only posts
 * @param $query
 * @return mixed
 */
function search_filter($query)
{
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', 'post');
        $query->set('cat', '-19');
    }
    return $query;
}

add_filter('pre_get_posts', 'search_filter');
