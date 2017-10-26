<?php
/**
 * Interface para garantir padronização das funções
 */

interface databaseInterface {
	
	/**
	 * construtor
	 */
	public function __construct();
	
	/**
	 * Finaliza a conexão quando o objeto for destruido
	 */
	public function __destruct();
	
	/**
	 * função de conexão
	 * @return void
	 */
	public function connect();
	
	/**
	 * função de desconexão
	 * @return void
	 */
	public function disconnect();
	
	/**
	 * Executa querys
	 *
	 * @param string $sql
	 * @param string $key
	 * @param array $data
	 * @return array
	 */
	public function execute($sql, $key = null, $data = null);
	
}