<?php

use yii\db\Migration;

class m210911_114925_createModelTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('model', [
			'id' => $this->primaryKey(),
			'idType' => $this->integer()->notNull(),
			'idBrand' => $this->integer()->notNull(),
			'name' => $this->string(80)->notNull(),
		]);
		$this->addForeignKey('TypeModel', 'model', 'idType', 'typeApparatus', 'id');
		$this->addForeignKey('BrandModel', 'model', 'idBrand', 'brand', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('TypeModel', 'model');
		$this->dropForeignKey('BrandModel', 'model');
		$this->dropTable('model');
	}
}
