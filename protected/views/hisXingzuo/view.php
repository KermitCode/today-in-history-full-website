    <div id="timed">
    <h2><span><?php 
	if(BAN_LANGUAGE=='chinese')
	echo date("Y年")."{$this->month}月{$this->day}日 ".$this->yinLi->week_char.' 农历'.$this->yinLi->yl_year.'年 '.$this->yinLi->yl_month.$this->yinLi->yl_day;
	else
	echo date("Y-")."{$this->month}-{$this->day} ".$this->showMonth->getWeek($this->yinLi->week_char);
	?></span></h2>
    </div>
   <div class="article">
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_month.'月'.$model->xz_day.'日：'.$model->xz_name.' 静思语-'.$model->xz_jingsiyu,BAN_LANGUAGE);?></strong></div>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'最大的特征是：'.$model->xz_title,BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_content,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'的优点有：'.$model->xz_youdian,BAN_LANGUAGE);?></strong></div>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'的缺点有：'.$model->xz_quedian,BAN_LANGUAGE);?></strong></div>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'的明星名人有：',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_mingren,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'健康知识：',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_health,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'塔罗牌：',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_taluopai,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8($model->xz_name.'守护神：',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_star,BAN_LANGUAGE);?></p>
    <div class="art_sma"><strong><?php echo $this->kermitBase->gbk2utf8('给'.$model->xz_name.'的人的建议：',BAN_LANGUAGE);?></strong></div>
    <p><?php echo $this->kermitBase->gbk2utf8($model->xz_jianyi,BAN_LANGUAGE);?></p>
   </div>
   
   <p class="pages"><?php  require(Yii::app()->basePath."/views/page_all.php");?></p>
	<div class="heig15"></div>