<?php

	final class DB 
	{
		private static $connection; 

		private function __construct() {
			include_once('./config/db.php');
			$dsn = "{$db['type']}:host={$db['host']};dbname={$db['db_name']};charset={$db['charset']}";
			$opt = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
			$pdo = new PDO($dsn, $db['user'], $db['password'], $opt);
			self::$connection = $pdo;
		}


		public static function connect() {
			if (!self::$connection) {
				new self();
			}
			return self::$connection;
		}

		private function __clone() {}

		private function __sleep() {}

		private function __wakeup() {}
	}