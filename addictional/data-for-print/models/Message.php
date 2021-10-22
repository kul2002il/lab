<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int $idSender
 * @property int $idRepair
 * @property int|null $idPurpose
 * @property string $content
 * @property string $datetime
 *
 * @property FileInMessage[] $fileInMessages
 * @property Repair $idRepair0
 * @property User $idSender0
 * @property Unread[] $unreads
 */
class Message extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'message';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idSender', 'idRepair'], 'required'],
			[['idSender', 'idRepair', 'idPurpose'], 'integer'],
			[['content'], 'string'],
			[['datetime'], 'safe'],
			[
				['idPurpose'], 'exist', 'skipOnError' => true,
				'targetClass' => Purpose::className(),
				'targetAttribute' => ['idPurpose' => 'id']
			],
			[
				['idRepair'], 'exist', 'skipOnError' => true,
				'targetClass' => Repair::className(),
				'targetAttribute' => ['idRepair' => 'id']
			],
			[
				['idSender'], 'exist', 'skipOnError' => true,
				'targetClass' => User::className(),
				'targetAttribute' => ['idSender' => 'id']
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
			'idSender' => 'Id Отправителя',
			'idRepair' => 'Id Ремонта',
			'idPurpose' => 'Id Предназначения',
			'content' => 'Содержимое',
			'datetime' => 'Дата и время отправки',
		];
	}

	/**
	 * Gets query for [[FileInMessages]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getFileInMessages()
	{
		return $this->hasMany(FileInMessage::className(), ['idMessage' => 'id']);
	}

	/**
	 * Gets query for [[IdPurpose0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdPurpose0()
	{
		return $this->hasOne(Purpose::className(), ['id' => 'idPurpose']);
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
	 * Gets query for [[IdSender0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdSender0()
	{
		return $this->hasOne(User::className(), ['id' => 'idSender']);
	}
}
