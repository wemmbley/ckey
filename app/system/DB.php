<?php

namespace App\System;

use PDO;

class DB {

	/**
	 * @var PDO
	 */
	private $pdo;

	/**
	 * MainModel constructor.
	 */
	public function __construct() {
		$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$this->pdo = new PDO($dsn, DB_USER, DB_PASS, $opt);
	}

	/**
	 * @param $query
	 *
	 * @return false|\PDOStatement
	 */
	protected function query($query) {
		return $this->pdo->query($query);
	}

	/**
	 * @param $query
	 *
	 * @return bool|\PDOStatement
	 */
	protected function prepare($query) {
		return $this->pdo->prepare($query);
	}

	/**
	 * Select all data from table
	 *
	 * @param $table
	 *
	 * @return array
	 */
	protected function getAllData($table) {
		$stmt = $this->query('select * from ' . $table);
		$result = [];
		while ($row = $stmt->fetch())
		{
			$result[] = $row;
		}
		return $result;
	}

	/**
	 * Close connection
	 */
	protected function close() {
		$this->pdo = null;
	}

}