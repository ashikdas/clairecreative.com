<?php
/**
 * Lazyblocks ZigZag Divider.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block( array(
        'title'          => 'Zigzag Divider',
        'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99l1.5 1.5z"/></svg>',
        'keywords'       => array(
            0 => 'skylith',
            1 => 'divider',
        ),
        'slug'           => 'lazyblock/skylith-zigzag-divider',
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
            'control_f27a5d42cd' => array(
                'sort'              => '',
                'child_of'          => '',
                'label'             => 'Color',
                'name'              => 'color',
                'type'              => 'color',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '#212121',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_58b9bf457d' => array(
                'sort'              => '',
                'child_of'          => '',
                'label'             => 'Align',
                'name'              => 'align_divider',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'value' => 'center',
                        'label' => 'Center',
                    ),
                    array(
                        'value' => 'left',
                        'label' => 'Left',
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'Right',
                    ),
                ),
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => 'center',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
        ),
        'code'           => array(
            'editor_callback'   => 'skylith_block_zigzag_divider',
            'frontend_callback' => 'skylith_block_zigzag_divider',
        ),
        'condition'      => array(),
    ) );
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_zigzag_divider( $attributes ) {
    $classname = 'nk-divider-2 nk-divider-2-color-main mb-25';

    if ( 'left' === $attributes['align_divider'] ) {
        $classname .= ' ml-0';
    } elseif ( 'right' === $attributes['align_divider'] ) {
        $classname .= ' mr-0';
    }
    ?>
    <div class="<?php echo esc_attr( $classname ); ?>" style="color: <?php echo esc_attr( $attributes['color'] ); ?>;"></div>
    <?php
}
