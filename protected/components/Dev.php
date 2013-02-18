<?php

class Dev{
	public static function log($tag,$value){
		if (Session::user()->hasRole("developer")){
			print "<!-- DEVTAG for `".$tag."` = '".print_r($value,true)."' -->";
		}
	}
}

?>