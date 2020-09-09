<?php

/**
 * This is the model class for table "his_pinglun".
 *
 * The followings are the available columns in table 'his_pinglun':
 * @property integer $pl_id
 * @property string $pl_month
 * @property string $pl_day
 * @property string $pl_main_id
 * @property string $pl_text
 * @property string $pl_ip
 * @property string $pl_time
 * @property string $pl_user
 * @property integer $pl_visible
 */
class HisPinglun extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HisPinglun the static model class
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
		return 'his_pinglun';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pl_month, pl_day, pl_main_id, pl_text, pl_time', 'required'),
			array('pl_visible', 'numerical', 'integerOnly'=>true),
			array('pl_month, pl_day', 'length', 'max'=>2),
			array('pl_main_id, pl_time', 'length', 'max'=>10),
			array('pl_ip', 'length', 'max'=>18),
			array('pl_user', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pl_id, pl_month, pl_day, pl_main_id, pl_text, pl_ip, pl_time, pl_user, pl_visible', 'safe', 'on'=>'search'),
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
		'title'=>array(self::BELONGS_TO,'HisMain','pl_main_id'),
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
			'pl_visible' => 'Pl Visible',
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
		$criteria->compare('pl_month',$this->pl_month,true);
		$criteria->compare('pl_day',$this->pl_day,true);
		$criteria->compare('pl_main_id',$this->pl_main_id,true);
		$criteria->compare('pl_text',$this->pl_text,true);
		$criteria->compare('pl_ip',$this->pl_ip,true);
		$criteria->compare('pl_time',$this->pl_time,true);
		$criteria->compare('pl_user',$this->pl_user,true);
		$criteria->compare('pl_visible',$this->pl_visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}