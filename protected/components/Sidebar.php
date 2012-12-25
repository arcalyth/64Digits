<?php

	class Sidebar extends CWidget{
		public $sidebar;
		public $data = array();
		public function run(){
			$this->render($this->sidebar,$this->data);
		}
		
		
		//Splits string intelligibly
		public function formatDescription($format,$entry){
			return preg_replace_callback('/%(.)/', function($m) use ($entry) {
			
				//%u = user(s)
				//%m = media(s)
				//%t = time
				$pos['u']=0;
				$pos['m']=0;
				switch ($m[1]) {
					case 'u':
						$users = $entry['users'][$pos['u']]; //Eventually will need to lookup ID's
						
						switch (count($users)){
							case 0:
								return "A ghost";
							break;
							case 1:
								return "<u>".$users[0]."</u>";
							break;
							case 2:
								return "<u>".$users[0]." and ". $users[1]."</u>";
							break;
							default:
								return "<u>".count($users)." users"."</u>";
							break;
						}
						
					case 't':
					  return (new Time())->timeAgoInWords($entry['time']);
					case '%':
					  return '%';
					default:
				}
			}, $format);
		}
		
	}

?>