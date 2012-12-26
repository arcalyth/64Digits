<?php
	if (isset($_GET['userid'])){
		if (isset($_GET['cmd'])){
			switch ($_GET['cmd']){
				case "comments":
					header("Location: /".getenv("BASEPATH")."media/blog/".$_GET['id']);
				break;
			}
		}else{
			header("Location: /".getenv("BASEPATH")."user/".$_GET['userid']);
		}		
	}
?>