<?php

/**
 * Configurações do sistema
 */
// diretorios
define('DS',			DIRECTORY_SEPARATOR);
define('ROOT_DIR',		dirname(__FILE__));
define('INC_DIR',		ROOT_DIR . DS . 'inc');
define('VENDOR_DIR',	ROOT_DIR . DS . 'vendor');
define('JS_DIR',		'js');
define('CSS_DIR',		'css');
define('IMG_PROD_DIR',	'images' . DS . 'products');

// banco de dados
define('DB_HOST', 		'localhost');
define('DB_DATABASE', 	'testephp');
define('DB_USERNAME', 	'root');
define('DB_PASSWORD', 	'advance');
define('DB_MIN_FT',		4);

// memcached
define('MEMCACHED',				true);
define('MEMCACHED_HOST',		'127.0.0.1');
define('MEMCACHED_PORT',		'11211');
define('MEMCACHED_EXPIRATION',	time() + 600); // 10 minutos

// beanstalked
define('BEANSTALKD',			true);
define('BEANSTALKD_HOST',		'127.0.0.1');
define('BEANSTALKD_PORT',		'11300');

// produtos
define('PAGINA_QTD',		10);	// quantidade maxima de produtos por página
define('ORDENACAO_DEFAULT',	2); 	// menor preço