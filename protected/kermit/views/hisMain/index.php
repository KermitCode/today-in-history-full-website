<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>历史事件列表</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
                   <th>ID</th>
                   <th>事件描述</th>
                   <th>类别</th>
                   <th>年份</th>
                   <th>月份</th>
                   <th>日期</th>
                   <th>干支年</th>
                   <th>阴历月</th>
                   <th>阴历日</th>
                   <th>状态</th>
                   <th>发布时间</th>
                   <th>操作</th>
				</tr></thead>
				<tbody>
                    <?php $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$dataProvider,
						'enablePagination'=>false,
						'emptyText'=>'<tr><td colspan="6" class="rs nodata">暂无警告记录</td></tr>',
						'summaryText'=>false,
						'itemView'=>'_view',
					)); ?>
				</tbody>
				<tfoot><tr>
                    <td colspan="4" >日期筛选：<?php
                     echo CHtml::dropdownList('month',$this->month,$this->getArray_type('month'),array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=HisMain/index&day='.$this->day.'&month='."'".'+this.value;','id'=>'month')).'月 ';
					 echo CHtml::dropdownList('day',$this->day,$this->getArray_type('day'),array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=HisMain/index&month='.$this->month.'&day='."'".'+this.value;','id'=>'month')).'日';
                    ?></td><td colspan="8" >
                    <div class="pagination"><?php
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
