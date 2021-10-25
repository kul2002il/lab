<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use app\models\File;

class FileController extends \yii\web\Controller
{
	public function actionIndex()
	{
		$id = Yii::$app->request->get('id');
		if (!$id)
		{
			throw new NotFoundHttpException('Файл не указан');
		}
		
		$file = File::findOne(['id' => $id]);
		if (!$file)
		{
			throw new NotFoundHttpException('Файл не найден');
		}
		
		$filepath = __DIR__ . '/../' .$file->path;
		return $this->response->sendFile($filepath);
	}
}
