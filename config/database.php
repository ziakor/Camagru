<?php
	$DB_NAME = "camagru_db";
	$DB_DSN = "mysql:host=127.0.0.1:3306;dbname=". $DB_NAME;
	$DB_DSN_INIT = "mysql:host=127.0.0.1:3306";

	$DB_USER = 'root';
	$DB_PASSWORD = 'devdev';
	$DB_OPTIONS = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
?>