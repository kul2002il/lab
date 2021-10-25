<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class MessageFixture extends ActiveFixture
{
	public $modelClass = 'app\models\Message';
	public $depends = [
		UserFixture::class,
		RepairFixture::class,
		PurposeFixture::class,
	];
}
