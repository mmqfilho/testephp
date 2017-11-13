<?php
/**
 * Exibição de erros
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * verificacao da extensao do memcached
 */
if (MEMCACHED && !extension_loaded('Memcached')) {
	trigger_error('Você deve instalar a extensão memcached ou desabilitar no config.', E_USER_ERROR);
}

/**
 * Autoloader do composer e de classes do projeto
 */
require_once VENDOR_DIR . DS . 'autoload.php';

/**
 * DEPRECATED com a inclusão do composer
 * Autoloader de classes do projeto 
 */
//require_once 'autoloader.php';

/**
 * Funções em geral
 */
require_once INC_DIR . DS . 'functions.php';

/**
 * Cria obj de querys de dados
 */
$md = new models();