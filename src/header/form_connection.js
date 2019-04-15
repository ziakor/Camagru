

function Form_connection(type){
	console.log("1");
	if (type !== "signin_form" || type !== "signup_form"){	
		var parent = document.getElementById("navbarheader");
		if ((test = document.getElementsByClassName('signin_form')[0]) != null)
			test.parentNode.removeChild(test);
		if ((test = document.getElementsByClassName('signup_form')[0]) != null)
			test.parentNode.removeChild(test);
		var newelem = document.createElement("form")
		newelem.setAttribute("class", type)

		if (type === "signin_form"){
			var text ="<div class=\"form-group\">"
			+ "<label for=\"exampleInputEmail1\">Email address</label>"
			+ "<input type=\"email\" class=\"form-control rz\" id=\"exampleInputEmail1\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\"></div>"
			+ "<div class=\"form-group\">"
			+ "<label for=\"exampleInputPassword1\">Password</label>"
			+ "<input type=\"password\" class=\"form-control rz\" id=\"exampleInputPassword1\" placeholder=\"Password\">"
			+ "</div>"
			+ "<button type=\"submit\" class=\"btn btn-primary signin_sub\" onclick=\"Form_connection()\">Submit</button>";
		}
		else
		{

		}
		newelem.innerHTML = text;
		parent.after(newelem);
	}
}