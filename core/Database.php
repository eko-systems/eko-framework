<?php
	
	/**
	 * @author Ebubekir Yazgan
	 */
	
	namespace Core;
	
	use EkoDb\Store;
	
	class Database
	{
		public $dbName;
		public $username;
		public $password;
		
		/**
		 * @method __construct
		 * @param string $dbName
		 * @param string $username
		 * @param string $password
		 */
		public function __construct(string $dbName, string $username = "root", string $password = "root")
		{
			$this->username = $username;
			$this->password = $password;
			$this->dbName = $dbName;
		}
		
		/**
		 * @method Connect
		 * @param $table
		 * @return Store|null
		 */
		public function connect($table): Store|null
		{
			try {
				return new Store($table, $this->dbName, $this->username, $this->password);
			} catch (\Exception $e) {
				return null;
			}
		}
		
		/**
		 * @method Insert
		 * @param string $table
		 * @param array $data
		 * @return bool
		 */
		public function insert(string $table, array $data): bool
		{
			$db = $this->connect($table);
			try {
				$db->insert($data);
				return true;
			} catch (\Exception $e) {
				return false;
			}
		}
		
		/**
		 * @method Select
		 * @param array $where
		 * @param string $table
		 * @param string $mode
		 * @return array
		 * @throws \EkoDb\Exceptions\IOException
		 * @throws \EkoDb\Exceptions\InvalidArgumentException
		 */
		public function select(array $where, string $table, string $mode): array
		{
			$db = $this->connect($table);
			
			if ($mode == 'all') {
				// $table all Data
				return $db->findAll();
			} elseif ($mode == 'id') {
				// $table id is data
				return $db->findById($where[0]);
			} elseif ($mode == 'where') {
				// $table where other data
				return $db->findBy([
					$where[0],
					"=",
					$where[1]
				]);
			} else {
				return [];
			}
		}
		
		/**
		 * @method Delete
		 * @param array $where
		 * @param string $table
		 * @param bool $id
		 * @return bool
		 */
		public function delete(array $where, string $table, bool $id = true): bool
		{
			$db = $this->connect($table);
			
			if ($id) {
				// is id
				try {
					$db->deleteById($where[0]);
					return true;
				} catch (\Exception $e) {
					return false;
				}
			} else {
				// else is id
				try {
					$db->deleteBy([$where[0], "=", $where[1]]);
					return true;
				} catch (\Exception $e) {
					return false;
				}
			}
		}
		
		/**
		 * @param array $where
		 * @param string $table
		 * @param array $data
		 * @param bool $id
		 * @return bool
		 * @throws \EkoDb\Exceptions\IOException
		 * @throws \EkoDb\Exceptions\InvalidArgumentException
		 */
		public function update(array $where, string $table, array $data, bool $id = true): bool
		{
			$db = $this->connect($table);
			
			if ($id){
				// update by id
				try{
					$db->updateById($where[0], $data);
					return true;
				} catch (\Exception $e){
					return false;
				}
			} else {
				// update relative by others
				$incomingData = $this->select([$where[0], $where[1]], $table, 'where');
				if (isset($incomingData[0])){
					$incomingData = $incomingData[0];
				} else {
					return false;
				}
				$otherId = $incomingData['_id'];
				foreach ($data as $key => $value){
					$incomingData[$key] = $value;
				}
				unset($incomingData['_id']);
				return $this->update([$otherId, 0], $table, $incomingData);
			}
		}
	}