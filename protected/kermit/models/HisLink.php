<?php

/**
 * This is the model class for table "his_link".
 *
 * The followings are the available columns in table 'his_link':
 * @property integer $lk_id
 * @property string $lk_title
 * @property string $lk_url
 * @property integer $lk_hot
 * @property string $lk_datetime
 * @property integer $lk_state
 */
class HisLink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HisLink the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'his_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lk_title, lk_url, lk_hot', 'required'),
			array('lk_hot, lk_state', 'numerical', 'integerOnly'=>true),
			array('lk_title', 'length', 'max'=>20),
			array('lk_url', 'length', 'max'=>50),
			array('lk_datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lk_id, lk_title, lk_url, lk_hot, lk_datetime, lk_state', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lk_id' => 'Lk',
			'lk_title' => 'Lk Title',
			'lk_url' => 'Lk Url',
			'lk_hot' => 'Lk Hot',
			'lk_datetime' => 'Lk Datetime',
			'lk_state' => 'Lk State',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('lk_id',$this->lk_id);
		$criteria->compare('lk_title',$this->lk_title,true);
		$criteria->compare('lk_url',$this->lk_url,true);
		$criteria->compare('lk_hot',$this->lk_hot);
		$criteria->compare('lk_datetime',$this->lk_datetime,true);
		$criteria->compare('lk_state',$this->lk_state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}