<?php
/**
 * Lazyblocks Hover Portfolio.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block( array(
        'title'          => 'Hover Portfolio',
        'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z"/></svg>',
        'keywords'       => array(
            0 => 'skylith',
            1 => 'portfolio',
            2 => 'hover',
        ),
        'slug'           => 'lazyblock/skylith-hover-portfolio',
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
            'control_3eeb034dc8' => array(
                'sort'              => '1',
                'child_of'          => '',
                'label'             => 'Items',
                'name'              => 'items',
                'type'              => 'repeater',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_0df95c4f3c' => array(
                'sort'              => '2',
                'child_of'          => 'control_3eeb034dc8',
                'label'             => 'Image',
                'name'              => 'image',
                'type'              => 'image',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_0ae8394ce4' => array(
                'sort'              => '3',
                'child_of'          => 'control_3eeb034dc8',
                'label'             => 'Title',
                'name'              => 'title',
                'type'              => 'text',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_a2eaac4320' => array(
                'sort'              => '4',
                'child_of'          => 'control_3eeb034dc8',
                'label'             => 'URL',
                'name'              => 'url',
                'type'              => 'url',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_2d48f54df5' => array(
                'sort'              => '5',
                'child_of'          => '',
                'label'             => 'Side image',
                'name'              => 'side_image',
                'type'              => 'toggle',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_9bcbaa44b5' => array(
                'sort'              => '6',
                'child_of'          => '',
                'label'             => 'Links style',
                'name'              => 'links_style',
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
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '1',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_ba69f04f41' => array(
                'sort'              => '',
                'child_of'          => '',
                'label'             => 'Show numbers on titles',
                'name'              => 'show_numbers_on_titles',
                'type'              => 'toggle',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
        ),
        'code'           => array(
            'editor_callback'   => 'skylith_block_hover_portfolio_editor',
            'frontend_callback' => 'skylith_block_hover_portfolio',
        ),
        'condition'      => array(),
    ) );
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_hover_portfolio( $attributes ) {
    if ( isset( $attributes['items'] ) && ! empty( $attributes['items'] ) ) {
        $alt = '';
        ?>
        <div class="nk-hover-image<?php echo esc_attr( $attributes['align'] ? ( ' align' . $attributes['align'] ) : '' ); ?><?php echo $attributes['side_image'] ? ' nk-hover-image-side' : ''; ?>">
            <div class="container">
                <ul class="nk-hover-image-links<?php echo '2' === $attributes['links_style'] ? ' nk-hover-image-links-2' : ''; ?>">
                    <?php
                    foreach ( $attributes['items'] as $i => $item ) :
                        $url       = isset( $item['url'] ) ? $item['url'] : '';
                        $title     = isset( $item['title'] ) ? $item['title'] : '';
                        $image_url = isset( $item['image'] ) ? $item['image']['url'] : '';
                        $number    = ( $i < 9 ? '0' : '' ) . ( $i + 1 );
                        ?>
                        <li>
                            <a class="<?php echo '2' !== $attributes['links_style'] ? 'fw-400' : ''; ?><?php echo 0 === $i ? ' active' : ''; ?>" href="<?php echo esc_url( $url ); ?>" data-hover-image="<?php echo esc_url( $image_url ); ?>">
                                <?php if ( $attributes['show_numbers_on_titles'] ) : ?>
                                    <span><?php echo esc_html( $number ); ?>.</span>
                                <?php endif; ?>
                                <?php echo esc_html( $title ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="nk-hover-image-img-cont">
                <div class="bg-image">
                    <?php if ( $attributes['side_image'] ) : ?>
                        <a href="#">
                    <?php endif; ?>
                        <img src="#" alt="<?php echo esc_attr( $alt ); ?>" class="nk-hover-image-img" data-no-lazy>
                    <?php if ( $attributes['side_image'] ) : ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="text-center">
            <?php echo esc_html__( 'No items added.', 'skylith' ); ?>
        </div>
        <?php
    }
}

/**
 * Callback for block editor
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_hover_portfolio_editor( $attributes ) {
    if ( isset( $attributes['items'] ) && ! empty( $attributes['items'] ) ) {
        $current_image_alt = isset( $attributes['items'][0]['image'] ) ? $attributes['items'][0]['image']['alt'] : '';
        $current_image_url = isset( $attributes['items'][0]['image'] ) ? $attributes['items'][0]['image']['url'] : '';
        ?>
        <div class="nk-hover-image<?php echo esc_attr( $attributes['align'] ? ( ' align' . $attributes['align'] ) : '' ); ?><?php echo $attributes['side_image'] ? ' nk-hover-image-side' : ''; ?>">
            <div class="container">
                <ul class="nk-hover-image-links<?php echo '2' === $attributes['links_style'] ? ' nk-hover-image-links-2' : ''; ?>">
                    <?php
                    foreach ( $attributes['items'] as $i => $item ) :
                        $url       = isset( $item['url'] ) ? $item['url'] : '';
                        $title     = isset( $item['title'] ) ? $item['title'] : '';
                        $image_url = isset( $item['image'] ) ? $item['image']['url'] : '';
                        $number    = ( $i < 9 ? '0' : '' ) . ( $i + 1 );
                        ?>
                        <li>
                            <a class="<?php echo '2' !== $attributes['links_style'] ? 'fw-400' : ''; ?><?php echo 0 === $i ? ' active' : ''; ?>" href="<?php echo esc_url( $url ); ?>" data-hover-image="<?php echo esc_url( $image_url ); ?>">
                                <?php if ( $attributes['show_numbers_on_titles'] ) : ?>
                                    <span><?php echo esc_html( $number ); ?>.</span>
                                <?php endif; ?>
                                <?php echo esc_html( $title ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="nk-hover-image-img-cont">
                <div class="bg-image">
                    <?php if ( $attributes['side_image'] ) : ?>
                        <a href="#">
                    <?php endif; ?>
                        <img alt="<?php echo esc_attr( $current_image_alt ); ?>" src="<?php echo esc_url( $current_image_url ); ?>" class="nk-hover-image-img" data-no-lazy>
                    <?php if ( $attributes['side_image'] ) : ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="text-center">
            <?php echo esc_html__( 'No items added.', 'skylith' ); ?>
        </div>
        <?php
    }
}
