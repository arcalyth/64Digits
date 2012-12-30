<?php

class UserController extends Controller
{
	private $user_page = null;
	
	public function beforeAction($action){
	
		//If we don't know who the user is, assume it's the logged in user.
		$_GET['user'] = (isset($_GET['user'])) ? $_GET['user'] : "";
		
		if ($_GET['user'] == "" && $this->user()){
			$_GET['user'] = $this->user()->username;
		}
		
		if ($_GET['user'] == ""){
			throw new CHttpException(404,'The specified user cannot be found.');
			return false;
		}
		
		$this->user_page = Users::model()->findByAttributes(array("username"=>$_GET['user']));
		
		if ($this->user_page == null){
			throw new CHttpException(404,'The specified user cannot be found.');
			return false;
		}
		
		//This may need to change based on context.
		//This is the basic sidebar that has the activity log, active users, and new users.
		//It get's ob'd out and sent to a CClipWidget so we don't have to worry about WHEN it is rendered.
		$this->renderPartial("users_sidebar",
			array(
				"user"	=>	$this->user_page,
				"owner"	=>	($this->user() && $this->user_page->id == $this->user()->id)
			)
		);
		
		//As per documentation, if beforeAction returns false or nothing, the regular action is not performed.
		//So, we want to return true here.
		return true;
	}
	
	/*Not currently in use.*/
	public function actionIndex(){
		$this->render('index');
	}
	
	public function actionView(){
		$this->render('index');
	}
	
	public function actionFilemanager(){
		print "FM";
		$this->render('index');
	}
	

}