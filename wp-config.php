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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sportexbd');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'whoisit7211196');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'mi`yWWf0iO qpwBi^M|X<teZ:D~>7=?R|^bFi779:nnhYtuYYv?bl#IquJN4zu -');
define('SECURE_AUTH_KEY',  ';]SM4UhmFQ~EgC7/r3{J$gysTT&^:pu|0J4[KfmH$zBkRZxLs),K}odVd~(6{.Ls');
define('LOGGED_IN_KEY',    '4Szd@<)I.iBru Fx`,E5r7snVvqKLsYr(Mb=1L2etVg2xF<T>u0qSLy#I217<K7n');
define('NONCE_KEY',        '+oGHIO7Z{%y3i,w+GYpDR}2ywYPPQ6|bdgDs|1H K{S6u*,nFG@fxY3ABy,O+_&~');
define('AUTH_SALT',        '>J$@YbFrwuV=d2Y5sKbHEYg2R-6lB; T_G5mcoH{C4z+2st#RYyK]cO&A!`gi+;]');
define('SECURE_AUTH_SALT', '<{<+TbF3]<knTt?XFGI[#Dh:UlbABxjI]G&9Qfr/-x7r8;,/ghjZrFA@n;AkvHUd');
define('LOGGED_IN_SALT',   'p~)QU_rEb0J~jUcmTxO]vNa<{;}xGRDe+:?225W;N`f} e:mRxY/ur;qcMzeeqF`');
define('NONCE_SALT',       '+4zmp!ZgwDF%:7Ch8BIDYxdi?bUk$:r*(0gFu92]cFxP2xd9oM9Rxb5@]QyA@PnQ');
define('FS_METHOD', 'direct');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
