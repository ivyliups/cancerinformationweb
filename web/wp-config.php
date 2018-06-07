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
define('DB_NAME', 'cancerinfo_wp359');

/** MySQL database username */
define('DB_USER', 'cancerinfo_wp359');

/** MySQL database password */
define('DB_PASSWORD', 'S-3jeXp1!8');

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
define('AUTH_KEY',         'x77njok8eatvbusxi8wb3cmjhud9bbifzolz13r1su6mj8biokwkttrjneludjhh');
define('SECURE_AUTH_KEY',  'wzbk3btsg2nqcnv1lbismvwrqmxvvbuihaws1yhnbvly1cvzk8rpn1lr9e7aav17');
define('LOGGED_IN_KEY',    'sgl8mzo983e5u2c5qh6ef3eeqvvl3bjprfzudvl40tjhfwv5otzet7eobwcgyjnx');
define('NONCE_KEY',        '3pmqc8cykrjusi2ygew0gcgua1fyjjywyipuxqzwrbzntblaystqosc1dppnb7cf');
define('AUTH_SALT',        'hqcmw8nebzmzm69q4rrmodwo1r6ucmm9hmcl0jnlatvetqqur2w48g2roxumhumt');
define('SECURE_AUTH_SALT', 'pdaxnhyvkedilzeagzbq5b9tbrhmgwaozntpjytjn3wjftkj8gfkz32qiqtizce3');
define('LOGGED_IN_SALT',   'vkdcqzjpcihmurd3l9okpbztzm1oanyhb7vzstnjbjzo3wyvbceluty2ig46jiab');
define('NONCE_SALT',       'a1qyaijvntlihlqhkx6fvpkqfwixhk1rygxkct04cznia40t0w8e5jion5lfud8s');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpsq_';

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
