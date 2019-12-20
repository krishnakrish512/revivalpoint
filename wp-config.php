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
define( 'DB_NAME', 'revivalpoint' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY', 'XIhVm>Dj}])5oU;cmVQ+d,_`U)v#dTS}~4,gB&WHpB1]8m51)nZH}#?V*ml,GR>;' );
define( 'SECURE_AUTH_KEY', '{jZ2/7&s9}hvL%^gp3<p *6CI$6{YML;3>x:0Lh_oiA_;r8bTvfYoYt:BLh2O}Y@' );
define( 'LOGGED_IN_KEY', '<ql!fC@Tg[cZ-$REYCYS:$9vh50$pn0WnW#s>+C:mkI7w4A;bc+4OzjG`c&o.dUc' );
define( 'NONCE_KEY', '>fm4VlB8</qx_/uL#jZ46MQ2*t7-:fdb^3g|2yuza!iSK[0m$[ Dp ^snelHzI:F' );
define( 'AUTH_SALT', ':^LP7ee)aspzzgwb}j6qe`fvV4MG)|K-3J*8t{3l|znvL!HBLXGzw^I:bAxuS;hs' );
define( 'SECURE_AUTH_SALT', '}3thNsI#TrQ7% K:|od8Tw6 ;Dtxqb4F-%lToSTB<{xYZ0RgkD(JKK(|,RWi=D4B' );
define( 'LOGGED_IN_SALT', '063Pzc5%j[y-qF1fRM^.{4D398}Dc/5x%2%Z.sv_`RXDk#S2hI4=8o04f>Kxajq_' );
define( 'NONCE_SALT', '7muF0?BhWUm>mHHt>+#&@f)~gldI6VNQd+|3Ba<.XK}SH?[~ZuRn= KpFA$94r$m' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
