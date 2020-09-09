<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>生日花语管理</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
                   <th>ID</th>
                   <th>月份</th>
                   <th>日期</th>
                   <th>花名</th>
                   <th>花语</th>
                   <th>诞生石</th>
                   <th>操作</th>
				</tr></thead>
				<tbody>
                    <?php $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$dataProvider,
						'enablePagination'=>false,
						'emptyText'=>'<tr><td colspan="7" class="rs nodata">暂无花语记录</td></tr>',
						'summaryText'=>false,
						'itemView'=>'_view',
					)); ?>
				</tbody>
				<tfoot><tr>
                    <td colspan="7"><div class="pagination"><?php
					echo "共<b>{$dataProvider->totalItemCount }</b>条记录 <b>{$dataProvider->pagination->pageSize}</b>条/页 分<b>{$dataProvider->pagination->pageCount}</b>页显示 ";
					 $this->widget('CLinkPager',array(
							'header'=>'',
							'prevPageLabel'=>'上一页',
							'nextPageLabel'=>'下一页', 
							'pages'=>$dataProvider->pagination,
								)
							);
					?></div>
					</td>
                </tr></tfoot>
			</table>
</div></div></div>
