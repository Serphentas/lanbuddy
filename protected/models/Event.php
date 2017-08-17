<?php

/**
 * This is the model class for table "tblEvent".
 *
 * The followings are the available columns in table 'tblEvent':
 * @property integer $idEvent
 * @property string $date
 * @property text $description
 * @property string $challonge
 * @property integer $idUser
 * @property integer $idGame
 * @property integer $idType
 *
 * The followings are the available model relations:
 * @property TblGame $idGame0
 * @property TblType $idType0
 * @property TblUser $idUser0
 * @property TblParticipation[] $tblParticipations
 */
class Event extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblEvent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, challonge, idUser, idGame, idType', 'required'),
			array('idUser, idGame, idType', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>250),
			array('challonge', 'length', 'max'=>100),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEvent, date, description, challonge, idUser, idGame, idType', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idGame0' => array(self::BELONGS_TO, 'Game', 'idGame'),
			'idType0' => array(self::BELONGS_TO, 'Type', 'idType'),
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
			'tblParticipations' => array(self::HAS_MANY, 'Participation', 'idEvent'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEvent' => 'Id Event',
			'date' => 'Date',
			'description' => 'Description',
			'challonge' => 'Challonge',
			'idUser' => 'Id User',
			'idGame' => 'Id Game',
			'idType' => 'Id Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idEvent',$this->idEvent);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('challonge',$this->challonge,true);
		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('idGame',$this->idGame);
		$criteria->compare('idType',$this->idType);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Event the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
