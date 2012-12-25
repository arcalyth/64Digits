<?php
	$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar'));
	
		$this->widget('application.components.Sidebar', array(
			'sidebar' => "activitySideBar",
			'data' => array(
						array(	"type"=>"blog",
								"title"=>"Hectocosm",
								"time"=>time(),
								"users"=>array(
											array("sirxemic","ChIkEn","Cesque"), //These eventually will be ID's
											array("sirxemic")
										),
								"format"=>"%u commented on %u's music piece %t"
						),
						array(	"type"=>"blog",
								"title"=>"S4D 2012 - UPDATE",
								"time"=>time(),
								"users"=>array(
											array("sirxemic"),
											array("sirxemic")
										),
								"format"=>"%u commented on %u's music piece %t"
						),
						array(	"type"=>"blog",
								"title"=>"Im out (again)",
								"time"=>time(),
								"users"=>array(
											array("sirxemic","ChIkEn"),
											array("cyrusroberto")
										),
								"format"=>"%u commented on %u's music piece %t"
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