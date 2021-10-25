<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

	public function actionInit()
	{
		Yii::$app->authManager->removeAll();
		// Создание корневой роли для создания всех остальных.
		new \app\rbac\roles\Superuser();
		new \app\rbac\roles\Guest();
	}
}
