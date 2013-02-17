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
			$page = StaticPage::model()->findByAttributes(array("tag"=>$_POST['tag']));
			
			if ($page == null){
				$page = new StaticPage();
				$page->author_id = $this->user()->id;
				$this->return["new"] = true;
			}
							
			$page->tag = $_POST['tag'];
			$page->title = $_POST['title'];
			$page->content = $_POST['content'];
			$page->last_modified_user_id = $this->user()->id;
			
			$this->return["success"] = $page->save();
			$this->return["errors"] = $page->getErrors();
		}
		
		echo json_encode($this->return);
	}
}