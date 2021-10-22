<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "last_activity".
 *
 * @property int $id
 * @property int $idUser
 * @property int $idRepair
 * @property string|null $datetime
 *
 * @property Repair $idRepair0
 * @property User $idUser0
 */
class LastActivity extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'last_activity';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idUser', 'idRepair'], 'required'],
			[['idUser', 'idRepair'], 'integer'],
			[['datetime'], 'safe'],
			[
				['idRepair'], 'exist', 'skipOnError' => true,
				'targetClass' => Repair::className(),
				'targetAttribute' => ['idRepair' => 'id']
			],
			[
				['idUser'], 'exist', 'skipOnError' => true,
				'targetClass' => User::className(),
				'targetAttribute' => ['idUser' => 'id']
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
			'idUser' => 'Id Пользователя',
			'idRepair' => 'Id Ремонта',
			'datetime' => 'Дата и время последней активности',
		];
	}

	/**
	 * Gets query for [[IdRepair0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdRepair0()
	{
		return $this->hasOne(Repair::className(), ['id' => 'idRepair']);
	}

	/**
	 * Gets query for [[IdUser0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdUser0()
	{
		return $this->hasOne(User::className(), ['id' => 'idUser']);
	}
}
