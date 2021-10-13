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
define('DB_NAME', 'c50_minisitios');

/** MySQL database username */
define('DB_USER', 'c50_minisitios');

/** MySQL database password */
define('DB_PASSWORD', 'SNyvf!bPZt8T');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '<84?MSE036^&n)?7A]*fu-Q<N^Hfph+]t?#/v5x{k`!QQCJ<T{Gnd2Nz:@fc#ML4');
define('SECURE_AUTH_KEY',  '(w&!j}*!asd!|h!~lx}D@CT/Q>R>o[eg@ yX3tb#7_a{Q<$NJnVz7aAd9CKI5Fhg');
define('LOGGED_IN_KEY',    ']L_1!`c8^<d<p$f@^+B:0^x(YrG)MlBQ_8FD+|ntM6Av^|;vsN~$cq%{AhmHb*n)');
define('NONCE_KEY',        '.3bQEi,/1R [BR:el2kfb<p^(O}Dhs1p+pZK7%sa_N*skb3ol)SxBcU`GQ?$TuR~');
define('AUTH_SALT',        'N/;yPUc]%<>eW-(?n;zh7+w:$(<s&%g i957%vks[fb<SacCHxFAPd|i`(j)uqAK');
define('SECURE_AUTH_SALT', 'Jn)Q2SF{kido.{#m=^ W^JCP.}6,:Q(ewPH$zQZ6b47]@[sM4u1%}3}N7}Udq(T6');
define('LOGGED_IN_SALT',   '0|^OJad{FOO+a>}Sn]=9!UH*s5a;W2 /KT?`k.hkQ+bJl]^0(_(0C<!dU{Kz.co.');
define('NONCE_SALT',       ' CUfb%o>7x3#]&,Zb2>=)r|hNK(MFp={-e5EZ;=07-nhlLh|<lb_>0W0L]qt&tN[');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */

/* WordPress Multisite */
define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
