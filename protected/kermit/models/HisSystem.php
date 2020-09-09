<?php

class HisSystem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HisSystem the static model class
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
		return 'his_system';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('xh_system, web_open, web_error, no_ips_do,sprider_num, sprider_time, bad_words_do, pingjia_right, pingjia_most, web_fangshuaxin, web_shuapin_num, web_shuapin_time, web_shua_times_jinip', 'numerical', 'integerOnly'=>true),
			array('web_close_words, web_keyword, web_description, web_beian', 'length', 'max'=>255),
			array('web_name', 'length', 'max'=>50),
			array('web_url', 'length', 'max'=>20),
			array('adminer_pass, superadmin_pass, adtest_pass', 'length', 'max'=>32),
			array('auto_public_num,auto_public, stat_day_cachetime', 'length', 'max'=>6),
			array('auto_public_precent', 'length', 'max'=>8),
			array('web_fangshuapin', 'length', 'max'=>5),
			array('yuan_number, stat_all_cachetime', 'length', 'max'=>10),
			array('web_stat, no_ips, auto_public_day, ad_web_navtop, ad_web_duilian, ad_web_tanchuang, ad_web_middle_new, ad_web_mid_down, ad_list_main, ad_irt_downtitle, ad_irt_pinglun, bad_words,image_pagenum,index_class_arr', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			
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
			'xh_system' => 'Xh System',
			'web_open' => 'Web Open',
			'web_close_words' => 'Web Close Words',
			'web_error' => 'Web Error',
			'web_stat' => 'Web Stat',
			'web_keyword' => 'Web Keyword',
			'web_name' => 'Web Name',
			'web_url' => 'Web Url',
			'web_description' => 'Web Description',
			'web_beian' => 'Web Beian',
			'adminer_pass' => 'Adminer Pass',
			'superadmin_pass' => 'Superadmin Pass',
			'adtest_pass' => 'Adtest Pass',
			'no_ips_do' => 'No Ips Do',
			'no_ips' => 'No Ips',
			'auto_public_num' => 'Auto Public Num',
			'auto_public' => 'Auto Public',
			'auto_public_day' => 'Auto Public Day',
			'auto_public_precent' => 'Auto Public Precent',
			'sprider_num' => 'Sprider Num',
			'sprider_time' => 'Sprider Time',
			'ad_web_navtop' => 'Ad Web Navtop',
			'ad_web_duilian' => 'Ad Web Duilian',
			'ad_web_tanchuang' => 'Ad Web Tanchuang',
			'ad_web_middle_new' => 'Ad Web Middle New',
			'ad_web_mid_down' => 'Ad Web Mid Down',
			'ad_list_main' => 'Ad List Main',
			'ad_irt_downtitle' => 'Ad Irt Downtitle',
			'ad_irt_pinglun' => 'Ad Irt Pinglun',
			'bad_words_do' => 'Bad Words Do',
			'bad_words' => 'Bad Words',
			'image_pagenum' => 'Image Pagenum',
			'index_class_arr' => 'Index Class Arr',
			'pingjia_right' => 'Pingjia Right',
			'pingjia_most' => 'Pingjia Most',
			'web_fangshuaxin' => 'Web Fangshuaxin',
			'web_fangshuapin' => 'Web Fangshuapin',
			'web_shuapin_num' => 'Web Shuapin Num',
			'web_shuapin_time' => 'Web Shuapin Time',
			'web_shua_times_jinip' => 'Web Shua Times Jinip',
			'yuan_number' => 'Yuan Number',
			'stat_day_cachetime' => 'Stat Day Cachetime',
			'stat_all_cachetime' => 'Stat All Cachetime',
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

		$criteria->compare('xh_system',$this->xh_system);
		$criteria->compare('web_open',$this->web_open);
		$criteria->compare('web_close_words',$this->web_close_words,true);
		$criteria->compare('web_error',$this->web_error);
		$criteria->compare('web_stat',$this->web_stat,true);
		$criteria->compare('web_keyword',$this->web_keyword,true);
		$criteria->compare('web_name',$this->web_name,true);
		$criteria->compare('web_url',$this->web_url,true);
		$criteria->compare('web_description',$this->web_description,true);
		$criteria->compare('web_beian',$this->web_beian,true);
		$criteria->compare('adminer_pass',$this->adminer_pass,true);
		$criteria->compare('superadmin_pass',$this->superadmin_pass,true);
		$criteria->compare('adtest_pass',$this->adtest_pass,true);
		$criteria->compare('no_ips_do',$this->no_ips_do);
		$criteria->compare('no_ips',$this->no_ips,true);
		$criteria->compare('auto_public_num',$this->auto_public_num,true);
		$criteria->compare('auto_public',$this->auto_public,true);
		$criteria->compare('auto_public_day',$this->auto_public_day,true);
		$criteria->compare('auto_public_precent',$this->auto_public_precent,true);
		$criteria->compare('sprider_num',$this->sprider_num);
		$criteria->compare('sprider_time',$this->sprider_time);
		$criteria->compare('ad_web_navtop',$this->ad_web_navtop,true);
		$criteria->compare('ad_web_duilian',$this->ad_web_duilian,true);
		$criteria->compare('ad_web_tanchuang',$this->ad_web_tanchuang,true);
		$criteria->compare('ad_web_middle_new',$this->ad_web_middle_new,true);
		$criteria->compare('ad_web_mid_down',$this->ad_web_mid_down,true);
		$criteria->compare('ad_list_main',$this->ad_list_main,true);
		$criteria->compare('ad_irt_downtitle',$this->ad_irt_downtitle,true);
		$criteria->compare('ad_irt_pinglun',$this->ad_irt_pinglun,true);
		$criteria->compare('bad_words_do',$this->bad_words_do);
		$criteria->compare('bad_words',$this->bad_words,true);
		$criteria->compare('image_pagenum',$this->image_pagenum);
		$criteria->compare('index_class_arr',$this->index_class_arr,true);
		$criteria->compare('pingjia_right',$this->pingjia_right);
		$criteria->compare('pingjia_most',$this->pingjia_most);
		$criteria->compare('web_fangshuaxin',$this->web_fangshuaxin);
		$criteria->compare('web_fangshuapin',$this->web_fangshuapin,true);
		$criteria->compare('web_shuapin_num',$this->web_shuapin_num);
		$criteria->compare('web_shuapin_time',$this->web_shuapin_time);
		$criteria->compare('web_shua_times_jinip',$this->web_shua_times_jinip);
		$criteria->compare('yuan_number',$this->yuan_number,true);
		$criteria->compare('stat_day_cachetime',$this->stat_day_cachetime,true);
		$criteria->compare('stat_all_cachetime',$this->stat_all_cachetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}