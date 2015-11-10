<?php

class m151110_155929_add_desc_and_status_to_file extends CDbMigration
{
	public function up()
	{
		$this->execute("
			ALTER TABLE  `file`
			ADD  `desc` text,
			ADD  `status` int( 1 ) NOT NULL DEFAULT  0;
		");
	}

	public function down()
	{
		echo "m151110_155929_add_desc_and_status_to_file does not support migration down.\n";
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