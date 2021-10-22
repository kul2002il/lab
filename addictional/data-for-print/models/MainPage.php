<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\File;

class MainPage extends Model
{
	public static function getData()
	{
		return [
			'banner' => [
				'image' => File::findOne(['path' => 'media/image/work.jpeg'])->url,
			],
			'heroes' => [
				[
					'title' => 'Более 20 лет опыта',
					'text' => 'Большой опыт работы наших мастеров позволяет выполнять работу на высоком уровне.',
					'image' => File::findOne(['path' => 'media/image/work.jpeg'])->url,
				],
				[
					'title' => 'Слесарные работы по металлу',
					'text' => 'Выполнение слесарных работ по металлу позволяет изготавливать множество механических узлов нестандартной конструкции.',
					'image' => File::findOne(['path' => 'media/image/metal.jpeg'])->url,
				],
			]
		];
	}
}