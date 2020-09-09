<?php

/**
 * This is the model class for table "his_xingzuo".
 *
 * The followings are the available columns in table 'his_xingzuo':
 * @property integer $xz_id
 * @property string $xz_title
 * @property integer $xz_month
 * @property integer $xz_day
 * @property string $xz_content
 * @property string $xz_star
 * @property string $xz_health
 * @property string $xz_jianyi
 * @property string $xz_mingren
 * @property string $xz_taluopai
 * @property string $xz_jingsiyu
 * @property string $xz_youdian
 * @property string $xz_quedian
 * @property string $xz_name
 */
class HisXingzuo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HisXingzuo the static model class
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
		return 'his_xingzuo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('xz_month, xz_day', 'numerical', 'integerOnly'=>true),
			array('xz_title', 'length', 'max'=>30),
			array('xz_name', 'length', 'max'=>10),
			array('xz_content, xz_star, xz_health, xz_jianyi, xz_mingren, xz_taluopai, xz_jingsiyu, xz_youdian, xz_quedian', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('xz_id, xz_title, xz_month, xz_day, xz_content, xz_star, xz_health, xz_jianyi, xz_mingren, xz_taluopai, xz_jingsiyu, xz_youdian, xz_quedian, xz_name', 'safe', 'on'=>'search'),
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
			'xz_id' => 'Xz',
			'xz_title' => 'Xz Title',
			'xz_month' => 'Xz Month',
			'xz_day' => 'Xz Day',
			'xz_content' => 'Xz Content',
			'xz_star' => 'Xz Star',
			'xz_health' => 'Xz Health',
			'xz_jianyi' => 'Xz Jianyi',
			'xz_mingren' => 'Xz Mingren',
			'xz_taluopai' => 'Xz Taluopai',
			'xz_jingsiyu' => 'Xz Jingsiyu',
			'xz_youdian' => 'Xz Youdian',
			'xz_quedian' => 'Xz Quedian',
			'xz_name' => 'Xz Name',
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

		$criteria->compare('xz_id',$this->xz_id);
		$criteria->compare('xz_title',$this->xz_title,true);
		$criteria->compare('xz_month',$this->xz_month);
		$criteria->compare('xz_day',$this->xz_day);
		$criteria->compare('xz_content',$this->xz_content,true);
		$criteria->compare('xz_star',$this->xz_star,true);
		$criteria->compare('xz_health',$this->xz_health,true);
		$criteria->compare('xz_jianyi',$this->xz_jianyi,true);
		$criteria->compare('xz_mingren',$this->xz_mingren,true);
		$criteria->compare('xz_taluopai',$this->xz_taluopai,true);
		$criteria->compare('xz_jingsiyu',$this->xz_jingsiyu,true);
		$criteria->compare('xz_youdian',$this->xz_youdian,true);
		$criteria->compare('xz_quedian',$this->xz_quedian,true);
		$criteria->compare('xz_name',$this->xz_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}