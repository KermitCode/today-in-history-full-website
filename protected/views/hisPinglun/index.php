    <div id="timed">
    <h2><span><?php 
	if(BAN_LANGUAGE=='chinese'){
		$null_rs='δ�ҵ��������';
		echo date("Y��")."{$this->month}��{$this->day}�� ".$this->yinLi->week_char.' ũ��'.$this->yinLi->yl_year.'�� '.$this->yinLi->yl_month.$this->yinLi->yl_day;
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
              if(BAN_LANGUAGE=='chinese') echo "��<b>{$dataProvider->totalItemCount}</b>������ <b>{$dataProvider->itemCount}</b>��/ҳ ";
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
//echo '<a href="'.$this->createUrl('HisPinglun/index',array('date'=>$this->showMonth->predate)).'"><<<ǰһ��('.$this->showMonth->show_Monthday($this->showMonth->predate).')</a>	'; 
//echo "	<span>����({$this->month}��{$this->day}��)</span>";
//echo '	<a href="'.$this->createUrl('HisPinglun/index',array('date'=>$this->showMonth->nextdate)).'">('.$this->showMonth->show_Monthday($this->showMonth->nextdate).')��һ��>>></a>';
?>
    <div class="heig15"></div>
    
    
	
