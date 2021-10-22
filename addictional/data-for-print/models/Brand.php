<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $name
 *
 * @property Model[] $models
 */
class Brand extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'brand';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['name'], 'unique'],
			[['name'], 'string', 'max' => 80],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Название бренда',
		];
	}

	/**
	 * Gets query for [[Models]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getModels()
	{
		return $this->hasMany(Model::className(), ['idBrand' => 'id']);
	}
}
