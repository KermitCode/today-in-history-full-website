    <div id="timed">
    <h2><span><?php 
	if(BAN_LANGUAGE=='chinese'){
		$null_rs='未找到相关评论';
		echo date("Y年")."{$this->month}月{$this->day}日 ".$this->yinLi->week_char.' 农历'.$this->yinLi->yl_year.'年 '.$this->yinLi->yl_month.$this->yinLi->yl_day;
	}else{
		$null_rs='Not found relevant comments';
		echo date("Y-")."{$this->month}-{$this->day} ".$this->showMonth->getWeek($this->yinLi->week_char);
	}?></span></h2>
    </div>
	
    <div class="pltext">
			<?php	
				 $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'summaryText'=>false,
					'template'=>"{items}",
					'enablePagination'=>false,
					'itemView'=>'_view',
					'cssFile'=>false,
					'emptyText'=>'<div style="text-align:center;padding:30px 0;">'.$null_rs.'</div>',
					'ajaxUpdate'=>false,
					'baseScriptUrl'=>false,
				)); ?>
                
          <div class="pagess">
          <?php
              if(BAN_LANGUAGE=='chinese') echo "共<b>{$dataProvider->totalItemCount}</b>条评论 <b>{$dataProvider->itemCount}</b>条/页 ";
			  else echo "All <b>{$dataProvider->totalItemCount}</b> comments<b>{$dataProvider->itemCount}</b> comments/Page ";
		  $this->widget('CLinkPager',array(
		  		'pages'=>$dataProvider->pagination,
				'nextPageLabel'=>$this->pagestips['pre'],
				'prevPageLabel'=>$this->pagestips['next'],
				'cssFile'=>false,
				'header'=>'',
				'firstPageLabel'=>false,
				'lastPageLabel'=>false,
				));
			  ?></div>
    </div>
    
<?php 
//<p class="pages"></p>
//echo '<a href="'.$this->createUrl('HisPinglun/index',array('date'=>$this->showMonth->predate)).'"><<<前一天('.$this->showMonth->show_Monthday($this->showMonth->predate).')</a>	'; 
//echo "	<span>今天({$this->month}月{$this->day}日)</span>";
//echo '	<a href="'.$this->createUrl('HisPinglun/index',array('date'=>$this->showMonth->nextdate)).'">('.$this->showMonth->show_Monthday($this->showMonth->nextdate).')后一天>>></a>';
?>
    <div class="heig15"></div>
    
    
	
