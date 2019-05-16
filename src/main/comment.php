<?php
session_start();
include("../../config/database.php");

$error = "";
try {
    $con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
    $sql = "SELECT * FROM `image` INNER JOIN `user` ON :image_pseudo = `user`.pseudo  WHERE `image`.image_name = :image_name";
    $exec= $con->prepare($sql);
    $exec->execute(array("image_pseudo" => explode(":",$_GET['img_name'])[0],"image_name" => $_GET['img_name']));
    $data = $exec->fetch();

    try{
    $sql = "INSERT INTO `comment`(`pseudo`,`image_name`,`content`,`date_comment`) VALUES(:pseudo, :image_name, :content, NOW())";
    $exec = $con->prepare($sql);
    $exec->execute(array("pseudo" => $_SESSION['loggued_as'], "image_name"=> $data['image_name'], "content"=> $_POST['commentaire']));
    mail($data['email'], $_GET['img_name'] . " a reçu un commentaire!", "Bonjour, votre image " . $_GET['img_name'] . " a reçu un commentaire de la part de " . $_SESSION['loggued_as'] . ".", "FROM: admin@camagru.com");
    
    }catch(PDOException $err)
    {
        $error = true;
        echo "fail 2e requete";
    }
} catch (PDOException $err ) {
    $error = true;
    echo " Fail comment.php";
}

$url = $_SERVER['HTTP_HOST'] . "/" . explode("/",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/gallerie.php?error=" . $error;
header("Location: http://" . $url);
exit();

?>