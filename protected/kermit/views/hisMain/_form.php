<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>�����޸�����ʷ�¼�</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="4">��ʷ�¼���</th>
				</tr></thead>
				<tbody>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'his-link-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>"multipart/form-data"),
	)); ?>                  
                   <tr>
                       <td>�¼�����<font color=red>����</font>ʱ�䣺</td>
                       <td><?php echo $form->textField($model,'ls_year',array('size'=>10,'maxlength'=>10,'id'=>'ls_year')); ?>��
                       		<?php echo $form->dropDownlist($model,'ls_month',$this->getArray_type('month'),array('id'=>'ls_month')); ?>��
                            <?php echo $form->dropDownlist($model,'ls_day',$this->getArray_type('day'),array('id'=>'ls_day')); ?>��
                             &nbsp;&nbsp;<input id="chtime" type="button" value="�Զ�ת�������ұ�����ʱ��" onClick="javascript:getYltime();" class="button">
                       		</td>
                       <td>��Ӧ��<font color=red>����</font>ʱ�䣺</td>
                       <td><?php echo $form->dropDownlist($model,'ls_nongyear',$this->getYear_char(),array('id'=>'ls_nongyear')); ?>��
                       		<?php echo $form->dropDownlist($model,'ls_nongmonth',$this->getArray_type('ylmonth'),array('id'=>'ls_nongmonth')); ?>��
                            <?php echo $form->dropDownlist($model,'ls_nongday',$this->getArray_day(),array('id'=>'ls_nongday')); ?>
                            &nbsp;�������ڣ�<?php echo $form->dropDownlist($model,'ls_nongnummonth',$this->getArray_type('month'),array('id'=>'ls_nongnummonth')); ?>��
                       		<?php echo $form->dropDownlist($model,'ls_nongnumday',$this->getArray_type('day'),array('id'=>'ls_nongnumday')); ?>��</td>             
                    </tr>
                    <tr>
                       <td>�����¼�ͼƬ��</td>
                       <td><input type="file" name="upimage" id="upimage" size="30" >
                       <?php if(!$model->isNewRecord) echo "��<a href='".$this->createUrl('HisErrors/view',array('id'=>$model->ls_id))."'>�������е���ͼƬ</a>��"; ?></td>
                       <td>�¼����</td>
                       <td><?php echo $form->dropDownlist($model,'ls_class',Yii::app()->params['type']); ?>(no�򲻹��κ���)</td>
                    </tr> 
                    <tr>
                       <td>�¼����ı��⣺</td>
                       <td colspan="3"><?php echo $form->textField($model,'ls_title',array('id'=>'ls_title','size'=>60,'maxlength'=>100)); ?>
                       &nbsp;&nbsp;<input type="button" value="���˱��ⷭ������Ӣ�Ŀ�" class="button" onClick="javascript:gotrans('ls_title');"></td>      
                    </tr>
                    <tr>
                       <td>�¼�<font color=red>Ӣ��</font>����</td>
                       <td colspan="3"><?php echo $form->textField($model,'ls_englishtit',array('id'=>'ls_englishtit','size'=>80,'maxlength'=>255)); ?>(�ɵ������ķ��밴ť������ӿ�����������Ժ�)</td>
                    </tr>
                    <tr>
                       <td>�¼�����������</td>
                       <td colspan="3">
<script charset="utf-8" src="<?php echo Yii::app()->baseUrl;?>/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo Yii::app()->baseUrl;?>/editor/lang/zh_CN.js"></script>
<script>var editor;KindEditor.ready(function(K) {editor = K.create('#ls_cont');});</script> 
<?php echo $form->textArea($model,'ls_cont',array('id'=>'ls_cont','style'=>"height:350px;width:900px;")); ?></td>
                    </tr> 
                    <tr>
                       <td>�¼�Ӣ��������</td>
                       <td colspan="3"><textarea rows="4" cols="150" name="engcont" id="engcont" style="color:blue;"><?php 
					   if(is_array($eng_text)) echo $eng_text['cont'];?></textarea></td>
                    </tr>
                    <tr>
                       <td></td>
                       <td colspan="3"><?php echo CHtml::submitButton($model->isNewRecord ? '�·�����ʷ�¼�' : '�޸���ʷ�¼�',array('class'=>"button")); ?>
                       &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="button" value="�������¼��������ݷ�����Ӣ��" onClick="javascript:gotrans('ls_cont');" class="button">&nbsp;����������Ҫһ��ʱ�䣬���Ե�...
                       </td>
                    </tr>
<?php $this->endWidget(); ?>                   
				</tbody>
				<tfoot><tr>
                    <td colspan="4">
					</td>
                </tr></tfoot>
			</table>
</div></div></div>
<div class="form">
<script language="javascript">
function gotrans(text){
	editor.sync();
	var value=$('#'+text).val();
	if(value==''){alert('Ҫ��������ݲ���Ϊ��!');return false;}
	$.get("<?php echo $this->createUrl('HisMain/Trans');?>",{value:encodeURI(value)},
		 function(data){
			if(text=='ls_title') $('#ls_englishtit').val(data); 
			else $('#engcont').val(data);
		 });
}
$(function(){
	$("#chtime").click(function(){
		var year=$('#ls_year').val();
		var month=$('#ls_month').val();
		var day=$('#ls_day').val();
		$.get("<?php echo $this->createUrl('HisMain/Ylyear');?>",{year:year,month:month,day:day},
			 function(data){
				if(data.rs==0) alert('ֻ�������1901-2020������ת��������');
				else{
					$('#ls_nongyear').val(data.ylyear);
					$('#ls_nongmonth').val(data.ylmonth);
					$('#ls_nongday').val(data.ylday);
					$('#ls_nongnummonth').val(data.month_num);
					$('#ls_nongnumday').val(data.day_num);
				}
			 },'json');
		});	  
});	   
</script>