<?php // phpcs:ignore
/**
 * Skylith Widgets
 *
 * @package skylith-core
 */

// Make sure we don't expose any info if called directly.
if ( ! function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

if ( ! class_exists( 'Skylith_Widgets' ) ) :
    /**
     * Skylith_Widgets
     */
    class Skylith_Widgets {
        /**
         * Construct.
         */
        public function __construct() {
            add_action( 'widgets_init', array( $this, 'widgets_init' ) );
        }

        /**
         * Widgets Init Action
         */
        public function widgets_init() {
            // phpcs:ignore
            require_once skylith_core()->plugin_path . '/widgets/recent-posts.php';

            if ( class_exists( 'WC_Widget' ) ) {
                // phpcs:ignore
                require_once skylith_core()->plugin_path . '/widgets/wc-products-sorting.php';
                // phpcs:ignore
                require_once skylith_core()->plugin_path . '/widgets/wc-products-price-filter.php';
            }
        }
    }
endif;

new Skylith_Widgets();
