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
define('DB_NAME', 'grupopollus');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'ZD[-{z.63L<@Qf@DQ(BJoSL^UP_U&NkYLHP!@UgC{_hQ ]mgfzZ<Zu}=xo]$SUm/');
define('SECURE_AUTH_KEY',  'aXH^fbhkBCW,(w~jr@Kuv-!IeD+#Gs_=M}K[]#PA6[6~p;bEs6IJ^m7PFYO[t0X>');
define('LOGGED_IN_KEY',    ':&0Fn.kiU6.wqCB3}nT7KiwmkSn9Dd>H&sQ)S$9VL]m%bAL8W[&@wo{+u|} lqq2');
define('NONCE_KEY',        '!n`- ;>O]BAT|Gz;kR4h|Lb<Pn$eYc /0U7s<<:c.?5qwv/CoaNxNOkjb/Os4.Nf');
define('AUTH_SALT',        '?L:Z$D2&%|/*7L]xp(>Dg_.V(k9<abU8Wmz5VX|7D#TzgraXZp(w@SB*l1%1`ou>');
define('SECURE_AUTH_SALT', '[E1u$#t)3Pyy0Ftk]R=YfPJ/?7-%tF&J{^K6(7I8n9+q9kwvApe2&b!<|lq?<Z$3');
define('LOGGED_IN_SALT',   'sFg<eTH;|L-RQkH-Av0jJFGv;4 <UJlFmggg9zf/0kb,%#c,o+ZyK4k*;3cq(!bM');
define('NONCE_SALT',       'l:kC!FJtPH&g9.GK2I1+MNPtzso8MY&& R(JeX_K$A~_ho2=TMO?,7d$hI@cAvi=');

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
