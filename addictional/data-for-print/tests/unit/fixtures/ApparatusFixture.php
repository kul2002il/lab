<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class ApparatusFixture extends ActiveFixture
{
	public $modelClass = 'app\models\Apparatus';
	public $depends = [
		UserFixture::class,
		FileFixture::class,
		ModelFixture::class,
	];
}
