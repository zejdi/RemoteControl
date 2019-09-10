<?php 

	//!Check whether a operation is specified
	if(isset($_GET["operation"]))
	{

		if(strcmp($_GET["operation"],"move") == 0){

			if(isset($_GET["x"])&&isset($_GET["y"]))
			{
				exec("start MouseMove.exe move ".$_GET["x"]." ".$_GET["y"]);
			}
		}
		else if(strcmp($_GET["operation"], "click") == 0){
			
			if(isset($_GET["sub-operation"]) && isset($_GET["x"]) && isset($_GET["y"]))
			{
				exec("start MouseMove.exe click ".$_GET["sub-operation"]." ".$_GET["x"]." ".$_GET["y"]);
			}
		}
		elseif (strcmp($_GET["operation"], "wheel") == 0) {
			
			if(isset($_GET["delta"]) && isset($_GET["direction"]))
			{
				exec("start MouseMove.exe wheel ".$_GET["direction"]." ".$_GET["delta"]);
			}
		}
		else 
			die("You didn't specify an operation.");

	}


?>