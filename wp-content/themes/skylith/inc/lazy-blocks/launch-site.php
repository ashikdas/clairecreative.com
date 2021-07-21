<?php
/**
 * Lazyblocks Launch Site.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block( array(
        'title'          => 'Launch Site',
        'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>',
        'keywords'       => array(
            0 => 'skylith',
            1 => 'launch site',
        ),
        'slug'           => 'lazyblock/skylith-launch-site',
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
            'control_c8d8744128' => array(
                'sort'              => '',
                'child_of'          => '',
                'label'             => 'Link Label',
                'name'              => 'link_label',
                'type'              => 'text',
                'default'           => 'Launch Site',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_901a9d4d54' => array(
                'sort'              => '',
                'child_of'          => '',
                'label'             => 'Link URL',
                'name'              => 'link_url',
                'type'              => 'url',
                'default'           => '#',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_2afabb486b' => array(
                'sort'              => '',
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
            'editor_callback'   => 'skylith_block_launch_site_editor',
            'frontend_callback' => 'skylith_block_launch_site',
        ),
        'condition'      => array(),
    ) );
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_launch_site( $attributes ) {
    ?>
    <div class="nk-portfolio-launch-site">
        <?php if ( $attributes['link_label'] && $attributes['link_url'] ) : ?>
            <a href="<?php echo esc_url( $attributes['link_url'] ); ?>"><?php echo esc_html( $attributes['link_label'] ); ?></a>
        <?php endif; ?>
        <?php if ( $attributes['share'] ) : ?>
            <?php echo do_shortcode( '[sociality_sharing]' ); ?>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Callback for block in editor
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_launch_site_editor( $attributes ) {
    ?>
    <div class="nk-portfolio-launch-site">
        <?php if ( $attributes['link_label'] && $attributes['link_url'] ) : ?>
            <a href="<?php echo esc_url( $attributes['link_url'] ); ?>"><?php echo esc_html( $attributes['link_label'] ); ?></a>
        <?php endif; ?>
        <?php if ( $attributes['share'] ) : ?>
            <div>
                <?php echo esc_html__( 'Output of [sociality_sharing] shortcode.', 'skylith' ); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
}
