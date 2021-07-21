<?php
/**
 * Custom functions for extending GhostKit functionality.
 *
 * @package skylith
 */

/**
 * Variants for Icon Box
 *
 * @param array $variants - icon box variants.
 * @return array
 */
function skylith_icon_box_variants( $variants ) {
    return array_merge(
        $variants,
        array(
            'skylith-alt-1' => array(
                'title' => esc_html__( 'Skylith 1', 'skylith' ),
            ),
            'skylith-alt-1-dark' => array(
                'title' => esc_html__( 'Skylith 1 Dark', 'skylith' ),
            ),
            'skylith-alt-2' => array(
                'title' => esc_html__( 'Skylith 2', 'skylith' ),
            ),
        )
    );
}
add_filter( 'gkt_icon_box_variants', 'skylith_icon_box_variants' );

/**
 * Variants for Button
 *
 * @param array $variants - button variants.
 * @return array
 */
function skylith_button_variants( $variants ) {
    return array_merge(
        $variants,
        array(
            'skylith-alt-1' => array(
                'title' => esc_html__( 'Skylith 1 (large, no background)', 'skylith' ),
            ),
        )
    );
}
add_filter( 'gkt_button_variants', 'skylith_button_variants' );

/**
 * Variants for Video
 *
 * @param array $variants - video variants.
 * @return array
 */
function skylith_video_variants( $variants ) {
    return array_merge(
        $variants,
        array(
            'skylith-alt-1' => array(
                'title' => esc_html__( 'Skylith 1 (Fullscreen video only)', 'skylith' ),
            ),
            'skylith-alt-2' => array(
                'title' => esc_html__( 'Skylith 2 (Fullscreen video only)', 'skylith' ),
            ),
            'skylith-alt-2-white' => array(
                'title' => esc_html__( 'Skylith 2 White (Fullscreen video only)', 'skylith' ),
            ),
        )
    );
}
add_filter( 'gkt_video_variants', 'skylith_video_variants' );

/**
 * Variants for Tabs
 *
 * @param array $variants - tabs variants.
 * @return array
 */
function skylith_tabs_variants( $variants ) {
    return array_merge(
        $variants,
        array(
            'skylith-alt-1' => array(
                'title' => esc_html__( 'Skylith 1', 'skylith' ),
            ),
        )
    );
}
add_filter( 'gkt_tabs_variants', 'skylith_tabs_variants' );

/**
 * Variants for Twitter
 *
 * @param array $variants - twitter variants.
 * @return array
 */
function skylith_twitter_variants( $variants ) {
    return array_merge(
        $variants,
        array(
            'skylith-alt-1' => array(
                'title' => esc_html__( 'Skylith 1', 'skylith' ),
            ),
        )
    );
}
add_filter( 'gkt_twitter_variants', 'skylith_twitter_variants' );

/**
 * Variants for Testimonials
 *
 * @param array $variants - testimonial variants.
 * @return array
 */
function skylith_testimonial_variants( $variants ) {
    return array_merge(
        $variants,
        array(
            'skylith-alt-1' => array(
                'title' => esc_html__( 'Skylith 1', 'skylith' ),
            ),
        )
    );
}
add_filter( 'gkt_testimonial_variants', 'skylith_testimonial_variants' );

/**
 * Variants for Pricing Table
 *
 * @param array $variants - pricing table variants.
 * @return array
 */
function skylith_pricing_table_variants( $variants ) {
    return array_merge(
        $variants,
        array(
            'skylith-alt-1' => array(
                'title' => esc_html__( 'Skylith 1', 'skylith' ),
            ),
        )
    );
}
add_filter( 'gkt_pricing_table_variants', 'skylith_pricing_table_variants' );
