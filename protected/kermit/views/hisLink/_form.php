<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>�����޸���������</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="2">&nbsp;������ر�</th>
				</tr></thead>
				<tbody>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'his-link-form',
	'enableAjaxValidation'=>false,
)); ?>                  
                   <tr>
                       <td>������վ���ƣ�</td>
                       <td><?php echo $form->textField($model,'lk_title',array('size'=>20,'maxlength'=>20)); ?></td>
                    </tr>
                    <tr>
                       <td>��վURL</td>
                       <td><?php echo $form->textField($model,'lk_url',array('size'=>50,'maxlength'=>50)); ?></td>
                    </tr>
                    <tr>
                       <td>�����ȶ�ֵ</td>
                       <td><?php echo $form->textField($model,'lk_hot',array('size'=>15,'maxlength'=>50)); ?>����0-100���ȣ�</td>
                    </tr>
                    <tr>
                       <td></td>
                       <td><?php echo CHtml::submitButton($model->isNewRecord ? '��������' : '�޸�����',array('class'=>"button")); ?></td>
                    </tr>
<?php $this->endWidget(); ?>                   
				</tbody>
				<tfoot><tr>
                    <td colspan="6">
					</td>
                </tr></tfoot>
			</table>
</div></div></div>