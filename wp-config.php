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
define( 'DB_NAME', 'store245_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'Q_8d8y#y{?}#+W!R<0..Gfw;UVjL|LX:!r0/LTUZ``WViK_F[y<lBg(3)W{M6,H?' );
define( 'SECURE_AUTH_KEY',  '&Ma&NZr_2,f|I5ThEzPP`$Yd=0Ww9*alLYE<:Z)hV&T.* VVcu_q9aFK<k2)mM4[' );
define( 'LOGGED_IN_KEY',    'rHO>vH^gE,qy ){)q6xXXx$t:!r&54!<g1k+c0@<.i:OjEKD,EV~Rr3VV)&0!1M/' );
define( 'NONCE_KEY',        '@Ol.&q_yHQAw!;nK=EquYq9GKIn}eBe C7nz&oisduNBpw@Ta]t5:ppy;f..cd-t' );
define( 'AUTH_SALT',        'I@!DwxZM]ROVr/reG80P]=[1eadg]IP]bMd_fX&_|si$z$6|HW)nemfQ><Mg-R^3' );
define( 'SECURE_AUTH_SALT', 'z?k~4#z2 jJnNFzy>_WYVIAL-5{#f@s6iBngr%~B:u]103|5)FJe%QnWm6RikX#Y' );
define( 'LOGGED_IN_SALT',   'HC2A@.BiWY- @Z7cs~:pe:r.bj-M7F}^W)Az[o[Xsx5r=Y|pQI]>Gfub5IYq]$cE' );
define( 'NONCE_SALT',       '`GF*lc}b{kNm#!y%.eIza Etl4[+/^GAkd/~pTmz3{^,`=;TFL$MY{SWT[iN]4`[' );

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
