<?php

/**
 * This is the model class for table "tblUser".
 *
 * The followings are the available columns in table 'tblUser':
 * @property integer $idUser
 * @property string $userName
 * @property string $password
 * @property integer $victoryPoints
 * @property integer $elo
 * @property integer $box
 *
 * The followings are the available model relations:
 * @property TblEvent[] $tblEvents
 * @property TblOrder[] $tblOrders
 * @property TblParticipation[] $tblParticipations
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblUser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userName, password, victoryPoints, elo', 'required'),
			array('victoryPoints, elo, box', 'numerical', 'integerOnly'=>true),
			array('userName, password', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUser, userName, password, victoryPoints, elo, box', 'safe', 'on'=>'search'),
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
			'tblEvents' => array(self::HAS_MANY, 'TblEvent', 'idUser'),
			'tblOrders' => array(self::HAS_MANY, 'TblOrder', 'tblUser'),
			'tblParticipations' => array(self::HAS_MANY, 'TblParticipation', 'idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'Id User',
			'userName' => 'User Name',
			'password' => 'Password',
			'victoryPoints' => 'Victory Points',
			'elo' => 'Elo',
			'box' => 'Box',
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

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('userName',$this->userName,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('victoryPoints',$this->victoryPoints);
		$criteria->compare('elo',$this->elo);
		$criteria->compare('box',$this->box);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
