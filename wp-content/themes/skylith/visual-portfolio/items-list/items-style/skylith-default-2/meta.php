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

$classname = 'vp-portfolio__item-overlay';
if ( $opts['meta_background'] ) {
    $classname .= ' vp-portfolio__item-overlay-background';

    if ( 'big' === $opts['meta_background'] ) {
        $classname .= '-big';
    }
}

?>

<div class="<?php echo esc_attr( $classname ); ?>">
    <div class="vp-portfolio__item-meta">
        <?php

        // Show Title.
        if ( $opts['show_title'] && $args['title'] ) {
            ?>
            <h2 class="vp-portfolio__item-meta-title h3">
                <?php
                if ( $args['url'] ) {
                    ?>
                    <a href="<?php echo esc_url( $args['url'] ); ?>"
                        <?php
                        if ( isset( $args['url_target'] ) && $args['url_target'] ) :
                            ?>
                            target="<?php echo esc_attr( $args['url_target'] ); ?>"
                            <?php
                        endif;
                        ?>
                    >
                        <?php echo esc_html( $args['title'] ); ?>
                    </a>
                    <?php
                } else {
                    echo esc_html( $args['title'] );
                }
                ?>
            </h2>
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
                        <a href="<?php echo esc_html( $category['url'] ); ?>">
                            <?php echo esc_html( $category['label'] ); ?>
                        </a>
                    </li>
                    <?php
                    $count--;
                }
                ?>
            </ul>
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

        // Show Excerpt.
        if ( $opts['show_excerpt'] && $args['excerpt'] ) {
            ?>
            <div class="vp-portfolio__item-meta-excerpt">
                <?php echo esc_html( $args['excerpt'] ); ?>
            </div>
            <?php
        }

        // Show Read More.
        if ( $opts['read_more'] ) {
            ?>
            <div class="vp-portfolio__item-meta-read-more">
                <a href="<?php echo esc_url( $args['url'] ); ?>"
                    <?php
                    if ( isset( $args['url_target'] ) && $args['url_target'] ) :
                        ?>
                        target="<?php echo esc_attr( $args['url_target'] ); ?>"
                        <?php
                    endif;
                    ?>
                    class="nk-btn nk-btn-outline nk-btn-color-gray-7 nk-btn-hover-color-dark-3 text-dark"><?php echo esc_html__( 'Read More', 'skylith' ); ?></a>
            </div>
            <?php
        }
        ?>
    </div>
</div>
