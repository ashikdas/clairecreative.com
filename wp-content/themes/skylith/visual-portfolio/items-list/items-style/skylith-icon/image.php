<?php
/**
 * Item image template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<div class="vp-portfolio__item-img-wrap">
    <div class="vp-portfolio__item-img">
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
                <?php
                // Show Icon.
                if ( $opts['show_icon'] ) {
                    ?>
                    <div class="vp-portfolio__item-img-icon">
                        <?php
                        if ( isset( $args['format_video_url'] ) ) {
                            visual_portfolio()->include_template( 'icons/play' );
                        } else {
                            visual_portfolio()->include_template( 'icons/search' );
                        }
                        ?>
                    </div>
                    <?php
                }

                echo wp_kses( $args['image'], $args['image_allowed_html'] );
                ?>
            </a>
            <?php
        } else {
            // Show Icon.
            if ( $opts['show_icon'] ) {
                ?>
                <div class="vp-portfolio__item-img-icon">
                    <?php
                    if ( isset( $args['format_video_url'] ) ) {
                        visual_portfolio()->include_template( 'icons/play' );
                    } else {
                        visual_portfolio()->include_template( 'icons/search' );
                    }
                    ?>
                </div>
                <?php
            }

            echo wp_kses( $args['image'], $args['image_allowed_html'] );
        }
        ?>
    </div>
</div>
