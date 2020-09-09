<div class="plview">
	<?php if($data->pl_main_id!=$this->mainid){?>
	<div class="pltit"><?php 
	if(BAN_LANGUAGE=='chinese')
	echo "<a href='".$this->createUrl('HisMain/view',array('id'=>$data->pl_main_id))."'>草根对-".$data->main->ls_year.'年'.$data->pl_month.'月'.$data->pl_day.'日'.$data->main->ls_title.'-事件评论</a>';
	else echo "<a href='".$this->createUrl('HisMain/view',array('id'=>$data->pl_main_id))."'>comments to the Event-".$data->main->ls_title.'-occurred on'.$data->main->ls_year.'-'.$data->pl_month.'-'.$data->pl_day.'</a>';?></div>
    <?php $this->mainid=$data->pl_main_id;}?>
    <div class="plte"><?php if(BAN_LANGUAGE=='chinese') echo $data->pl_text;
							else echo $this->kermitBase->gbk2utf8($data->pl_text);?></div>
    <div class="plmess"><span class="user"><?php 
	if(BAN_LANGUAGE=='chinese') echo $data->pl_user;
	else echo $this->kermitBase->gbk2utf8($data->pl_user);?></span><?php echo date('Y-m-d H:i:s',$data->pl_time);?></div>
    <div class="clr"></div>
</div>
