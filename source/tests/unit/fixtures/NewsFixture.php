<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class NewsFixture extends ActiveFixture
{
	public $modelClass = 'app\models\News';
	public $depends = [FileFixture::class];
}
