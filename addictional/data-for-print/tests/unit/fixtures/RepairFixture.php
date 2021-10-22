<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class RepairFixture extends ActiveFixture
{
	public $modelClass = 'app\models\Repair';
	public $depends = [
		UserFixture::class,
		ApparatusFixture::class,
	];
}
