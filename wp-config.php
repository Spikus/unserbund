<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', '42709419bfc44c4dba3b43f2dbb990669eb886014989cfab' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1/ZW_o@Pm,xTUG@,Idle$},o+~v3[=S:!:]d|%(c;HcY{u2;7U07CVVg+f!mk}uv' );
define( 'SECURE_AUTH_KEY',  'Vy3RDPGED%;#?]}:{]&(f_%BFNI^&@<0-wm7|c,>U-(E*>7zx2ArA571}a[M6z/>' );
define( 'LOGGED_IN_KEY',    'SGm0-.i6kwW-R;_ee v^n{aEcqU^kolp+,1b=)J<vdrWsL(<Wa!0zu_*{{I7=$]>' );
define( 'NONCE_KEY',        '$<SC4,T1(6<cm7vx}nquJ;S+OR(#:S+iZmeU}KJHP0<4P /]4F2WlQQTd^l(8<[1' );
define( 'AUTH_SALT',        '(3ZL(GKTwM4X[>yn)_d.7~i#)GXkHFBTivz3wY;p._%lxIoYP m=PbRdy4G:`>zA' );
define( 'SECURE_AUTH_SALT', '-IU.`OL_%@rK4;0)W-%y^v=,ou6;=Ub=VOw:AbiAQECeJ5BM]yPjeuN9ht(-y_])' );
define( 'LOGGED_IN_SALT',   'hPb5D=IB8(^C<~(l`eS]?!xz!-$%5bl){c>{)~dkJ:gj:EQ(%HL(Vy>DXOu8C@ e' );
define( 'NONCE_SALT',       'qV.iF]K4c@q&ye[.5bDy2eBsocdIaq*s#n`:mb$po40`eUwE4)M/7S*.C]Y|hFvw' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define( 'WP_HOME', 'https://unserbund.com' );
define( 'WP_SITEURL', 'https://unserbund.com' );
