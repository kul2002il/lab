<?php

namespace app\gii\role;

use yii\gii\CodeFile;

class Generator extends \yii\gii\Generator
{
	public $name;
	public $namespace = 'app\\rbac\\roles';
	public $description;
	
	public function getName()
	{
		return 'Роль';
	}

	public function getDescription()
	{
		return 'Создание класса роли для RBAC.';
	}

	public function rules()
	{
		return array_merge(parent::rules(), [
			[['namespace', 'name', 'description'], 'filter', 'filter' => 'trim'],
			[['namespace', 'name', 'description'], 'required'],
			[
				'name', 'match', 'pattern' => '/^[\w]*$/',
				'message' => 'Only word characters are allowed.'
			],
		]);
	}

	public function attributeLabels()
	{
		return [
			'namespace' => 'Пространство имён роли',
			'name' => 'Название роли',
			'description' => 'Описание',
		];
	}

	public function successMessage()
	{
		return 'Роль была успешно создана.';
	}
	
	public function generate()
	{
		$files = [];
		
		$files[] = new CodeFile(
			$this->getPermissionFile(),
			$this->render('role.php')
			);
		
		return $files;
	}
	public function getPermissionFile() {
		$classname = $this->namespace . '\\' . $this->name;
		return \Yii::getAlias('@' . str_replace('\\', '/', ltrim($classname, '\\'))) . '.php';
	}
}
