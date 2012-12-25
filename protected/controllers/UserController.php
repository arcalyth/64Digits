<?php

class UserController extends Controller
{
	public function beforeAction($action){
		//This may need to change based on context.
		//This is the basic sidebar that has the activity log, active users, and new users.
		//It get's ob'd out and sent to a CClipWidget so we don't have to worry about WHEN it is rendered.
		$this->renderPartial("sidebar");
		
		//As per documentation, if beforeAction returns false or nothing, the regular action is not performed.
		//So, we want to return true here.
		return true;
	}
	
	public function actionIndex(){
		$this->render('index');
	}
	
}