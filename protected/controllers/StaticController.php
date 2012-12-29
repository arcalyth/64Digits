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
					"body"=>$pagedata->body,
					"last_modified"=>$pagedata->last_modified,
					"edit" => ($this->user() && $this->user()->hasRole("static"))
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
				"body"=>isset($pagedata->body) ? $pagedata->body : "New Document",
				"last_modified"=>isset($pagedata->last_modified) ? $pagedata->last_modified : time(),
			));
		}else{
			echo "permission issues";
		}
	}
}