<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purpose".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property Message[] $messages
 */
class Purpose extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'purpose';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name', 'code'], 'required',],
			[['name', 'code'], 'unique'],
			[['name'], 'string', 'max' => 80],
			[['code'], 'string', 'max' => 40],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Подпись управляющей конструкции',
			'code' => 'Код',
		];
	}

	/**
	 * Gets query for [[Messages]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getMessages()
	{
		return $this->hasMany(Message::className(), ['idPurpose' => 'id']);
	}
}
