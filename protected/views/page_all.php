<?php 
echo '<a href="'.$this->webset['web_url'].$this->createUrl(Yii::app()->controller->id.'/'.Yii::app()->controller->getAction()->getId(),array('date'=>$this->showMonth->predate)).'"><<< '.$this->pagestips['before'].'('.$this->showMonth->show_Monthday($this->showMonth->predate).')</a>	'; 
if(BAN_LANGUAGE=='chinese') echo "	<span>今天({$this->month}月{$this->day}日)</span>";
else echo "	<span>({$this->month}-{$this->day})</span>";
echo '	<a href="'.$this->webset['web_url'].$this->createUrl(Yii::app()->controller->id.'/'.Yii::app()->controller->getAction()->getId(),array('date'=>$this->showMonth->nextdate)).'">('.$this->showMonth->show_Monthday($this->showMonth->nextdate).')'.$this->pagestips['after'].' >>></a>';
?>