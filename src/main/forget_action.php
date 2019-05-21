<?php
session_start();
include('../../config/database.php');
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$new_passwd = hash("Whirlpool",time());
$error = "";
try {
    $con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
    $sql = "UPDATE `user` SET `user`.`passwd`= :new_passwd WHERE `user`.`email`= :email AND `user`.`pseudo` = :pseudo";
    $exec= $con->prepare($sql);
    $exec->execute(array("new_passwd" => hash("Whirlpool", $new_passwd), "pseudo"=> $pseudo, "email" =>$email));
    mail($email, "Reset password", "bonjour,\nVoici votre nouveau mot de passe: `".$new_passwd . "`.\nN'oubliez pas de le changer");
} catch (PDOException $err) {
    $error = "?error=true";
}
$url = $_SERVER['HTTP_HOST'] . "/" . explode("/",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/index.php" . $error;
header("Location: http://" . $url);
exit();
?>