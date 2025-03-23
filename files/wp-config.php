<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** Database username */
define('DB_USER', 'wordpress');

/** Database password */
define('DB_PASSWORD', 'wordpress');

/** Database hostname */
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
define('AUTH_KEY', '~VkcUe*6T_(1;,XmxSnC!~(#H;s D)w7yo{oc;TaSTS(Vq${##:a~a1iMjSh%Owq');
define('SECURE_AUTH_KEY', '3s{;]M)LvwJe0[jhP%ICgy>hN8.IQ.82?,)wZ^tc~|KSI+D@fV)o0Mh!1>IUG@6N');
define('LOGGED_IN_KEY', 'owMy&)_;g:m]@F%$z]DF!6#vRKBD=TQ<J,K`PmZG7hcikw0vVQ^:P:1G%?%w@JD`');
define('NONCE_KEY', ';ua#$SA^DJUj?(&:9ePGuCE4+5>#A?Uj_q$dcq|Rj@Pa07aB!Td#k?%@`r+PP02x');
define('AUTH_SALT', 'U1?=U@M6ieDdQL-b!IGxUJ3N>FP(fUr%,a_eS8jB}y}mz,Xn~U}?Lmd|| =xIxG}');
define('SECURE_AUTH_SALT', 'l`7U1}d=._}yE}S%%%80juuj,. .Q9podN_y)b5im(9T{rq2kc`Xo5^ ^:Q+bb 7');
define('LOGGED_IN_SALT', 'Uo8#OzTQ(5Ya??i*]KHJ!]hkZ`H_z*?re{2@4)IA~>dbCCfb{QCI{?&+&G~tO~4|');
define('NONCE_SALT', 'pJ,MnTX4hyR!~Af*_z)6i3GJY&[2}WzB[Fym1f82)l3PU,|fS.(]]mU4h~#UfZWL');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
