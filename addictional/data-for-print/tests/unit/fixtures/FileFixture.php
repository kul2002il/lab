<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class FileFixture extends ActiveFixture
{
	public $modelClass = 'app\models\File';
	public $depends = [UserFixture::class];
}
