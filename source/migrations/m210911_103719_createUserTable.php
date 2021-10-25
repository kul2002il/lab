<?php

use yii\db\Migration;

class m210911_103719_createUserTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('user', [
			'id' => $this->primaryKey(),
			'idRole' => $this->integer(),
			
			'nameFirst' => $this->string(80)->notNull(),
			'nameLast' => $this->string(80)->notNull(),
			'nameMiddle' => $this->string(80),
			
			'email' => $this->string()->notNull()->unique(),
			'password' => $this->string(255)->notNull(),
		]);
		$this->addForeignKey('RoleUser', 'user', 'idRole', 'role', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('RoleUser', 'user');
		$this->dropTable('user');
	}
}
