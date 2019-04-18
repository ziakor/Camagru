<?php
session_start();

include('../../config/database.php');

function CheckForCreation($con, $email, $pseudo)
{
	try
	{
		$exec= $con->prepare("SELECT * FROM `user` WHERE `user`.email = ? OR `user`.pseudo = ?");
		$res = $exec->execute([$email, $pseudo]);
		echo $res;
		if ($res < 1)
			return (1);
	}catch(PDOException $err)
	{
		return(-1);
	}
	return(FALSE);
}

function CheckForLog($con,$email,$passwd)
{
	$passwd = hash('Whirlpool', $passwd);
	try
	{
		$exec = $con->prepare("SELECT * FROM `user` WHERE `user`.email = ?");
		$res = $exec-execute([$email,$passwd]);
		echo $res[0] ." " . $res[1] . " " . $res[2];

	}catch(PDOException $err)
	{
		echo "FAIL TO CONNECT";
	}
}

if (array_key_exists('login_sub', $_POST))
{
	if (array_key_exists('InputEmail', $_POST)&& array_key_exists('InputPassword', $_POST) )
		{
			$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
			CheckForLog($con, htmlspecialchars($_POST['InputEmail']), htmlspecialchars($_POST['InputPassword']));
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
			if (CheckForCreation($con,$_POST['InputEmail'],$_POST['InputPseudo']) > 0 && strcmp(htmlspecialchars($_POST['InputPassword1']),htmlspecialchars($_POST['InputPassword2'])) == 0)
			{
				$exec = $con->prepare("INSERT INTO `user` (`pseudo`, `passwd`, `email`) VALUES (?, ?, ?)");
				$exec->execute([htmlspecialchars($_POST['InputPseudo']),
				hash('Whirlpool' ,htmlspecialchars($_POST['InputPassword1'])), htmlspecialchars($_POST['InputEmail'])]);
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