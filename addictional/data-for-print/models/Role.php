<?php

namespace app\models;

use Yii;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property User[] $users
 */
class Role extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'role';
	}

	public function rules()
	{
		return [
			[['name', 'code'], 'required',],
			[['name', 'code'], 'unique'],
			[['name'], 'string', 'max' => 80],
			[['code'], 'string', 'max' => 40],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Полное название',
			'code' => 'Код роли',
		];
	}

	public function getUsers()
	{
		return $this->hasMany(User::className(), ['idRole' => 'id']);
	}
}
