<?php

/**
 * DEPRECATED com a inclusão do composer
 * 
 * Loader para carregar as classes
 * @param string $class_name
 */
function __autoload($class_name) {

	if (file_exists(INC_DIR . DS . $class_name . '.php'))
		include_once INC_DIR . DS . $class_name . '.php';

}