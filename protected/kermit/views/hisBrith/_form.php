<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>�޸����ջ���</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="4">���ջ���</th>
				</tr></thead>
				<tbody>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'his-link-form',
	'enableAjaxValidation'=>false,
)); ?>                  
                   <tr>
                       <td>�������ڣ�</td>
                       <td style="color:red;font-weight:bolder;"><?php echo $model->bri_month.'��'.$model->bri_day; ?>��</td>
                       <td>���ջ�������</td>
                       <td><?php echo $form->textField($model,'bri_huaname',array('size'=>30,'maxlength'=>30)); ?></td>
                   </tr>
                   <tr>
                       <td>���ջ�ͼƬ��</td>
                       <td colspan="3"><?php echo $form->textField($model,'bri_img',array('size'=>30,'maxlength'=>30)); ?></td>
                   </tr>
                   <tr>
                       <td>���ջ����壺</td>
                       <td colspan="3"><?php echo $form->textArea($model,'bri_huacont',array('rows'=>6, 'cols'=>120)); ?></td>
                   </tr>
                    <tr>
                       <td>���</td>
                       <td><?php echo $form->textField($model,'bri_huayu',array('size'=>30,'maxlength'=>30)); ?></td>
                       <td>����ʯ��</td>
                       <td><?php echo $form->textField($model,'bri_dansheng',array('size'=>30,'maxlength'=>30)); ?></td>
                   </tr>
                   <tr>
                       <td>�������ݣ�</td>
                       <td><?php echo $form->textArea($model,'bri_huayucont',array('rows'=>6, 'cols'=>80)); ?></td>
                       <td>����ʯ��˵��</td>
                       <td><?php echo $form->textField($model,'bri_danshengshuo',array('size'=>30,'maxlength'=>30)); ?></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td colspan="3"><?php echo CHtml::submitButton($model->isNewRecord ? '�·�����ʷ�¼�' : '�޸����ջ���',array('class'=>"button")); ?></td>
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