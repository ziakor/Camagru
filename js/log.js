

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

function choice(id)
{
	if (id === "webcam")
	{
		console.log("coucou")
		document.getElementById('image_c').style.display = "none";
		document.getElementById('webcam').querySelector('button').style.display="block";
		document.getElementById('webcam').querySelector('video').style.display="block";
	}
	else
	{
		document.getElementById('image_c').style.display = "block";
		document.getElementById('webcam').querySelector('video').style.display="none";
		document.getElementById('webcam').querySelector('button').style.display="none";
	}
}

const video = document.querySelector('video');

navigator.mediaDevices.getUserMedia(constraints).
then((stream) => {video.srcObject = stream});

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
		console.log( q + " : " + w);
		return q - w;
	 }

function capture_image()
{
	var video = document.getElementById('video');
	output = document.getElementById('output');
	//console.log(getElementsByIdStartsWith("item", "div", "sup"));
	var scale = 0.50;

	var canvas = document.createElement("canvas");
	canvas.width = video.videoWidth * scale;
	canvas.height = video.videoHeight * scale;
	canvas.getContext('2d').drawImage(video,0, 0, canvas.width, canvas.height);
	//canvas.getContext('2d').drawImage(document.getElementById('sup3').querySelector('img'),0, 0, canvas.width, canvas.height);


	var lst = getElementsByIdStartsWith("item", "div", "sup");
	var k = 0;
	arraylst = [];
	let cc = 0;
	for (let index = 0; index < lst.length; index++) {
		console.log(index + " : " + lst[index].style.backgroundColor);
		if (lst[index].style.backgroundColor === 'green')
		{
			arraylst[cc] = lst[index].querySelector('img');
			cc++;
		}
}
	arraylst.sort(sortMe);
	//console.log("ARRAY: " + arraylst);
	for (let index = 0; index < arraylst.length; index++) {
		//console.log( " >>" +arraylst[index]);
		canvas.getContext('2d').drawImage(arraylst[index],
		0, 0, canvas.width, canvas.height);
	}



	var img = document.createElement("img");
	img.src = canvas.toDataURL();
	output.prepend(img);
}


// var can = document.getElementById('canvas1');
// var ctx = can.getContext('2d');

// ctx.fillStyle = 'rgba(255,0,0,.4)';
// ctx.fillRect(20,20,20,80);
// ctx.fillStyle = 'rgba(205,255,23,.4)';
// ctx.fillRect(30,30,40,50);
// ctx.fillStyle = 'rgba(5,255,0,.4)';
// ctx.fillRect(40,50,80,20);

// var can2 = document.getElementById('canvas2');
// var ctx2 = can2.getContext('2d');

// ctx2.beginPath();
//   ctx2.fillStyle = "pink";
//   ctx2.arc(50, 50, 50, 0, Math.PI * 2, 1);
//   ctx2.fill();
//   ctx2.beginPath();
//   ctx2.clearRect(20, 40, 60, 20);

// var can3 = document.getElementById('canvas3');
// var ctx3 = can3.getContext('2d');



// ctx3.drawImage(can, 0, 0);
// ctx3.drawImage(can2, 0, 0);