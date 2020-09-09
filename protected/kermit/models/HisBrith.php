<?php

/**
 * This is the model class for table "his_brith".
 *
 * The followings are the available columns in table 'his_brith':
 * @property integer $bri_id
 * @property integer $bri_month
 * @property integer $bri_day
 * @property string $bri_img
 * @property string $bri_huaname
 * @property string $bri_huacont
 * @property string $bri_huayu
 * @property string $bri_huayucont
 * @property string $bri_dansheng
 * @property string $bri_danshengshuo
 */
class HisBrith extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HisBrith the static model class
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
		return 'his_brith';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bri_month, bri_day', 'numerical', 'integerOnly'=>true),
			array('bri_img, bri_huaname, bri_huayu, bri_dansheng, bri_danshengshuo', 'length', 'max'=>30),
			array('bri_huacont, bri_huayucont', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bri_id, bri_month, bri_day, bri_img, bri_huaname, bri_huacont, bri_huayu, bri_huayucont, bri_dansheng, bri_danshengshuo', 'safe', 'on'=>'search'),
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
			'bri_id' => 'Bri',
			'bri_month' => 'Bri Month',
			'bri_day' => 'Bri Day',
			'bri_img' => 'Bri Img',
			'bri_huaname' => 'Bri Huaname',
			'bri_huacont' => 'Bri Huacont',
			'bri_huayu' => 'Bri Huayu',
			'bri_huayucont' => 'Bri Huayucont',
			'bri_dansheng' => 'Bri Dansheng',
			'bri_danshengshuo' => 'Bri Danshengshuo',
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

		$criteria->compare('bri_id',$this->bri_id);
		$criteria->compare('bri_month',$this->bri_month);
		$criteria->compare('bri_day',$this->bri_day);
		$criteria->compare('bri_img',$this->bri_img,true);
		$criteria->compare('bri_huaname',$this->bri_huaname,true);
		$criteria->compare('bri_huacont',$this->bri_huacont,true);
		$criteria->compare('bri_huayu',$this->bri_huayu,true);
		$criteria->compare('bri_huayucont',$this->bri_huayucont,true);
		$criteria->compare('bri_dansheng',$this->bri_dansheng,true);
		$criteria->compare('bri_danshengshuo',$this->bri_danshengshuo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}