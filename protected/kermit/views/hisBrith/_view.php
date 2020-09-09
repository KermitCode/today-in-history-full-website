        <tr>
        <td><?php echo $data->bri_id; ?></td>
        <td><?php echo $data->bri_month; ?></td>
        <td><?php echo $data->bri_day; ?></td>
        <td><?php echo $data->bri_huaname; ?></td>
        <td><?php echo $data->bri_huayu; ?></td>
        <td><?php echo $data->bri_dansheng; ?></td>
        <td><?php echo "<a href='".$this->createUrl('HisBrith/update',array('id'=>$data->bri_id))."'>ÐÞ¸Ä</a>";?></td>
        </tr>