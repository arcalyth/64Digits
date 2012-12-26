<?php
	if (isset($_GET['g'])){
		if (isset($_GET['id'])){
			header("Location: /".getenv("BASEPATH")."media/download/".$_GET['id']);
		}
	}
?>