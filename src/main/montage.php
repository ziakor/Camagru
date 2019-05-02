<?php

include('../../config/database.php');

$_SESSION['loggued_as'] = "ziakor";
if(array_key_exists("list_image",$_POST) && array_key_exists("position_image",$_POST))
{
	
	$list = explode("&", $_POST['list_image']);

	//APRES SA CEST BON
	$size = explode(",", $_POST['position_image'],2);
	$width = intval($size[0]);
	$height = intval($size[1]);
	
	for ($j=0; $j < count($list) - 1; $j++) { 
		$lst_image = explode("|",$list[$j]);
		$image = explode(",", $lst_image[0])[1];
		$data = base64_decode($image);
		$back = imagecreatefromstring($data);
		$back = imagescale($back,$width);
		//TEST
		
		//active la transparence
		$final_img = imagecreatetruecolor($width, $height);
		imagealphablending($final_img, true);
		imagesavealpha($final_img, true);
		imagecopy($final_img, $back,0,0,0,0,$width, $height);
		
		//print_r( $lst_image);
		for ($i=1; $i < count($lst_image) - 1; $i++) {
			$new = imagecreatefrompng($lst_image[$i]);
			$new = imagescale($new,$width,$height);
			imagecopy($final_img, $new,0,0,0,0,$width, $height);
		}
		//header('Content-Type: image/png');
		$name = $_SESSION['loggued_as'] . ":" . time();
		imagepng($final_img, "../../ressources/db_images/" . $name . ".png");
		try
		{
			$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
			$sql = "INSERT INTO `image` (`pseudo`, `image_name`) VALUES (?, ?)";
			$exec = $con->prepare($sql);
			$exec->execute([$_SESSION['loggued_as'], $name]);
		}   catch(PDOException $err)
		{
			echo $err->getMessage() . "FAIL IMAGE";
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'index.php';
			header("Location: http://$host$uri/../../$extra?montage=end");
		}
		imagedestroy($final_img);
	}
	//DONT TOUCH
	
}
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/../../$extra?montage=success");
?>