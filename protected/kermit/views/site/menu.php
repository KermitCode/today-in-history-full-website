<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="StyleSheet" href="<?php echo Yii::app()->baseUrl;?>/images/backend/dtree.css" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/images/backend/menu.js"></script>
</head>
<body style="background-color:#FFFFFF;margin:0;">
<script type="text/javascript">
d = new dTree('d');
d.add(0,-1,'&nbsp;��̨����˵�','','<?php echo Yii::app()->baseUrl;?>/images/backend/daohang.jpg');

d.add(1,0,'&nbsp;��̨����̨','<?php echo $this->createUrl('site/control');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/qy.png');
d.add(2,0,'&nbsp;�����������ü�¼','<?php echo $this->createUrl('HisSprider/index');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/qy.png');
d.add(3,0,'&nbsp;ƽ̨ϵͳ����','','<?php echo Yii::app()->baseUrl;?>/images/backend/cog.png','<?php echo Yii::app()->baseUrl;?>/images/backend/cog.png');
d.add(20,3,'&nbsp;������Ϣ����','<?php echo $this->createUrl('HisSystem/webset');?>');
d.add(19,3,'&nbsp;��ȫ����','<?php echo $this->createUrl('HisSystem/webset');?>#safeset');
d.add(18,3,'&nbsp;��ʾ����','<?php echo $this->createUrl('HisSystem/webset');?>#viewset');
d.add(17,3,'&nbsp;�Զ���������','<?php echo $this->createUrl('HisSystem/webset');?>#autoset');
d.add(16,3,'&nbsp;������� ','<?php echo $this->createUrl('HisSystem/webset');?>#adset');

d.add(4,0,'&nbsp;��ʷ�Ͻ������','','<?php echo Yii::app()->baseUrl;?>/images/backend/m_news.gif','<?php echo Yii::app()->baseUrl;?>/images/backend/m_news.gif');
d.add(15,4,'&nbsp;��ʷ�¼��б�','<?php echo $this->createUrl('HisMain/index');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/send.jpg');
d.add(14,4,'&nbsp;��������ʷ�¼�','<?php echo $this->createUrl('HisMain/create');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/send.jpg');

d.add(5,0,'&nbsp;���ջ������','<?php echo $this->createUrl('HisBrith/index');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/xiaofeisub.gif');
d.add(6,0,'&nbsp;�����������','<?php echo $this->createUrl('HisXingzuo/index');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/edit.jpg');
d.add(7,0,'&nbsp;�������ӹ���','','<?php echo Yii::app()->baseUrl;?>/images/backend/grid.png','<?php echo Yii::app()->baseUrl;?>/images/backend/base1.gif');
d.add(13,7,'&nbsp;�����б�','<?php echo $this->createUrl('HisLink/index');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/02780.gif');
d.add(12,7,'&nbsp;��������','<?php echo $this->createUrl('HisLink/create');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/02780.gif');

d.add(8,0,'&nbsp;�����б�','<?php echo $this->createUrl('HisPinglun/index');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/xiaofeisub.gif');
d.add(8,0,'&nbsp;���ʾ����б�','<?php echo $this->createUrl('HisErrors/index');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/xiaofei.jpg');
d.add(9,0,'&nbsp;���ݱ�ṹ','<?php echo $this->createUrl('HisSprider/table');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/m_news.gif');
d.add(10,0,'&nbsp;����Ա��������','<?php echo $this->createUrl('HisSystem/index');?>','<?php echo Yii::app()->baseUrl;?>/images/backend/grid.png');
document.write(d);
</script>
</body>
</html>
