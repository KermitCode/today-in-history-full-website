<style type="text/css">
textarea{border:1px solid #6E9FDE;}
</style>
<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>ƽ̨ϵͳ����</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
<?php foreach($rs as $key=>$value){ 
		if($key=='adminer_pass' || $key=='superadmin_pass' || $key=='adtest_pass') continue;
		$$key=$value;
		}
		?>   
<!--�б�ʼ-->
<form action="<?php echo $this->createUrl('HisSystem/webset',array('modify'=>'modify'));?>" method="post" name="webset" id="webset">     
      <table width="100%">
		  <thead><tr><th colspan="2">������Ϣ����<a name="baseset"></a><font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></th></tr></thead>
          <tbody>
          <tr><td width="25%">��վ�Ƿ�򿪣�</td>
             <td><?php echo CHtml::radiobuttonlist('web_open',$web_open,array(1=>'��',0=>'��'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">��վ����ر���ʾ�û���Ϣ��</td>
            <td><?php echo CHtml::textArea('web_close_words',$web_close_words,array('rows'=>3,'cols'=>70));?></td></tr>
          <tr><td width="25%">��վ���ƣ�</td>
            <td><?php echo CHtml::textField('web_name',$web_name,array('size'=>30));?></td></tr>
          <tr><td width="25%">��վ������ַ(http://www.domain.com)��</td>
            <td><?php echo CHtml::textField('web_url',$web_url,array('size'=>30));?></td></tr>
          <tr><td width="25%">��վ�ؼ��ʣ�</td>
            <td><?php echo CHtml::textArea('web_keyword',$web_keyword,array('rows'=>3,'cols'=>90));?></td></tr>
           <tr><td width="25%">Ӣ�Ĺؼ��ʣ�</td>
            <td><?php echo CHtml::textArea('index_class_arr',$index_class_arr,array('rows'=>3,'cols'=>90));?></td></tr>
          <tr><td width="25%">��վ������</td>
            <td><?php echo CHtml::textArea('web_description',$web_description,array('rows'=>4,'cols'=>90));?></td></tr>
          <tr><td width="25%">Ӣ����վ������</td>
            <td><?php echo CHtml::textArea('image_pagenum',$image_pagenum,array('rows'=>4,'cols'=>90));?></td></tr>
           <tr><td width="25%">��վͳ�ƴ��룺</td>
            <td><?php echo CHtml::textArea('web_stat',$web_stat,array('rows'=>4,'cols'=>90));?></td></tr>
          <tr><td width="25%">��վ�����ţ�</td>
            <td><?php echo CHtml::textField('web_beian',$web_beian,array('size'=>30));?></td></tr>
          <tr><td width="25%">��������������ʱ���¼һ�Σ�</td>
            <td><?php echo CHtml::textField('sprider_time',$sprider_time,array('size'=>5));?> Сʱ</td></tr>
          <tr><td width="25%">����������ʼ�¼��ౣ��������</td>
            <td><?php echo CHtml::textField('sprider_num',$sprider_num,array('size'=>6));?> ��</td></tr>
          <tr><td width="25%"></td>
            <td><input type="submit" class="button"  value="����������վ����"/></td></tr>
          </tbody>
          
          <thead><tr><th colspan="2">��վ��ȫ����<a name="safeset"></a><font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></th></tr></thead>
 		  <tbody>
          <tr><td width="25%">��վ�������ã�</td>
            <td><?php echo CHtml::radiobuttonlist('web_error',$web_error,array(1=>'��վ����ģʽ',0=>'��վ��Ӫģʽ'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">��ֹ����IP�б�</td>
            <td><?php echo CHtml::textArea('no_ips',$no_ips,array('rows'=>4,'cols'=>90));?></td></tr>
          <tr><td width="25%">��ֹIP�Ĵ���취</td>
            <td><?php echo CHtml::radiobuttonlist('no_ips_do',$no_ips_do,array(1=>'���������',0=>'չʾ�հ�ҳ'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">�Ƿ����վ��ˢ�����ܣ�</td>
            <td><?php echo CHtml::radiobuttonlist('web_fangshuaxin',$web_fangshuaxin,array(1=>'��',0=>'��'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">������ٺ��������ˢ����</td>
            <td><?php echo CHtml::textField('web_fangshuapin',$web_fangshuapin,array('size'=>6));?> ����</td></tr>
          <tr><td width="25%">����ˢ�����κ���ʾ�û����ʹ���Ƶ����</td>
            <td><?php echo CHtml::textField('web_shuapin_num',$web_shuapin_num,array('size'=>6));?> ��</td></tr>
          <tr><td width="25%">��ˢ������ʾ�û������Ӻ��ٷ��ʣ�</td>
            <td><?php echo CHtml::textField('web_shuapin_time',$web_shuapin_time,array('size'=>6));?> ����</td></tr>
           <tr><td width="25%">��ʾˢ�����ΰ��û�IP�����ֹIP��</td>
            <td><?php echo CHtml::textField('web_shua_times_jinip',$web_shua_times_jinip,array('size'=>6));?> ��</td></tr>
          <tr>
          	<td width="25%"></td><td><input type="submit" class="button"  value="����������վ����"/></td>
          </tr>
     	  </tbody>
     
          <thead><tr><th colspan="2">ҳ����ʾ����<a name="viewset"></a> <font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></th></tr></thead>
		  <tbody>
          <tr><td width="25%">�����Ƿ���Ҫ��ˣ�</td>
            <td><?php echo CHtml::radiobuttonlist('pingjia_right',$pingjia_right,array(1=>'��',0=>'��'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">ÿ�ε�¼��������۶�������</td>
            <td><?php echo CHtml::textField('pingjia_most',$pingjia_most,array('size'=>6));?> ��</td></tr>
           <tr><td width="25%">Υ��ؼ��ʵĴ���취��</td>
            <td><?php echo CHtml::radiobuttonlist('bad_words_do',$bad_words_do,array(1=>'ȥ��',2=>'��***�����',3=>'��ֹ����'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">Υ��ؼ����б�</td>
            <td><?php echo CHtml::textArea('bad_words',$bad_words,array('rows'=>4,'cols'=>70));?></td></tr>
          <tr><td width="25%">��ҳ��Ե���ﻺ��ʱ�䣺</td>
            <td><?php echo CHtml::textField('stat_day_cachetime',$stat_day_cachetime,array('size'=>6));?> Сʱ</td></tr>
          <tr><td width="25%">��ҳ��Ե��������ʱ�䣺</td>
            <td><?php echo CHtml::textField('stat_all_cachetime',$stat_all_cachetime,array('size'=>6));?> Сʱ</td></tr>
          <tr><td width="25%"></td>
            <td><input type="submit" class="button"  value="����������վ����"/></td></tr>
          </tbody>
          
          
          <thead><tr><th colspan="2">�Զ���������<a name="autoset"></a> <font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></th></tr></thead>
          <tbody>
          <tr><td width="25%">ÿ���Զ�����������ʷ�¼�����</td>
            <td><?php echo CHtml::textField('auto_public_num',$auto_public_num,array('size'=>8));?> ƪ ��"0"��Ϊ�ر�����Ц���Զ�����</td></tr>
          <tr><td width="25%">�Զ���������µ������ڣ�</td>
            <td><?php echo CHtml::textField('auto_public_day',$auto_public_day,array('size'=>15,'readonly'=>'readonly'));?></td></tr>
          <tr><td width="25%">�Զ�����ĸ��ʣ�</td>
            <td><?php echo CHtml::textField('auto_public_precent',$auto_public_precent,array('size'=>4,'style'=>'text-align:center;'));?> ��֮һ
            <font color=red>(����Զ��������ڼ�����ǰ��ʱ�䣬�ɵ�С����)</font></td></tr>
          <tr><td width="25%">�������Զ�����ĵ�����ʷ�¼�����</td>
            <td><?php echo CHtml::textField('auto_public',$auto_public,array('size'=>8,'readonly'=>'readonly'));?> ƪ</td></tr>
          <tr><td width="25%"></td><td><input type="submit" class="button"  value="����������վ����"/></td></tr>
          </tbody>
          
          
          <thead><tr><th colspan="2">��վ�������<a name="adset"></a> <font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></th></tr></thead>
          <tbody>  
          <tr><td width="25%">ȫվ�������Ϲ�棺<br />234*60 �� 468*60</td>
            <td><?php echo CHtml::textArea('ad_web_navtop',$ad_web_navtop,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">ȫվ����������棺</td>
            <td><?php echo CHtml::textArea('ad_web_tanchuang',$ad_web_tanchuang,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">ȫվ���߶�����棺</td>
            <td width="100%"><?php echo CHtml::textArea('ad_web_duilian',$ad_web_duilian,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">ȫվС��ͨ(��ҳ�������)��<br /><684*����߶�</td>
            <td><?php echo CHtml::textArea('ad_web_middle_new',$ad_web_middle_new,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">ȫվ��ͨ(��ҳ�·�����ͨ)��<br />970*����߶�</td>
            <td><?php echo CHtml::textArea('ad_web_mid_down',$ad_web_mid_down,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">������������棺<br />��<=250px * ����߶�</td>
            <td><?php echo CHtml::textArea('ad_list_main',$ad_list_main,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">�����Ŀ���·���棺<br />��<=600px * ����߶�</td>
            <td><?php echo CHtml::textArea('ad_irt_downtitle',$ad_irt_downtitle,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">�����б������·���棺<br />��<=580px * ����߶�</td>
            <td><?php echo CHtml::textArea('ad_irt_pinglun',$ad_irt_pinglun,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%"></td><td><input type="submit" class="button"  value="����������վ����"/></td></tr>
		  </tbody>
          
     </table>
</form> 

<!--�б����-->
     </td></tr>
</table>