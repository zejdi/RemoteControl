<?php  
	exec("start ScreenCapture.exe");
	exec("start ScreenCoordinates.exe") 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title></title>
	<style type="text/css">
		
		body{
			margin-top: 0px;
			margin-left: 0px;
		}

		#main{
			margin-top: 0;
			<?php 
				$file=fopen("Res.txt", "r");
				echo "width: ".fgets($file).";";
				echo "height: ".fgets($file).";";
				fclose($file);
			?>
			background-image: url("Screen.png");
			background-repeat: no-repeat;
			background-size: 100% 100%;
		}

		#contextmenu{
			position:  absolute;
			visibility: hidden;
			opacity: 0;
			transition: visibility 0.15s linear,opacity 0.15s linear;
			height: 15vw;
			width: 15vw;
		}
		#contextmenu ul{
			margin-top: 0;
			border-radius: 0.5vw;
			padding: 0;
			list-style: none;
			background-color: rgb(25,25,25,0.8);
		}
		#contextmenu li{
			font-family: "Cambria";
			font-size: 1.5vw;
			padding: 1vw;
			text-align: center;
			color: white;
		}
		#contextmenu li:hover{
			background-color: rgba(255,32,32,0.8);
			cursor:pointer;

		}
		#contextmenu li:last-child:hover{
			border-bottom-right-radius: 0.5vw;
			border-bottom-left-radius: 0.5vw;

		}
		#contextmenu li:first-child:hover{
			border-top-right-radius: 0.5vw;
			border-top-left-radius: 0.5vw;	
		}

		#wheel-modal{
			position: absolute;
			top: 25vh;
			left: 36vw;
			visibility: hidden;
			opacity: 0;
			transition: visibility 0.15s linear,opacity 0.15s linear;
			border-radius: 2%;
			background-color: rgb(232,232,232);
			width: 30vw;
			height: 18vw;
			border:2px solid black;
		}

		#wheel-modal-header{
			height: 5.5vh;
			width: 100%;
			border-top-right-radius:2%; 
			border-top-left-radius:2%;
			border-bottom: 0.8px solid black;
			background-color: rgb(233,43,43);
			text-align: center;
			font-family:"Cambria"; 
			font-size: 24.5px;
			padding-top: 0.5vw;
			padding-bottom: 0;
		}

		#wheel-modal-header p{
			margin-top: 0;
			display: inline-block;
		}
		#wheel-modal-header img{
			float: right;
			width: 1.5vw;
			height: 1.5vw;
			margin-right: 0.5vw;
			margin-top: 0;
		}
		#wheel-modal-header img:hover{
			cursor: pointer;
		}
		#wheel-modal-body{
			margin-top: 0;
			text-align: center;
			font-family: "Cambria";
			font-size: 2vw;
		}
		#wheel-modal-body p{
			margin-top: 0.5vw;
			margin-bottom: 0;

		}
		#wheel-modal-body select{
			width: 20vw;
			height: 2vw;
			font-family: "Corbel";
			font-weight: bold;
			padding-left: 8.5vw;
		}
		#wheel-modal-body input[type=number]
		{
			text-align: center;
			height: 1.6vw;
			width: 20vw;
			bottom: 1px solid #323232;
			font-weight: bold;
		}

		#wheel-modal-button{
			font-family: "Cambria";
			height: 2vw;
			width: 15vw;
			font-size: 1.5vw;
			padding-bottom: 1.8vw;
		}

		body::-webkit-scrollbar{
			width: 0px;
		}

	</style>
</head>
<body>
<div id="contextmenu">
	<ul>
		<li>Left-Click Mouse</li>
		<li>Double-Left-Click Mouse</li>
		<li>Right-Click Mouse</li>
		<li>Wheel Mouse</li>
	</ul>
</div>
<div id="main">
</div>
<div id="wheel-modal">
<div id="wheel-modal-header">
	<img src="close.png" onmouseenter="OnImageEnter(this)" onmouseleave="OnImageLeave(this)" onclick="OnModalImageClick()">
	<p>Specify direction and delta</p>
</div>
<div id="wheel-modal-body">
<form onsubmit="return OnButtonClick(this)">
	<p>Direction</p>
	<select name="direction">
		<option selected>Up</option>
		<option>Down</option>
		<option>Left</option>
		<option>Right</option>
	</select>
	<p>Delta</p>
	<input type="number" name="delta" onchange="OnDeltaChange(this)" onkeyup="OnDeltaChange(this)">
	<br>
	<button id="wheel-modal-button">Click</button>
</form>
</div>
</div>
<script type="text/javascript">
//Variable section	
var relImageCalled=false;
var mainDOMObject = document.getElementById('main');
var contextmenu = document.getElementById("contextmenu");
var Ajax = new XMLHttpRequest();
var x,y;
var contextmenuOptions= document.querySelectorAll("#contextmenu ul li");
var wheel_modal = document.getElementById("wheel-modal");


//Function Section

Ajax.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200)
	{
		if(relImageCalled)
		{
			setTimeout(function(){mainDOMObject.style.backgroundImage = 'url(Screen.png?'+Math.random()+')';},500);
			relImageCalled=false;
		}
	}
};

function OnDeltaChange(e)
{
	if(e.value <=-1)
	{
		e.value=0;
	}
	else if(e.value >=99999)
	{
		e.value=99999;
	}
}

function OnButtonClick(e)
{
	var Direction = e.elements["direction"].value;
	var Delta = e.elements["delta"].value;
	if(Direction != "" && Delta != "")
	{
		Ajax.open("GET","MouseMove.php?operation=wheel&direction="+Direction.toLowerCase()+"&delta="+Delta);
		Ajax.send();
	}	
	setTimeout(function(){ReloadImage();},800);
	return false;
}

function ReloadImage()
{
	relImageCalled=true;
	Ajax.open("GET","ScreenCapture.php",false);
	Ajax.send();
	
}

function OnImageEnter(e)
{
	e.src = "close-white.png";
}

function OnImageLeave(e)
{
	e.src = "close.png";
}

function OnModalImageClick()
{
	wheel_modal.style.opacity = "0";
	wheel_modal.style.visibility = "hidden";	
}

function onClickEvent(e){
	
	if(this.innerHTML == "Left-Click Mouse")
	{
		Ajax.open("GET","MouseMove.php?operation=click&sub-operation=left-click&x="+x+"&y="+y,true);
		Ajax.send();
		contextmenu.style.opacity = "0";
	    contextmenu.style.visibility = "hidden";
	   	ReloadImage();
	}
	else if(this.innerHTML == "Double-Left-Click Mouse")
	{
		Ajax.open("GET","MouseMove.php?operation=click&sub-operation=double-click&x="+x+"&y="+y,true);
		Ajax.send();
		contextmenu.style.opacity = "0";
	    contextmenu.style.visibility = "hidden";
	   ReloadImage();
	}
	else if(this.innerHTML == "Right-Click Mouse")
	{
		Ajax.open("GET","MouseMove.php?operation=click&sub-operation=right-click&x="+x+"&y="+y,true);
		Ajax.send();
		contextmenu.style.opacity = "0";
	    contextmenu.style.visibility = "hidden";	
	   	ReloadImage();
	}
	else if(this.innerHTML == "Wheel Mouse")
	{
		var wheelModalCompStyle=window.getComputedStyle(wheel_modal);
		if(wheelModalCompStyle.visibility == "hidden")
		{
			wheel_modal.style.opacity = "1.0";
			wheel_modal.style.visibility = "visible";
			contextmenu.style.opacity = "0";
		    contextmenu.style.visibility = "hidden";
		}
		else if(wheelModalCompStyle.visibility == "visible")
		{
			wheel_modal.style.opacity = "0";
			wheel_modal.style.visibility = "hidden";	
			contextmenu.style.opacity = "0";
		    contextmenu.style.visibility = "hidden";
		}
	}
	else
	{

	}
}


//Code
console.log(mainDOMObject);
console.log(contextmenuOptions);
console.log(wheel_modal);

mainDOMObject.oncontextmenu=function(e)
{
	var conMenuCompStyle=window.getComputedStyle(contextmenu);
	x=e.offsetX;
	y=e.offsetY;
	if(conMenuCompStyle.visibility == "hidden")
	{
		console.log(e);
		contextmenu.style.top = e.offsetY+"px";
		contextmenu.style.left = e.offsetX+"px";
		contextmenu.style.opacity = "1.0";
		contextmenu.style.visibility = "visible";
    }
    else if(conMenuCompStyle.visibility == "visible")
    {
    	contextmenu.style.opacity = "0";
	    contextmenu.style.visibility = "hidden";
    }
	return false;
};

for(var i=0;i<contextmenuOptions.length;i++)
{
	contextmenuOptions[i].addEventListener("click",onClickEvent);
}


mainDOMObject.addEventListener("click",function(e){
	var conMenuCompStyle=window.getComputedStyle(contextmenu);
	if(conMenuCompStyle.visibility=="visible")
	{
		contextmenu.style.opacity = "0";
	    contextmenu.style.visibility = "hidden";	
	}
	else
	{
		Ajax.open("GET","MouseMove.php?operation=move&x="+e.offsetX+"&y="+e.offsetY,false);
		Ajax.send();
	}
});


</script>
</body>
</html>