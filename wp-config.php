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
define( 'DB_NAME', 'defekgne_bd_ace' );

/** MySQL database username */
define( 'DB_USER', 'defekgne_bd_ace' );

/** MySQL database password */
define( 'DB_PASSWORD', '0P4SMC]4)p' );

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
define( 'AUTH_KEY',         '=?!&.X6(o3_^?r#VgIb[ HSfLomZXCTjf$vnb[6!sC!{rM:u#viMsu}eR.c{hB*d' );
define( 'SECURE_AUTH_KEY',  '=NkU_~I$>46{J+u#fg(rbsr$RUkuTL}{(;cG8K8-L6UK_mZQ$0`XZyAl;J/3[R.e' );
define( 'LOGGED_IN_KEY',    'T9Y9_5,nizhw~+@]$U:$3Am$G3^h.+k91(st$Qn^}(-B~JA%:E{o^5IH}^MXRHrp' );
define( 'NONCE_KEY',        '[KogcR?KnM!vm[WC)35sL;Z2&a>o+e~&o.rtKI^ejRIb>)Va?LD%3_FUfcu]72my' );
define( 'AUTH_SALT',        'Eq3ZU2G&EuIX g3U~@FxG1]LjFBTAjk2QN3=+{1/h:3Vm9} Ja!+:{BBN^U%clo&' );
define( 'SECURE_AUTH_SALT', 'R4H0);tWX,*RKr7|Wy%<%59^_$Ji-*<EoJ&23IUv4.*H#V/K]SJy4!InEj35#K9I' );
define( 'LOGGED_IN_SALT',   'L*brsm_$MAzLny@.?@KjPW?6LiSr?yuJo>`a/o/0m46{6#kGUbl&P}K{2f3=(JxB' );
define( 'NONCE_SALT',       '|:BeEvb6?vPDv_M15PP^n$][Pr-p}y(9_XbSWST5!.@~3LXc1@;g?6[<>jl8H9cA' );

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
