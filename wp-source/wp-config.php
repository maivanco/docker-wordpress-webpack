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
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME'));

/** Database username */
define( 'DB_USER', getenv('WORDPRESS_DB_USER'));

/** Database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );

/** Database hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') );

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
define( 'AUTH_KEY',         'kNDBc_cky{FJ%db]]vL: gcVJH j*>]vG5u2fX6r+sZ8,-E&@v(+^y,2%%xW~b@0' );
define( 'SECURE_AUTH_KEY',  'xco6VrL*_6mf-|6jS)cE+a4Wt&6S@ndhlSd:f=-^ ~Yn~5q9N{lN>m#rTFKO/v>i' );
define( 'LOGGED_IN_KEY',    'px]?T<jl?s;1@N613f(Hh-BM;#(j7^_NI}$#t~7wt!*qQ*D~4fSwrlEADP^O9}!k' );
define( 'NONCE_KEY',        'hTf#EX&7HoxNJ 6Xm{W8@Wp-czw.et;{&s*J{]mb)v@|Hvq1k5xtf!bJX#728s41' );
define( 'AUTH_SALT',        'EZQK{Wn;J7-}HFU0$Xj3zI!k|5daI$xZA*6C2Vqqt:S,a|I(,[<]neY;RgH /+<r' );
define( 'SECURE_AUTH_SALT', '$D%EgQj$_)_xkRK:~jK>}O!|R;aJ.*w[+]KW8 s9<`+k~zXdrR$-gyiJ7h%k.(4?' );
define( 'LOGGED_IN_SALT',   'CU~8+UjjczRWIlrw:FW%k}:@`nxtQS7Xj0;nJy=::h5jHdx<]a#NL9MPG`c|57[J' );
define( 'NONCE_SALT',       '()Fg^~PREp~PfOCgjuZW{Ekd|pmya~C U77*Z5&KMF/Xz|*H+z/{^3[LzSZWX~rx' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
