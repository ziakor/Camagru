
//FIXME: finir les formulaires de connexion/inscription
function Form_connection(type){
		var parent = document.getElementById("navbarheader");
		if ((test = document.getElementById('signin_form')) != null)
			test.parentNode.removeChild(test);
		if ((test = document.getElementById('signup_form')) != null)
			test.parentNode.removeChild(test);
		var newelem = document.createElement("form")
		newelem.setAttribute("id", type)
		newelem.setAttribute("method", "post")
		newelem.setAttribute("action", "./src/header/log.php")
		if (type === "signin_form"){
			var text ="<div class=\"form-group\">"
			+ "<label for=\"InputEmail1\">Email address</label>"
			+ "<input type=\"email\" class=\"form-control rz\" id=\"InputEmail1\" name=\"InputEmail\" autocomplete=\"username email\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\"></div>"
			+ "<div class=\"form-group\">"
			+ "<label for=\"InputPassword1\">Password</label>"
			+ "<input type=\"password\" class=\"form-control rz\" id=\"InputPassword1\" autocomplete=\"current-password\" name=\"InputPassword\" placeholder=\"Password\">"
			+ "</div>"
			+ "<input class=\"btn btn-primary\" type=\"submit\" name=\"login_sub\" value=\"identifiez-vous\">"
		}
		else if (type === "signup_form")
		{
			var text="<div class=\"form-group\">"
			+ "<label for=\"InputPseudo\">Pseudo:</label>"
			+ "<input type=\"username\" class=\"form-control\" placeholder=\"5 caracteres alphanumeriques\" id=\"InputPseudo\" name=\"InputPseudo\" pattern=\"[a-zA-z0-9]{5,}\">"
			+ "</div>"
			+ "<div class=\"form-group\">"
			+ "<label for=\"InputPassword\">Password:</label>"
			+ "<input type=\"password\" class=\"form-control\" id=\"InputPassword1\" name=\"InputPassword1\" autocomplete=\"new-password\" placeholder=\"7 caracteres alphanumeriques\" pattern=\"[a-zA-z0-9]{6,}\" required=\"required\">"
			+ "</div>"
			+ "<div class=\"form-group\">"
			+ "<label for=\"InputPassword\">Password Confirmation</label>"
			+ "<input type=\"password\" class=\"form-control\" id=\"InputPassword2\" autocomplete=\"new-password\" placeholder=\"Password Confirmation\" name=\"InputPassword2\" pattern=\"[a-zA-z0-9]{6,}\" required=\"required\">"
			+ "</div>"
			+ "<div class=\"form-group\">"
			+ "<label for=\"InputEmail\">Email address</label>"
			+ "<input type=\"email\" class=\"form-control\" id=\"InputEmail1\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" name=\"InputEmail\">"
			+ "</div>"
			+ "<div class=\"form-group form-check\">"
			+ "<input type=\"checkbox\" class=\"form-check-input\" name=\"use_cond\" value=\"true\" id=\"Check1\" >"
			+ "<label class=\"form-check-label\" for=\"Check\">J'accepte les conditions d'utilisations!</label>"
			+ "</div>"
			+ "<input class=\"btn btn-primary\" type=\"submit\" name=\"register\"value=\"créer votre compte\">"
		}
		newelem.innerHTML = text;
		parent.after(newelem);
}

function	ConfirmationForm(key, pseudo)
{
	console.log("bite")
}
