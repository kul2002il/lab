<?php

use yii\db\Migration;

class m210911_125302_createRepairTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('repair', [
			'id' => $this->primaryKey(),
			'idMaster' => $this->integer(),
			'idApparatus' => $this->integer()->notNull(),
			'title' => $this->string(80)->notNull(),
			'description' => $this->text(),
			'startRepair' => $this->dateTime()->notNull()->defaultExpression('NOW()'),
			'endRepair' => $this->dateTime(),
		]);
		$this->addForeignKey('MasterRepair', 'repair', 'idMaster', 'user', 'id');
		$this->addForeignKey('ApparatusRepair', 'repair', 'idApparatus', 'apparatus', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('ApparatusRepair', 'repair');
		$this->dropForeignKey('MasterRepair', 'repair');
		$this->dropTable('repair');
	}
}
