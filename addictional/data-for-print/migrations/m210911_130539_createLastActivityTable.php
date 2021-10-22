<?php

use yii\db\Migration;

class m210911_130539_createLastActivityTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('last_activity', [
			'id' => $this->primaryKey(),
			'idUser' => $this->integer()->notNull(),
			'idRepair' => $this->integer()->notNull(),
			'datetime' => $this->dateTime()->notNull()->defaultExpression('NOW()'),
		]);
		$this->addForeignKey('UserActivity', 'last_activity', 'idUser', 'user', 'id');
		$this->addForeignKey('RepairActivity', 'last_activity', 'idRepair', 'repair', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('UserActivity', 'last_activity');
		$this->dropForeignKey('RepairActivity', 'last_activity');
		$this->dropTable('last_activity');
	}
}
