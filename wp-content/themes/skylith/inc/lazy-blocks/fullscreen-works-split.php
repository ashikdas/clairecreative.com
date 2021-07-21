<?php
/**
 * Lazyblocks FullScreen Works Split.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block(
        array(
            'title'          => 'Fullscreen Works Split',
            'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21 15h2v2h-2v-2zm0-4h2v2h-2v-2zm2 8h-2v2c1 0 2-1 2-2zM13 3h2v2h-2V3zm8 4h2v2h-2V7zm0-4v2h2c0-1-1-2-2-2zM1 7h2v2H1V7zm16-4h2v2h-2V3zm0 16h2v2h-2v-2zM3 3C2 3 1 4 1 5h2V3zm6 0h2v2H9V3zM5 3h2v2H5V3zm-4 8v8c0 1.1.9 2 2 2h12V11H1zm2 8l2.5-3.21 1.79 2.15 2.5-3.22L13 19H3z"/></svg>',
            'keywords'       => array(
                0 => 'skylith',
                1 => 'fullscreen',
                2 => 'works',
            ),
            'slug'           => 'lazyblock/skylith-fullscreen-works-split',
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
                'control_d1481047db' => array(
                    'sort'              => '1',
                    'child_of'          => '',
                    'label'             => 'Slides',
                    'name'              => 'items',
                    'type'              => 'repeater',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_2199f546f5' => array(
                    'sort'              => '2',
                    'child_of'          => 'control_d1481047db',
                    'label'             => 'Image',
                    'name'              => 'image',
                    'type'              => 'image',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_6ccbdd4687' => array(
                    'sort'              => '3',
                    'child_of'          => 'control_d1481047db',
                    'label'             => 'Name',
                    'name'              => 'name',
                    'type'              => 'text',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_c98be1469e' => array(
                    'sort'              => '4',
                    'child_of'          => 'control_d1481047db',
                    'label'             => 'URL',
                    'name'              => 'url',
                    'type'              => 'url',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_044b32475b' => array(
                    'sort'              => '5',
                    'child_of'          => 'control_d1481047db',
                    'label'             => 'Categories',
                    'name'              => 'categories',
                    'type'              => 'rich_text',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_9b7869406b' => array(
                    'sort'              => '9',
                    'child_of'          => '',
                    'label'             => 'View project button',
                    'name'              => 'view_project_button',
                    'type'              => 'text',
                    'default'           => 'View project',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
            ),
            'code'           => array(
                'editor_callback'   => 'skylith_block_fullscreen_works_split_editor',
                'frontend_callback' => 'skylith_block_fullscreen_works_split',
            ),
            'condition'      => array(),
        )
    );
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_fullscreen_works_split( $attributes ) {
    ?>
    <div class="nk-fullpage nk-fullpage-split nk-fullpage-nav-style-2 bg-white">
        <?php
        if ( isset( $attributes['items'] ) && ! empty( $attributes['items'] ) ) :
            $view_project_button = isset( $attributes['view_project_button'] ) ? $attributes['view_project_button'] : '';

            foreach ( $attributes['items'] as $i => $item ) :
                $url        = isset( $item['url'] ) ? $item['url'] : '';
                $categories = isset( $item['categories'] ) ? $item['categories'] : '';
                $name       = isset( $item['name'] ) ? $item['name'] : '';
                $number     = ( $i < 9 ? '0' : '' ) . ( $i + 1 );
                ?>
                <div class="nk-fullpage-item" data-number="<?php echo esc_attr( $number ); ?>">
                    <?php if ( isset( $item['image']['url'] ) ) : ?>
                        <img class="nk-fullpage-image" src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['image']['alt'] ); ?>" data-no-lazy>
                    <?php endif; ?>
                    <?php if ( $view_project_button ) : ?>
                        <div class="nk-fullpage-view-button">
                            <div class="container">
                                <a class="nk-btn-2" href="<?php echo esc_url( $url ); ?>">
                                    <?php echo esc_html( $view_project_button ); ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="nk-fullpage-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if ( $categories ) : ?>
                                        <div class="nk-fullpage-item-category">
                                            <?php echo wp_kses_post( $categories ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $name ) : ?>
                                        <h2 class="nk-fullpage-title display-4">
                                            <a href="<?php echo esc_url( $url ); ?>">
                                                <?php echo esc_html( $name ); ?>
                                            </a>
                                        </h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
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
function skylith_block_fullscreen_works_split_editor( $attributes ) {
    if ( isset( $attributes['items'] ) && ! empty( $attributes['items'] ) ) :
        $item                = $attributes['items'][0];
        $view_project_button = isset( $attributes['view_project_button'] ) ? $attributes['view_project_button'] : '';
        $url                 = isset( $item['url'] ) ? $item['url'] : '';
        $categories          = isset( $item['categories'] ) ? $item['categories'] : '';
        $name                = isset( $item['name'] ) ? $item['name'] : '';
        ?>
        <div class="nk-fullpage nk-fullpage-split nk-fullpage-nav-style-2 bg-white">
            <div class="nk-fullpage-item">
                <?php if ( isset( $item['image']['url'] ) ) : ?>
                    <div class="nk-fullpage-bg-image" style="background-image: url('<?php echo esc_url( $item['image']['url'] ); ?>');"></div>
                <?php endif; ?>

                <div class="nk-fullpage-content" style="opacity: 1;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ( $categories ) : ?>
                                    <div class="nk-fullpage-item-category">
                                        <?php echo wp_kses_post( $categories ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $name ) : ?>
                                    <h2 class="nk-fullpage-title display-4">
                                        <a href="<?php echo esc_url( $url ); ?>">
                                            <?php echo esc_html( $name ); ?>
                                        </a>
                                    </h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nk-fullpage-nav active">
                    <?php foreach ( $attributes['items'] as $k => $item ) : ?>
                        <li class="<?php echo 0 === $k ? 'active' : ''; ?>"></li>
                    <?php endforeach; ?>
                </ul>

                <?php if ( $view_project_button ) : ?>
                    <div class="nk-fullpage-view-button">
                        <div class="container">
                            <a class="nk-btn-2" href="<?php echo esc_url( $url ); ?>">
                                <?php echo esc_html( $view_project_button ); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="nk-fullpage-number">01</div>
            </div>
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
