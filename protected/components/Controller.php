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
		if ($this->_user == null){
			$this->_user = Session::user();
			if ($this->_user == null){
				$this->_isGuest = true;
			}else{
				$this->_isGuest = false;		
			}
		}
		return $this->_user;
	}
	
	public function formatString($format,$values){
		
		Yii::import('ext.Time');

		return preg_replace_callback('/%(.)/', function($m) use ($values) {
			$values_pos = 0;
			
			switch ($m[1]) {
				case 's':
					return $values[$values_pos];
				break;
				case 't':
				  return (new Time())->timeAgoInWords($values[$values_pos]);
				case '%':
				  return '%';
				default:
			}
		}, $format);
	}
}