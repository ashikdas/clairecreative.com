<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skylith
 */

get_header();

$background_image = Ghost_Framework::get_theme_mod( '404_background_image' );
$show_text        = Ghost_Framework::get_theme_mod( '404_show_text' );
$show_search      = Ghost_Framework::get_theme_mod( '404_show_search' );
$show_home_button = Ghost_Framework::get_theme_mod( '404_show_home_button' );

?>

<section class="no-results not-found">
    <div class="nk-header-title nk-header-title-full nk-header-title-parallax-content nk-header-content-center-center">
        <?php if ( $background_image ) : ?>
            <div class="bg-image bg-image-parallax">
                <?php
                if ( $background_image ) {
                    // phpcs:ignore
                    echo Ghost_Framework::get_image(
                        $background_image,
                        'skylith_1920x1080',
                        '',
                        array(
                            'class' => 'jarallax-img',
                        )
                    );
                }
                ?>
            </div>
        <?php endif; ?>
        <div class="nk-header-content">
            <div class="nk-header-content-inner">
                <div class="container text-center">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12">

                            <header class="page-header">
                                <h1 class="page-title display-extra-big"><?php esc_html_e( '404', 'skylith' ); ?></h1>
                            </header><!-- .page-header -->

                            <div class="nk-gap mnt-3"></div>

                            <div class="page-content">

                                <?php if ( is_search() ) : ?>

                                    <?php if ( $show_text ) : ?>
                                        <p class="nk-heading-font lead"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'skylith' ); ?></p>
                                    <?php endif; ?>

                                    <?php if ( $show_search ) : ?>
                                        <div class="nk-gap mnt-10"></div>
                                        <?php get_search_form(); ?>
                                    <?php endif; ?>

                                    <?php if ( $show_home_button ) : ?>
                                        <div class="nk-gap-2"></div>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-btn nk-btn-color-dark-1"><?php esc_html_e( 'Back to Home', 'skylith' ); ?></a>
                                    <?php endif; ?>

                                <?php else : ?>

                                    <?php if ( $show_text ) : ?>

                                        <p class="nk-heading-font lead"><?php esc_html_e( 'We are sorry. But the page you are looking for cannot be found.', 'skylith' ); ?></p>

                                    <?php endif; ?>

                                    <?php if ( $show_search ) : ?>
                                        <div class="nk-gap mnt-10"></div>
                                        <?php get_search_form(); ?>
                                    <?php endif; ?>

                                    <?php if ( $show_home_button ) : ?>
                                        <div class="nk-gap-2"></div>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-btn nk-btn-color-dark-1"><?php esc_html_e( 'Back to Home', 'skylith' ); ?></a>
                                    <?php endif; ?>

                                <?php endif; ?>

                            </div><!-- .page-content -->

                        </div>
                    </div>
                    <div class="nk-gap-3"></div>
                    <div class="nk-gap-3"></div>
                </div>
            </div>
        </div>
    </div>
</section><!-- .no-results -->

<?php

get_footer();
