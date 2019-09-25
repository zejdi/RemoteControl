<?php  
	exec("start ScreenCapture.exe");
	exec("start ScreenCoordinates.exe") 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
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
		#sidenav{
			width: 0vw;
			height: 100%;
			position: fixed;
			background-color: rgba(15,15,15,0.2);
			transition: 0.5s;
			top: 0;
			left: 0;
		}

		#wheel-container{
			width: 100%;
			overflow: hidden;
			transition: 0.5s;
		}
		#wheel-header{
			height: 4vw;
			width: 100%;
			background-color: rgb(233,43,43);
			text-align: center;
			font-size: 1.6vw;
			color: white;
			font-style: bold;
			font-family: 'Righteous', cursive;
			border-bottom: 0.2px solid rgb(23,23,23);

		}
		#wheel-header p{
			padding: 0;
			display: inline-block;
			margin-top: 0;
			margin-top: 0.9vw;
		}
		#wheel-body{
			width: 100%;
			height: 18vw;
			border-bottom: 1px solid rgb(23,23,23);
			background-color: rgb(222,222,222);
		}
		#wheel-body p{
			display: inline-block;
			font-size: 2vw;
			margin: 0;
			margin-top: 0.5vw;
			margin-left: 8vw;
			text-align: center;
			font-family: 'Righteous',cursive;
		}
		#wheel-body p:last-of-type{
			display: inline-block;
			font-size: 2vw;
			margin: 0;
			margin-top: 0.5vw;
			margin-left: 9.4vw;
			text-align: center;
			font-family: 'Righteous',cursive;
		}

		#wheel-body select
		{
			display: block;
			width: 25vw;
			font-family: "Cambria";
			text-align: center;
			padding-left: 9vw;
			font-size: 2vw;
			height: 3vw;
		}

		#wheel-body input[type=number]{
			width: 24.9vw;
			height: 3vw;
			border:1px solid #ABABAB;
			font-family: "Cambria";
			text-align: center;
			font-size: 2vw;
		}

		#wheel-modal-button{
			font-family: "Cambria";
			margin-top: 1.5vw;
			margin-left: 4.5vw;
			height: 3vw;
			width: 15vw;
			font-size: 1.5vw;
			padding-top: 0.1vw;
		}
		/*#wheel-modal{
			position: absolute;
			top: 25vw;
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
			height: 3.5vw;
			width: 100%;
			border-top-right-radius:2%; 
			border-top-left-radius:2%;
			border-bottom: 0.8px solid black;
			background-color: rgb(233,43,43);
			text-align: center;
			font-family:"Cambria"; 
			padding-top: 0.5vw;
			padding-bottom: 0;
		}

		#wheel-modal-header p{
			margin-top: 0;
			font-size: 1.9vw;
			margin-top: 0.0001vw;
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
			height: 20vw;
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
		}*/

		#keyboard-grid{
			visibility: hidden;
			position: absolute;
			top: 15vw;
			left: 18vw;
			width: 65vw;
			height: 17.5vw;
			display: grid;
			background-color: rgba(45,45,45,0.8);
			border-radius: 0.9vw;
			grid-template-rows: 3vw 3vw 3vw 3vw 3vw;
			transition: visibility 0.15s linear,opacity 0.15s linear;
		}

		#move{
			background-color: rgba(45,45,45,0.8);
			top: -1.2vw;
			display: inline-block;
			width: 1.5vw;
			height: 1vw;
			position: absolute;
		}
		#repet{
			position: absolute;
			display: inline-block;
			width: 1vw;
			left: 3vw;
			height: 1vw;
			top: -2vw;
			visibility: hidden;
		}

		#repet input[type="number"]{
			left: 3vw;
			width: 6vw;
			text-align: center;
			height: 1.5vw;
			border-radius: 0.5vw;
			border: 1px solid rgb(143,143,143);
			outline: none;
		}

		#comb{
			position: absolute;
			top: -2vw;
			height: 1.5vw;
			width: 10vw;
			text-align: center;
			background-color: white;
			border-radius: 0.5vw;
			border: 1px solid rgb(143,143,143);		
			left: 3vw;
			visibility: hidden;
		}
		.row-1{
			background-color: rgb(233,125,125);
			border-radius: 0.2555vw;
			width: 3vw;
			border-bottom: 0.15vw solid rgb(43,43,43);
			margin-left: 1.13vw;
			height: 1.6vw;
			padding-top: 0.4vw;
			text-align: center;
			font-size: 1.1vw;
			grid-row: 1;
		}
		.row-1:first-child{
			margin-left: 0px;
			border-top-left-radius: 1.1vw;
		}
		.row-1:nth-child(16){
			border-top-right-radius:1.1vw;
		}
		.row-1:active{
			background-color: rgb(244,32,32);
		}
		.row-2{
			grid-row: 2;
			width: 3vw;
			text-align: center;
			height: 1.6vw;
			padding-top: 0.4vw;
			background-color: green;
			background-color: rgb(233,125,125);
			border-bottom: 0.15vw solid rgb(43,43,43);
			margin-left: 1.13vw;
			font-size: 1.1vw;
			margin-top: 0;
			border-radius: 0.2555vw;
		}
		.row-2:nth-child(17){
			margin-left: 0;
		}

		.row-2:active{
			background-color: rgb(244,32,32);
		}

		.row-3{
			grid-row: 3;
			width: 3vw;
			text-align: center;
			height: 1.6vw;
			padding-top: 0.4vw;
			background-color: green;
			background-color: rgb(233,125,125);
			border-bottom: 0.15vw solid rgb(43,43,43);
			margin-left: 1.13vw;
			margin-top: 0;
			font-size: 1.1vw;
			border-radius: 0.2555vw;
		}
		.row-3:nth-child(33)
		{
			margin-left: 0;
		}
		.row-3:active{
			background-color: rgb(244,32,32);
		}

		.row-4{
			grid-row: 4;
			width: 3vw;
			text-align: center;
			height: 1.6vw;
			padding-top: 0.4vw;
			background-color: green;
			background-color: rgb(233,125,125);
			border-bottom: 0.15vw solid rgb(43,43,43);
			margin-left: 1.13vw;
			margin-top: 0;
			font-size: 1.1vw;
			border-radius: 0.2555vw;
		}

		.row-4:nth-child(49){
			margin-left: 0;
		}

		.row-4:active{
			background-color: rgb(244,32,32);
		}

		.row-5{
			grid-row: 5;
			width: 3vw;
			text-align: center;
			height: 1.6vw;
			padding-top: 0.4vw;
			background-color: green;
			background-color: rgb(233,125,125);
			border-bottom: 0.15vw solid rgb(43,43,43);
			margin-left: 1.13vw;
			margin-top: 0;
			font-size: 1.1vw;
			border-radius: 0.2555vw;
		}

		.row-5:nth-child(65){
			margin-left: 0;
		}
		.row-5:active{
			background-color: rgb(244,32,32);
		}

		.row-6{
			grid-row: 6;
			width: 3vw;
			text-align: center;
			height: 1.6vw;
			padding-top: 0.4vw;
			background-color: green;
			background-color: rgb(233,125,125);
			border-bottom: 0.15vw solid rgb(43,43,43);
			margin-left: 1.13vw;
			margin-top: 0;
			font-size: 1.1vw;
			border-radius: 0.2555vw;
		}

		.row-6:nth-child(81){
			margin-left: 0;
		}
		.row-6:active{
			background-color: rgb(244,32,32);
		}

		.pointer-cursor{
			cursor: pointer;
		}

		#repetition{
			position: absolute;
			top: -2.5vw;
			transition: all 0.5s;
			left: 45vw;
			width: 10vw;
			height: 2.4vw;
			font-size: 2vw;
			color: white;
			border-bottom:1px solid rgb(23,23,23);
			border-bottom-right-radius: 0.5vw;
			border-bottom-left-radius: 0.5vw;
			background-color: rgb(233,33,33);
			text-align: center;

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
		<li>Keyboard</li>
	</ul>
</div>
<div id="main">
</div>
<!--<div id="wheel-modal">
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
-->
<div id="sidenav">
	<div id="wheel-container">
		<div id="wheel-header">
			<p>Specify the direction and delta</p>
		</div>
		<div id="wheel-body">
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
</div>
<div id="repetition">Single</div>
<div id="keyboard">
	<div id="keyboard-grid">
		<div class="row-1 pointer-cursor" name="27">Esc</div>
		<div class="row-1 pointer-cursor" name="112">F1</div>
		<div class="row-1 pointer-cursor" name="113">F2</div>
		<div class="row-1 pointer-cursor" name="114">F3</div>
		<div class="row-1 pointer-cursor" name="115">F4</div>
		<div class="row-1 pointer-cursor" name="116">F5</div>
		<div class="row-1 pointer-cursor" name="117">F6</div>
		<div class="row-1 pointer-cursor" name="118">F7</div>
		<div class="row-1 pointer-cursor" name="119">F8</div>
		<div class="row-1 pointer-cursor" name="120">F9</div>
		<div class="row-1 pointer-cursor" name="121">F10</div>
		<div class="row-1 pointer-cursor" name="122">F11</div> 
		<div class="row-1 pointer-cursor" name="123">F12</div>
		<div class="row-1 pointer-cursor" name="44">Pr.Scr</div>
		<div class="row-1 pointer-cursor" name="145">ScrLo</div>
		<div class="row-1 pointer-cursor" name="19">Pause</div>

		<div class="row-2 pointer-cursor" name="192">`</div>
		<div class="row-2 pointer-cursor" name="49">1</div>
		<div class="row-2 pointer-cursor" name="50">2</div>
		<div class="row-2 pointer-cursor" name="51">3</div>
		<div class="row-2 pointer-cursor" name="52">4</div>
		<div class="row-2 pointer-cursor" name="53">5</div>
		<div class="row-2 pointer-cursor" name="54">6</div>
		<div class="row-2 pointer-cursor" name="55">7</div>
		<div class="row-2 pointer-cursor" name="56">8</div>
		<div class="row-2 pointer-cursor" name="57">9</div>
		<div class="row-2 pointer-cursor" name="189">-</div>
		<div class="row-2 pointer-cursor" name="187">=</div>
		<div class="row-2 pointer-cursor" name="8">BaSp</div>
		<div class="row-2 pointer-cursor" name="45">Insert</div>
		<div class="row-2 pointer-cursor" name="36">Home</div>
		<div class="row-2 pointer-cursor" name="33">Pa.Up</div>

		<div class="row-3 pointer-cursor" name="9">Tab</div>
		<div class="row-3 pointer-cursor" name="81">q</div>
		<div class="row-3 pointer-cursor" name="87">w</div>
		<div class="row-3 pointer-cursor" name="69">e</div>
		<div class="row-3 pointer-cursor" name="82">r</div>
		<div class="row-3 pointer-cursor" name="84">t</div>
		<div class="row-3 pointer-cursor" name="89">y</div>
		<div class="row-3 pointer-cursor" name="85">u</div>
		<div class="row-3 pointer-cursor" name="73">i</div>
		<div class="row-3 pointer-cursor" name="79">o</div>
		<div class="row-3 pointer-cursor" name="80">p</div>
		<div class="row-3 pointer-cursor" name="219">[</div>
		<div class="row-3 pointer-cursor" name="221">]</div>
		<div class="row-3 pointer-cursor" name="46">Delete</div>
		<div class="row-3 pointer-cursor" name="35">End</div>
		<div class="row-3 pointer-cursor" name="34">Pg.D</div>

		<div class="row-4 pointer-cursor" name="20">CaLo</div>
		<div class="row-4 pointer-cursor" name="65">a</div>
		<div class="row-4 pointer-cursor" name="83">s</div>
		<div class="row-4 pointer-cursor" name="68">d</div>
		<div class="row-4 pointer-cursor" name="70">f</div>
		<div class="row-4 pointer-cursor" name="71">g</div>
		<div class="row-4 pointer-cursor" name="72">h</div>
		<div class="row-4 pointer-cursor" name="74">j</div>
		<div class="row-4 pointer-cursor" name="75">k</div>
		<div class="row-4 pointer-cursor" name="76">l</div>
		<div class="row-4 pointer-cursor" name="186">;</div>
		<div class="row-4 pointer-cursor" name="222">'</div>
		<div class="row-4 pointer-cursor" name="220">\</div>
		<div class="row-4 pointer-cursor" name="13">Enter</div>
		<div class="row-4 pointer-cursor" name="38">Up</div>
		<div class="row-4 pointer-cursor" name="144">NuLo</div>

		<div class="row-5 pointer-cursor" name="160">Shift</div>
		<div class="row-5 pointer-cursor" name="90">z</div>
		<div class="row-5 pointer-cursor" name="88">x</div>
		<div class="row-5 pointer-cursor" name="67">c</div>
		<div class="row-5 pointer-cursor" name="86">v</div>
		<div class="row-5 pointer-cursor" name="66">b</div>
		<div class="row-5 pointer-cursor" name="78">n</div>
		<div class="row-5 pointer-cursor" name="77">m</div>
		<div class="row-5 pointer-cursor" name="188">,</div>
		<div class="row-5 pointer-cursor" name="190">.</div>
		<div class="row-5 pointer-cursor" name="191">?</div>
		<div class="row-5 pointer-cursor" name="161">Shift</div>
		<div class="row-5 pointer-cursor" id="repetition_opti" value="single"></div>
		<div class="row-5 pointer-cursor" name="37">Left</div>
		<div class="row-5 pointer-cursor" name="40">Down</div>
		<div class="row-5 pointer-cursor" name="39">Right</div>
 
		<div class="row-6 pointer-cursor" name="162">Ctrl</div>
		<div class="row-6 pointer-cursor" name="91">Win</div>
		<div class="row-6 pointer-cursor" name="164">Alt</div>
		<div class="row-6 pointer-cursor" name="" style="grid-column-start: span 9;width: 36.1vw;">Space</div>
		<div class="row-6 pointer-cursor" name="165">Alt</div>
		<div class="row-6 pointer-cursor" name="92">Win</div>
		<div class="row-6 pointer-cursor" name="93">Menu</div>
		<div class="row-6 pointer-cursor" name="163">Ctrl</div>
	
		<div id="move"></div>
		<div id="repet"><input id="num" type="number" name="repet" placeholder="Repetition" onchange="onRepetationChange(this)" onkeyup="onRepetationChange(this)"></div>
		<div id="comb"></div>
	</div>
</div>
<script type="text/javascript">
//Variable section	
var Combination;
var CombArray = [];
var ComArrayIdent = 0; 
var relImageCalled=false;
var mainDOMObject = document.getElementById('main');
var contextmenu = document.getElementById("contextmenu");
var Ajax = new XMLHttpRequest();
var x,y;
var contextmenuOptions= document.querySelectorAll("#contextmenu ul li");
var sidenavWheel = document.getElementById("sidenav");
var keyboardg = document.getElementById("keyboard-grid");
var move = document.getElementById("move");
var repetition_opti = document.getElementById("repetition_opti");
var repetition_indic = document.getElementById("repetition");
var multiple = document.getElementById("repet");
var combin = document.getElementById("comb");

//Function Section

function OnKeyboardGridDrag(e)
{
	if(e.which == 1)
	{
		document.onmousemove = OnMouseMove;
		document.onmouseup = clearEvent;
	}
}

function onClickRepetitionOpt(e)
{
	if(repetition_indic.innerHTML == "Single")
	{
		repetition_indic.innerHTML = "Multiple";
		multiple.style.visibility = "visible";
	}
	else if(repetition_indic.innerHTML == "Multiple")
	{
		repetition_indic.innerHTML = "Combi";
		multiple.style.visibility = "hidden";
		combin.style.visibility = "visible";
	}
	else if (repetition_indic.innerHTML == "Combi") {
		repetition_indic.innerHTML = "DCombi";
		combin.innerHTML = "";
	}
	else if (repetition_indic.innerHTML == "DCombi"){
		repetition_indic.innerHTML = "Single"
		combin.style.visibility = "hidden";
		combin.innerHTML = "";
		CombArray = [];
		ComArrayIdent = 0;
	}
}

function clearEvent(e)
{
	document.onmousemove = null;
	document.onmouseup = null;
}

function OnMouseMove(e)
{
	keyboardg.style.top = e.clientY + "px";
	keyboardg.style.left = e.clientX  + "px";
}

function OnKeyClicked(e)
{
	
	var audio = new Audio("Click.wav");
	audio.volume= 0.5;
	audio.play();
	if(repetition_indic.innerHTML == "Single")
	{
		Ajax.open("GET","Keyboard.php?times=single&key="+e.srcElement.getAttribute("name"),true);
		Ajax.send();
	}
	else if(repetition_indic.innerHTML == "Multiple")
	{
		var repetition_value = document.getElementById("num");
		Ajax.open("GET","Keyboard.php?times=multiple&key="+e.srcElement.getAttribute("name")+"&repetition="+repetition_value.value);
		Ajax.send();
	}
	else if(repetition_indic.innerHTML == "Combi")
	{
		if(e.srcElement.innerHTML == "Ctrl")
		{
				Combination ="" + e.srcElement.getAttribute("name");
				comb.innerHTML = "Ctrl";
		}
		else if(e.srcElement.innerHTML == "Alt")
		{
				Combination ="" + e.srcElement.getAttribute("name");
				comb.innerHTML = "Alt";		
		}
		else if(e.srcElement.innerHTML == "Shift")
		{
				Combination ="" + e.srcElement.getAttribute("name");
				comb.innerHTML = "Shift";
		}
		else if(e.srcElement.innerHTML == "Win")
		{
				Combination ="" + e.srcElement.getAttribute("name");
				comb.innerHTML = "Win";
		}
		else
		{
			if(Combination != null || Combination != "")
			{
				Ajax.open("GET","Keyboard.php?times=combination&firstkey="+Combination+"&secondkey="+e.srcElement.getAttribute("name"),true);
				Ajax.send();
			}
		}
	}
	else if(repetition_indic.innerHTML == "DCombi")
	{
		if(ComArrayIdent<2){
				if(e.srcElement.innerHTML == "Ctrl")
				{
						CombArray[ComArrayIdent++] ="" + e.srcElement.getAttribute("name");
						comb.innerHTML = comb.innerHTML + " " + e.srcElement.innerHTML;
				}
				else if(e.srcElement.innerHTML == "Alt")
				{
						CombArray[ComArrayIdent++] ="" + e.srcElement.getAttribute("name");
						comb.innerHTML = comb.innerHTML + " " + e.srcElement.innerHTML;
				}
				else if(e.srcElement.innerHTML == "Shift")
				{
						CombArray[ComArrayIdent++] ="" + e.srcElement.getAttribute("name");
						comb.innerHTML = comb.innerHTML + " " +  e.srcElement.innerHTML;
				}
				else if(e.srcElement.innerHTML == "Win")
				{
						CombArray[ComArrayIdent++] ="" + e.srcElement.getAttribute("name");
						comb.innerHTML = comb.innerHTML + " " + e.srcElement.innerHTML;
				}
		}
		else
		{
			Ajax.open("GET","Keyboard.php?times=dcombination&firstkey="+CombArray[0]+"&secondkey="+CombArray[1]+"&thirdkey="+e.srcElement.getAttribute("name"),true);
			Ajax.send();
		}
	}
	
	ReloadImage();
}
					
function OnKeyboardKeyClicked(e)
{
	Ajax.open("GET","Keyboard.php?times=single&key=")
}

Ajax.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200)
	{
		if(relImageCalled)
		{
			setTimeout(function(){mainDOMObject.style.backgroundImage = 'url(Screen.png?'+Math.random()+')';},800);
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

function onRepetationChange(e)
{
	if(e.value <=-1)
	{
		e.value=0;
	}
	else if(e.value >=50)
	{
		e.value=50;
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
		var WheelCompStyle = window.getComputedStyle(sidenavWheel);
		if(WheelCompStyle.width == "0px")
		{
			sidenavWheel.style.width = "25vw";
			contextmenu.style.opacity = "0";
		    contextmenu.style.visibility = "hidden";
		}	
		else
		{
			sidenavWheel.style.width="0vw";
			contextmenu.style.opacity = "0";
		    contextmenu.style.visibility = "hidden";
		}	
	}
	else if(this.innerHTML == "Keyboard")
	{
		var keyboardgCompStyle = window.getComputedStyle(keyboardg);
		if(keyboardgCompStyle.visibility == "hidden")
		{
			keyboardg.style.opacity = "1.0";
			keyboardg.style.visibility = "visible";
			repetition_indic.style.top = "0";
			contextmenu.style.opacity = "0";
		    contextmenu.style.visibility = "hidden";
		} 
		else if(keyboardgCompStyle.visibility == "visible")
		{
			keyboardg.style.opacity = "0";
			keyboardg.style.visibility = "hidden";
			repetition_indic.style.top = "-2.5vw"	
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

var keyboard = document.querySelectorAll("#keyboard-grid div");
for(var elem of keyboard)
{
	elem.onclick = OnKeyClicked;
}

move.onmousedown = OnKeyboardGridDrag;
repetition_opti.onclick=onClickRepetitionOpt;
multiple.onclick = null;

</script>
</body>
</html>