<?php

use yii\db\Migration;

class m210914_130559_fillPurposeTable extends Migration
{
	private $data = [
		[
			'Смена статуса аппарата',
			'setStatus',
		],
	];

	public function safeUp()
	{
		$this->batchInsert('purpose', ['name', 'code'], $this->data);
	}

	public function safeDown(){}
}
