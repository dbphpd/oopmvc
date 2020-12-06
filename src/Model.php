<?php

/**
 * @Author: Felix Notarte
 * @Date:   2020-08-23 13:25:16
 * @Last Modified by:   Felix Notarte
 * @Last Modified time: 2020-09-05 13:50:41
 */
namespace Ecommerce;

class Model {

	private $db;
	private $sql_statement = '';

	public  $tableName;
	public  $dataTable;
	public 	$inserted_id;


	function __construct(){
		$this->setConnection();
	}

	function __destruct(){
		mysqli_close($this->db);
	} 

	/**
	 * connection to db
	 */
	private function setConnection(){
		$config = $GLOBALS['CONFIG']['database'];
		$this->db = @mysqli_connect($config['host'], $config['user'], $config['paswd'], $config['database']);

		if (!$this->db) {
			exit('Model Error: ' . mysqli_connect_error());
		}
	}

	/**
	 * prepare statement
	 * @param string $sql [description]
	 */
	public function setQuery(string $sql) {
		$this->sql_statement = $sql;
		return $this;
	}

	/**
	 * this will updat db
	 * @return [type] [description]
	 */
	public function update() : bool {
		$result = mysqli_query($this->db, $this->sql_statement);
		return $result;
	}


	/**
	 * this will delete db
	 * @return [type] [description]
	 */
	public function delete() : bool {
		$result = mysqli_query($this->db, $this->sql_statement);
		return $result;
	}

	/**
	 * this will get the name of the 
	 * an remove the _model. Assuming
	 * name = tablename
	 * @return [type] [description]
	 */
	public function getTableName() : string {
		$class = get_class($this);
		$lastOccur = strrpos($class , '\\') + 1;
		return str_replace('_model', '', substr($class, $lastOccur));
	}

	/**
	 * insert database
	 * @param  string $table [table name]
	 * @param  array  $data  [fields in array format]
	 * @return [type]        [primary id]
	 */
	public function insert($obj){

		$this->dataTable = $obj;
		$this->tableName  = strtolower($this->getTableName());

		$fields = [];
		$values = [];
	
		foreach ($this->dataTable as $key => $value) {
			
			if (empty($value))
				continue;

			array_push($fields, $key);
			
			// checking
			switch(gettype($value)) {
				case 'integer':
				case 'double'  :
					array_push($values, $value);
					break;

				case 'string':
					array_push($values, '"'. $value . '"');
					break;
			}

		}
	
		$sql = 'INSERT INTO ' . $this->tableName . '(' . implode(',', $fields) . ') values(' . implode(',', $values) . ')';

		mysqli_query($this->db, $sql);
		
		$this->inserted_id =   mysqli_insert_id($this->db);

	}



	/**
	 * pull data from database
	 * @return [type] [description]
	 */
	public function getRows() : array {

		$dataTable = mysqli_query($this->db, $this->sql_statement);


		$data = [];
		while ($row = mysqli_fetch_assoc($dataTable)) {
			array_push($data, $row);
		}

		mysqli_free_result($dataTable);

		return $data;
	}

}