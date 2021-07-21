<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package skylith
 */

if ( ! function_exists( 'skylith_post_type_is' ) ) :
    /**
     * Get current page post type to use in theme options.
     * If post type NOT blog - return page.
     */
    function skylith_post_type_is() {
        $result = 'single_page';

        if ( is_search() ) {
            $result = 'search';
        } elseif ( is_404() ) {
            $result = '404';
        } elseif (
            function_exists( 'is_woocommerce' ) && is_woocommerce() ||
            function_exists( 'is_shop' ) && is_shop() ||
            function_exists( 'is_product_category' ) && is_product_category() ||
            function_exists( 'is_product_tag' ) && is_product_tag()
        ) {
            $result = 'woocommerce';
        } elseif ( is_home() || is_archive() || is_category() || is_tag() || is_date() ) {
            if ( get_post_type() === 'portfolio' ) {
                $result = 'portfolio';
            } else {
                $result = 'archive';
            }
        } elseif ( is_single() ) {
            $result = get_post_type();

            if ( 'post' === $result || 'portfolio' === $result ) {
                $result = 'single_' . $result;
            }
        }

        return $result;
    }
endif;

if ( ! function_exists( 'skylith_maybe_wrap' ) ) :
    /**
     * Check if we can add wrapper start / end.
     *
     * @param string $type - wrapper type [start, end].
     * @return bool
     */
    function skylith_maybe_wrap( $type = 'start' ) {
        global $skylith_inside_wrapper;

        if ( 'end' === $type ) {
            $skylith_inside_wrapper--;

            if ( $skylith_inside_wrapper > 0 ) {
                return false;
            }

            $skylith_inside_wrapper = 0;
        } else {
            if ( ! $skylith_inside_wrapper ) {
                $skylith_inside_wrapper = 0;
            }

            $skylith_inside_wrapper++;

            if ( $skylith_inside_wrapper > 1 ) {
                return false;
            }
        }

        return true;
    }
endif;

if ( ! function_exists( 'skylith_content_show_image' ) ) :
    /**
     * Output featured image
     */
    function skylith_content_show_image() {
        $type = skylith_post_type_is();

        if ( get_post_thumbnail_id() && Ghost_Framework::get_theme_mod( $type . '_show_featured_image' ) ) :
            $featured_image_stretch = Ghost_Framework::get_theme_mod( $type . '_featured_image_stretch' );
            $video_url              = get_post_meta( get_the_ID(), 'video_url', true );

            if ( $featured_image_stretch ) {
                $featured_image_stretch = 'wide' === $featured_image_stretch ? 'wide' : 'full';
            }

            // Video Format.
            if ( has_post_format( 'video' ) && $video_url ) {
                ?>
                <div class="nk-plain-video nk-post-video<?php echo esc_attr( $featured_image_stretch ? ( ' align' . $featured_image_stretch ) : '' ); ?>" data-video="<?php echo esc_url( $video_url ); ?>" data-video-thumb="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>">
                    <?php
                    // phpcs:ignore
                    echo Ghost_Framework::get_image(
                        get_post_thumbnail_id(),
                        'skylith_1920x1080'
                    );
                    ?>
                    <span class="nk-video-plain-toggle">
                        <span class="nk-video-icon">
                            <span>
                                <span class="nk-play-icon"></span>
                            </span>
                        </span>
                    </span>
                </div>
                <?php
                // Default Format.
            } else {
                if ( $featured_image_stretch ) {
                    ?>
                    <div class="<?php echo esc_attr( $featured_image_stretch ? ( ' align' . $featured_image_stretch ) : '' ); ?>">
                    <?php
                }
                // phpcs:ignore
                echo Ghost_Framework::get_image(
                    get_post_thumbnail_id(),
                    'skylith_1920x1080',
                    false,
                    array(
                        'class' => 'nk-post-img nk-img',
                    )
                );
                if ( $featured_image_stretch ) {
                    ?>
                    </div>
                    <?php
                }
            }
        endif;
    }
endif;

if ( ! function_exists( 'skylith_get_social_list' ) ) :
    /**
     * Get Attachment Attribute for Images
     *
     * @param string $size_list - list type (full, small).
     *
     * @return array
     */
    function skylith_get_social_list( $size_list = 'full' ) {
        if ( 'full' === $size_list ) {
            return array(
                'fa fa-twitch'        => esc_html__( 'Twitch', 'skylith' ),
                'fa fa-vimeo'         => esc_html__( 'Vimeo', 'skylith' ),
                'fa fa-youtube'       => esc_html__( 'Youtube', 'skylith' ),
                'fa fa-facebook'      => esc_html__( 'Facebook', 'skylith' ),
                'fa fa-google-plus'   => esc_html__( 'Google-plus', 'skylith' ),
                'fa fa-twitter'       => esc_html__( 'Twitter', 'skylith' ),
                'fa fa-pinterest'     => esc_html__( 'Pinterest', 'skylith' ),
                'fa fa-instagram'     => esc_html__( 'Instagram', 'skylith' ),
                'fa fa-linkedin'      => esc_html__( 'Linkedin', 'skylith' ),
                'fa fa-behance'       => esc_html__( 'Behance', 'skylith' ),
                'fa fa-odnoklassniki' => esc_html__( 'Odnoklassniki', 'skylith' ),
                'fa fa-skype'         => esc_html__( 'Skype', 'skylith' ),
                'fa fa-vk'            => esc_html__( 'VK', 'skylith' ),
                'fa fa-steam'         => esc_html__( 'Steam', 'skylith' ),
                'fa fa-bitbucket'     => esc_html__( 'Bitbucket', 'skylith' ),
                'fa fa-dropbox'       => esc_html__( 'Dropbox', 'skylith' ),
                'fa fa-dribbble'      => esc_html__( 'Dribbble', 'skylith' ),
                'fa fa-deviantart'    => esc_html__( 'Deviantart', 'skylith' ),
                'fa fa-flickr'        => esc_html__( 'Flickr', 'skylith' ),
                'fa fa-foursquare'    => esc_html__( 'Foursquare', 'skylith' ),
                'fa fa-github'        => esc_html__( 'Github', 'skylith' ),
                'fa fa-medium'        => esc_html__( 'Medium', 'skylith' ),
                'fa fa-paypal'        => esc_html__( 'PayPal', 'skylith' ),
                'fa fa-reddit'        => esc_html__( 'Reddit', 'skylith' ),
                'fa fa-soundcloud'    => esc_html__( 'SoundCloud', 'skylith' ),
                'fa fa-slack'         => esc_html__( 'Slack', 'skylith' ),
                'fa fa-tumblr'        => esc_html__( 'Tumblr', 'skylith' ),
                'fa fa-wordpress'     => esc_html__( 'WordPress', 'skylith' ),
            );
        } elseif ( 'small' === $size_list ) {
            return array(
                'fa fa-facebook'    => esc_html__( 'Facebook', 'skylith' ),
                'fa fa-google-plus' => esc_html__( 'Google Plus', 'skylith' ),
                'fa fa-twitter'     => esc_html__( 'Twitter', 'skylith' ),
                'fa fa-pinterest'   => esc_html__( 'Pinterest', 'skylith' ),
                'fa fa-linkedin'    => esc_html__( 'Linkedin', 'skylith' ),
                'fa fa-vk'          => esc_html__( 'VK', 'skylith' ),
            );
        } else {
            return null;
        }
    }
endif;

if ( ! function_exists( 'skylith_print_header' ) ) :
    /**
     * Header
     *
     * @param string|boolean $type - post type.
     */
    function skylith_print_header( $type = false ) {
        global $post;

        if ( ! $type || ! Ghost_Framework::get_theme_mod( $type . '_header_show' ) ) {
            return;
        }

        $header_classes = '';
        if ( Ghost_Framework::get_theme_mod( $type . '_header_size' ) ) {
            $header_classes .= ' nk-header-title-' . Ghost_Framework::get_theme_mod( $type . '_header_size' );
        }
        if ( Ghost_Framework::get_theme_mod( $type . '_header_parallax' ) ) {
            $header_classes .= ' nk-header-title-parallax';
        }
        if ( Ghost_Framework::get_theme_mod( $type . '_header_parallax_content' ) ) {
            $header_classes .= ' nk-header-title-parallax-content';
        }

        $custom_color = '';
        if ( Ghost_Framework::get_theme_mod( $type . '_header_color' ) ) {
            $custom_color = 'color: ' . Ghost_Framework::get_theme_mod( $type . '_header_color' ) . ';';
        }

        if ( 'featured' === Ghost_Framework::get_theme_mod( $type . '_header_type_image' ) ) {
            $image = get_post_thumbnail_id( $post->ID );
        } else {
            $image = Ghost_Framework::get_theme_mod( $type . '_header_background_image' );
        }
        ?>

        <div class="nk-header-title <?php echo esc_attr( $header_classes ); ?>">
            <div class="bg-image <?php echo esc_attr( Ghost_Framework::get_theme_mod( $type . '_header_parallax' ) ? ' bg-image-parallax' : '' ); ?>">
                <?php if ( $image ) : ?>
                    <?php
                    // phpcs:ignore
                    echo Ghost_Framework::get_image(
                        $image,
                        'skylith_1920x1080',
                        false,
                        array(
                            'class' => Ghost_Framework::get_theme_mod( $type . '_header_parallax' ) ? 'jarallax-img' : '',
                        )
                    );
                    ?>
                <?php endif; ?>
                <div class="bg-image-overlay" style="background-color: <?php echo esc_attr( Ghost_Framework::get_theme_mod( $type . '_header_overlay' ) ); ?>;"></div>
            </div>

            <div class="nk-header-content">
                <div class="nk-header-content-inner">
                    <div class="container">
                        <?php
                        $header_show_title = Ghost_Framework::get_theme_mod( $type . '_header_title_type' );
                        $header_show_meta  = Ghost_Framework::get_theme_mod( $type . '_header_show_meta' );
                        $header_sub_title  = Ghost_Framework::get_theme_mod( $type . '_header_sub_title' );
                        $header_content    = Ghost_Framework::get_theme_mod( $type . '_header_content' );
                        $header_video_link = Ghost_Framework::get_theme_mod( $type . '_header_video_link' );
                        ?>

                        <?php if ( ! empty( $header_sub_title ) ) : ?>
                            <h2 class="nk-subtitle" style="<?php echo esc_attr( $custom_color ); ?>"><?php echo esc_html( $header_sub_title ); ?></h2>
                        <?php endif; ?>

                        <?php
                        if ( 'custom' === $header_show_title ) {
                            echo '<h1 class="nk-title" style="' . esc_attr( $custom_color ) . '">';
                            echo esc_html( Ghost_Framework::get_theme_mod( $type . '_header_title' ) );
                            echo '</h1>';
                        } elseif ( is_front_page() ) {
                            echo '<h1 class="nk-title" style="' . esc_attr( $custom_color ) . '">';
                            echo esc_html( wp_get_document_title() );
                            echo '</h1>';
                        } elseif ( is_archive() ) {
                            // archive.
                            // portfolio.
                            the_archive_title( '<h1 class="nk-title" style="' . esc_attr( $custom_color ) . '">', '</h1>' );
                        } elseif ( is_search() ) {
                            echo '<h1 class="nk-title" style="' . esc_attr( $custom_color ) . '">';
                            // translators: %s - query.
                            printf( esc_html__( 'Search Results for: "%s" Query', 'skylith' ), get_search_query() );
                            echo '</h1>';
                        } elseif ( 'title' === $header_show_title ) {
                            echo '<h1 class="nk-title" style="' . esc_attr( $custom_color ) . '">';
                            single_post_title();
                            echo '</h1>';
                        }

                        if ( $header_show_meta ) :
                            ?>
                            <div class="nk-post-meta nk-post-meta-center" style="<?php echo esc_attr( $custom_color ); ?>">
                                <div class="nk-post-date posted-on">
                                    <?php
                                    echo sprintf(
                                        '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated sr-only" datetime="%3$s">%4$s</time>',
                                        esc_attr( get_the_date( 'c' ) ),
                                        esc_html( get_the_date() ),
                                        esc_attr( get_the_modified_date( 'c' ) ),
                                        esc_html( get_the_modified_date() )
                                    );
                                    ?>
                                </div>

                                <?php $category = get_the_category(); ?>
                                <?php foreach ( $category as $key => $cat_item ) : ?>
                                    <div class="nk-post-category">
                                        <a href="<?php echo esc_url( get_category_link( $cat_item->cat_ID ) ); ?>"><?php echo esc_html( $cat_item->name ); ?></a>
                                    </div>
                                <?php endforeach; ?>

                                <div class="nk-post-comments-count">
                                    <?php
                                    $comments_num = get_comments_number( get_the_ID() );

                                    // translators: %s - number of comments.
                                    printf( esc_html( _n( '%s Comment', '%s Comments', $comments_num, 'skylith' ) ), esc_html( $comments_num ) );
                                    ?>
                                </div>

                                <div class="byline sr-only">
                                    <?php
                                    // translators: %s - author name.
                                    echo sprintf( esc_html_x( 'by %s', 'post author', 'skylith' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' );
                                    ?>
                                </div>
                            </div>
                            <?php
                        endif;

                        if ( ! empty( $header_content ) ) :
                            ?>
                            <div class="nk-gap"></div>
                            <div style="<?php echo esc_attr( $custom_color ); ?>">
                                <?php
                                echo do_shortcode( $header_content );
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $header_video_link ) ) : ?>
                            <div class="nk-gap-2"></div>
                            <a class="nk-video-fullscreen-toggle" href="<?php echo esc_url( Ghost_Framework::get_theme_mod( $type . '_header_video_link' ) ); ?>">
                                <span class="nk-video-icon"><span><span class="nk-play-icon"></span></span></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php
            if ( Ghost_Framework::get_theme_mod( $type . '_header_scroll_down_button' ) ) {
                ?>
                <div><a class="nk-header-title-scroll-down" href="#nk-header-title-scroll-down" style="<?php echo esc_attr( $custom_color ); ?>"><span class="pe-7s-angle-down"></span></a></div>
                <?php
            }
            ?>
        </div>
        <div id="nk-header-title-scroll-down"></div>

        <?php
    }
endif;


add_filter( 'embed_oembed_html', 'skylith_oembed_filter', 10, 4 );
if ( ! function_exists( 'skylith_oembed_filter' ) ) :
    /**
     * Responsive oEmbed
     *
     * @param string $html output html.
     * @param string $url embed url.
     * @param array  $attr embed attributes.
     * @param int    $post_ID post id.
     *
     * @return string
     */
    function skylith_oembed_filter( $html, $url, $attr, $post_ID ) {
        $classes = '';

        if ( strpos( $url, 'youtube' ) > 0 || strpos( $url, 'youtu.be' ) > 0 ) {
            $classes .= ' responsive-embed responsive-embed-16x9 embed-youtube';
        } elseif ( strpos( $url, 'vimeo' ) > 0 ) {
            $classes .= ' responsive-embed responsive-embed-16x9 embed-vimeo';
        } elseif ( strpos( $url, 'twitter' ) > 0 ) {
            $classes .= ' embed-twitter';
        }

        return '<div class="' . esc_attr( $classes ) . '">' . $html . '</div>';
    }
endif;


add_filter( 'the_content_more_link', 'skylith_the_content_more_link' );
if ( ! function_exists( 'skylith_the_content_more_link' ) ) :
    /**
     * Read More Tag
     *
     * @return string
     */
    function skylith_the_content_more_link() {
        return '<div><a class="more-link" href="' . get_permalink() . '#more-' . get_the_ID() . '">' . esc_html__( 'Read More', 'skylith' ) . '</a></div>';
    }
endif;


add_filter( 'the_password_form', 'skylith_the_password_form' );
if ( ! function_exists( 'skylith_the_password_form' ) ) :
    /**
     * Post Password Form
     *
     * @return string
     */
    function skylith_the_password_form() {
        global $post;
        $label = 'pwbox-' . ( empty( $post->ID ) ? wp_rand() : $post->ID );
        return '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
                ' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'skylith' ) . '
                <div class="input-group nk-form-style-1">
                    <input class="form-control" name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" placeholder="' . esc_attr__( 'Type password', 'skylith' ) . '">
                    <button class="nk-btn nk-btn-color-dark-1 pr-15 pl-15 ml-10">' . esc_html__( 'Enter', 'skylith' ) . '</button>
                </div>
            </form>';
    }
endif;

add_action( 'wp_head', 'skylith_pingback_header' );
if ( ! function_exists( 'skylith_pingback_header' ) ) {
    /**
     * Add a pingback url auto-discovery header for single posts, pages, or attachments.
     */
    function skylith_pingback_header() {
        if ( is_singular() && pings_open() ) {
            echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
        }
    }
}
