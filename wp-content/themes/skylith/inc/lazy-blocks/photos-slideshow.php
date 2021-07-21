<?php
/**
 * Lazyblocks Photos Slideshow.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block( array(
        'title'          => 'Photos Slideshow',
        'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21 4H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H3V6h18v12zm-6.5-7L11 15.51 8.5 12.5 5 17h14z"/></svg>',
        'keywords'       => array(
            0 => 'skylith',
            1 => 'slider',
            2 => 'photo',
        ),
        'slug'           => 'lazyblock/skylith-photos-slideshow',
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
            'control_7d391c433a' => array(
                'sort'              => '1',
                'child_of'          => '',
                'label'             => 'Photos',
                'name'              => 'photos',
                'type'              => 'gallery',
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
            'control_c9a9f64a47' => array(
                'sort'              => '2',
                'child_of'          => '',
                'label'             => 'Show Thumbnails',
                'name'              => 'show_thumbnails',
                'type'              => 'toggle',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '',
                'checked'           => 'true',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_b3aaa24c59' => array(
                'sort'              => '3',
                'child_of'          => '',
                'label'             => 'Autoplay',
                'name'              => 'autoplay',
                'type'              => 'number',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '20000',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
            'control_8d1b8f430f' => array(
                'sort'              => '4',
                'child_of'          => '',
                'label'             => 'Height',
                'name'              => 'height',
                'type'              => 'text',
                'min'               => '',
                'max'               => '',
                'step'              => '',
                'date_time_picker'  => 'date_time',
                'multiline'         => 'false',
                'default'           => '100vh',
                'checked'           => 'false',
                'placement'         => 'inspector',
                'save_in_meta'      => 'false',
                'save_in_meta_name' => '',
            ),
        ),
        'code'           => array(
            'editor_callback'   => 'skylith_block_photos_slideshow_editor',
            'frontend_callback' => 'skylith_block_photos_slideshow',
        ),
        'condition'      => array(),
    ) );
}

/**
 * Callback for block
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_photos_slideshow( $attributes ) {
    if ( isset( $attributes['photos'] ) && ! empty( $attributes['photos'] ) ) {
        ?>
        <div class="nk-slider bg-dark" data-container="false" data-show-nav="false" data-show-bullets="false" data-show-arrows="false" data-show-slideshow-nav="true" data-content-centering="bottom" data-show-thumbs="<?php echo ( $attributes['show_thumbnails'] ? 'true' : 'false' ); ?>" data-autoplay="<?php echo esc_attr( $attributes['autoplay'] ); ?>" data-height="<?php echo esc_attr( $attributes['height'] ); ?>">
            <?php
            foreach ( $attributes['photos'] as $photo ) :
                $thumb      = wp_get_attachment_image_src( $photo['id'], 'skylith_512x512' );
                $thumb      = $thumb[0];
                $photo_data = wp_get_attachment_image_src( $photo['id'], 'skylith_1920x1080' );
                ?>
                <div class="nk-slider-item" data-thumb="<?php echo esc_url( $thumb ); ?>">
                    <?php
                    // phpcs:ignore
                    echo Ghost_Framework::get_image(
                        $photo['id'],
                        'skylith_1920x1080',
                        false,
                        array(
                            'class'        => 'nk-slider-image',
                            'data-size'    => $photo_data[1] . 'x' . $photo_data[2],
                            'data-no-lazy' => '',
                        )
                    );
                    ?>
                    <div class="nk-slider-content">
                        <p class="lead pl-30"><?php echo esc_html( get_the_title( $photo['id'] ) ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

/**
 * Callback for block editor
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_photos_slideshow_editor( $attributes ) {
    if ( isset( $attributes['photos'] ) && ! empty( $attributes['photos'] ) ) {
        $photo      = $attributes['photos'][0];
        $thumb      = Ghost_Framework::get_attachment( $photo['id'], 'skylith_512x512' );
        $photo_data = Ghost_Framework::get_attachment( $photo['id'], 'skylith_1920x1080' );

        ?>
        <div class="nk-slider bg-dark" style="min-height: <?php echo esc_attr( $attributes['height'] ); ?>;" data-show-slideshow-nav="true" data-show-thumbs="<?php echo ( $attributes['show_thumbnails'] ? 'true' : 'false' ); ?>">
            <?php if ( isset( $thumb['src'] ) ) : ?>
                <div class="nk-slider-bg-image" style="background-image: url('<?php echo esc_url( $photo_data['src'] ); ?>');"></div>
            <?php endif; ?>

            <div class="nk-slider-container">
                <div class="container-fluid">
                    <div class="nk-slider-content nk-slider-content-bottom"><div>
                        <p class="lead pl-30"><?php echo esc_html( get_the_title( $photo['id'] ) ); ?></p>
                    </div></div>

                    <?php if ( $attributes['show_thumbnails'] ) : ?>
                        <div class="nk-slider-thumbs">
                            <ul>
                                <?php
                                foreach ( $attributes['photos'] as $k => $item ) :
                                    $thumb = Ghost_Framework::get_attachment( $item['id'], 'skylith_512x512' );
                                    ?>
                                    <li class="<?php echo 0 === $k ? 'active' : ''; ?>">
                                        <img src="<?php echo esc_url( $thumb['src'] ); ?>" alt="">
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="nk-slider-slideshow-nav">
                        <div class="nk-slider-arrow nk-slider-arrow-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="32" height="32" viewBox="0 0 32 32"> <path d="M12.792 15.233l-0.754 0.754 6.035 6.035 0.754-0.754-5.281-5.281 5.256-5.256-0.754-0.754-3.013 3.013z" fill="currentColor"></path> </svg>
                        </div>
                        <div class="nk-slider-arrow nk-slider-arrow-next">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="32" height="32" viewBox="0 0 32 32"> <path d="M19.159 16.767l0.754-0.754-6.035-6.035-0.754 0.754 5.281 5.281-5.256 5.256 0.754 0.754 3.013-3.013z" fill="currentColor"></path> </svg>
                        </div>
                        <div class="nk-slider-fullscreen">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="32" height="32" viewBox="0 0 32 32"> <path d="M11.202 4.271v-1.066h-7.997v7.997h1.066v-6.177l7.588 7.588 0.754-0.754-7.588-7.588z" fill="currentColor"></path> <path d="M20.798 3.205v1.066h6.177l-7.588 7.588 0.754 0.754 7.588-7.588v6.177h1.066v-7.997z" fill="currentColor"></path> <path d="M11.859 19.387l-7.588 7.588v-6.177h-1.066v7.997h7.997v-1.066h-6.177l7.588-7.588z" fill="currentColor"></path> <path d="M27.729 26.975l-7.588-7.588-0.754 0.754 7.588 7.588h-6.177v1.066h7.997v-7.997h-1.066z" fill="currentColor"></path> </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="text-center">
            <?php echo esc_html__( 'No photos selected.', 'skylith' ); ?>
        </div>
        <?php
    }
}
