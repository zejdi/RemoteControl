<?php  
if(isset($_GET["times"]) && isset($_GET["key"]))
{
	if(strcmp($_GET["times"], "single") == 0){
		exec("start Keyboard.exe single ".$_GET["key"]);
	}
	elseif (strcmp($_GET["times"],"multiple")==0 && isset($_GET["repetition"])) {
		exec("start Keyboard.exe multiple ".$_GET["key"]." ".$_GET["repetition"]);
	}
}
elseif (isset($_GET["times"]) && isset($_GET["firstkey"]) && isset($_GET["secondkey"])) {
	if(strcmp($_GET["times"], "combination")==0)
	{
		exec("start Keyboard.exe combination ".$_GET["firstkey"]." ".$_GET["secondkey"]);
	}
	elseif(strcmp($_GET["times"], "dcombination")==0 && isset($_GET["thirdkey"]))
	{
		exec("start Keyboard.exe dcombination ".$_GET["firstkey"]." ".$_GET["secondkey"]." ".$_GET["thirdkey"]);
	}
}

?>