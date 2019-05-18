<?php
    session_start();
    include "../../config/database.php";
    $error = "";
    $column = "";
    print_r($_POST);
try{
    $con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
    if (!empty( $_POST['current_passwd']))
    {
        $haspasswd = hash("whirlpool", $_POST['current_passwd']);
        $sql ="SELECT * FROM `user` WHERE `user`.`passwd` = :current_passwd AND `user`.`pseudo` = :pseudo";
        if (!empty( $_POST['new_email']))
        {
            $sql = "UPDATE `user` SET `user`.`email` = :new_email WHERE `user`.`pseudo` = :pseudo AND `user`.`email` NOT IN(:new_email)";
            $exec = $con->prepare($sql);
            $exec->execute(array("new_email" => htmlspecialchars($_POST['new_email']), "pseudo" => $_SESSION['loggued_as']));
        }
        if (!empty( $_POST['new_pseudo']))
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
        if (!empty( $_POST['new_passwd']) && !empty( $_POST['new_passwd2']))
        {
            if (strcmp(htmlspecialchars('new_passwd'),$_POST['new_passwd2']))
            {
                $hashpasswd = hash("Whirlpool", htmlspecialchars($_POST['new_passwd']));
                $sql = "UPDATE `user` SET `user`.passwd = :new_passwd WHERE `user`.pseudo = :pseudo";
                $exec = $con->prepare($sql);
                $exec->execute(array("new_pseudo" => $hashpasswd, "pseudo" => $_SESSION['loggued_as']));
            }
            else
            {
                // throw exception
            }
        }
        //ajouter une case receive mail
    }
    }catch(PDOException $err)
    {
        $error = "fail";
        echo $error . ": " . $err->getMessage();
    }
?>


<!-- 
UPDATE `image`
INNER JOIN `comment` ON `comment`.`id_image`=`image`.`id`
INNER JOIN `user` ON `user`.`pseudo` = `image`.`pseudo`
SET `image`.`pseudo` = "yukira",
	`comment`.`pseudo` = "yukira",
    `user`.`pseudo` = "yukira"
WHERE `image`.`pseudo` = "ziakor" -->