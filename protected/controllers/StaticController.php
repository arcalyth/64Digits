<?php

class StaticController extends Controller
{
	
	public function actionIndex(){
	
		$criteria = new CDbCriteria();
		$criteria->order = "title ASC";
	
		$pagedata = StaticPage::model()->findAll($criteria);
		$this->render("index",array("pages"=>$pagedata));
	
	}
	
	public function actionView(){
		$page =  $_GET['page'];
		$pagedata = StaticPage::model()->findByAttributes(array("tag"=>$page));
		if ($pagedata == null){
			/*This page doesn't exist, but if we have `static` permissions
			* Make it so that we have the options to "edit" it (which is really create)
			* Otherwise, redirect to the index page.
			*/
			if ($this->user() && $this->user()->hasRole("static")){
				$this->actionEdit();
			}else{
				$this->actionIndex();
			}
		}else{
			$this->render("static",
				array(
					"tag"=>$pagedata->tag,
					"title"=>$pagedata->title,
					"content"=>$pagedata->content,
					"last_modified"=>$pagedata->modification_date,
					"edit_permissions" => ($this->user() && $this->user()->hasRole("static"))
				));
		}
	}
	
	public function actionEdit(){
		$page =  $_GET['page']; 
		$pagedata = StaticPage::model()->findByAttributes(array("tag"=>$page));
		
		if ($this->user() && $this->user()->hasRole("static")){
			Yii::app()->getClientScript()->registerCssFile(yii::app()->request->baseUrl.'/css/jquery.sceditor.default.min.css', 'screen');
			Yii::app()->getClientScript()->registerCssFile(yii::app()->request->baseUrl.'/css/sceditor.css', 'screen');
			
			$this->render("staticEditor",array(
				"new"=>($pagedata == null),
				"id"=>isset($pagedata->id) ? $pagedata->id : "0",
				"tag"=>isset($pagedata->tag) ? $pagedata->tag : $page,
				"title"=>isset($pagedata->title) ? $pagedata->title : "New",
				"content"=>isset($pagedata->content) ? $pagedata->content : "New Document",
				"last_modified"=>isset($pagedata->modification_date) ? $pagedata->modification_date : time(),
			));
		}else{
			echo "permission issues";
		}
	}
}