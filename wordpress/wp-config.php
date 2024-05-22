<?php
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'webdeveloper' );

/** Database password */
define( 'DB_PASSWORD', 'sdaqwerty!' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '0>vZ/?FQ+>Q$o%5n$n>QGk=>,/mode0a>}-wM|PW@H2fdOE*o7owdT1$FjZVU*1g' );
define( 'SECURE_AUTH_KEY',  'U4,><-up5l,FLC!e4<ZVux839S-$|Gs<ZOOR7kYSRxK ,V|/7k>}k^.~tSZ5O 9r' );
define( 'LOGGED_IN_KEY',    'xk_MOW2l;;Yon{1JpF-hxo0(A17Lc(G!1N Z58G3t{_N8E,&V*/KPtJo%7]o{Wwl' );
define( 'NONCE_KEY',        'O 7|~/C3m`1e;iQ(KU|7+K@@S$Dg~},WJ;O|Pk~e}DU#Z+H9DFe8t}&ZTteK^]{7' );
define( 'AUTH_SALT',        'x}P)h4.S{2(:5[!{kfo?U#AUO?KlUGXC33DYp^dEk?,?P:x+@_* [STK<u+?n[*r' );
define( 'SECURE_AUTH_SALT', 'veEqob@%m-L1I;2KEa%e9eA#o_?s$`v:cQ5qdyDn!P)Q}<a%$gltK{!nT0*GX;wU' );
define( 'LOGGED_IN_SALT',   '.6QGSw_#v /hhO/i~l,JMDi3aYeoWOu _(]m<2$kV779!&X[Ig5|!:BBgZ[rl:9j' );
define( 'NONCE_SALT',       'fNC!mI6*;*Bgm3LP;br;)A`{TMUH:3 +?0fb)7tZ9;sYH|C.3]295EuOHKmUq).X' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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

