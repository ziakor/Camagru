<?php

    $error = "";
    $column = "";
    if (array_key_exists($_GET['current_passwd'],$_GET))
    {
        try{
            $con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);

            if (array_key_exists($_GET['new_email'], $_GET))
            {
                $sql = "UPDATE `user` SET `user`.`email` = :new_email WHERE `user`.`pseudo` = :pseudo AND `user`.`email` NOT IN(:new_email)";
                $exec = $con->prepare($sql);
                $exec->execute(array("new_email" => htmlspecialchars($_GET['new_email']), "pseudo" => $_SESSION['loggued_as']));
            }
            if (array_key_exists($_GET['new_pseudo'], $_GET))
            {
                $sql = "UPDATE `user`, `image`, `comment` SET `user`.`pseudo` = :new_pseudo, `image`.`pseudo` = :new_pseudo, `comment`.`pseudo` = :new_pseudo
                        WHERE `pseudo` = :pseudo AND `pseudo` = :pseudo AND `pseudo` = :pseudo";
                $exec = $con->prepare($sql);
                $exec->execute(array("new_pseudo" => htmlspecialchars($_GET['new_pseudo']), "pseudo" => $_SESSION['loggued_as']));
                $_SESSION['loggued_as'] = htmlspecialchars($_GET['new_pseudo']);
            }
            if (array_key_exists($_GET['new_passwd'], $_GET) && array_key_exists($_GET['new_passwd2'], $_GET))
            {
                if (strcmp(htmlspecialchars($_GET['new_passwd']),$_GET['new_passwd2']))
                {
                    $hashpasswd = hash("Whirlpool", htmlspecialchars($_GET['new_passwd']));
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

        }catch(PDOException $err)
        {
            $error = "fail";
        }
    }
?>


