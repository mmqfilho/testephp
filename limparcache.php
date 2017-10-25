<?php
$cache = new Memcached();
$cache->addServer('localhost', 11211);

if ($cache->flush()) {
	echo "O cache foi apagado com sucesso!";
}else{
	echo "Ocorreu um erro desconhecido ao apagar o cache";
}

?>


