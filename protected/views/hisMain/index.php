	<div class="article"> 
      <div class="list"><ul>
      <?php	
				 $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'summaryText'=>false,
					'template'=>"{items}",
					'enablePagination'=>false,
					'itemView'=>'_view',
					'cssFile'=>false,
					'emptyText'=>'<div style="text-align:center;padding:30px 0;">'.$this->pagestips['nors'].'</div>',
					'ajaxUpdate'=>false,
					'baseScriptUrl'=>false,
				)); ?>
      </ul></div>
      <div class="pagess">
      <?php             
		  if(BAN_LANGUAGE=='chinese') echo "共<b>{$dataProvider->totalItemCount}</b>条记录 <b>{$dataProvider->itemCount}</b>条/页 ";
		  else echo "All <b>{$dataProvider->totalItemCount}</b> Records<b>{$dataProvider->itemCount}</b> Record/Page ";
		  $this->widget('CLinkPager',array(
		  		'pages'=>$dataProvider->pagination,
				'nextPageLabel'=>$this->pagestips['next'],
				'prevPageLabel'=>$this->pagestips['pre'],
				'cssFile'=>false,
				'header'=>'',
				'firstPageLabel'=>false,
				'lastPageLabel'=>false,
				));
			?></div>
      
   </div>
