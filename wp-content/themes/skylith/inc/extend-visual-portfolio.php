<?php
/**
 * Custom functions for extending Visual Portfolio functionality.
 *
 * @package skylith
 */

add_filter( 'vpf_extend_layout_slider_controls', 'skylith_vpf_extend_layout_slider_controls' );
if ( ! function_exists( 'skylith_vpf_extend_layout_slider_controls' ) ) {
    /**
     * Slider layout additional options
     *
     * @param array $controls - controls.
     *
     * @return array
     */
    function skylith_vpf_extend_layout_slider_controls( $controls ) {
        $number_bullets = false;

        // number bullets option.
        foreach ( $controls as $i => $control ) {
            if ( 'bullets' === $control['name'] ) {
                $number_bullets = $i;
            }
        }
        if ( false !== $number_bullets ) {
            array_splice(
                $controls,
                $number_bullets + 1,
                0,
                array(
                    array(
                        'type'      => 'checkbox',
                        'alongside' => esc_html__( 'Bullets numbers', 'skylith' ),
                        'name'      => 'skylith_bullets_numbers',
                        'default'   => false,
                        'condition' => array(
                            array(
                                'control' => 'bullets',
                            ),
                        ),
                    ),
                )
            );
        }

        return $controls;
    }
}

add_filter( 'vpf_extend_portfolio_data_attributes', 'skylith_vpf_extend_portfolio_data_attributes_slider_bullets', 10, 2 );
if ( ! function_exists( 'skylith_vpf_extend_portfolio_data_attributes_slider_bullets' ) ) {
    /**
     * Additional attributes for slider
     *
     * @param array $attrs - attributes.
     * @param array $options - options.
     *
     * @return array
     */
    function skylith_vpf_extend_portfolio_data_attributes_slider_bullets( $attrs, $options ) {
        if ( 'slider' === $options['layout'] && $options['slider_skylith_bullets_numbers'] ) {
            $attrs['data-vp-slider-skylith-bullets-numbers'] = 'true';
        }

        return $attrs;
    }
}

add_filter( 'vpf_extend_filters', 'skylith_vpf_extend_filters' );
if ( ! function_exists( 'skylith_vpf_extend_filters' ) ) {
    /**
     * Filters
     *
     * @param array $filters - filters list.
     *
     * @return array
     */
    function skylith_vpf_extend_filters( $filters ) {
        return array_merge(
            $filters,
            array(
                'skylith-alt' => array(
                    'title'    => esc_html__( 'Skylith Alt 1', 'skylith' ),
                    'icon'     => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'controls' => array(
                        array(
                            'type'        => 'select2',
                            'label'       => esc_html__( 'Toggle Button', 'skylith' ),
                            'name'        => 'toggle_button',
                            'options'     => array(
                                ''             => esc_html__( 'Disabled', 'skylith' ),
                                'show'         => esc_html__( 'Show', 'skylith' ),
                                'show_toggled' => esc_html__( 'Show Toggled', 'skylith' ),
                            ),
                            'default'     => '',
                            'searchable'  => false,
                            'multiple'    => false,
                            'tags'        => false,
                        ),
                    ),
                ),
                'skylith-alt-2' => array(
                    'title'    => esc_html__( 'Skylith Alt 2', 'skylith' ),
                    'icon'     => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'controls' => array(),
                ),
            )
        );
    }
}

add_filter( 'vpf_extend_pagination', 'skylith_vpf_extend_pagination' );
if ( ! function_exists( 'skylith_vpf_extend_pagination' ) ) {
    /**
     * Pagination
     *
     * @param array $pagination - pagination list.
     *
     * @return array
     */
    function skylith_vpf_extend_pagination( $pagination ) {
        return array_merge(
            $pagination,
            array(
                'skylith-alt' => array(
                    'title'    => esc_html__( 'Skylith Alt', 'skylith' ),
                    'icon'     => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'controls' => array(),
                ),
                'skylith-alt-2' => array(
                    'title'    => esc_html__( 'Skylith Alt 2', 'skylith' ),
                    'icon'     => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'controls' => array(),
                ),
            )
        );
    }
}

add_filter( 'vpf_extend_items_styles', 'skylith_vpf_extend_items_styles' );
if ( ! function_exists( 'skylith_vpf_extend_items_styles' ) ) {
    /**
     * Items styles
     *
     * @param array $styles - items styles list.
     *
     * @return array
     */
    function skylith_vpf_extend_items_styles( $styles ) {
        return array_merge(
            $styles,
            array(
                'skylith-default' => array(
                    'title'            => esc_html__( 'Skylith Default', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => true,
                        'show_date'       => true,
                        'show_excerpt'    => true,
                        'show_icons'      => false,
                        'align'           => true,
                    ),
                    'controls'         => array(),
                ),
                'skylith-default-2' => array(
                    'title'            => esc_html__( 'Skylith Default 2', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => true,
                        'show_date'       => true,
                        'show_excerpt'    => true,
                        'show_icons'      => false,
                        'align'           => false,
                    ),
                    'controls'         => array(
                        array(
                            'type'        => 'checkbox',
                            'alongside'   => esc_html__( 'Show read more button', 'skylith' ),
                            'name'        => 'read_more',
                            'default'     => false,
                        ),
                        array(
                            'type'        => 'select2',
                            'label'       => esc_html__( 'Show meta background', 'skylith' ),
                            'name'        => 'meta_background',
                            'options'     => array(
                                'false' => esc_html__( 'Disabled', 'skylith' ),
                                'true'  => esc_html__( 'Show', 'skylith' ),
                                'big'   => esc_html__( 'Show bigger', 'skylith' ),
                            ),
                            'default'     => 'true',
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Meta background color', 'skylith' ),
                            'name'        => 'meta_bg_color',
                            'default'     => '#fff',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay-background, .vp-portfolio__item-overlay-background-big',
                                    'property' => 'background-color',
                                ),
                            ),
                            'condition'   => array(
                                array(
                                    'control'  => 'meta_background',
                                    'operator' => '!=',
                                    'value'    => 'false',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Meta text color', 'skylith' ),
                            'name'        => 'meta_text_color',
                            'default'     => '#5f5f5f',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay-background',
                                    'property' => 'color',
                                ),
                            ),
                            'condition'   => array(
                                array(
                                    'control'  => 'meta_background',
                                    'operator' => '!=',
                                    'value'    => 'false',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Meta title color', 'skylith' ),
                            'name'        => 'meta_title_color',
                            'default'     => '#171717',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay-background .vp-portfolio__item-meta-title',
                                    'property' => 'color',
                                ),
                            ),
                            'condition'   => array(
                                array(
                                    'control'  => 'meta_background',
                                    'operator' => '!=',
                                    'value'    => 'false',
                                ),
                            ),
                        ),
                    ),
                ),
                'skylith-icon' => array(
                    'title'            => esc_html__( 'Skylith Icon', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => false,
                        'show_date'       => false,
                        'show_excerpt'    => false,
                        'show_icons'      => true,
                        'align'           => true,
                    ),
                    'controls'         => array(),
                ),
                'skylith-fade' => array(
                    'title'            => esc_html__( 'Skylith Fade', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => true,
                        'show_date'       => true,
                        'show_excerpt'    => true,
                        'show_icons'      => true,
                        'align'           => 'extended',
                    ),
                    'controls'         => array(
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background color', 'skylith' ),
                            'name'        => 'bg_color',
                            'default'     => 'rgba(0, 0, 0, 0.6)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background hover color', 'skylith' ),
                            'name'        => 'bg_hover_color',
                            'default'     => 'rgba(0, 0, 0, 0.85)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item:hover .vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay text color', 'skylith' ),
                            'name'        => 'text_color',
                            'default'     => '#fff',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'color',
                                ),
                            ),
                        ),
                    ),
                ),
                'skylith-fade-2' => array(
                    'title'            => esc_html__( 'Skylith Fade Symbol', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => true,
                        'show_date'       => true,
                        'show_excerpt'    => false,
                        'show_icons'      => false,
                        'align'           => 'extended',
                    ),
                    'controls'         => array(
                        array(
                            'type'        => 'select2',
                            'label'       => esc_html__( 'Show meta type', 'skylith' ),
                            'name'        => 'show_meta_type',
                            'options'     => array(
                                'true'      => 'Show always',
                                'hover'     => 'Show on hover',
                                'not_hover' => 'Hide on hover',
                            ),
                            'default'     => 'true',
                        ),
                        array(
                            'type'        => 'select2',
                            'label'       => esc_html__( 'Show first letter', 'skylith' ),
                            'name'        => 'show_first_letter',
                            'options'     => array(
                                'false'     => 'Disabled',
                                'true'      => 'Show always',
                                'hover'     => 'Show on hover',
                                'not_hover' => 'Hide on hover',
                            ),
                            'default'     => 'hover',
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'First letter color', 'skylith' ),
                            'name'        => 'letter_color',
                            'default'     => '#b9a186',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-meta-letter',
                                    'property' => 'color',
                                ),
                            ),
                            'condition'   => array(
                                array(
                                    'control'  => 'show_first_letter',
                                    'operator' => '!=',
                                    'value'    => 'false',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background color', 'skylith' ),
                            'name'        => 'bg_color',
                            'default'     => 'rgba(0, 0, 0, 0.6)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background hover color', 'skylith' ),
                            'name'        => 'bg_hover_color',
                            'default'     => 'rgba(0, 0, 0, 0.85)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item:hover .vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay text color', 'skylith' ),
                            'name'        => 'text_color',
                            'default'     => '#fff',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'color',
                                ),
                            ),
                        ),
                    ),
                ),
                'skylith-fade-3' => array(
                    'title'            => esc_html__( 'Skylith Fade Plus-Icon', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => true,
                        'show_date'       => true,
                        'show_excerpt'    => false,
                        'show_icons'      => false,
                        'align'           => true,
                    ),
                    'controls'         => array(
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background color', 'skylith' ),
                            'name'        => 'bg_color',
                            'default'     => 'rgba(0, 0, 0, 0.6)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background hover color', 'skylith' ),
                            'name'        => 'bg_hover_color',
                            'default'     => 'rgba(0, 0, 0, 0.85)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item:hover .vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay text color', 'skylith' ),
                            'name'        => 'text_color',
                            'default'     => '#fff',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'color',
                                ),
                            ),
                        ),
                    ),
                ),
                'skylith-fade-4' => array(
                    'title'            => esc_html__( 'Skylith Fade Button', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => false,
                        'show_date'       => true,
                        'show_excerpt'    => false,
                        'show_icons'      => false,
                        'align'           => 'extended',
                    ),
                    'controls'         => array(
                        array(
                            'type'        => 'checkbox',
                            'alongside'   => esc_html__( 'Show read more button', 'skylith' ),
                            'name'        => 'read_more',
                            'default'     => true,
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background color', 'skylith' ),
                            'name'        => 'bg_color',
                            'default'     => 'rgba(16, 16, 16, 0.5)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background hover color', 'skylith' ),
                            'name'        => 'bg_hover_color',
                            'default'     => 'rgba(16, 16, 16, 0.8)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item:hover .vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay text color', 'skylith' ),
                            'name'        => 'text_color',
                            'default'     => '#fff',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'color',
                                ),
                            ),
                        ),
                    ),
                ),
                'skylith-fade-5' => array(
                    'title'            => esc_html__( 'Skylith Fade Border', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => true,
                        'show_date'       => true,
                        'show_excerpt'    => false,
                        'show_icons'      => false,
                        'align'           => false,
                    ),
                    'controls'         => array(
                        array(
                            'type'        => 'checkbox',
                            'alongside'   => esc_html__( 'Show read more button', 'skylith' ),
                            'name'        => 'read_more',
                            'default'     => true,
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background hover color', 'skylith' ),
                            'name'        => 'bg_hover_color',
                            'default'     => 'rgba(16, 16, 16, 0.8)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-img::after',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay text color', 'skylith' ),
                            'name'        => 'text_color',
                            'default'     => '#fff',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item:hover',
                                    'property' => 'color',
                                ),
                            ),
                        ),
                    ),
                ),
                'skylith-fade-6' => array(
                    'title'            => esc_html__( 'Skylith Fade Title Outside', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => false,
                        'show_date'       => false,
                        'show_excerpt'    => false,
                        'show_icons'      => false,
                        'align'           => false,
                    ),
                    'controls'         => array(
                        array(
                            'type'        => 'range',
                            'label'       => esc_html__( 'Title Negative Position', 'skylith' ),
                            'name'        => 'title_position',
                            'min'         => -200,
                            'max'         => 0,
                            'step'        => 1,
                            'default'     => -50,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-meta .vp-portfolio__item-meta-title',
                                    'property' => 'margin-left',
                                    'mask'     => '$px',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background color', 'skylith' ),
                            'name'        => 'bg_color',
                            'default'     => 'rgba(16, 16, 16, 0.6)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay background hover color', 'skylith' ),
                            'name'        => 'bg_hover_color',
                            'default'     => 'rgba(16, 16, 16, 0.5)',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item:hover .vp-portfolio__item-overlay',
                                    'property' => 'background-color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay text color', 'skylith' ),
                            'name'        => 'text_color',
                            'default'     => '#fff',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item',
                                    'property' => 'color',
                                ),
                            ),
                        ),
                        array(
                            'type'        => 'color',
                            'label'       => esc_html__( 'Overlay text hover color', 'skylith' ),
                            'name'        => 'text_hover_color',
                            'default'     => '#fff',
                            'alpha'       => true,
                            'style'       => array(
                                array(
                                    'element'  => '.vp-portfolio__item:hover',
                                    'property' => 'color',
                                ),
                            ),
                        ),
                    ),
                ),
                'skylith-wide' => array(
                    'title'            => esc_html__( 'Skylith Wide', 'skylith' ),
                    'icon'             => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.7838 1H2.21622C1.54452 1 1 1.54086 1 2.20805V17.7919C1 18.4591 1.54452 19 2.21622 19H17.7838C18.4555 19 19 18.4591 19 17.7919V2.20805C19 1.54086 18.4555 1 17.7838 1Z" stroke="currentColor" stroke-width="1.5" fill="transparent"/><path d="M9.792 14.168C9.112 14.168 8.452 14.084 7.812 13.916C7.172 13.748 6.652 13.524 6.252 13.244L7.032 11.492C7.408 11.74 7.844 11.94 8.34 12.092C8.836 12.244 9.324 12.32 9.804 12.32C10.716 12.32 11.172 12.092 11.172 11.636C11.172 11.396 11.04 11.22 10.776 11.108C10.52 10.988 10.104 10.864 9.528 10.736C8.896 10.6 8.368 10.456 7.944 10.304C7.52 10.144 7.156 9.892 6.852 9.548C6.548 9.204 6.396 8.74 6.396 8.156C6.396 7.644 6.536 7.184 6.816 6.776C7.096 6.36 7.512 6.032 8.064 5.792C8.624 5.552 9.308 5.432 10.116 5.432C10.668 5.432 11.212 5.496 11.748 5.624C12.284 5.744 12.756 5.924 13.164 6.164L12.432 7.928C11.632 7.496 10.856 7.28 10.104 7.28C9.632 7.28 9.288 7.352 9.072 7.496C8.856 7.632 8.748 7.812 8.748 8.036C8.748 8.26 8.876 8.428 9.132 8.54C9.388 8.652 9.8 8.768 10.368 8.888C11.008 9.024 11.536 9.172 11.952 9.332C12.376 9.484 12.74 9.732 13.044 10.076C13.356 10.412 13.512 10.872 13.512 11.456C13.512 11.96 13.372 12.416 13.092 12.824C12.812 13.232 12.392 13.56 11.832 13.808C11.272 14.048 10.592 14.168 9.792 14.168Z" fill="currentColor"/></svg>',
                    'builtin_controls' => array(
                        'show_title'      => true,
                        'show_categories' => true,
                        'show_date'       => true,
                        'show_comments'   => true,
                        'show_excerpt'    => true,
                        'show_icons'      => false,
                        'align'           => false,
                    ),
                    'controls'         => array(
                        array(
                            'type'        => 'hidden',
                            'description' => esc_html__( 'Note: This style works ok only with 1-column layouts.', 'skylith' ),
                            'name'        => 'notice_about_wide',
                            'default'     => '',
                        ),
                        array(
                            'type'        => 'checkbox',
                            'alongside'   => esc_html__( 'Show read more button', 'skylith' ),
                            'name'        => 'read_more',
                            'default'     => true,
                        ),
                    ),
                ),
            )
        );
    }
}

add_action( 'vpf_after_register_controls', 'skylith_vpf_after_register_controls' );
if ( ! function_exists( 'skylith_vpf_after_register_controls' ) ) {
    /**
     * Add Tilt option for items styles.
     */
    function skylith_vpf_after_register_controls() {
        Visual_Portfolio_Controls::register(
            array(
                'category' => 'items-style',
                'type'     => 'toggle',
                'label'    => esc_html__( 'Hover Tilt Effect', 'skylith' ),
                'name'     => 'skylith_tilt',
                'default'  => false,
            )
        );
    }
}

add_filter( 'vpf_extend_portfolio_data_attributes', 'skylith_vpf_extend_portfolio_data_attributes_tilt_effect', 10, 2 );
if ( ! function_exists( 'skylith_vpf_extend_portfolio_data_attributes_tilt_effect' ) ) {
    /**
     * Add Tilt attribute.
     *
     * @param Array $attrs portfolio attributes.
     * @param Array $options portfolio options.
     * @return Array portfolio attributes.
     */
    function skylith_vpf_extend_portfolio_data_attributes_tilt_effect( $attrs, $options ) {
        if ( $options['skylith_tilt'] ) {
            $attrs['data-portfolio-skylith-tilt'] = 'true';
        }
        return $attrs;
    }
}
