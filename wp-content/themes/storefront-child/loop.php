<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: https://codex.wordpress.org/The_Loop
 *
 * @package storefront
 */

do_action('storefront_loop_before');

while (have_posts()) :
    the_post();
    $post_category = get_the_category($post->ID)[0];
    $post_category_slug = $post_category->slug;
    /**
     * Include the Post-Format-specific template for the content.
     * If you want to override this in a child theme, then include a file
     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
     */
    ?>
    <div class="container">
        <ul class="breadcrumb-primary">
            <li>
                <a class="breadcrumb-primary__link" href="#">Главная</a>
            </li>
            <li class="breadcrumb-primary__separator">/</li>
            <li>
                <a class="breadcrumb-primary__link breadcrumb-primary__link_active" href="#">Кейсы</a>
            </li>
        </ul>
    </div>
    <section class="<?= $post_category_slug ?>">
        <div class="container">
            <div class="row">
                <?php
                get_template_part('content-' . $post_category_slug . '', get_post_format());
                ?>
            </div>
        </div>
    </section>
<?php
endwhile;

/**
 * Functions hooked in to storefront_paging_nav action
 *
 * @hooked storefront_paging_nav - 10
 */
do_action('storefront_loop_after');