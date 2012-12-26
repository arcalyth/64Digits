<?php

	class Sidebar extends CWidget{
		public $sidebar;
		public $data = array();
		public function run(){
			$this->render($this->sidebar,$this->data);
		}

		//Splits string intelligibly
		public function formatDescription($format,$entry){
			
			Yii::import('ext.Time');

			return preg_replace_callback('/%(.)/', function($m) use ($entry) {
			
				//%u = user(s)
				//%m = media(s)
				//%t = time
				$pos['u']=0;
				$pos['m']=0;
				switch ($m[1]) {
					case 'u':
						$users = $entry['users'][$pos['u']]; //Eventually will need to lookup ID's
						$user_group = Users::model()->findAllByPK($users);
						$entry['users'][$pos['u']]++;
						
						switch (count($users)){
							case 0:
								return "<u>A ghost</u>";
							break;
							case 1:
								return "<a href='".Yii::app()->request->baseUrl."/user/".$user_group[0]->username."'>
											<span class='tiny-avatar'>
												<img title='".$user_group[0]->username."' src='".$user_group[0]->avatar_location."' />
											</span> ".$user_group[0]->username.
										"</a>";
							break;
							case 2:
								return "<a href='".Yii::app()->request->baseUrl."/user/".$user_group[0]->username."'>
											<span class='tiny-avatar'>
												<img title='".$user_group[0]->username."' src='".$user_group[0]->avatar_location."' />
											</span> ".$user_group[0]->username.
										"</a>".
										" and ".
										"<a href='".Yii::app()->request->baseUrl."/user/".$user_group[1]->username."'>
											<span class='tiny-avatar'>
												<img title='".$user_group[1]->username."' src='".$user_group[1]->avatar_location."' />
											</span> ".$user_group[1]->username.
										"</a>";
							break;
							case 3:	case 4:	case 5: case 6:
								$data = "";
								foreach ($user_group as $user){
									$data .= "<a href='".Yii::app()->request->baseUrl."/user/".$user->username."'>
													<span class='tiny-avatar'>
														<img title='".$user->username."' src='".$user->avatar_location."'>
													</span>
												</a>";
								}
								
								$data .= "&nbsp;".count($user_group)." users"."";
								
								return $data;
							break;
							default:
								$data = "";
								$max = 6;
								foreach ($user_group as $user){
									if ($max <= 0){break;}
									$data .= "<a href='".Yii::app()->request->baseUrl."/user/".$user->username."'>
													<span class='tiny-avatar'>
														<img title='".$user->username."' src='".$user->avatar_location."'>
													</span>
												</a>";
									$max--;
								}
								
								$data .= "&nbsp;".count($user_group)." users"."";
								
								return $data;
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