<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

class InitController extends Controller
{
	public function actionIndex()
	{
		echo "Init application programm.\n";
		return ExitCode::OK;
	}
}
