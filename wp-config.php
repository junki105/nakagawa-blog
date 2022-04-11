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
define( 'DB_NAME', 'wp_nakagawa' );

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
define( 'AUTH_KEY',         'cbMoBmPaRA8;]e$9=?_]!srUkwugq]s/vSGzmF9;oF^&oPh,y[8Ws?Va[]XJ<ZlC' );
define( 'SECURE_AUTH_KEY',  'DGvY]cve;H:^P4I@C@yY(pm~ikX-w`R91!IaYg[kS}sj},{hw`V,IzqwDmx*G4nG' );
define( 'LOGGED_IN_KEY',    '#Pg?gLX6t:W$D(*lR&Kq>&yfBG@d@!%d)3A~Y.xq%Js#xz=<L8[J}CQPJxRYqVi[' );
define( 'NONCE_KEY',        '3z,K:~%1X1PfA(N]76Q~+H-3GnaHP1?PmTypX/(|rT91&rt)z:D$X+Iwv!Fx?]4#' );
define( 'AUTH_SALT',        'jc$ ECQs8W7crQ0{O iDGAN8%DT&K|@R/?p.o_N@95dSeZBPUoC_9XKuAP0-]|n6' );
define( 'SECURE_AUTH_SALT', 'H1w26x-q_4apLZRQ3YB1fDeaWy6]ZnQI}Zu6 !(lxmuW}e&jFKw6kaqf;|#&p3 T' );
define( 'LOGGED_IN_SALT',   'MKa=<|nS{Hl%+UFNXHvLla[4}yIx3{49>8pF^fr;>PGZ/l`$d*^);y]dvC]2J4tP' );
define( 'NONCE_SALT',       '%.RKl%a=[?xz(&(9m(2VY]>qH2r;l|hKE{tDW3Q$L_u+0|:HQ!X/7)Vv;>8e>,Nd' );

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
