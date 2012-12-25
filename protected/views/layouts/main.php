<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>

	<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="<?php

if (Yii::app()->user->isGuest) echo "not-logged-in";

?>">

<div id="top-bar">
	<div class="bar-inner">
        <h1>sixty four digits community</h1>
		<ul>
			<li class="active"><a id="logo" href="#"></a></li>
			<li><a href="#">games</a></li>
			<li><a href="#">music</a></li>
			<li><a href="#">art</a></li>
			<li><a href="#">examples</a></li>
		</ul>

		<div id="search-wrapper">
			<input placeholder="search" type="text" id="search-field" />
		</div>
	</div>
</div>

<div id="top-bar-sub">
	<div class="bar-inner">
		<ul>
			<li><a href="#">my page</a></li>
			<li><a href="#">submit</a></li>
			<li><a class="inbox-link" href="#"><span>inbox</span> <span class="inline-badge">212</span></a></li>
			<li><a href="#">settings</a></li>
			<li class="seperator"></li>
			<li><a href="#">log out</a></li>
		</ul>
	</div>
</div>


<div id="container">
	<div id="sidebar-wrapper">
		<?php echo $this->clips['sidebar']; ?>
	</div>

	<div id="main-wrapper">
		<?php echo $content; ?>
	</div>
</div>
<!--
<footer>
    <p>Here goes footer stuff and stuff</p>
</footer>
-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
<!--
</body> fuck you, code that is inserted into every damn page
-->
</body>
</html>