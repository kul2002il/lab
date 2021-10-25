<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class ModelFixture extends ActiveFixture
{
	public $modelClass = 'app\models\Model';
	public $depends = [
		TypeFixture::class,
		BrandFixture::class,
	];
}
