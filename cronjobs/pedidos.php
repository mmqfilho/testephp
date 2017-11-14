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

echo 'Iniciando listening de pedidos'.chr(10);

/**
 * Cria obj de querys de dados
 */
$md = new models();

// loop de dados
while($job = $queue->reserve()) {

	$received 	= json_decode($job->getData(), true);
	$action   	= (isset($received['action'])) ? $received['action'] : null;
	$data		= (isset($received['data'])) ? $received['data'] : null;
	$user_id	= (isset($received['user_id'])) ? $received['user_id'] : null;

	echo "Recebendo $action (" . $data . ") para processar...".chr(10);

	if (!is_null($data) && !is_null($user_id)){
		$_SESSION['user_id'] = $user_id;
		$pedido = $md->savePedido($data, true);

		if ($pedido['last_inserted_id'] > 0) {
			// salva no banco e deleta o job
			$queue->delete($job);
			echo 'Pedido processado, apagando da fila'.chr(10);
			
		}else{
			// nao salvou, libera o job pra ser pego novamente
			$queue->release($job);
			echo 'Pedido '.$data.' NÂO processado'.chr(10);
		}
	}else{
		// cancela pedido com erro
		$queue->bury($job);
		echo 'Pedido '.$data.' com erro, retirando da fila'.chr(10);
	}
	
	
}

