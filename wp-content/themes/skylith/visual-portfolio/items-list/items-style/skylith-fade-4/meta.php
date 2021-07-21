<?php
/**
 * Item meta template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$wrapper_tag = 'a';
if ( ! $args['url'] ) {
    $wrapper_tag = 'span';
}

?>

<<?php echo esc_html( $wrapper_tag ); ?>
    <?php if ( $args['url'] ) : ?>
        href="<?php echo esc_url( $args['url'] ); ?>"
        <?php
        if ( isset( $args['url_target'] ) && $args['url_target'] ) :
            ?>
            target="<?php echo esc_attr( $args['url_target'] ); ?>"
            <?php
        endif;
        ?>
    <?php endif; ?>
        class="vp-portfolio__item-overlay vp-portfolio__item-align-<?php echo esc_attr( $opts['align'] ); ?>">
    <div class="vp-portfolio__item-meta">
        <?php

        // Show Date.
        if ( $opts['show_date'] ) {
            ?>
            <div class="vp-portfolio__item-meta-date">
                <?php echo esc_html( $args['published'] ); ?>
            </div>
            <?php
        }

        // Show Title.
        if ( $opts['show_title'] && $args['title'] ) {
            ?>
            <h2 class="vp-portfolio__item-meta-title h3">
                <?php
                echo esc_html( $args['title'] );
                ?>
            </h2>
            <?php
        }

        // Show Read More.
        if ( $opts['read_more'] ) {
            ?>
            <div class="vp-portfolio__item-meta-read-more">
                <?php echo esc_html__( 'Read More', 'skylith' ); ?>
            </div>
            <?php
        }
        ?>
    </div>
</<?php echo esc_html( $wrapper_tag ); ?>>
