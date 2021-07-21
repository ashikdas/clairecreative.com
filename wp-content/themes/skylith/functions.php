<?php
/**
 * Skylith functions and definitions.
 *
 * Link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package skylith
 */

/**
 * Framework
 */
require_once get_template_directory() . '/inc/framework-init.php';

if ( ! function_exists( 'skylith_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function skylith_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'skylith', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        // Bootstrap editor styles.
        add_editor_style( 'assets/vendor/bootstrap/dist/css/bootstrap.min.css' );

        // Main editor styles.
        add_theme_support( 'editor-styles' );

        // dark mode.
        if ( Ghost_Framework::get_theme_mod( 'general_dark_content' ) ) {
            add_theme_support( 'dark-editor-style' );
            add_editor_style( 'editor-style-dark.min.css' );
        } else {
            add_editor_style( 'editor-style.min.css' );
        }

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

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
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'theme_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Gutenberg align blocks.
        add_theme_support( 'align-wide' );

        // Gutenberg color palette.
        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name'  => esc_html__( 'Gold', 'skylith' ),
                    'slug'  => 'skylith-gold',
                    'color' => '#b9a186',
                ),
                array(
                    'name'  => esc_html__( 'Yellow', 'skylith' ),
                    'slug'  => 'skylith-yellow',
                    'color' => '#fbda03',
                ),
                array(
                    'name'  => esc_html__( 'Light Green', 'skylith' ),
                    'slug'  => 'skylith-light-green',
                    'color' => '#00ffa2',
                ),
                array(
                    'name'  => esc_html__( 'Green', 'skylith' ),
                    'slug'  => 'skylith-green',
                    'color' => '#2bb569',
                ),
                array(
                    'name'  => esc_html__( 'Light Blue', 'skylith' ),
                    'slug'  => 'skylith-light-blue',
                    'color' => '#148ff3',
                ),
                array(
                    'name'  => esc_html__( 'Blue', 'skylith' ),
                    'slug'  => 'skylith-blue',
                    'color' => '#3202ff',
                ),
                array(
                    'name'  => esc_html__( 'Blue Violet', 'skylith' ),
                    'slug'  => 'skylith-blue-violet',
                    'color' => '#5223e9',
                ),
                array(
                    'name'  => esc_html__( 'Dark Violet', 'skylith' ),
                    'slug'  => 'skylith-dark-violet',
                    'color' => '#480086',
                ),
                array(
                    'name'  => esc_html__( 'Violet', 'skylith' ),
                    'slug'  => 'skylith-violet',
                    'color' => '#8536ce',
                ),
                array(
                    'name'  => esc_html__( 'Light Violet', 'skylith' ),
                    'slug'  => 'skylith-light-violet',
                    'color' => '#a074dc',
                ),
                array(
                    'name'  => esc_html__( 'Violet-Pink', 'skylith' ),
                    'slug'  => 'skylith-violet-pink',
                    'color' => '#d086d3',
                ),
                array(
                    'name'  => esc_html__( 'Pink', 'skylith' ),
                    'slug'  => 'skylith-pink',
                    'color' => '#ea2f5c',
                ),
                array(
                    'name'  => esc_html__( 'Red', 'skylith' ),
                    'slug'  => 'skylith-red',
                    'color' => '#cc1139',
                ),
                array(
                    'name'  => esc_html__( 'Black', 'skylith' ),
                    'slug'  => 'skylith-black',
                    'color' => '#000',
                ),
                array(
                    'name'  => esc_html__( 'White', 'skylith' ),
                    'slug'  => 'skylith-white',
                    'color' => '#fff',
                ),
            )
        );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'top_menu'    => esc_html__( 'Main Menu', 'skylith' ),
                'mobile_menu' => esc_html__( 'Mobile Menu', 'skylith' ),
                'social_menu' => esc_html__( 'Social Menu (icons only)', 'skylith' ),
            )
        );

        // Add default image sizes.
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'skylith_48x48_crop', 48, 48, true );
        add_image_size( 'skylith_48x48', 48 );
        add_image_size( 'skylith_128x128_crop', 128, 128, true );
        add_image_size( 'skylith_128x128', 128 );
        add_image_size( 'skylith_256x256_crop', 256, 256, true );
        add_image_size( 'skylith_256x256', 256 );
        add_image_size( 'skylith_512x512_crop', 512, 512, true );
        add_image_size( 'skylith_512x512', 512 );
        add_image_size( 'skylith_800x600_crop', 800, 600, true );
        add_image_size( 'skylith_800x600', 800 );
        add_image_size( 'skylith_1280x720_crop', 1280, 720, true );
        add_image_size( 'skylith_1280x720', 1280 );
        add_image_size( 'skylith_1920x1080_crop', 1920, 1080, true );
        add_image_size( 'skylith_1920x1080', 1920 );

        add_filter( 'image_size_names_choose', 'skylith_custom_sizes' );
        if ( ! function_exists( 'skylith_custom_sizes' ) ) :
            /**
             * Register the three useful image sizes for use in Add Media modal.
             *
             * @param array - $sizes - default image sizes.
             * @return array
             */
            function skylith_custom_sizes( $sizes ) {
                return array_merge(
                    $sizes,
                    array(
                        'skylith_48x48_crop'     => '48x48 crop',
                        'skylith_48x48'          => '48x48',
                        'skylith_128x128_crop'   => '128x128 crop',
                        'skylith_128x128'        => '128x128',
                        'skylith_512x512_crop'   => '512x512 crop',
                        'skylith_512x512'        => '512x512',
                        'skylith_800x600_crop'   => '800x600 crop',
                        'skylith_800x600'        => '800x600',
                        'skylith_1280x720_crop'  => '1280x720 crop',
                        'skylith_1280x720'       => '1280x720',
                        'skylith_1920x1080_crop' => '1920x1080 crop',
                        'skylith_1920x1080'      => '1920x1080',
                    )
                );
            }
        endif;
    }
endif;
add_action( 'after_setup_theme', 'skylith_setup' );

if ( ! isset( $content_width ) ) {
    $content_width = 1140;
}

if ( ! function_exists( 'skylith_widgets_init' ) ) :
    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function skylith_widgets_init() {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Posts Sidebar', 'skylith' ),
                'id'            => 'sidebar-post',
                'description'   => esc_html__( 'For posts pages.', 'skylith' ),
                'before_widget' => '<div id="%1$s" class="nk-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="nk-widget-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( '1 Column Footer', 'skylith' ),
                'id'            => 'sidebar-footer-1',
                'description'   => esc_html__( 'For First Column Footer.', 'skylith' ),
                'before_widget' => '<div id="%1$s" class="nk-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="nk-widget-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( '2 Column Footer', 'skylith' ),
                'id'            => 'sidebar-footer-2',
                'description'   => esc_html__( 'For Second Column Footer.', 'skylith' ),
                'before_widget' => '<div id="%1$s" class="nk-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="nk-widget-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( '3 Column Footer', 'skylith' ),
                'id'            => 'sidebar-footer-3',
                'description'   => esc_html__( 'For Third Column Footer.', 'skylith' ),
                'before_widget' => '<div id="%1$s" class="nk-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="nk-widget-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( '4 Column Footer', 'skylith' ),
                'id'            => 'sidebar-footer-4',
                'description'   => esc_html__( 'For Fourth Column Footer.', 'skylith' ),
                'before_widget' => '<div id="%1$s" class="nk-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="nk-widget-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer Copyright', 'skylith' ),
                'id'            => 'sidebar-footer-copyright',
                'description'   => esc_html__( 'For text in the end of the footer.', 'skylith' ),
                'before_widget' => '<div id="%1$s" class="nk-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="nk-widget-title">',
                'after_title'   => '</h4>',
            )
        );

        if ( class_exists( 'WooCommerce' ) ) {
            register_sidebar(
                array(
                    'name'          => esc_html__( 'WooCommerce Filters', 'skylith' ),
                    'id'            => 'sidebar-woocommerce-filters',
                    'description'   => esc_html__( 'For products archive page.', 'skylith' ),
                    'before_widget' => '<div id="%1$s" class="col-lg col-md-4 nk-widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h3 class="nk-shop-filter-item-title">',
                    'after_title'   => '</h3>',
                )
            );
        }

        $fullscreen_nav_style = Ghost_Framework::get_theme_mod( 'fullscreen_navigation_style' );
        if ( class_exists( 'Kirki' ) || 'widgetized' === $fullscreen_nav_style ) {
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Fullscreen Menu', 'skylith' ),
                    'id'            => 'sidebar-fullscreen-menu',
                    'description'   => esc_html__( 'For fullscreen menu.', 'skylith' ),
                    'before_widget' => '<div id="%1$s" class="nk-widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h4 class="nk-widget-title">',
                    'after_title'   => '</h4>',
                )
            );
        }
    }
endif;
add_action( 'widgets_init', 'skylith_widgets_init' );

// Prevent Kirki to load FontAwesome script, that breaks some theme things.
add_filter( 'kirki_load_fontawesome', '__return_false' );

if ( ! function_exists( 'skylith_scripts' ) ) :
    /**
     * Enqueue scripts and styles.
     */
    function skylith_scripts() {
        /**
         * Styles
         */

        // Bootstrap.
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/dist/css/bootstrap.min.css', array(), '4.0.0' );

        // 7-stroke icons.
        wp_enqueue_style( 'pe-icon-7-stroke', get_template_directory_uri() . '/assets/vendor/pixeden-stroke-7-icon/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css', array(), '1.2.3' );

        // Photoswipe.
        wp_enqueue_style( 'photoswipe', get_template_directory_uri() . '/assets/vendor/photoswipe/dist/photoswipe.css', array(), '4.1.2' );
        wp_enqueue_style( 'photoswipe-default-skin', get_template_directory_uri() . '/assets/vendor/photoswipe/dist/default-skin/default-skin.css', array(), '4.1.2' );

        // Skylith.
        Ghost_Framework::enqueue_scss(
            'skylith',
            Ghost_Framework::get_theme_mod( 'custom_colors' ) ? get_template_directory() . '/assets/scss/skylith-custom.php' : '',
            array(),
            '1.3.3',
            'all',
            get_template_directory_uri() . '/style.css'
        );

        /**
         * Scripts
         */

        // FontAwesome.
        wp_register_script( 'font-awesome-v4-shims', get_template_directory_uri() . '/assets/vendor/font-awesome/v4-shims.min.js', array(), '5.13.0', true );
        wp_register_script( 'font-awesome', get_template_directory_uri() . '/assets/vendor/font-awesome/all.min.js', array( 'font-awesome-v4-shims' ), '5.13.0', true );

        // GSAP.
        wp_register_script( 'tween-max', get_template_directory_uri() . '/assets/vendor/gsap/src/minified/TweenMax.min.js', array(), '1.20.4', true );
        wp_register_script( 'gsap-scroll-to-plugin', get_template_directory_uri() . '/assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js', array( 'tween-max' ), '1.20.4', true );

        // Popper.js.
        wp_register_script( 'popper', get_template_directory_uri() . '/assets/vendor/popper.js/dist/umd/popper.min.js', array( 'jquery' ), '1.14.1', true );

        // Bootstrap.
        wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );

        // Sticky Kit.
        wp_register_script( 'sticky-kit', get_template_directory_uri() . '/assets/vendor/sticky-kit/dist/sticky-kit.min.js', array( 'jquery' ), '1.1.2', true );

        // Jarallax.
        wp_register_script( 'jarallax', get_template_directory_uri() . '/assets/vendor/jarallax/jarallax.min.js', array( 'jquery' ), '1.12.0', true );
        wp_register_script( 'jarallax-video', get_template_directory_uri() . '/assets/vendor/jarallax/jarallax-video.min.js', array( 'jarallax' ), '1.12.0', true );

        // Photoswipe.
        wp_register_script( 'photoswipe', get_template_directory_uri() . '/assets/vendor/photoswipe/dist/photoswipe.min.js', array( 'jquery' ), '4.1.2', true );
        wp_register_script( 'photoswipe-ui-default', get_template_directory_uri() . '/assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js', array( 'photoswipe' ), '4.1.2', true );

        // Hammer.js.
        wp_register_script( 'hammerjs', get_template_directory_uri() . '/assets/vendor/hammerjs/hammer.min.js', array( 'jquery' ), '2.0.8', true );

        // Keymaster.
        wp_register_script( 'keymaster', get_template_directory_uri() . '/assets/vendor/keymaster/keymaster.js', array( 'jquery' ), '1.6.2', true );

        // Tilt.js.
        wp_register_script( 'tilt', get_template_directory_uri() . '/assets/vendor/tilt.js/tilt.jquery.min.js', array( 'jquery' ), '1.2.1', true );

        // Skylith.
        wp_register_script( 'skylith', get_template_directory_uri() . '/assets/js/skylith.min.js', array( 'font-awesome', 'tween-max', 'gsap-scroll-to-plugin', 'popper', 'bootstrap', 'sticky-kit', 'jarallax', 'jarallax-video', 'photoswipe', 'photoswipe-ui-default', 'hammerjs', 'keymaster', 'tilt' ), '1.3.3', true );

        wp_register_script( 'skylith-wp', get_template_directory_uri() . '/assets/js/skylith-wp.min.js', array( 'jquery' ), '1.3.3', true );

        wp_enqueue_script( 'skylith-init', get_template_directory_uri() . '/assets/js/skylith-init.min.js', array( 'skylith', 'skylith-wp' ), '1.3.3', true );

        $data_init = array(
            'enableShortcuts'     => 1,
            'scrollToAnchorSpeed' => 700,
            '__'                  => array(
                'navbarBackItem' => esc_html__( 'Back', 'skylith' ),
                'sliderAuthor'   => esc_html__( 'Author: {{name}}', 'skylith' ),
            ),
        );
        wp_localize_script( 'skylith-init', 'skylithInitOptions', $data_init );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'skylith_scripts' );

if ( ! function_exists( 'skylith_ghostkit_preloader_ext_script' ) ) :
    /**
     * Enqueue extension for ghostkit.
     */
    function skylith_ghostkit_preloader_ext_script() {
        if ( Ghost_Framework::get_theme_mod( 'preloader_show' ) ) {
            // We need to load this script as earlier as possible to properly run preloader scripts.
            // phpcs:ignore
            wp_enqueue_script( 'skylith-ghostkit-preloader-ext', get_template_directory_uri() . '/assets/js/skylith-ghostkit-preloader-ext.min.js', array( 'jquery' ), '1.3.3' );
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'skylith_ghostkit_preloader_ext_script', 9 );

if ( ! function_exists( 'skylith_editor_scripts' ) ) :
    /**
     * Enqueue scripts and styles.
     */
    function skylith_editor_scripts() {
        // Theme assets.
        wp_enqueue_script( 'skylith-editor', get_template_directory_uri() . '/assets/js/skylith-editor.min.js', array( 'jquery' ), '1.3.3', true );
    }
endif;
add_action( 'enqueue_block_editor_assets', 'skylith_editor_scripts' );

/**
 * WordPress Shims
 */
require_once get_template_directory() . '/inc/wordpress-shims.php';

/**
 * Extra
 */
require_once get_template_directory() . '/inc/extra.php';

/**
 * Theme Options
 */
require_once get_template_directory() . '/inc/theme-options.php';

/**
 * Typography
 */
require_once get_template_directory() . '/inc/typography.php';

/**
 * Comments Walker
 */
require_once get_template_directory() . '/inc/comments-walker.php';

/**
 * WooCommerce
 */
if ( class_exists( 'WooCommerce' ) ) {
    require_once get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Extend Lazyblocks
 */
require_once get_template_directory() . '/inc/extend-lazyblocks.php';

/**
 * Extend Visual Portfolio
 */
require_once get_template_directory() . '/inc/extend-visual-portfolio.php';

/**
 * Extend GhostKit
 */
require_once get_template_directory() . '/inc/extend-ghostkit.php';

/**
 * Migration
 */
require_once get_template_directory() . '/inc/migration.php';
