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
	<link type="text/css" rel="stylesheet" href="./camagru.css" media="all">
<body>
	<?php
	if (array_key_exists('state', $_GET))
	{
		unset($_SESSION['loggued_as']);
		session_destroy();
		Header('Location: '.$_SERVER['PHP_SELF']);
		Exit();
	}
	include("./src/header/header.php");
	if(array_key_exists('valid', $_GET) && array_key_exists('pseudo', $_GET))
	{
		header("Location: http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . $uri . "/src/header/log.php?valid=" . $_GET['valid'] . "&pseudo=" . $_GET['pseudo']);
		exit;
	}
	if (!array_key_exists('loggued_as', $_SESSION))
	{
		include("./src/main/forget_view.php");
	}

	include("./src/footer/footer.php");
	?>
	<script src="./js/log.js"></script>
</body>
</html>