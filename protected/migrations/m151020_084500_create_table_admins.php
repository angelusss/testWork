<?php

class m151020_084500_create_table_admins extends CDbMigration
{
	public function up()
	{
		$this->execute("
          CREATE TABLE IF NOT EXISTS `admin` (
          `id` int(20) NOT NULL AUTO_INCREMENT,
          `login` varchar(255) NOT NULL,
          `password` varchar(255) NOT NULL,
          `email` varchar(255) NOT NULL,
          `role` int(3) NOT NULL,
          `created_at` int(11) NOT NULL DEFAULT '0',
          `updated_at` int(11) DEFAULT NULL,
          PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
        ");
	}

	public function down()
	{
		echo "m151020_084500_create_table_admins does not support migration down.\n";
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