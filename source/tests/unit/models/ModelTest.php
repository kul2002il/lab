<?php

namespace tests\unit\models;

use PHPUnit\Framework\TestCase;
use app\models\Model;

class ModelTest extends TestCase
{
	public function testFK()
	{
		$model = Model::find()->one();
		/* @var Model $model */
		$this->assertNotEmpty($model, 'Модели не найдены.');
		$this->assertTrue($model->validate(), 'Модель изначально не считается валидной');
		$brand = $model->idBrand;
		$model->idBrand = 0;
		$this->assertFalse($model->validate(), 'Модель без бренда считается валидной');
		$model->idBrand = $brand;
		$model->idType = 0;
		$this->assertFalse($model->validate(), 'Модель без типа считается валидной');
	}
}
