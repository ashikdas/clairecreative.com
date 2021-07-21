<?php
/**
 * Theme Options
 *
 * @package skylith
 */

if ( ! function_exists( 'skylith_customize_register' ) ) :
    /**
     * Remove some default customizer options (we don't to use it because theme has own options)
     *
     * @param object $wp_customize - customizer object.
     */
    function skylith_customize_register( $wp_customize ) {
        $wp_customize->remove_control( 'display_header_text' );

        $wp_customize->remove_section( 'colors' );
        $wp_customize->remove_section( 'header_image' );
        $wp_customize->remove_section( 'background_image' );
    }
endif;
add_action( 'customize_register', 'skylith_customize_register' );


/**
 * Options config
 */
Ghost_Framework::add_config(
    array(
        'capability'  => 'edit_theme_options',
        'option_type' => 'theme_mod',
    )
);


/**
 * Sections and Panels
 */

// General.
Ghost_Framework::add_section(
    'general',
    array(
        'title'    => esc_html__( 'General', 'skylith' ),
        'priority' => 29,
    )
);

// Single Page.
Ghost_Framework::add_panel(
    'single_page',
    array(
        'title'    => esc_html__( 'Single Page', 'skylith' ),
        'priority' => 30,
    )
);
Ghost_Framework::add_section(
    'single_page_content',
    array(
        'title' => esc_html__( 'Content', 'skylith' ),
        'panel' => 'single_page',
    )
);
Ghost_Framework::add_section(
    'single_page_header',
    array(
        'title' => esc_html__( 'Header', 'skylith' ),
        'panel' => 'single_page',
    )
);

// Single Post.
Ghost_Framework::add_panel(
    'single_post',
    array(
        'title'    => esc_html__( 'Single Post', 'skylith' ),
        'priority' => 30,
    )
);
Ghost_Framework::add_section(
    'single_post_content',
    array(
        'title' => esc_html__( 'Content', 'skylith' ),
        'panel' => 'single_post',
    )
);
Ghost_Framework::add_section(
    'single_post_header',
    array(
        'title' => esc_html__( 'Header', 'skylith' ),
        'panel' => 'single_post',
    )
);

// Single Portfolio.
Ghost_Framework::add_panel(
    'single_portfolio',
    array(
        'title'    => esc_html__( 'Single Portfolio Item', 'skylith' ),
        'priority' => 30,
    )
);
Ghost_Framework::add_section(
    'single_portfolio_content',
    array(
        'title' => esc_html__( 'Content', 'skylith' ),
        'panel' => 'single_portfolio',
    )
);
Ghost_Framework::add_section(
    'single_portfolio_header',
    array(
        'title' => esc_html__( 'Header', 'skylith' ),
        'panel' => 'single_portfolio',
    )
);

// Archive.
Ghost_Framework::add_panel(
    'archive',
    array(
        'title'    => esc_html__( 'Archive', 'skylith' ),
        'priority' => 30,
    )
);
Ghost_Framework::add_section(
    'archive_content',
    array(
        'title' => esc_html__( 'Content', 'skylith' ),
        'panel' => 'archive',
    )
);
Ghost_Framework::add_section(
    'archive_header',
    array(
        'title' => esc_html__( 'Header', 'skylith' ),
        'panel' => 'archive',
    )
);

// Search.
Ghost_Framework::add_panel(
    'search',
    array(
        'title'    => esc_html__( 'Search', 'skylith' ),
        'icon'     => 'dashicons-search',
        'priority' => 30,
    )
);
Ghost_Framework::add_section(
    'search_content',
    array(
        'title' => esc_html__( 'Content', 'skylith' ),
        'panel' => 'search',
    )
);
Ghost_Framework::add_section(
    'search_header',
    array(
        'title' => esc_html__( 'Header', 'skylith' ),
        'panel' => 'search',
    )
);

// 404.
Ghost_Framework::add_section(
    '404_page',
    array(
        'title'    => esc_html__( '404 Page', 'skylith' ),
        'icon'     => 'dashicons-warning',
        'priority' => 30,
    )
);

// Preloader.
Ghost_Framework::add_section(
    'preloader',
    array(
        'title'    => esc_html__( 'Preloader', 'skylith' ),
        'icon'     => 'dashicons-update',
        'priority' => 30,
    )
);

// Custom Colors.
Ghost_Framework::add_section(
    'custom_colors',
    array(
        'title'    => esc_html__( 'Custom Colors', 'skylith' ),
        'icon'     => 'dashicons-art',
        'priority' => 30,
    )
);

// Navigations.
Ghost_Framework::add_panel(
    'navigation',
    array(
        'title'    => esc_html__( 'Navigation', 'skylith' ),
        'icon'     => 'dashicons-menu',
        'priority' => 30,
    )
);
Ghost_Framework::add_section(
    'main_navigation',
    array(
        'title' => esc_html__( 'Main Navigation', 'skylith' ),
        'panel' => 'navigation',
    )
);
Ghost_Framework::add_section(
    'side_navigation',
    array(
        'title' => esc_html__( 'Side Navigation', 'skylith' ),
        'panel' => 'navigation',
    )
);
Ghost_Framework::add_section(
    'fullscreen_navigation',
    array(
        'title' => esc_html__( 'Fullscreen Navigation', 'skylith' ),
        'panel' => 'navigation',
    )
);
Ghost_Framework::add_section(
    'social_navigation',
    array(
        'title' => esc_html__( 'Social Navigation', 'skylith' ),
        'panel' => 'navigation',
    )
);

// Footer.
Ghost_Framework::add_section(
    'footer',
    array(
        'title'    => esc_html__( 'Footer', 'skylith' ),
        'icon'     => 'dashicons-arrow-down-alt',
        'priority' => 30,
    )
);


/**
 * General
 * */
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'general_dark_content',
        'label'    => esc_html__( 'Dark content', 'skylith' ),
        'section'  => 'general',
        'default'  => 'off',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'general_scroll_top_button',
        'label'    => esc_html__( 'Scroll top button', 'skylith' ),
        'section'  => 'general',
        'default'  => 'off',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'general_page_border',
        'label'    => esc_html__( 'Page border', 'skylith' ),
        'section'  => 'general',
        'default'  => 'off',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'general_page_border_color_1',
        'label'           => esc_attr__( 'Border color 1', 'skylith' ),
        'section'         => 'general',
        'default'         => '#00e8bf',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => false,
        ),
        'output'          => array(
            array(
                'element'         => 'body.nk-page-border',
                'property'        => 'background-image',
                'value_pattern'   => 'linear-gradient(to bottom, color_1, color_2)',
                'pattern_replace' => array(
                    'color_1' => 'general_page_border_color_1',
                    'color_2' => 'general_page_border_color_2',
                ),
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'general_page_border',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'general_page_border_color_2',
        'label'           => esc_attr__( 'Border color 2', 'skylith' ),
        'section'         => 'general',
        'default'         => '#795eff',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => false,
        ),
        'output'          => array(
            array(
                'element'         => 'body.nk-page-border',
                'property'        => 'background-image',
                'value_pattern'   => 'linear-gradient(to bottom, color_1, color_2)',
                'pattern_replace' => array(
                    'color_1' => 'general_page_border_color_1',
                    'color_2' => 'general_page_border_color_2',
                ),
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'general_page_border',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'image',
        'settings' => 'general_left_side_image',
        'label'    => esc_html__( 'Left Side Image', 'skylith' ),
        'section'  => 'general',
        'default'  => '',
        'priority' => 10,
    )
);


/**
 * Single page
 * */
// Header.
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_page_header_show',
        'label'    => esc_html__( 'Show', 'skylith' ),
        'section'  => 'single_page_header',
        'default'  => 'off',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_page_header_size',
        'label'           => esc_html__( 'Size', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => 'sm',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            'sm'   => esc_attr__( 'Small Size', 'skylith' ),
            'md'   => esc_attr__( 'Mid Size', 'skylith' ),
            'lg'   => esc_attr__( 'Large Size', 'skylith' ),
            'xl'   => esc_attr__( 'X-Large Size', 'skylith' ),
            'full' => esc_attr__( 'Full Size', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_page_header_parallax',
        'label'           => esc_html__( 'Parallax for Background Image', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_page_header_parallax_content',
        'label'           => esc_html__( 'Parallax for Content', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_page_header_type_image',
        'label'           => esc_html__( 'Select Type of Background Image', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => 'custom',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            false      => esc_attr__( 'Disabled', 'skylith' ),
            'featured' => esc_attr__( 'Featured', 'skylith' ),
            'custom'   => esc_attr__( 'Custom', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'single_page_header_background_image',
        'label'           => esc_html__( 'Background Image', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => get_template_directory_uri() . '/assets/images/header-bg.jpg',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
            array(
                'setting'  => 'single_page_header_type_image',
                'operator' => '==',
                'value'    => 'custom',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'single_page_header_overlay',
        'label'           => esc_attr__( 'Overlay Color', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => 'rgba(0, 0, 0, 0.6)',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'single_page_header_color',
        'label'           => esc_attr__( 'Custom Text Color', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => '#fff',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_page_header_sub_title',
        'label'           => esc_html__( 'Sub Title', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'editor',
        'settings'        => 'single_page_header_content',
        'label'           => esc_html__( 'Content', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_page_header_video_link',
        'label'           => esc_html__( 'Video Link', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => '',
        'description'     => esc_html__( 'Supported YouTube and Vimeo video link', 'skylith' ),
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_page_header_scroll_down_button',
        'label'           => esc_html__( 'Scroll Down Button', 'skylith' ),
        'section'         => 'single_page_header',
        'default'         => 'off',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_page_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
// Content.
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'single_page_boxed',
        'label'    => esc_html__( 'Boxed', 'skylith' ),
        'section'  => 'single_page_content',
        'default'  => 'normal',
        'priority' => 10,
        'multiple' => 0,
        'choices'  => array(
            false    => esc_html__( 'Disabled', 'skylith' ),
            'normal' => esc_html__( 'Default', 'skylith' ),
            'small'  => esc_html__( 'Small', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_page_paddings',
        'label'    => esc_html__( 'Top and Bottom paddings', 'skylith' ),
        'section'  => 'single_page_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_page_show_featured_image',
        'label'    => esc_html__( 'Show Featured Image', 'skylith' ),
        'section'  => 'single_page_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_page_featured_image_stretch',
        'label'           => esc_html__( 'Featured Image Stretch', 'skylith' ),
        'section'         => 'single_page_content',
        'default'         => 'off',
        'priority'        => 10,
        'choices'         => array(
            'off'  => esc_attr__( 'Disabled', 'skylith' ),
            'wide' => esc_attr__( 'Wide', 'skylith' ),
            true   => esc_attr__( 'Full', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                array(
                    'setting'  => 'single_page_show_featured_image',
                    'operator' => '==',
                    'value'    => true,
                ),
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_page_featured_image_position',
        'label'           => esc_html__( 'Featured Image Position', 'skylith' ),
        'section'         => 'single_page_content',
        'default'         => '',
        'choices'         => array(
            ''               => esc_attr__( 'Before Title', 'skylith' ),
            'before_content' => esc_attr__( 'Before Content', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                array(
                    'setting'  => 'single_page_show_featured_image',
                    'operator' => '==',
                    'value'    => true,
                ),
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_page_show_title',
        'label'    => esc_html__( 'Show Title', 'skylith' ),
        'section'  => 'single_page_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'single_page_sidebar_place',
        'label'    => esc_html__( 'Show Sidebar', 'skylith' ),
        'section'  => 'single_page_content',
        'default'  => false,
        'choices'  => array(
            false   => esc_attr__( 'None', 'skylith' ),
            'right' => esc_attr__( 'Right', 'skylith' ),
            'left'  => esc_attr__( 'Left', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'sidebars',
        'settings'        => 'single_page_sidebar',
        'label'           => esc_html__( 'Sidebar', 'skylith' ),
        'section'         => 'single_page_content',
        'default'         => 'sidebar-post',
        'active_callback' => array(
            array(
                'setting'  => 'single_page_sidebar_place',
                'operator' => '!=',
                'value'    => false,
            ),
        ),
    )
);

/**
 * Single post
 * */
// Content.
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'single_post_boxed',
        'label'    => esc_html__( 'Boxed', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => 'small',
        'priority' => 10,
        'multiple' => 0,
        'choices'  => array(
            false    => esc_html__( 'Disabled', 'skylith' ),
            'normal' => esc_html__( 'Default', 'skylith' ),
            'small'  => esc_html__( 'Small', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_post_paddings',
        'label'    => esc_html__( 'Top padding', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_post_show_featured_image',
        'label'    => esc_html__( 'Show Featured Image', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_post_featured_image_stretch',
        'label'           => esc_html__( 'Featured Image Stretch', 'skylith' ),
        'section'         => 'single_post_content',
        'default'         => 'off',
        'priority'        => 10,
        'choices'         => array(
            'off'  => esc_attr__( 'Disabled', 'skylith' ),
            'wide' => esc_attr__( 'Wide', 'skylith' ),
            true   => esc_attr__( 'Full', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                array(
                    'setting'  => 'single_post_show_featured_image',
                    'operator' => '==',
                    'value'    => true,
                ),
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_post_featured_image_position',
        'label'           => esc_html__( 'Featured Image Position', 'skylith' ),
        'section'         => 'single_post_content',
        'default'         => '',
        'choices'         => array(
            ''               => esc_attr__( 'Before Title', 'skylith' ),
            'before_content' => esc_attr__( 'Before Content', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                array(
                    'setting'  => 'single_post_show_featured_image',
                    'operator' => '==',
                    'value'    => true,
                ),
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_post_show_title',
        'label'    => esc_html__( 'Show Title', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_post_show_meta',
        'label'    => esc_html__( 'Show Meta', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_post_title_meta_center',
        'label'           => esc_html__( 'Centering of Title and Meta', 'skylith' ),
        'section'         => 'single_post_content',
        'default'         => '',
        'choices'         => array(
            ''       => esc_attr__( 'Left', 'skylith' ),
            'center' => esc_attr__( 'Center', 'skylith' ),
            'right'  => esc_attr__( 'Right', 'skylith' ),
        ),
        'output'          => array(
            array(
                'element'  => implode(
                    ', ',
                    array(
                        '.single-post .entry-header',
                        '.single-post .nk-post-meta',
                    )
                ),
                'property' => 'text-align',
            ),
        ),
        'active_callback' => array(
            array(
                array(
                    'setting'  => 'single_post_show_title',
                    'operator' => '==',
                    'value'    => true,
                ),
                array(
                    'setting'  => 'single_post_show_meta',
                    'operator' => '==',
                    'value'    => true,
                ),
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_post_show_prev_next',
        'label'    => esc_html__( 'Show Pagination', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_post_archive_url',
        'label'           => esc_html__( 'Paginations Archive Page URL', 'skylith' ),
        'section'         => 'single_post_content',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_show_prev_next',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'color',
        'settings' => 'single_post_pagination_background',
        'label'    => esc_html__( 'Pagination Background', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => '#ffffff',
        'priority' => 10,
        'output'   => array(
            array(
                'element'  => '.single-post .nk-pagination',
                'property' => 'background-color',
            ),
        ),
        'required' => array(
            array(
                'setting'  => 'single_post_show_prev_next',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'color',
        'settings' => 'single_post_pagination_color',
        'label'    => esc_html__( 'Pagination Text Color', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => '#171717',
        'priority' => 10,
        'output'   => array(
            array(
                'element'  => '.single-post .nk-pagination',
                'property' => 'color',
            ),
        ),
        'required' => array(
            array(
                'setting'  => 'single_post_show_prev_next',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    )
);


Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'single_post_sidebar_place',
        'label'    => esc_html__( 'Show Sidebar', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => 'right',
        'choices'  => array(
            false   => esc_attr__( 'None', 'skylith' ),
            'right' => esc_attr__( 'Right', 'skylith' ),
            'left'  => esc_attr__( 'Left', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'sidebars',
        'settings'        => 'single_post_sidebar',
        'label'           => esc_html__( 'Sidebar', 'skylith' ),
        'section'         => 'single_post_content',
        'default'         => 'sidebar-post',
        'active_callback' => array(
            array(
                'setting'  => 'single_post_sidebar_place',
                'operator' => '!=',
                'value'    => false,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'single_post_comments_style',
        'label'    => esc_html__( 'Comments Style', 'skylith' ),
        'section'  => 'single_post_content',
        'default'  => '2',
        'choices'  => array(
            '1' => esc_attr__( 'Style 1', 'skylith' ),
            '2' => esc_attr__( 'Style 2', 'skylith' ),
        ),
    )
);
// Header.
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_post_header_show',
        'label'    => esc_html__( 'Show', 'skylith' ),
        'section'  => 'single_post_header',
        'default'  => 'off',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_post_header_size',
        'label'           => esc_html__( 'Size', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => 'sm',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            'sm'   => esc_attr__( 'Small Size', 'skylith' ),
            'md'   => esc_attr__( 'Mid Size', 'skylith' ),
            'lg'   => esc_attr__( 'Large Size', 'skylith' ),
            'xl'   => esc_attr__( 'X-Large Size', 'skylith' ),
            'full' => esc_attr__( 'Full Size', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_post_header_parallax',
        'label'           => esc_html__( 'Parallax for Background Image', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_post_header_parallax_content',
        'label'           => esc_html__( 'Parallax for Content', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_post_header_type_image',
        'label'           => esc_html__( 'Type of Background Image', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => 'featured',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            false      => esc_attr__( 'Disabled', 'skylith' ),
            'featured' => esc_attr__( 'Featured', 'skylith' ),
            'custom'   => esc_attr__( 'Custom', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'single_post_header_background_image',
        'label'           => esc_html__( 'Background Image', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => get_template_directory_uri() . '/assets/images/header-bg.jpg',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
            array(
                'setting'  => 'single_post_header_type_image',
                'operator' => '==',
                'value'    => 'custom',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'single_post_header_overlay',
        'label'           => esc_attr__( 'Overlay Color', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => 'rgba(0, 0, 0, 0.6)',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'single_post_header_color',
        'label'           => esc_attr__( 'Custom Text Color', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => '#fff',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_post_header_title_type',
        'label'           => esc_html__( 'Title Type', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => 'title',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            false    => esc_attr__( 'Disabled', 'skylith' ),
            'title'  => esc_attr__( 'Post Title', 'skylith' ),
            'custom' => esc_attr__( 'Custom', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_post_header_title',
        'label'           => esc_html__( 'Title', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
            array(
                'setting'  => 'single_post_header_title_type',
                'operator' => '==',
                'value'    => 'custom',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_post_header_show_meta',
        'label'           => esc_html__( 'Show Meta', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => 'off',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_post_header_sub_title',
        'label'           => esc_html__( 'Sub Title', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'editor',
        'settings'        => 'single_post_header_content',
        'label'           => esc_html__( 'Content', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_post_header_video_link',
        'label'           => esc_html__( 'Video Link', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => '',
        'description'     => esc_html__( 'Supported YouTube and Vimeo video link', 'skylith' ),
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_post_header_scroll_down_button',
        'label'           => esc_html__( 'Scroll Down Button', 'skylith' ),
        'section'         => 'single_post_header',
        'default'         => 'off',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_post_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);

/**
 * Archive page
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'archive_boxed',
        'label'    => esc_html__( 'Boxed', 'skylith' ),
        'section'  => 'archive_content',
        'default'  => 'small',
        'priority' => 10,
        'multiple' => 0,
        'choices'  => array(
            false    => esc_html__( 'Disabled', 'skylith' ),
            'normal' => esc_html__( 'Default', 'skylith' ),
            'small'  => esc_html__( 'Small', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'archive_show_title',
        'label'    => esc_html__( 'Show Title', 'skylith' ),
        'section'  => 'archive_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
// Header.
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'archive_header_show',
        'label'    => esc_html__( 'Show', 'skylith' ),
        'section'  => 'archive_header',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'archive_header_size',
        'label'           => esc_html__( 'Size', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => 'sm',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            'sm'   => esc_attr__( 'Small Size', 'skylith' ),
            'md'   => esc_attr__( 'Mid Size', 'skylith' ),
            'lg'   => esc_attr__( 'Large Size', 'skylith' ),
            'xl'   => esc_attr__( 'X-Large Size', 'skylith' ),
            'full' => esc_attr__( 'Full Size', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'archive_header_parallax',
        'label'           => esc_html__( 'Parallax for Background Image', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'archive_header_parallax_content',
        'label'           => esc_html__( 'Parallax for Content', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'archive_header_background_image',
        'label'           => esc_html__( 'Background Image', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => get_template_directory_uri() . '/assets/images/header-bg.jpg',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'archive_header_overlay',
        'label'           => esc_attr__( 'Overlay Color', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => 'rgba(0, 0, 0, 0.6)',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'archive_header_color',
        'label'           => esc_attr__( 'Custom Text Color', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => '#fff',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'archive_header_sub_title',
        'label'           => esc_html__( 'Sub Title', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'editor',
        'settings'        => 'archive_header_content',
        'label'           => esc_html__( 'Content', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'archive_header_video_link',
        'label'           => esc_html__( 'Video Link', 'skylith' ),
        'section'         => 'archive_header',
        'description'     => esc_html__( 'Supported YouTube and Vimeo video link', 'skylith' ),
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'archive_header_scroll_down_button',
        'label'           => esc_html__( 'Scroll Down Button', 'skylith' ),
        'section'         => 'archive_header',
        'default'         => 'off',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'archive_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);

/**
 * Single Portfolio Item
 */
// content.
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'single_portfolio_boxed',
        'label'    => esc_html__( 'Boxed', 'skylith' ),
        'section'  => 'single_portfolio_content',
        'default'  => 'normal',
        'priority' => 10,
        'multiple' => 0,
        'choices'  => array(
            false    => esc_html__( 'Disabled', 'skylith' ),
            'normal' => esc_html__( 'Default', 'skylith' ),
            'small'  => esc_html__( 'Small', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_portfolio_paddings',
        'label'    => esc_html__( 'Top and Bottom paddings', 'skylith' ),
        'section'  => 'single_portfolio_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_portfolio_show_title',
        'label'    => esc_html__( 'Show Title', 'skylith' ),
        'section'  => 'single_portfolio_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_portfolio_show_prev_next',
        'label'    => esc_html__( 'Show Pagination', 'skylith' ),
        'section'  => 'single_portfolio_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_portfolio_archive_url',
        'label'           => esc_html__( 'Pagination Portfolio Archive Page URL', 'skylith' ),
        'section'         => 'single_portfolio_content',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_show_prev_next',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'color',
        'settings' => 'single_portfolio_pagination_background',
        'label'    => esc_html__( 'Pagination Background', 'skylith' ),
        'section'  => 'single_portfolio_content',
        'default'  => '#ffffff',
        'priority' => 10,
        'output'   => array(
            array(
                'element'  => '.nk-portfolio-single ~ .nk-pagination',
                'property' => 'background-color',
            ),
        ),
        'required' => array(
            array(
                'setting'  => 'single_portfolio_show_prev_next',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'color',
        'settings' => 'single_portfolio_pagination_color',
        'label'    => esc_html__( 'Pagination Text Color', 'skylith' ),
        'section'  => 'single_portfolio_content',
        'default'  => '#171717',
        'priority' => 10,
        'output'   => array(
            array(
                'element'  => '.nk-portfolio-single ~ .nk-pagination',
                'property' => 'color',
            ),
        ),
        'required' => array(
            array(
                'setting'  => 'single_portfolio_show_prev_next',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    )
);

// Header.
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'single_portfolio_header_show',
        'label'    => esc_html__( 'Show', 'skylith' ),
        'section'  => 'single_portfolio_header',
        'default'  => 'off',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_portfolio_header_size',
        'label'           => esc_html__( 'Size', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => 'sm',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            'sm'   => esc_attr__( 'Small Size', 'skylith' ),
            'md'   => esc_attr__( 'Mid Size', 'skylith' ),
            'lg'   => esc_attr__( 'Large Size', 'skylith' ),
            'xl'   => esc_attr__( 'X-Large Size', 'skylith' ),
            'full' => esc_attr__( 'Full Size', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_portfolio_header_parallax',
        'label'           => esc_html__( 'Parallax for Background Image', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_portfolio_header_parallax_content',
        'label'           => esc_html__( 'Parallax for Content', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_portfolio_header_type_image',
        'label'           => esc_html__( 'Select Type of Background Image', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => 'featured',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            false      => esc_attr__( 'Disabled', 'skylith' ),
            'featured' => esc_attr__( 'Featured', 'skylith' ),
            'custom'   => esc_attr__( 'Custom', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'single_portfolio_header_background_image',
        'label'           => esc_html__( 'Background Image', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => get_template_directory_uri() . '/assets/images/header-bg.jpg',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
            array(
                'setting'  => 'single_portfolio_header_type_image',
                'operator' => '==',
                'value'    => 'custom',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'single_portfolio_header_overlay',
        'label'           => esc_attr__( 'Overlay Color', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => 'rgba(0, 0, 0, 0.6)',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'single_portfolio_header_color',
        'label'           => esc_attr__( 'Custom Text Color', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => '#fff',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'single_portfolio_header_title_type',
        'label'           => esc_html__( 'Title Type', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => 'title',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            false    => esc_attr__( 'Disabled', 'skylith' ),
            'title'  => esc_attr__( 'Post Title', 'skylith' ),
            'custom' => esc_attr__( 'Custom', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_portfolio_header_title',
        'label'           => esc_html__( 'Title', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
            array(
                'setting'  => 'single_portfolio_header_title_type',
                'operator' => '==',
                'value'    => 'custom',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_portfolio_header_sub_title',
        'label'           => esc_html__( 'Sub Title', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'editor',
        'settings'        => 'single_portfolio_header_content',
        'label'           => esc_html__( 'Content', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'single_portfolio_header_video_link',
        'label'           => esc_html__( 'Video Link', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => '',
        'description'     => esc_html__( 'Supported YouTube and Vimeo video link', 'skylith' ),
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'single_portfolio_header_scroll_down_button',
        'label'           => esc_html__( 'Scroll Down Button', 'skylith' ),
        'section'         => 'single_portfolio_header',
        'default'         => 'off',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'single_portfolio_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);

/**
 * Search page
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'search_boxed',
        'label'    => esc_html__( 'Boxed', 'skylith' ),
        'section'  => 'search_content',
        'default'  => 'small',
        'priority' => 10,
        'multiple' => 0,
        'choices'  => array(
            false    => esc_html__( 'Disabled', 'skylith' ),
            'normal' => esc_html__( 'Default', 'skylith' ),
            'small'  => esc_html__( 'Small', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'search_show_title',
        'label'    => esc_html__( 'Show Title', 'skylith' ),
        'section'  => 'search_content',
        'default'  => 'on',
        'priority' => 10,
    )
);
// Header.
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'search_header_show',
        'label'    => esc_html__( 'Show', 'skylith' ),
        'section'  => 'search_header',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'search_header_size',
        'label'           => esc_html__( 'Size', 'skylith' ),
        'section'         => 'search_header',
        'default'         => 'sm',
        'priority'        => 10,
        'multiple'        => 0,
        'choices'         => array(
            'sm'   => esc_attr__( 'Small Size', 'skylith' ),
            'md'   => esc_attr__( 'Mid Size', 'skylith' ),
            'lg'   => esc_attr__( 'Large Size', 'skylith' ),
            'xl'   => esc_attr__( 'X-Large Size', 'skylith' ),
            'full' => esc_attr__( 'Full Size', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'search_header_parallax',
        'label'           => esc_html__( 'Parallax for Background Image', 'skylith' ),
        'section'         => 'search_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'search_header_parallax_content',
        'label'           => esc_html__( 'Parallax for Content', 'skylith' ),
        'section'         => 'search_header',
        'default'         => 'on',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'search_header_background_image',
        'label'           => esc_html__( 'Background Image', 'skylith' ),
        'section'         => 'search_header',
        'default'         => get_template_directory_uri() . '/assets/images/header-bg.jpg',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'search_header_overlay',
        'label'           => esc_attr__( 'Overlay Color', 'skylith' ),
        'section'         => 'search_header',
        'default'         => 'rgba(0, 0, 0, 0.6)',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'search_header_color',
        'label'           => esc_attr__( 'Custom Text Color', 'skylith' ),
        'section'         => 'search_header',
        'default'         => '#fff',
        'priority'        => 10,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),

        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'search_header_sub_title',
        'label'           => esc_html__( 'Sub Title', 'skylith' ),
        'section'         => 'search_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'editor',
        'settings'        => 'search_header_content',
        'label'           => esc_html__( 'Content', 'skylith' ),
        'section'         => 'search_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'text',
        'settings'        => 'search_header_video_link',
        'label'           => esc_html__( 'Video Link', 'skylith' ),
        'section'         => 'search_header',
        'description'     => esc_html__( 'Supported YouTube and Vimeo video link', 'skylith' ),
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'search_header_scroll_down_button',
        'label'           => esc_html__( 'Scroll Down Button', 'skylith' ),
        'section'         => 'search_header',
        'default'         => 'off',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'search_header_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);

/**
 * Not Found page
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'image',
        'settings' => '404_background_image',
        'label'    => esc_html__( 'Background image', 'skylith' ),
        'section'  => '404_page',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => '404_show_text',
        'label'    => esc_html__( 'Show Text', 'skylith' ),
        'section'  => '404_page',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => '404_show_search',
        'label'    => esc_html__( 'Show Search', 'skylith' ),
        'section'  => '404_page',
        'default'  => 'off',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => '404_show_home_button',
        'label'    => esc_html__( 'Show Home Button', 'skylith' ),
        'section'  => '404_page',
        'default'  => 'on',
        'priority' => 10,
    )
);


/**
 * Preloader
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'preloader_show',
        'label'    => esc_html__( 'Show Preloader', 'skylith' ),
        'section'  => 'preloader',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'preloader_logo',
        'label'           => esc_html__( 'Logo', 'skylith' ),
        'section'         => 'preloader',
        'default'         => get_template_directory_uri() . '/assets/images/logo-2.svg',
        'active_callback' => array(
            array(
                'setting'  => 'preloader_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'preloader_logo_width',
        'label'           => esc_html__( 'Logo width', 'skylith' ),
        'section'         => 'preloader',
        'default'         => 20,
        'choices'         => array(
            'min'  => 10,
            'max'  => 200,
            'step' => 1,
        ),
        'output'          => array(
            array(
                'element'  => '.nk-preloader img',
                'property' => 'width',
                'suffix'   => 'px',
            ),
            array(
                'element'       => '.nk-preloader .nk-preloader-spinner',
                'property'      => 'width',
                'value_pattern' => 'calc( 100px / 2 + $px / 2 )',
            ),
            array(
                'element'       => '.nk-preloader .nk-preloader-spinner',
                'property'      => 'margin-left',
                'value_pattern' => 'calc( -100px / 2 - $px / 2 )',
            ),
            array(
                'element'       => '.nk-preloader .nk-preloader-spinner',
                'property'      => 'height',
                'value_pattern' => 'calc( 100px + $px )',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'preloader_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'preloader_spinner_dark',
        'label'    => esc_html__( 'Preloader Dark Spinner', 'skylith' ),
        'section'  => 'preloader',
        'default'  => 'on',
        'priority' => 10,
        'required' => array(
            array(
                'setting'  => 'preloader_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'color',
        'settings' => 'preloader_color',
        'label'    => esc_html__( 'Background Color', 'skylith' ),
        'section'  => 'preloader',
        'default'  => '#ffffff',
        'priority' => 10,
        'output'   => array(
            array(
                'element'  => '.nk-preloader::before',
                'property' => 'background-color',
            ),
        ),
        'required' => array(
            array(
                'setting'  => 'preloader_show',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);


/**
 * Custom Colors
 */
if ( ! function_exists( 'nk_theme' ) ) {
    Ghost_Framework::add_field(
        array(
            'type'        => 'custom',
            'settings'    => 'custom_colors_message_without_nk_themes_helper',
            'label'       => esc_html__( 'Required Plugin', 'skylith' ),
            'description' => esc_html__( 'To generate custom styles you need to install nK Themes Helper plugin', 'skylith' ),
            'section'     => 'custom_colors',
            'priority'    => 10,
        )
    );
} elseif ( ! nk_theme()->theme_dashboard()->is_envato_hosted && ! nk_theme()->theme_dashboard()->activation()->active ) {
    Ghost_Framework::add_field(
        array(
            'type'        => 'custom',
            'settings'    => 'custom_colors_message_without_nk_themes_activated',
            'label'       => esc_html__( 'Required Theme License Activation', 'skylith' ),
            // translators: %s - theme dashboard url.
            'description' => sprintf( wp_kses( __( 'Custom styles can only be used in the activated theme. Please visit the <a href="%s" target="_blank">theme dashboard page</a> and activate the theme.', 'skylith' ), array( 'a' => array( 'href' => array() ) ) ), admin_url( 'admin.php?page=nk-theme' ) ),
            'section'     => 'custom_colors',
            'priority'    => 10,
        )
    );
} elseif ( version_compare( phpversion(), '5.4', '<' ) ) {
    Ghost_Framework::add_field(
        array(
            'type'     => 'custom',
            'settings' => 'custom_colors_message_without_php',
            'label'    => esc_html__( 'Required PHP version 5.4 or higher', 'skylith' ),
            'section'  => 'custom_colors',
            'priority' => 10,
        )
    );
} else {
    Ghost_Framework::add_field(
        array(
            'type'     => 'toggle',
            'settings' => 'custom_colors',
            'label'    => esc_html__( 'Enable custom colors', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => 'off',
            'priority' => 10,
        )
    );

    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_main',
            'label'    => esc_html__( 'Main Color', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '#b9a186',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_secondary',
            'label'    => esc_html__( 'Secondary Color (optional for gradients)', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_text',
            'label'    => esc_html__( 'Text Color', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '#5f5f5f',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_text_blog',
            'label'    => esc_html__( 'Content Text Color', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '#4b4b4b',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_titles',
            'label'    => esc_html__( 'Titles Color', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '#171717',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_bg',
            'label'    => esc_html__( 'Background Color', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '#f6f6f6',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_dark_text',
            'label'    => esc_html__( 'Dark Content Text Color', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '#cbcbcb',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_dark_titles',
            'label'    => esc_html__( 'Dark Content Titles Color', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '#fff',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
    Ghost_Framework::add_field(
        array(
            'type'     => 'color',
            'settings' => 'custom_colors_color_main_dark',
            'label'    => esc_html__( 'Main Dark Color', 'skylith' ),
            'section'  => 'custom_colors',
            'default'  => '#101010',
            'priority' => 10,
            'required' => array(
                array(
                    'setting'  => 'custom_colors',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        )
    );
}


/**
 * Main Navigation
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'main_navigation_show',
        'label'    => esc_html__( 'Show', 'skylith' ),
        'section'  => 'main_navigation',
        'default'  => 'top',
        'choices'  => array(
            false            => esc_attr__( 'Disabled', 'skylith' ),
            'top'            => esc_attr__( 'Top', 'skylith' ),
            'top_fullscreen' => esc_attr__( 'Top Fullscreen', 'skylith' ),
            'top_side'       => esc_attr__( 'Top Side', 'skylith' ),
            'left'           => esc_attr__( 'Left', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'mobile_navigation_show',
        'label'           => esc_html__( 'Mobile Menu Type', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'fullscreen',
        'choices'         => array(
            false        => esc_attr__( 'Disabled', 'skylith' ),
            'fullscreen' => esc_attr__( 'Fullscreen', 'skylith' ),
            'side'       => esc_attr__( 'Side', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'top_fullscreen',
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'top_side',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'main_navigation_logo',
        'label'           => esc_html__( 'Logo Dark', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => get_template_directory_uri() . '/assets/images/logo.svg',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'main_navigation_logo_light',
        'label'           => esc_html__( 'Logo Light', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => get_template_directory_uri() . '/assets/images/logo-light.svg',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'main_navigation_logo_width',
        'label'           => esc_html__( 'Logo width', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 70,
        'choices'         => array(
            'min'  => 20,
            'max'  => 400,
            'step' => 1,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
        ),
    )
);

// left nav logo.
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'main_navigation_left_logo',
        'label'           => esc_html__( 'Logo Dark', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => get_template_directory_uri() . '/assets/images/logo-2.svg',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '==',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'image',
        'settings'        => 'main_navigation_left_logo_light',
        'label'           => esc_html__( 'Logo Light', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => get_template_directory_uri() . '/assets/images/logo-2-light.svg',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '==',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'main_navigation_left_logo_width',
        'label'           => esc_html__( 'Logo width', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 19,
        'choices'         => array(
            'min'  => 5,
            'max'  => 40,
            'step' => 1,
        ),
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '==',
                'value'    => 'left',
            ),
        ),
    )
);

Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'main_navigation_items_align',
        'label'           => esc_html__( 'Items align', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'right',
        'choices'         => array(
            'left'   => esc_attr__( 'Left', 'skylith' ),
            'center' => esc_attr__( 'Center', 'skylith' ),
            'right'  => esc_attr__( 'Right', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '==',
                'value'    => 'top',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_dark',
        'label'           => esc_html__( 'Dark navigation', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'off',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_opaque',
        'label'           => esc_html__( 'Opaque', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'on',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_collapsed_items',
        'label'           => esc_html__( 'Collapsed items', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'off',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '==',
                'value'    => 'top',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_large_height',
        'label'           => esc_html__( 'Large height', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'off',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_left_large',
        'label'           => esc_html__( 'Large width', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'on',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '==',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_sticky',
        'label'           => esc_html__( 'Sticky', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'off',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_autohide',
        'label'           => esc_html__( 'Auto hide on scroll', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'off',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
            array(
                'setting'  => 'main_navigation_sticky',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_transparent',
        'label'           => esc_html__( 'Transparent', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'off',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_transparent_always',
        'label'           => esc_html__( 'Transparent always', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'off',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
            array(
                'setting'  => 'main_navigation_transparent',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_white_text_on_top',
        'label'           => esc_html__( 'White text on top', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'off',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'main_navigation_in_container',
        'label'           => esc_html__( 'In container', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 'on',
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => false,
            ),
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '!=',
                'value'    => 'left',
            ),
        ),
    )
);

// left navigation.
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'main_navigation_left_items_effect',
        'label'           => esc_html__( 'Items effect', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 2,
        'choices'         => array(
            1 => esc_attr__( 'Effect 1', 'skylith' ),
            2 => esc_attr__( 'Effect 2', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '==',
                'value'    => 'left',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'main_navigation_left_drop_effect',
        'label'           => esc_html__( 'Dropdown effect', 'skylith' ),
        'section'         => 'main_navigation',
        'default'         => 1,
        'choices'         => array(
            1 => esc_attr__( 'Effect 1', 'skylith' ),
            2 => esc_attr__( 'Effect 2', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'main_navigation_show',
                'operator' => '==',
                'value'    => 'left',
            ),
        ),
    )
);


/**
 * Side Navigation
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'side_navigation_side',
        'label'    => esc_html__( 'Side', 'skylith' ),
        'section'  => 'side_navigation',
        'default'  => 'right',
        'choices'  => array(
            'left'  => esc_attr__( 'Left', 'skylith' ),
            'right' => esc_attr__( 'Right', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'side_navigation_dark',
        'label'    => esc_html__( 'Dark navigation', 'skylith' ),
        'section'  => 'side_navigation',
        'default'  => 'off',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'image',
        'settings' => 'side_navigation_background',
        'label'    => esc_html__( 'Background image', 'skylith' ),
        'section'  => 'side_navigation',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'side_navigation_items_align',
        'label'    => esc_html__( 'Items align', 'skylith' ),
        'section'  => 'side_navigation',
        'default'  => 'left',
        'choices'  => array(
            'left'   => esc_attr__( 'Left', 'skylith' ),
            'center' => esc_attr__( 'Center', 'skylith' ),
            'right'  => esc_attr__( 'Right', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'side_navigation_large',
        'label'    => esc_html__( 'Large', 'skylith' ),
        'section'  => 'side_navigation',
        'default'  => 'on',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'side_navigation_items_effect',
        'label'    => esc_html__( 'Items effect', 'skylith' ),
        'section'  => 'side_navigation',
        'default'  => 2,
        'choices'  => array(
            1 => esc_attr__( 'Effect 1', 'skylith' ),
            2 => esc_attr__( 'Effect 2', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'side_navigation_drop_effect',
        'label'    => esc_html__( 'Dropdown effect', 'skylith' ),
        'section'  => 'side_navigation',
        'default'  => 1,
        'choices'  => array(
            1 => esc_attr__( 'Effect 1', 'skylith' ),
            2 => esc_attr__( 'Effect 2', 'skylith' ),
        ),
    )
);



/**
 * Fullscreen Navigation
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'fullscreen_navigation_style',
        'label'    => esc_html__( 'Style', 'skylith' ),
        'section'  => 'fullscreen_navigation',
        'default'  => 'default',
        'choices'  => array(
            'default'    => esc_attr__( 'Default', 'skylith' ),
            'widgetized' => esc_attr__( 'Widgetized', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'fullscreen_navigation_dark',
        'label'    => esc_html__( 'Dark navigation', 'skylith' ),
        'section'  => 'fullscreen_navigation',
        'default'  => 'on',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'image',
        'settings' => 'fullscreen_navigation_background',
        'label'    => esc_html__( 'Background image', 'skylith' ),
        'section'  => 'fullscreen_navigation',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'fullscreen_navigation_items_align',
        'label'    => esc_html__( 'Items align', 'skylith' ),
        'section'  => 'fullscreen_navigation',
        'default'  => 'center',
        'choices'  => array(
            'left'   => esc_attr__( 'Left', 'skylith' ),
            'center' => esc_attr__( 'Center', 'skylith' ),
            'right'  => esc_attr__( 'Right', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'fullscreen_navigation_items_effect',
        'label'    => esc_html__( 'Items effect', 'skylith' ),
        'section'  => 'fullscreen_navigation',
        'default'  => '2',
        'choices'  => array(
            '1' => esc_attr__( 'Effect 1', 'skylith' ),
            '2' => esc_attr__( 'Effect 2', 'skylith' ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'select',
        'settings' => 'fullscreen_navigation_drop_effect',
        'label'    => esc_html__( 'Dropdown effect', 'skylith' ),
        'section'  => 'fullscreen_navigation',
        'default'  => '1',
        'choices'  => array(
            '1' => esc_attr__( 'Effect 1', 'skylith' ),
            '2' => esc_attr__( 'Effect 2', 'skylith' ),
        ),
    )
);



/**
 * Social Navigation
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'social_navigation_show_in_top_nav',
        'label'    => esc_html__( 'Show in Top Navigation', 'skylith' ),
        'section'  => 'social_navigation',
        'default'  => 'on',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'social_navigation_show_in_left_nav',
        'label'    => esc_html__( 'Show in Left Navigation', 'skylith' ),
        'section'  => 'social_navigation',
        'default'  => 'on',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'social_navigation_show_in_fullscreen_nav',
        'label'    => esc_html__( 'Show in Fullscreen Navigation', 'skylith' ),
        'section'  => 'social_navigation',
        'default'  => 'on',
    )
);
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'social_navigation_show_in_side_nav',
        'label'    => esc_html__( 'Show in Side Navigation', 'skylith' ),
        'section'  => 'social_navigation',
        'default'  => 'on',
    )
);


/**
 * Footer
 */
Ghost_Framework::add_field(
    array(
        'type'     => 'image',
        'settings' => 'footer_background_image',
        'label'    => esc_html__( 'Background image', 'skylith' ),
        'section'  => 'footer',
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'footer_background_overlay',
        'label'           => esc_html__( 'Background image overlay', 'skylith' ),
        'section'         => 'footer',
        'default'         => '#262626',
        'choices'         => array(
            'alpha' => true,
        ),
        'transport'       => 'auto',
        'output'          => array(
            array(
                'element'  => '.nk-footer > .bg-image > .bg-image-overlay',
                'property' => 'background-color',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'footer_titles_color',
        'label'           => esc_html__( 'Titles color', 'skylith' ),
        'section'         => 'footer',
        'default'         => '#fff',
        'choices'         => array(
            'alpha' => true,
        ),
        'transport'       => 'auto',
        'output'          => array(
            array(
                'element'  => implode(
                    ', ',
                    array(
                        '.nk-footer h1',
                        '.nk-footer h2',
                        '.nk-footer h3',
                        '.nk-footer h4',
                        '.nk-footer h5',
                        '.nk-footer h6',
                        '.nk-footer .h1',
                        '.nk-footer .h2',
                        '.nk-footer .h3',
                        '.nk-footer .h4',
                        '.nk-footer .h5',
                        '.nk-footer .h6',
                        '.nk-footer .nk-footer-scroll-top-btn',
                    )
                ),
                'property' => 'color',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'color',
        'settings'        => 'footer_text_color',
        'label'           => esc_html__( 'Text color', 'skylith' ),
        'section'         => 'footer',
        'default'         => '#8e8e8e',
        'choices'         => array(
            'alpha' => true,
        ),
        'transport'       => 'auto',
        'output'          => array(
            array(
                'element'  => implode(
                    ', ',
                    array(
                        '.nk-footer',
                        '.nk-footer .nk-social',
                        '.nk-footer .nk-social-2',
                    )
                ),
                'property' => 'color',
            ),
        ),
    )
);

// Widgets.
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'footer_widgets',
        'label'    => esc_html__( 'Widgets', 'skylith' ),
        'section'  => 'footer',
        'default'  => 'on',
        'priority' => 10,
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'footer_widgets_cont_padding',
        'label'           => esc_attr__( 'Widgets container padding', 'skylith' ),
        'section'         => 'footer',
        'default'         => 44,
        'choices'         => array(
            'min'  => '0',
            'max'  => '150',
            'step' => '1',
        ),
        'transport'       => 'auto',
        'output'          => array(
            array(
                'element'  => '.nk-footer .nk-footer-widgets',
                'property' => 'padding-top',
                'suffix'   => 'px',
            ),
            array(
                'element'  => '.nk-footer .nk-footer-widgets',
                'property' => 'padding-bottom',
                'suffix'   => 'px',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'footer_widgets_text_align',
        'label'           => esc_html__( 'Widgets Text align', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'center',
        'choices'         => array(
            'left'   => esc_attr__( 'Left', 'skylith' ),
            'center' => esc_attr__( 'Center', 'skylith' ),
            'right'  => esc_attr__( 'Right', 'skylith' ),
        ),
        'transport'       => 'auto',
        'output'          => array(
            array(
                'element'  => '.nk-footer .nk-footer-widgets',
                'property' => 'text-align',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'footer_widget_1_size',
        'label'           => esc_attr__( 'Widget 1 Size', 'skylith' ),
        'section'         => 'footer',
        'default'         => 3,
        'choices'         => array(
            'min'  => '0',
            'max'  => '12',
            'step' => '1',
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'footer_widget_2_size',
        'label'           => esc_attr__( 'Widget 2 Size', 'skylith' ),
        'section'         => 'footer',
        'default'         => 3,
        'choices'         => array(
            'min'  => '0',
            'max'  => '12',
            'step' => '1',
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'footer_widget_3_size',
        'label'           => esc_attr__( 'Widget 3 Size', 'skylith' ),
        'section'         => 'footer',
        'default'         => 3,
        'choices'         => array(
            'min'  => '0',
            'max'  => '12',
            'step' => '1',
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'footer_widget_4_size',
        'label'           => esc_attr__( 'Widget 4 Size', 'skylith' ),
        'section'         => 'footer',
        'default'         => 3,
        'choices'         => array(
            'min'  => '0',
            'max'  => '12',
            'step' => '1',
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'sidebars',
        'settings'        => 'footer_widget_1_sidebar',
        'label'           => esc_html__( 'Select Sidebar For 1 Col', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'sidebar-footer-1',
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
            array(
                'setting'  => 'footer_widget_1_size',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'sidebars',
        'settings'        => 'footer_widget_2_sidebar',
        'label'           => esc_html__( 'Select Sidebar For 2 Col', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'sidebar-footer-2',
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
            array(
                'setting'  => 'footer_widget_2_size',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'sidebars',
        'settings'        => 'footer_widget_3_sidebar',
        'label'           => esc_html__( 'Select Sidebar For 3 Col', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'sidebar-footer-3',
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
            array(
                'setting'  => 'footer_widget_3_size',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'sidebars',
        'settings'        => 'footer_widget_4_sidebar',
        'label'           => esc_html__( 'Select Sidebar For 4 Col', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'sidebar-footer-4',
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
            array(
                'setting'  => 'footer_widget_4_size',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'footer_widgets_valign',
        'label'           => esc_html__( 'Widgets vertical align', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'middle',
        'choices'         => array(
            'start'  => esc_html__( 'Start', 'skylith' ),
            'center' => esc_html__( 'Center', 'skylith' ),
            'end'    => esc_html__( 'End', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'footer_widgets_gap',
        'label'           => esc_html__( 'Widgets gap', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'sm',
        'choices'         => array(
            'xs' => esc_html__( 'Extra Small', 'skylith' ),
            'sm' => esc_html__( 'Small', 'skylith' ),
            'nm' => esc_html__( 'Normal', 'skylith' ),
            'md' => esc_html__( 'Large', 'skylith' ),
            'lg' => esc_html__( 'Extra Large', 'skylith' ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_widgets',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);

// Copyright.
Ghost_Framework::add_field(
    array(
        'type'     => 'toggle',
        'settings' => 'footer_copyright',
        'label'    => esc_html__( 'Copyright section', 'skylith' ),
        'section'  => 'footer',
        'default'  => 'on',
        'priority' => 10,
    )
);

Ghost_Framework::add_field(
    array(
        'type'            => 'slider',
        'settings'        => 'footer_copyright_cont_padding',
        'label'           => esc_attr__( 'Copyright container padding', 'skylith' ),
        'section'         => 'footer',
        'default'         => 30,
        'choices'         => array(
            'min'  => '0',
            'max'  => '150',
            'step' => '1',
        ),
        'transport'       => 'auto',
        'output'          => array(
            array(
                'element'  => '.nk-footer .nk-footer-cont',
                'property' => 'padding-top',
                'suffix'   => 'px',
            ),
            array(
                'element'  => '.nk-footer .nk-footer-cont',
                'property' => 'padding-bottom',
                'suffix'   => 'px',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_copyright',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'select',
        'settings'        => 'footer_copyright_text_align',
        'label'           => esc_html__( 'Copyright Text align', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'center',
        'choices'         => array(
            'left'   => esc_attr__( 'Left', 'skylith' ),
            'center' => esc_attr__( 'Center', 'skylith' ),
            'right'  => esc_attr__( 'Right', 'skylith' ),
        ),
        'transport'       => 'auto',
        'output'          => array(
            array(
                'element'  => '.nk-footer .nk-footer-cont',
                'property' => 'text-align',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'footer_copyright',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'sidebars',
        'settings'        => 'footer_widget_copyright',
        'label'           => esc_html__( 'Select Sidebar For Copyright Section', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'sidebar-footer-copyright',
        'active_callback' => array(
            array(
                'setting'  => 'footer_copyright',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
Ghost_Framework::add_field(
    array(
        'type'            => 'toggle',
        'settings'        => 'footer_copyright_scroll_top',
        'label'           => esc_html__( 'Scroll top button', 'skylith' ),
        'section'         => 'footer',
        'default'         => 'off',
        'priority'        => 10,
        'active_callback' => array(
            array(
                'setting'  => 'footer_copyright',
                'operator' => '!=',
                'value'    => '0',
            ),
        ),
    )
);
