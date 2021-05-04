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
define( 'DB_NAME', 'bingo_db' );

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
define( 'AUTH_KEY',         ':T0Cg)Y#;?>_j]~MrqH$hF24t2Lc+J5eP8o8-e:`NcAnx%p}R5If=CSPK`hX(~}K' );
define( 'SECURE_AUTH_KEY',  'SC#3:v0k@j1;+)vz5]rc2;joJ~ItqMT%Qp$TJa+fv<P>iK{nO3Won_v]X,W%H;,*' );
define( 'LOGGED_IN_KEY',    'l.BkV|_`%> jf|e*6g[gWN[dgO!zW*`3RdK4oQW9%!B}A8F:YWggpf`T{!:[a6w^' );
define( 'NONCE_KEY',        'b|bTkJXtnsb,E{O!YbHnuZZyP3O!= -1rz,%`nR;d{GO61G O8y..9/xb->O>z)#' );
define( 'AUTH_SALT',        'ff8#;dC$AO(W@@4MT}-9QE=e4..|7ab+qo~yD[XLPA`FgbzQE5%!^X647%}7Cia^' );
define( 'SECURE_AUTH_SALT', '1.!!G::*mN[.md3bdtMEk1HpF`K7>_jY6Ey/*VI4i{3GH`vNNeIDI~)h_O!;7m:P' );
define( 'LOGGED_IN_SALT',   'xF;OD+Wy@ZDd_BQ+EK?r*QTQV?,TZms4ErRzmDH@e}W)wzVN&LdSv)2u!~,mcwd~' );
define( 'NONCE_SALT',       ' $W6RHVEt$PtM|Rv=I1=fe;[/lN:iXhzjnetE^Y+Qv^oc!1o}yQGmXCEXOG~K ux' );

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
