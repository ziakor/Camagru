<?php
session_start();

include('../../config/database.php');

$error= "";
//Fonction pour verifier si le pseudo ou le mail est libre.
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

//Fonction pour verifier aue les informations sont exactes.
function CheckForLog($con,$email,$passwd)
{
	$passwd = hash('Whirlpool', $passwd);
	try
	{
		$exec = $con->prepare("SELECT * FROM `user` WHERE `user`.email = ? AND `user`.passwd = ?");
		$exec->execute([$email, $passwd]);
		$ff = $exec->fetchAll();
		if (count($ff) > 0 && $ff[0]['confirmation'] == "0"){
			$_SESSION['loggued_as'] = $ff[0]['pseudo'];
			$_SESSION['receive_mail'] = $ff[0]['receive_mail'];
			$_SESSION['email'] = $email;
			return (1);
		}
	}catch(PDOException $err)
	{
		echo "FAIL TO CONNECT";
		return (-1);
	}
	return (0);
}

//Fonction pour envoyer le mail de confirmation après l'inscription
function send_email($email, $pseudo, $key)
{
	$url = $_SERVER['HTTP_HOST'] . "/" . explode("/",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/index.php";
	$subject = "Confirmation de compte" . $pseudo;
	$headers = "From: admin@camagru.com";
	$body = "Bonjour,\nVoici le lien de validation de votre compte : " . "http://" .$url ."?valid=" . $key . "&pseudo=" . $pseudo;
	mail($email, $subject, $body, $headers);
}




try
{
	$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);

	//Action : Connexion
	if (array_key_exists('login_sub', $_POST))
	{
		if (array_key_exists('InputEmail', $_POST)&& array_key_exists('InputPassword', $_POST) )
			{
				CheckForLog($con,$_POST['InputEmail'],$_POST['InputPassword']);
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = 'index.php';
				header("Location: http://$host$uri/../../$extra");
				exit;
			}
	}
	//Action: inscription
	else if (array_key_exists('register', $_POST))
	{
		if (array_key_exists('use_cond', $_POST) && array_key_exists('InputPseudo', $_POST)&& array_key_exists('InputPassword1', $_POST) &&
			array_key_exists('InputPassword2', $_POST) && array_key_exists('InputEmail', $_POST))
		{
				$pass1 = htmlspecialchars($_POST['InputPassword1']);
				$pass2 = htmlspecialchars($_POST['InputPassword2']);
				$email = htmlspecialchars($_POST['InputEmail']);
				$pseudo = htmlspecialchars($_POST['InputPseudo']);

				$regex_pseudo = '/^[a-zA-Z0-9]{5,27}$/';
				$regex = '/^[a-zA-z0-9]{6,30}$/';
				if (preg_match($regex, $pass1) && preg_match($regex, $pass2) && preg_match($regex_pseudo, $pseudo) && CheckForCreation($con,$email,$pseudo) === 0 && strcmp($pass1,$pass2) == 0)
				{
					$key_confirm = hash('Whirlpool', $_POST['InputPseudo'] . hash('Whirlpool' ,$pass1) . $email);
					$exec = $con->prepare("INSERT INTO `user` (`pseudo`, `passwd`, `email`, `confirmation`) VALUES (?, ?, ?, ?)");
					$exec->execute([htmlspecialchars($pseudo),
					hash('Whirlpool' ,$pass1), $email, $key_confirm]);
					send_email($email, $pseudo, $key_confirm);
				}
				else
				{
					throw(new PDOException("ERROR"));
				}
		}
	}
	//action: validation
	if(array_key_exists('valid', $_GET) && array_key_exists('pseudo', $_GET))
	{
			$pseudo = htmlspecialchars($_GET['pseudo']);
			$valid = htmlspecialchars($_GET['valid']);
			if ($_GET['valid'] != "0"){
			$sql = "UPDATE USER SET confirmation = '0' WHERE pseudo = ? AND confirmation = ?";
			$exec = $con->prepare($sql);
			$res = $exec->execute([$pseudo, $valid]);
			}
	}
}catch(PDOException $err)
{
	$error = "?error=true";
}
$url = $_SERVER['HTTP_HOST'] . "/" . explode("/",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/index.php" . $error;
header("Location: http://" . $url);
exit;