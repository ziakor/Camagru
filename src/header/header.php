<header class="container-fluid no-pad">
	<nav class="navbar navbar-expand " id ="navbarheader">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link" href="./index.php">HOME</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./gallerie.php">GALLERIE</a>
			</li>
			<?php 
				if (array_key_exists('loggued_as', $_SESSION))
				{
					?>
			<li class="nav-item">
				<a class="nav-link" href="./settings.php">SETTINGS</a>
			</li>
					<?php
				}
			?>
			</ul>
			<?php
				if (!array_key_exists('loggued_as', $_SESSION))
				{
					echo "<button class=\"btn my-2 my-sm-0 signin\" onclick=\"Form_connection('signin_form')\">Sign-in</button>";
					echo "<button class=\"btn my-2 my-sm-0 signup\" onclick=\"Form_connection('signup_form')\">Sign-up</button>";
				}
				else
				{	echo "Bonjour " . $_SESSION['loggued_as'] . "<button class=\"btn log btn-outline-success my-2 my-sm-0 signout\" onClick=\"document.location.href='./index.php?state=logout'\" />Sign-out</button>";
				}
			?>
		</div>
		

	</nav>
	<?php
		if (!array_key_exists('loggued_as', $_SESSION)){
			if (array_key_exists('error', $_GET)) {
					echo '<div id="error_div">' . $_GET['error'] . '</div>';
				} else if (array_key_exists('success', $_GET)) {
					echo '<div id="success_div">' . $_GET['success'] . '</div>';
				}
			}
			?>
</header>


