<?php

if(array_key_exists("list_image",$_POST) && array_key_exists("position_image",$_POST))
{

    $size = explode(",", $_POST['position_image']);
    $height = intval($size[1]);
    $width = intval($size[0]);

    $lst_image = explode("|",$_POST['list_image']);
    $image = explode(",", $lst_image[0])[1];

    $data = base64_decode($image);
    $back = imagecreatefromstring($data);
    
    array_shift($lst_image);

    foreach($lst_image as $key => $values)
    {
        $image = explode(",", $lst_image[$key])[1];
        $data = base64_decode($image);
        $new = imagecreatefrompng($data);
        imagecopymerge($back, $new,0,0,0,0, $width, $height,1);
    }
    
    //print_r($img);
    // header('Content-Type: image/png');
    // imagepng($back);
    // imagedestroy($back);

}
?>