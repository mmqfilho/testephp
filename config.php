<?php

// diretorios
define('DS',			DIRECTORY_SEPARATOR);
define('ROOT_DIR',		dirname(__FILE__));
define('CLASS_DIR',		ROOT_DIR . DS . 'classes');
define('JS_DIR',		'js');
define('CSS_DIR',		'css');
define('IMG_PROD_DIR',	'images' . DS . 'products');

// banco de dados
define('DB_HOST', 		'localhost');
define('DB_DATABASE', 	'testephp');
define('DB_USERNAME', 	'root');
define('DB_PASSWORD', 	'advance');

// memcached
define('MEMCACHED',				true);
define('MEMCACHED_EXPIRATION',	time() + 600); // 10 minutos

// deixado no fim do arquivo propositalmente
require_once 'init.php';