<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $user = null;
	public $isGuest = true;
	public $layout='//layouts/main';
	
	public function __construct($id,$module=null) { 
		parent::__construct($id,$module);
		
		//To set the $this->user up
		$this->user();
	}

	public function user(){
		$this->isGuest = true;
		
		//Only perform once, performance.
		if ($this->user == null){
			$this->user = Users::model()->findByPK(Yii::app()->request->cookies['uid']);
			
			if ($this->user != null && $this->user->authenticate(Yii::app()->request->cookies['upw'], true) != Users::ERROR_NONE){
				//Invalid, this user is a guest.
				$this->user = null;
				$this->isGuest = true;
			}else{
				//Is a user.
				$this->isGuest = false;
			}
		}
		
		return $this->user;
	}	
}