<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>

	<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
	<!-- Handlebars libary -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/handlebars-1.0.js"></script>
	
	<!-- JS responding to the main layout only. -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/node/socket.io/socket.io.js"></script>
	
	<script>
	<?php
		$path = substr(Yii::app()->request->requestUri,strlen(Yii::app()->request->baseUrl));
		if ($path == "/"){
			$path = $this->uniqueid."/index";
		}
		$path = trim($path,"/");
		if (substr_count($path, "/") == 0){
			$path .= "/index";
		}
		
	?>
	
	  var socket = io.connect(':9090');
	  socket.emit('auth', { 
			path: "<?php print $path; ?>",
			guest: <?php print $this->isGuest() ? "1" : "0"; ?>,
			username: "<?php print $this->user()->username; ?>",
			authtoken: "<?php print $this->user()->password; /* TODO: Do a real auth token here.*/ ?>"
	  });
	  
	  socket.on('DebugUser', function (data) {
		console.log(data);
	  });
	  
	  socket.on('location', function (data) {
		console.log(data);
	  });
	</script>
</head>

<body class="<?php if ($this->isGuest()) echo "not-logged-in";?>">

<div id="top-bar">
	<div class="bar-inner top_bar">
        <h1>sixty four digits community</h1>
		<ul>
			<li class="active"><a id="logo" href="<?php echo Yii::app()->request->baseUrl; ?>/"></a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/media/games">games</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/media/music">music</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/media/art">art</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/media/examples">examples</a></li>
		</ul>

		<div id="search-wrapper">
			<input placeholder="search" type="text" id="search-field" />
		</div>
	</div>
</div>

<div id="top-bar-sub">
	<div class="bar-inner sub_bar">
	<?php 
		if ($this->isGuest()){
			$this->renderPartial("application.views.global.loginbar");
		}else{
			$this->renderPartial("application.views.global.userbar",array("user"=>$this->user()));		
		}
	?>
		
	</div>
</div>

<script>
	$("#login_button").click(function() {
		var u = $("#login_username").val();
		var p = $("#login_password").val();
		var r = $("#login_remember").val();
		
		$.ajax({
			type: "post",
			url: "<?php print Yii::app()->request->getUrl(); ?>ajax/login",
			data: {
					username: u,
					password: p, 
					remember: r
				},
			success: function(data){
			
				data = jQuery.parseJSON(data);
				if (data.success === true){
					$.each(data.data, function(index, obj){
						$(obj.replaces).hide().html(obj.html).fadeIn('slow');
					});
				}
			},
			error: function(data) {
				alert("Looks like the login failed because of an HTTP error.");
			}
		});
				
	});
</script>

<div id="container">
	<div id="sidebar-wrapper">
		<?php 
			/*
			* CClipWidget for the sidebar. 
			* This is most often rendered in sidebar.php inside the specific controllers beforeAction / (view)sidebar.php renderization.
			* This allows a custom sidebar for each page.
			*/
			echo $this->clips['sidebar']; 
		?>
	</div>

	<div id="main-wrapper">
		<?php echo $content; ?>
	</div>
</div>

<footer>
    <p>Here goes footer stuff and stuff</p>
</footer>

</body>
</html>