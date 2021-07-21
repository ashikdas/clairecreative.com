<?php // phpcs:ignore
/**
 * WooCommerce Video
 *
 * @package skylith-core
 */

// Make sure we don't expose any info if called directly.
if ( ! function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

if ( ! class_exists( 'Skylith_WooCommerce_Video' ) ) :
    /**
     * Skylith_WooCommerce_Video
     */
    class Skylith_WooCommerce_Video {
        /**
         * Construct.
         */
        public function __construct() {
            /* We do nothing here! */
            $this->init();
        }

        /**
         * Init.
         */
        public function init() {
            if ( ! class_exists( 'WooCommerce' ) ) {
                return;
            }

            add_action( 'add_meta_boxes', array( $this, 'woocommerce_metabox' ) );
            add_action( 'save_post', array( $this, 'woocommerce_video_metabox_save' ) );
            add_action( 'woocommerce_product_thumbnails', array( $this, 'woocommerce_product_thumbnails' ), 21 );
        }

        /**
         * Add woocommerce metabox.
         *
         * @param WP_Post $post The post object.
         */
        public function woocommerce_metabox( $post ) {
            add_meta_box(
                'skylith_video_box',
                esc_html__( 'Video', 'skylith-core' ),
                array( $this, 'woocommerce_video_metabox' ),
                'product',
                'side',
                'low'
            );
        }

        /**
         * Render video metabox content.
         *
         * @param WP_Post $post The post object.
         */
        public function woocommerce_video_metabox( $post ) {
            wp_nonce_field( 'skylith_video_box', 'skylith_video_box_nonce' );

            $url = get_post_meta( $post->ID, '_skylith_video_url', true );

            ?>
            <textarea id="skylith_video_url" name="skylith_video_url" style="width: 98%" placeholder="Video URL"><?php echo esc_attr( $url ); ?></textarea>
            <p><?php echo esc_html__( 'Required installed GhostKit plugin.', 'skylith-core' ); ?></p>
            <?php
        }

        /**
         * Save the meta when the post is saved.
         *
         * @param int $post_id The ID of the post being saved.
         */
        public function woocommerce_video_metabox_save( $post_id ) {
            // Verify nonce valid.
            // phpcs:disable
            if (
                ! isset( $_POST['skylith_video_box_nonce'] ) ||
                ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['skylith_video_box_nonce'] ) ), 'skylith_video_box' ) ||
                ! isset( $_POST['skylith_video_url'] )
            ) {
                return $post_id;
            }
            // phpcs:enable

            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return $post_id;
            }

            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }

            // Sanitize the user input.
            // phpcs:ignore
            $url = sanitize_text_field( wp_unslash( $_POST['skylith_video_url'] ) );

            // Update the meta field.
            update_post_meta( $post_id, '_skylith_video_url', $url );
        }

        /**
         * Print video button.
         */
        public function woocommerce_product_thumbnails() {
            $url = get_post_meta( get_the_ID(), '_skylith_video_url', true );

            if ( ! $url ) {
                return;
            }
            ?>
            <div class="nk-video-fullscreen-toggle ghostkit-video" data-video="<?php echo esc_url( $url ); ?>" data-click-action="fullscreen" data-fullscreen-action-close-icon="fas fa-times" data-fullscreen-background-color="rgba(0, 0, 0, .9)">
                <?php echo esc_html__( 'Video', 'skylith-core' ); ?>
            </div>
            <?php
        }
    }
endif;

new Skylith_WooCommerce_Video();
