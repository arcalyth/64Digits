<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $user = null;
	public $isGuest = true;
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	
	public function __construct($id,$module=null) { 
		parent::__construct($id,$module);
		
		//To set the $this->user up
		$this->user();
	}

	public function user(){
		$this->isGuest = true;
		if ($this->user == null){ //Only perform once, performance.
			$this->user = Users::model()->findByPK(Yii::app()->request->cookies['uid']);
			if ($this->user != null){
				if ($this->user->authenticate(Yii::app()->request->cookies['upw'], true) != Users::ERROR_NONE){
					$this->user = null;
				}else{
					$this->isGuest = false;
				}
			}
		}
		
		return $this->user;
	}
	
}