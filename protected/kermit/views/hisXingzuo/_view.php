        <tr>
        <td><?php echo $data->xz_id; ?></td>
        <td><b><?php echo $data->xz_month; ?></b></td>
        <td><b><?php echo $data->xz_day; ?></b></td>
        <td><?php echo $data->xz_name; ?></td>
        <td><?php echo $data->xz_title; ?></td>
        <td><?php echo "<a href='".$this->createUrl('HisXingzuo/update',array('id'=>$data->xz_id))."'>ÐÞ¸Ä</a>";?></td>
        </tr>