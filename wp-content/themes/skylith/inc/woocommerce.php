<?php
/**
 * WooCommerce extend functions.
 *
 * @package skylith
 */

if ( ! function_exists( 'skylith_woocommerce_setup' ) ) {
    /**
     * Setup
     */
    function skylith_woocommerce_setup() {
        add_theme_support(
            'woocommerce',
            array(
                'product_grid' => array(
                    'default_rows'    => 3,
                    'min_rows'        => 1,
                    'max_rows'        => 8,
                    'default_columns' => 4,
                    'min_columns'     => 1,
                    'max_columns'     => 4,
                ),
            )
        );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
}
add_action( 'after_setup_theme', 'skylith_woocommerce_setup' );

/**
 * Wrappers
 */
if ( ! function_exists( 'skylith_woocommerce_wrapper_start' ) ) {
    /**
     * Wrapper Start
     */
    function skylith_woocommerce_wrapper_start() {
        $cart_url        = wc_get_cart_url();
        $shop_page_url   = get_permalink( wc_get_page_id( 'shop' ) );
        $archive_columns = (int) get_option( 'woocommerce_catalog_columns', 4 );

        $is_shop_page     = is_shop();
        $is_cart_page     = is_cart();
        $is_checkout_page = is_checkout();
        $is_product_page  = is_product();
        $is_archive       = $is_shop_page || is_product_taxonomy();

        $show_back_to_shop_button = ! $is_archive && $shop_page_url;
        $show_title               = $is_archive && ! $is_shop_page && apply_filters( 'woocommerce_show_page_title', true );
        $show_layout_buttons      = $is_archive && $archive_columns > 1;
        $show_filters             = $is_archive && is_active_sidebar( 'sidebar-woocommerce-filters' );
        $show_share_buttons       = $is_product_page && function_exists( 'sociality' );

        if ( ! $is_cart_page && ! $is_checkout_page ) {
            get_template_part( '/template-parts/content-wrap-start' );
        }

        ?>
        <div class="nk-shop-header">
            <?php if ( $show_title ) : ?>
                <header class="woocommerce-products-header">
                    <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                </header>
                <?php add_filter( 'woocommerce_show_page_title', '__return_false' ); ?>
            <?php endif; ?>

            <?php if ( $show_back_to_shop_button ) : ?>
                <a href="<?php echo esc_url( $shop_page_url ); ?>" class="nk-shop-header-back"><span class="nk-icon-arrow-left"></span> <?php echo esc_html__( 'Back to Shop', 'skylith' ); ?></a>
            <?php endif; ?>

            <?php if ( $show_layout_buttons ) : ?>
                <a href="<?php echo esc_url( '#' ); ?>" class="nk-shop-layout-toggle<?php echo ( 1 === $archive_columns ? ' active' : '' ); ?>" data-cols="1"><span class="nk-icon-layout-1"></span></a>
                <a href="<?php echo esc_url( '#' ); ?>" class="nk-shop-layout-toggle<?php echo ( 2 === $archive_columns ? ' active' : '' ); ?>" data-cols="2"><span class="nk-icon-layout-2"></span></a>
                <?php if ( $archive_columns > 2 ) : ?>
                    <a href="<?php echo esc_url( '#' ); ?>" class="nk-shop-layout-toggle active" data-cols="<?php echo esc_attr( $archive_columns ); ?>"><span class="nk-icon-layout-3"></span></a>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ( $show_filters ) : ?>
                <a href="<?php echo esc_url( '#' ); ?>" class="nk-shop-filter-toggle">
                    <span><?php echo esc_html__( 'Filter', 'skylith' ); ?></span>
                    <span><?php echo esc_html__( 'Hide Filter', 'skylith' ); ?></span>
                </a>
            <?php endif; ?>

            <?php if ( $show_share_buttons ) : ?>
                <span class="nk-shop-header-share">
                    <?php echo esc_html__( 'Share This', 'skylith' ); ?>
                    <?php
                    // phpcs:ignore
                    do_action( 'sociality-sharing' );
                    ?>
                </span>
            <?php endif; ?>

            <a href="<?php echo esc_url( $cart_url ); ?>" class="nk-shop-cart-toggle">
                <span class="pe-7s-shopbag"></span>
                <span class="nk-badge d-none skylith-woocommerce-cart-count"></span>
            </a>
        </div>
        <?php if ( $show_filters ) : ?>
            <div class="nk-shop-filter">
                <div class="row vertical-gap">
                    <?php dynamic_sidebar( 'sidebar-woocommerce-filters' ); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
    }
}
if ( ! function_exists( 'skylith_woocommerce_wrapper_end' ) ) {
    /**
     * Wrapper End
     */
    function skylith_woocommerce_wrapper_end() {
        $is_cart_page     = is_cart();
        $is_checkout_page = is_checkout();

        if ( ! $is_cart_page && ! $is_checkout_page ) {
            get_template_part( '/template-parts/content-wrap-end' );
        }
    }
}
// Remove default wrappers.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );

// Add custom theme wrappers.
add_action( 'woocommerce_before_main_content', 'skylith_woocommerce_wrapper_start' );
add_action( 'woocommerce_before_cart', 'skylith_woocommerce_wrapper_start', 9 );
add_action( 'woocommerce_before_checkout_form', 'skylith_woocommerce_wrapper_start', 9 );

add_action( 'woocommerce_after_main_content', 'skylith_woocommerce_wrapper_end' );
add_action( 'woocommerce_after_cart', 'skylith_woocommerce_wrapper_end', 11 );
add_action( 'woocommerce_after_checkout_form', 'skylith_woocommerce_wrapper_end', 11 );

if ( ! function_exists( 'skylith_wp_footer_cart' ) ) {
    /**
     * Add cart.
     */
    function skylith_wp_footer_cart() {
        ?>
        <div class="nk-shop-cart">
            <div class="nk-shop-cart-content">
                <div class="nk-shop-cart-content-header">
                    <?php
                    // translators: %s - cart count.
                    echo wp_kses_post( sprintf( esc_html__( 'Items in Your Cart: %s', 'skylith' ), '<span class="d-none skylith-woocommerce-cart-count"></span>' ) );
                    ?>
                    <span class="nk-shop-cart-close"><span class="pe-7s-close"></span></span>
                </div>
                <div class="nk-shop-cart-content-items">
                    <div class="widget_shopping_cart_content"></div>
                </div>
            </div>
        </div>
        <?php
    }
}
add_filter( 'wp_footer', 'skylith_wp_footer_cart' );

if ( ! function_exists( 'skylith_woocommerce_after_mini_cart' ) ) {
    /**
     * Add cart.
     */
    function skylith_woocommerce_after_mini_cart() {
        $cart_count = WC()->cart->get_cart_contents_count();
        ?>
        <div data-skylith-cart-count="<?php echo esc_attr( $cart_count ); ?>"></div>
        <?php
    }
}
add_filter( 'woocommerce_after_mini_cart', 'skylith_woocommerce_after_mini_cart' );

if ( ! function_exists( 'skylith_theme_mod_woocommerce_boxed' ) ) {
    /**
     * Replace Option
     */
    function skylith_theme_mod_woocommerce_boxed() {
        return 'normal';
    }
}
add_filter( 'theme_mod_woocommerce_boxed', 'skylith_theme_mod_woocommerce_boxed' );

if ( ! function_exists( 'skylith_theme_mod_woocommerce_boxed' ) ) {
    /**
     * Replace Option
     */
    function skylith_theme_mod_woocommerce_boxed() {
        return 'normal';
    }
}
add_filter( 'theme_mod_woocommerce_boxed', 'skylith_theme_mod_woocommerce_boxed' );

if ( ! function_exists( 'skylith_disable_woocommerce_actions' ) ) {
    /**
     * Remove WooCommerce actions
     */
    function skylith_disable_woocommerce_actions() {
        // Remove sidebar.
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

        // Remove breadcrumbs.
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

        // Remove the sorting dropdown.
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

        // Remove the result count.
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    }
}
add_action( 'init', 'skylith_disable_woocommerce_actions' );

if ( ! function_exists( 'skylith_woocommerce_sale_flash' ) ) {
    /**
     * Replace sale badge.
     *
     * @param string $html - current badge string.
     * @param object $post - post data.
     * @param object $product - product data.
     * @return string
     */
    function skylith_woocommerce_sale_flash( $html, $post, $product ) {
        $percentage = '';

        if ( $product->is_type( 'variable' ) ) {
            $percentages = array();

            // Get all variation prices.
            $prices = $product->get_variation_prices();

            // Loop through variation prices.
            foreach ( $prices['price'] as $key => $price ) {
                // Only on sale variations.
                if ( $prices['regular_price'][ $key ] && $price && $prices['regular_price'][ $key ] !== $price ) {
                    // Calculate and set in the array the percentage for each variation on sale.
                    $percentages[] = round( 100 - ( $prices['sale_price'][ $key ] / $prices['regular_price'][ $key ] * 100 ) );
                }
            }
            // We keep the highest value.
            $percentage = max( $percentages ) . '%';
        } else {
            $regular_price = (float) $product->get_regular_price();
            $sale_price    = (float) $product->get_sale_price();

            if ( $regular_price && $sale_price && $regular_price !== $sale_price ) {
                $percentage = round( 100 - ( $sale_price / $regular_price * 100 ) ) . '%';
            }
        }

        if ( $percentage ) {
            // translators: %s - percent.
            return '<span class="onsale">' . sprintf( esc_html__( 'Sale %s', 'skylith' ), $percentage ) . '</span>';
        } else {
            return '<span class="onsale">' . esc_html__( 'Sale!', 'skylith' ) . '</span>';
        }
    }
}
add_filter( 'woocommerce_sale_flash', 'skylith_woocommerce_sale_flash', 20, 3 );

if ( ! function_exists( 'skylith_woocommerce_after_shop_loop_item_start' ) ) {
    /**
     * Add wrapper and price to archive product button.
     */
    function skylith_woocommerce_after_shop_loop_item_start() {
        global $product;
        $price_html = $product->get_price_html()
        ?>
        <div class="skylith-woocommerce-loop-button-wrap">

            <?php if ( $price_html ) : ?>
                <span class="price"><?php echo wp_kses_post( $price_html ); ?></span>
            <?php endif; ?>
        <?php
    }
}
add_filter( 'woocommerce_after_shop_loop_item', 'skylith_woocommerce_after_shop_loop_item_start', 9 );

if ( ! function_exists( 'skylith_woocommerce_after_shop_loop_item_end' ) ) {
    /**
     * Add wrapper and price to archive product button.
     */
    function skylith_woocommerce_after_shop_loop_item_end() {
        ?>
        </div>
        <?php
    }
}
add_filter( 'woocommerce_after_shop_loop_item', 'skylith_woocommerce_after_shop_loop_item_end', 11 );

if ( ! function_exists( 'skylith_woocommerce_before_template_part' ) ) {
    /**
     * Add wrapper to single product description.
     *
     * @param String $template_name - template name.
     * @param String $template_path - template path.
     * @param String $located - located.
     * @param Array  $args - arguments.
     */
    function skylith_woocommerce_before_template_part( $template_name, $template_path, $located, $args ) {
        switch ( $template_name ) {
            case 'single-product/tabs/tabs.php':
                ?>
                <div class="clear"></div>
                <div class="nk-gap-1"></div>

                <?php
                $tabs = apply_filters( 'woocommerce_product_tabs', array() );
                if ( ! empty( $tabs ) ) {
                    ?>
                    <div class="nk-divider nk-divider-color-gray-6 alignfull"></div>
                    <div class="nk-gap-3"></div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                    <?php
                }
                break;
            case 'single-product/related.php':
                if ( $args['related_products'] ) {
                    ?>
                    <div class="nk-divider nk-divider-color-gray-6 alignfull"></div>
                    <div class="nk-gap-3"></div>
                    <?php
                }
                break;
            case 'single-product/up-sells.php':
                if ( $args['upsells'] ) {
                    ?>
                    <div class="nk-divider nk-divider-color-gray-6 alignfull"></div>
                    <div class="nk-gap-3"></div>
                    <?php
                }
                break;
            case 'cart/cart-empty.php':
            case 'checkout/thankyou.php':
            case 'myaccount/my-account.php':
                skylith_woocommerce_wrapper_start();
                break;
        }
    }
}
add_filter( 'woocommerce_before_template_part', 'skylith_woocommerce_before_template_part', 10, 4 );

if ( ! function_exists( 'skylith_woocommerce_after_template_part' ) ) {
    /**
     * Add wrapper to single product description.
     *
     * @param String $template_name - template name.
     * @param String $template_path - template path.
     * @param String $located - located.
     * @param Array  $args - arguments.
     */
    function skylith_woocommerce_after_template_part( $template_name, $template_path, $located, $args ) {
        switch ( $template_name ) {
            case 'single-product/tabs/tabs.php':
                $tabs = apply_filters( 'woocommerce_product_tabs', array() );
                if ( ! empty( $tabs ) ) {
                    ?>
                        </div>
                    </div>
                    <div class="nk-gap-3"></div>
                    <?php
                }
                break;
            case 'single-product/related.php':
                if ( $args['related_products'] ) {
                    ?>
                    <div class="nk-gap-1"></div>
                    <?php
                }
                break;
            case 'single-product/related.php':
                if ( $args['related_products'] ) {
                    ?>
                    <div class="nk-gap-1"></div>
                    <?php
                }
                break;
            case 'cart/cart-empty.php':
            case 'checkout/thankyou.php':
            case 'myaccount/my-account.php':
                skylith_woocommerce_wrapper_end();
                break;
        }
    }
}
add_filter( 'woocommerce_after_template_part', 'skylith_woocommerce_after_template_part', 10, 4 );

if ( ! function_exists( 'skylith_woocommerce_product_review_comment_form_args' ) ) {
    /**
     * Review form args.
     *
     * @param Array $args - review form args.
     * @return Array
     */
    function skylith_woocommerce_product_review_comment_form_args( $args ) {
        $args['label_submit'] = esc_html__( 'Add a Review', 'skylith' );
        return $args;
    }
}
add_filter( 'woocommerce_product_review_comment_form_args', 'skylith_woocommerce_product_review_comment_form_args' );

if ( ! function_exists( 'skylith_woocommerce_after_cart_item_name' ) ) {
    /**
     * Cart add item star rating.
     *
     * @param Array $cart_item - item data.
     */
    function skylith_woocommerce_after_cart_item_name( $cart_item ) {
        global $product;

        if ( ! isset( $cart_item['product_id'] ) ) {
            return;
        }

        $old_product = $product;
        $product     = wc_get_product( $cart_item['product_id'] );

        woocommerce_template_single_rating();

        $product = $old_product;
    }
}
add_action( 'woocommerce_after_cart_item_name', 'skylith_woocommerce_after_cart_item_name' );

if ( ! function_exists( 'skylith_woocommerce_gallery_thumbnail_size' ) ) {
    /**
     * Gallery thumbnail size.
     *
     * @param Array $size - thumb size.
     * @return Array
     */
    function skylith_woocommerce_gallery_thumbnail_size( $size ) {
        if ( is_array( $size ) && $size[0] < 200 ) {
            $size = array( 200, 200 );
        }
        return $size;
    }
}
add_filter( 'woocommerce_gallery_thumbnail_size', 'skylith_woocommerce_gallery_thumbnail_size' );
