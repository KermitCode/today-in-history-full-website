        <tr>
        <td><?php echo $data->lk_id; ?></td>
        <td><?php echo CHtml::encode($data->lk_title); ?></td>
        <td><?php echo CHtml::encode($data->lk_url); ?></td>
        <td><b><?php echo CHtml::encode($data->lk_hot); ?></b></td>
        <td><?php echo $data->lk_datetime; ?></td>
        <td><?php echo Yii::app()->params['is_show'][$data->lk_state]; ?></td>
        <td><?php
			echo "<a href='".$this->createUrl('HisLink/Show',array('id'=>$data->lk_id))."'>".Yii::app()->params['is_hidden'][$data->lk_state]."</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('HisLink/update',array('id'=>$data->lk_id))."' >�޸�</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('HisLink/delete',array('id'=>$data->lk_id))."' onClick=\"return(confirm('ɾ���󲻿ɻָ���ȷ��ɾ�����û���'))\">ɾ��</a>";?></td>
        </tr>