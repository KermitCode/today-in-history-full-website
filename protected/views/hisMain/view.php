    <div id="timed">
    <h2><?php if(BAN_LANGUAGE=='chinese') echo "{$model->ls_year}��{$model->ls_month}��{$model->ls_day}��-{$model->ls_title}";
			   else echo $this->showMonth->getMonthname($model->ls_month)." {$model->ls_day}.{$model->ls_year}-{$model->ls_title}";?></h2>
    </div>
    <div class="addmess"><?php
	$model->ls_views=$model->ls_views+1;
    if(BAN_LANGUAGE=='chinese') echo "ũ��{$model->ls_nongyear}��{$model->ls_nongmonth}��{$model->ls_nongday}��  ";
	if(BAN_LANGUAGE=='chinese') echo "������<span class='other'>{$model->ls_views}</span> �� ����ʱ�䣺".date('Y-m-d H:i:s',$model->ls_time);
	else echo "Show:<span class='other'>{$model->ls_views}</span> times , datetime:".date('Y-m-d H:i:s',$model->ls_time);
	?></div>
    <div class="article">
        <p>
        <?php if(BAN_LANGUAGE=='chinese'){
					$oldarray=array('TodayOnHistory.com','�vʷ�ϵĽ��졣cn','�vʷ�ϵĽ��졣�Ї�','��ʷ�ϵĽ��졣�Ї�','��ʷ�ϵĽ���.com','lssdjt.com');
					$newarray=array('91history.com','��ʷ�ϵĽ���','��ʷ�ϵĽ���91history.com','��ʷ�ϵĽ���91history.com','��ʷ�ϵĽ���','91history.com');
			 		echo str_replace($oldarray,$newarray,$model->ls_cont);
				}else{
					$content_lang=require(Yii::app()->basePath."/coreData/english_main/{$model->ls_day}/{$model->ls_id}.php");
					$img_arr=Yii::app()->db->createCommand("select * from his_main_img where img_contid=$id")->query()->readAll();
					$img_char='';
					foreach($img_arr as $key=>$row){$img_char.="<br><img src='{$this->baseurl}img/uploak/{$row['img_url']}' alt='{$model->ls_title}' title='{$model->ls_title}' />";}
					$img_char.="<br>";
					$content_lang['cont']=stripslashes($content_lang['cont']);			
					$pos_img=strpos($content_lang['cont'],'<br>');
					if($pos_img===false){
						echo $img_char;
						echo stripslashes($content_lang['cont']);	
					}else{
						echo substr_replace($content_lang['cont'],'<br>'.$img_char,$pos_img,4);
						}
				}?>
        </p>
	</div>
    
     <p class="pages">
	<?php 
	if(!$preid)  echo '<a onclick="javascritp:alert(\''.$this->pagestips['nofront'].'\');return false;" href="javascript:void(0);"><<< '.$this->pagestips['prepage'].'</a>	'; 
    else echo '<a href="'.$this->createUrl('HisMain/view',array('id'=>$preid)).'"><<< '.$this->pagestips['prepage'].'</a>	'; 
    if(BAN_LANGUAGE=='chinese') echo "	<span>({$this->month}��{$this->day}��)</span>";
	else echo "	<span>({$this->month}-{$this->day})</span>";
	if(!$nextid)  echo '<a onclick="javascritp:alert(\''.$this->pagestips['noafter'].'\');return false;" href="javascript:void(0);"><<< '.$this->pagestips['nextpage'].'</a>	'; 
    echo '	<a href="'.$this->createUrl('HisMain/view',array('id'=>$nextid)).'">'.$this->pagestips['nextpage'].' >>></a>';
    ?></p>
    <div class="heig15"></div>
    <div class="pltext">
        <div class='im_tit'><?php echo $this->pagestips['commenttip'];?></div>
        <div><textarea name="plt" id="plt" class="pl"></textarea></div>
        <div class="userqq"> <?php echo $this->pagestips['username'];?><input type="text" name="user" id="user" size="20" value="yk<?php echo rand(1000000,9999999);?>" />  
        <input type="button" value="<?php echo $this->pagestips['sub'];?>" name="B1" class="subpl" onClick="subpl(<?php echo $model->ls_id;?>,'<?php echo $this->createUrl('HisPinglun/Create');?>');" /> 
        </div>
        <?php if($this->webset['ad_irt_pinglun']!='') echo stripslashes($this->webset['ad_irt_pinglun']);?>
    </div>
    <div class="pltext">
        <div class='im_tit'><?php echo $this->pagestips['comlist'];?></div>
         <?php //if($this->webset['ad_irt_pinglun']) echo "<div class='adirts'>".stripslashes($this->webset['ad_irt_pinglun'])."</div>"; ?>
            <ul id="pllist">
            <?php if(empty($pinglun)) echo $this->pagestips['nocom'];
                   else{
                        foreach($pinglun as $key=>$row){
                            $row['pl_user'] || $row['pl_user']='visiter';
                            echo "<li><span class='litt'>{$row['pl_user']}--".date('Y-m-d H:i:s',$row['pl_time']).":</span>{$row['pl_text']}</li>";
                            }   
                   }
            ?> 
  		 	</ul>
    </div>