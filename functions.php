<?php

if (!function_exists('exam_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */
    function exam_setup() {

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded  tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(400, 400, true);

    }
endif;

add_action('after_setup_theme', 'exam_setup');

function my_style_enqueue_styles() {
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'my_style_enqueue_styles');

function create_copyright(): void {
    $all_posts = get_posts(
        'post_status=publish&order=ASC');
    $first_post = $all_posts[0];
    $first_date = $first_post->post_date_gmt;
    _e('&copy;');
    if (substr($first_date, 0, 4) == date('Y')) {
        echo date('Y');
    } else {
        echo substr($first_date, 0, 4) . "-" . date('Y');
    }
    echo ' <strong>' . get_bloginfo('name') . '</strong> ';
}
