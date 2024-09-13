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
define( 'DB_NAME', 'qbn' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

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
define( 'AUTH_KEY',         'Ji=0N-MiFfX9U+IEvPdKfS}{s?{5sgK;de7DR #[HvEF>Rmr|0Irexs+^uPM#E]c' );
define( 'SECURE_AUTH_KEY',  'Y6jHEDO%`#/:kHk<Zz@eoj3e2`en{,Hx04#FOKq@vlM=cF72BZeD-_$f/W{% u?n' );
define( 'LOGGED_IN_KEY',    '0+tGlJDqX*Ab2%WIGKMOZr1j0YYp??.)^iB?~F1Sn?9K,O.|$}iZgZ, [8>tW^KL' );
define( 'NONCE_KEY',        '/d/v{T8LF?<CDrT.*rivLdS4ZSPc*3^wB`~Ndi/L{f&rPcMsuGNdSscw]I<9oe*w' );
define( 'AUTH_SALT',        '|x+>`hmO-TO(l<l?uH$swZ!~?W w<#>EC |vL{{yL-Z[Dm8?Rbb|D7b2(#=Kn+A{' );
define( 'SECURE_AUTH_SALT', 'eJ^?PK.2Gh;@)=4jb<7zO7I~pfG.[#wT7X;LAQZ8-?Qeip,;l=R/c}&Krb]c..6B' );
define( 'LOGGED_IN_SALT',   'gA}2+&CxdwO?JFFJF:.mcF&}.1JP9gV;/o6UeBy!,wT*UrYN#6Q#@rC)~0$1pQh@' );
define( 'NONCE_SALT',       'ntw[ZT3V1?A]$z6mx`E!1tgWf~Kv92 HNt*7lG&^gzKZiL`.s&NLS;L])zQd%l+u' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
