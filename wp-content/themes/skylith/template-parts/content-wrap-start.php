<?php
/**
 * Content start wrapper
 *
 * @package skylith
 */

// prevent wrapper duplication
// fe it may happen if user adds woocommerce account shortcode inside boxed posts.
if ( ! skylith_maybe_wrap( 'start' ) ) {
    return;
}

$is_post_type = skylith_post_type_is();

$container_type = Ghost_Framework::get_theme_mod( $is_post_type . '_boxed' );

$cont_class = 'container';
$col_class  = '';
if ( 'normal' !== $container_type && 'small' !== $container_type ) {
    $cont_class = 'container-fluid';
}
if ( 'small' === $container_type ) {
    $col_class = 'col-lg-8 offset-lg-2';
}

$sidebar_place = Ghost_Framework::get_theme_mod( $is_post_type . '_sidebar_place' );
$sidebar       = Ghost_Framework::get_theme_mod( $is_post_type . '_sidebar' );

if ( $sidebar && is_active_sidebar( $sidebar ) && $sidebar_place ) {
    $col_class = 'col-lg-8';

    if ( 'left' === $sidebar_place ) {
        $col_class .= ' order-2';
    }
}

?>

<div id="primary" class="content-area <?php echo esc_attr( $cont_class ); ?>">
    <main id="main" class="site-main" role="main">
        <?php if ( $col_class ) : ?>
        <div class="row">
            <div class="<?php echo esc_attr( $col_class ); ?>">
        <?php endif; ?>
