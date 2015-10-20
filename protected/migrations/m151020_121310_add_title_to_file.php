<?php

class m151020_121310_add_title_to_file extends CDbMigration
{
	public function up()
	{
		$this->execute("ALTER TABLE  `file` ADD  `title` VARCHAR( 255 ) NOT NULL DEFAULT  '';");
	}

	public function down()
	{
		echo "m151020_121310_add_title_to_file does not support migration down.\n";
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