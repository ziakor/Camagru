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
	$sql = "SELEC";
	?>
	<div class="container gallerie_container">
		<nav aria-label="pagination_container" class="pagination_container">
			<ul class="pagination">
				<li class="page-item"><a class="page-link" href="?page=1">Previous</a></li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
		</nav>
		<div class="row row_gallerie">
			<div class="col-4" id="1">
				COUCOU 1
			</div>
			<div class="col-4" id="2">
				COUCOU 2
			</div>
			<div class="col-4" id="3">
				COUCOU 3
			</div>
		</div>
	</div>
	<?php

}catch(PDOException $err)
{
	echo "fail";
}
?>