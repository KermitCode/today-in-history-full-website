        <tr>
        <td><?php echo $data->pl_id; ?></td>
        <td><b><?php echo $data->pl_month; ?></b></td>
        <td><b><?php echo $data->pl_day; ?></b></td>
        <td><?php echo $data->title->ls_title; ?></td>
        <td><?php echo $data->pl_user; ?></td>
        <td><?php echo $data->pl_ip; ?></td>
        <td><?php echo date('Y-m-d H:i:s',$data->pl_time); ?></td>
        <td><?php 
		if($data->pl_visible) echo "<a href='".$this->createUrl('HisPinglun/update',array('id'=>$data->pl_id))."'>����</a>	";
		else echo "<a href='".$this->createUrl('HisPinglun/update',array('id'=>$data->pl_id))."'><font color=red>��ʾ</font></a>";
		echo "	<a href='".$this->createUrl('HisPinglun/delete',array('id'=>$data->pl_id))."'>ɾ��</a>";?></td>
        </tr>
        <tr><td></td><td colspan="8" style="color:blue;"><?php echo $data->pl_text; ?></td></tr>