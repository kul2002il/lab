<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property int $id
 * @property int $idType
 * @property int $idBrand
 * @property string $name
 *
 * @property Apparatus[] $apparatuses
 * @property Brand $idBrand0
 * @property Type $idType0
 */
class Model extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'model';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idType', 'idBrand', 'name'], 'required'],
			[['idType', 'idBrand'], 'integer'],
			[['name'], 'string', 'max' => 80],
			[
				['idBrand'], 'exist', 'skipOnError' => true,
				'targetClass' => Brand::className(),
				'targetAttribute' => ['idBrand' => 'id']
			],
			[
				['idType'], 'exist', 'skipOnError' => true,
				'targetClass' => Type::className(),
				'targetAttribute' => ['idType' => 'id']
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idType' => 'Id Типа аппарата',
			'idBrand' => 'Id Бренда',
			'name' => 'Name',
		];
	}

	/**
	 * Gets query for [[Apparatuses]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getApparatuses()
	{
		return $this->hasMany(Apparatus::className(), ['idModel' => 'id']);
	}

	/**
	 * Gets query for [[IdBrand0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdBrand0()
	{
		return $this->hasOne(Brand::className(), ['id' => 'idBrand']);
	}

	/**
	 * Gets query for [[IdType0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdType0()
	{
		return $this->hasOne(Type::className(), ['id' => 'idType']);
	}
}
