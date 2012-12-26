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