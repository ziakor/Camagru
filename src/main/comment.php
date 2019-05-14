<?php
session_start();
include("../../config/database.php");
try {
    $con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
    echo "BITE";
    $sql = "INSERT INTO `commentaire`(
        commentaire.pseudo,
        commentaire.image_name,
        commentaire.commentaire,
        commentaire.date_comment
    )
    VALUES(
        "ziakor",
        "ziakor:489486",
        "ntm",
        "23-45-12-00:25:65"
    )"

} catch (PDOException $err ) {
    echo " Fail comment.php";
}
?>