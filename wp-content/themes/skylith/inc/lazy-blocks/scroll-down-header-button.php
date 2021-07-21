<?php
/**
 * Lazyblocks Scroll Down Header Button.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block( array(
        'title'          => 'Scroll Down Header Button',
        'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c4.41 0 8 3.59 8 8s-3.59 8-8 8-8-3.59-8-8 3.59-8 8-8m0-2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 13l-4-4h8z"/></svg>',
        'keywords'       => array(
            0 => 'skylith',
            1 => 'scroll',
            2 => 'down',
        ),
        'slug'           => 'lazyblock/skylith-scroll-down',
        'description'    => 'Use only inside AWB block.',
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
            'control_858bf54142' => array(
                'sort'              => '',
                'child_of'          => '',
                'label'             => 'Dark',
                'name'              => 'dark',
                'type'              => 'toggle',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
        ),
        'code'           => array(
            'editor_callback'   => 'skylith_block_scroll_down_header_button',
            'frontend_callback' => 'skylith_block_scroll_down_header_button',
        ),
        'condition'      => array(),
    ) );
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_scroll_down_header_button( $attributes ) {
    $classname = 'nk-awb-scroll-down';

    if ( $attributes['dark'] ) {
        $classname .= ' text-dark';
    } else {
        $classname .= ' text-white';
    }
    ?>
    <div>
        <span class="<?php echo esc_attr( $classname ); ?>"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="32" height="32" viewBox="0 0 32 32"><path d="M15.233 19.175l0.754 0.754 6.035-6.035-0.754-0.754-5.281 5.281-5.256-5.256-0.754 0.754 3.013 3.013z" fill="currentColor"></path></svg></span>
    </div>
    <?php
}
