<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>修改生日花语</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="4">生日花语</th>
				</tr></thead>
				<tbody>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'his-link-form',
	'enableAjaxValidation'=>false,
)); ?>                  
                   <tr>
                       <td>花语日期：</td>
                       <td style="color:red;font-weight:bolder;"><?php echo $model->bri_month.'月'.$model->bri_day; ?>日</td>
                       <td>生日花花名：</td>
                       <td><?php echo $form->textField($model,'bri_huaname',array('size'=>30,'maxlength'=>30)); ?></td>
                   </tr>
                   <tr>
                       <td>生日花图片：</td>
                       <td colspan="3"><?php echo $form->textField($model,'bri_img',array('size'=>30,'maxlength'=>30)); ?></td>
                   </tr>
                   <tr>
                       <td>生日花花义：</td>
                       <td colspan="3"><?php echo $form->textArea($model,'bri_huacont',array('rows'=>6, 'cols'=>120)); ?></td>
                   </tr>
                    <tr>
                       <td>花语：</td>
                       <td><?php echo $form->textField($model,'bri_huayu',array('size'=>30,'maxlength'=>30)); ?></td>
                       <td>诞生石：</td>
                       <td><?php echo $form->textField($model,'bri_dansheng',array('size'=>30,'maxlength'=>30)); ?></td>
                   </tr>
                   <tr>
                       <td>花语内容：</td>
                       <td><?php echo $form->textArea($model,'bri_huayucont',array('rows'=>6, 'cols'=>80)); ?></td>
                       <td>诞生石解说：</td>
                       <td><?php echo $form->textField($model,'bri_danshengshuo',array('size'=>30,'maxlength'=>30)); ?></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td colspan="3"><?php echo CHtml::submitButton($model->isNewRecord ? '新发表历史事件' : '修改生日花语',array('class'=>"button")); ?></td>
                    </tr>
<?php $this->endWidget(); ?>                   
				</tbody>
				<tfoot><tr>
                    <td colspan="6">
					</td>
                </tr></tfoot>
			</table>
</div></div></div>
<div class="form">
<div class="form">