<?php
session_start();

include('../../config/database.php');


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
	$to_email = $email;
	$subject = "Confirmation de compte" . $pseudo;
	$headers = "From: admin@camagru.com";
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';
	$body = "Lien de validation:" . " http://$host$uri/../../$extra?valid=" . $key . "&pseudo=" . $pseudo;
	mail($to_email, $subject, $body, $headers);
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

				if (CheckForCreation($con,$_POST['InputEmail'],$_POST['InputPseudo']) === 0 && strcmp(htmlspecialchars($_POST['InputPassword1']),htmlspecialchars($_POST['InputPassword2'])) == 0)
				{
					$key_confirm = hash('Whirlpool', $_POST['InputPseudo'] . hash('Whirlpool' ,htmlspecialchars($_POST['InputPassword1'])) . $_POST['InputEmail']);
					$exec = $con->prepare("INSERT INTO `user` (`pseudo`, `passwd`, `email`, `confirmation`) VALUES (?, ?, ?, ?)");
					$exec->execute([htmlspecialchars($_POST['InputPseudo']),
					hash('Whirlpool' ,htmlspecialchars($_POST['InputPassword1'])), htmlspecialchars($_POST['InputEmail']), $key_confirm]);
					send_email($_POST['InputEmail'], $_POST['InputPseudo'], $key_confirm);
					header("Refresh:0");
					exit;
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
			if ($_GET['valid'] != "0"){
			$sql = "UPDATE USER SET confirmation = '0' WHERE pseudo = ? AND confirmation = ?";
			$exec = $con->prepare($sql);
			$res = $exec->execute([$_GET['pseudo'], $_GET['valid']]);
			}
		header("Location: http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . "../../../" . "index.php");
		exit;
	}
}catch(PDOException $err)
{
	echo "fail";
}


//redirection sur lindex si une action a fail
header("Location: http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . "../../../" . "index.php");
exit;