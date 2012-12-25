<?php

	class Sidebar extends CWidget{
		public $sidebar;
		public $data = array();
		public function run(){
			$this->render($this->sidebar,$this->data);
		}
	}

?>