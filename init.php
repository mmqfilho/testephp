<?php

// verificacao da extensao do memcached
if (MEMCACHED && !extension_loaded('Memcached')) {
	trigger_error('Você deve instalar a extensão memcached ou desabilitar no config.', E_USER_ERROR);
}

// para debugar
function debug( $data , $fim = false ){
	echo '<pre style="display: block; text-align:left;">';
	var_dump($data);
	echo '</pre>';
	
	if ($fim){
		die();
	}
}
