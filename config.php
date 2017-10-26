<?php

/**
 * Configurações do sistema
 */
// diretorios
define('DS',			DIRECTORY_SEPARATOR);
define('ROOT_DIR',		dirname(__FILE__));
define('INC_DIR',		ROOT_DIR . DS . 'inc');
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
define('MEMCACHED',				false);
define('MEMCACHED_EXPIRATION',	time() + 600); // 10 minutos

// produtos
define('PAGINA_QTD',		10);	// quantidade maxima de produtos por página
define('ORDENACAO_DEFAULT',	2); 	// menor preço

/**
 * Inicializador do sistema
 */
// deixado no fim do arquivo propositalmente
require_once INC_DIR . DS . 'init.php';