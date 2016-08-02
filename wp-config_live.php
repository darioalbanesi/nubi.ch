<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nubitreu_wordpress');

/** MySQL database username */
define('DB_USER', 'nubitreu_toni');

/** MySQL database password */
define('DB_PASSWORD', 'aBf0GLi9');

/** MySQL hostname */
define('DB_HOST', 'nubitreu.mysql.db.internal');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         '7x*M+%|-<x[v=}1A13tJ=GT%?J+r?T})UjO5OaBw* s&)D6H>6ajgHr}-H~A({b`');
define('SECURE_AUTH_KEY',  'qQi$p%^`LO}yV:,F66#CL XwC|Y>=:?=vVdg$&Ur0lr7%d969;`U4nW%?)K,OkcM');
define('LOGGED_IN_KEY',    '1HVgWK:0q(ab,nzvI%&JVV8YRjI+n+1**I qKV}S&>:inLe.u=7X5~S%F,t-m<5U');
define('NONCE_KEY',        'O]X#&c)(|1x0&>(c$mLW*AQ8}o^^i-uoxNBs2>+__&7Yw4lpAF/+w?j+7%)@D4M(');
define('AUTH_SALT',        'vEXt6(!}WQ0*Sg{N)v`(Y0Z6 ~(3(w52wZlpwVulPmQ1hsNuw/V8%H1#7H=n-tG,');
define('SECURE_AUTH_SALT', '9}e`v7G9o.!-^Y4:YGoS|<Zs`USv5v[ [dQmppZ{~-HSW{mrkcm|7~>qJLu^l:}1');
define('LOGGED_IN_SALT',   '=vS8@!x6ZTP!l@wilY0TY.dz%GG^r|Jq (c-J+)J:j*9X>g_~dfgH&A;p(v.PJ-[');
define('NONCE_SALT',       '6ahWA1u3}@nIBE~i/,WLf_ey>S+dN_OE`#Qrvp1#%+,wYgxyWQBfTpVTL|%pUfJy');


$table_prefix = 'wp_';


define( 'WP_HOME', 'http://nubitreu.myhostpoint.ch' );
define( 'WP_SITEURL', 'http://nubitreu.myhostpoint.ch' );
define( 'JETPACK_DEV_DEBUG', true );
define( 'WP_DEBUG', true );
define( 'FORCE_SSL_ADMIN', false );
define( 'SAVEQUERIES', false );



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
