<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

	//Yii complains if these are not public.
	private $_user = null;
	private $_isGuest = true;
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/main',
	 * meaning using a single column layout. See 'protected/views/layouts/main.php'.
	 */
	public $layout='//layouts/main';
	
	public function __construct($id,$module=null) {
	   parent::__construct($id,$module);
	   $this->user();
	   }

	public function isGuest(){
		return $this->_isGuest;
	}
	public function user(){
		if ($this->_user === null){ //Only perform once, performance.
		  if (isset(Yii::app()->request->cookies['uid'])){
    		  $this->_user = Users::model()->findByPK(Yii::app()->request->cookies['uid']->value);
    		  if ($this->_user != null){
    		      if ($this->_user->authenticate(Yii::app()->request->cookies['upw']->value, true) != Users::ERROR_NONE){
    				/*Bad Auth.*/
    				$this->_user = null;
    				$this->_isGuest = true;
    				}else{
    					$this->_isGuest = false;
    				}
    			}
    		}
		}
		
		return $this->_user;
	}
	
}