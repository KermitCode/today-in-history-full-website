<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>新增修改主历史事件</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="4">历史事件表单</th>
				</tr></thead>
				<tbody>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'his-link-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>"multipart/form-data"),
	)); ?>                  
                   <tr>
                       <td>事件发生<font color=red>阳历</font>时间：</td>
                       <td><?php echo $form->textField($model,'ls_year',array('size'=>10,'maxlength'=>10,'id'=>'ls_year')); ?>年
                       		<?php echo $form->dropDownlist($model,'ls_month',$this->getArray_type('month'),array('id'=>'ls_month')); ?>月
                            <?php echo $form->dropDownlist($model,'ls_day',$this->getArray_type('day'),array('id'=>'ls_day')); ?>日
                             &nbsp;&nbsp;<input id="chtime" type="button" value="自动转换此至右边阴历时间" onClick="javascript:getYltime();" class="button">
                       		</td>
                       <td>对应的<font color=red>阴历</font>时间：</td>
                       <td><?php echo $form->dropDownlist($model,'ls_nongyear',$this->getYear_char(),array('id'=>'ls_nongyear')); ?>年
                       		<?php echo $form->dropDownlist($model,'ls_nongmonth',$this->getArray_type('ylmonth'),array('id'=>'ls_nongmonth')); ?>月
                            <?php echo $form->dropDownlist($model,'ls_nongday',$this->getArray_day(),array('id'=>'ls_nongday')); ?>
                            &nbsp;数字日期：<?php echo $form->dropDownlist($model,'ls_nongnummonth',$this->getArray_type('month'),array('id'=>'ls_nongnummonth')); ?>月
                       		<?php echo $form->dropDownlist($model,'ls_nongnumday',$this->getArray_type('day'),array('id'=>'ls_nongnumday')); ?>日</td>             
                    </tr>
                    <tr>
                       <td>增加事件图片：</td>
                       <td><input type="file" name="upimage" id="upimage" size="30" >
                       <?php if(!$model->isNewRecord) echo "（<a href='".$this->createUrl('HisErrors/view',array('id'=>$model->ls_id))."'>管理已有的主图片</a>）"; ?></td>
                       <td>事件类别：</td>
                       <td><?php echo $form->dropDownlist($model,'ls_class',Yii::app()->params['type']); ?>(no则不归任何类)</td>
                    </tr> 
                    <tr>
                       <td>事件中文标题：</td>
                       <td colspan="3"><?php echo $form->textField($model,'ls_title',array('id'=>'ls_title','size'=>60,'maxlength'=>100)); ?>
                       &nbsp;&nbsp;<input type="button" value="将此标题翻译至下英文框" class="button" onClick="javascript:gotrans('ls_title');"></td>      
                    </tr>
                    <tr>
                       <td>事件<font color=red>英文</font>标题</td>
                       <td colspan="3"><?php echo $form->textField($model,'ls_englishtit',array('id'=>'ls_englishtit','size'=>80,'maxlength'=>255)); ?>(可点击上面的翻译按钮：翻译接口慢点击后请稍候)</td>
                    </tr>
                    <tr>
                       <td>事件中文描述：</td>
                       <td colspan="3">
<script charset="utf-8" src="<?php echo Yii::app()->baseUrl;?>/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo Yii::app()->baseUrl;?>/editor/lang/zh_CN.js"></script>
<script>var editor;KindEditor.ready(function(K) {editor = K.create('#ls_cont');});</script> 
<?php echo $form->textArea($model,'ls_cont',array('id'=>'ls_cont','style'=>"height:350px;width:900px;")); ?></td>
                    </tr> 
                    <tr>
                       <td>事件英文描述：</td>
                       <td colspan="3"><textarea rows="4" cols="150" name="engcont" id="engcont" style="color:blue;"><?php 
					   if(is_array($eng_text)) echo $eng_text['cont'];?></textarea></td>
                    </tr>
                    <tr>
                       <td></td>
                       <td colspan="3"><?php echo CHtml::submitButton($model->isNewRecord ? '新发表历史事件' : '修改历史事件',array('class'=>"button")); ?>
                       &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="button" value="将上述事件正文内容翻译至英文" onClick="javascript:gotrans('ls_cont');" class="button">&nbsp;点击翻译后需要一点时间，请稍等...
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
	if(value==''){alert('要翻译的内容不能为空!');return false;}
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
				if(data.rs==0) alert('只有年份在1901-2020年间才能转化成阴历');
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