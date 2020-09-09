<style>body{background-color:#fff;}
table{border:1px solid #C1DAD7;}
tr.conts td{border-bottom:1px solid #C1DAD7;}</style>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/images/Calendar3.js"></script>
<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>网站控制台</div></div>
<div class="content-box role">
	<div class="content-box-content">
		<div class="tab-content default-tab" >
			<table width="100%">
				<thead>
					<tr>
					   <td style="border:1px solid #C1DAD7;padding-left:10px;" colspan="8">历史上的今天网-后台总控制台</td>
					</tr>
				</thead>
				<tbody>
					<TR>
                    <td  style='padding-left:5px;'>历史事件总数</td>
                    <td  style='padding-left:5px;color:red;font-weight:bolder;'><?php echo $number_arr['allhis_num'];?> 条</td>
                    <td  style='padding-left:5px;'>评论总数</td>
                    <td  style='padding-left:5px;color:red;font-weight:bolder;'><?php echo $number_arr['pinglun_num'];?> 条</td>
                    <td  style='padding-left:5px;'>警告总条数</td>
                    <td  style='padding-left:5px;color:red;font-weight:bolder;'><?php echo $number_arr['error_num'];?> 条</td>
                    <td  style='padding-left:5px;'>友情连接总数</td>
                    <td  style='padding-left:5px;color:red;font-weight:bolder;'><?php echo $number_arr['link_num'];?> 条</td>
                    </TR>
				</tbody>
                <thead>
					<tr><td style="border:1px solid #C1DAD7;padding-left:10px;height:35px;line-height:35px;" colspan="8"><form action="<?php echo $this->createUrl('Site/Control');?>" method="post">当日数据：&nbsp;&nbsp;&nbsp;更换查看日期： <input name="tdate" type="text" id="tdate" size="12" maxlength="10" onclick="new Calendar().show(this);" readonly="readonly" style="color:red;font-weight:bolder;" value="<?php echo $tdate;?>" /> <input type="submit" value="确定" /></form></td>
					</tr>
				</thead>
				<tfoot>
					<tr class="conts">
						<td style="vertical-align:middle;border-right:1px solid #C1DAD7;">&nbsp;今日发表的历史事件：</td>
                        <td colspan="7" style="padding-left:10px;"><?php $date_start=strtotime($tdate);$date_end=$date_start+3600*24;
						$rs_main=$rs=Yii::app()->db->createCommand("select * from his_main where publiced=1 and ls_time>$date_start and ls_time<$date_end")->query()->readAll();
						foreach($rs_main as $key=>$row){
							echo "<a href='{$this->webset['web_url']}/HisMain/{$row['ls_id']}' target='_blank'>{$row['ls_title']} English:{$row['ls_englishtit']} </a><br>";
							}?></td></tr>
                    <tr class="conts">
						<td style="vertical-align:middle;border-right:1px solid #C1DAD7;">&nbsp;今日发表的历史评论：</td>
                        <td colspan="7" style="padding-left:10px;"><?php
						$rs_ping=Yii::app()->db->createCommand("select * from his_pinglun where pl_time>$date_start and pl_time<$date_end")->query()->readAll();
						foreach($rs_ping as $key=>$row){
							echo "<a href='{$this->webset['web_url']}/HisMain/{$row['pl_main_id']}' target='_blank'>{$row['pl_text']} </a><br>";
							}?></td></tr>
                   <tr class="conts">
						<td style="vertical-align:middle;border-right:1px solid #C1DAD7;">&nbsp;今日引擎来访种类：</td>
                        <td colspan="7" style="padding-left:10px;"><?php
						$rs_ping=Yii::app()->db->createCommand("select sprider,cometime from his_sprider where cometime>$date_start and cometime<$date_end group by sprider")->query()->readAll();
						foreach($rs_ping as $key=>$row){
							echo "{$row['sprider']}：".date('Y-m-d H:i:s',$row['cometime'])."&nbsp;&nbsp;&nbsp;&nbsp;";
							}?></td></tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
