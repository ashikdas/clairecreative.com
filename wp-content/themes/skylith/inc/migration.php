<?php // phpcs:ignore
/**
 * Code for migrating from theme versions.
 *
 * @package skylith
 */

/**
 * Class Skylith_Migration
 */
class Skylith_Migration {
    /**
     * The version.
     *
     * @var string
     */
    protected $version = '1.3.3';

    /**
     * Initial version.
     *
     * @var string
     */
    protected $initial_version = '';

    /**
     * The theme version as stored in the db.
     *
     * @var string
     */
    protected $db_version;

    /**
     * Skylith_Migration constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
    }

    /**
     * Init
     */
    public function init() {
        $this->get_versions();
        $this->run_migrations();
        $this->update_version();
    }

    /**
     * Get theme version to work with
     */
    protected function get_versions() {
        // Add initial version so we know the first time a user activated the theme.
        if ( ! get_option( 'nk_theme_skylith_initial_version' ) ) {
            update_option( 'nk_theme_skylith_initial_version', $this->version );
        }
        $this->initial_version = get_option( 'nk_theme_skylith_initial_version' );

        // Get user theme version.
        $this->db_version = get_option( 'nk_theme_skylith_version' );

        // Version is required and was added in v1.1.4.
        $this->db_version = $this->db_version ? $this->db_version : '1.1.4';
    }

    /**
     * Run migration process
     */
    protected function run_migrations() {
        /**
         * UPDATE: 1.2.0
         */
        if (
            version_compare( '1.2.0', $this->db_version, '>=' ) &&
            version_compare( '1.2.0', $this->initial_version, '>=' )
        ) {
            $old_typography = array(
                'typography_main_body'       => get_theme_mod( 'typography_main_body' ),
                'typography_html'            => get_theme_mod( 'typography_html' ),
                'typography_titles'          => get_theme_mod( 'typography_titles' ),
                'typography_additional'      => get_theme_mod( 'typography_additional' ),
                'typography_blockquote'      => get_theme_mod( 'typography_blockquote' ),
                'typography_titles_h1'       => get_theme_mod( 'typography_titles_h1' ),
                'typography_titles_h2'       => get_theme_mod( 'typography_titles_h2' ),
                'typography_titles_h3'       => get_theme_mod( 'typography_titles_h3' ),
                'typography_titles_h4'       => get_theme_mod( 'typography_titles_h4' ),
                'typography_titles_h5'       => get_theme_mod( 'typography_titles_h5' ),
                'typography_titles_h6'       => get_theme_mod( 'typography_titles_h6' ),
                'typography_titles_display1' => get_theme_mod( 'typography_titles_display1' ),
                'typography_titles_display2' => get_theme_mod( 'typography_titles_display2' ),
                'typography_titles_display3' => get_theme_mod( 'typography_titles_display3' ),
                'typography_titles_display4' => get_theme_mod( 'typography_titles_display4' ),
            );
            $new_typography = array();

            // Find old options and convert it to new options.
            foreach ( $old_typography as $name => $val ) {
                if ( ! $val ) {
                    continue;
                }

                if ( isset( $val['variant'] ) ) {
                    if ( 'italic' === $val['variant'] ) {
                        $val['variant'] = '400i';
                    }
                    if ( 'regular' === $val['variant'] ) {
                        $val['variant'] = '400';
                    }
                }

                switch ( $name ) {
                    case 'typography_main_body':
                        $new_typography['body'] = array(
                            'fontFamilyCategory' => 'google-fonts',
                            'fontFamily'         => $val['font-family'],
                            'lineHeight'         => $val['line-height'],
                        );

                        $new_typography['buttons'] = $new_typography['body'];
                        break;
                    case 'typography_html':
                        $new_typography['html'] = array(
                            'fontSize' => $val['font-size'],
                        );
                        break;
                    case 'typography_titles':
                        $new_typography['headings'] = array(
                            'fontFamilyCategory' => 'google-fonts',
                            'fontFamily'         => $val['font-family'],
                            'fontWeight'         => $val['variant'],
                        );
                        break;
                    case 'typography_additional':
                        $new_typography['additional_items'] = array(
                            'fontFamilyCategory' => 'google-fonts',
                            'fontFamily'         => $val['font-family'],
                            'fontWeight'         => $val['variant'],
                        );
                        break;
                    case 'typography_blockquote':
                        $new_typography['blockquotes'] = array(
                            'fontFamilyCategory' => 'google-fonts',
                            'fontFamily'         => $val['font-family'],
                            'fontWeight'         => $val['variant'],
                        );
                        break;
                    case 'typography_titles_h1':
                        $new_typography['h1'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_h2':
                        $new_typography['h2'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_h3':
                        $new_typography['h3'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_h4':
                        $new_typography['h4'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_h5':
                        $new_typography['h5'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_h6':
                        $new_typography['h6'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_display1':
                        $new_typography['display_1'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_display2':
                        $new_typography['display_2'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_display3':
                        $new_typography['display_3'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                    case 'typography_titles_display4':
                        $new_typography['display_4'] = array(
                            'fontSize' => $val . 'px',
                        );
                        break;
                }
            }

            // Update Ghost Kit options.
            if ( is_array( $new_typography ) && ! empty( $new_typography ) ) {
                $current_typography = get_option( 'ghostkit_typography', array() );
                $updated_option     = array();

                if ( empty( $current_typography ) ) {
                    $updated_option = $new_typography;
                } else {
                    $updated_option = array_merge(
                        json_decode( $current_typography['ghostkit_typography'], true ),
                        $new_typography
                    );
                }

                if ( ! empty( $updated_option ) ) {
                    update_option(
                        'ghostkit_typography',
                        array(
                            'ghostkit_typography' => wp_json_encode( $updated_option ),
                        )
                    );
                }
            }

            // Remove old theme mods.
            foreach ( $old_typography as $name => $val ) {
                if ( $val ) {
                    remove_theme_mod( $name );
                }
            }
        }
    }

    /**
     * Update theme version in DB.
     */
    protected function update_version() {
        // Do not update the version in the db
        // if the current version is greater than the one we're updating to.
        if ( version_compare( $this->version, $this->db_version, '<=' ) ) {
            return;
        }

        update_option( 'nk_theme_skylith_version', $this->version );
    }
}
new Skylith_Migration();
