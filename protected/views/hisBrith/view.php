    <div id="timed">
    <h2><span><?php 
	if(BAN_LANGUAGE=='chinese')
	echo date("Y��")."{$this->month}��{$this->day}�� ".$this->yinLi->week_char.' ũ��'.$this->yinLi->yl_year.'�� '.$this->yinLi->yl_month.$this->yinLi->yl_day;
	else
	echo date("Y-")."{$this->month}-{$this->day} ".$this->showMonth->getWeek($this->yinLi->week_char);
	?></span></h2>
    </div>
    
   <div class="article">
    <div class="art_sma"><?php 
	if(BAN_LANGUAGE=='english'){
		$eng_data_brith=require(Yii::app()->basePath.'/coreData/eng_data_brith.php');
		$eng_data_brith=$eng_data_brith["{$this->month}-{$this->day}"];
		}
	if(BAN_LANGUAGE=='english') echo 'Born on '.$this->showMonth->getMonthname($this->month)." {$model->bri_day} Lucky Flower: {$eng_data_brith['name']}";
	else echo $model->bri_month.'��'.$model->bri_day.'�ճ����������˻���'.$model->bri_huaname;?></div>
    <?php echo $this->kermitBase->gbk2utf8($imgchar,BAN_LANGUAGE);?>
    <p><?php echo $this->kermitBase->gbk2utf8($model->bri_huacont,BAN_LANGUAGE);?></p>
    <div class="art_sma"><?php 
	
	if(BAN_LANGUAGE=='english') echo "{$eng_data_brith['name']} florid:{$eng_data_brith['hy']}";
	else echo $model->bri_huaname.'���'.$model->bri_huayu;?></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->bri_huayucont,BAN_LANGUAGE);?></p>
    <div class="art_sma"><?php 
	
	if(BAN_LANGUAGE=='english') echo 'Born on '.$this->showMonth->getMonthname($this->month)." {$model->bri_day} birthstone: {$eng_data_brith['dss']}";
	else echo $model->bri_month.'��'.$model->bri_day.'�ճ������˵���ʯ��'.$model->bri_dansheng;?></div>
    <p><?php echo $this->kermitBase->gbk2utf8(require(Yii::app()->basePath."/coreData/birth_data/{$model->bri_danshengshuo}.php"),BAN_LANGUAGE);?></p>
   </div>
   
   <p class="pages"><?php  require(Yii::app()->basePath."/views/page_all.php");?></p>
	<div class="heig15"></div>