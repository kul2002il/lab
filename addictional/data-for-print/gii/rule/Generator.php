<?php

namespace app\gii\rule;

use yii\gii\CodeFile;

class Generator extends \yii\gii\Generator
{
	public $name;
	public $namespace = 'app\\rbac\\rules';
	
	public function getName()
	{
		return 'Правило';
	}

	public function getDescription()
	{
		return 'Создание класса правила для RBAC.';
	}

	public function rules()
	{
		return array_merge(parent::rules(), [
			[['namespace', 'name'], 'filter', 'filter' => 'trim'],
			[['namespace', 'name'], 'required'],
			[
				'name', 'match', 'pattern' => '/^[\w]*$/',
				'message' => 'Only word characters are allowed.'
			],
		]);
	}

	public function attributeLabels()
	{
		return [
			'namespace' => 'Пространство имён правила',
			'name' => 'Название правила',
		];
	}

	public function successMessage()
	{
		return 'Правило было успешно создано.';
	}
	
	public function generate()
	{
		$files = [];
		
		$files[] = new CodeFile(
			$this->getPermissionFile(),
			$this->render('rule.php')
			);
		
		return $files;
	}
	public function getPermissionFile() {
		$classname = $this->namespace . '\\' . $this->name;
		return \Yii::getAlias('@' . str_replace('\\', '/', ltrim($classname, '\\'))) . '.php';
	}
}
