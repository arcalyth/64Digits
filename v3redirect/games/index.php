<?php
	if (isset($_GET['cmd'])){
		switch ($_GET['cmd']){
			case "view_game":
				header("Location: /".getenv("BASEPATH")."media/game/".$_GET['id']);
			break;
		}
	}
	
	if (isset($_GET['example'])){
		header("Location: /".getenv("BASEPATH")."media/examples/");
	}
	
?>