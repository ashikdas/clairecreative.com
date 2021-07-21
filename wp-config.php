<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'clairecreative' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-C[T`o/j{H:yGLLBvQ-wSGjsbYyP2+.mr:CCmp+JU?,OV[Rq(_5-dBn@6)a|t7}D' );
define( 'SECURE_AUTH_KEY',  '~[~k[^gGR Xj0JLpA&,+;uP~s3Z-Cd&jOc&l!iEU@AUC/K~j]iryWYvU1CIyPDz6' );
define( 'LOGGED_IN_KEY',    'eMpnU!C{cMk##7H|Ogo=.-Ndejp)VE`tj AfL;>~I}8iGj4K5TBO$}L/sUOfJ>r0' );
define( 'NONCE_KEY',        '`12;H/?*n[93JSZfO!phw4tsuZ>BQZfN2ZsObnfZFc+)C=R}(B2)*7gjt)`EY2RE' );
define( 'AUTH_SALT',        'q~rtm*m2RG%n^z<0_cIYx7u#,8~jtx+!8Yc,?K?~%x;%Iqo8F}j;v@Pg,ny3 {YA' );
define( 'SECURE_AUTH_SALT', '6N;O>inp9TyLKwz^u&Ch>a}LltqN1^A3 gyC(.Y^HCPmBAT2rZM#ILN0L(aY48Rd' );
define( 'LOGGED_IN_SALT',   'm3_{pp~NbZK% + @Fkvd$t$f~%@xt8e3q<<6rS_8n%C@O]<1Fcy`{e7,%zc4xq3c' );
define( 'NONCE_SALT',       '^UlnGI%cIr2^^S^Ehq5><^P&|:Y?Q$OPcC/CVF{vu5?Io9uI]5u=>-[aT1%bSLux' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
