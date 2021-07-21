<?php // phpcs:ignore
/**
 * Plugin Name:  Skylith Core Plugin
 * Description:  Add metabox to show video popup on single products
 * Version:      1.0.0
 * Author:       nK
 * Author URI:   https://nkdev.info
 * License:      GPLv2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  skylith-core
 *
 * @package skylith-core
 */

// Make sure we don't expose any info if called directly.
if ( ! function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

if ( ! class_exists( 'Skylith_Core' ) ) :
    /**
     * Skylith_Core
     */
    class Skylith_Core {
        /**
         * The single class instance.
         *
         * @var $instance
         */
        private static $instance = null;

        /**
         * Main Instance
         * Ensures only one instance of this class exists in memory at any one time.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
                self::$instance->init();
            }
            return self::$instance;
        }

        /**
         * Path to the plugin directory
         *
         * @var $plugin_path
         */
        public $plugin_path;

        /**
         * URL to the plugin directory
         *
         * @var $plugin_url
         */
        public $plugin_url;

        /**
         * Init.
         */
        public function init() {
            $this->plugin_path = plugin_dir_path( __FILE__ );
            $this->plugin_url  = plugin_dir_url( __FILE__ );

            load_plugin_textdomain( 'skylith-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

            // Classes.
            // phpcs:ignore
            require_once plugin_dir_path( __FILE__ ) . 'classes/widgets.php';
            // phpcs:ignore
            require_once plugin_dir_path( __FILE__ ) . 'classes/woocommerce-video.php';
        }
    }
endif;

/**
 * Function works with the Visual_Portfolio class instance
 *
 * @return object Visual_Portfolio
 */
function skylith_core() {
    return Skylith_Core::instance();
}
add_action( 'plugins_loaded', 'skylith_core' );
