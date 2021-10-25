<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apparatus".
 *
 * @property int $id
 * @property int $idOwner
 * @property int $idFile
 * @property int $idModel
 *
 * @property File $idFile0
 * @property Model $idModel0
 * @property User $idOwner0
 * @property Repair[] $repairs
 * @property Repair $lastRepair
 */
class Apparatus extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'apparatus';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idModel', 'idOwner'], 'required'],
			[['idModel', 'idOwner'], 'integer'],
			[
				['idModel'], 'exist', 'skipOnError' => true,
				'targetClass' => Model::className(),
				'targetAttribute' => ['idModel' => 'id']
			],
			[
				['idOwner'], 'exist', 'skipOnError' => true,
				'targetClass' => User::className(),
				'targetAttribute' => ['idOwner' => 'id']
			],
			[
				['idFile'], 'exist', 'skipOnError' => true,
				'targetClass' => File::className(),
				'targetAttribute' => ['idFile' => 'id']
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
			'idModel' => 'Id Модели',
			'idFile' => 'Id Файла',
			'idOwner' => 'Id Владельца',
		];
	}

	/**
	 * Gets query for [[IdFile0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdFile0()
	{
		return $this->hasOne(File::className(), ['id' => 'idFile']);
	}

	/**
	 * Gets query for [[IdModel0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdModel0()
	{
		return $this->hasOne(Model::className(), ['id' => 'idModel']);
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
	 * Gets query for [[Repairs]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getRepairs()
	{
		return $this->hasMany(Repair::className(), ['idApparatus' => 'id']);
	}

	public static function getByUser($idOwner)
	{
		return self::find(['idOwner'=>$idOwner]);
	}

	public static function getMy()
	{
		return User::findOne(Yii::$app->user->id)->getApparatuses();
	}

	public function getName()
	{
		return $this->idModel0->idType0->name . ' ' .
			$this->idModel0->idBrand0->name . ' ' .
			$this->idModel0->name;
	}

	public function getLastRepair() {
		return $this->getRepairs()->orderBy(['startRepair' => SORT_DESC])->one();
	}
}
