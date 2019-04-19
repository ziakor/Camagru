<header class="container-fluid no-pad">
	<div class="header">
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id ="navbarheader">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link" href="#">HOME</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">GALLERIE</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			</li>
			</ul>
			<?php
				if (!array_key_exists('loggued_as', $_SESSION))
				{
					echo "<button class=\"btn btn-outline-success my-2 my-sm-0 signin\" onclick=\"Form_connection('signin_form')\">Sign-in</button>";
					echo "<button class=\"btn btn-outline-success my-2 my-sm-0 signup\" onclick=\"Form_connection('signup_form')\">Sign-up</button>";
				}
				else
				{	echo "Bonjour " . $_SESSION['loggued_as'] . "<button class=\"btn btn-outline-success my-2 my-sm-0 signout\" onClick=\"document.location.href='./index.php?state=logout'\" />Sign-out</button>";
				}
		?>

	</nav>
</header>


