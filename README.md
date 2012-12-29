Dependencies
================================
* PHP 5.4.7+
* Node 6.8.0+
* MySQL 5.5.23+
* Yii v1.1.12


Libraries Used
================================
* http://www.yiiframework.com/
* http://handlebarsjs.com/
* http://nodejs.org/
* http://socket.io/
* https://github.com/felixge/node-mysql
* http://www.sceditor.com/

Installation
================================
	1) Install Yii Framework somewhere outside of the repo. 
		(Recommended to be in ../yii, assuming you're in a public_html folder)
			Should look like this:
			/yii/{framework}
			/public_html/{v4}
	2) Modify index.php to point to that Yii install
		The current copy is in a sub-directory, so it's pointing two directories back.
		Most likely, you'll need to remove one set of ../ from the path.
	3) cp protected/config/main-copy.php protected/config/main.php; 
		Configure the main.php file with your own database credentials (component -> db)
	4) cp protected/config/console-copy.php protected/config/console.php;
		Configure this file with the same database credentials.
	5) ./protected/yiic migrate
		Will list all migrations available. 
		Use the command `./protected/yiic migrate up <X>` to upgrade database X steps.
	6) cp .htaccess-copy .htaccess;
		You shouldn't have to modify this file unless you're in a subdirectory. If so, include it in the BASEPATH folder. This takes care of the redirector.
	7) Install node.js & dependancies (via package.json, included)
		cd node; npm install;
		Start node/server.js as a daemon. You can do this in a screen or whatever.
	8) Configure Node for MYSQL...
		cp config-copy.js config.js;
		Add required fields (You'd think there would be a way to not have to do this a dozen times...)

Quick Install (After cloning and setting up Yii)
================================
	cd node; npm install; cd ../;
	cp .htaccess-copy .htaccess;
	cp protected/config/main-copy.php protected/config/main.php;
	cp protected/config/console-copy.php protected/config/console.php;
	cp config-copy.js config.js;
	**Configure the MySQL credentials in main.php, console.php, and config.js**
	./protected/yiic migrate up 1
	cd node; screen; node server.js;
	

Relevant Documentation
================================
* Yii Migrations
	 http://www.yiiframework.com/doc/guide/1.1/en/database.migration
