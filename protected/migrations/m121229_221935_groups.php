<?php

class m121229_221935_groups extends CDbMigration
{
	public function up(){		
	$this->execute("CREATE TABLE `groups` (
					 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
					 `name` varchar(32) NOT NULL,
					 `primary_owner` int(11) unsigned NOT NULL,
					 `is_private` tinyint(1) NOT NULL DEFAULT '0',
					 `invite_only` tinyint(1) NOT NULL DEFAULT '0',
					 `is_default` tinyint(1) NOT NULL DEFAULT '0',
					 `date_formed` int(16) NOT NULL,
					 PRIMARY KEY (`id`),
					 KEY `primary_owner` (`primary_owner`),
					 CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`primary_owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
					) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
							
							
	$this->execute("CREATE TABLE `group_members` (
						 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
						 `user_id` int(10) unsigned NOT NULL,
						 `group_id` int(10) unsigned NOT NULL,
						 `rank` enum('none','user','admin') NOT NULL,
						 `date_added` int(16) NOT NULL,
						 PRIMARY KEY (`id`),
						 KEY `user_id` (`user_id`),
						 KEY `group_id` (`group_id`),
						 CONSTRAINT `group_members_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
						 CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
						) ENGINE=InnoDB DEFAULT CHARSET=utf8");
	}

	public function down()
	{
		echo "Dropping group_members and groups tables... \r\n";
		$this->dropTable("group_members");
		$this->dropTable("groups");
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}