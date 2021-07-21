<?php
/**
 * Lazyblocks Fullpage.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block( array(
        'title'          => 'Fullpage',
        'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12.01 5.5L10 8h4l-1.99-2.5zM18 10v4l2.5-1.99L18 10zM6 10l-2.5 2.01L6 14v-4zm8 6h-4l2.01 2.5L14 16zm7-13H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16.01H3V4.99h18v14.02z"/></svg>',
        'keywords'       => array(
            0 => 'skylith',
            1 => 'fullpage',
        ),
        'slug'           => 'lazyblock/skylith-fullpage',
        'description'    => '',
        'category'       => 'skylith',
        'category_label' => 'Skylith',
        'supports'       => array(
            'customClassName' => true,
            'anchor'          => true,
            'align'           => array(
                0 => 'wide',
                1 => 'full',
            ),
            'html'            => false,
            'multiple'        => true,
            'inserter'        => true,
        ),
        'controls'       => array(
            'control_ee683743f6' => array(
                'sort'              => '1',
                'child_of'          => '',
                'label'             => 'Items',
                'name'              => 'items',
                'type'              => 'repeater',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_284a16424e' => array(
                'sort'              => '2',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Background Image',
                'name'              => 'image',
                'type'              => 'image',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_284asb24e' => array(
                'sort'              => '2',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Background Image Overlay',
                'name'              => 'image_overlay',
                'type'              => 'color',
                'alpha'             => 'true',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_n1kd2124ec' => array(
                'sort'              => '3',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Showcase Image (on the right side)',
                'name'              => 'showcase_image',
                'type'              => 'image',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_276as2ghf8' => array(
                'sort'              => '4',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Dark Text in Content',
                'name'              => 'white_background',
                'type'              => 'toggle',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_dfbdg2fsd79' => array(
                'sort'              => '5',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Content Align',
                'name'              => 'content_align',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => 'left',
                        'label' => 'Left',
                    ),
                    array(
                        'value' => 'center',
                        'label' => 'Center',
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'Right',
                    ),
                ),
                'default'           => 'left',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_28aa8f4ff2' => array(
                'sort'              => '6',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Categories',
                'name'              => 'categories',
                'type'              => 'rich_text',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_ad3a264a61' => array(
                'sort'              => '7',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Title',
                'name'              => 'title',
                'type'              => 'rich_text',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_ad3dh43a90' => array(
                'sort'              => '8',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Title Size',
                'name'              => 'title_size',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => 'display-big',
                        'label' => 'Extra Big',
                    ),
                    array(
                        'value' => 'display-4',
                        'label' => 'Big',
                    ),
                    array(
                        'value' => 'display-1',
                        'label' => 'Mid',
                    ),
                    array(
                        'value' => 'h1',
                        'label' => 'Normal',
                    ),
                    array(
                        'value' => 'h2',
                        'label' => 'Small',
                    ),
                    array(
                        'value' => 'h3',
                        'label' => 'Extra Small',
                    ),
                ),
                'default'           => 'display-4',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_adsg2s4acw1' => array(
                'sort'              => '9',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Text',
                'name'              => 'text',
                'type'              => 'rich_text',
                'multiline'         => 'true',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_78697d4d80' => array(
                'sort'              => '10',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Button Label',
                'name'              => 'button_label',
                'type'              => 'text',
                'default'           => 'View Project',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_31a9294993' => array(
                'sort'              => '11',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Button URL',
                'name'              => 'button_url',
                'type'              => 'url',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_27fhs2gsf8' => array(
                'sort'              => '13',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Button Style',
                'name'              => 'button_style',
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
                    array(
                        'value' => '3',
                        'label' => 'Style 3',
                    ),
                ),
                'default'           => '1',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_27fh3fshf8' => array(
                'sort'              => '12',
                'child_of'          => 'control_ee683743f6',
                'label'             => 'Scroll Down Button',
                'name'              => 'scroll_down_button',
                'type'              => 'toggle',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_fg23dj3a90' => array(
                'sort'              => '14',
                'child_of'          => '',
                'label'             => 'Pagination Style',
                'name'              => 'pagination',
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
        ),
        'code'           => array(
            'editor_callback'   => 'skylith_block_fullpage_editor',
            'frontend_callback' => 'skylith_block_fullpage',
        ),
        'condition'      => array(),
    ) );
}

/**
 * Get block content.
 *
 * @param array $item - row options.
 */
function skylith_block_fullpage_get_content( $item ) {
    $white_background   = isset( $item['white_background'] ) ? $item['white_background'] : '';
    $content_align      = isset( $item['content_align'] ) ? $item['content_align'] : 'left';
    $categories         = isset( $item['categories'] ) ? $item['categories'] : '';
    $title              = isset( $item['title'] ) ? $item['title'] : '';
    $title_size         = isset( $item['title_size'] ) ? $item['title_size'] : 'display-4';
    $text               = isset( $item['text'] ) ? $item['text'] : '';
    $button_url         = isset( $item['button_url'] ) ? $item['button_url'] : false;
    $button_label       = isset( $item['button_label'] ) ? $item['button_label'] : false;
    $button_style       = isset( $item['button_style'] ) ? $item['button_style'] : false;
    $scroll_down_button = isset( $item['scroll_down_button'] ) ? $item['scroll_down_button'] : false;

    if ( isset( $item['showcase_image']['url'] ) ) :
        ?>
        <div class="nk-fullpage-absolute-content d-none d-lg-block">
            <div class="row">
                <div class="col-lg-7 ml-auto align-self-start">
                    <div class="d-flex align-items-end pt-30">
                        <img class="nk-img-stretch" src="<?php echo esc_url( $item['showcase_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['showcase_image']['alt'] ); ?>" data-no-lazy>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="nk-fullpage-text-<?php echo $white_background ? 'dark' : 'white'; ?>">
        <div class="container text-<?php echo esc_attr( $content_align ); ?>">
            <?php if ( isset( $item['showcase_image']['url'] ) ) : ?>
                <div class="row"><div class="col-lg-5 align-self-center">
            <?php endif; ?>
                <?php if ( $categories ) : ?>
                    <div class="nk-fullpage-item-category">
                        <?php echo wp_kses_post( $categories ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( $title ) : ?>
                    <h2 class="nk-fullpage-title <?php echo esc_attr( $title_size ); ?>">
                        <?php echo wp_kses_post( $title ); ?>
                    </h2>
                <?php endif; ?>
                <?php if ( $text ) : ?>
                    <div class="nk-gap-1 mnt-15"></div>
                    <div class="nk-fullpage-text">
                        <?php echo wp_kses_post( $text ); ?>
                    </div>
                <?php endif; ?>
                <?php
                if ( $button_url && $button_label ) :
                    ?>
                    <div class="nk-gap-1"></div>
                    <?php

                    switch ( $button_style ) {
                        case '2':
                            ?>
                            <a class="nk-btn nk-btn-outline nk-btn-color-white" href="<?php echo esc_url( $button_url ); ?>">
                                <?php echo wp_kses_post( $button_label ); ?>
                            </a>
                            <?php
                            break;
                        case '3':
                            ?>
                            <a class="nk-btn nk-btn-outline nk-btn-color-white nk-btn-hover-color-main" href="<?php echo esc_url( $button_url ); ?>">
                                <?php echo wp_kses_post( $button_label ); ?>
                            </a>
                            <?php
                            break;
                        default:
                            ?>
                            <a class="nk-btn" href="<?php echo esc_url( $button_url ); ?>">
                                <?php echo wp_kses_post( $button_label ); ?>
                            </a>
                            <?php
                            break;
                    }
                endif;
                ?>
            <?php if ( isset( $item['showcase_image']['url'] ) ) : ?>
                </div></div>
            <?php endif; ?>
        </div>
        <?php if ( $scroll_down_button ) : ?>
            <a class="nk-fullpage-scroll-down text-<?php echo $white_background ? 'dark' : 'white'; ?>" href="#"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="32" height="32" viewBox="0 0 32 32"><path d="M15.233 19.175l0.754 0.754 6.035-6.035-0.754-0.754-5.281 5.281-5.256-5.256-0.754 0.754 3.013 3.013z" fill="currentColor"></path></svg></a>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_fullpage( $attributes ) {
    ?>
    <div class="nk-fullpage nk-fullpage-nav-style-<?php echo esc_attr( $attributes['pagination'] ); ?>">
        <?php if ( ! empty( $attributes['items'] ) ) : ?>
            <?php
            foreach ( $attributes['items'] as $i => $item ) :
                $white_background = isset( $item['white_background'] ) ? $item['white_background'] : '';
                $number           = ( $i < 9 ? '0' : '' ) . ( $i + 1 );
                ?>
                <div class="nk-fullpage-item nk-fullpage-item-bg-<?php echo $white_background ? 'light' : 'dark'; ?>" data-letter="<?php echo esc_attr( $number ); ?>">
                    <?php if ( isset( $item['image']['url'] ) ) : ?>
                        <img class="nk-fullpage-image" src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['image']['alt'] ); ?>" data-no-lazy>
                        <?php if ( isset( $item['image_overlay'] ) ) : ?>
                            <div class="nk-fullpage-image-overlay" style="background-color: <?php echo esc_attr( $item['image_overlay'] ); ?>"></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="nk-fullpage-content">
                        <?php
                        skylith_block_fullpage_get_content( $item );
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Callback for block in Editor.
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_fullpage_editor( $attributes ) {
    if ( isset( $attributes['items'] ) && ! empty( $attributes['items'] ) ) :
        $item = $attributes['items'][0];
        ?>
        <div class="nk-fullpage nk-fullpage-nav-style-<?php echo esc_attr( $attributes['pagination'] ); ?>">
            <?php if ( isset( $item['image']['url'] ) ) : ?>
                <div class="nk-fullpage-bg-image" style="background-image: linear-gradient(0deg, <?php echo esc_attr( isset( $item['image_overlay'] ) ? $item['image_overlay'] : 'transparent' ); ?>, <?php echo esc_attr( isset( $item['image_overlay'] ) ? $item['image_overlay'] : 'transparent' ); ?>), url('<?php echo esc_url( $item['image']['url'] ); ?>');"></div>
            <?php endif; ?>
            <div class="nk-fullpage-content">
                <?php
                    skylith_block_fullpage_get_content( $item );
                ?>
            </div>
            <ul class="nk-fullpage-nav active">
                <?php
                foreach ( $attributes['items'] as $k => $item ) :
                    $number = ( $k < 9 ? '0' : '' ) . ( $k + 1 );
                    ?>
                    <li class="<?php echo 0 === $k ? 'active' : ''; ?>">
                        <?php echo esc_html( $number ); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
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
