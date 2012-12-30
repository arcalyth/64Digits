<?php

class GroupController extends Controller
{
	
	public function actionIndex(){
	
		$criteria = new CDbCriteria();
		$criteria->order = "title ASC";
	
		$pagedata = StaticPage::model()->findAll($criteria);
		$this->render("index",array("pages"=>$pagedata));
	
	}
	
}