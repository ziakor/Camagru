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

try
{
	$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
	$nb = 0;
	if (array_key_exists('page', $_GET))
	{
		if ($_GET['page'] >= 0)
			$nb = intval($_GET['page']);
	}
	if ($nb == 0)
		$prev = 0;
	else
		$prev = $nb - 1;

	//recuperer les image
	$sql = "SELECT * from `image` LIMIT " . ($nb * 5) . ", " . ($nb * 5  + 5);
	$exec = $con->prepare($sql);
	$exec->execute();
	$lst = $exec->fetchAll();
	if (count($lst) > 0)
		$size_div = round(12 / count($lst));
	//add like
	if (array_key_exists('ps',$_GET) && array_key_exists('name', $_GET))
	{
		$sql = "UPDATE image SET like_count = CONCAT_WS(',',(@cur_value := like_count),?, NULL) WHERE image_name = ? AND  like_count LIKE '%?%'' ";
	}
	//remove like
	else if (array_key_exists('ps',$_GET) && array_key_exists('name', $_GET))
	{
		$sql = "UPDATE image SET like_count= REPLACE(like_count, ?, ?)";
	}
	//del image
	else if (array_key_exists('del',$_GET) && array_key_exists('name', $_GET))
	{
		$sql = "DELETE FROM image WHERE image_name = ? and pseudo = ?";
	}
	?>
	<div class="container gallerie_container">

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
					<div class= "lst">
						<span class="createur_div">Créateur : </span><span class="createur"><?php echo $value['pseudo']?></span>
						<a href=<?php if (array_key_exists('loggued_as',$_SESSION))echo("?ps=" . $_SESSION['loggued_as']. "&name=" . $value['image_name']);?>><img src="./ressources/icons/like_icons.svg" alt="like_image" class="like_img" style="width: 12%;"></a>
						<a href=<?php if (array_key_exists('loggued_as',$_SESSION))echo("?ds=" . $_SESSION['loggued_as']. "&name=" . $value['image_name']);?>><img src="./ressources/icons/unlike_icons.svg" alt="like_image" class="like_img" style="width: 12%;"></a>
						<img src ="./ressources/icons/comment_icons.svg" alt="comment_image" class="comment_img" style="width: 12%;">
						<?php
							if (array_key_exists('loggued_as', $_SESSION))
							{
								if ($value['pseudo'] == $_SESSION['loggued_as'])
								?><a href=<?php echo("?del=" . $value['image_name']) ?>><img src="./ressources/icons/delete_icons.svg" style="width: 12%;"></a>
								<?php
							}
						?>
					</div>
				</div>
				<?php
			}
			?>
			<!-- <div class="col-4" id="1">
				<img src=<?php echo("./ressources/db_images/" .$lst[0]['image_name']) . ".png"?> alt="" srcset="">
			</div>
			<div class="col-4" id="2">
			<img src=<?php echo("./ressources/db_images/" .$lst[1]['image_name']) . ".png"?> alt="" srcset="">
			</div>
			<div class="col-4" id="3">
			<img src=<?php echo("./ressources/db_images/" .$lst[2]['image_name']) . ".png"?> alt="" srcset="">
			</div> -->
		</div>
	</div>
	<?php

}catch(PDOException $err)
{
	echo "fail";
}
?>