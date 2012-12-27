<?php

class HomeController extends Controller
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
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex(){
	
		Yii::import('ext.Notify');
		//Temporary handlers I have setup in the client.html for the node.JS work.
		(new Notify())->emit("DebugUser",array("name"=>"yes-1"))
		->emit("DebugUser",array("name"=>"yes"),array("url"=>"home"))
		->emit("DebugUser",array("name"=>"yes2"),array("user"=>1))
		->emit("DebugUser",array("name"=>"yes3"),array("user"=>array(1,2)))
		->emit("DebugUser",array("name"=>"yes4"),array("user"=>1));
		
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError(){
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout(){
		unset(Yii::app()->request->cookies['uid']);
		unset(Yii::app()->request->cookies['upw']);
		$this->redirect(Yii::app()->homeUrl);
	}
}