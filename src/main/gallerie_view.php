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
	//echo $nb;
	$sql = "SELECT * from `image` LIMIT " . $nb . ", " . ($nb + 5);
	$exec = $con->prepare($sql);
	$exec->execute();
	$lst = $exec->fetchAll();
	if (count($lst) > 0)
		$size_div = round(12 / count($lst));
	
	?>
	<div class="container gallerie_container">

		<nav aria-label="pagination_container" class="pagination_container">
			<ul class="pagination">
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . $prev)?>">Previous</a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . $prev)?>"><?php echo $prev?></a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . $nb)?>"><?php echo $nb?></a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . ($nb + 1))?>"><?php echo $nb + 1?></a></li>
				<li class="page-item"><a class="page-link" href="<?php echo("?page=" . ($nb + 1))?>">Next</a></li>
			</ul>
		</nav>
		<div class="row row_gallerie mx-auto">
			<?php 
				if (count($lst) > 4){
			?>
				<div class="<?php echo("col-". (round($size_div / 2)))?>">
				</div>

			<?php
				}
			foreach ($lst as $key => $value) {
				?>
				<div class="<?php echo("col-". $size_div ." no_pad div_img_gal")?>" id=<?php echo "" . $key ?>>
					<img  class="img_gal" src=<?php echo("./ressources/db_images/" .$value['image_name']) . ".png"?> alt= <?php echo($value['image_name'])?> >
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