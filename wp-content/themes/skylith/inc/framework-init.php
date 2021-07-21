<?php // phpcs:ignore
/**
 * Framework init.
 *
 * @package skylith
 */

// Ghost framework.
// phpcs:ignore
require_once get_template_directory() . '/ghost-framework/ghost.php';

new Ghost_Framework( array(
    'path' => get_template_directory() . '/ghost-framework',
    'url'  => get_template_directory_uri() . '/ghost-framework',
) );

/**
 * Skylith_Framework_Init class
 */
class Skylith_Framework_Init {
    /**
     * Init
     */
    public static function init() {
        // Demos.
        $skylith_demos = array(
            array(
                'title'            => esc_html__( 'Skylith Promo', 'skylith' ),
                'slug'             => 'skylith',
                'preview_url'      => 'https://wp.nkdev.info/skylith/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'body' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Nunito Sans',
                            'font-weight'          => '400',
                            'line-height'          => '1.65',
                        ),
                        'buttons' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Nunito Sans',
                            'font-weight'          => '400',
                            'line-height'          => '1.65',
                        ),
                        'html' => array(
                            'font-size' => '15px',
                        ),
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '600',
                        ),
                        'h1' => array(
                            'font-size' => '38px',
                        ),
                        'h2' => array(
                            'font-size' => '32px',
                        ),
                    ),
                ),
            ),
            array(
                'title'           => esc_html__( 'Classic Agency', 'skylith' ),
                'slug'            => 'skylith-minimal-classic-agency',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-minimal-classic-agency/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
            ),
            array(
                'title'            => esc_html__( 'Minimal Photography', 'skylith' ),
                'slug'             => 'skylith-minimal-photography',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-minimal-photography/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Playfair Display',
                            'font-weight'          => '400',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Minimal Split Portfolio', 'skylith' ),
                'slug'             => 'skyltih-minimal-split',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-minimal-split/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Playfair Display',
                            'font-weight'          => '700',
                        ),
                        'additional_items' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Playfair Display',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Creative Outline Portfolio', 'skylith' ),
                'slug'             => 'skylith-creative-portfolio-outline',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-portfolio-outline/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Dark Creative Agency', 'skylith' ),
                'slug'             => 'skylith-dark-creative-agency',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-dark-creative-agency/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Oswald',
                            'font-weight'          => '500',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Architecture & Interior', 'skylith' ),
                'slug'             => 'skylith-minimal-architecture-interior',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-minimal-architecture/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '500',
                        ),
                        'h1' => array(
                            'font-size' => '38px',
                        ),
                        'h2' => array(
                            'font-size' => '30px',
                        ),
                        'h3' => array(
                            'font-size' => '24px',
                        ),
                        'h4' => array(
                            'font-size' => '21px',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Designer Portfolio', 'skylith' ),
                'slug'             => 'skylith-creative-designer-portfolio',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-designer-portfolio/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => 'top_menu',
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'blockquotes' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '500i',
                        ),
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                        'h1' => array(
                            'font-size' => '38px',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Minimal Agency', 'skylith' ),
                'slug'             => 'skylith-minimal-agency',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-minimal-agency/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'additional_items' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Playfair Display',
                            'font-weight'          => '400',
                        ),
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Playfair Display',
                            'font-weight'          => '400',
                        ),
                    ),
                ),
            ),
            array(
                'title'           => esc_html__( 'Dark Portfolio', 'skylith' ),
                'slug'            => 'skylith-dark-portfolio',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-dark-portfolio/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
            ),
            array(
                'title'           => esc_html__( 'Minimal Portfolio', 'skylith' ),
                'slug'            => 'skylith-minimal-freelancer-portfolio',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-minimal-freelancer-portfolio/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => 'top_menu',
                    'Social Menu' => 'social_menu',
                ),
            ),
            array(
                'title'           => esc_html__( 'Digital Agency Fullscreen', 'skylith' ),
                'slug'            => 'skylith-minimal-fullscreen-slider',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-minimal-fullscreen-slider/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
            ),
            array(
                'title'            => esc_html__( 'Creative Portfolio Text', 'skylith' ),
                'slug'             => 'skylith-creative-text',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-text/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => 'top_menu',
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Creative Agency', 'skylith' ),
                'slug'             => 'skylith-creative-agency',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-agency/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                        'blockquotes' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'PT Serif',
                            'font-weight'          => '400i',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Creative Portfolio', 'skylith' ),
                'slug'             => 'skylith-creative-portfolio',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-portfolio/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Creative Freelancer', 'skylith' ),
                'slug'             => 'skylith-creative-freelancer-portfolio',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-freelancer-portfolio/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'           => esc_html__( 'Minimal Agency 2', 'skylith' ),
                'slug'            => 'skylith-minimal-agency-v2',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-minimal-agency-v2/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => 'top_menu',
                    'Social Menu' => 'social_menu',
                ),
            ),
            array(
                'title'           => esc_html__( 'Video Gallery', 'skylith' ),
                'slug'            => 'skylith-minimal-video-gallery',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-minimal-video-gallery/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                ),
            ),
            array(
                'title'           => esc_html__( 'Dark Photographer', 'skylith' ),
                'slug'            => 'skylith-dark-photographer',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-dark-photographer/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
            ),
            array(
                'title'            => esc_html__( 'Minimal One Page', 'skylith' ),
                'slug'             => 'skylith-minimal-one-page',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-minimal-one-page/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Hind',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Business One Page', 'skylith' ),
                'slug'             => 'skylith-creative-business-one-page',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-business-one-page/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'           => esc_html__( 'Minimal Shop', 'skylith' ),
                'slug'            => 'skylith-shop',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-minimal-shop/',
                'main_page_title' => 'Shop',
                'navigations'     => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
            ),
            array(
                'title'            => esc_html__( 'Creative Agency 2', 'skylith' ),
                'slug'             => 'skylith-creative-agency-v2',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-agency-v2/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Creative Developer Portfolio', 'skylith' ),
                'slug'             => 'skylith-creative-developer-portfolio',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-creative-developer-portfolio/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'           => esc_html__( 'Dark Fullscreen Agency', 'skylith' ),
                'slug'            => 'skylith-dark-fullscreen',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-dark-fullscreen/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
            ),
            array(
                'title'            => esc_html__( 'Photographer Fullscreen', 'skylith' ),
                'slug'             => 'skylith-dark-photo-slideshow',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-dark-photo-slideshow/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '400',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Dark Fullscreen Portfolio', 'skylith' ),
                'slug'             => 'skylith-dark-split-portfolio',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-dark-split-portfolio/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => 'top_menu',
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Playfair Display',
                            'font-weight'          => '400',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Modern Dark Portfolio', 'skylith' ),
                'slug'             => 'skylith-dark-modern-portfolio',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-dark-modern-portfolio/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Carousel Portfolio', 'skylith' ),
                'slug'             => 'skylith-minimal-carousel-portfolio',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-minimal-carousel-portfolio/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu' => 'top_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Montserrat',
                            'font-weight'          => '600',
                        ),
                        'h1' => array(
                            'font-size' => '38px',
                        ),
                        'h2' => array(
                            'font-size' => '30px',
                        ),
                        'h3' => array(
                            'font-size' => '24px',
                        ),
                    ),
                ),
            ),
            array(
                'title'            => esc_html__( 'Modern Fullscreen Portfolio', 'skylith' ),
                'slug'             => 'skylith-dark-creative-portfolio',
                'preview_url'      => 'https://wp.nkdev.info/skylith/demo-dark-creative-portfolio/',
                'main_page_title'  => 'Main',
                'navigations'      => array(
                    'Main Menu'   => array( 'top_menu', 'mobile_menu' ),
                    'Social Menu' => 'social_menu',
                ),
                'ghostkit_options' => array(
                    'typography' => array(
                        'headings' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Roboto',
                            'font-weight'          => '700',
                        ),
                        'additional_items' => array(
                            'font-family-category' => 'google-fonts',
                            'font-family'          => 'Roboto',
                            'font-weight'          => '700',
                        ),
                    ),
                ),
            ),
            array(
                'title'           => esc_html__( 'Fullscreen Slider', 'skylith' ),
                'slug'            => 'skylith-dark-photographer-slider',
                'preview_url'     => 'https://wp.nkdev.info/skylith/demo-dark-photographer-slider/',
                'main_page_title' => 'Main',
                'navigations'     => array(
                    'Main Menu'   => 'top_menu',
                    'Social Menu' => 'social_menu',
                ),
            ),
        );

        $skylith_demos_for_framework = array();
        foreach ( $skylith_demos as $name => $demo ) {
            $skylith_demos_for_framework[ $name ] = array(
                'title'     => $demo['title'],
                'preview'   => $demo['preview_url'],
                'thumbnail' => get_template_directory_uri() . '/inc/demos/' . $demo['slug'] . '/screenshot.jpg',
                'demo_data' => array(
                    'blog_options'     => array(
                        'permalink'           => '/%postname%/',
                        'page_on_front_title' => $demo['main_page_title'],
                        'posts_per_page'      => 6,
                    ),
                    'navigations'      => $demo['navigations'],
                    'ghostkit_options' => isset( $demo['ghostkit_options'] ) ? $demo['ghostkit_options'] : false,
                    'demo_data_file'   => get_template_directory() . '/inc/demos/' . $demo['slug'] . '/content.xml',
                    'customizer_file'  => get_template_directory() . '/inc/demos/' . $demo['slug'] . '/customizer.dat',
                    'widgets_file'     => get_template_directory() . '/inc/demos/' . $demo['slug'] . '/widgets.wie',
                ),
            );
        }
        Ghost_Framework::add_theme_dashboard(array(
            'theme_title'         => 'Skylith',
            'theme_version'       => '1.3.3',
            'theme_id'            => '23176447',
            'theme_uri'           => 'https://1.envato.market/skylithwpinfo',
            'theme_documentation' => 'https://nkdev.info/docs/skylith-wp/',
            'theme_changelog'     => 'https://nkdev.info/docs/skylith-wp/log/',
            'ask_for_review'      => true,
            'is_envato_elements'  => true,
            'demos'               => $skylith_demos_for_framework,
        ));

        // TGMPA.
        Ghost_Framework::add_tgmpa(
            array(
                // GhostKit.
                array(
                    'name'       => 'Ghost Kit',
                    'slug'       => 'ghostkit',
                    'required'   => true,
                ),

                // GhostKit PRO.
                array(
                    'name'       => 'Ghost Kit PRO',
                    'slug'       => 'ghostkit-pro',
                    'source'     => 'https://a.nkdev.info/wp-plugins/ghostkit-pro.zip',
                    'required'   => true,
                ),

                // LazyBlocks.
                array(
                    'name'       => 'Lazy Blocks',
                    'slug'       => 'lazy-blocks',
                    'required'   => true,
                ),

                // Skylith Core.
                array(
                    'name'     => 'Skylith Core',
                    'slug'     => 'skylith-core',
                    'source'   => 'https://a.nkdev.info/wp-plugins/skylith-core.zip',
                    'required' => true,
                ),

                // nK Themes Helper.
                array(
                    'name'       => 'nK Themes Helper',
                    'slug'       => 'nk-themes-helper',
                    'source'     => 'https://a.nkdev.info/wp-plugins/nk-themes-helper.zip',
                    'required'   => true,
                ),

                // Visual Portfolio.
                array(
                    'name'     => 'Visual Portfolio',
                    'slug'     => 'visual-portfolio',
                    'required' => false,
                ),

                // AWB.
                array(
                    'name'     => 'Advanced WordPress Backgrounds',
                    'slug'     => 'advanced-backgrounds',
                    'required' => false,
                ),

                // WooCommerce.
                array(
                    'name'     => 'WooCommerce',
                    'slug'     => 'woocommerce',
                    'required' => false,
                ),

                // Sociality.
                array(
                    'name'     => 'Sociality',
                    'slug'     => 'sociality',
                    'required' => false,
                ),

                // Menu Icons.
                array(
                    'name'     => 'Menu Icons',
                    'slug'     => 'menu-icons',
                    'required' => false,
                ),

                // Safe SVG.
                array(
                    'name'     => 'Safe SVG',
                    'slug'     => 'safe-svg',
                    'required' => false,
                ),
            )
        );

        // page border.
        if ( Ghost_Framework::get_theme_mod( 'general_page_border' ) ) {
            Ghost_Framework::add_body_class( 'nk-page-border' );
        }

        // dark background.
        if ( Ghost_Framework::get_theme_mod( 'general_dark_content' ) ) {
            Ghost_Framework::add_body_class( 'skylith-body-dark' );
        }

        // add Mega Menu support.
        Ghost_Framework::add_mega_menu();

        // Add block editor boxed styles.
        add_action( 'enqueue_block_editor_assets', array( __CLASS__, 'enqueue_block_editor_assets' ) );
    }

    /**
     * Add block editor boxed styles.
     */
    public static function enqueue_block_editor_assets() {
        global $current_screen;

        if ( $current_screen && $current_screen->post_type ) {
            $container_type = Ghost_Framework::get_theme_mod( 'single_' . $current_screen->post_type . '_boxed' );

            if ( $container_type && 'small' === $container_type ) {
                wp_enqueue_style( 'skylith-editor-boxed', get_template_directory_uri() . '/editor-style-boxed.css', array(), '1.3.3', 'all' );
            }
        }
    }
}

Skylith_Framework_Init::init();
