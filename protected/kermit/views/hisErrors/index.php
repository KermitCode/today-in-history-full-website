<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>���ʾ����б�</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th>ID</th>
                       <th>��¼�û�</th>
                       <th>IP��ַ</th>
                       <th>����ԭ��</th>
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
                    <td colspan="6"><div class="pagination"><?php
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
