<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>�޸���������</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="4">��������</th>
				</tr></thead>
				<tbody>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'his-link-form',
	'enableAjaxValidation'=>false,
)); ?>                  
                   <tr>
                       <td>�������ڣ�</td>
                       <td style="color:red;font-weight:bolder;"><?php echo $model->xz_month.'��'.$model->xz_day; ?>��</td>
                       <td>�������ƣ�</td>
                       <td style="color:red;font-weight:bolder;"><?php echo $model->xz_name; ?></td>
                   </tr>
                   <tr>
                       <td>������Ҫ������</td>
                       <td><?php echo $form->textField($model,'xz_title',array('size'=>40,'maxlength'=>30)); ?></td>
                       <td>������˼�</td>
                       <td><?php echo $form->textField($model,'xz_jingsiyu',array('size'=>60,'maxlength'=>225)); ?></td>
                   </tr>
                   <tr>
                       <td>�������ܣ�</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_content',array('rows'=>4, 'cols'=>180)); ?></td>
                   </tr>  
                   <tr>
                       <td>�����ŵ㣺</td>
                       <td><?php echo $form->textArea($model,'xz_youdian',array('rows'=>2, 'cols'=>60)); ?></td>
                       <td>����ȱ�㣺</td>
                       <td><?php echo $form->textArea($model,'xz_quedian',array('rows'=>2, 'cols'=>60)); ?></td>
                   </tr>
                   <tr>
                       <td>�����ػ��ǣ�</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_star',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                    <tr>
                       <td>�������ˣ�</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_mingren',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                    <tr>
                       <td>����֪ʶ��</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_health',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                    <tr>
                       <td>���������ƣ�</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_taluopai',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                   <tr>
                       <td>���������飺</td>
                       <td colspan="3"><?php echo $form->textArea($model,'xz_jianyi',array('rows'=>3, 'cols'=>180)); ?></td>
                   </tr>
                   <tr>
                      <td></td>
                       <td colspan="3"><?php echo CHtml::submitButton($model->isNewRecord ? '�·�����ʷ�¼�' : '�޸Ĵ���������',array('class'=>"button")); ?></td>
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