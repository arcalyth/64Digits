<?php

class Session{
	public static function user(){
		if (isset(Yii::app()->request->cookies['uid'])){
			$user = Users::model()->findByPK(Yii::app()->request->cookies['uid']->value);
			if ($user != null && $user->authenticate(Yii::app()->request->cookies['upw']->value, true) == Users::ERROR_NONE){
				return $user;
			}else{
				return null;
			}
			
		}
		return null;
	}
}

?>