<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>搜索引擎来访记录</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th>ID</th>
                       <th>搜索引擎</th>
                       <th>来访时间</th>
                       <th>操作</th>
				</tr></thead>
				<tbody>
                    <?php $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$dataProvider,
						'enablePagination'=>false,
						'emptyText'=>'<tr><td colspan="4" class="rs nodata">暂无访问记录</td></tr>',
						'summaryText'=>false,
						'itemView'=>'_view',
					)); ?>
				</tbody>
				<tfoot><tr>
					<td colspan="2" style="padding-left:15px;">
                     搜索引擎筛选：<?php
					 $sprider_arr=array(0=>'所有引擎');
					 foreach(Yii::app()->params['sprider'] as $key=>$value) $sprider_arr[$key]=$key;
					 echo CHtml::dropDownlist('sprider',$sprider,$sprider_arr,
					 array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=HisSprider/index&sprider='."'".'+this.value;','id'=>'sprider'));
					 ?>
                     &nbsp;&nbsp;<a href="<?php echo $this->createUrl('HisSprider/Clear');?>">清除全部记录</a></td>
                    <td colspan="2"><div class="pagination"><?php
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