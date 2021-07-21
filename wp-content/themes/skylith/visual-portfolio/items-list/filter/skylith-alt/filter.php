<?php
/**
 * Skylith alt filter template.
 *
 * @var $args
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$toggle_button = $args['opts']['toggle_button'];

if ( $toggle_button ) {
    ?>
    <div class="vp-filter__pagination<?php echo esc_attr( 'show_toggled' === $toggle_button ? ' vp-filter__pagination-active' : '' ); ?>">
        <a href="#nk-toggle-filter"><span class="nk-icon-squares"></span></a>
    </div>
    <div>
    <?php
}

?>

<ul class="<?php echo esc_attr( $args['class'] ); ?> vp-filter__style-skylith-alt-1">
    <?php
    foreach ( $args['items'] as $item ) {
        ?>
        <li class="<?php echo esc_attr( $item['class'] ); ?>">
            <a href="<?php echo esc_url( $item['url'] ); ?>" data-vp-filter="<?php echo esc_attr( $item['filter'] ); ?>">
                <?php echo esc_html( $item['label'] ); ?>

                <?php
                if ( $args['show_count'] && $item['count'] ) {
                    ?>
                    <span class="vp-filter__item-count">
                        <?php echo esc_html( $item['count'] ); ?>
                    </span>
                    <?php
                }
                ?>
            </a>
        </li>
        <?php
    }
    ?>
</ul>

<?php

if ( $toggle_button ) {
    ?>
    </div>
    <?php
}
