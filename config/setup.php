<?php
require_once "./config/database.php";

try
{
	$con = new PDO($DB_DSN_INIT, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
	$req = "CREATE DATABASE IF NOT EXISTS" . " ". $DB_NAME;
	$con->exec($req);
	$con->exec("USE $DB_NAME");

} catch(PDOException $err){
	echo $err->getMessage() . "\ndatabase camagru_db creation failed!\n";
}
try{
	$req = "CREATE TABLE IF NOT EXISTS user(
		`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`pseudo` VARCHAR(25) NOT NULL,
		`passwd` VARCHAR(255)  NOT NULL,
		`email` VARCHAR(255) NOT NULL,
		`confirmation` VARCHAR(255) NOT NULL
	)";

	$con->exec($req);
}catch(PDOException $err)
{
	echo $err->getMessage() . "\ntable user creation failed!\n";
}

try{
	$req = "CREATE TABLE IF NOT EXISTS image(
		`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`pseudo` VARCHAR(255)  NOT NULL,
		`image_name` VARCHAR(255) NOT NULL,
		`like_count` LONGTEXT
	)";

	$con->exec($req);
}catch(PDOException $err)
{
	echo $err->getMessage() . "\ntable user creation failed!\n";
}

?>