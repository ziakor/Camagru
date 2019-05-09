<?php
session_start();


/*
https://getbootstrap.com/docs/4.0/components/pagination/
Pagination par variable get.
affichage de 3 image par 3 image
un bouton j'aime
en dessous, si connecté  un div avec un input add_comment
et une div avec la liste des commentaire 

*/

try
{
	$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
	$sql = ""

}catch(PDOException $err)
{
	echo "fail";
}
?>