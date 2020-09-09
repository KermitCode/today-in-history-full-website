<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>修改星座物语</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="4">星座物语</th>
				</tr></thead>
				<tbody>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'his-link-form',
	'enableAjaxValidation'=>false,
)); ?>                  
                   <tr>
                       <td>星座日期：</td>
                       <td style="color:red;font-weight:bolder;"><?php echo $model->xz_month.'月'.$model->xz_day; ?>日</td>
                       <td>星座名称：</td>
                       <td style="color:red;font-weight:bolder;"><?php echo $model->xz_name; ?></td>
                   </tr>
                   <tr>
                       <td>星座主要特征：</td>
                       <td><?php echo $form->textField($model,'xz_title',array('size'=>40,'maxlength'=>30)); ?></td>
                       <td>星座静思语：</td>
                       <td><?php echo $form->textField($model,'xz_jingsiyu',array('size'=>60,'maxlength'=>225)); ?></td>
                   </tr>
                   <tr>
                       <td>星座介绍：</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_content',array('rows'=>4, 'cols'=>180)); ?></td>
                   </tr>  
                   <tr>
                       <td>星座优点：</td>
                       <td><?php echo $form->textArea($model,'xz_youdian',array('rows'=>2, 'cols'=>60)); ?></td>
                       <td>星座缺点：</td>
                       <td><?php echo $form->textArea($model,'xz_quedian',array('rows'=>2, 'cols'=>60)); ?></td>
                   </tr>
                   <tr>
                       <td>星座守护星：</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_star',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                    <tr>
                       <td>星座名人：</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_mingren',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                    <tr>
                       <td>健康知识：</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_health',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                    <tr>
                       <td>星座塔罗牌：</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_taluopai',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                   <tr>
                       <td>给星座建议：</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_jianyi',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                   <tr>
                      <td></td>
                       <td colspan="3"><?php echo CHtml::submitButton($model->isNewRecord ? '新发表历史事件' : '修改此星座物语',array('class'=>"button")); ?></td>
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