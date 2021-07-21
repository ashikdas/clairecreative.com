<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package skylith
 */

$is_post_type     = skylith_post_type_is();
$sidebar          = Ghost_Framework::get_theme_mod( $is_post_type . '_sidebar' );
$show_top_padding = 'single_post' !== $is_post_type || Ghost_Framework::get_theme_mod( $is_post_type . '_paddings' );
?>

<div class="col-lg-4">
    <aside class="nk-sidebar nk-sidebar-sticky" data-offset-top="0">
        <div class="nk-gap-4<?php echo ( $show_top_padding ? '' : ' d-lg-none' ); ?>"></div>
        <?php dynamic_sidebar( $sidebar ); ?>
        <div class="nk-gap-4"></div>
    </aside>
</div>
