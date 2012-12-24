<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'64Digits',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'fbsux',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('69.133.201.176'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
		    'urlFormat'=>'path',
			'showScriptName'=>false,
			 'caseSensitive'=>false,        
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=',
			'emulatePrepare' => true,
			'username' => '',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			/*'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),*/
			'routes' => array(
                array(
                    'class' => 'ext.phpconsole.PhpConsoleYiiExtension',
                    'handleErrors' => true,
                    'handleExceptions' => true,
                    'basePathToStrip' => dirname($_SERVER['DOCUMENT_ROOT'])
                )
            )
			
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);