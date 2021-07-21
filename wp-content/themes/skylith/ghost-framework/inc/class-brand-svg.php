<?php
/**
 * Brand SVG Icon and Names
 * https://github.com/nk-o/brand-svg-please
 *
 * @package skylith/ghost
 */

/**
 * Ghost_Framework_Brand_Svg
 */
class Ghost_Framework_Brand_Svg {
    /**
     * Get the SVG string for a given icon.
     *
     * @param String $name - brand name.
     * @param Array  $data - svg icon data.
     *
     * @return String
     */
    public static function get( $name, $data = array() ) {
        $brand = self::find_brand( $name );

        if ( $brand ) {
            return self::get_svg_by_path( $brand['svg_path'], $data );
        }

        return null;
    }

    /**
     * Print the SVG string for a given icon.
     *
     * @param String $name - icon name.
     * @param Array  $data - svg icon data.
     */
    public static function get_e( $name, $data = array() ) {
        if ( self::exists( $name ) ) {
            echo wp_kses( self::get( $name, $data ), self::kses() );
        }
    }

    /**
     * Get the SVG string for a given icon.
     *
     * @param String $name - brand name.
     *
     * @return String
     */
    public static function get_name( $name ) {
        $brand = self::find_brand( $name );

        if ( $brand ) {
            return $brand['name'];
        }

        return null;
    }

    /**
     * Check if SVG icon exists.
     *
     * @param String $name - brand name.
     *
     * @return Boolean
     */
    public static function exists( $name ) {
        return ! ! self::find_brand( $name );
    }

    /**
     * Data for SVG useful in wp_kses function.
     *
     * @return Array
     */
    public static function kses() {
        return array(
            'svg'   => array(
                'class'           => true,
                'aria-hidden'     => true,
                'aria-labelledby' => true,
                'role'            => true,
                'focusable'       => true,
                'xmlns'           => true,
                'width'           => true,
                'height'          => true,
                'viewbox'         => true,
            ),
            'g'     => array(
                'fill' => true,
            ),
            'title' => array(
                'title' => true,
            ),
            'path'  => array(
                'd'         => true,
                'fill'      => true,
                'fill-rule' => true,
                'transform' => true,
            ),
            'polygon' => array(
                'fill'      => true,
                'fill-rule' => true,
                'points'    => true,
                'transform' => true,
                'focusable' => true,
            ),
        );
    }

    /**
     * Find brand data.
     *
     * @param String $name - brand name.
     *
     * @return Null|Array
     */
    private static function find_brand( $name ) {
        $result = null;
        $brands = self::get_all_brands();

        // Find by key.
        if ( isset( $brands[ $name ] ) ) {
            $result = $brands[ $name ];
        }

        // Find by alternative keys.
        if ( ! $result ) {
            foreach ( $brands as $brand ) {
                if ( ! $result && isset( $brand['keys'] ) && in_array( $name, $brand['keys'], true ) ) {
                    $result = $brand;
                }
            }
        }

        return $result;
    }

    /**
     * Get the SVG string for a given icon.
     *
     * @param String $path - icon path.
     * @param Array  $data - svg icon data.
     *
     * @return String
     */
    private static function get_svg_by_path( $path, $data = array() ) {
        $data = array_merge(
            array(
                'size'  => 24,
                'class' => 'bsp-icon',
            ),
            $data
        );

        if ( file_exists( $path ) ) {
            ob_start();
            include $path;
            $svg = ob_get_clean();

            // Add extra attributes to SVG code.
            // translators: %1$s - classname.
            // translators: %2$d - size.
            $repl = sprintf( '<svg class="%1$s" width="%2$d" height="%2$d" aria-hidden="true" role="img" focusable="false" ', $data['class'], $data['size'] );
            $svg  = preg_replace( '/^<svg /', $repl, trim( $svg ) );

            return $svg;
        }

        return null;
    }

    /**
     * Get all available brands.
     *
     * @param Boolean $get_svg - get SVG and insert it inside array.
     * @param Array   $svg_data - svg data.
     *
     * @return Array
     */
    public static function get_all_brands( $get_svg = false, $svg_data = array() ) {
        $brands = array(
            '500px'                     => esc_html__( '500px', 'skylith' ),
            'accusoft'                  => esc_html__( 'Accusoft', 'skylith' ),
            'acquisitions-incorporated' => esc_html__( 'Acquisitions Incorporated', 'skylith' ),
            'adn'                       => esc_html__( 'ADN', 'skylith' ),
            'adobe'                     => esc_html__( 'Adobe', 'skylith' ),
            'adversal'                  => esc_html__( 'Adversal', 'skylith' ),
            'airbnb'                    => esc_html__( 'Airbnb', 'skylith' ),
            'algolia'                   => esc_html__( 'Algolia', 'skylith' ),
            'alipay'                    => esc_html__( 'Alipay', 'skylith' ),
            'amazon-pay'                => esc_html__( 'Amazon Pay', 'skylith' ),
            'amazon'                    => esc_html__( 'Amazon', 'skylith' ),
            'amilia'                    => esc_html__( 'Amilia', 'skylith' ),
            'android'                   => esc_html__( 'Android', 'skylith' ),
            'angellist'                 => esc_html__( 'AngelList', 'skylith' ),
            'angrycreative'             => esc_html__( 'Angry Creative', 'skylith' ),
            'angular'                   => esc_html__( 'Angular', 'skylith' ),
            'app-store'                 => esc_html__( 'App Store', 'skylith' ),
            'apper'                     => esc_html__( 'Apper', 'skylith' ),
            'apple-pay'                 => esc_html__( 'Apple Pay', 'skylith' ),
            'apple'                     => esc_html__( 'Apple', 'skylith' ),
            'artstation'                => esc_html__( 'ArtStation', 'skylith' ),
            'asymmetrik'                => esc_html__( 'Asymmetrik', 'skylith' ),
            'atlassian'                 => esc_html__( 'Atlassian', 'skylith' ),
            'audible'                   => esc_html__( 'Audible', 'skylith' ),
            'autoprefixer'              => esc_html__( 'Autoprefixer', 'skylith' ),
            'avianex'                   => esc_html__( 'Avianex', 'skylith' ),
            'aviato'                    => esc_html__( 'Aviato', 'skylith' ),
            'bandcamp'                  => esc_html__( 'Bandcamp', 'skylith' ),
            'battle-net'                => esc_html__( 'Battle.net', 'skylith' ),
            'behance'                   => esc_html__( 'Behance', 'skylith' ),
            'bimobject'                 => esc_html__( 'BIMobject', 'skylith' ),
            'bitbucket'                 => esc_html__( 'Bitbucket', 'skylith' ),
            'bitcoin'                   => esc_html__( 'Bitcoin', 'skylith' ),
            'bity'                      => esc_html__( 'Bity', 'skylith' ),
            'black-tie'                 => esc_html__( 'Black Tie', 'skylith' ),
            'blackberry'                => esc_html__( 'BlackBerry', 'skylith' ),
            'blogger'                   => esc_html__( 'Blogger', 'skylith' ),
            'bluetooth'                 => esc_html__( 'Bluetooth', 'skylith' ),
            'bootstrap'                 => esc_html__( 'Bootstrap', 'skylith' ),
            'btc'                       => esc_html__( 'BTC', 'skylith' ),
            'buffer'                    => esc_html__( 'Buffer', 'skylith' ),
            'buromobelexperte'          => esc_html__( 'Büromöbel Experte', 'skylith' ),
            'buy-n-large'               => esc_html__( 'Buy n Large', 'skylith' ),
            'buysellads'                => esc_html__( 'BuySellAds', 'skylith' ),
            'canadian-maple-leaf'       => esc_html__( 'Canadian Gold Maple Leaf', 'skylith' ),
            'cc-amazon-pay'             => esc_html__( 'Amazon Pay', 'skylith' ),
            'cc-amex'                   => esc_html__( 'Amex', 'skylith' ),
            'cc-apple-pay'              => esc_html__( 'Apple Pay', 'skylith' ),
            'cc-diners-club'            => esc_html__( 'Diners Club', 'skylith' ),
            'cc-discover'               => esc_html__( 'Discover', 'skylith' ),
            'cc-jcb'                    => esc_html__( 'JCB', 'skylith' ),
            'cc-mastercard'             => esc_html__( 'Mastercard', 'skylith' ),
            'cc-paypal'                 => esc_html__( 'PayPal', 'skylith' ),
            'cc-stripe'                 => esc_html__( 'Stripe', 'skylith' ),
            'cc-visa'                   => esc_html__( 'Visa', 'skylith' ),
            'centercode'                => esc_html__( 'Centercode', 'skylith' ),
            'centos'                    => esc_html__( 'CentOS', 'skylith' ),
            'chrome'                    => esc_html__( 'Chrome', 'skylith' ),
            'chromecast'                => esc_html__( 'Chromecast', 'skylith' ),
            'cloudscale'                => esc_html__( 'CloudScale', 'skylith' ),
            'cloudsmith'                => esc_html__( 'Cloudsmith', 'skylith' ),
            'cloudversify'              => esc_html__( 'Cloudversify', 'skylith' ),
            'codepen'                   => esc_html__( 'CodePen', 'skylith' ),
            'codiepie'                  => esc_html__( 'CodiePie', 'skylith' ),
            'confluence'                => esc_html__( 'Confluence', 'skylith' ),
            'connectdevelop'            => esc_html__( 'Connect Develop', 'skylith' ),
            'contao'                    => esc_html__( 'Contao', 'skylith' ),
            'cotton-bureau'             => esc_html__( 'Cotton Bureau', 'skylith' ),
            'cpanel'                    => esc_html__( 'cPanel', 'skylith' ),
            'critical-role'             => esc_html__( 'Critical Role', 'skylith' ),
            'css3'                      => esc_html__( 'CSS3', 'skylith' ),
            'cuttlefish'                => esc_html__( 'Cuttlefish', 'skylith' ),
            'd-and-d-beyond'            => esc_html__( 'D&D Beyond', 'skylith' ),
            'd-and-d'                   => esc_html__( 'D&D', 'skylith' ),
            'dailymotion'               => esc_html__( 'Dailymotion', 'skylith' ),
            'dashcube'                  => esc_html__( 'Dashcube', 'skylith' ),
            'delicious'                 => esc_html__( 'Delicious', 'skylith' ),
            'deploydog'                 => array(
                'name' => esc_html__( 'deploy.dog', 'skylith' ),
                'kays' => array( 'dd' ),
            ),
            'deskpro'                   => esc_html__( 'Deskpro', 'skylith' ),
            'dev'                       => esc_html__( 'Dev', 'skylith' ),
            'deviantart'                => esc_html__( 'DeviantArt', 'skylith' ),
            'dhl'                       => esc_html__( 'DHL', 'skylith' ),
            'diaspora'                  => esc_html__( 'Diaspora', 'skylith' ),
            'digg'                      => esc_html__( 'Digg', 'skylith' ),
            'digital-ocean'             => esc_html__( 'Digital Ocean', 'skylith' ),
            'discord'                   => esc_html__( 'Discord', 'skylith' ),
            'discourse'                 => esc_html__( 'Discourse', 'skylith' ),
            'dochub'                    => esc_html__( 'DocHub', 'skylith' ),
            'docker'                    => esc_html__( 'Docker', 'skylith' ),
            'draft2digital'             => esc_html__( 'Draft2Digital', 'skylith' ),
            'dribbble'                  => esc_html__( 'Dribbble', 'skylith' ),
            'dropbox'                   => esc_html__( 'Dropbox', 'skylith' ),
            'drupal'                    => esc_html__( 'Drupal', 'skylith' ),
            'dyalog'                    => esc_html__( 'Dyalog', 'skylith' ),
            'earlybirds'                => esc_html__( 'Earlybirds', 'skylith' ),
            'ebay'                      => esc_html__( 'eBay', 'skylith' ),
            'edge'                      => esc_html__( 'Edge', 'skylith' ),
            'elementor'                 => esc_html__( 'Elementor', 'skylith' ),
            'ello'                      => esc_html__( 'Ello', 'skylith' ),
            'ember'                     => esc_html__( 'Ember', 'skylith' ),
            'empire'                    => esc_html__( 'Empire', 'skylith' ),
            'envira'                    => esc_html__( 'Envira', 'skylith' ),
            'erlang'                    => esc_html__( 'Erlang', 'skylith' ),
            'ethereum'                  => esc_html__( 'Ethereum', 'skylith' ),
            'etsy'                      => esc_html__( 'Etsy', 'skylith' ),
            'evernote'                  => esc_html__( 'Evernote', 'skylith' ),
            'expeditedssl'              => esc_html__( 'ExpeditedSSL', 'skylith' ),
            'facebook-messenger'        => esc_html__( 'Facebook Messenger', 'skylith' ),
            'facebook'                  => esc_html__( 'Facebook', 'skylith' ),
            'fantasy-flight-games'      => esc_html__( 'Fantasy Flight Games', 'skylith' ),
            'fedex'                     => esc_html__( 'FedEx', 'skylith' ),
            'fedora'                    => esc_html__( 'Fedora', 'skylith' ),
            'figma'                     => esc_html__( 'Figma', 'skylith' ),
            'firefox-browser'           => esc_html__( 'Firefox Browser', 'skylith' ),
            'firefox'                   => esc_html__( 'Firefox', 'skylith' ),
            'first-order'               => esc_html__( 'First Order', 'skylith' ),
            'firstdraft'                => esc_html__( 'Firstdraft', 'skylith' ),
            'flickr'                    => esc_html__( 'Flickr', 'skylith' ),
            'flipboard'                 => esc_html__( 'Flipboard', 'skylith' ),
            'fly'                       => esc_html__( 'Fly', 'skylith' ),
            'font-awesome'              => esc_html__( 'Font Awesome', 'skylith' ),
            'fonticons'                 => esc_html__( 'Fonticons', 'skylith' ),
            'fort-awesome'              => esc_html__( 'Fort Awesome', 'skylith' ),
            'forumbee'                  => esc_html__( 'Forumbee', 'skylith' ),
            'foursquare'                => esc_html__( 'Foursquare', 'skylith' ),
            'free-code-camp'            => esc_html__( 'freeCodeCamp', 'skylith' ),
            'freebsd'                   => esc_html__( 'FreeBSD', 'skylith' ),
            'fulcrum'                   => esc_html__( 'Fulcrum', 'skylith' ),
            'galactic-republic'         => esc_html__( 'Galactic Republic', 'skylith' ),
            'galactic-senate'           => esc_html__( 'Galactic Senate', 'skylith' ),
            'get-pocket'                => array(
                'name' => esc_html__( 'Pocket', 'skylith' ),
                'keys' => array( 'pocket' ),
            ),
            'gg'                        => esc_html__( 'GG', 'skylith' ),
            'git'                       => esc_html__( 'Git', 'skylith' ),
            'github'                    => esc_html__( 'GitHub', 'skylith' ),
            'gitkraken'                 => esc_html__( 'GitKraken', 'skylith' ),
            'gitlab'                    => esc_html__( 'GitLab', 'skylith' ),
            'gitter'                    => esc_html__( 'Gitter', 'skylith' ),
            'glide'                     => esc_html__( 'Glide', 'skylith' ),
            'gofore'                    => esc_html__( 'Gofore', 'skylith' ),
            'goodreads'                 => esc_html__( 'Goodreads', 'skylith' ),
            'google-drive'              => esc_html__( 'Google Drive', 'skylith' ),
            'google-play'               => esc_html__( 'Google Play', 'skylith' ),
            'google-plus'               => esc_html__( 'Google Plus', 'skylith' ),
            'google-wallet'             => esc_html__( 'Google Wallet', 'skylith' ),
            'google'                    => esc_html__( 'Google', 'skylith' ),
            'gratipay'                  => esc_html__( 'Gratipay', 'skylith' ),
            'grav'                      => esc_html__( 'Grav', 'skylith' ),
            'gripfire'                  => esc_html__( 'Gripfire', 'skylith' ),
            'grunt'                     => esc_html__( 'Grunt', 'skylith' ),
            'gulp'                      => esc_html__( 'Gulp', 'skylith' ),
            'hacker-news'               => esc_html__( 'Hacker News', 'skylith' ),
            'hackerrank'                => esc_html__( 'HackerRank', 'skylith' ),
            'hips'                      => esc_html__( 'HIPS', 'skylith' ),
            'hire-a-helper'             => esc_html__( 'HireAHelper', 'skylith' ),
            'hornbill'                  => esc_html__( 'Hornbill', 'skylith' ),
            'hotjar'                    => esc_html__( 'Hotjar', 'skylith' ),
            'houzz'                     => esc_html__( 'Houzz', 'skylith' ),
            'html5'                     => esc_html__( 'HTML5', 'skylith' ),
            'hubspot'                   => esc_html__( 'HubSpot', 'skylith' ),
            'ideal'                     => esc_html__( 'iDEAL', 'skylith' ),
            'imdb'                      => esc_html__( 'IMDb', 'skylith' ),
            'instagram'                 => esc_html__( 'Instagram', 'skylith' ),
            'intercom'                  => esc_html__( 'Intercom', 'skylith' ),
            'internet-explorer'         => array(
                'name' => esc_html__( 'Internet Explorer', 'skylith' ),
                'keys' => array( 'ie' ),
            ),
            'invision'                  => esc_html__( 'InVision', 'skylith' ),
            'ioxhost'                   => esc_html__( 'IoxHost', 'skylith' ),
            'itch-io'                   => esc_html__( 'itch.io', 'skylith' ),
            'itunes'                    => esc_html__( 'iTunes', 'skylith' ),
            'java'                      => esc_html__( 'Java', 'skylith' ),
            'jedi-order'                => esc_html__( 'Jedi Order', 'skylith' ),
            'jenkins'                   => esc_html__( 'Jenkins', 'skylith' ),
            'jira'                      => esc_html__( 'Jira', 'skylith' ),
            'joget'                     => esc_html__( 'Joget', 'skylith' ),
            'joomla'                    => esc_html__( 'Joomla', 'skylith' ),
            'js'                        => array(
                'name' => esc_html__( 'JS', 'skylith' ),
                'keys' => array( 'javascript' ),
            ),
            'jsfiddle'                  => esc_html__( 'JSFiddle', 'skylith' ),
            'kaggle'                    => esc_html__( 'Kaggle', 'skylith' ),
            'keybase'                   => esc_html__( 'Keybase', 'skylith' ),
            'keycdn'                    => esc_html__( 'KeyCDN', 'skylith' ),
            'kickstarter'               => esc_html__( 'Kickstarter', 'skylith' ),
            'korvue'                    => esc_html__( 'Korvue', 'skylith' ),
            'laravel'                   => esc_html__( 'Laravel', 'skylith' ),
            'lastfm'                    => esc_html__( 'Last.fm', 'skylith' ),
            'leanpub'                   => esc_html__( 'Leanpub', 'skylith' ),
            'less'                      => esc_html__( 'Less', 'skylith' ),
            'line'                      => esc_html__( 'Line', 'skylith' ),
            'linkedin'                  => esc_html__( 'LinkedIn', 'skylith' ),
            'linode'                    => esc_html__( 'Linode', 'skylith' ),
            'linux'                     => esc_html__( 'Linux', 'skylith' ),
            'lyft'                      => esc_html__( 'Lyft', 'skylith' ),
            'magento'                   => esc_html__( 'Magento', 'skylith' ),
            'mailchimp'                 => esc_html__( 'Mailchimp', 'skylith' ),
            'mandalorian'               => esc_html__( 'Mandalorian', 'skylith' ),
            'markdown'                  => array(
                'name' => esc_html__( 'Markdown', 'skylith' ),
                'keys' => array( 'md' ),
            ),
            'mastodon'                  => esc_html__( 'Mastodon', 'skylith' ),
            'maxcdn'                    => esc_html__( 'MaxCDN', 'skylith' ),
            'mdb'                       => esc_html__( 'MDB', 'skylith' ),
            'medapps'                   => esc_html__( 'MedApps', 'skylith' ),
            'medium'                    => esc_html__( 'Medium', 'skylith' ),
            'medrt'                     => esc_html__( 'Medrt', 'skylith' ),
            'meetup'                    => esc_html__( 'Meetup', 'skylith' ),
            'megaport'                  => esc_html__( 'Megaport', 'skylith' ),
            'mendeley'                  => esc_html__( 'Mendeley', 'skylith' ),
            'microblog'                 => esc_html__( 'Micro.blog', 'skylith' ),
            'microsoft'                 => esc_html__( 'Microsoft', 'skylith' ),
            'mix'                       => esc_html__( 'Mix', 'skylith' ),
            'mixcloud'                  => esc_html__( 'Mixcloud', 'skylith' ),
            'mixer'                     => esc_html__( 'Mixer', 'skylith' ),
            'mizuni'                    => esc_html__( 'Mizuni', 'skylith' ),
            'modx'                      => esc_html__( 'MODX', 'skylith' ),
            'monero'                    => esc_html__( 'Monero', 'skylith' ),
            'napster'                   => esc_html__( 'Mapster', 'skylith' ),
            'neos'                      => esc_html__( 'Neos', 'skylith' ),
            'nimblr'                    => esc_html__( 'Nimblr', 'skylith' ),
            'node-js'                   => esc_html__( 'Node.js', 'skylith' ),
            'node'                      => esc_html__( 'Node', 'skylith' ),
            'npm'                       => esc_html__( 'npm', 'skylith' ),
            'ns8'                       => esc_html__( 'NS8', 'skylith' ),
            'nutritionix'               => esc_html__( 'Nutritionix', 'skylith' ),
            'odnoklassniki'             => array(
                'name' => esc_html__( 'Odnoklassniki', 'skylith' ),
                'keys' => array( 'ok' ),
            ),
            'old-republic'              => esc_html__( 'Old Republic', 'skylith' ),
            'opencart'                  => esc_html__( 'OpenCart', 'skylith' ),
            'openid'                    => esc_html__( 'OpenID', 'skylith' ),
            'opera'                     => esc_html__( 'Opera', 'skylith' ),
            'optin-monster'             => esc_html__( 'OptinMonster', 'skylith' ),
            'orcid'                     => esc_html__( 'ORCID', 'skylith' ),
            'osi'                       => esc_html__( 'OSI', 'skylith' ),
            'page4'                     => esc_html__( 'PAGE4', 'skylith' ),
            'pagelines'                 => esc_html__( 'PageLines', 'skylith' ),
            'palfed'                    => esc_html__( 'PalFed', 'skylith' ),
            'patreon'                   => esc_html__( 'Patreon', 'skylith' ),
            'paypal'                    => esc_html__( 'PayPal', 'skylith' ),
            'penny-arcade'              => esc_html__( 'Penny Arcade', 'skylith' ),
            'periscope'                 => esc_html__( 'Periscope', 'skylith' ),
            'phabricator'               => esc_html__( 'Phabricator', 'skylith' ),
            'phoenix-framework'         => esc_html__( 'Phoenix Framework', 'skylith' ),
            'phoenix-squadron'          => esc_html__( 'Phoenix Squadron', 'skylith' ),
            'php'                       => esc_html__( 'PHP', 'skylith' ),
            'pinterest'                 => esc_html__( 'Pinterest', 'skylith' ),
            'playstation'               => array(
                'name' => esc_html__( 'PlayStation', 'skylith' ),
                'keys' => array( 'ps' ),
            ),
            'product-hunt'              => esc_html__( 'Product Hunt', 'skylith' ),
            'pushed'                    => esc_html__( 'Pushed', 'skylith' ),
            'python'                    => esc_html__( 'Python', 'skylith' ),
            'qq'                        => esc_html__( 'QQ', 'skylith' ),
            'quinscape'                 => esc_html__( 'QuinScape', 'skylith' ),
            'quora'                     => esc_html__( 'Quora', 'skylith' ),
            'r-project'                 => esc_html__( 'R', 'skylith' ),
            'raspberry-pi'              => esc_html__( 'Raspberry Pi', 'skylith' ),
            'ravelry'                   => esc_html__( 'Ravelry', 'skylith' ),
            'react'                     => esc_html__( 'React', 'skylith' ),
            'reacteurope'               => esc_html__( 'ReactEurope', 'skylith' ),
            'readme'                    => esc_html__( 'ReadMe', 'skylith' ),
            'rebel'                     => esc_html__( 'Rebel', 'skylith' ),
            'red-river'                 => esc_html__( 'Red River', 'skylith' ),
            'reddit'                    => esc_html__( 'reddit', 'skylith' ),
            'redhat'                    => esc_html__( 'Red Hat', 'skylith' ),
            'renren'                    => esc_html__( 'Renren', 'skylith' ),
            'replyd'                    => esc_html__( 'Replyd', 'skylith' ),
            'researchgate'              => esc_html__( 'ResearchGate', 'skylith' ),
            'resolving'                 => esc_html__( 'Resolving', 'skylith' ),
            'rev'                       => esc_html__( 'Rev', 'skylith' ),
            'rocketchat'                => esc_html__( 'Rocket.Chat', 'skylith' ),
            'rockrms'                   => esc_html__( 'Rock RMS', 'skylith' ),
            'safari'                    => esc_html__( 'Safari', 'skylith' ),
            'salesforce'                => esc_html__( 'Salesforce', 'skylith' ),
            'sass'                      => esc_html__( 'Sass', 'skylith' ),
            'schlix'                    => esc_html__( 'SCHLIX', 'skylith' ),
            'scribd'                    => esc_html__( 'Scribd', 'skylith' ),
            'searchengin'               => esc_html__( 'Searchengin', 'skylith' ),
            'sellcast'                  => esc_html__( 'SellCast', 'skylith' ),
            'sellsy'                    => esc_html__( 'Sellsy', 'skylith' ),
            'servicestack'              => esc_html__( 'ServiceStack', 'skylith' ),
            'shirtsinbulk'              => esc_html__( 'Shirts In Bulk', 'skylith' ),
            'shopify'                   => esc_html__( 'Shopify', 'skylith' ),
            'shopware'                  => esc_html__( 'Shopware', 'skylith' ),
            'simplybuilt'               => esc_html__( 'SimplyBuilt', 'skylith' ),
            'sistrix'                   => esc_html__( 'SISTRIX', 'skylith' ),
            'sith'                      => esc_html__( 'Sith', 'skylith' ),
            'sketch'                    => esc_html__( 'Sketch', 'skylith' ),
            'skyatlas'                  => esc_html__( 'SkyAtlas', 'skylith' ),
            'skype'                     => esc_html__( 'Skype', 'skylith' ),
            'slack'                     => esc_html__( 'Slack', 'skylith' ),
            'slideshare'                => esc_html__( 'SlideShare', 'skylith' ),
            'snapchat'                  => esc_html__( 'Snapchat', 'skylith' ),
            'soundcloud'                => esc_html__( 'SoundCloud', 'skylith' ),
            'sourcetree'                => esc_html__( 'Sourcetree', 'skylith' ),
            'speakap'                   => esc_html__( 'Speakap', 'skylith' ),
            'speaker-deck'              => esc_html__( 'Speaker Deck', 'skylith' ),
            'spotify'                   => esc_html__( 'Spotify', 'skylith' ),
            'squarespace'               => esc_html__( 'Squarespace', 'skylith' ),
            'stack-exchange'            => esc_html__( 'Stack Exchange', 'skylith' ),
            'stack-overflow'            => esc_html__( 'Stack Overflow', 'skylith' ),
            'stackpath'                 => esc_html__( 'StackPath', 'skylith' ),
            'staylinked'                => esc_html__( 'StayLinked', 'skylith' ),
            'steam'                     => esc_html__( 'Steam', 'skylith' ),
            'sticker-mule'              => esc_html__( 'Sticker Mule', 'skylith' ),
            'strava'                    => esc_html__( 'Strava', 'skylith' ),
            'stripe'                    => esc_html__( 'Stripe', 'skylith' ),
            'studiovinari'              => esc_html__( 'Studio Vinari', 'skylith' ),
            'stumbleupon'               => esc_html__( 'StumbleUpon', 'skylith' ),
            'superpowers'               => esc_html__( 'Superpowers', 'skylith' ),
            'supple'                    => esc_html__( 'Supple', 'skylith' ),
            'suse'                      => esc_html__( 'SuSE', 'skylith' ),
            'swift'                     => esc_html__( 'Swift', 'skylith' ),
            'symfony'                   => esc_html__( 'Symfony', 'skylith' ),
            'teamspeak'                 => esc_html__( 'SeamSpeak', 'skylith' ),
            'telegram'                  => esc_html__( 'Telegram', 'skylith' ),
            'tencent-weibo'             => esc_html__( 'Tencent Weibo', 'skylith' ),
            'the-red-yeti'              => esc_html__( 'The Red Yeti', 'skylith' ),
            'themeisle'                 => esc_html__( 'Themeisle', 'skylith' ),
            'think-peaks'               => esc_html__( 'ThinkPeaks', 'skylith' ),
            'trade-federation'          => esc_html__( 'Trade Federation', 'skylith' ),
            'trello'                    => esc_html__( 'Trello', 'skylith' ),
            'tripadvisor'               => esc_html__( 'Tripadvisor', 'skylith' ),
            'tumblr'                    => esc_html__( 'Tumblr', 'skylith' ),
            'twitch'                    => esc_html__( 'Twitch', 'skylith' ),
            'twitter'                   => esc_html__( 'Twitter', 'skylith' ),
            'typo3'                     => esc_html__( 'TYPO3', 'skylith' ),
            'uber'                      => esc_html__( 'Uber', 'skylith' ),
            'ubuntu'                    => esc_html__( 'Ubuntu', 'skylith' ),
            'uikit'                     => esc_html__( 'UIkit', 'skylith' ),
            'umbraco'                   => esc_html__( 'Umbraco', 'skylith' ),
            'uniregistry'               => esc_html__( 'Uniregistry', 'skylith' ),
            'unity'                     => esc_html__( 'Unity', 'skylith' ),
            'untappd'                   => esc_html__( 'Untappd', 'skylith' ),
            'ups'                       => esc_html__( 'UPS', 'skylith' ),
            'usps'                      => esc_html__( 'USPS', 'skylith' ),
            'ussunnah'                  => esc_html__( 'us-Sunnah', 'skylith' ),
            'vaadin'                    => esc_html__( 'Vaadin', 'skylith' ),
            'viacoin'                   => esc_html__( 'Viacoin', 'skylith' ),
            'viadeo'                    => esc_html__( 'Viadeo', 'skylith' ),
            'viber'                     => esc_html__( 'Viber', 'skylith' ),
            'vimeo'                     => esc_html__( 'Vimeo', 'skylith' ),
            'vine'                      => esc_html__( 'Vine', 'skylith' ),
            'vk'                        => array(
                'name' => esc_html__( 'VK', 'skylith' ),
                'keys' => array( 'vkontakte' ),
            ),
            'vnv'                       => esc_html__( 'VNV', 'skylith' ),
            'vuejs'                     => esc_html__( 'Vue.js', 'skylith' ),
            'waze'                      => esc_html__( 'Waze', 'skylith' ),
            'weebly'                    => esc_html__( 'Weebly', 'skylith' ),
            'weibo'                     => esc_html__( 'Weibo', 'skylith' ),
            'weixin'                    => esc_html__( 'Weixin', 'skylith' ),
            'whatsapp'                  => esc_html__( 'WhatsApp', 'skylith' ),
            'whmcs'                     => esc_html__( 'WHMCS', 'skylith' ),
            'wikipedia'                 => esc_html__( 'Wikipedia', 'skylith' ),
            'windows'                   => esc_html__( 'Windows', 'skylith' ),
            'wix'                       => esc_html__( 'WIX', 'skylith' ),
            'wizards-of-the-coast'      => esc_html__( 'Wizards of the Coast', 'skylith' ),
            'wolf-pack-battalion'       => esc_html__( 'Wolf Pack Battalion', 'skylith' ),
            'wordpress'                 => esc_html__( 'WordPress', 'skylith' ),
            'wpbeginner'                => esc_html__( 'WPBeginner', 'skylith' ),
            'wpexplorer'                => esc_html__( 'WPExplorer', 'skylith' ),
            'wpforms'                   => esc_html__( 'WPForms', 'skylith' ),
            'wpressr'                   => esc_html__( 'WPressr', 'skylith' ),
            'xbox'                      => esc_html__( 'Xbox', 'skylith' ),
            'xing'                      => esc_html__( 'XING', 'skylith' ),
            'y-combinator'              => esc_html__( 'YCombinator', 'skylith' ),
            'yahoo'                     => esc_html__( 'Yahoo', 'skylith' ),
            'yammer'                    => esc_html__( 'Yammer', 'skylith' ),
            'yandex'                    => esc_html__( 'Yandex', 'skylith' ),
            'yarn'                      => esc_html__( 'Yarn', 'skylith' ),
            'yelp'                      => esc_html__( 'Yelp', 'skylith' ),
            'yoast'                     => esc_html__( 'Yoast', 'skylith' ),
            'youtube'                   => esc_html__( 'Youtube', 'skylith' ),
            'zhihu'                     => esc_html__( 'Zhihu', 'skylith' ),
        );

        $result    = array();
        $base_path = __DIR__ . '/svg/';

        // Prepare SVG paths.
        foreach ( $brands as $k => $data ) {
            $svg_path = $base_path . $k . '.svg';

            if ( file_exists( $svg_path ) ) {
                $result[ $k ] = array_merge(
                    is_array( $data ) ? $data : array(
                        'name' => $data,
                    ),
                    $get_svg ? array(
                        'svg' => self::get_svg_by_path( $svg_path, $svg_data ),
                    ) : array(),
                    array(
                        'svg_path' => $base_path . $k . '.svg',
                    )
                );
            }
        }

        return $result;
    }
}
