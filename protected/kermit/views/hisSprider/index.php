<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>�����������ü�¼</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th>ID</th>
                       <th>��������</th>
                       <th>����ʱ��</th>
                       <th>����</th>
				</tr></thead>
				<tbody>
                    <?php $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$dataProvider,
						'enablePagination'=>false,
						'emptyText'=>'<tr><td colspan="4" class="rs nodata">���޷��ʼ�¼</td></tr>',
						'summaryText'=>false,
						'itemView'=>'_view',
					)); ?>
				</tbody>
				<tfoot><tr>
					<td colspan="2" style="padding-left:15px;">
                     ��������ɸѡ��<?php
					 $sprider_arr=array(0=>'��������');
					 foreach(Yii::app()->params['sprider'] as $key=>$value) $sprider_arr[$key]=$key;
					 echo CHtml::dropDownlist('sprider',$sprider,$sprider_arr,
					 array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=HisSprider/index&sprider='."'".'+this.value;','id'=>'sprider'));
					 ?>
                     &nbsp;&nbsp;<a href="<?php echo $this->createUrl('HisSprider/Clear');?>">���ȫ����¼</a></td>
                    <td colspan="2"><div class="pagination"><?php
					echo "��<b>{$dataProvider->totalItemCount }</b>����¼ <b>{$dataProvider->pagination->pageSize}</b>��/ҳ ��<b>{$dataProvider->pagination->pageCount}</b>ҳ��ʾ ";
					 $this->widget('CLinkPager',array(
							'header'=>'',
							'prevPageLabel'=>'��һҳ',
							'nextPageLabel'=>'��һҳ', 
							'pages'=>$dataProvider->pagination,
								)
							);
					?></div>
					</td>
                </tr></tfoot>
			</table>
</div></div></div>