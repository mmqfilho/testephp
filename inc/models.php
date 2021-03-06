<?php
use Pheanstalk\Pheanstalk;

/**
 * Armazena todas as querys do sistema
 */
class models extends databaseMysqli {
	
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * Pega as categorias
	 */
	public function getCategorias() {
		try {
			$sql = 'SELECT * FROM categorias ORDER BY categoria_nome';
			$key = 'lista_categorias';
			
			return $this->execute($sql, $key);
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Pega os produtos
	 * @param integer $order
	 * @param string $categoria_id
	 * @param integer $pag
	 * @param string $texto
	 */
	public function getProdutos($order = 1, $categoria_id = null, $pag = 1, $texto = null){
		// ordenacao
		switch ($order) {
			case 1:
				$order = 'p.produto_nome';
				break;
			case 2:
				$order = 'p.produto_preco ASC';
				break;
			case 3:
				$order = 'p.produto_preco DESC';
				break;
			default:
				$order = 'p.produto_nome';
				break;
		}
		
		// totalizacao
		// join causa deturpação quando um produto pertence a mais de uma categoria
		$sql_total = 'SELECT COUNT(1) AS total 
  						FROM (SELECT p.produto_id, COUNT(1)
          						FROM produtos p 
          						JOIN produtos_categorias pc ON (pc.produto_id = p.produto_id) 
				               WHERE 1=1 ';
		if (!is_null($categoria_id)) {
			$sql_total .= 	   ' AND pc.categoria_id = ' .$categoria_id ;
		}
		if (!is_null($texto)){
			$sql_total .= ' AND MATCH (produto_nome, produto_descricao) AGAINST ("'.addslashes($texto).'") ';
		}
         $sql_total .=	'      GROUP BY p.produto_id) t';
		
		$key = 'lista_produtos_totais';
		$ret = $this->execute($sql_total, $key);
		$totalProdutos = $ret['result'][0]['total'];
		$totalPaginas = ceil($totalProdutos / PAGINA_QTD);
		
		// nao deixa pegar uma página inválida
		if ($pag < 1 || !preg_match('/^\d+$/i', $pag)){
			$pag = 1;
		}
		
		if ($pag > $totalPaginas){
			$pag = $totalPaginas;
		}
		
		// calcula posicao inicial da linha no banco
		$inicio = ($pag * PAGINA_QTD) - PAGINA_QTD;		
		
		$sql = 'SELECT DISTINCT p.produto_id, p.produto_nome, p.produto_descricao, p.produto_imagem, p.produto_preco 
				  FROM produtos p
				  JOIN produtos_categorias pc ON (pc.produto_id = p.produto_id)
				 WHERE 1=1 ';		
		if (!is_null($categoria_id)) {
			$sql .= ' AND pc.categoria_id = ' .$categoria_id ;
		}
		if (!is_null($texto)){
			$sql .= ' AND MATCH (produto_nome, produto_descricao) AGAINST ("'.addslashes($texto).'") ';
		}
		$sql .= ' ORDER BY ' . $order;
		$sql .= ' LIMIT ' . $inicio . ', ' . PAGINA_QTD;
		
		$key = 'lista_produtos';
		$ret = $this->execute($sql, $key);
		
		// inserir mais infos no retorno de dados
		$ret['query_total'] = $sql_total;
		$ret['total_produtos'] = $totalProdutos;
		$ret['total_paginas'] = $totalPaginas;
		$ret['pagina_atual'] = $pag;
		
		return $ret;
	}
	
	/**
	 * Retorna dados de um produto
	 * @param integer $id
	 */
	public function getProduto($id) {
		
		$sql_produto = 
			'SELECT p.produto_id, p.produto_nome, p.produto_descricao, p.produto_imagem, p.produto_preco
			   FROM produtos p
			  WHERE produto_id = '. $id ;
		
		$key = 'detalhe_produto';
		$ret_produto = $this->execute($sql_produto, $key);
		
		$sql_caracteristicas = 
			'SELECT pc.*, c.caracteristica_nome
 			   FROM produtos_caracteristicas pc
 			   JOIN caracteristicas c ON (c.caracteristica_id = pc.caracteristica_id)
 			  WHERE pc.produto_id = ' . $id;
		
		$key = 'detalhe_produto_caracteristica';
		$ret_caract = $this->execute($sql_caracteristicas, $key);
		
		return array('produto' => $ret_produto['result'][0], 'caracteristicas' => $ret_caract['result']);
		
	}
	
	/**
	 * Verifica se email já foi utilizado
	 * @param string $email
	 * @return boolean
	 */
	public function verificaEmail($email){
		$sql = "SELECT COUNT(1) as total FROM clientes WHERE cliente_email = '{$email}'";
		$key = 'email_existe';
		$ret = $this->execute($sql, $key);
		return ($ret['result'][0]['total'] > 0) ? true : false;
	}
	
	/**
	 * Faz login
	 * @param string $user
	 * @param string $pass
	 * @return boolean
	 */
	public function login($user, $pass){
		$sql = 'SELECT cliente_id 
				  FROM clientes 
				 WHERE cliente_email = "'.addslashes($user).'" 
				   AND cliente_senha = "'.md5($pass).'"';
		$ret = $this->execute($sql);
		if ( isset($ret['result'][0]['cliente_id'])) {
			return $ret['result'][0]['cliente_id'];
		}else{
			return false;
		}
	}
	
	/**
	 * pega dados do cliente
	 */
	public function getUsuario(){
		$sql_user = "SELECT cliente_id, cliente_email FROM clientes WHERE cliente_id = " . $_SESSION['user_id'];
		$ret_user = $this->execute($sql_user);
		
		if (isset($ret_user['result'][0]['cliente_id'])) {
			$sql_endereco = "SELECT * FROM clientes_endereco WHERE cliente_id = " . $ret_user['result'][0]['cliente_id'];
			$ret_endereco = $this->execute($sql_endereco);
		}

		return array('user'=>$ret_user['result'][0], 'endereco'=>$ret_endereco['result'][0]);
		
	}
	
	/**
	 * Cadastra ou altera os dados de um cliente
	 * @param unknown $data
	 * @throws Exception
	 * @return boolean
	 */
	public function setUsuario($data){
		// update
		if (isset($data['user_id']) && $data['user_id'] > 0 ){
			
			try {
				$this->setAutocommit(false);
				$this->beginTrans();
				
				$sql_user = 'UPDATE clientes SET cliente_email = "'. $data['email'] .'" ';
				if ( isset($data['senha']) && $data['senha'] != '' && isset($data['senha2']) && $data['senha2'] != '' && $data['senha'] == $data['senha2']) {
					$sql_user .= ', cliente_senha = "'.md5($data['senha']).'" ';
				}
				$sql_user .= ' WHERE cliente_id = ' . $data['user_id'];
				$ret = $this->execute($sql_user);

				$sql_endereco = 'UPDATE clientes_endereco SET 
						endereco_logradouro = "'.$data['logradouro'].'", 
						endereco_numero = "'.$data['numero'].'", 
						endereco_bairro = "'.$data['bairro'].'", 
						endereco_cep =  "'.$data['cep'].'"
						WHERE cliente_id = '. $data['user_id'];
				$ret2 = $this->execute($sql_endereco);
									
				$this->commitTrans();
				
			} catch (Exception $e) {
				$this->rollbackTrans();
				return $e->getMessage();
				
			} finally {
				$this->setAutocommit(true);
			}	

			return true;
			
		// insert
		}else{
			try {
				$this->setAutocommit(false);
				$this->beginTrans();
				
				$sql_user = 'INSERT INTO clientes (cliente_email, cliente_senha) VALUES ("'. $data['email'] .'", "'.md5($data['senha']).'")';
				$ret = $this->execute($sql_user);

				if (isset($ret['last_inserted_id']) && $ret['last_inserted_id'] > 0){
					$sql_endereco = 'INSERT INTO clientes_endereco (cliente_id, endereco_logradouro, endereco_numero, endereco_bairro, endereco_cep) 
							VALUES ("'. $ret['last_inserted_id'] .'", "'. $data['logradouro'] .'", "'. $data['numero'] .'", "'. $data['bairro'] .'", "'. $data['cep'] .'")';
					$ret2 = $this->execute($sql_endereco);
										
					$this->commitTrans();
				}else{
					throw new Exception('Erro ao recuperar id');
				}
				
				
			} catch (Exception $e) {
				$this->rollbackTrans();
				return $e->getMessage();
				
			} finally {
				$this->setAutocommit(true);
			}			
			
			return true;
			
		}
	}
	
	/**
	 * Salva pedido
	 * 
	 * @param string $dados
	 * @param boolean $cron - indica se o método foi chamado pelo cron
	 * @return array
	 */
	public function savePedido($dados, $cron = FALSE){
		
		// grava na fila
		if (BEANSTALKD && $cron == FALSE) {
			$queue = new Pheanstalk_Pheanstalk(BEANSTALKD_HOST . ":" . BEANSTALKD_PORT);
			
			$job = array("action" => "pedido", "user_id" => $_SESSION['user_id'], "data" => $dados);
			$queue->useTube('pedidotube')->put(json_encode($job));
		
		// grava direto no banco
		}else {
			$sql = 'INSERT INTO pedidos (cliente_id, pedido_dados, pedido_data) 
					     VALUES ("'. $_SESSION['user_id'] .'", "'.$dados.'", now())';
			$ret = $this->execute($sql);
			return $ret;
		}
	}
}