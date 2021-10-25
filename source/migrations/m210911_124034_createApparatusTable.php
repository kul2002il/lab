<?php

use yii\db\Migration;

class m210911_124034_createApparatusTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('apparatus', [
			'id' => $this->primaryKey(),
			'idOwner' => $this->integer()->notNull(),
			'idFile' => $this->integer()->notNull(),
			'idModel' => $this->integer()->notNull(),
		]);
		$this->addForeignKey('UserApparatus', 'apparatus', 'idOwner', 'user', 'id');
		$this->addForeignKey('FileApparatus', 'apparatus', 'idFile', 'file', 'id');
		$this->addForeignKey('ModelApparatus', 'apparatus', 'idModel', 'model', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('UserApparatus', 'apparatus');
		$this->dropForeignKey('FileApparatus', 'apparatus');
		$this->dropForeignKey('ModelApparatus', 'apparatus');
		$this->dropTable('apparatus');
	}
}
