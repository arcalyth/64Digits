<?php

class AjaxController extends Controller
{
	private $return;
	
	public function beforeAction($action){
		$this->return = array();
		//As per documentation, if beforeAction returns false or nothing, the regular action is not performed.
		//So, we want to return true here.
		return true;
	}
		
	public function actionLogin(){
	
		$user = Users::model()->findByAttributes(array("username"=>$_POST['username']));
		
		$this->return["success"]=false;
		
		if ($user != null && $user->authenticate($_POST['password']) == Users::ERROR_NONE){
		
			$this->return["success"]=true;
			$this->return["data"] = array(
				array(
					"replaces"=>".sub_bar",
					"html"=>$this->renderPartial("application.views.global.userbar",array("user"=>$user), true) //Not sure if this actually works or not.
				)
			);
		}
		
		echo json_encode($this->return);
		Yii::app()->end();		
		return true;
	}
		
}