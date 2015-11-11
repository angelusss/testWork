<?php

class m151111_160035_create_table_membership extends CDbMigration
{
	public function up()
	{
		$this->execute("
          CREATE TABLE IF NOT EXISTS `membership` (
          `id` int(20) NOT NULL AUTO_INCREMENT,
          `kimsin` int(3) NOT NULL,
          `profession` int(3) NOT NULL,
          `isim` varchar(255) NOT NULL,
          `soyadı` varchar(255) NOT NULL,
          `mobile` varchar(255) NOT NULL,
          `parola` varchar(255) NOT NULL,
          `ilce` int(1) NOT NULL,
          `sehir` int(4) NOT NULL,
          `created_at` int(11) NOT NULL DEFAULT '0',
          `updated_at` int(11) DEFAULT NULL,
          PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
        ");
	}

	public function down()
	{
		echo "m151111_160035_create_table_membership does not support migration down.\n";
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