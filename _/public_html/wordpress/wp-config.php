<?php
define('WP_AUTO_UPDATE_CORE', false);// Эта настройка нужна, чтобы убедиться, что обновлениями WordPress можно корректно управлять в WordPress Toolkit. Удалите эту строку, если этот сайт WordPress больше не управляется WordPress Toolkit.
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hoteluy1_wp_qun95' );

/** MySQL database username */
define( 'DB_USER', 'hotel_wp_kz2r0' );

/** MySQL database password */
define( 'DB_PASSWORD', '!8aA0OHf6z' );

/** MySQL hostname */
define( 'DB_HOST', 'srv-pleskdb48.ps.kz:3306' );

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
define('AUTH_KEY', 'h!9m/L~4Fz28VSi_jk9|Cj%!weT8e1LN5_g|Hmj*]k2szgI!twoavB77eCHtOR31');
define('SECURE_AUTH_KEY', '/P2r9+cFx#LY#n(~a]*aKnjjrs97Ex#1G8)X[Feb~jy|(;74VIdCk:8Cfk|61K~d');
define('LOGGED_IN_KEY', 'zUwj#:uv*0EU(/o6O*H+XcU5eG%Y2n3HKWq45fff#k6ok3(fl8k#zS!f#[*817@i');
define('NONCE_KEY', '_s&]Bvfn3#)9WV&olhpVor6T7)|5r4[NXE-Hv#E!tge%yU[fh-)7#%&70OZ3Y1A!');
define('AUTH_SALT', 's]g2!a6*EZZf9-D5-;MI~pM(3wY7k88/2#WrmR]3a1+Qt1LjNF05wb9DzM77RME0');
define('SECURE_AUTH_SALT', 'p4LN)W++)7Qz:%(pBYN483Zrm%FL(4jl/U+#y6I7UBe%p[xQ9A5ijX~L3O9Wi:vS');
define('LOGGED_IN_SALT', '[x3m4nhNkN#kV]0~|Ms/FmUu2la@0_][&YzS4VA5oE&o@lz65%4|1q!QNwdq4jQH');
define('NONCE_SALT', 'wUJ:+6Ri%2wV4h|Hp4YZ*F%/474W|#4&7L6Q(Qe6b-@NQkx|64%n+2~0t&p3R(Xv');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'v1IBCn6B_';


define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
