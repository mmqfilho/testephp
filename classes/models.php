<?php
/**
 * Armazena todas as querys do sistema
 */
class models {
	
	private $db;	
	
	public function __construct($db){
		$this->db = $db;
	}
	
	/**
	 * Pega as categorias
	 */
	public function getCategorias() {
	
		$sql = 'SELECT * FROM categorias ORDER BY categoria_nome';
		$key = 'lista_categorias';
		
		return $this->db->execute($sql, $key);
	}

	/**
	 * Pega os produtos
	 * @param integer $order
	 * @param string $categoria_id
	 * @param integer $pag
	 * @param string $texto
	 */
	public function getProdutos($order = 1, $categoria_id = null, $pag = 1, $texto = null){
		
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
		
		
		
		$sql = 'SELECT DISTINCT * FROM produtos p
				  JOIN produtos_categorias pc ON (pc.produto_id = p.produto_id) ';		
		if (!is_null($categoria_id)) {
			$sql .= ' WHERE pc.categoria_id = ' .$categoria_id ;
			/*  FIXME */
			//$data[] = array('i', $categoria_id);
		}
		$sql .= ' ORDER BY ' . $order;
		/*  FIXME */
		//$data[] = array('s', $order);
		
		$key = 'lista_produtos';
		return $this->db->execute($sql, $key);
	}
}