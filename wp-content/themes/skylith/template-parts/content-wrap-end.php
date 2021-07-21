<?php
/**
 * Content end wrapper
 *
 * @package skylith
 */

// prevent wrapper duplication
// fe it may happen if user adds woocommerce account shortcode inside boxed posts.
if ( ! skylith_maybe_wrap( 'end' ) ) {
    return;
}

$is_post_type = skylith_post_type_is();

$container_type = Ghost_Framework::get_theme_mod( $is_post_type . '_boxed' );

$cont_class = 'container';
if ( 'normal' !== $container_type && 'small' !== $container_type ) {
    $cont_class = 'container-fluid';
}
$show_col = 'small' === $container_type;

$sidebar_place = Ghost_Framework::get_theme_mod( $is_post_type . '_sidebar_place' );
$sidebar       = Ghost_Framework::get_theme_mod( $is_post_type . '_sidebar' );

if ( $sidebar && is_active_sidebar( $sidebar ) && $sidebar_place ) {
    $show_col = 'sidebar';
}

?>
        <?php if ( $show_col ) : ?>
            </div>
            <?php
            if ( 'sidebar' === $show_col ) {
                get_sidebar();
            }
            ?>
        </div>
        <?php endif; ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->
