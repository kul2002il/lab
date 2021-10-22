<?php

namespace app\gii\permission;

use yii\gii\CodeFile;

class Generator extends \yii\gii\Generator
{
	public $name;
	public $permissionNamespace = 'app\\rbac\\permissions';
	public $description;
	
	public function getName()
	{
		return 'Разрешение';
	}

	public function getDescription()
	{
		return 'Создание класса разрешения для RBAC.';
	}

	public function rules()
	{
		return array_merge(parent::rules(), [
			[['permissionNamespace', 'name', 'description'], 'filter', 'filter' => 'trim'],
			[['permissionNamespace', 'name', 'description'], 'required'],
			[
				'name', 'match', 'pattern' => '/^[\w]*$/',
				'message' => 'Only word characters are allowed.'
			],
		]);
	}

	public function attributeLabels()
	{
		return [
			'permissionNamespace' => 'Пространство имён разрешения',
			'name' => 'Название разрешения',
			'description' => 'Описание',
		];
	}

	public function successMessage()
	{
		return 'Разрешение было успешно создано.';
	}
	
	public function generate()
	{
		$files = [];
		
		$files[] = new CodeFile(
			$this->getPermissionFile(),
			$this->render('permission.php')
			);
		
		return $files;
	}
	public function getPermissionFile() {
		$classname = $this->permissionNamespace . '\\' . $this->name;
		return \Yii::getAlias('@' . str_replace('\\', '/', ltrim($classname, '\\'))) . '.php';
	}
}
