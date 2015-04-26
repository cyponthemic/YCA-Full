<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'yarracit_wordpress');

/** MySQL database username */
define('DB_USER', 'yarracit_wp');

/** MySQL database password */
define('DB_PASSWORD', 'RKDG.72wqo');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '2XYF;YY0r3ZK~@!emZxHPHQOI$/L?GF!(gS\`UPOzuZ?Kz~GF>=T5i<zK9NQ:C!:@#wK/');
define('SECURE_AUTH_KEY',  'G@!cHC-L|?j;L3;TDZq/kDO0TSyxCd@<\`5u/H0H#qg|w9\`b!9>BcaqmCWxz;=4p=2Z=ck3fE2d_Psw@7f');
define('LOGGED_IN_KEY',    '/H?dbwO|IsyuZGKc|y@H3B$_LaZaLc<v*9$tC:Yhu:cx<p83l>U\`rV@FpRd<(NUiwc8WugG');
define('NONCE_KEY',        'WX(iY:v<Su$2b;>;M2o2p=Jn(W?7kpqsL<d3n)zqPcs9$Qy>=/t9vN9lPNMobgOHA$O9v!w|');
define('AUTH_SALT',        'v@Q5\`O73Vi9m;P!\`mXvDjuHD>oTYWJWCfcO<;AwI5CfIab5Z=Uxff57:/1cSx1!XA;j^p):>7hj');
define('SECURE_AUTH_SALT', 'UpfBZnmqtZt9cr3\`>C>Az|T@cg$2y/H<7ye>5hp>6ZJ)nfjR5\`Dz-D=SDJVpXr?1$JGpeke-');
define('LOGGED_IN_SALT',   '(fW;/!gi<VPB8Up@oW?J0|L!=lH_^#xv_9TAl2>e052HY#xeZ#4QFnRlrjfqTfm9x_K>N7O');
define('NONCE_SALT',       'YtR:l)dJPSls6v3qql$7SPJw:kyHdMO_an2TMBhA!799ruPo1iQg!w(/eLHNkkdg|i?RfM$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'YCAwp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
