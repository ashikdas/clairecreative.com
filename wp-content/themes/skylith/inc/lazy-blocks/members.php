<?php
/**
 * Lazyblocks Members.
 *
 * @package skylith/lazyblocks
 */

if ( function_exists( 'lazyblocks' ) ) {
    lazyblocks()->add_block(
        array(
            'title'          => 'Members',
            'icon'           => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12.5 10c0-1.65-1.35-3-3-3s-3 1.35-3 3 1.35 3 3 3 3-1.35 3-3zm-3 1c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm6.5 2c1.11 0 2-.89 2-2 0-1.11-.89-2-2-2-1.11 0-2.01.89-2 2 0 1.11.89 2 2 2zM11.99 2.01c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zM5.84 17.12c.68-.54 2.27-1.11 3.66-1.11.07 0 .15.01.23.01.24-.64.67-1.29 1.3-1.86-.56-.1-1.09-.16-1.53-.16-1.3 0-3.39.45-4.73 1.43-.5-1.04-.78-2.2-.78-3.43 0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.2-.27 2.34-.75 3.37-1-.59-2.36-.87-3.24-.87-1.52 0-4.5.81-4.5 2.7v2.78c-2.27-.13-4.29-1.21-5.66-2.86z"/></svg>',
            'keywords'       => array(
                0 => 'skylith',
                1 => 'members',
            ),
            'slug'           => 'lazyblock/skylith-members',
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
                'control_1a1910455a' => array(
                    'sort'              => '1',
                    'child_of'          => '',
                    'label'             => 'Members',
                    'name'              => 'members',
                    'type'              => 'repeater',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_d57a2e464b' => array(
                    'sort'              => '2',
                    'child_of'          => 'control_1a1910455a',
                    'label'             => 'Name',
                    'name'              => 'name',
                    'type'              => 'text',
                    'default'           => 'John',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_01c9354cbe' => array(
                    'sort'              => '3',
                    'child_of'          => 'control_1a1910455a',
                    'label'             => 'Photo',
                    'name'              => 'photo',
                    'type'              => 'image',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_b51b4b423d' => array(
                    'sort'              => '4',
                    'child_of'          => 'control_1a1910455a',
                    'label'             => 'Post',
                    'name'              => 'post',
                    'type'              => 'text',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_a45af44fca' => array(
                    'sort'              => '5',
                    'child_of'          => 'control_1a1910455a',
                    'label'             => 'Bio',
                    'name'              => 'bio',
                    'type'              => 'textarea',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_0bcb2b404f' => array(
                    'sort'              => '6',
                    'child_of'          => 'control_1a1910455a',
                    'label'             => 'Facebook',
                    'name'              => 'facebook',
                    'type'              => 'url',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_458aef49a5' => array(
                    'sort'              => '7',
                    'child_of'          => 'control_1a1910455a',
                    'label'             => 'Google+',
                    'name'              => 'google_plus',
                    'type'              => 'url',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
                'control_a1584448f3' => array(
                    'sort'              => '8',
                    'child_of'          => 'control_1a1910455a',
                    'label'             => 'Twitter',
                    'name'              => 'twitter',
                    'type'              => 'url',
                    'default'           => '',
                    'checked'           => 'false',
                    'placement'         => 'inspector',
                    'save_in_meta'      => 'false',
                    'save_in_meta_name' => '',
                ),
            ),
            'code'           => array(
                'editor_callback'   => 'skylith_block_members',
                'frontend_callback' => 'skylith_block_members',
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
function skylith_block_members( $attributes ) {
    if ( isset( $attributes['members'] ) && ! empty( $attributes['members'] ) ) {
        ?>
        <div class="nk-team-block">
            <?php
            foreach ( $attributes['members'] as $member ) :
                $name        = isset( $member['name'] ) ? $member['name'] : '';
                $post        = isset( $member['post'] ) ? $member['post'] : '';
                $bio         = isset( $member['bio'] ) ? $member['bio'] : '';
                $photo       = isset( $member['photo'] ) ? $member['photo'] : '';
                $facebook    = isset( $member['facebook'] ) ? $member['facebook'] : '';
                $twitter     = isset( $member['twitter'] ) ? $member['twitter'] : '';
                $google_plus = isset( $member['google_plus'] ) ? $member['google_plus'] : '';

                ?>
                <div class="nk-team-member">
                    <div class="nk-team-member-letter">
                        <?php echo esc_html( substr( $name, 0, 1 ) ); ?>
                    </div>
                    <div class="nk-team-member-name">
                        <?php echo esc_html( $name ); ?>
                    </div>
                    <div class="nk-team-member-post">
                        <?php echo esc_html( $post ); ?>
                    </div>
                    <div class="nk-team-member-bio">
                        <?php echo esc_html( $bio ); ?>
                    </div>

                    <?php if ( $photo && ! empty( $photo ) ) : ?>
                        <img src="<?php echo esc_url( $photo['url'] ); ?>" alt="<?php echo esc_attr( $photo['alt'] ); ?>" class="nk-team-member-photo" data-no-lazy>
                    <?php endif; ?>

                    <ul class="nk-team-member-social">
                        <?php if ( $facebook ) : ?>
                            <li><a href="<?php echo esc_url( $facebook ); ?>"><span class="fa fa-facebook"></span></a></li>
                        <?php endif; ?>
                        <?php if ( $twitter ) : ?>
                            <li><a href="<?php echo esc_url( $twitter ); ?>"><span class="fa fa-twitter"></span></a></li>
                        <?php endif; ?>
                        <?php if ( $google_plus ) : ?>
                            <li><a href="<?php echo esc_url( $google_plus ); ?>"><span class="fa fa-google-plus"></span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        </div>
        <?php
    } else {
        ?>
        <div class="text-center">
            <?php echo esc_html__( 'No members added.', 'skylith' ); ?>
        </div>
        <?php
    }
}

/**
 * Callback for block editor
 *
 * @param array $attributes - block attributes.
 */
function skylith_block_members_editor( $attributes ) {
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
