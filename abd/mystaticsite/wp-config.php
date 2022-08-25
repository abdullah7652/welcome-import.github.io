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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'abd' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         '4C*j$C{2<HxLyPOj?VpTm[^;=QQUb2JFn?B,7/%9,PxFv52ugaaRH][o@7quGSIc' );
define( 'SECURE_AUTH_KEY',  'C!sP8z+NV01][6)6JC^BFhXCzCs7$%d(,GSn}{Im_m[q Ul*uYe84kG`/3uZ0AA&' );
define( 'LOGGED_IN_KEY',    'v`:0bzN,B$;S%jmrx1Z0<9m7(j{/|D1np#}By{.%6X.-5Nk9.kKE0{&L{9v[i/^T' );
define( 'NONCE_KEY',        'z,Q1}c>&#ZWYT8CPTuTt.h<AO#g]{?.k (R6Z6Wt;8;lvEy}ze?o0t)WE&3yQ7?O' );
define( 'AUTH_SALT',        'ERB%&+Gk!WME3^70v^awx-XoR621a@M HRqQFod^p}z~/-!R1?O0G~L0hx:_2r9,' );
define( 'SECURE_AUTH_SALT', 'H{<9w-Iw`:~ h tn4GLU^W*#zfN@U*tG{g`d#=h/-P+tA(M~,mP.cP3D1B4g4:3k' );
define( 'LOGGED_IN_SALT',   'd<jR*h]]:{nhA 7%Dw+;u J2R[<v1LcUpA%k<Jk8q7Z.fbJz@PUs`7Z7o!}ZxOrb' );
define( 'NONCE_SALT',       '[ojCoRuZ#FO2P+kM!ue BSa3]1S*Pu>9;jf9!mCIw 5w:#1^v6x+y-c]K|p>]vhC' );

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
