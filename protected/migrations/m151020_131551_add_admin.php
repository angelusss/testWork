<?php

class m151020_131551_add_admin extends CDbMigration
{
	public function up()
	{
		$this->execute("
			INSERT INTO `admin` (`id`, `login`, `password`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@admin.com', 1, 1445339372, 1445339372);
		");
	}

	public function down()
	{
		echo "m151020_131551_add_admin does not support migration down.\n";
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