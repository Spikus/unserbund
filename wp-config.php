<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', '8egjr0yxt2');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'z=,|Qm(L8qu:g^aYC5BIZ&p_5`iL |p1yN`<Gk%w/exFd!9wmz<A]G270)Ze:0h)');
define('SECURE_AUTH_KEY',  'gCDumDzQ9.kK^}O-.m$PiG%g$4h q.gRS0N-RtkT!`wT7=60q-mSAoq_LoBLh>QA');
define('LOGGED_IN_KEY',    'Hut(@|(s sa$uPtI~5;vywNVBvb1j2CET=,I;2kPnGZ(F+,oVHX?DIa?< H-$bmP');
define('NONCE_KEY',        '9vt`T:?7$9<yP7i@E,@w_G5 ~&bs~Q+Y6Rjx+1J|2}c34*!B=EYBy[n,bZnlLnGe');
define('AUTH_SALT',        'm2AkI|Ww1qZfY[eNPijtFRPw/[&*vN.v,)r|q*H,Z!q^|h<zWd04+mj-XB=,8!Qe');
define('SECURE_AUTH_SALT', 'OsdWQ.k[O+L](7<Fnut2!G:Y$U%hpH{LX_:qF[]jhCNoSETL;{j)dMNT|R1HXaI|');
define('LOGGED_IN_SALT',   'tVVF@w_Oyb3(PQKnIRW2*)am^URIMl$W`Gd&6*|Zx$U;m9Yz||4F[J{%jL#P-zrC');
define('NONCE_SALT',       'id9i]bw%.dBuV?Dfhx,8Dw%k`vOsF o7#ts<LFW,yd0Yncc7hQnr@6zM6qI$rTA(');


$table_prefix = 'wp_';





/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
