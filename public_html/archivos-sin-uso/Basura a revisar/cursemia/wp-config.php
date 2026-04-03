<?php

define('WP_CACHE', true); // Added by WP Rocket
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
define( 'DB_NAME', 'aprendee_cursemia_test' );

/** MySQL database username */
define( 'DB_USER', 'aprendee_cursemia_test' );

/** MySQL database password */
define( 'DB_PASSWORD', 'cursemia_test' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'ymS=^+DTo;a29rWV#<a4{T k3UP}(!zb~S`bs,wm,*~MWSI t&AL:pp;<f3!Y}LQ' );
define( 'SECURE_AUTH_KEY',   'gw#4y1z)exBeB|YObzj(F{[@#<%5qn`BzIfr+P:C:-:@C/C>`tE]3A+u5f/9{v,?' );
define( 'LOGGED_IN_KEY',     'BCz0Mu:4vmjeWHya~dReu7:A7`h9/p^3~HPE_n5O:`xf/g8p7c90uD5:-V)~!o_X' );
define( 'NONCE_KEY',         'K2c*!}a(;6Prn~ ]0M~S$Z{/>yD* sQAp1M4!wp[9?.;N`aD=QHv@ezt#OfTTOSL' );
define( 'AUTH_SALT',         'wR:ab8]%(Mn(/JVN]o[:-(ulDDHoGaLezQ*BlXIsI(`Cl03xfVxB8N;%G0foB0;U' );
define( 'SECURE_AUTH_SALT',  'DLR~O2=rc:%F]!ep$~K&5)zwY1s26xG43F6qe,?sBvyyp+e^cspPIJa$A1,-Ot/D' );
define( 'LOGGED_IN_SALT',    '(7KQv<7FM+W#;CFSTkQ,<PmLz#ci~Gr#u|AE/lO**SaHjJ8p9?N2?h<mv}.[BNAD' );
define( 'NONCE_SALT',        'r2xg ~k8`l.r6o0bX8(7m^n+gjE7e-5a {i,^&)L=Bv.:uw}Dx)VAw;e#&olj_< ' );
define( 'WP_CACHE_KEY_SALT', 'oT202} ^6K={ aC5+wANe ?F6s0s^5`.__w^)ATB^C$W&VjG|V&VAPU}Lf=~s.rZ' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
