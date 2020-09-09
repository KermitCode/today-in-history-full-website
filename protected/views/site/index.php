    <div id="timed">
    <h2><span><?php 
	if(BAN_LANGUAGE=='chinese')
	echo date("Y年")."{$this->month}月{$this->day}日 ".$this->yinLi->week_char.' 农历'.$this->yinLi->yl_year.'年 '.$this->yinLi->yl_month.$this->yinLi->yl_day;
	else
	echo date("Y-")."{$this->month}-{$this->day} ".$this->showMonth->getWeek($this->yinLi->week_char);
	?></span></h2>
    </div>

	<div class="article"> 
      <DIV id=focus>
          <UL><?php 
		  $i=0;
		  foreach($image_rs as $key=>$row){
			  	$url=$this->webset['web_url'].$this->createUrl('HisMain/view',array('id'=>$row['img_contid']));
				$file_abspath=Yii::app()->basePath."/../img/uploak/{$row['img_url']}";
				if(!file_exists($file_abspath)) continue;
				list($width,$height,$type,$attr)=getimagesize($file_abspath);
				if($height<320){
					$padding=intval((300-$height)/2);
					$style="style='margin-top:{$padding}px;'";
				}else $style='';
				if(!isset($main_rs_last[$row['img_contid']])) continue;
				$day_thing_arr=$main_rs_last[$row['img_contid']];
			  	echo "<LI><A href='{$url}' target='_blank'><IMG alt='{$day_thing_arr['ls_year']}-{$this->month}-{$this->day} {$day_thing_arr['ls_title']}' src='{$this->baseurl}img/uploak/{$row['img_url']}' align='absmiddle' {$style} /></A></LI>";
		  		$i++;
				if($i>15) break;
				}
			  ?>
          </UL>
      </DIV>
      <div id="focusmessage"><?php 
	  if(BAN_LANGUAGE=='chinese') echo "历史上{$this->month}月{$this->day}日发生的大事记";
	  else echo "Event occurred in the history on ".$this->showMonth->getMonthname($this->month)."-{$this->day}";?></div>
         
	  <div class="arttitle">
      <div class="daytit"><h2><?php 
	  if(BAN_LANGUAGE=='chinese') echo "历史上{$this->month}月{$this->day}日发生的大事记";
	  else echo "Event occurred in the history on ".$this->showMonth->getMonthname($this->month)."-{$this->day}";?></h2></div>
      <div class="list"><ul>
      <?php 
	  $i=1;
	  foreach($main_rs_last as $key=>$row){
			$url=$this->webset['web_url'].$this->createUrl('HisMain/view',array('id'=>$row['ls_id']));
			if(BAN_LANGUAGE=='chinese') echo "<li>{$i}---<a href='{$url}' target='_blank'>{$row['ls_year']}年{$this->month}月{$this->day}日-".$row['ls_title'].'</a></li>'; 
			else echo "<li>{$i}---<a href='{$url}' target='_blank'>{$this->month}-{$this->day}.{$row['ls_year']}--".$row['ls_title'].'</a></li>'; 
		 $i++;
		 }?>
      </ul></div>
      </div>
      <p class="pages"><?php  require(Yii::app()->basePath."/views/page_all.php");?></p>
  </div>