<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>新增修改友情链接</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="2">&nbsp;链接相关表单</th>
				</tr></thead>
				<tbody>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'his-link-form',
	'enableAjaxValidation'=>false,
)); ?>                  
                   <tr>
                       <td>链接网站名称：</td>
                       <td><?php echo $form->textField($model,'lk_title',array('size'=>20,'maxlength'=>20)); ?></td>
                    </tr>
                    <tr>
                       <td>网站URL</td>
                       <td><?php echo $form->textField($model,'lk_url',array('size'=>50,'maxlength'=>50)); ?></td>
                    </tr>
                    <tr>
                       <td>链接热度值</td>
                       <td><?php echo $form->textField($model,'lk_hot',array('size'=>15,'maxlength'=>50)); ?>（从0-100不等）</td>
                    </tr>
                    <tr>
                       <td></td>
                       <td><?php echo CHtml::submitButton($model->isNewRecord ? '新增链接' : '修改链接',array('class'=>"button")); ?></td>
                    </tr>
<?php $this->endWidget(); ?>                   
				</tbody>
				<tfoot><tr>
                    <td colspan="6">
					</td>
                </tr></tfoot>
			</table>
</div></div></div>