<?php

/**
 * @Author: Felix Notarte
 * @Date:   2020-08-23 13:25:16
 * @Last Modified by:   Felix Notarte
 * @Last Modified time: 2020-08-23 14:39:10
 */
namespace Ecommerce;


class Model {

	private $db;
	private $sql_statement = '';


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
		$this->db = @mysqli_connect('db','root','docker','oop');

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
	 * insert database
	 * @param  string $table [table name]
	 * @param  array  $data  [fields in array format]
	 * @return [type]        [primary id]
	 */
	public function insert(string $table, array $data) : bool {

		$fields = [];
		$values = [];

		foreach ($data as $key => $value) {
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

		$sql = 'INSERT INTO ' . $table . '(' . implode(',', $fields) . ') values(' . implode(',', $values) . ')';

		mysqli_query($this->db, $sql);

		$id =  $this->db->insert_id;

		return $id;
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