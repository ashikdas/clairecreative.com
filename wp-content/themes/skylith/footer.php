<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package skylith
 */

?>

    </div><!-- .site-content -->
</div><!-- .site -->

<?php

$general_scroll_top = Ghost_Framework::get_theme_mod( 'general_scroll_top_button' );

$footer_background_image   = Ghost_Framework::get_theme_mod( 'footer_background_image' );
$footer_background_overlay = Ghost_Framework::get_theme_mod( 'footer_background_overlay' );

$footer_widget_1_size    = Ghost_Framework::get_theme_mod( 'footer_widget_1_size' );
$footer_widget_2_size    = Ghost_Framework::get_theme_mod( 'footer_widget_2_size' );
$footer_widget_3_size    = Ghost_Framework::get_theme_mod( 'footer_widget_3_size' );
$footer_widget_4_size    = Ghost_Framework::get_theme_mod( 'footer_widget_4_size' );
$footer_widget_1_sidebar = Ghost_Framework::get_theme_mod( 'footer_widget_1_sidebar' );
$footer_widget_2_sidebar = Ghost_Framework::get_theme_mod( 'footer_widget_2_sidebar' );
$footer_widget_3_sidebar = Ghost_Framework::get_theme_mod( 'footer_widget_3_sidebar' );
$footer_widget_4_sidebar = Ghost_Framework::get_theme_mod( 'footer_widget_4_sidebar' );
$widgets                 = Ghost_Framework::get_theme_mod( 'footer_widgets' );

$widgets = $widgets && ( ( is_active_sidebar( $footer_widget_1_sidebar ) && $footer_widget_1_size > 0 ) || ( is_active_sidebar( $footer_widget_2_sidebar ) && $footer_widget_2_size > 0 ) || ( is_active_sidebar( $footer_widget_3_sidebar ) && $footer_widget_3_size > 0 ) || ( is_active_sidebar( $footer_widget_4_sidebar ) && $footer_widget_4_size > 0 ) );

$footer_widgets_valign = Ghost_Framework::get_theme_mod( 'footer_widgets_valign' );
$footer_widgets_gap    = Ghost_Framework::get_theme_mod( 'footer_widgets_gap' );

$footer_copyright            = Ghost_Framework::get_theme_mod( 'footer_copyright' );
$footer_copyright_scroll_top = Ghost_Framework::get_theme_mod( 'footer_copyright_scroll_top' );
$footer_widget_copyright     = Ghost_Framework::get_theme_mod( 'footer_widget_copyright' );
?>

<!--
    START: Footer
-->
<footer class="nk-footer">
    <?php if ( $footer_background_image || $footer_background_overlay ) : ?>
        <div class="bg-image">
            <?php
            if ( $footer_background_image ) {
                // phpcs:ignore
                echo Ghost_Framework::get_image(
                    $footer_background_image,
                    'skylith_1920x1080',
                    '',
                    array(
                        'class' => 'jarallax-img',
                    )
                );
            }
            ?>
            <div class="bg-image-overlay"></div>
        </div>
    <?php endif; ?>

    <?php if ( $widgets ) : ?>
        <div class="nk-footer-widgets">
            <div class="container">
                <div class="row align-items-<?php echo esc_attr( $footer_widgets_valign ); ?> vertical-gap <?php echo esc_attr( $footer_widgets_gap ); ?>-gap">
                    <?php if ( is_active_sidebar( $footer_widget_1_sidebar ) && $footer_widget_1_size > 0 ) : ?>
                        <div class="<?php echo esc_attr( 'col-lg-' . $footer_widget_1_size ); ?>">
                            <?php dynamic_sidebar( $footer_widget_1_sidebar ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( $footer_widget_2_sidebar ) && $footer_widget_2_size > 0 ) : ?>
                        <div class="<?php echo esc_attr( 'col-lg-' . $footer_widget_2_size ); ?>">
                            <?php dynamic_sidebar( $footer_widget_2_sidebar ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( $footer_widget_3_sidebar ) && $footer_widget_3_size > 0 ) : ?>
                        <div class="<?php echo esc_attr( 'col-lg-' . $footer_widget_3_size ); ?>">
                            <?php dynamic_sidebar( $footer_widget_3_sidebar ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( $footer_widget_4_sidebar ) && $footer_widget_4_size > 0 ) : ?>
                        <div class="<?php echo esc_attr( 'col-lg-' . $footer_widget_4_size ); ?>">
                            <?php dynamic_sidebar( $footer_widget_4_sidebar ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ( $footer_copyright ) : ?>
        <div class="nk-footer-cont">
            <?php if ( $footer_copyright_scroll_top ) : ?>
                <a class="nk-footer-scroll-top-btn nk-anchor" href="#top">
                    <span class="pe-7s-angle-up"></span>
                </a>
            <?php endif; ?>

            <div class="container text-center">
                <div class="nk-footer-text">
                    <?php if ( is_active_sidebar( $footer_widget_copyright ) ) : ?>
                        <?php dynamic_sidebar( $footer_widget_copyright ); ?>
                    <?php else : ?>
                        <?php
                        // translators: year.
                        echo sprintf( esc_html__( 'All rights reserved &copy; %s', 'skylith' ), esc_html( date( 'Y' ) ) );
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</footer>
<!-- END: Footer -->

<?php if ( $general_scroll_top ) : ?>
    <!-- START: Scroll Up Button -->
    <div class="nk-scroll-up">
        <div class="container">
            <a href="#top" class="nk-anchor"><span class="pe-7s-angle-up"></span></a>
        </div>
    </div>
    <!-- END: Scroll Up Button -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
