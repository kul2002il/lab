<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class LastActivityFixture extends ActiveFixture
{
	public $modelClass = 'app\models\LastActivity';
	public $depends = [
		UserFixture::class,
		RepairFixture::class,
	];
}
