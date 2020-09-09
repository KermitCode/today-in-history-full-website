        <tr>
        <td><?php echo $data->ls_id; ?></td>
        <td><?php echo $data->ls_title; ?></td>
        <td><?php echo $data->ls_class; ?></td>
        <td><?php echo $data->ls_year; ?></td>
        <td><?php echo $data->ls_month; ?></td>
        <td><?php echo $data->ls_day; ?></td>
        <td><?php echo $data->ls_nongyear; ?></td>
        <td><?php echo $data->ls_nongmonth; ?></td>
        <td><?php echo $data->ls_nongday; ?></td>
        <td><?php echo $data->publiced; ?></td>
        <td><?php echo date('Y-m-d H:i:s',$data->ls_time); ?></td>
        <td><?php echo "<a href='".$this->createUrl('HisMain/update',array('id'=>$data->ls_id))."'>ÐÞ¸Ä</a>&nbsp;";
					echo "	<a href='".$this->createUrl('HisMain/delete',array('id'=>$data->ls_id))."'>É¾³ý</a>";?></td>
        </tr>