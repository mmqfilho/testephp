<?php

/**
 * Apresenta dados em tela
 * @param unknown $data
 * @param boolean $fim
 */
function debug( $data , $fim = false ){
	echo '<pre style="display: block; text-align:left;">';
	var_dump($data);
	echo '</pre>';

	if ($fim){
		die();
	}
}

/**
 * Função para calcular valores da paginacao
 *
 * @param integer $currentPage - página atual
 * @param integer $lastPage - última página
 * @param integer $ruleLenght - tamanho da regua
 * @param integer $ruleLenghtReduced - tamanho da regua reduzida (não implementado)
 * @return array
 */
function calculaEscala($currentPage, $lastPage, $ruleLenght = 7, $ruleLenghtReduced = 7){
	$firstPage = 1;
	$originalLastPage = $lastPage;
	$isp = false;
	$fsp = false;

	// se a ultima pagina é menor que a regua iguala a escala da regua
	if ($lastPage <  $ruleLenght){
		$ruleLenght = $lastPage;
		// calcula o ponto da metade da regua
		$middleScale = floor($ruleLenght / 2);

		// verifica a pagina anterior
		$previousPage = $currentPage - 1;
		if ($previousPage < 1) $previousPage = 1;

		// verifica proxima pagina
		$nextPage = $currentPage + 1;
		if ($nextPage > $originalLastPage) $nextPage = $originalLastPage;

		// total de paginas maior que a escala da regua
	}else{
		// calcula o ponto da metade da regua
		$middleScale = floor($ruleLenght / 2);
		// paga a pagina que será a primeira a ser mostrada na escala
		$firstPage = $currentPage - $middleScale;
		// pega a pagina que será a ultima a ser mostrada na escala
		$lastPage = $currentPage + $middleScale;

		// a primeira page da escala nao pode ser menor que um
		if ($firstPage < 1){
			$firstPage = 1;

			// seta reticências no inicio da escala
		}elseif($firstPage > 1){
			$isp = true;
		}

		// a ultima page nao pode ser maior que o total de paginas
		if ($lastPage > $originalLastPage){
			$lastPage = $originalLastPage;

			// seta reticências no fim da escala
		}elseif($lastPage < $originalLastPage){
			$fsp = true;
		}

		// verifica se a pagina atual esta na escala
		if ($currentPage < $firstPage){
			$currentPage = $firstPage;

		}elseif ($currentPage > $originalLastPage){
			$currentPage = $originalLastPage;
		}

		// verifica a pagina anterior
		$previousPage = $currentPage - 1;
		if ($previousPage < 1) $previousPage = 1;

		// verifica proxima pagina
		$nextPage = $currentPage + 1;
		if ($nextPage > $originalLastPage) $nextPage = $originalLastPage;

	}


	return array('firstPage' => (int) $firstPage ,
			'lastPage' => (int) $lastPage ,
			'previousPage' => (int) $previousPage ,
			'nextPage' => (int) $nextPage ,
			'originalFirstPage' => (int) 1 ,
			'originalLastPage' => (int) $originalLastPage ,
			'currentPage' => (int) $currentPage ,
			'scale' => (int) $ruleLenght ,
			'middleScale' => (int) $middleScale ,
			'initialSuspensionPoints' => (boolean) $isp ,
			'finalSuspensionPoints' => (boolean) $fsp );
}
