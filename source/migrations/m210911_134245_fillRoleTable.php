<?php

use yii\db\Migration;

class m210911_134245_fillRoleTable extends Migration
{
	private $data = [
		[
			'Главный администратор',
			'admin',
		],
		[
			'Мастер',
			'master',
		],
	];

	public function safeUp()
	{
		$this->batchInsert('role', ['name', 'code'], $this->data);
	}

	public function safeDown(){}
}
