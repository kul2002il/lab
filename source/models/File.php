<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property int $idOwner
 * @property string $path
 *
 * @property Apparatus[] $apparatuses
 * @property FileInMessage[] $fileInMessages
 * @property User $idOwner0
 * @property News[] $news
 */
class File extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'file';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idOwner', 'path'], 'required'],
			[['idOwner'], 'integer'],
			[['path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
			[
				['idOwner'], 'exist', 'skipOnError' => true,
				'targetClass' => User::className(),
				'targetAttribute' => ['idOwner' => 'id']
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
			'idOwner' => 'Id Владельца',
			'path' => 'Путь',
		];
	}

	public function upload()
	{
		if ($this->validate()) {
			$this->path->saveAs('media/' . $this->path->baseName . '.' . $this->path->extension);
			return true;
		} else {
			return false;
		}
	}

	public function getUrl()
	{
		//return url::base() . '/' . $this->path;
		return Url::toRoute(['/file', 'id' => $this->id]);
	}

	/**
	 * Gets query for [[Apparatuses]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getApparatuses()
	{
		return $this->hasMany(Apparatus::className(), ['idFile' => 'id']);
	}

	/**
	 * Gets query for [[FileInMessages]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getFileInMessages()
	{
		return $this->hasMany(FileInMessage::className(), ['idFile' => 'id']);
	}

	/**
	 * Gets query for [[IdOwner0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdOwner0()
	{
		return $this->hasOne(User::className(), ['id' => 'idOwner']);
	}

	/**
	 * Gets query for [[News]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getNews()
	{
		return $this->hasMany(News::className(), ['idFile' => 'id']);
	}
}
