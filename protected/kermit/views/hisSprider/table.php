<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>���ݱ�ṹ</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
			<table width="100%">
				<thead><tr>
					   <th>ID</th>
                       <th>������</th>
                       <th>��ע</th>
                       <th>�洢����</th>
                       <th>��¼����</th>
                       <th>ռ�ÿռ�</th>
                       <th>������С</th>
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
				  <td colspan='3'><b>���ݿ��ܴ�С��<font color=red><b>{$total} </b>M</font>�����ݻ���</b></td>
				  <td><b>{$total_rows} ��</b></td>
				  <td><b>{$totalsize} M</b></td>
				  <td><b>{$total_index} K</b></td></tr>";
	
		 ?>
				</tbody>
				<tfoot><tr>
					<td colspan="7" style="padding-left:15px;"></td>
                </tr></tfoot>
			</table>
</div></div></div>
		