    <div id="timed">
    <h2><span><?php 
	if(BAN_LANGUAGE=='chinese')
	echo date("Y��")."{$this->month}��{$this->day}�� ".$this->yinLi->week_char.' ũ��'.$this->yinLi->yl_year.'�� '.$this->yinLi->yl_month.$this->yinLi->yl_day;
	else
	echo date("Y-")."{$this->month}-{$this->day} ".$this->showMonth->getWeek($this->yinLi->week_char);
	?></span></h2>
    </div>
   <div class="article">
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_month.'��'.$model->xz_day.'�գ�'.$model->xz_name.' ��˼��-'.$model->xz_jingsiyu,BAN_LANGUAGE);?></strong></div>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'���������ǣ�'.$model->xz_title,BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_content,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'���ŵ��У�'.$model->xz_youdian,BAN_LANGUAGE);?></strong></div>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'��ȱ���У�'.$model->xz_quedian,BAN_LANGUAGE);?></strong></div>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'�����������У�',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_mingren,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'����֪ʶ��',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_health,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'�����ƣ�',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_taluopai,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'�ػ���',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_star,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8('��'.$model->xz_name.'���˵Ľ��飺',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_jianyi,BAN_LANGUAGE);?></p>
   </div>
   
   <p class="pages"><?php  require(Yii::app()->basePath."/views/page_all.php");?></p>
	<div class="heig15"></div>