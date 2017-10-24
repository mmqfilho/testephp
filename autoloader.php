<?php

/**
 * Loader para carregar as classes
 * @param string $class_name
 */
function __autoload($class_name) {

	if (file_exists(CLASS_DIR . DS . $class_name . '.php'))
		include_once CLASS_DIR . DS . $class_name . '.php';

}