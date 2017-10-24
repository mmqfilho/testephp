<?php

// verificacao do memcached
if (MEMCACHED && !extension_loaded('Memcached')) {
	trigger_error('Você deve instalar a extensão memcached ou desabilitar no config.', E_USER_ERROR);
}
