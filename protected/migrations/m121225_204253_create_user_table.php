<?php

class m121225_204253_create_user_table extends CDbMigration
{
	public function up()
	{
		$this->execute("	CREATE TABLE `users` (
							 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							 `username` varchar(32) NOT NULL,
							 `email` varchar(254) NOT NULL,
							 `password` varchar(64) NOT NULL,
							 `logins` int(10) unsigned NOT NULL DEFAULT '0',
							 `last_login` int(10) unsigned DEFAULT NULL,
							 `gender` enum('m','f') DEFAULT NULL,
							 `birthday` int(10) unsigned DEFAULT NULL,
							 `join_date` int(10) unsigned NOT NULL,
							 `location` varchar(200) DEFAULT NULL,
							 `referrer` int(11) DEFAULT NULL,
							 `avatar_location` varchar(255) DEFAULT NULL,
							 `banned` int(10) unsigned NOT NULL,
							 PRIMARY KEY (`id`),
							 UNIQUE KEY `username` (`username`,`email`)
							) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");

	}

	public function down()
	{
		echo "Dropping user tables... \r\n";
		$this->dropTable("users");
		return false;
	}

}