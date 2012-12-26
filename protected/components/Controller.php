<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

	//Yii complains if these are not public.
	public $user = null;
	public $isGuest = true;
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/main',
	 * meaning using a single column layout. See 'protected/views/layouts/main.php'.
	 */
	public $layout='//layouts/main';

	public function isGuest(){
		$this->user();
		return $this->isGuest;
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