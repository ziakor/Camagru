<?php
//session_start();
/*
https://getbootstrap.com/docs/4.0/components/pagination/
Pagination par variable get.
affichage de 3 image par 3 image
un bouton j'aime
en dessous, si connecté  un div avec un input add_comment
et une div avec la liste des commentaire
*/
$error = "";
try
{
	$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
	$nb = 0;
	if (array_key_exists('page', $_GET))
	{
		if ($_GET['page'] >= 0)
			$nb = intval($_GET['page']);
	}

	//add like
	if (array_key_exists('lk',$_GET))
	{
		$totor = $_SESSION['loggued_as'];
		$sql = "UPDATE image SET like_count = CONCAT_WS(',',(@cur_value := like_count),:needle, NULL) WHERE image_name = :image_name AND like_count NOT LIKE '%$totor%'";
		$exec = $con->prepare($sql);
		$exec->execute(array("needle" => $_SESSION['loggued_as'], "image_name" => $_GET['lk']));
	}
	//remove like
	else if (array_key_exists('dis',$_GET))
	{
		$sql = "UPDATE image SET like_count= REPLACE(like_count, ?, '')";
		$exec = $con->prepare($sql);
		$exec->execute([("," . $_SESSION['loggued_as'])]);
	}
	//del image
	else if (array_key_exists('del',$_GET))
	{
		$sql = "DELETE FROM image WHERE image_name = ? and pseudo = ?";
		$exec = $con->prepare($sql);
		$exec->execute([$_GET['del'],$_SESSION['loggued_as']]);
	}
	
	//recuperer les image
	$sql = "SELECT * from `image` LIMIT " . ($nb * 5) . ", " . ($nb * 5  + 5);
	$exec = $con->prepare($sql);
	$exec->execute();
	$lst_comment = array();
	$lst = $exec->fetchAll();
	$count = $exec->rowCount();
	//get comment

	for ($i=0; $i < $count; $i++) {
		$sql = "SELECT * FROM `comment` WHERE comment.image_name = ? ORDER BY `comment`.`image_name`";
		$exec = $con->prepare($sql);
		$exec->execute([$lst[$i]['image_name']]);
		$tmp = $exec->fetchAll();
		$lst_comment[] = $tmp;
	}
	$t = 0;
	if (count($lst) > 0)
		$size_div = round(12 / count($lst));
	?>
	<div class="container-fluid gallerie_container">
		<nav aria-label="pagination_container" class="pagination_container">
			<ul class="pagination">
				<li class="page-item"><a class="page-link" href="<?php echo("?page=0")?>">First</a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . $prev)?>">Previous</a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . $nb)?>"><?php echo $nb?></a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . ($nb + 1))?>"><?php echo ($nb + 1)?></a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . ($nb + 2))?>"><?php echo ($nb + 2)?></a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . ($nb + 1))?>">Next</a></li>
			</ul>
		</nav>
		<div class="row row_gallerie mx-auto">
			<?php
			foreach ($lst as $key => $value) {
				?>
				<div class="<?php echo("col-2 no_pad div_img_gal  ")?>" id=<?php echo "" . $key ?>>
					<img  class="img_gal" src=<?php echo("./ressources/db_images/" .$value['image_name']) . ".png"?> alt= <?php echo($value['image_name'])?> >
					<div class= "row bar">
						<div class="col-4">
							<span class="createur"><?php echo $value['pseudo']?></span>
						</div>
						<div class="col-2">
							<a href=<?php if (array_key_exists('loggued_as',$_SESSION))echo("?lk=" . $value['image_name']);?>><img src="./ressources/icons/like_icons.svg" alt="like_image" class="like_img" ></a>
						</div>
						<div class="col-2">
							<a href=<?php if (array_key_exists('loggued_as',$_SESSION))echo("?dis=" . $value['image_name']);?>><img src="./ressources/icons/unlike_icons.svg" alt="like_image" class="dislike_img" ></a>
						</div>
						<div class="col-2">
							<img src ="./ressources/icons/comment_icons.svg" alt="comment_image" class="comment_img">
						</div>
						<div class="col-2">
						<?php
							if (array_key_exists('loggued_as', $_SESSION))
							{
								if ($value['pseudo'] == $_SESSION['loggued_as'])
								?><a href=<?php echo("?del=" . $value['image_name']) ?>><img src="./ressources/icons/delete_icons.svg" class="delete_icons"></a>
								<?php
							}
						?>
						</div>
					</div>
					<div class="row">
						<div class="col-12 comment_form">
							<?php
							if (array_key_exists('loggued_as', $_SESSION))
							{
								?>
								<form action="<?php echo "./src/main/comment.php?img_name=" . $value["image_name"]  ?>" id ="form_comment" method="post">
									<input type="text" name="commentaire" id="commentaire_input" placeholder="Envoyer un commentaire">
									<input type="submit" value="Send" id="com_sub" style="display:none;"/>
								</form>
								<?php
							}
							?>
						</div>
					</div>
					<div class="row lst_com">
						<div class="col-12 test">
							<?php

							$e = 0;
							foreach($lst_comment[$key] as $key_com => $val_com)
							{?>
								<div><?php echo $val_com['pseudo'] . ": " . $val_com['content']?></div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
						<?php
			}
			?>

		</div>
	</div>
	<?php
$_SESSION['page'] = $nb;
}catch(PDOException $err)
{
	$error = "true";
	$url = $_SERVER['HTTP_HOST'] . "/" . explode("/",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))[1] . "/gallerie.php?error=" . $error . "&page=" . $_SESSION['page'];
header("Location: http://" . $url);
exit();
}
?>