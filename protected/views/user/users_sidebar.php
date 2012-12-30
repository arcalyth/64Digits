<?php
	$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar'));
	
		$this->widget('application.components.Sidebar', array(
			'sidebar' => "activitySideBar",
			'data' => array(
						array(	"id"=>"1",
								"type"=>"blog",
								"title"=>"Hectocosm",
								"time"=>time()-rand(0,15000),
								"users"=>array(
											array(2,1,3)
										),
								"format"=>"%u commented %t"
						),
						array(	"id"=>"2",
								"type"=>"blog",
								"title"=>"S4D 2012 - UPDATE",
								"time"=>time()-rand(0,15000),
								"users"=>array(
											array(2),
											array(2)
										),
								"format"=>"%u commented %t"
						),
						array(	"id"=>"3",
								"type"=>"blog",
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
		
		/**/
		?>
		<div class="section">
			<div class="section-header meta">
				<h1><?php echo $user->username; ?>'s Groups</h1>
			</div>
			<div class="section-content">
				<ul>
				<?php
					$group_membership = GroupMembers::model()->findAllByAttributes(array("user_id"=>$user->id));
					foreach ($group_membership as $group){
					
						//Check to make sure the group isn't private, and if it is, only show if we're a member of it.
						if ($group->group->is_private == false || ($this->user() && $group->group->hasMember($this->user()->id))){
							print "<li>
										<a href='".$this->createURL("/group/".$group->group->id)."'>".
											/*Some groups have an optional %s in them. Apply that.*/
											$this->formatString($group->group->name,array($user->username))
										."</a>
									</li>";
							
						}
					}
				?>
				</ul>
			</div>
		</div>
		
		<?php
		/**/
		
		
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