<?php
/**
 * Rest API functions
 *
 * @package ghostkit-pro
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class GhostKit_Rest_Pro
 */
class GhostKit_Rest_Pro extends WP_REST_Controller {
    /**
     * Namespace.
     *
     * @var string
     */
    protected $namespace = 'ghostkit/v';

    /**
     * Version.
     *
     * @var string
     */
    protected $version = '1';

    /**
     * GhostKit_Rest constructor.
     */
    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }

    /**
     * Register rest routes.
     */
    public function register_routes() {
        $namespace = $this->namespace . $this->version;

        // Get Custom Fonts.
        register_rest_route(
            $namespace,
            '/get_custom_fonts/',
            array(
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => array( $this, 'get_custom_fonts' ),
                'permission_callback' => array( $this, 'get_custom_fonts_permission' ),
            )
        );

        // Get Typekit.
        register_rest_route(
            $namespace,
            '/get_typekit/',
            array(
                'methods'             => WP_REST_Server::EDITABLE,
                'callback'            => array( $this, 'get_typekit' ),
                'permission_callback' => array( $this, 'get_typekit_permission' ),
            )
        );

        // Update Custom Fonts.
        register_rest_route(
            $namespace,
            '/update_custom_fonts/',
            array(
                'methods'             => WP_REST_Server::EDITABLE,
                'callback'            => array( $this, 'update_custom_fonts' ),
                'permission_callback' => array( $this, 'update_custom_fonts_permission' ),
            )
        );
    }

    /**
     * Get read fonts permissions.
     *
     * @return bool
     */
    public function get_custom_fonts_permission() {
        if ( ! current_user_can( 'edit_theme_options' ) ) {
            return $this->error( 'user_dont_have_permission', __( 'User don\'t have permissions to change options.', 'ghostkit-pro' ) );
        }
        return true;
    }

    /**
     * Get read typekit permissions.
     *
     * @return bool
     */
    public function get_typekit_permission() {
        if ( ! current_user_can( 'edit_theme_options' ) ) {
            return $this->error( 'user_dont_have_permission', __( 'User don\'t have permissions to change options.', 'ghostkit-pro' ) );
        }
        return true;
    }

    /**
     * Get edit fonts permissions.
     *
     * @return bool
     */
    public function update_custom_fonts_permission() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return $this->error( 'user_dont_have_permission', __( 'User don\'t have permissions to change options.', 'ghostkit-pro' ) );
        }
        return true;
    }

    /**
     * Get custom fonts.
     *
     * @return mixed
     */
    public function get_custom_fonts() {
        $fonts = get_option( 'ghostkit_fonts_settings', array() );

        $data = json_decode( $fonts['ghostkit_fonts_settings'], true );

        if ( ! isset( $data['token'] ) || empty( $data['token'] ) ) {
            $data['token'] = '';
        }

        $fonts['ghostkit_fonts_settings'] = wp_json_encode( $data );

        if ( is_array( $fonts ) ) {
            return $this->success( $fonts );
        } else {
            return $this->error( 'no_fonts', __( 'Typography not found.', 'ghostkit-pro' ) );
        }
    }

    /**
     * Update fonts.
     *
     * @param WP_REST_Request $request  request object.
     *
     * @return mixed
     */
    public function update_custom_fonts( WP_REST_Request $request ) {
        $new_fonts      = $request->get_param( 'data' );
        $updated_option = array();

        $data = json_decode( $new_fonts['ghostkit_fonts_settings'], true );

        if ( isset( $data ) && ! empty( $data ) && is_array( $data ) ) {
            if ( isset( $data['token'] ) && ! empty( $data['token'] ) ) {

                $typekit = new GhostKit_Typekit_Api();

                $data['errors'] = false;
                $data['fonts']  = null;
                $data['kits']   = array();

                $typekit_data = $typekit->get( null, $data['token'], false );

                if ( isset( $typekit_data['errors'] ) ) {
                    $data['errors'] = $typekit_data['errors'];
                    $data['kits']   = false;
                    $data['kit']    = null;
                }

                if ( isset( $typekit_data['kits'] ) ) {
                    foreach ( $typekit_data['kits'] as $current_kit ) {
                        $kit_data       = $typekit->get( $current_kit['id'], $data['token'] );
                        $data['kits'][] = array(
                            'value' => $current_kit['id'],
                            'label' => $kit_data['kit']['name'],
                        );
                    }
                }

                if ( isset( $data['kit'] ) && ! empty( $data['kit'] ) ) {
                    $typekit_data = $typekit->get( $data['kit'], $data['token'], false );

                    if ( isset( $typekit_data['kit'] ) ) {
                        $data['fonts'] = $typekit_data['kit'];
                    }
                }
            } else {
                $data['token'] = '';
                $data['fonts'] = null;
                $data['kit']   = null;
                $data['kits']  = false;
            }
        }

        $new_fonts['ghostkit_fonts_settings'] = wp_json_encode( $data );

        if ( is_array( $new_fonts ) ) {
            $current_fonts = get_option( 'ghostkit_fonts_settings', array() );

            if ( empty( $current_fonts ) ) {
                $updated_option = $new_fonts;
            } else {
                $current_fonts['ghostkit_fonts_settings'] = json_decode( $current_fonts['ghostkit_fonts_settings'], true );
                $new_fonts['ghostkit_fonts_settings']     = json_decode( $new_fonts['ghostkit_fonts_settings'], true );

                $updated_option = array_merge( $current_fonts, $new_fonts );

                $updated_option['ghostkit_fonts_settings'] = wp_json_encode( $updated_option['ghostkit_fonts_settings'] );
            }

            update_option( 'ghostkit_fonts_settings', $updated_option );
        }

        return $this->success( $updated_option );
    }

    /**
     * Get Typekit fonts.
     *
     * @param WP_REST_Request $request  request object.
     * @return mixed
     */
    public function get_typekit( WP_REST_Request $request ) {
        $data = $request->get_param( 'data' );

        if ( isset( $data ) && ! empty( $data ) && is_array( $data ) ) {
            if ( isset( $data['token'] ) && ! empty( $data['token'] ) ) {

                $typekit = new GhostKit_Typekit_Api();

                $data['errors'] = false;
                $data['fonts']  = null;
                $data['kits']   = array();

                $typekit_data = $typekit->get( null, $data['token'], false );

                if ( isset( $typekit_data['errors'] ) ) {
                    $data['errors'] = $typekit_data['errors'];
                    $data['kits']   = false;
                    $data['kit']    = null;
                }

                if ( isset( $typekit_data['kits'] ) ) {
                    foreach ( $typekit_data['kits'] as $current_kit ) {
                        $kit_data       = $typekit->get( $current_kit['id'], $data['token'] );
                        $data['kits'][] = array(
                            'value' => $current_kit['id'],
                            'label' => $kit_data['kit']['name'],
                        );
                    }
                }

                if ( isset( $data['kit'] ) && ! empty( $data['kit'] ) ) {
                    $typekit_data = $typekit->get( $data['kit'], $data['token'] );

                    if ( isset( $typekit_data['kit'] ) ) {
                        $data['fonts'] = $typekit_data['kit'];
                    }
                }
            } else {
                $data['token'] = '';
                $data['fonts'] = null;
                $data['kit']   = null;
                $data['kits']  = false;
            }
        }

        return $this->success( $data );
    }

    /**
     * Success rest.
     *
     * @param mixed $response response data.
     * @return mixed
     */
    public function success( $response ) {
        return new WP_REST_Response(
            array(
                'success'  => true,
                'response' => $response,
            ),
            200
        );
    }

    /**
     * Error rest.
     *
     * @param mixed $code     error code.
     * @param mixed $response response data.
     * @return mixed
     */
    public function error( $code, $response ) {
        return new WP_REST_Response(
            array(
                'error'      => true,
                'success'    => false,
                'error_code' => $code,
                'response'   => $response,
            ),
            401
        );
    }
}
new GhostKit_Rest_Pro();
