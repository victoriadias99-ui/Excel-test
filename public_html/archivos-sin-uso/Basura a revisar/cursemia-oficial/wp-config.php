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
define( 'DB_NAME', 'aprendee_wp829' );

/** MySQL database username */
define( 'DB_USER', 'aprendee_wp829' );

/** MySQL database password */
define( 'DB_PASSWORD', 'B[(9x5S1ep' );

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
define( 'AUTH_KEY',         'msqqkkyhcjv409uusbm3oagagr83wcw6nuh5aucbpkimg0ffmqtyl45jneybocga' );
define( 'SECURE_AUTH_KEY',  'rx69byvvqarzkktpo0hv1ydfcsjywkogs7q63dvtxbz4pgjqv0g1gs8vhca2eske' );
define( 'LOGGED_IN_KEY',    'do9wynuexc7hsbti9svqtb67hdjr4e5n9wgtb8jkeel0idjggrl3o5pdff6cslfh' );
define( 'NONCE_KEY',        'ubii6d9lowtsfhs26clt0cbvgrrgtfnwkhiionv2wcskcxvvygg2afnza3zxk0yv' );
define( 'AUTH_SALT',        'uukfn5gicaadhvbdmwt5eh787adh8n820afprlots9u8ltl0nmw4cqjz7oeuyrnk' );
define( 'SECURE_AUTH_SALT', 'm37enefvk2xrm9dopizza926gm90l6k2mwhfyydnoxlvtsxb3iwqeufxlqbqugzr' );
define( 'LOGGED_IN_SALT',   'wpkxjerw03bm0g80ynqbgnx0463xpzkvvvikcjjpfyfnnklpvmzgtppcgbx20r5h' );
define( 'NONCE_SALT',       'nutgcgkxhgzpamlfnr7tfx7qzobwd4nvazloronocpwnfcpsprr0wqfyyhldwdgi' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp72_';

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
