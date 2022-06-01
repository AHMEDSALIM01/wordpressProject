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
define( 'DB_NAME', 'casashoop_db' );

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
define( 'AUTH_KEY',         'Cvi|;ey^{7S*^JXZf6~OY+,+]e gA1Why^?s#=/MCm14+X8,$pPhh]nylc+xGYQn' );
define( 'SECURE_AUTH_KEY',  '$x~TpCx^$VGbT`VY15hbJuY`,dRrl#8H-@XxmEk,EFE)K,]=fG{OvFNc=^Cr6R]d' );
define( 'LOGGED_IN_KEY',    'OAyVT+@KwvXE(z]yD`0+~rKYsrmd47[:9rp<?XnR<8}.5+7*Z=ed?Aw3zwJFZi2&' );
define( 'NONCE_KEY',        'R*L094RM]EL+I#V:Y&;H^cF*E2EL=^/[J##0SMZ4eX/c+e.od46Nq[_eOEY(#D{n' );
define( 'AUTH_SALT',        'W6a31fbbT*E@JQM<Kfay/Z@<L9]x:(MxOKrxdUD(|W{t-J([p:h|nvxfQW?&zsGA' );
define( 'SECURE_AUTH_SALT', 'wKT[vvoXf)1Liy(V[60f!)oAESA<e6MQUk]79z^tHbf.^e5Rv$V1}G$tc}$EJ.Db' );
define( 'LOGGED_IN_SALT',   ' -o6DQYFx){$5DGd##|=2/L~S*Tky_h(X)N46gE?MmBomFW-v#8kiB^5ph<[bHkh' );
define( 'NONCE_SALT',       'ra:mQ=7N`ACt_DIp*~7#F;;itN|Ud0:i||,^Oq->8E$NOtH~$G%z<GC3ZoO:*iv7' );

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
