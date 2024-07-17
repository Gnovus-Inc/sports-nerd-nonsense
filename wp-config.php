<?php
# Database Configuration
define( 'DB_NAME', 'wp_sportsnerdnstg' );
define( 'DB_USER', 'sportsnerdnstg' );
define( 'DB_PASSWORD', 'ziUy_Z399TDCBWyfSNX1' );
define( 'DB_HOST', 'db:3306' );
define( 'DB_HOST_SLAVE', 'db:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'a;~|eEA(-~yM&wx,K9}U1D3L;245&WV=1Dq-e|hx9c~w+,ys074lxhvS`}8/n^RV');
define('SECURE_AUTH_KEY',  '/>zc|+B;y{f6^,/[iF-{Ww2Sv;CN7+[jT$a<u7nl;W<-X-Z}UYmo;Q~onYu6j(8f');
define('LOGGED_IN_KEY',    '&[!Tv{q0)`i(peB!Xyj8/}?wC>b@-m,w}+lRL+R|pz4dq,g~7EWY3A*`6)`QjDV+');
define('NONCE_KEY',        's ?R){oH~09Uv3iJ[nsVO-P|:JEe?|F}3VQt^|ouIr~EV~FqP.F,yu{d( dpr-%f');
define('AUTH_SALT',        'Q5Pf@`|ky@(j5H&:g{`t5#*J<,Zb/Ykjp]ao-mOp+xr>AP9F943}vs5Reb+X2iK<');
define('SECURE_AUTH_SALT', 'i%FO]*[P}byQ;nN/lsxVJ-6?)|Gtie68;$ ?9-5Emg!nf*+(b$:6kK !-xO{OVmi');
define('LOGGED_IN_SALT',   'e{u:TSAtX#o-3_.:g6_5k{rlb1TtO7*og2ti0+-vPQ-:6>;@TLuy@;=uyen|[-*8');
define('NONCE_SALT',       '~[3zq#l_=~^Qgd*8nJZ<!^^Q&6h_f#$jx9@&c,T5+`[yd^]G8nCwfKm1G.&4[4#y');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'sportsnerdnstg' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', '4c51e78ffdd361a8acd62a5464fabc632f076504' );

define( 'WPE_CLUSTER_ID', '141542' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'sportsnerdnstg.wpengine.com', 1 => 'sportsnerdnstg.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => 'pod-141542', );

$wpe_special_ips=array ( 0 => '104.197.173.142', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
