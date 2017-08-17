<?php

/**
 * This is the model class for table "tblOrder".
 *
 * The followings are the available columns in table 'tblOrder':
 * @property integer $idtblOrder
 * @property string $date
 * @property integer $tblUser
 * @property integer $tblItem
 *
 * The followings are the available model relations:
 * @property TblUser $tblUser0
 * @property TblItem $tblItem0
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblOrder';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, tblUser, tblItem', 'required'),
			array('tblUser, tblItem', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtblOrder, date, tblUser, tblItem', 'safe', 'on'=>'search'),
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
			'tblUser0' => array(self::BELONGS_TO, 'TblUser', 'tblUser'),
			'tblItem0' => array(self::BELONGS_TO, 'TblItem', 'tblItem'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtblOrder' => 'Idtbl Order',
			'date' => 'Date',
			'tblUser' => 'Tbl User',
			'tblItem' => 'Tbl Item',
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

		$criteria->compare('idtblOrder',$this->idtblOrder);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('tblUser',$this->tblUser);
		$criteria->compare('tblItem',$this->tblItem);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
