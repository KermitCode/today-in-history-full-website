<?php $url=$this->createUrl('HisMain/view',array('id'=>$data->ls_id));?>
<li><a href='<?php echo $url;?>' target='_blank'>
<?php 
if(BAN_LANGUAGE=='chinese'){
	echo "{$data->ls_year}Äê{$data->ls_month}ÔÂ{$data->ls_day}ÈÕ-";
	echo str_replace($this->keyword,"<font color='#0066CC'><b>{$this->keyword}</b></font>",$data->ls_title);
}else{
	echo "{$data->ls_month} {$data->ls_day}.{$data->ls_year}--";
	echo str_ireplace($this->keyword,"<font color='#0066CC'><b>{$this->keyword}</b></font>",$data->ls_englishtit);	
}
?>
</a></li>