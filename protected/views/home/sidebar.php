<?php
	$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar'));
	
		$this->widget('application.components.Sidebar', array(
			'sidebar' => "activitySideBar",
			'data' => array(
						array(	"type"=>"blog",
								"title"=>"Hectocosm",
								"time"=>time()-rand(0,15000),
								"users"=>array(
											array(2,1,3)
										),
								"format"=>"%u commented %t"
						),
						array(	"type"=>"blog",
								"title"=>"S4D 2012 - UPDATE",
								"time"=>time()-rand(0,15000),
								"users"=>array(
											array(2),
											array(2)
										),
								"format"=>"%u commented %t"
						),
						array(	"type"=>"blog",
								"title"=>"Im out (again)",
								"time"=>time()-rand(0,15000),
								"users"=>array(
											array(2,1),
											array(4)
										),
								"format"=>"%u commented %t"
						)
			)  
		));
		
		$this->widget('application.components.Sidebar', array(
			'sidebar' => "onlineUserSideBar",
			'data' => array(
			)
		));
		
		$this->widget('application.components.Sidebar', array(
			'sidebar' => "newUserSideBar",
			'data' => array(
			)
		));
	$this->endWidget(); 
?>