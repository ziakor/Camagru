<?php
session_start();

include('../../config/database.php');

function CheckForCreation($con, $email, $pseudo)
{
	try
	{
		$exec= $con->prepare("SELECT * FROM `user` WHERE `user`.email = ? OR `user`.pseudo = ?");
		$res = $exec->execute([$email, $pseudo]);
		$ff = $exec->fetchAll();
		if (count($ff) > 0)
			return (1);
	}catch(PDOException $err)
	{
		return(-1);
	}
	return(0);
}

function CheckForLog($con,$email,$passwd)
{
	$passwd = hash('Whirlpool', $passwd);
	try
	{
		$exec = $con->prepare("SELECT * FROM `user` WHERE `user`.email = ? AND `user`.passwd = ?");
		$res = $exec->execute([$email, $passwd]);
		$ff = $exec->fetchAll();
		if (count($ff) > 0){
			$_SESSION['loggued_as'] = $ff[0]['pseudo'];
			return (1);
		}
	}catch(PDOException $err)
	{
		echo "FAIL TO CONNECT";
		return (-1);
	}
	return (0);
}

function send_email($email, $pseudo, $key)
{
	$to_email = $email;
	$subject = "Confirmation de compte" . $pseudo;
	$headers = "From: admin@camagru.com";
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';
	$body = "Lien de validation:" . " http://$host$uri/../../$extra?valid=" . $key;
	if ( mail($to_email, $subject, $body, $headers)) {
		return(1);
	 } else {
		return (0);
	 }
}

function Check_valid()
{
	//Check si la clé correspond a une clé dans la table si oui on remplace le dans la bdd la valeur de confirmation par "0"
	// a la connexion check si le compte et valider
}

if (array_key_exists('login_sub', $_POST))
{
	if (array_key_exists('InputEmail', $_POST)&& array_key_exists('InputPassword', $_POST) )
		{
			$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
			//echo "ENTER REGISTER";
			CheckForLog($con,$_POST['InputEmail'],$_POST['InputPassword']);
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'index.php';
			header("Location: http://$host$uri/../../$extra");
			exit;
		}
}
else if (array_key_exists('register', $_POST))
{
	if (array_key_exists('use_cond', $_POST) && array_key_exists('InputPseudo', $_POST)&& array_key_exists('InputPassword1', $_POST) &&
		array_key_exists('InputPassword2', $_POST) && array_key_exists('InputEmail', $_POST))
	{
		try
		{
			$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
			if (CheckForCreation($con,$_POST['InputEmail'],$_POST['InputPseudo']) === 0 && strcmp(htmlspecialchars($_POST['InputPassword1']),htmlspecialchars($_POST['InputPassword2'])) == 0)
			{
				$key_confirm = hash('Whirlpool', $_POST['InputPseudo'] . $_POST['InputPassword1'] . $_POST['InputEmail']);
				$exec = $con->prepare("INSERT INTO `user` (`pseudo`, `passwd`, `email`, `confirmation`) VALUES (?, ?, ?, ?)");
				$exec->execute([htmlspecialchars($_POST['InputPseudo']),
				hash('Whirlpool' ,htmlspecialchars($_POST['InputPassword1'])), htmlspecialchars($_POST['InputEmail']), $key_confirm]);
				send_email($_POST['InputEmail'], $_POST['InputPseudo'], $key_confirm);
				echo "good";
			}
			else
			{
				throw(new PDOException("ERROR"));
			}
		}catch(PDOException $err)
		{
			echo $err->getMessage() . 'failed' . PHP_EOL;
		}
	}
}