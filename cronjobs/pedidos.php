<?php
// pegar os dados de conexão
require_once '../config.php';

// Autoloader do composer
require_once VENDOR_DIR . DS . 'autoload.php';

use Pheanstalk\Pheanstalk;
$queue = new Pheanstalk_Pheanstalk(BEANSTALKD_HOST . ":" . BEANSTALKD_PORT);
$queue->watch("pedidotube");

// verifica se o servidor ta UP
if ( !$queue->getConnection()->isServiceListening() ){
	die('Beanstalkd not working');
}

// loop de dados
while($job = $queue->reserve()) {

	$received 	= json_decode($job->getData(), true);
	$action   	= (isset($received['action'])) ? $received['action'] : null;
	$data		= (isset($received['data'])) ? $received['data'] : null;

	echo "Recebendo $action (" . $data . ") para processar...".chr(10);
	
	// salva no banco e deleta o job
	$queue->delete($job);
	
	// nao salvou, libera o job pra ser pego novamente
	//$queue->release($job);
	
}

