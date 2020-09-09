        <tr>
        <td><?php echo $data->id; ?></td>
        <td><?php $data->jin_user || $data->jin_user='-';echo $data->jin_user; ?></td>
        <td><?php echo CHtml::encode($data->jin_ip); ?></td>
        <td><?php echo CHtml::encode($data->jin_say); ?></td>
        <td><?php echo date('Y-m-d H:i:s',$data->jin_time); ?></td>
        <td><?php echo "<a href='".$this->createUrl('HisErrors/delete',array('id'=>$data->id))."'>É¾³ý</a>";?></td>
        </tr>