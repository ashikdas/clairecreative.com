<?php
/**
 * Typography
 *
 * @package skylith
 */

// Body.
Ghost_Framework::add_typography(
    array(
        'body' => array(
            'label'    => esc_html__( 'Body', 'skylith' ),
            'defaults' => array(
                'font-family-category' => 'google-fonts',
                'font-family'          => 'Work Sans',
                'font-size'            => '',
                'font-weight'          => '400',
                'line-height'          => '1.65',
                'letter-spacing'       => '0.004em',
            ),
            'output'   => array(
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            'body',
                            'blockquote.nk-blockquote-style-1 cite',
                            '.nk-hover-image .nk-hover-image-links li a span',
                            '.nk-counter-3 .nk-counter-title',
                        )
                    ),
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper',
                            '.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce li',
                            '.edit-post-visual-editor.editor-styles-wrapper blockquote.nk-blockquote-style-1 cite',
                            '.edit-post-visual-editor.editor-styles-wrapper .nk-hover-image .nk-hover-image-links li a span',
                            '.edit-post-visual-editor.editor-styles-wrapper .nk-counter-3 .nk-counter-title',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
    )
);

// HTML.
Ghost_Framework::add_typography(
    array(
        'html' => array(
            'label'    => esc_html__( 'HTML', 'skylith' ),
            'defaults' => array(
                'font-size' => '15px',
            ),
            'output'   => array(
                array(
                    'selectors' => 'html',
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper',
                            '.edit-post-visual-editor.editor-styles-wrapper p',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
    )
);

// Buttons.
Ghost_Framework::add_typography(
    array(
        'buttons' => array(
            'label'    => esc_html__( 'Buttons', 'skylith' ),
            'defaults' => array(
                'font-family-category' => 'google-fonts',
                'font-family'          => 'Work Sans',
                'font-weight'          => '400',
                'line-height'          => '',
                'letter-spacing'       => '',
            ),
            'output'   => array(
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.nk-btn',
                            '.button',
                            '.ghostkit-button',
                            '.ghostkit-tabs .ghostkit-tabs-buttons-item',
                            '.ghostkit-accordion .ghostkit-accordion-item-heading',
                            '.wp-block-button__link',
                            '.woocommerce .button',
                            '.add_to_cart_button',
                            '.added_to_cart',
                        )
                    ),
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper .nk-btn',
                            '.edit-post-visual-editor.editor-styles-wrapper .button',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-button',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-tabs .ghostkit-tabs-buttons-item',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-accordion .ghostkit-accordion-item-heading',
                            '.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link',
                            '.edit-post-visual-editor.editor-styles-wrapper .woocommerce .button',
                            '.edit-post-visual-editor.editor-styles-wrapper .add_to_cart_button',
                            '.edit-post-visual-editor.editor-styles-wrapper .added_to_cart',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
    )
);

// Additional Items.
Ghost_Framework::add_typography(
    array(
        'additional_items' => array(
            'label'    => esc_html__( 'Additional Items', 'skylith' ),
            'defaults' => array(
                'font-family-category' => 'google-fonts',
                'font-family'          => 'Playfair Display',
                'font-weight'          => '700',
            ),
            'output'   => array(
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            'div.lead',
                            '.nk-btn-3',
                            'h1 em, h2 em, h3 em, h4 em, h5 em, h6 em',
                            '.h1 em, .h2 em, .h3 em, .h4 em, .h5 em, .h6 em',
                            '.nk-twitter-list-2 .nk-twitter .nk-twitter-name',
                            '.nk-twitter-list-2 .nk-twitter .nk-twitter-text',
                            '.nk-twitter-list-2 .nk-twitter .nk-twitter-name',
                            '.nk-twitter-list-2 .nk-twitter .nk-twitter-text',
                            '.nk-carousel .nk-carousel-prev .nk-carousel-arrow-name',
                            '.nk-carousel .nk-carousel-next .nk-carousel-arrow-name',
                            '.nk-carousel-3 .nk-carousel-prev .nk-carousel-arrow-name',
                            '.nk-carousel-3 .nk-carousel-next .nk-carousel-arrow-name',
                            '.nk-hover-image .nk-hover-image-links li a',
                            '.nk-portfolio-launch-site',
                        )
                    ),
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper div.lead',
                            '.edit-post-visual-editor.editor-styles-wrapper h1 em',
                            '.edit-post-visual-editor.editor-styles-wrapper h2 em',
                            '.edit-post-visual-editor.editor-styles-wrapper h3 em',
                            '.edit-post-visual-editor.editor-styles-wrapper h4 em',
                            '.edit-post-visual-editor.editor-styles-wrapper h5 em',
                            '.edit-post-visual-editor.editor-styles-wrapper h6 em',
                            '.edit-post-visual-editor.editor-styles-wrapper .h1 em',
                            '.edit-post-visual-editor.editor-styles-wrapper .h2 em',
                            '.edit-post-visual-editor.editor-styles-wrapper .h3 em',
                            '.edit-post-visual-editor.editor-styles-wrapper .h4 em',
                            '.edit-post-visual-editor.editor-styles-wrapper .h5 em',
                            '.edit-post-visual-editor.editor-styles-wrapper .h6 em',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
    )
);

// Blockquotes.
Ghost_Framework::add_typography(
    array(
        'blockquotes' => array(
            'label'    => esc_html__( 'Blockquotes', 'skylith' ),
            'defaults' => array(
                'font-family-category' => 'google-fonts',
                'font-family'          => 'PT Serif',
                'font-weight'          => '400i',
            ),
            'output'   => array(
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            'blockquote',
                            '.ghostkit-testimonial-content',
                        )
                    ),
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper blockquote',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-testimonial-content',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
    )
);

// Headings.
Ghost_Framework::add_typography(
    array(
        'headings' => array(
            'label'    => esc_html__( 'Headings', 'skylith' ),
            'defaults' => array(
                'font-family-category' => 'google-fonts',
                'font-family'          => 'Playfair Display',
                'font-weight'          => '700',
                'line-height'          => '',
                'letter-spacing'       => '',
            ),
            'output'   => array(
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.nk-heading-font',
                            'h1, h2, h3, h4, h5, h6',
                            '.h1, .h2, .h3, .h4, .h5, .h6',
                            '.display-1, .display-2, .display-3, .display-4, .display-big, .display-extra-big',
                            '.nk-widget .nk-widget-title',
                            '.nk-navbar.nk-navbar-left .nk-nav .dropdown > li > a',
                            '.nk-navbar.nk-navbar-left .nk-nav > li > a',
                            '.nk-navbar-side .nk-nav .dropdown > li:last-of-type > a',
                            '.nk-navbar-side .nk-nav .dropdown > li > a',
                            '.nk-navbar-side .nk-nav > li:last-of-type > a',
                            '.nk-navbar-side .nk-nav > li > a',
                            '.nk-navbar-full .nk-nav .dropdown > li:last-of-type > a',
                            '.nk-navbar-full .nk-nav .dropdown > li > a',
                            '.nk-navbar-full .nk-nav > li:last-of-type > a',
                            '.nk-navbar-full .nk-nav > li > a',
                            '.nk-ibox-1-a .nk-ibox-title',
                            '.nk-ibox-1-a .nk-ibox-text',
                            '.nk-ibox-3-a .nk-ibox-title',
                            '.nk-ibox-5 .nk-ibox-title',
                            '.nk-ibox-6 .nk-ibox-title',
                            '.nk-counter .nk-count',
                            '.nk-counter-2 .nk-count',
                            '.nk-counter-3 .nk-count',
                            '.nk-team-block .nk-team-member .nk-team-member-name',
                            '.nk-pricing .nk-pricing-title',
                            '.nk-pricing .nk-pricing-price',
                            '.nk-slider-number',
                            '.nk-fullpage-number',
                            '.nk-portfolio-list .nk-portfolio-item .nk-portfolio-item-letter',
                            '.ghostkit-counter-box .ghostkit-counter-box-number',
                            '.ghostkit-pricing-table-variant-skylith-alt-1 .ghostkit-pricing-table-item .ghostkit-pricing-table-item-title',
                            '.ghostkit-pricing-table-variant-skylith-alt-1 .ghostkit-pricing-table-item .ghostkit-pricing-table-item-price-currency',
                            '.ghostkit-pricing-table-variant-skylith-alt-1 .ghostkit-pricing-table-item .ghostkit-pricing-table-item-price-amount',
                            '.ghostkit-button-variant-skylith-alt-1',
                        )
                    ),
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.editor-post-title__block .editor-post-title__input',
                            '.edit-post-visual-editor.editor-styles-wrapper .nk-heading-font',
                            '.edit-post-visual-editor.editor-styles-wrapper h1',
                            '.edit-post-visual-editor.editor-styles-wrapper h2',
                            '.edit-post-visual-editor.editor-styles-wrapper h3',
                            '.edit-post-visual-editor.editor-styles-wrapper h4',
                            '.edit-post-visual-editor.editor-styles-wrapper h5',
                            '.edit-post-visual-editor.editor-styles-wrapper h6',
                            '.edit-post-visual-editor.editor-styles-wrapper .h1',
                            '.edit-post-visual-editor.editor-styles-wrapper .h2',
                            '.edit-post-visual-editor.editor-styles-wrapper .h3',
                            '.edit-post-visual-editor.editor-styles-wrapper .h4',
                            '.edit-post-visual-editor.editor-styles-wrapper .h5',
                            '.edit-post-visual-editor.editor-styles-wrapper .h6',
                            '.edit-post-visual-editor.editor-styles-wrapper .display-1',
                            '.edit-post-visual-editor.editor-styles-wrapper .display-2',
                            '.edit-post-visual-editor.editor-styles-wrapper .display-3',
                            '.edit-post-visual-editor.editor-styles-wrapper .display-4',
                            '.edit-post-visual-editor.editor-styles-wrapper .display-big',
                            '.edit-post-visual-editor.editor-styles-wrapper .display-extra-big',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-counter-box .ghostkit-counter-box-number',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-pricing-table-variant-skylith-alt-1 .ghostkit-pricing-table-item .ghostkit-pricing-table-item-title',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-pricing-table-variant-skylith-alt-1 .ghostkit-pricing-table-item .ghostkit-pricing-table-item-price-currency',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-pricing-table-variant-skylith-alt-1 .ghostkit-pricing-table-item .ghostkit-pricing-table-item-price-amount',
                            '.edit-post-visual-editor.editor-styles-wrapper .ghostkit-button-variant-skylith-alt-1',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
    )
);

Ghost_Framework::add_typography(
    array(
        'h1' => array(
            'label'    => esc_html__( 'H1', 'skylith' ),
            'defaults' => array(
                'font-size'      => '37.5px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => 'h1, .h1, h1.entry-title',
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.editor-post-title__block .editor-post-title__input',
                            '.edit-post-visual-editor.editor-styles-wrapper h1',
                            '.edit-post-visual-editor.editor-styles-wrapper .h1',
                            '.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce h1',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
        'h2' => array(
            'label'    => esc_html__( 'H2', 'skylith' ),
            'defaults' => array(
                'font-size'      => '31.5px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => 'h2, .h2',
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper h2',
                            '.edit-post-visual-editor.editor-styles-wrapper .h2',
                            '.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce h2',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
        'h3' => array(
            'label'    => esc_html__( 'H3', 'skylith' ),
            'defaults' => array(
                'font-size'      => '25.35px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => 'h3, .h3',
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper h3',
                            '.edit-post-visual-editor.editor-styles-wrapper .h3',
                            '.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce h3',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
        'h4' => array(
            'label'    => esc_html__( 'H4', 'skylith' ),
            'defaults' => array(
                'font-size'      => '21px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => 'h4, .h4',
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper h4',
                            '.edit-post-visual-editor.editor-styles-wrapper .h4',
                            '.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce h4',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
        'h5' => array(
            'label'    => esc_html__( 'H5', 'skylith' ),
            'defaults' => array(
                'font-size'      => '18.75px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => 'h5, .h5',
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper h5',
                            '.edit-post-visual-editor.editor-styles-wrapper .h5',
                            '.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce h5',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
        'h6' => array(
            'label'    => esc_html__( 'H6', 'skylith' ),
            'defaults' => array(
                'font-size'      => '17px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => 'h6, .h6',
                ),
                array(
                    'selectors' => implode(
                        ', ',
                        array(
                            '.edit-post-visual-editor.editor-styles-wrapper h6',
                            '.edit-post-visual-editor.editor-styles-wrapper .h6',
                            '.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce h6',
                        )
                    ),
                    'editor'    => true,
                ),
            ),
        ),
    )
);

Ghost_Framework::add_typography(
    array(
        'display_1' => array(
            'label'    => esc_html__( 'Display 1', 'skylith' ),
            'defaults' => array(
                'font-size'      => '61.5px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => '.display-1',
                ),
                array(
                    'selectors' => '.edit-post-visual-editor.editor-styles-wrapper .display-1',
                    'editor'    => true,
                ),
            ),
        ),
        'display_2' => array(
            'label'    => esc_html__( 'Display 2', 'skylith' ),
            'defaults' => array(
                'font-size'      => '54px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => '.display-2',
                ),
                array(
                    'selectors' => '.edit-post-visual-editor.editor-styles-wrapper .display-2',
                    'editor'    => true,
                ),
            ),
        ),
        'display_3' => array(
            'label'    => esc_html__( 'Display 3', 'skylith' ),
            'defaults' => array(
                'font-size'      => '47.25px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => '.display-3',
                ),
                array(
                    'selectors' => '.edit-post-visual-editor.editor-styles-wrapper .display-3',
                    'editor'    => true,
                ),
            ),
        ),
        'display_4' => array(
            'label'    => esc_html__( 'Display 4', 'skylith' ),
            'defaults' => array(
                'font-size'      => '39px',
                'line-height'    => '',
                'letter-spacing' => '',
            ),
            'child-of' => 'headings',
            'output'   => array(
                array(
                    'selectors' => '.display-4',
                ),
                array(
                    'selectors' => '.edit-post-visual-editor.editor-styles-wrapper .display-4',
                    'editor'    => true,
                ),
            ),
        ),
    )
);
