<?php

class StaticController extends Controller
{
	private $return;
	
	public function beforeAction($action){
		$this->return = array();
		//As per documentation, if beforeAction returns false or nothing, the regular action is not performed.
		//So, we want to return true here.
		return true;
	}
	
	
	/*
		Saves the static documents in the database
	*/
	public function actionSave(){
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