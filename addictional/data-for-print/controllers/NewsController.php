<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use app\models\News;

class NewsController extends \yii\web\Controller
{
	public function actionIndex()
	{
		$query = News::find();
		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount' => $query->count(),
		]);
		$news = $query->orderBy('datetime')
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
		return $this->render('news', [
			'news' => $news,
			'pagination' => $pagination,
		]);
	}
}
