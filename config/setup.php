<?php
include("./database.php");

try
{
	$con = new PDO($DB_DSN_INIT, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
	$req = "CREATE DATABASE IF NOT EXISTS" . " ". $DB_NAME;
	$con->exec($req);
	echo "Database user creation success\n";

} catch(PDOException $err){
	echo $err->getMessage() . "\ndatabase camagru_db creation failed!\n";
}
try{
	$req = "CREATE TABLE IF NOT EXISTS user(
		`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`pseudo` VARCHAR(255) NOT NULL,
		`passwd` VARCHAR(255)  NOT NULL
	)";
	$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
	$con->exec($req);
	echo "Table user creation success\n";
}catch(PDOException $err)
{
	echo $err->getMessage() . "\ntable user creation failed!\n";
}
?>