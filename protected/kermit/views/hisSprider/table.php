<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>数据表结构</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th>ID</th>
                       <th>表名称</th>
                       <th>表备注</th>
                       <th>存储引擎</th>
                       <th>记录行数</th>
                       <th>占用空间</th>
                       <th>索引大小</th>
				</tr></thead>
				<tbody><?php
				
       $totalsize=0;$total_index=0;$total_rows=0;$i=1;
		
		foreach($result as $row){
				
			$totalsize+=$row['Data_length'];
			
			$total_index+=$row['Index_length'];
			
			$total_rows+=$row['Rows'];
		
			if($row['Data_length']>(1024*1024)) $row['Data_length']='<b>'.round($row['Data_length']/(1024*1024),2).'M</b>';
			
			elseif($row['Data_length']>1024) $row['Data_length']=round($row['Data_length']/1024,2).'K';
			
			else;
		
			$row['Index_length']=$row['Index_length']>1024?(($row['Index_length']/1024).'K'):$row['Index_length'];
		
print<<<EOT
		<tr><td>{$i}</td>
			<td>{$row['Name']}</td>
			<td>{$row['Comment']}</td>
			<td>{$row['Engine']}</td>
			<td>{$row['Rows']}</td>
			<td>{$row['Data_length']}</td>
			<td>{$row['Index_length']}</td>
		</tr>
EOT;
		$i++;	
		}
		$total=number_format(($totalsize+$total_index)/(1024*1024),1);
		$totalsize=number_format($totalsize/(1024*1024),1);
		$total_index=number_format($total_index/(1024),1);
		echo "<tr><td>$i</td>
				  <td colspan='3'><b>数据库总大小：<font color=red><b>{$total} </b>M</font>，数据汇总</b></td>
				  <td><b>{$total_rows} 行</b></td>
				  <td><b>{$totalsize} M</b></td>
				  <td><b>{$total_index} K</b></td></tr>";
	
		 ?>
				</tbody>
				<tfoot><tr>
					<td colspan="7" style="padding-left:15px;"></td>
                </tr></tfoot>
			</table>
</div></div></div>
		