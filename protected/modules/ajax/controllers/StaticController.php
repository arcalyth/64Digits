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
		
		$page = StaticPage::model()->findByAttributes(array("tag"=>$_POST['tag']));
		
		/*
		* I have not confirmed if this logic actually works or not. It should do:
		* Ensure logged in ($this->user())
		* Check if they're a mod of static pages, OR
		* 		If the page isn't new (to stop non-object errors), and they're in the pages group.
		*/
		if ($this->user() && ($this->user()->hasRole("static") || ($page != null && $this->user()->isInGroupByID($page->group)))){
			
			if ($page == null){
				$page = new StaticPage();
				$page->author_id = $this->user()->id;
				$this->return["new"] = true;
			}
							
			$page->tag = $_POST['tag'];
			$page->title = $_POST['title'];
			$page->content = $_POST['content'];
			$page->last_modified_user_id = $this->user()->id;
			
			$page->group = ($_POST['group'] != "0") ? $_POST['group'] : null;
			$page->category = $_POST['category'];
			$page->visible = $_POST['visible'];
			
			$this->return["success"] = $page->save();
			$this->return["errors"] = $page->getErrors();
		}
		
		echo json_encode($this->return);
	}
}