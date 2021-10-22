<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\TestResult;
use tests\_support\TextTestListner;

class TestController extends Controller
{
	public function actionIndex()
	{
		echo "Test application programm.\n";
		return ExitCode::OK;
	}

	public function actionAll()
	{
		$result = new TestResult();
		$result->addListener(new TextTestListner());
		$test = new TestSuite();
		$test->addTestSuite(\tests\unit\models\RoleTest::class);
		$test->addTestSuite(\tests\unit\models\UserTest::class);
		$test->addTestSuite(\tests\unit\models\ModelTest::class);
		$test->run($result);
		foreach ($result->errors() as $fail)
		{
			echo "\n" . $fail->toString() . "\n";
		}
		echo <<<Conclusion

Тестов: {$result->count()}
Провалено: {$result->failureCount()}
Ошибок: {$result->errorCount()}
Предупреждений: {$result->warningCount()}
Рисков: {$result->riskyCount()}


Conclusion;
		return ExitCode::OK;
	}
}
