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
		->emit("DebugUser",array("name"=>"yes"),array("url"=>"home/index"))
		->emit("DebugUser",array("name"=>"yes2"),array("user"=>1))
		->emit("DebugUser",array("name"=>"yes3"),array("user"=>array(1,2)))
		->emit("DebugUser",array("name"=>"Ryan is awesome AND #".rand(0,10000)))
		->emit("DebugUser",array("name"=>"Ryan is awesome AND #".rand(0,10000)))
		->emit("DebugUser",array("name"=>"Guests don't get this"),array("guest"=>false))
		->emit("DebugUser",array("name"=>"Guests get this"),array("guest"=>true))
		->emit("DebugUser",array("name"=>"yes4"),array("user"=>1));
		
		$this->render('index');
	}
    
	public function actionRegister(){
		//Validate registration form
		$valid = true;
		$valid = $valid && isset($_POST["fullname"]);
		$valid = $valid && isset($_POST["username"]);
		$valid = $valid && isset($_POST["password"]);
		$valid = $valid && isset($_POST["password2"]);
		$valid = $valid && isset($_POST["email"]);
		$valid = $valid && isset($_POST["sex"]);
		$valid = $valid && isset($_POST["terms"]);
		$valid = $valid && $_POST["password"] == $_POST["password2"];
		
		if($valid) {
			//Create new record
			$join_date = time();
			
			$user = new Users;
			$user->username = $_POST["username"];
			$user->email = $_POST["email"];
			$user->password = hash("sha256",$_POST["password"].$join_date);
			$user->gender = $_POST["sex"];
			$user->join_date = $join_date;
			$user->banned = 0;
			
			if($user->save()) {
				$this->render('index');
			} else {
				$this->render('register');
			}
		} else {
			$this->render('register');
		}
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
	
	public function actionStatic(){
		//These two lines simulate this url: /home/static/key($_GET)/$_GET[$page]="view"
		$page =  key($_GET);
		if ($page == ""){
			//Should print a tidy document of available static pages. 
			return;
		}
		$action = (isset($_GET[$page]) && $_GET[$page] != "") ? $_GET[$page] : "view";
		
		$pagedata = StaticPage::model()->findByAttributes(array("tag"=>$page));
		if ($pagedata == null){
			$action = ($this->user() && $this->user()->hasRole("static")) ? "new" : "error";
		}
		
		switch ($action){
			case "view":
				$this->render("static",
					array(
						"tag"=>$pagedata->tag,
						"title"=>$pagedata->title,
						"body"=>$pagedata->body,
						"last_modified"=>$pagedata->last_modified,
						"edit" => ($this->user() && $this->user()->hasRole("static"))
					));
			break;
			case "new":
			case "edit":
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
			break;
			case "error":
			break;
			default:
			break;
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