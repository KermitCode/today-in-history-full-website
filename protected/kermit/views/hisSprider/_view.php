<tr>
<td><?php echo $data->id; ?></td>
<td><?php echo $data->sprider; ?></td>
<td><?php echo date('Y-m-d H:i:s',$data->cometime); ?></td>
<td><?php echo "<a href='".$this->createUrl('HisSprider/delete',array('id'=>$data->id))."'>ɾ���˼�¼</a>";?></td>
</tr>