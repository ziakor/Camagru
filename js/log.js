

//HEADER

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
		+'<div id="forget_link"><a href="./forget.php" id="forget_password">Forget password</a></div>'
		+ "<input class=\"btn btn-primary\" type=\"submit\" name=\"login_sub\" value=\"identifiez-vous\">"
	}
	else if (type === "signup_form")
	{
		var text="<div class=\"form-group\">"
		+ "<label for=\"InputPseudo\">Pseudo:</label>"
		+ "<input type=\"username\" class=\"form-control rz\" placeholder=\"5 caracteres alphanumeriques\" id=\"InputPseudo\" name=\"InputPseudo\" pattern=\"[a-zA-Z0-9]{5,27}\">"
		+ "</div>"
		+ "<div class=\"form-group\">"
		+ "<label for=\"InputPassword\">Password:</label>"
		+ "<input type=\"password\" class=\"form-control rz\" id=\"InputPassword1\" name=\"InputPassword1\" autocomplete=\"new-password\" placeholder=\"7 caracteres alphanumeriques\" pattern=\"[a-zA-z0-9]{6,30}\" required=\"required\">"
		+ "</div>"
		+ "<div class=\"form-group\">"
		+ "<label for=\"InputPassword\">Password Confirmation</label>"
		+ "<input type=\"password\" class=\"form-control rz\" id=\"InputPassword2\" autocomplete=\"new-password\" placeholder=\"Password Confirmation\" name=\"InputPassword2\" pattern=\"[a-zA-z0-9]{6,30}\" required=\"required\">"
		+ "</div>"
		+ "<div class=\"form-group\">"
		+ "<label for=\"InputEmail\">Email address</label>"
		+ "<input type=\"email\" class=\"form-control rz\" id=\"InputEmail1\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" name=\"InputEmail\">"
		+ "</div>"
		+ "<div class=\"form-group form-check\">"
		+ "<input type=\"checkbox\" class=\"form-check-input rz_check\" name=\"use_cond\" value=\"true\" id=\"Check1\" >"
		+ "<label class=\"form-check-label\" for=\"Check\">J'accepte les conditions d'utilisations!</label>"
		+ "</div>"
		+ "<input class=\"btn btn-primary\" type=\"submit\" name=\"register\"value=\"créer votre compte\">"
	}
	newelem.innerHTML = text;
	parent.after(newelem);
}


//MAIN
var t = 0;
function	active_sup(id)
{
	parent = document.getElementById(id);
	if (parent.style.backgroundColor == 'green')
	{
		//parent.style.opacity = '1';
		parent.querySelector('img').className = "item_content img-fluid";
		//parent.style.backgroundColor = 'rgba(' + ['0','0','0','0.01'].join(',') + ')';
		parent.style.backgroundColor = 'black';
	}
	else{
		//console.log(parent.querySelector('img'));
		parent.querySelector('img').className = "item_content img-fluid" + ' order-' + t;
		t++;
		parent.style.backgroundColor = 'green';
		//parent.style.opacity = '0.5';
	}
}


const constraints = {
	video: true
};
//console.log("BUG?")
function choice(id)
{
	if (id == "webcam")
	{
		//console.log("coucou")
		document.getElementById('file_back').style.display = "none";
		document.getElementById('image_c').style.display = "none";
		document.getElementById('webcam').querySelector('video').style.display="block";
		navigator.mediaDevices.getUserMedia(constraints).
		then((stream) => {video.srcObject = stream});
		//console.log("< COUCOU")
	}
	else if (id == "image")
	{
		//console.log("PASCOUCOU")
		document.getElementById('image_c').style.display = "block";
		document.getElementById('webcam').querySelector('video').style.display="none";
		document.getElementById('file_back').style.display = "block";
	}
}


//utilisation d'une image
if(window.location.pathname.split("/").pop() == "index.php"){
window.onload = function() {

	var fileInput = document.getElementById('file_back');
	var fileDisplayArea = document.getElementById('image_c');


	fileInput.addEventListener('change', function(e) {
		var file = fileInput.files[0];
		if (file.type.match(/image.png/)) {
			var reader = new FileReader();
			fileDisplayArea.style.display = "block";
			reader.onload = function(e) {
				//fileDisplayArea.innerHTML = "";

				var img = new Image();
				img.src = reader.result;
				img.setAttribute('id','back_image')
				fileDisplayArea.append(img)
			}

			reader.readAsDataURL(file);
		} else {
			fileDisplayArea.innerHTML = "File not supported!"
		}
	});

}}
//utilisation de la webcam
if(window.location.pathname.split("/").pop() == "index.php"){
if (document.getElementById('video').style.display !== "none"){
const video = document.querySelector('video');

navigator.mediaDevices.getUserMedia(constraints).
then((stream) => {video.srcObject = stream});
}}
function getElementsByIdStartsWith(container, selectorTag, prefix) {
	var items = [];
	var myPosts = document.getElementById(container).getElementsByTagName(selectorTag);
	for (var i = 0; i < myPosts.length; i++) {
		//omitting undefined null check for brevity
		if (myPosts[i].id.lastIndexOf(prefix, 0) === 0) {
			items.push(myPosts[i]);
		}
	}
	return items;
}
function sortMe(a, b) {
	var q = a.className.match(/[order-]+\d+/)[0].replace("order-","");
	q = Number(q);
	var w = b.className.match(/[order-]+\d+/)[0].replace("order-","");
	w = Number(w);
	//console.log( q + " : " + w);
	return q - w;
}

function convertImageToCanvas(image, scale) {
	var canvas = document.createElement("canvas");
	canvas.width = video.videoWidth * scale;
	canvas.height = video.videoHeight * scale;
	document.getElementById('position_image').value = canvas.width + ",";
	document.getElementById('position_image').value += canvas.height;
	canvas.getContext('2d').drawImage(image,0, 0, canvas.width, canvas.height);
	return canvas;
}
var getDataUrl = function (img) {
	var canvas = document.createElement('canvas')
	var ctx = canvas.getContext('2d')

	canvas.width = img.width
	canvas.height = img.height


	ctx.drawImage(img, 0, 0)

	// If the image is not png, the format
	// must be specified here
	return canvas.toDataURL()
}

var id_rm = 0;

function capture_image()
{
	var k = 0;
	var el = getElementsByIdStartsWith("item", "div", "sup");
	for (let index = 0; index < el.length; index++) {
		if (el[index].style.backgroundColor === 'green')
		{
			k = 1
		}
	}
	if (k > 0)
	{
		output = document.getElementById('output');
		var scale = 1
		var canvas = document.createElement("canvas");

		if (document.getElementById('video').style.display == "block")
		{
			var canvas = convertImageToCanvas(document.getElementById('video'), scale);
			document.getElementById('list_image').value += canvas.toDataURL() + "|";
		}
		else
		{
			var canvas = convertImageToCanvas(document.getElementById('back_image'), scale);
			document.getElementById('list_image').value += canvas.toDataURL() + "|";
		}
		var lst = getElementsByIdStartsWith("item", "div", "sup");
		arraylst = [];
		let cc = 0;
		for (let index = 0; index < lst.length; index++) {
			if (lst[index].style.backgroundColor === 'green')
			{
				arraylst[cc] = lst[index].querySelector('img');
				document.getElementById('list_image').value +=  (arraylst[cc].src + "|")
				cc++;
			}
		}
		arraylst.sort(sortMe);
		for (let index = 0; index < arraylst.length; index++) {
			canvas.getContext('2d').drawImage(arraylst[index],
				0, 0, canvas.width, canvas.height);
			}
		var img = document.createElement("img");
		img.src = canvas.toDataURL();
		img.setAttribute('id', id_rm);
		img.setAttribute('onclick', "remove_image(" + id_rm + ")")
		document.getElementById('output').appendChild(img);
		document.getElementById('list_image').value += "&";
		id_rm++;
	}
}


function remove_image(id)
{
	 element = document.getElementById(id);
	var str = document.getElementById('list_image').value;
	var field = str.split('&')
	field.forEach(element => {
		console.log(element)
	});
	field.splice(id,1);
	new_str = field.join('&');
	console.log(new_str)
	document.getElementById('list_image').value = new_str;
	element.parentNode.removeChild(element);
	id_rm--;

}

if(window.location.pathname.split("/").pop() == "gallerie.php")
{

}

/*
**SETTINGS FUNCTION
*/

function change_check()
{
	var parent = document.getElementById('input_receive_mail');
	if (parent.checked === true)
	{
		parent.value = 1;
	}
	if (parent.checked === false)
	{
		parent.value = 0;
	}
}