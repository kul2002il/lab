<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class FileInMessageFixture extends ActiveFixture
{
	public $modelClass = 'app\models\FileInMessage';
	public $depends = [
		MessageFixture::class,
		FileFixture::class,
	];
}
