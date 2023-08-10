<?php
/**
 * Fox_PKG functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package  Fox_PKG
 */

if (! defined('Xount_VERSION') ) {
    // Replace the version number of the theme on each release.
    define('Xount_VERSION', '1.0.0');
}

define('THEMEPATH', get_template_directory());
define('THEMEURI', get_template_directory_uri());
define('STYLESHEETURI', get_stylesheet_directory_uri());

if (! function_exists('Fox_PKG_setup') ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @return void
     */
    function Fox_PKG_setup()
    {
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Fox_PKG, use a find and replace
        * to change 'fox_pkg' to the name of your theme in all the template files.
        */
        load_theme_textdomain('fox_pkg', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
            'menu-1' => esc_html__('Primary', 'fox_pkg'),
            'menu-2' => esc_html__('Footer Menu', 'fox_pkg'),
            )
        );
        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support(
            'html5',
            array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'fox_pkg_custom_background_args',
                array(
                'default-color' => 'ffffff',
                'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
            )
        );

        add_theme_support( 'disable-custom-colors' );

        add_theme_support('align-wide');
        add_theme_support('custom-spacing');
        add_theme_support('experimental-custom-spacing');
    }
endif;
add_action('after_setup_theme', 'Fox_PKG_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @return void
 */
function Fox_PKG_Content_width()
{
    $GLOBALS['content_width'] = apply_filters('fox_pkg_content_width', 640);
}
add_action('after_setup_theme', 'Fox_PKG_Content_width', 0);

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function Fox_PKG_scripts()
{

    $distFileJson = file_get_contents(__DIR__ . '/dist/assets.json');
    $distFile = json_decode($distFileJson, true);

    wp_enqueue_script('onxrp-global', STYLESHEETURI . '/dist/' . $distFile['global']['js'], array('jquery'), null, true);
	wp_enqueue_style('onxrp-global', STYLESHEETURI . '/dist/' . $distFile['global']['css']);
}
add_action('wp_enqueue_scripts', 'Fox_PKG_scripts');


/**
 * Admin functions include - START
 */

if (is_admin()) {
    include THEMEPATH . '/inc/admin/admin-functions.php';
}

/**
 * Implement the Custom Header feature.
 */
require THEMEPATH . '/inc/custom-header.php';

/**
 * Website functions include
 */
require THEMEPATH . '/inc/website/website-functions.php';
