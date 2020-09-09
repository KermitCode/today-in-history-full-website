<?php

class HisPinglun extends CActiveRecord{

	public static function model($className=__CLASS__){
		
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'his_pinglun';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		
		return array(
			array('pl_main_id, pl_text, pl_time', 'required'),
			array('pl_month, pl_day', 'numerical', 'integerOnly'=>true),
			array('pl_main_id, pl_time', 'length', 'max'=>10),
			array('pl_ip', 'length', 'max'=>18),
			array('pl_user', 'length', 'max'=>15),
			array('pl_month', 'pl_day', 'max'=>2),
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
			'main'=>array(self::BELONGS_TO,'HisMain','pl_main_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pl_id' => 'Pl',
			'pl_month' => 'Pl Month',
			'pl_day' => 'Pl Day',
			'pl_main_id' => 'Pl Main',
			'pl_text' => 'Pl Text',
			'pl_ip' => 'Pl Ip',
			'pl_time' => 'Pl Time',
			'pl_user' => 'Pl User',
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

		$criteria->compare('pl_id',$this->pl_id);
		$criteria->compare('pl_month',$this->pl_month);
		$criteria->compare('pl_day',$this->pl_day);
		$criteria->compare('pl_main_id',$this->pl_main_id,true);
		$criteria->compare('pl_text',$this->pl_text,true);
		$criteria->compare('pl_ip',$this->pl_ip,true);
		$criteria->compare('pl_time',$this->pl_time,true);
		$criteria->compare('pl_user',$this->pl_user,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}