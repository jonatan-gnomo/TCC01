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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hardeasy_wp10' );

/** MySQL database username */
define( 'DB_USER', 'hardeasy_wp10' );

/** MySQL database password */
define( 'DB_PASSWORD', 'i.Sp7]1b62' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'quaspzt3wvndgbky1vdyjwaydlxail8histtqtnoehdryz5pjnrcfgzzu3y6lips' );
define( 'SECURE_AUTH_KEY',  'jcty4agygpluvsx75ptqooo87ekopwughiuwe6wtar066col1ysxbxbkbte4kcxy' );
define( 'LOGGED_IN_KEY',    'kspiyxldrvbdmaycr0x05vrozp82bh0xvqp3tnwsaurwddt3qvmnspvspulnteiv' );
define( 'NONCE_KEY',        '1rdl8fi6ftaq2iadgfpjargzsmi3saoqobl9m9nhvayo0kut5unbh9whvrf4ohwi' );
define( 'AUTH_SALT',        'olxovemueadert6mfbnlfblg9uhaekkzvo7vmzprvhssmy13hzjtqklq9ouqbmld' );
define( 'SECURE_AUTH_SALT', 'jephtawaevcelbn0fsivje8nmqjsi8piel4uuxbousczca7eijyxe0du1yysa3xu' );
define( 'LOGGED_IN_SALT',   'gv8ywxu2zp47reyikfjjbkvfitjtep845xamwycznargcsqbp7e6cxqyutwyqubq' );
define( 'NONCE_SALT',       'itygz9twheromtngks6zpoglu6fo0byhwku9rhkgbstiaojuuipmj8x4419h0hoc' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wptq_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
