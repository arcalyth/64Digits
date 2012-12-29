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
			$user->last_login = time();
			$user->logins++;
			$user->save();
			
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
	
	/*
		Saves the static documents in the database
	*/
	public function actionStatic(){
		$this->return["success"] = false;
		$this->return["new"] = false;
		
		if ($this->user() && $this->user()->hasRole("static")){
			$page = StaticPage::model()->findByPK($_POST['id']);
			
			if ($page == null){
				$page = new StaticPage();
				$this->return["new"] = true;
			}
			
			$page->tag = $_POST['tag'];
			$page->title = $_POST['title'];
			$page->body = $_POST['body'];
			$page->last_modified = time();
			
			$this->return["success"] = $page->save();
		}
		
		echo json_encode($this->return);
	}
}