<?php
/**
 * Fonts for typography PRO component
 *
 * @package ghostkit-pro
 */

/**
 * Class GhostKit_PRO_Fonts
 */
class GhostKit_PRO_Fonts {
    /**
     * GhostKit_Fonts constructor.
     */
    public function __construct() {
        add_filter( 'gkt_fonts_list', array( $this, 'add_adobe_fonts' ) );
        // enqueue fonts.
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_all_fonts_assets' ), 15 );
        add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_all_fonts_assets' ), 15 );
    }

    /**
     * Enqueue frontend & editor assets
     */
    public function enqueue_all_fonts_assets() {
        if ( wp_script_is( 'webfontloader' ) ) {
            wp_enqueue_script( 'ghostkit-pro-fonts-loader', ghostkit_pro()->plugin_url . 'assets/js/fonts-loader.min.js', array( 'webfontloader' ), '1.4.0', true );
            wp_localize_script( 'ghostkit-pro-fonts-loader', 'ghostkitAdobeProjectKey', $this->add_adobe_project_key() );
        }
    }

    /**
     * Add Adobe fonts list.
     *
     * @param array $fonts - fonts list.
     *
     * @return array
     */
    public function add_adobe_fonts( $fonts ) {
        $unstructed_adobe_fonts = get_option( 'ghostkit_fonts_settings', array() );
        $adobe_fonts            = array();
        if ( isset( $unstructed_adobe_fonts ) && is_array( $unstructed_adobe_fonts ) && ! empty( $unstructed_adobe_fonts ) ) {
            $unstructed_adobe_fonts = json_decode( $unstructed_adobe_fonts['ghostkit_fonts_settings'], true );

            if ( isset( $unstructed_adobe_fonts['fonts'] ) &&
                is_array( $unstructed_adobe_fonts['fonts'] ) ) {
                foreach ( $unstructed_adobe_fonts['fonts']['families'] as $family ) {
                    $widths = array();

                    foreach ( $family['variations'] as $variation ) {
                        if ( false !== strripos( $variation, 'i' ) ) {
                            $widths[] = str_replace( 'i', '', $variation ) . '00i';
                        }
                        if ( false !== strripos( $variation, 'n' ) ) {
                            $widths[] = str_replace( 'n', '', $variation ) . '00';
                        }
                    }

                    $category = 'sans-serif';
                    if ( isset( $family['css_stack'] ) ) {
                        $category = substr( $category, strrpos( $category, ',' ) + 1 );
                    }

                    $adobe_fonts[] = array(
                        'label'       => $family['name'],
                        'name'        => $family['slug'],
                        'widths'      => $widths,
                        'category'    => $category,
                        'subsets'     => array(
                            $family['subset'],
                        ),
                    );
                }
            }
        }

        $fonts['adobe-fonts'] =
            array(
                'name'  => __( 'Adobe Fonts', 'ghostkit-pro' ),
                'fonts' => $adobe_fonts,
            );

        return $fonts;
    }

    /**
     * Add adobe project key for webfontloader script.
     *
     * @return mixed
     */
    public function add_adobe_project_key() {
        $unstructed_adobe_fonts = get_option( 'ghostkit_fonts_settings', array() );
        $project_key            = null;
        if ( isset( $unstructed_adobe_fonts ) && is_array( $unstructed_adobe_fonts ) && ! empty( $unstructed_adobe_fonts ) ) {
            $unstructed_adobe_fonts = json_decode( $unstructed_adobe_fonts['ghostkit_fonts_settings'], true );

            if ( isset( $unstructed_adobe_fonts['kit'] ) &&
                ! empty( $unstructed_adobe_fonts['kit'] ) ) {
                $project_key = $unstructed_adobe_fonts['kit'];
            }
        }
        return $project_key;
    }
}
new GhostKit_PRO_Fonts();
