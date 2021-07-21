<?php // phpcs:ignore
/**
 * WooCommerce Products Sorting.
 *
 * @package skylith-core/woocommerce
 */

/**
 * Skylith_WC_Widget_Products_Sorting
 */
class Skylith_WC_Widget_Products_Sorting extends WC_Widget {
    /**
     * Constructor
     */
    public function __construct() {
        $this->widget_cssclass    = 'woocommerce skylith-widget-products-sorting';
        $this->widget_description = esc_html__( 'Display a products sorting list in your store', 'skylith-core' );
        $this->widget_id          = 'skylith_widget_products_sorting';
        $this->widget_name        = esc_html__( 'Skylith: Products Sorting', 'skylith-core' );
        $this->settings           = array(
            'title' => array(
                'type'  => 'text',
                'std'   => esc_html__( 'Sort by', 'skylith-core' ),
                'label' => esc_html__( 'Title', 'skylith-core' ),
            ),
        );

        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @see WP_Widget
     * @param array $args     Arguments.
     * @param array $instance Widget instance.
     */
    public function widget( $args, $instance ) {
        if ( ! is_shop() && ! is_product_taxonomy() ) {
            return;
        }

        if ( ! wc()->query->get_main_query()->post_count || ! woocommerce_products_will_display() ) {
            return;
        }

        $this->widget_start( $args, $instance );

        echo '<ul>';

        // phpcs:ignore
        $orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        $catalog_orderby_options = apply_filters(
            'woocommerce_catalog_orderby',
            array(
                'menu_order' => __( 'Default', 'skylith-core' ),
                'popularity' => __( 'Popularity', 'skylith-core' ),
                'rating'     => __( 'Rating', 'skylith-core' ),
                'date'       => __( 'Newest', 'skylith-core' ),
                'price'      => __( 'Price: low to high', 'skylith-core' ),
                'price-desc' => __( 'Price: high to low', 'skylith-core' ),
            )
        );

        if ( ! $show_default_orderby ) {
            unset( $catalog_orderby_options['menu_order'] );
        }

        if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
            unset( $catalog_orderby_options['rating'] );
        }

        $page_url = $this->get_current_page_url();

        foreach ( $catalog_orderby_options as $key => $name ) {
            if ( $key === $orderby ) {
                echo '<li class="chosen"><a href="' . esc_url( remove_query_arg( 'orderby', $page_url ) ) . '">' . esc_html( $name ) . '</a></li>';
            } else {
                echo '<li><a href="' . esc_url( add_query_arg( 'orderby', $key, $page_url ) ) . '">' . esc_html( $name ) . '</a></li>';
            }
        }

        echo '</ul>';

        $this->widget_end( $args );
    }
}
register_widget( 'Skylith_WC_Widget_Products_Sorting' );
