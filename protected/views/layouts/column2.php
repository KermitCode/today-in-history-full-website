<?php $this->beginContent('//layouts/main'); ?>
<div id="contents" style="background:url('/images/mainbg2.gif');"> 
<div class="mainbar" style="float:right;">
	<?php echo $content; ?>
    </div>

<div class="sidebar"  style="float:left;">
	<div id="change" style="text-align:right;"><a href="<?php echo $this->webset['web_url'].$this->createUrl('site/index',array('lay'=>$this->layout==1?0:1));?>"><img src="<?php echo $this->baseurl; ?>images/change.gif" alt="<?php echo $this->pagestips['layout'];?>" /></a></div>
	<div class="rili">
    	<div class="mess"><?php 
		if(BAN_LANGUAGE=='chinese') echo date('公元Y年').$this->month.'月';
		else echo date('Y	').$this->showMonth->getMonthname($this->month);?></div>
        <div class="day"><?php echo date('j');?></div>
        <div class="week"><?php if(BAN_LANGUAGE=='chinese') echo $this->yinLi->week_char;
								else echo $this->showMonth->getWeek($this->yinLi->week_char);?></div>
        <div class="dmess"><?php if(BAN_LANGUAGE=='chinese') echo $this->yinLi->yl_year.' '.$this->yinLi->yl_month.$this->yinLi->yl_day;?></div>
    </div>
    <div class="rigmain gadget">
     <h2 class="star">
     	<span class="left">>><font color=blue><?php echo $this->pagestips['ghrq'];?></font></span>
	 	<span class="right selemonth"><?php echo $this->showMonth->getMonth_select();?></span>
        <div class="clr"></div>
     </h2>
     <ul class="month_menu">
        <?php echo $this->showMonth->getMonth_char();?>
     </ul>
      <div class="clr clr2"></div>
    </div>
      
    <div class="rigmain">
    <?php  echo stripslashes($this->webset['ad_list_main']);//日历框下广告 ?>
    </div>
    
    <div class="rigmain gadget">
     <h2 class="star">>><?php echo $this->pagestips['cgpls'];?></h2>
     <ul class="sb_menu"><?php
        if(empty($this->pinglun)){
			if(BAN_LANGUAGE=='chinese') echo "<li><a href='#'>".$this->pagestips['nopl']."</a></li>";
		}else{
			foreach($this->pinglun as $key=>$row){
				if(BAN_LANGUAGE=='chinese') $text=$row['pl_text'];
				else $text=iconv('gbk','utf-8',$row['pl_text']);
				echo "<li><a href='".$this->webset['web_url'].$this->createUrl('HisMain/view',array('id'=>$row['pl_main_id']))."'>".$this->kermitBase->str_cut($text,35,'..')."</a></li>";
				}
		}
	  ?></ul>
    </div>
    
    <div class="rigmain gadget">
     <h2 class="star">>><?php echo $this->pagestips['xjrq'].$this->day.$this->pagestips['xjrqh'];?></h2>
     <ul class="sb_menu"><?php
        for($m=1;$m<13;$m++){
			if(BAN_LANGUAGE=='chinese') $char="历史上{$m}月{$this->day}日发生的大事记";
			else $char="what happened on ".$this->showMonth->month_arr[$m].' '.$this->month."th in History";
			$linkday=$this->showMonth->makeDate($m,$this->day);
			echo "<li><a href='".$this->webset['web_url'].$this->createUrl('Site/index',array('date'=>$linkday))."'>".$char."</a></li>";
		}
		
	  ?></ul>
    </div>

    
    <div class="rigmain">
    <?php  echo stripslashes($this->webset['ad_irt_downtitle']);//侧边栏目最下方 ?>
    </div>
    
</div>

<div class="clr"></div>
</div>

<?php $this->endContent(); ?>