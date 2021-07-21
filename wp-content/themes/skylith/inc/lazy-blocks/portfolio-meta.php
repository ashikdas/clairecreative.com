<?php
/**
 * Lazyblocks Portfolio Meta.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block( array(
        'title'          => 'Portfolio Meta',
        'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h18v14zM5 10h9v2H5zm0-3h9v2H5z"/></svg>',
        'keywords'       => array(
            0 => 'skylith',
            1 => 'portfolio',
        ),
        'slug'           => 'lazyblock/skylith-portfolio-meta',
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
            'control_c9a8f0466e' => array(
                'sort'              => '1',
                'child_of'          => '',
                'label'             => 'Client',
                'name'              => 'client',
                'type'              => 'text',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_93e81b4fc6' => array(
                'sort'              => '2',
                'child_of'          => '',
                'label'             => 'Link text',
                'name'              => 'link_label',
                'type'              => 'text',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_2f69944afb' => array(
                'sort'              => '3',
                'child_of'          => '',
                'label'             => 'Link URL',
                'name'              => 'link_url',
                'type'              => 'url',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_764be040a3' => array(
                'sort'              => '4',
                'child_of'          => '',
                'label'             => 'Date',
                'name'              => 'date',
                'type'              => 'text',
                'default'           => '',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_9d2b7c4747' => array(
                'sort'              => '5',
                'child_of'          => '',
                'label'             => 'Share (from Sociality plugin)',
                'name'              => 'share',
                'type'              => 'checkbox',
                'default'           => '',
                'checked'           => 'true',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
        ),
        'code'           => array(
            'editor_callback'   => 'skylith_block_portfolio_meta_editor',
            'frontend_callback' => 'skylith_block_portfolio_meta',
        ),
        'condition'      => array(
            0 => 'portfolio',
        ),
    ) );
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_portfolio_meta( $attributes ) {
    ?>
    <table class="nk-portfolio-details">
        <tbody>
            <?php if ( $attributes['client'] ) : ?>
                <tr>
                    <td><strong><?php echo esc_html__( 'Client:', 'skylith' ); ?></strong></td>
                    <td><?php echo esc_html( $attributes['client'] ); ?></td>
                </tr>
            <?php endif; ?>
            <?php if ( $attributes['link_label'] && $attributes['link_url'] ) : ?>
                <tr>
                    <td><strong><?php echo esc_html__( 'Link:', 'skylith' ); ?></strong></td>
                    <td><a href="<?php echo esc_url( $attributes['link_url'] ); ?>"><?php echo esc_html( $attributes['link_label'] ); ?></a></td>
                </tr>
            <?php endif; ?>
            <?php if ( $attributes['date'] ) : ?>
                <tr>
                    <td><strong><?php echo esc_html__( 'Date:', 'skylith' ); ?></strong></td>
                    <td><?php echo esc_html( $attributes['date'] ); ?></td>
                </tr>
            <?php endif; ?>
            <?php if ( $attributes['share'] ) : ?>
                <tr>
                    <td><strong><?php echo esc_html__( 'Share:', 'skylith' ); ?></strong></td>
                    <td><?php echo do_shortcode( '[sociality_sharing]' ); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php
}

/**
 * Callback for block in editor
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_portfolio_meta_editor( $attributes ) {
    ?>
    <table class="nk-portfolio-details">
        <tbody>
            <?php if ( $attributes['client'] ) : ?>
                <tr>
                    <td><strong><?php echo esc_html__( 'Client:', 'skylith' ); ?></strong></td>
                    <td><?php echo esc_html( $attributes['client'] ); ?></td>
                </tr>
            <?php endif; ?>
            <?php if ( $attributes['link_label'] && $attributes['link_url'] ) : ?>
                <tr>
                    <td><strong><?php echo esc_html__( 'Link:', 'skylith' ); ?></strong></td>
                    <td><a href="<?php echo esc_url( $attributes['link_url'] ); ?>"><?php echo esc_html( $attributes['link_label'] ); ?></a></td>
                </tr>
            <?php endif; ?>
            <?php if ( $attributes['date'] ) : ?>
                <tr>
                    <td><strong><?php echo esc_html__( 'Date:', 'skylith' ); ?></strong></td>
                    <td><?php echo esc_html( $attributes['date'] ); ?></td>
                </tr>
            <?php endif; ?>
            <?php if ( $attributes['share'] ) : ?>
                <tr>
                    <td><strong><?php echo esc_html__( 'Share:', 'skylith' ); ?></strong></td>
                    <td><?php echo esc_html__( 'Output of [sociality_sharing] shortcode.', 'skylith' ); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php
}
