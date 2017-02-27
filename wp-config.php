<?php
# Database Configuration
define( 'DB_NAME', 'wp_stanspain' );
define( 'DB_USER', 'stanspain' );
define( 'DB_PASSWORD', 'SEeQqQqjAX6i7UUSeuuf' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         ',Y^Y2)_snGGr-^Q2L2DP+X^Cem@W!CzBgtaLcndCd|B(6HczjWSS-#^*:P<oe6w,');
define('SECURE_AUTH_KEY',  'zk}%)03s)22GdlFNc;c|yj:AZ1O4)bb5&YI.3->9Mi.1-F>!-Jl-McXtSUK~k7SP');
define('LOGGED_IN_KEY',    'Xsn1RJ0?#IvM2)-f:/.h(V=jm$P;:@XETBC+.3?:}+4h#e`6*J|$P/R>_I7${ /h');
define('NONCE_KEY',        '|cGbBNk5g.J69k0H-M^C&y{[*#;bKQ:Nw9,0Dh$X.-Z)3xx1|otl<z~D x%JDjiS');
define('AUTH_SALT',        '?T-~gORh|3NgLN|t?{)S><aoHopy`E2O}M@n7|3KKm)s]r^&1+]]:^O|FgB1-3ba');
define('SECURE_AUTH_SALT', '-h`C~H!UO0rFVz$K-[u_wUpo=-^^^R99_Q^hP>0YJGx(B%N:,$~Nm}>f]tz[K#/x');
define('LOGGED_IN_SALT',   ' `#X(^dxBv<~raIG[C?A_-0 $lpR_1LQb-%+|&|~VN85(~V]~Y+u?m@t|61CIxRz');
define('NONCE_SALT',       '({ra2Qn<a&.?XxX{K3>v?<N)SK2n@E?)^Q$;ZU$?(n|=0sr&VfLMB1i4FCbfooF5');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'stanspain' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'a4403a8792a8027368af8f92586d68d2c1e05e92' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '30862' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', false );

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

$wpe_all_domains=array ( 0 => 'stanspain.wpengine.com', 1 => 'salvaescalerasrectas.com', 2 => 'incisa-subescaleras.com', 3 => 'www.stannah.es', 4 => 'www.salvaescalerasrectas.com', 5 => 'www.incisa-subescaleras.com', 6 => 'www.salvaescaleras-rectas.com', 7 => 'salvaescaleras-rectas.com', 8 => 'www.incisa.cat', 9 => 'incisa.cat', 10 => 'www.incisa.es', 11 => 'incisa.es', 12 => 'stannah.es', );

$wpe_varnish_servers=array ( 0 => 'pod-30862', );

$wpe_special_ips=array ( 0 => '162.13.180.187', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( 0 =>  array ( 'match' => 'www.stannah.es', 'zone' => '1rbslw3qd0jh497lowf4vnbc', 'enabled' => true, ), );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

#define( 'WP_SITEURL', 'http://www.incisa.es' );

#define( 'WP_HOME', 'http://www.incisa.es' );

define( 'DOMAIN_CURRENT_SITE', 'www.stannah.es' );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );

define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
