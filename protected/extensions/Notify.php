<?php
class Notify {
	private $ch;
	function __construct(){
		$this->ch = curl_init();
		//This SHOULD NOT CHANGE BASED ON ENVIRONMENT unless we place our Node.JS server somewhere other than localhost.
		curl_setopt($this->ch,CURLOPT_URL, "http://localhost:9091/emit.js");
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->ch,CURLOPT_POST, 1);
	}
	
	public function emit($event, $data){
	
		if (is_array($data)){
			$data = json_encode($data);
		}
		
		curl_setopt($this->ch,CURLOPT_POSTFIELDS, "handler=".$event."&broadcast=".$data);
		curl_exec($this->ch);
		return $this;
	}
}