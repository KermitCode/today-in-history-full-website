<style>body{background-color:#fff;}
table{border:1px solid #C1DAD7;}
tr.conts td{border-bottom:1px solid #C1DAD7;}</style>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/images/Calendar3.js"></script>
<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>��վ����̨</div></div>
<div class="content-box role">
	<div class="content-box-content">
		<div class="tab-content default-tab" >
			<table width="100%">
				<thead>
					<tr>
					   <td style="border:1px solid #C1DAD7;padding-left:10px;" colspan="8">��ʷ�ϵĽ�����-��̨�ܿ���̨</td>
					</tr>
				</thead>
				<tbody>
					<TR>
                    <td  style='padding-left:5px;'>��ʷ�¼�����</td>
                    <td  style='padding-left:5px;color:red;font-weight:bolder;'><?php echo $number_arr['allhis_num'];?> ��</td>
                    <td  style='padding-left:5px;'>��������</td>
                    <td  style='padding-left:5px;color:red;font-weight:bolder;'><?php echo $number_arr['pinglun_num'];?> ��</td>
                    <td  style='padding-left:5px;'>����������</td>
                    <td  style='padding-left:5px;color:red;font-weight:bolder;'><?php echo $number_arr['error_num'];?> ��</td>
                    <td  style='padding-left:5px;'>������������</td>
                    <td  style='padding-left:5px;color:red;font-weight:bolder;'><?php echo $number_arr['link_num'];?> ��</td>
                    </TR>
				</tbody>
                <thead>
					<tr><td style="border:1px solid #C1DAD7;padding-left:10px;height:35px;line-height:35px;" colspan="8"><form action="<?php echo $this->createUrl('Site/Control');?>" method="post">�������ݣ�&nbsp;&nbsp;&nbsp;�����鿴���ڣ� <input name="tdate" type="text" id="tdate" size="12" maxlength="10" onclick="new Calendar().show(this);" readonly="readonly" style="color:red;font-weight:bolder;" value="<?php echo $tdate;?>" /> <input type="submit" value="ȷ��" /></form></td>
					</tr>
				</thead>
				<tfoot>
					<tr class="conts">
						<td style="vertical-align:middle;border-right:1px solid #C1DAD7;">&nbsp;���շ������ʷ�¼���</td>
                        <td colspan="7" style="padding-left:10px;"><?php $date_start=strtotime($tdate);$date_end=$date_start+3600*24;
						$rs_main=$rs=Yii::app()->db->createCommand("select * from his_main where publiced=1 and ls_time>$date_start and ls_time<$date_end")->query()->readAll();
						foreach($rs_main as $key=>$row){
							echo "<a href='{$this->webset['web_url']}/HisMain/{$row['ls_id']}' target='_blank'>{$row['ls_title']} English:{$row['ls_englishtit']} </a><br>";
							}?></td></tr>
                    <tr class="conts">
						<td style="vertical-align:middle;border-right:1px solid #C1DAD7;">&nbsp;���շ������ʷ���ۣ�</td>
                        <td colspan="7" style="padding-left:10px;"><?php
						$rs_ping=Yii::app()->db->createCommand("select * from his_pinglun where pl_time>$date_start and pl_time<$date_end")->query()->readAll();
						foreach($rs_ping as $key=>$row){
							echo "<a href='{$this->webset['web_url']}/HisMain/{$row['pl_main_id']}' target='_blank'>{$row['pl_text']} </a><br>";
							}?></td></tr>
                   <tr class="conts">
						<td style="vertical-align:middle;border-right:1px solid #C1DAD7;">&nbsp;���������������ࣺ</td>
                        <td colspan="7" style="padding-left:10px;"><?php
						$rs_ping=Yii::app()->db->createCommand("select sprider,cometime from his_sprider where cometime>$date_start and cometime<$date_end group by sprider")->query()->readAll();
						foreach($rs_ping as $key=>$row){
							echo "{$row['sprider']}��".date('Y-m-d H:i:s',$row['cometime'])."&nbsp;&nbsp;&nbsp;&nbsp;";
							}?></td></tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
