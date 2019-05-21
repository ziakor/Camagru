<?php
    session_start();
    include "../../config/database.php";
    $error = "";
    //print_r($_POST);
try{
    $con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
    if (!empty($_POST['current_passwd']))
    {
        $haspasswd = hash("whirlpool", htmlspecialchars($_POST['current_passwd']));
        $sql ="SELECT * FROM `user` WHERE `user`.`passwd` = :current_passwd AND `user`.`pseudo` = :pseudo";
        $exec = $con->prepare($sql);
        $exec->execute(array("current_passwd" => $haspasswd, "pseudo" => $_SESSION['loggued_as']));
        $data = $exec->fetchAll();
        $res= $exec->rowCount();
        if ($res < 1)
            throw(new PDOException("wrong password"));
        if (!empty($_POST['new_email']))
        {
            $sql = "UPDATE `user` SET `user`.`email` = :new_email WHERE `user`.`pseudo` = :pseudo AND `user`.`email` NOT IN(:new_email)";
            $exec = $con->prepare($sql);
            $exec->execute(array("new_email" => htmlspecialchars($_POST['new_email']), "pseudo" => $_SESSION['loggued_as']));
        }
        if (!empty($_POST['new_pseudo']))
        {
            $sql = "UPDATE `user` SET `user`.`pseudo` = :new_pseudo WHERE `user`.`pseudo` = :pseudo";
            $exec = $con->prepare($sql);
            $exec->execute(array("pseudo" => $_SESSION['loggued_as'], "new_pseudo" => $_POST['new_pseudo']));

            $sql = "UPDATE `image` SET `image`.`pseudo` = :new_pseudo WHERE `image`.`pseudo` = :pseudo";
            $exec = $con->prepare($sql);
            $exec->execute(array("pseudo" => $_SESSION['loggued_as'], "new_pseudo" => $_POST['new_pseudo']));

            $sql = "UPDATE `image` SET `image`.`like_count` = REPLACE(`image`.`like_count`, :pseudo, :new_pseudo) ";
            $exec = $con->prepare($sql);
            $exec->execute(array("pseudo" => $_SESSION['loggued_as'], "new_pseudo" => $_POST['new_pseudo']));

            $sql = "UPDATE `comment` SET `comment`.`pseudo` = :new_pseudo WHERE `comment`.`pseudo` = :pseudo";
            $exec = $con->prepare($sql);
            $exec->execute(array("pseudo" => $_SESSION['loggued_as'], "new_pseudo" => $_POST['new_pseudo']));
            $_SESSION['loggued_as'] = htmlspecialchars($_POST['new_pseudo']);
        }
        if (!empty($_POST['new_passwd']) && !empty( $_POST['new_passwd2']))
        {
            if (strcmp(htmlspecialchars('new_passwd'),$_POST['new_passwd2']))
            {
                $hashpasswd = hash("Whirlpool", htmlspecialchars($_POST['new_passwd']));
                $sql = "UPDATE `user` SET `user`.passwd = :new_passwd WHERE `user`.pseudo = :pseudo";
                $exec = $con->prepare($sql);
                $exec->execute(array("new_passwd" => $hashpasswd, "pseudo" => $_SESSION['loggued_as']));
            }
            else
            {
                throw new PDOException("wrong password");
            }
        }
        if (array_key_exists('check_mail',$_POST))
        {
            $rec_mail = htmlspecialchars($_POST['check_mail']);
            
            if ($rec_mail != 1)
                throw new PDOException("Error");
        }
        else
        {
            $rec_mail = 0;
        }
        echo $rec_mail . ":" . $_SESSION['receive_mail'] . "|" .strcmp($rec_mail, $_SESSION['receive_mail']);
        if ($rec_mail != $_SESSION['receive_mail'])
        {
            $sql ="UPDATE `user` SET `receive_mail` = :val_mail WHERE `user`.`pseudo` = :pseudo";
            $exec = $con->prepare($sql);
            $exec->execute(array("val_mail" => $rec_mail, "pseudo" => $_SESSION['loggued_as']));
        }
    }
    }catch(PDOException $err)
    {
        $error = "?%error=true";
    }
	$url = $_SERVER['HTTP_HOST'] . "/" . explode("/",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/settings.php" . $error;
	header("Location: http://" . $url);
	exit();
?>
