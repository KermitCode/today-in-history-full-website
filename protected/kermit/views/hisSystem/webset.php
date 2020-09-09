<style type="text/css">
textarea{border:1px solid #6E9FDE;}
</style>
<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>平台系统管理</div></div>
<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >
<?php foreach($rs as $key=>$value){ 
		if($key=='adminer_pass' || $key=='superadmin_pass' || $key=='adtest_pass') continue;
		$$key=$value;
		}
		?>   
<!--列表开始-->
<form action="<?php echo $this->createUrl('HisSystem/webset',array('modify'=>'modify'));?>" method="post" name="webset" id="webset">     
      <table width="100%">
		  <thead><tr><th colspan="2">基本信息设置<a name="baseset"></a><font color=red>(所有空项不能含有'号，全部使用"号代替)</font></th></tr></thead>
          <tbody>
          <tr><td width="25%">网站是否打开：</td>
             <td><?php echo CHtml::radiobuttonlist('web_open',$web_open,array(1=>'是',0=>'否'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">网站如果关闭提示用户信息：</td>
            <td><?php echo CHtml::textArea('web_close_words',$web_close_words,array('rows'=>3,'cols'=>70));?></td></tr>
          <tr><td width="25%">网站名称：</td>
            <td><?php echo CHtml::textField('web_name',$web_name,array('size'=>30));?></td></tr>
          <tr><td width="25%">网站域名地址(http://www.domain.com)：</td>
            <td><?php echo CHtml::textField('web_url',$web_url,array('size'=>30));?></td></tr>
          <tr><td width="25%">网站关键词：</td>
            <td><?php echo CHtml::textArea('web_keyword',$web_keyword,array('rows'=>3,'cols'=>90));?></td></tr>
           <tr><td width="25%">英文关键词：</td>
            <td><?php echo CHtml::textArea('index_class_arr',$index_class_arr,array('rows'=>3,'cols'=>90));?></td></tr>
          <tr><td width="25%">网站描述：</td>
            <td><?php echo CHtml::textArea('web_description',$web_description,array('rows'=>4,'cols'=>90));?></td></tr>
          <tr><td width="25%">英文网站描述：</td>
            <td><?php echo CHtml::textArea('image_pagenum',$image_pagenum,array('rows'=>4,'cols'=>90));?></td></tr>
           <tr><td width="25%">网站统计代码：</td>
            <td><?php echo CHtml::textArea('web_stat',$web_stat,array('rows'=>4,'cols'=>90));?></td></tr>
          <tr><td width="25%">网站备案号：</td>
            <td><?php echo CHtml::textField('web_beian',$web_beian,array('size'=>30));?></td></tr>
          <tr><td width="25%">搜索引擎间隔多少时间记录一次：</td>
            <td><?php echo CHtml::textField('sprider_time',$sprider_time,array('size'=>5));?> 小时</td></tr>
          <tr><td width="25%">搜索引擎访问记录最多保存条数：</td>
            <td><?php echo CHtml::textField('sprider_num',$sprider_num,array('size'=>6));?> 条</td></tr>
          <tr><td width="25%"></td>
            <td><input type="submit" class="button"  value="保存所有网站设置"/></td></tr>
          </tbody>
          
          <thead><tr><th colspan="2">网站安全设置<a name="safeset"></a><font color=red>(所有空项不能含有'号，全部使用"号代替)</font></th></tr></thead>
 		  <tbody>
          <tr><td width="25%">网站报错设置：</td>
            <td><?php echo CHtml::radiobuttonlist('web_error',$web_error,array(1=>'网站开发模式',0=>'网站运营模式'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">禁止访问IP列表</td>
            <td><?php echo CHtml::textArea('no_ips',$no_ips,array('rows'=>4,'cols'=>90));?></td></tr>
          <tr><td width="25%">禁止IP的处理办法</td>
            <td><?php echo CHtml::radiobuttonlist('no_ips_do',$no_ips_do,array(1=>'致死浏览器',0=>'展示空白页'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">是否打开网站防刷屏功能：</td>
            <td><?php echo CHtml::radiobuttonlist('web_fangshuaxin',$web_fangshuaxin,array(1=>'是',0=>'否'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">间隔多少毫秒访问算刷屏：</td>
            <td><?php echo CHtml::textField('web_fangshuapin',$web_fangshuapin,array('size'=>6));?> 毫秒</td></tr>
          <tr><td width="25%">连续刷屏几次后提示用户访问过于频繁：</td>
            <td><?php echo CHtml::textField('web_shuapin_num',$web_shuapin_num,array('size'=>6));?> 次</td></tr>
          <tr><td width="25%">对刷屏者提示用户几分钟后再访问：</td>
            <td><?php echo CHtml::textField('web_shuapin_time',$web_shuapin_time,array('size'=>6));?> 分钟</td></tr>
           <tr><td width="25%">提示刷屏几次把用户IP加入禁止IP：</td>
            <td><?php echo CHtml::textField('web_shua_times_jinip',$web_shua_times_jinip,array('size'=>6));?> 次</td></tr>
          <tr>
          	<td width="25%"></td><td><input type="submit" class="button"  value="保存所有网站设置"/></td>
          </tr>
     	  </tbody>
     
          <thead><tr><th colspan="2">页面显示设置<a name="viewset"></a> <font color=red>(所有空项不能含有'号，全部使用"号代替)</font></th></tr></thead>
		  <tbody>
          <tr><td width="25%">评价是否需要审核：</td>
            <td><?php echo CHtml::radiobuttonlist('pingjia_right',$pingjia_right,array(1=>'是',0=>'否'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">每次登录最多能评价多少条：</td>
            <td><?php echo CHtml::textField('pingjia_most',$pingjia_most,array('size'=>6));?> 条</td></tr>
           <tr><td width="25%">违规关键词的处理办法：</td>
            <td><?php echo CHtml::radiobuttonlist('bad_words_do',$bad_words_do,array(1=>'去除',2=>'用***号替代',3=>'阻止操作'),array('separator'=>'&nbsp;&nbsp;'));?></td></tr>
          <tr><td width="25%">违规关键词列表：</td>
            <td><?php echo CHtml::textArea('bad_words',$bad_words,array('rows'=>4,'cols'=>70));?></td></tr>
          <tr><td width="25%">首页随缘花语缓存时间：</td>
            <td><?php echo CHtml::textField('stat_day_cachetime',$stat_day_cachetime,array('size'=>6));?> 小时</td></tr>
          <tr><td width="25%">首页随缘星座缓存时间：</td>
            <td><?php echo CHtml::textField('stat_all_cachetime',$stat_all_cachetime,array('size'=>6));?> 小时</td></tr>
          <tr><td width="25%"></td>
            <td><input type="submit" class="button"  value="保存所有网站设置"/></td></tr>
          </tbody>
          
          
          <thead><tr><th colspan="2">自动发表配置<a name="autoset"></a> <font color=red>(所有空项不能含有'号，全部使用"号代替)</font></th></tr></thead>
          <tbody>
          <tr><td width="25%">每天自动发布当天历史事件数：</td>
            <td><?php echo CHtml::textField('auto_public_num',$auto_public_num,array('size'=>8));?> 篇 （"0"即为关闭文字笑话自动发表）</td></tr>
          <tr><td width="25%">自动发表的最新当日日期：</td>
            <td><?php echo CHtml::textField('auto_public_day',$auto_public_day,array('size'=>15,'readonly'=>'readonly'));?></td></tr>
          <tr><td width="25%">自动发表的概率：</td>
            <td><?php echo CHtml::textField('auto_public_precent',$auto_public_precent,array('size'=>4,'style'=>'text-align:center;'));?> 分之一
            <font color=red>(如果自动发布过于集中于前段时间，可调小概率)</font></td></tr>
          <tr><td width="25%">当日已自动发表的当天历史事件数：</td>
            <td><?php echo CHtml::textField('auto_public',$auto_public,array('size'=>8,'readonly'=>'readonly'));?> 篇</td></tr>
          <tr><td width="25%"></td><td><input type="submit" class="button"  value="保存所有网站设置"/></td></tr>
          </tbody>
          
          
          <thead><tr><th colspan="2">整站广告配置<a name="adset"></a> <font color=red>(所有空项不能含有'号，全部使用"号代替)</font></th></tr></thead>
          <tbody>  
          <tr><td width="25%">全站导航条上广告：<br />234*60 或 468*60</td>
            <td><?php echo CHtml::textArea('ad_web_navtop',$ad_web_navtop,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">全站悬浮弹窗广告：</td>
            <td><?php echo CHtml::textArea('ad_web_tanchuang',$ad_web_tanchuang,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">全站两边对联广告：</td>
            <td width="100%"><?php echo CHtml::textArea('ad_web_duilian',$ad_web_duilian,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">全站小中通(内页主侧边下)：<br /><684*任意高度</td>
            <td><?php echo CHtml::textArea('ad_web_middle_new',$ad_web_middle_new,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">全站中通(首页下方大中通)：<br />970*任意高度</td>
            <td><?php echo CHtml::textArea('ad_web_mid_down',$ad_web_mid_down,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">日历框下主广告：<br />宽<=250px * 任意高度</td>
            <td><?php echo CHtml::textArea('ad_list_main',$ad_list_main,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">侧边栏目最下方广告：<br />宽<=600px * 任意高度</td>
            <td><?php echo CHtml::textArea('ad_irt_downtitle',$ad_irt_downtitle,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%">评论列表文字下方广告：<br />宽<=580px * 任意高度</td>
            <td><?php echo CHtml::textArea('ad_irt_pinglun',$ad_irt_pinglun,array('rows'=>3,'cols'=>'100%'));?></td></tr>
          <tr><td width="25%"></td><td><input type="submit" class="button"  value="保存所有网站设置"/></td></tr>
		  </tbody>
          
     </table>
</form> 

<!--列表结束-->
     </td></tr>
</table>