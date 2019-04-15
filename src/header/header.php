	<header class="container-fluid">
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
    <form class="form-inline my-2 my-lg-0">
	  <button class="btn btn-outline-success my-2 my-sm-0 signin" type="submit" onclick="Form_connection('signin_form')">Sign-in</button>

      <button class="btn btn-outline-success my-2 my-sm-0 signup" type="submit" onclick="Form_connection('signup_form')">Sign-up</button>	  
    </form>
  </div>
</nav>
<form class="signup_form">
  <div class="form-group">
    <label for="InputPseudo">Pseudo:</label>
    <input type="text" class="form-control" placeholder="Pseudo 5 caractere alphanumeriques" id="InputPseudo" pattern="[A-Z][0-9]{5}">
  </div>
  <div class="form-group">
    <label for="InputPassword">Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="7 caractere alphanumeriques" pattern="[A-Z][0-9]{7}">
  </div>
  <div class="form-group">
    <label for="InputPassword">Password Confirmation</label>
    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password Confirmation" pattern="[A-Z][0-9]{7}">
  </div>
  <div class="form-group">
    <label for="InputEmail">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="Check">J'accepte les conditions d'utilisations!</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</header>

//TODO:Ajout utilisateur base de donnee
//TODO:Connexion/Deconnexion
