<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>��ʷ�¼��б�</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
                   <th>ID</th>
                   <th>�¼�����</th>
                   <th>���</th>
                   <th>���</th>
                   <th>�·�</th>
                   <th>����</th>
                   <th>��֧��</th>
                   <th>������</th>
                   <th>������</th>
                   <th>״̬</th>
                   <th>����ʱ��</th>
                   <th>����</th>
				</tr></thead>
				<tbody>
                    <?php $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$dataProvider,
						'enablePagination'=>false,
						'emptyText'=>'<tr><td colspan="6" class="rs nodata">���޾����¼</td></tr>',
						'summaryText'=>false,
						'itemView'=>'_view',
					)); ?>
				</tbody>
				<tfoot><tr>
                    <td colspan="4" >����ɸѡ��<?php
                     echo CHtml::dropdownList('month',$this->month,$this->getArray_type('month'),array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=HisMain/index&day='.$this->day.'&month='."'".'+this.value;','id'=>'month')).'�� ';
					 echo CHtml::dropdownList('day',$this->day,$this->getArray_type('day'),array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=HisMain/index&month='.$this->month.'&day='."'".'+this.value;','id'=>'month')).'��';
                    ?></td><td colspan="8" >
                    <div class="pagination"><?php
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
