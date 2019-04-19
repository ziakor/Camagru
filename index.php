<?php
	session_start();

	require_once "./config/setup.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Camagru</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link rel="stylesheet" href="./header.css">
<body>
	<?php
	if (array_key_exists('state', $_GET))
	{
		
		unset($_SESSION['loggued_as']);
		session_destroy();
		Header('Location: '.$_SERVER['PHP_SELF']);
		Exit();
	}
	include("./src/header/header.php") ?>
	<script src="./src/header/log.js"></script>
</body>
</html>
