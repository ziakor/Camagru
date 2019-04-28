<?php

if(array_key_exists("list_image",$_POST) && array_key_exists("position_image",$_POST))
{

    $size = explode(",", $_POST['position_image'],2);
    $width = intval($size[0]);
    $height = intval($size[1]);


    //DONT TOUCH
    $lst_image = explode("|",$_POST['list_image']);
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





    // array_shift($lst_image);
    // for ($i=0; $i < count($lst_image); $i++) {
    //     $image = explode(",", $lst_image[0])[1];
    //     $data = base64_decode($image);
    //     $new = imagecreatefromstring($data);
    //     imagecopymerge($back, $new, 0, 0, 0, 0, $width, $height,100);

    // }
    // foreach($lst_image as $values)
    // {
    //     $image = explode(",", $values,2);
    //     print_r($image);
        // $data = base64_decode($image[1]);
        // $new = imagecreatefromstring($data);
        // imagecopymerge($back, $new,0,0,0,0, $width, $height,1);


    //print_r($img);
    header('Content-Type: image/png');
    imagepng($final_img);
    imagedestroy($final_img);

}
?>