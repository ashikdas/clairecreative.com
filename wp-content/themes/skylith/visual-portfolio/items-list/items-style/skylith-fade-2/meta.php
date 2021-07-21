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

$meta_class = 'vp-portfolio__item-meta';
if ( 'hover' === $opts['show_meta_type'] ) {
    $meta_class .= ' vp-portfolio__item-meta-hover';
} elseif ( 'not_hover' === $opts['show_meta_type'] ) {
    $meta_class .= ' vp-portfolio__item-meta-not-hover';
}

$letter_class = 'vp-portfolio__item-meta-letter';
if ( 'hover' === $opts['show_first_letter'] ) {
    $letter_class .= ' vp-portfolio__item-meta-letter-hover';
} elseif ( 'not_hover' === $opts['show_first_letter'] ) {
    $letter_class .= ' vp-portfolio__item-meta-letter-not-hover';
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
    <div class="<?php echo esc_attr( $meta_class ); ?>">
        <?php

        // Show First Letter.
        if ( $opts['show_first_letter'] && $args['title'] && isset( $args['title'][0] ) ) {
            ?>
            <div class="<?php echo esc_attr( $letter_class ); ?>">
                <span><?php echo esc_html( $args['title'][0] ); ?></span>
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

        // Show Date.
        if ( $opts['show_date'] ) {
            ?>
            <div class="vp-portfolio__item-meta-date">
                <?php echo esc_html( $args['published'] ); ?>
            </div>
            <?php
        }

        // Show Categories.
        if ( $opts['show_categories'] && $args['categories'] && ! empty( $args['categories'] ) ) {
            ?>
            <ul class="vp-portfolio__item-meta-categories">
                <?php
                $count = $opts['categories_count'];
                foreach ( $args['categories'] as $category ) {
                    if ( ! $count ) {
                        break;
                    }
                    ?>
                    <li class="vp-portfolio__item-meta-category">
                        <span><?php echo esc_html( $category['label'] ); ?></span>
                    </li>
                    <?php
                    $count--;
                }
                ?>
            </ul>
            <?php
        }
        ?>
    </div>
</<?php echo esc_html( $wrapper_tag ); ?>>
