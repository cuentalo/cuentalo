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
define('DB_NAME', 'wordpress-db');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin2018');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'sfA)L{9O<S!u>QeXoJv]PQb r-~:9&OH^o0PN?]|[ xYUdBjvm,DQ.v+Fs-WmFHU');
define('SECURE_AUTH_KEY',  'z8nKMZnAC:L1@Fl4Q,lTtH:D;Z|Z6m3utR;*0T~iZf;jP,Ih9TGaqCv7FJjeb1<L');
define('LOGGED_IN_KEY',    'h>Esh89gbDf1#HNWoA2!&m<kxM@+v&p1n$cM.@,ff}^`fB58=`zh=su=fqDpox0V');
define('NONCE_KEY',        ':5lm^,aq^!{F-q=j`<4vy^!]J)lFOl;s8 fOK)l#4+_7dN-N39D%RJmwbxn|vYY#');
define('AUTH_SALT',        '4lK{C4|^*}p.&e@3=1t3(Q?-Se-CrlV+c$07&rg693|L@pH55|MZ3i|3reX.RIMA');
define('SECURE_AUTH_SALT', '^aa0]qAgSyH|9dF+I6=z7DHR% DDxR#0j]qi.@xkBAt@o5r;NVdi$@GJra0,G2#<');
define('LOGGED_IN_SALT',   'CFA3c6.&x?LcEN=RT78y2rA`,#Zi%uNZY|{fHwuRz)9=j[:dSYtKPiFGIdy+|4N5');


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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
