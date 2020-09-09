<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>友情链接列表</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th>ID</th>
                       <th>网站名称</th>
                       <th>网站主页</th>
                       <th>排序值</th>
                       <th>加入时间</th>
                       <th>状态</th>
                       <th>操作</th>
				</tr></thead>
				<tbody>
                    <?php $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$dataProvider,
						'enablePagination'=>false,
						'emptyText'=>'<tr><td colspan="7" class="rs nodata">暂无友情链接</td></tr>',
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
