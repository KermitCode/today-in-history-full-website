<?php

/**
 * This is the model class for table "his_main".
 *
 * The followings are the available columns in table 'his_main':
 * @property integer $ls_id
 * @property string $ls_title
 * @property string $ls_englishtit
 * @property integer $ls_class
 * @property string $ls_year
 * @property string $ls_month
 * @property string $ls_day
 * @property string $ls_nongyear
 * @property string $ls_nongmonth
 * @property integer $ls_nongnummonth
 * @property string $ls_nongday
 * @property integer $ls_nongnumday
 * @property string $ls_cont
 * @property integer $publiced
 * @property string $ls_time
 * @property string $ls_views
 */
class HisMain extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HisMain the static model class
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
		return 'his_main';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ls_title, ls_year, ls_day, ls_cont', 'required'),
			array('ls_class, ls_nongnummonth, ls_nongnumday, publiced', 'numerical', 'integerOnly'=>true),
			array('ls_title', 'length', 'max'=>100),
			array('ls_englishtit', 'length', 'max'=>255),
			array('ls_year, ls_nongyear, ls_nongmonth, ls_nongday, ls_time, ls_views', 'length', 'max'=>10),
			array('ls_month, ls_day', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ls_id, ls_title, ls_englishtit, ls_class, ls_year, ls_month, ls_day, ls_nongyear, ls_nongmonth, ls_nongnummonth, ls_nongday, ls_nongnumday, ls_cont, publiced, ls_time, ls_views', 'safe', 'on'=>'search'),
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
			'ls_id' => 'Ls',
			'ls_title' => 'Ls Title',
			'ls_englishtit' => 'Ls Englishtit',
			'ls_class' => 'Ls Class',
			'ls_year' => 'Ls Year',
			'ls_month' => 'Ls Month',
			'ls_day' => 'Ls Day',
			'ls_nongyear' => 'Ls Nongyear',
			'ls_nongmonth' => 'Ls Nongmonth',
			'ls_nongnummonth' => 'Ls Nongnummonth',
			'ls_nongday' => 'Ls Nongday',
			'ls_nongnumday' => 'Ls Nongnumday',
			'ls_cont' => 'Ls Cont',
			'publiced' => 'Publiced',
			'ls_time' => 'Ls Time',
			'ls_views' => 'Ls Views',
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

		$criteria->compare('ls_id',$this->ls_id);
		$criteria->compare('ls_title',$this->ls_title,true);
		$criteria->compare('ls_englishtit',$this->ls_englishtit,true);
		$criteria->compare('ls_class',$this->ls_class);
		$criteria->compare('ls_year',$this->ls_year,true);
		$criteria->compare('ls_month',$this->ls_month,true);
		$criteria->compare('ls_day',$this->ls_day,true);
		$criteria->compare('ls_nongyear',$this->ls_nongyear,true);
		$criteria->compare('ls_nongmonth',$this->ls_nongmonth,true);
		$criteria->compare('ls_nongnummonth',$this->ls_nongnummonth);
		$criteria->compare('ls_nongday',$this->ls_nongday,true);
		$criteria->compare('ls_nongnumday',$this->ls_nongnumday);
		$criteria->compare('ls_cont',$this->ls_cont,true);
		$criteria->compare('publiced',$this->publiced);
		$criteria->compare('ls_time',$this->ls_time,true);
		$criteria->compare('ls_views',$this->ls_views,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}