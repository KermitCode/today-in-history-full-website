<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>����ʷ�¼���ͼ�б�</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th colspan="2">����ʷ�¼�ID��<font color=red><b><?php echo $id;?></b></font></th>
				</tr></thead>
				<tbody>
                <?php	if(!$rs) echo "<tr><td colspan='2'></td></tr>";
				else{ $i=0;
					foreach($rs as $key=>$row){
						$i++;
						echo "<tr><td>ͼƬ-{$i}</td><td><img src='".Yii::app()->baseUrl."/img/uploak/{$row['img_url']}'>
						&nbsp;<a href='".$this->createUrl('HisErrors/chanimg',array('id'=>$row['img_id']))."'>ɾ������ͼƬ</a>
						</td></tr>";
						}
					}
				?>  
				</tbody>
				<tfoot><tr>
                    <td colspan="2">
					</td>
                </tr></tfoot>
			</table>
</div></div></div>
