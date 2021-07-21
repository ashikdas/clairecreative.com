<?php
/**
 * Lazyblocks FullScreen Works Split.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block( array(
        'title'          => 'Slider',
        'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 4v12H8V4h12m0-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 9.67l1.69 2.26 2.48-3.1L19 15H9zM2 6v14c0 1.1.9 2 2 2h14v-2H4V6H2z"/></svg>',
        'keywords'       => array(
            0 => 'skylith',
            1 => 'slider',
        ),
        'slug'           => 'lazyblock/skylith-slider',
        'description'    => '',
        'category'       => 'skylith',
        'category_label' => 'Skylith',
        'supports'       => array(
            'customClassName' => true,
            'anchor'          => false,
            'align'           => array(
                0 => 'wide',
                1 => 'full',
            ),
            'html'            => false,
            'multiple'        => true,
            'inserter'        => true,
        ),
        'controls'       => array(
            'control_ce98d14ae8' => array(
                'sort'              => '11',
                'child_of'          => '',
                'label'             => 'Slides',
                'name'              => 'slides',
                'type'              => 'repeater',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_324b234851' => array(
                'sort'              => '12',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Image',
                'name'              => 'image',
                'type'              => 'image',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_324abc851' => array(
                'sort'              => '12',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Image Overlay',
                'name'              => 'image_overlay',
                'type'              => 'color',
                'alpha'             => 'true',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_5b2a8147d3' => array(
                'sort'              => '14',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Author',
                'name'              => 'author',
                'type'              => 'text',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_482b2e42bb' => array(
                'sort'              => '15',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Title',
                'name'              => 'title',
                'type'              => 'text',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_48dh2642bb' => array(
                'sort'              => '16',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Subtitle',
                'name'              => 'subtitle',
                'type'              => 'text',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_4015rf4bde' => array(
                'sort'              => '17',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Subtitle Position',
                'name'              => 'subtitle_position',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => 'before_title',
                        'label' => 'Before Title',
                    ),
                    array(
                        'value' => 'after_title',
                        'label' => 'After Title',
                    ),
                ),
                'default'           => 'before_title',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_4015ff2sxde' => array(
                'sort'              => '18',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Subtitle Style',
                'name'              => 'subtitle_style',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => '1',
                        'label' => 'Style 1',
                    ),
                    array(
                        'value' => '2',
                        'label' => 'Style 2',
                    ),
                ),
                'default'           => '1',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_44ea654e59' => array(
                'sort'              => '19',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Text',
                'name'              => 'text',
                'type'              => 'textarea',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_5d5ab444ef' => array(
                'sort'              => '20',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Button URL',
                'name'              => 'button_url',
                'type'              => 'url',
                'default'           => '#',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_4879d94d0b' => array(
                'sort'              => '21',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Button Label',
                'name'              => 'button_label',
                'type'              => 'text',
                'default'           => 'Project Details',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_48kf2h4d0b' => array(
                'sort'              => '22',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Button Style',
                'name'              => 'button_style',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => '1',
                        'label' => 'Simple',
                    ),
                    array(
                        'value' => '2',
                        'label' => 'Outline White',
                    ),
                    array(
                        'value' => '3',
                        'label' => 'Fill Main Color',
                    ),
                    array(
                        'value' => '4',
                        'label' => 'Fill Main Color Circle',
                    ),
                ),
                'default'           => '1',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_40e9a44bde' => array(
                'sort'              => '13',
                'child_of'          => 'control_ce98d14ae8',
                'label'             => 'Content Boxed',
                'name'              => 'content_style',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => '2',
                        'label' => 'Boxed',
                    ),
                    array(
                        'value' => '1',
                        'label' => 'Full Width',
                    ),
                ),
                'default'           => '1',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_e27b994aff' => array(
                'sort'              => '1',
                'child_of'          => '',
                'label'             => 'Container',
                'name'              => 'container',
                'type'              => 'checkbox',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_d469f049b9' => array(
                'sort'              => '2',
                'child_of'          => '',
                'label'             => 'Show Slide Numbers',
                'name'              => 'show_slide_numbers',
                'type'              => 'checkbox',
                'default'           => '',
                'checked'           => 'true',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_491a8646b1' => array(
                'sort'              => '3',
                'child_of'          => '',
                'label'             => 'Show Author',
                'name'              => 'show_author',
                'type'              => 'checkbox',
                'default'           => '',
                'checked'           => 'true',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_c0d9134b47' => array(
                'sort'              => '4',
                'child_of'          => '',
                'label'             => 'Show Arrows',
                'name'              => 'show_arrows',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => 'false',
                        'label' => 'None',
                    ),
                    array(
                        'value' => '1',
                        'label' => 'Style 1',
                    ),
                    array(
                        'value' => '2',
                        'label' => 'Style 2',
                    ),
                ),
                'default'           => '1',
                'checked'           => 'true',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_9a5a9544da' => array(
                'sort'              => '5',
                'child_of'          => '',
                'label'             => 'Show Nav',
                'name'              => 'show_nav',
                'type'              => 'checkbox',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_de79ec4ef4' => array(
                'sort'              => '6',
                'child_of'          => '',
                'label'             => 'Show Bullets',
                'name'              => 'show_bullets',
                'type'              => 'checkbox',
                'default'           => '',
                'checked'           => 'true',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_208a444069' => array(
                'sort'              => '7',
                'child_of'          => '',
                'label'             => 'Autoplay',
                'name'              => 'autoplay',
                'type'              => 'number',
                'default'           => '10000',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_9968ae43a4' => array(
                'sort'              => '8',
                'child_of'          => '',
                'label'             => 'Vertical Center',
                'name'              => 'content_centering',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => 'top',
                        'label' => 'Start',
                    ),
                    array(
                        'value' => 'center',
                        'label' => 'Center',
                    ),
                    array(
                        'value' => 'bottom',
                        'label' => 'End',
                    ),
                ),
                'default'           => 'bottom',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_99682451a4' => array(
                'sort'              => '9',
                'child_of'          => '',
                'label'             => 'Horizontal Center',
                'name'              => 'text_centering',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => 'left',
                        'label' => 'Start',
                    ),
                    array(
                        'value' => 'center',
                        'label' => 'Center',
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'End',
                    ),
                ),
                'default'           => 'left',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_e9f85f4309' => array(
                'sort'              => '10',
                'child_of'          => '',
                'label'             => 'Height',
                'name'              => 'height',
                'type'              => 'text',
                'default'           => '100vh',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
        ),
        'code'           => array(
            'editor_callback'   => 'skylith_block_slider_editor',
            'frontend_callback' => 'skylith_block_slider',
        ),
        'condition'      => array(),
    ) );
}

/**
 * Get block content.
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_slider_get_content( $attributes ) {
    $title             = $attributes['title'];
    $subtitle          = $attributes['subtitle'];
    $subtitle_position = $attributes['subtitle_position'] ? $attributes['subtitle_position'] : 'before_title';
    $subtitle_style    = $attributes['subtitle_style'] ? $attributes['subtitle_style'] : '1';
    $text              = $attributes['text'];
    $button_url        = $attributes['button_url'];
    $button_label      = $attributes['button_label'];
    $button_style      = $attributes['button_style'];

    if ( $subtitle && 'before_title' === $subtitle_position ) : ?>
        <div class="nk-subtitle<?php echo '1' === $subtitle_style ? '-2' : ' fw-600'; ?> text-white mb-10">
            <?php echo wp_kses_post( $subtitle ); ?>
        </div>
    <?php endif; ?>
    <?php if ( $title ) : ?>
        <h2 class="text-white display-3">
            <?php echo wp_kses_post( $title ); ?>
        </h2>
    <?php endif; ?>
    <?php if ( $subtitle && 'after_title' === $subtitle_position ) : ?>
        <div class="nk-subtitle<?php echo '1' === $subtitle_style ? '-2' : ' fw-600'; ?> text-white mb-10">
            <?php echo wp_kses_post( $subtitle ); ?>
        </div>
    <?php endif; ?>
    <?php if ( $text ) : ?>
        <div class="text-white">
            <?php echo wp_kses_post( $text ); ?>
        </div>
    <?php endif; ?>
    <?php
    if ( $button_url && $button_label ) :
        switch ( $button_style ) {
            case '2':
                ?>
                <div class="nk-gap"></div>
                <a class="nk-btn nk-btn-outline nk-btn-color-white" href="<?php echo esc_url( $button_url ); ?>">
                    <?php echo wp_kses_post( $button_label ); ?>
                </a>
                <?php
                break;
            case '3':
                ?>
                <div class="nk-gap"></div>
                <a class="nk-btn nk-btn-color-main" href="<?php echo esc_url( $button_url ); ?>">
                    <?php echo wp_kses_post( $button_label ); ?>
                </a>
                <?php
                break;
            case '4':
                ?>
                <div class="nk-gap"></div>
                <a class="nk-btn nk-btn-circle nk-btn-color-main" href="<?php echo esc_url( $button_url ); ?>">
                    <?php echo wp_kses_post( $button_label ); ?>
                </a>
                <?php
                break;
            default:
                ?>
                <a class="nk-btn-2 nk-btn-2-center text-white mt-5" href="<?php echo esc_url( $button_url ); ?>">
                    <?php echo wp_kses_post( $button_label ); ?>
                </a>
                <?php
                break;
        }
    endif;
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_slider( $attributes ) {
    $show_arrows        = $attributes['show_arrows'];
    $container          = $attributes['container'];
    $show_slide_numbers = $attributes['show_slide_numbers'];
    $show_author        = $attributes['show_author'];
    $show_nav           = $attributes['show_nav'];
    $show_bullets       = $attributes['show_bullets'];
    $autoplay           = $attributes['autoplay'];
    $content_centering  = $attributes['content_centering'];
    $text_centering     = $attributes['text_centering'];
    $height             = $attributes['height'];
    $slides             = $attributes['slides'];

    ?>
    <div class="nk-slider<?php echo '2' === $show_arrows ? ' nk-slider-arrows-2' : ''; ?>"
        data-container="<?php echo $container ? 'true' : 'false'; ?>"
        data-show-slide-numbers="<?php echo $show_slide_numbers ? 'true' : 'false'; ?>"
        data-show-author="<?php echo $show_author ? 'true' : 'false'; ?>"
        data-show-arrows="<?php echo 'false' !== $show_arrows ? 'true' : 'false'; ?>"
        data-show-nav="<?php echo $show_nav ? 'true' : 'false'; ?>"
        data-show-bullets="<?php echo $show_bullets ? 'true' : 'false'; ?>"
        data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
        data-content-centering="<?php echo esc_attr( $content_centering ); ?>"
        data-height="<?php echo esc_attr( $height ); ?>"
    >
        <?php
        if ( isset( $slides ) && ! empty( $slides ) ) :
            foreach ( $slides as $slide ) :
                $image             = isset( $slide['image'] ) ? $slide['image'] : false;
                $image_overlay     = isset( $slide['image_overlay'] ) ? $slide['image_overlay'] : false;
                $author            = isset( $slide['author'] ) ? $slide['author'] : false;
                $content_style     = isset( $slide['content_style'] ) ? $slide['content_style'] : false;
                $title             = isset( $slide['title'] ) ? $slide['title'] : false;
                $subtitle          = isset( $slide['subtitle'] ) ? $slide['subtitle'] : false;
                $subtitle_position = isset( $slide['subtitle_position'] ) ? $slide['subtitle_position'] : false;
                $subtitle_style    = isset( $slide['subtitle_style'] ) ? $slide['subtitle_style'] : false;
                $text              = isset( $slide['text'] ) ? $slide['text'] : false;
                $button_url        = isset( $slide['button_url'] ) ? $slide['button_url'] : false;
                $button_label      = isset( $slide['button_label'] ) ? $slide['button_label'] : false;
                $button_style      = isset( $slide['button_style'] ) ? $slide['button_style'] : false;

                $justify_row = 'justify-content-start';

                if ( 'center' === $text_centering ) {
                    $justify_row = 'justify-content-center';
                } elseif ( 'right' === $text_centering ) {
                    $justify_row = 'justify-content-end';
                }

                ?>
                <div class="nk-slider-item" data-author="<?php echo esc_attr( $author ); ?>">
                    <?php if ( $image && ! empty( $image ) ) : ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="nk-slider-image" data-no-lazy>
                    <?php endif; ?>
                    <?php if ( $image_overlay ) : ?>
                        <div class="nk-slider-image-overlay" style="background-color: <?php echo esc_attr( $image_overlay ); ?>"></div>
                    <?php endif; ?>
                    <div class="nk-slider-content">
                        <div class="row <?php echo esc_attr( $justify_row ); ?>">
                            <?php if ( '1' === $content_style ) : ?>
                                <div class="col-md-12">
                                    <div class="text-<?php echo esc_attr( $text_centering ); ?>">
                                        <?php
                                        skylith_block_slider_get_content( array(
                                            'title'        => $title,
                                            'subtitle'     => $subtitle,
                                            'subtitle_position' => $subtitle_position,
                                            'subtitle_style' => $subtitle_style,
                                            'text'         => $text,
                                            'button_url'   => $button_url,
                                            'button_label' => $button_label,
                                            'button_style' => $button_style,
                                        ) );
                                        ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-md-5">
                                    <div class="text-<?php echo esc_attr( $text_centering ); ?>">
                                        <?php
                                        skylith_block_slider_get_content( array(
                                            'title'        => $title,
                                            'subtitle'     => $subtitle,
                                            'subtitle_position' => $subtitle_position,
                                            'subtitle_style' => $subtitle_style,
                                            'text'         => $text,
                                            'button_url'   => $button_url,
                                            'button_label' => $button_label,
                                            'button_style' => $button_style,
                                        ) );
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </div>
    <?php
}

/**
 * Callback for block in Editor
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_slider_editor( $attributes ) {
    if ( isset( $attributes['slides'] ) && ! empty( $attributes['slides'] ) ) :
        $slide              = $attributes['slides'][0];
        $show_arrows        = $attributes['show_arrows'];
        $container          = $attributes['container'];
        $show_slide_numbers = $attributes['show_slide_numbers'];
        $show_author        = $attributes['show_author'];
        $show_nav           = $attributes['show_nav'];
        $show_bullets       = $attributes['show_bullets'];
        $content_centering  = $attributes['content_centering'];
        $text_centering     = $attributes['text_centering'];
        $height             = $attributes['height'];

        $image             = isset( $slide['image'] ) ? $slide['image'] : false;
        $image_overlay     = isset( $slide['image_overlay'] ) ? $slide['image_overlay'] : false;
        $author            = isset( $slide['author'] ) ? $slide['author'] : false;
        $content_style     = isset( $slide['content_style'] ) ? $slide['content_style'] : false;
        $title             = isset( $slide['title'] ) ? $slide['title'] : false;
        $subtitle          = isset( $slide['subtitle'] ) ? $slide['subtitle'] : false;
        $subtitle_position = isset( $slide['subtitle_position'] ) ? $slide['subtitle_position'] : false;
        $subtitle_style    = isset( $slide['subtitle_style'] ) ? $slide['subtitle_style'] : false;
        $text              = isset( $slide['text'] ) ? $slide['text'] : false;
        $button_url        = isset( $slide['button_url'] ) ? $slide['button_url'] : false;
        $button_label      = isset( $slide['button_label'] ) ? $slide['button_label'] : false;
        $button_style      = isset( $slide['button_style'] ) ? $slide['button_style'] : false;

        $justify_row = 'justify-content-start';

        if ( 'center' === $text_centering ) {
            $justify_row = 'justify-content-center';
        } elseif ( 'right' === $text_centering ) {
            $justify_row = 'justify-content-end';
        }

        ?>
        <div class="nk-slider<?php echo '2' === $show_arrows ? ' nk-slider-arrows-2' : ''; ?>"
            data-container="<?php echo $container ? 'true' : 'false'; ?>"
            data-show-nav="<?php echo $show_nav ? 'true' : 'false'; ?>"
            style="min-height: <?php echo esc_attr( $height ); ?>;"
        >
            <div class="nk-slider-container">
                <div class="<?php echo $container ? 'container' : ''; ?>">
                    <div class="nk-slider-content nk-slider-content-<?php echo esc_attr( $content_centering ); ?>">
                        <div>
                            <div class="row <?php echo esc_attr( $justify_row ); ?>">
                                <?php if ( '1' === $content_style ) : ?>
                                    <div class="col-md-12">
                                        <div class="text-<?php echo esc_attr( $text_centering ); ?>">
                                            <?php
                                            skylith_block_slider_get_content(
                                                array(
                                                    'title' => $title,
                                                    'subtitle' => $subtitle,
                                                    'subtitle_position' => $subtitle_position,
                                                    'subtitle_style' => $subtitle_style,
                                                    'text' => $text,
                                                    'button_url' => $button_url,
                                                    'button_label' => $button_label,
                                                    'button_style' => $button_style,
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-5">
                                        <div class="text-<?php echo esc_attr( $text_centering ); ?>">
                                            <?php
                                            skylith_block_slider_get_content(
                                                array(
                                                    'title' => $title,
                                                    'subtitle' => $subtitle,
                                                    'subtitle_position' => $subtitle_position,
                                                    'subtitle_style' => $subtitle_style,
                                                    'text' => $text,
                                                    'button_url' => $button_url,
                                                    'button_label' => $button_label,
                                                    'button_style' => $button_style,
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if ( $image && ! empty( $image ) ) :
                ?>
                <div class="nk-slider-bg-image" style="background-image: linear-gradient(0deg, <?php echo esc_attr( $image_overlay ? $image_overlay : 'transparent' ); ?>, <?php echo esc_attr( $image_overlay ? $image_overlay : 'transparent' ); ?>), url('<?php echo esc_url( $image['url'] ); ?>');"></div>
            <?php endif; ?>

            <?php if ( $show_author ) : ?>
                <div class="nk-slider-author">Author: <?php echo esc_html( $author ); ?></div>
            <?php endif; ?>

            <?php
            if ( $show_slide_numbers ) :
                $max_slides = ( count( $attributes['slides'] ) < 10 ? '0' : '' ) . count( $attributes['slides'] );
                ?>
                <div class="nk-slider-numbers">01 / <?php echo esc_html( $max_slides ); ?></div>
            <?php endif; ?>

            <?php if ( $show_nav ) : ?>
                <ul class="nk-slider-nav">
                    <?php
                    foreach ( $attributes['slides'] as $k => $item ) :
                        $number = ( $k < 9 ? '0' : '' ) . ( $k + 1 );
                        ?>
                        <li class="<?php echo 0 === $k ? 'active' : ''; ?>">
                            <?php echo esc_html( $number ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ( $show_bullets ) : ?>
                <ul class="nk-slider-bullets">
                    <?php
                    foreach ( $attributes['slides'] as $k => $item ) :
                        $number = ( $k < 9 ? '0' : '' ) . ( $k + 1 );
                        ?>
                        <li class="<?php echo 0 === $k ? 'active' : ''; ?>">
                            <?php echo esc_html( $number ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ( $show_arrows && 'false' !== $show_arrows ) : ?>
                <div class="nk-slider-arrow nk-slider-arrow-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="32" height="32" viewBox="0 0 32 32"> <path d="M12.792 15.233l-0.754 0.754 6.035 6.035 0.754-0.754-5.281-5.281 5.256-5.256-0.754-0.754-3.013 3.013z" fill="currentColor"></path> </svg>
                </div>
                <div class="nk-slider-arrow nk-slider-arrow-next">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="32" height="32" viewBox="0 0 32 32"> <path d="M19.159 16.767l0.754-0.754-6.035-6.035-0.754 0.754 5.281 5.281-5.256 5.256 0.754 0.754 3.013-3.013z" fill="currentColor"></path> </svg>
                </div>
            <?php endif; ?>
        </div>
        <?php
    else :
        ?>
        <div class="text-center">
            <?php echo esc_html__( 'No slides selected.', 'skylith' ); ?>
        </div>
        <?php
    endif;
}
