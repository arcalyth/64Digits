<?php

echo "Input MySQL Hostname (Empty for localhost):";
$mysql_host = trim(fgets(STDIN));
$mysql_host = ($mysql_host != "") ? $mysql_host : "localhost";
echo "\r\n";

echo "Input MySQL Username:";
$mysql_username = trim(fgets(STDIN));
echo "\r\n";

echo "Input MySQL Password:";
$mysql_password = trim(fgets(STDIN));
echo "\r\n";

echo "Input MySQL Database Name:";
$mysql_database = trim(fgets(STDIN));
echo "\r\n";

echo "Input Working Directory from the web (Empty for \"64Digits/\"):";
$working_directory = trim(fgets(STDIN));
$working_directory = ($working_directory != "") ? $working_directory : "64Digits/";
echo "\r\n";
echo "\r\n";

echo "---------------------\r\n";
echo "Installing Configs...\r\n";
echo "---------------------\r\n";


// Patch the the main config
if (copy ("protected/config/main-copy.php", "protected/config/main.php")){
	echo "Successfully Copied: protected/config/main.php\r\n";
}else{
	echo "Failed Copy: protected/config/main.php\r\n";
}

$handle = @fopen("protected/config/main.php", "r");
$file_buffer="";
$error = false;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("#['\"]connectionString['\"]\s?=>\s['\"]mysql:host=(\w)*;\s?dbname=(\w)*['\"],#i",$buffer)){
			$file_buffer .= "'connectionString' => 'mysql:host=".$mysql_host.";dbname=".$mysql_database."',\r\n";
		}else if (preg_match("#['\"]username['\"]\s?=>\s['\"](\w)*['\"],#i",$buffer)){
			$file_buffer .= "'username' => '".$mysql_username."',\r\n";
		}else if (preg_match("#['\"]password['\"]\s?=>\s['\"](\w)*['\"],#i",$buffer)){
			$file_buffer .= "'password' => '".$mysql_password."',\r\n";
		}else{
			$file_buffer .= $buffer;
		}
    }
    if (!feof($handle)) {
		$error = true;
        echo "Error: unexpected fgets() fail, unable to configure protected/config/main.php file.\n";
    }
    fclose($handle);
}
if (!$error){
	if (file_put_contents("protected/config/main.php",$file_buffer)){
		echo "Patched successfully: protected/config/main.php \r\n";
	}else{
		echo "Unable to be patched: protected/config/main.php\r\n";
	}
}


// Patch the console config
if (copy ("protected/config/console-copy.php", "protected/config/console.php")){
	echo "Successfully Copied: protected/config/console.php\r\n";
}else{
	echo "Failed Copy: protected/config/console.php\r\n";
}

$handle = @fopen("protected/config/console.php", "r");
$file_buffer="";
$error = false;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("#['\"]connectionString['\"]\s?=>\s['\"]mysql:host=(\w)*;\s?dbname=(\w)*['\"],#i",$buffer)){
			$file_buffer .= "'connectionString' => 'mysql:host=".$mysql_host.";dbname=".$mysql_database."',\r\n";
		}else if (preg_match("#['\"]username['\"]\s?=>\s['\"](\w)*['\"],#i",$buffer)){
			$file_buffer .= "'username' => '".$mysql_username."',\r\n";
		}else if (preg_match("#['\"]password['\"]\s?=>\s['\"](\w)*['\"],#i",$buffer)){
			$file_buffer .= "'password' => '".$mysql_password."',\r\n";
		}else{
			$file_buffer .= $buffer;
		}
    }
    if (!feof($handle)) {
		$error = true;
        echo "Error: unexpected fgets() fail, unable to configure protected/config/console.php file.\n";
    }
    fclose($handle);
}
if (!$error){
	if (file_put_contents("protected/config/console.php",$file_buffer)){
		echo "Patched successfully: protected/config/console.php \r\n";
	}else{
		echo "Unable to be patched: protected/config/console.php\r\n";
	}
}


// Patch the node.js config
if (copy ("node/config-copy.js", "node/config.js")){
	echo "Successfully Copied: node/config.js\r\n";
}else{
	echo "Failed Copy: node/config.js\r\n";
}

$handle = @fopen("node/config.js", "r");
$file_buffer="";
$error = false;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("#mysql_address\s?:\s?[\"'](\w*)[\"'],#i",$buffer)){
			$file_buffer .= "mysql_address : \"".$mysql_host."\", \r\n";
		}else if (preg_match("#mysql_username\s?:\s?[\"'](\w*)[\"'],#i",$buffer)){
			$file_buffer .= "mysql_username : \"".$mysql_username."\", \r\n";
		}else if (preg_match("#mysql_password\s?:\s?[\"'](\w*)[\"'],#i",$buffer)){
			$file_buffer .= "mysql_password : \"".$mysql_password."\", \r\n";
		}else if (preg_match("#mysql_database\s?:\s?[\"'](\w*)[\"']#i",$buffer)){
			$file_buffer .= "mysql_database : \"".$mysql_database."\" \r\n";
		}else{
			$file_buffer .= $buffer;
		}
    }
    if (!feof($handle)) {
		$error = true;
        echo "Error: unable to configure protected/config/console.php file.\n";
    }
    fclose($handle);
}
if (!$error){
	if (file_put_contents("node/config.js",$file_buffer)){
		echo "Patched successfully: node/config.js \r\n";
	}else{
		echo "Unable to be patched: node/config.js.\r\n";
	}
}




// Patch the .htaccess
if (copy (".htaccess-copy", ".htaccess")){
	echo "Successfully Copied: .htaccess\r\n";
}else{
	echo "Failed Copy: .htaccess\r\n";

}

$handle = @fopen(".htaccess", "r");
$file_buffer="";
$error = false;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("#^SetEnv\sBASEPATH\s\"[\w]?\"$#i",$buffer)){
			$file_buffer .= "SetEnv BASEPATH \"".$working_directory."\"\r\n";
		}else{
			$file_buffer .= $buffer;
		}
    }
    if (!feof($handle)) {
		$error = true;
        echo "Error: unexpected fgets() fail, unable to configure .htaccess file.\n";
    }
    fclose($handle);
}
if (!$error){
	if (file_put_contents(".htaccess",$file_buffer)){
		echo "Patched successfully: .htaccess \r\n";
	}else{
		echo "Unable to be patched: .htaccess\r\n";
	}
}

system("mkdir ../yii");
system("git clone https://github.com/yiisoft/yii.git ../yii");

chdir("node");
	system ("npm install;");
chdir("../");
echo "Say yes to this: \r\n";
system('./protected/yiic migrate up 9001');

echo "=====================================================\r\n";
echo "\r\n";
echo "COMPLETE! Optionally, start the node.js script with `screen`, then `cd node; node server.js`\r\n\r\n";
echo "=====================================================";

?>