<?php
use PhpMyAdmin\Session;

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
    $sql = "INSERT INTO `comment`(`pseudo`,`image_name`,`content`,`date_comment`,`id_image`) VALUES(:pseudo, :image_name, :content, NOW(), :id_image)";
    $exec = $con->prepare($sql);
    $exec->execute(array("pseudo" => htmlspecialchars($_SESSION['loggued_as']), "image_name"=> htmlspecialchars($data['image_name']), "content"=> htmlspecialchars($_POST['commentaire']), "id_image" => htmlspecialchars($data['0'])));
    if ($data['receive_mail'] == 1 && $_SESSION['loggued_as'] != $data['pseudo']){
        mail($data['email'], htmlspecialchars($_GET['img_name']) . " a reçu un commentaire!", "Bonjour, votre image " . htmlspecialchars($_GET['img_name']) . " a reçu un commentaire de la part de " . 
        htmlspecialchars($_SESSION['loggued_as']) . ".", "FROM: admin@camagru.com");
    }
    }catch(PDOException $err)
    {
        $error = "?error=comment failed";
    }
} catch (PDOException $err ) {
    $error = "?error=comment failed";
}

if ($error !== "")
	$url = $_SERVER['HTTP_HOST'] . "/" . explode("/",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/gallerie.php" . $error;
else
	$url = $_SERVER['HTTP_HOST'] . "/" . explode("/",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/gallerie.php?success=Comment added";
header("Location: http://" . $url);
exit();
?>
?>