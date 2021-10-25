<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\User;
use app\models\Apparatus;
use yii\helpers\Url;

class UserController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout', 'personalArea'],
				'rules' =>
				[
					[
						'actions' => ['logout', 'personalArea'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}
	
	public function actionIndex()
	{
		return $this->render('index');
	}
	
	public function actionSignup()
	{
		$user = new User();
		if(Yii::$app->request->isPost)
		{
			$user->load(Yii::$app->request->post());
			if($user->signup())
			{
				return $this->redirect(Url::toRoute('/user/login'));
			}
		}
		return $this->render('signup', [
			'user' => $user,
		]);
	}
	
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		
		$model = new User();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		
		$model->password = '';
		return $this->render('login', [
			'model' => $model,
		]);
	}
	
	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}
	
	public function actionPersonalArea()
	{
		$query = Apparatus::getMy();

		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount' => $query->count(),
		]);

		$apparatuses = $query
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();

		return $this->render('personalarea', [
			'apparatuses' => $apparatuses,
			'pagination' => $pagination
		]);
	}
}





