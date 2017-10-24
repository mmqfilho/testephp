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
	 */
	public function getProdutos($order = 1, $categoria_id = null){
		
		switch ($order) {
			case 1:
				$order = 'p.produto_nome';
				break;
			case 2:
				$order = 'p.produto_preco';
				break;
			case 3:
				$order = 'p.produto_preco DESC';
				break;
			default:
				$order = 'p.produto_nome';
				break;
		}
		
		
		
		$sql = 'SELECT * FROM produtos p';
		if (!is_null($categoria_id)) {
			$sql .= ' JOIN produtos_categorias pc ON (pc.produto_id = p.produto_id AND pc.categoria_id = ?)';
			$data[] = array('i', $categoria_id);
		}
		$sql .= ' ORDER BY ?';
		$data[] = array('s', $order);
		
		$key = 'lista_produtos';
		return $this->db->execute($sql, $key, $data);
	}
}