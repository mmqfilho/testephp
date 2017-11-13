<?php 
/**
 * Classe para acesso ao banco de dados
 */
Class databasePdo implements databaseInterface  {
	
	private $conn;
	private $host;
	private $dbase;
	private $username;
	private $password;
	private $cache = null;  // memcached
	
	/**
	 * construtor
	 */
	public function __construct(){
		$this->host 	= DB_HOST;
		$this->dbase 	= DB_DATABASE;
		$this->username = DB_USERNAME;
		$this->password = DB_PASSWORD;
		
		if (MEMCACHED) {
			$this->cache = new Memcached();
			$this->cache->addServer(MEMCACHED_HOST, MEMCACHED_PORT);
		}
		
		$this->connect();
		
		return $this;
	}
	
	/**
	 * Finaliza a conexão quando o objeto for destruido
	 */
	public function __destruct() {
		$this->disconnect();
	}
	
	/**
	 * função de conexão
	 * @return void
	 */
	public function connect(){
		try {
			
			$this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbase}", "{$this->username}", "{$this->password}");
			
			$this->conn->set_charset("utf8");
			
		} catch (Exception $e) {
			trigger_error('Database connection failed: ' . $e->getMessage() , E_USER_ERROR);
		}
	}
	
	/**
	 * função de desconexão
	 * @return void
	 */
	public function disconnect(){
		try {
			$this->conn->close();
		} catch (Exception $e) {
			echo 'Database close failed: ' .$e->getMessage();
		}
	}
	
	/**
	 * Executa querys
	 * 
	 * Se passar o parametro data fará a query com bind
	 * 
	 * @param string $sql
	 * @param string $key
	 * @param array $data
	 * @return array
	 */
	public function execute($sql, $key = null, $data = null){
	
		// garante que a key sempre terá valor
		$key = $key.'_'.md5($sql.json_encode($data));
		
		if (MEMCACHED) {
			$dados = $this->cache->get($key);
			
			if (is_array($dados)) {
				$dados['cache'] = true;
				return $dados;
			}
		}
		
		// com bind
		if (!is_null($data) && is_array($data)) {
			
			$stmt = $this->conn->prepare($sql);
			if($stmt === false) {
				trigger_error('Query error: ' . $sql . ' Error: ' . $this->conn->error, E_USER_ERROR);
			}
			
			// gambis pra funfar bind dinamico, e ainda exige por referência na variavel $data ehehehhe
			$paramType = '';
			foreach ($data as $k => $d) {
				$paramType .= $data[$k][0];
			}
			$params[] = &$paramType;
			
			foreach ($data as $k => $d) {
				$params[] = &$data[$k][1];
			}
			
			call_user_func_array(array($stmt, 'bind_param'), $params);
			$stmt->execute();
			$res = $stmt->get_result();
			
			$dados['query']				= $sql;
			$dados['last_inserted_id'] 	= $stmt->insert_id;
			$dados['affected_rows'] 	= $stmt->affected_rows;
			$dados['cache']				= false;
			$dados['result']			= array();
			
			if (!$dados['last_inserted_id'] && $dados['affected_rows'] > 0){
				while ($line = $res->fetch_array(MYSQLI_ASSOC)) {
					$dados['result'][] = $line;
				}
			}
			
			$stmt->close();

		// sem bind
		}else{
			$result = $this->conn->query($sql);
			
			if($result === false) {
				trigger_error('Query error: ' . $sql . ' Error: ' . $this->conn->error, E_USER_ERROR);
			} else {
				$dados['query']				= $sql;
				$dados['last_inserted_id'] 	= $this->conn->insert_id;
				$dados['affected_rows'] 	= $this->conn->affected_rows;
				$dados['cache']				= false;
				$dados['result']			= array();
					
				if (!$dados['last_inserted_id'] && $dados['affected_rows'] > 0){
					while ($line = $result->fetch_assoc()) {
						$dados['result'][] = $line;
					}
				}
			}
		}

		if (MEMCACHED) {
			$this->cache->set($key, $dados, MEMCACHED_EXPIRATION);
		}
		
		return $dados;
	}
}