<?php

include('../../config/database.php');
session_start();
$error = "";
if (array_key_exists("list_image", $_POST) && array_key_exists("position_image", $_POST)) {
	try {
		$lst = explode("&", $_POST['list_image']);
		array_pop($lst);
		$size = explode(",", $_POST['position_image'], 2);
		$width = intval($size[0]);
		$height = intval($size[1]);
		//echo count($lst) . ":";
		for ($j = 0; $j < count($lst); $j++) {
			$lst_image = explode("|", $lst[$j]);
			array_pop($lst_image);
			$image = explode(",", $lst_image[0])[1];
			$data = base64_decode($image);
			$back = imagecreatefromstring($data);
			imagealphablending($back, true);
			$back = imagescale($back, $width);
			imagealphablending($back, true);
			//TEST

			//active la transparence
			$final_img = imagecreatetruecolor($width, $height);
			imagealphablending($final_img, true);
			imagesavealpha($final_img, true);
			imagecopy($final_img, $back, 0, 0, 0, 0, $width, $height);

			//print_r( $lst_image);
			for ($i = 1; $i < count($lst_image); $i++) {
				$new = imagecreatefrompng($lst_image[$i]);
				$new = imagescale($new, $width, $height);
				imagecopy($final_img, $new, 0, 0, 0, 0, $width, $height);
			}
			$name = $_SESSION['loggued_as'] . ":" . time() . "-" . $j;
			imagepng($final_img, "../../ressources/db_images/" . $name . ".png");
			try {
				$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
				$sql = "INSERT INTO `image` (`pseudo`, `image_name`) VALUES (?, ?)";
				$exec = $con->prepare($sql);
				$exec->execute([$_SESSION['loggued_as'], $name]);
			} catch (PDOException $err) {
				$error = "?error=Capture failed";
			}
			imagedestroy($final_img);
		}
	} catch (PDOException $err) {
		$error = "?error=Capture failed";
	}
	//DONT TOUCH

}
if ($error !== "")
	$url = $_SERVER['HTTP_HOST'] . "/" . explode("/", rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/index.php" . $error;
else
	$url = $_SERVER['HTTP_HOST'] . "/" . explode("/", rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/index.php?success=Capture successfull";
header("Location: http://" . $url);
exit();