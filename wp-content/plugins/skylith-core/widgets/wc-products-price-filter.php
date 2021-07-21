<?php // phpcs:ignore
/**
 * WooCommerce Products Price Filter.
 *
 * @package skylith-core/woocommerce
 */

/**
 * Skylith_WC_Widget_Products_Price_Filter
 */
class Skylith_WC_Widget_Products_Price_Filter extends WC_Widget {
    /**
     * Constructor
     */
    public function __construct() {
        $this->widget_cssclass    = 'woocommerce skylith-widget-products-price-filter';
        $this->widget_description = esc_html__( 'Display a list of price ranges to filter products in your store', 'skylith-core' );
        $this->widget_id          = 'skylith_widget_products_price_filter';
        $this->widget_name        = esc_html__( 'Skylith: Products Price Filter', 'skylith-core' );
        $this->settings           = array(
            'title' => array(
                'type'  => 'text',
                'std'   => __( 'Filter by price', 'skylith-core' ),
                'label' => __( 'Title', 'skylith-core' ),
            ),
            'price_step' => array(
                'type'  => 'number',
                'step'  => 1,
                'min'   => 1,
                'max'   => '',
                'std'   => 50,
                'label' => __( 'Price step', 'skylith-core' ),
            ),
            'max_price_steps_amount' => array(
                'type'  => 'number',
                'step'  => 1,
                'min'   => 1,
                'max'   => '',
                'std'   => 10,
                'label' => __( 'Limit the number of steps', 'skylith-core' ),
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

        if ( ! wc()->query->get_main_query()->post_count ) {
            return;
        }

        // Find min and max price in current result set.
        $prices = $this->get_filtered_price();
        $min    = floor( $prices->min_price );
        $max    = ceil( $prices->max_price );

        if ( $min === $max ) {
            return;
        }

        $this->widget_start( $args, $instance );

        $page_url = $this->get_current_page_url();

        // phpcs:ignore
        $min_price = intVal( isset( $_GET['min_price'] ) ? wc_clean( wp_unslash( $_GET['min_price'] ) ) : apply_filters( 'woocommerce_price_filter_widget_min_amount', $min ) );
        // phpcs:ignore
        $max_price = intVal( isset( $_GET['max_price'] ) ? wc_clean( wp_unslash( $_GET['max_price'] ) ) : apply_filters( 'woocommerce_price_filter_widget_max_amount', $max ) );

        $price_step             = intval( $instance['price_step'] );
        $max_price_steps_amount = intval( $instance['max_price_steps_amount'] ) - 1;

        echo '<ul>';

        // phpcs:ignore
        echo '<li' . ( isset( $_GET['min_price'] ) ? '' : ' class="chosen"' ) . '><a href="' . esc_url( remove_query_arg( array( 'min_price', 'max_price' ), $page_url ) ) . '">' . esc_html__( 'Show All', 'skylith-core' ) . '</a></li>';

        $steps_count = 0;
        for ( $range_min = 0; $range_min < ( $max + $price_step ); $range_min += $price_step ) {
            $range_max = $range_min + $price_step;

            // Empty price range.
            if ( $min > $range_max || ( $max + $price_step ) < $range_max ) {
                continue;
            }

            $steps_count++;

            $min_price_output = wc_price( $range_min );

            if ( $steps_count >= $max_price_steps_amount ) {
                $show_price = $min_price_output . '+';
                $is_active  = $range_min === $min_price;

                if ( $is_active ) {
                    $price_step_url = remove_query_arg( array( 'min_price', 'max_price' ), $page_url );
                } else {
                    $price_step_url = add_query_arg(
                        array(
                            'min_price' => $range_min,
                        ),
                        $page_url
                    );
                }

                echo '<li' . ( $is_active ? ' class="chosen"' : '' ) . '><a href="' . esc_url( $price_step_url ) . '">' . wp_kses_post( $show_price ) . '</a></li>';

                break;
            } else {
                $show_price = $min_price_output . ' - ' . wc_price( $range_min + $price_step );
                $is_active  = $range_min === $min_price && $range_max === $max_price;

                if ( $is_active ) {
                    $price_step_url = remove_query_arg( array( 'min_price', 'max_price' ), $page_url );
                } else {
                    $price_step_url = add_query_arg(
                        array(
                            'min_price' => $range_min,
                            'max_price' => $range_max,
                        ),
                        $page_url
                    );
                }

                echo '<li' . ( $is_active ? ' class="chosen"' : '' ) . '><a href="' . esc_url( $price_step_url ) . '">' . wp_kses_post( $show_price ) . '</a></li>';
            }
        }

        $this->widget_end( $args );
    }

    /**
     * Get filtered min price for current products.
     *
     * @return int
     */
    protected function get_filtered_price() {
        global $wpdb;

        $args       = wc()->query->get_main_query()->query_vars;
        $tax_query  = isset( $args['tax_query'] ) ? $args['tax_query'] : array();
        $meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();

        if ( ! is_post_type_archive( 'product' ) && ! empty( $args['taxonomy'] ) && ! empty( $args['term'] ) ) {
            $tax_query[] = array(
                'taxonomy' => $args['taxonomy'],
                'terms'    => array( $args['term'] ),
                'field'    => 'slug',
            );
        }

        foreach ( $meta_query + $tax_query as $key => $query ) {
            if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
                unset( $meta_query[ $key ] );
            }
        }

        $meta_query = new WP_Meta_Query( $meta_query );
        $tax_query  = new WP_Tax_Query( $tax_query );

        $meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
        $tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

        $sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
        $sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
        $sql .= " 	WHERE {$wpdb->posts}.post_type IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_post_type', array( 'product' ) ) ) ) . "')
            AND {$wpdb->posts}.post_status = 'publish'
            AND price_meta.meta_key IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_meta_keys', array( '_price' ) ) ) ) . "')
            AND price_meta.meta_value > '' ";
        $sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

        $search = WC_Query::get_main_search_query_sql();
        if ( $search ) {
            $sql .= ' AND ' . $search;
        }

        $sql = apply_filters( 'woocommerce_price_filter_sql', $sql, $meta_query_sql, $tax_query_sql );

        // phpcs:ignore
        return $wpdb->get_row( $sql ); // WPCS: unprepared SQL ok.
    }
}
register_widget( 'Skylith_WC_Widget_Products_Price_Filter' );
