<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD><TITLE>��ʷ�ϵĽ���-��̨����</TITLE>
<META content="text/html; charset=gbk" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="<?php echo Yii::app()->baseUrl;?>/images/backend/login.css" media=screen>
<SCRIPT type=text/javascript src="<?php echo Yii::app()->baseUrl;?>/images/backend/jquery-1.3.2.min.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo Yii::app()->baseUrl;?>/images/backend/jquery.cookie.js"></SCRIPT>
<!--[if IE 6]>
    <script type="text/javascript" src="scripts/DD_belatedPNG_0.0.7a.js"></script>
<![endif]-->
<META name=GENERATOR content="MSHTML 8.00.6001.19088"></HEAD>
<BODY class=bg>
<DIV class=loginmian></DIV>
<DIV style="MARGIN: -55px auto 0px; WIDTH: 1024px; HEIGHT: 231px">
<DIV></DIV>
<DIV class=logininner>
<DIV id=logintip></DIV>
<DIV class=login><!-- 
	����form�����ǵ�½���������ģ��滻�������ݶ����ԡ����ǲ������ƺ;���Ĳ�����Ҫ���ˡ�
	ע������ע��������ϸ�ļ�����룬
	��һ����½��ť���룬
	�����ע���û�����Ҫ����̨��ϣ������޷������ã���̨�����ÿ������벻Ҫ�������ť
	�������һ����빦���������У��벻Ҫ�á�
	Ȼ����������ʽ������ҳ�沼�֣����Լ��������ɡ�
	 -->
<FORM id=login_form onSubmit="return sub();" method=post name=login_form action="<?php echo $this->createUrl('Site/login'); ?>">
<DIV style="LINE-HEIGHT: 35px; HEIGHT: 35px"><LABEL>�û���</LABEL> <INPUT 
id=account class=text-input type=text name=account value="admin"> </DIV>
<DIV style="LINE-HEIGHT: 35px; HEIGHT: 35px"><LABEL>�ܡ���</LABEL> <INPUT 
id=password class=text-input type=password name=password> </DIV>
<DIV style="LINE-HEIGHT: 35px; HEIGHT: 35px"><LABEL>��֤��</LABEL> <INPUT id=code 
class="text-input text_auth" maxLength=4 type=text name=code><LABEL 
class=img_auth> <?php 
$this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'�����ͼ','style'=>'cursor:pointer'))); ?></LABEL> 
</DIV>
<DIV style="LINE-HEIGHT: 30px;margin-top:8px; HEIGHT: 30px;"><LABEL>&nbsp;</LABEL>
<LABEL>
<INPUT id=action value=login type=hidden name=action> 
<INPUT style="WIDTH:150px;border:1px solid #ccc;" class=buttonsubmit value="�����¼��̨����ϵͳ" type=submit>
</LABEL> 
<!--<INPUT style="WIDTH: 15px" id=rememberme type=checkbox name=rememberme>��ס��¼</LABEL>-->
</DIV>
</FORM></DIV></DIV>
<DIV></DIV></DIV>
<SCRIPT language=javascript type=text/javascript>
    //��ʼ��ҳ��ʱ��֤�Ƿ��ס������
    $(document).ready(function () {
        if ($.cookie("rememberme") == "true") {
            $("#rememberme").attr("checked", true);
            $("#account").val($.cookie("account"));
            $("#password").val($.cookie("password"));
        }
    });
	function sub() {    
	    var account = $("#account").val();
	    if (account == "") {
	        $("#logintip").html("����Ա�˺Ų���Ϊ��!");	        
	        return false;
	    } 
	    var password = $("#password").val();
	    if (password == "") {
	        $("#logintip").html("��¼���벻��Ϊ��!");
	        return false;
	    }
	    var code = $("#code").val();
	    if (code == "" || code == "����鿴") {
	        $("#logintip").html("��֤�벻��Ϊ��!");
	        return false;
	    }
	    try {
	        if ($("#rememberme").attr("checked") == true) {
	            //var account = $("#account").val();
	           // var password = $("#password").val();
	           // $.cookie("rememberme", "true", { expires: 7 }); // �洢һ����7�����޵� cookie
	           // $.cookie("account", account, { expires: 7 }); // �洢һ����7�����޵� cookie
	            //$.cookie("password", password, { expires: 7 }); // �洢һ����7�����޵� cookie
	        }
	        else {
	           // $.cookie("rememberme", "false", { expires: -1 });
	           // $.cookie("account", '', { expires: -1 });
	           // $.cookie("password", '', { expires: -1 });
	        }
	    } catch (e) {
	        //alert(e.Description);
	    }
	    return true;
	}

	function freshimg(obj) { 
        
    }
</SCRIPT>
</BODY></HTML>
