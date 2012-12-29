<?php

class m121229_024427_roles_and_static_pages extends CDbMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE `roles` (
						 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
						 `name` varchar(32) NOT NULL,
						 `description` varchar(255) NOT NULL,
						 PRIMARY KEY (`id`),
						 UNIQUE KEY `name` (`name`)
						) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
							
		$this->execute("CREATE TABLE `roles_users` (
						 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
						 `user_id` int(10) unsigned NOT NULL,
						 `role_id` int(10) unsigned NOT NULL,
						 PRIMARY KEY (`id`),
						 KEY `role_id` (`role_id`),
						 KEY `user_id` (`user_id`),
						 CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
						 CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
						) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
						
		$this->execute("CREATE TABLE `static_page` (
						 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
						 `tag` varchar(32) NOT NULL,
						 `title` varchar(64) NOT NULL,
						 `body` text NOT NULL,
						 `last_modified` int(16) NOT NULL,
						 PRIMARY KEY (`id`),
						 UNIQUE KEY `tag` (`tag`)
						) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
						
		$this->execute("INSERT INTO `roles` (`id`, `name`, `description`) VALUES
						(1, 'login', 'Login privileges, granted after account confirmation'),
						(2, 'admin', 'Administrative user, has access to everything.'),
						(3, 'static', 'Allows the user to edit static pages.');");
	}

	public function down()
	{
		$this->dropTable("roles");
		$this->dropTable("roles_users");
		$this->dropTable("static_page");
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