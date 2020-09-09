<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD><TITLE>历史上的今天-后台管理</TITLE>
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
	以下form内容是登陆入口所必须的，替换所有内容都可以。但是参数名称和具体的参数不要丢了。
	注意以下注册内容仔细的检查填入，
	其一：登陆按钮必须，
	其二：注册用户必须要跟后台配合，否则无法起作用，后台不配置开启，请不要打开这个按钮
	其三：找回密码功能在完善中，请不要用。
	然后：其他的样式和整体页面布局，请自己做主即可。
	 -->
<FORM id=login_form onSubmit="return sub();" method=post name=login_form action="<?php echo $this->createUrl('Site/login'); ?>">
<DIV style="LINE-HEIGHT: 35px; HEIGHT: 35px"><LABEL>用户名</LABEL> <INPUT 
id=account class=text-input type=text name=account value="admin"> </DIV>
<DIV style="LINE-HEIGHT: 35px; HEIGHT: 35px"><LABEL>密　码</LABEL> <INPUT 
id=password class=text-input type=password name=password> </DIV>
<DIV style="LINE-HEIGHT: 35px; HEIGHT: 35px"><LABEL>验证码</LABEL> <INPUT id=code 
class="text-input text_auth" maxLength=4 type=text name=code><LABEL 
class=img_auth> <?php 
$this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','style'=>'cursor:pointer'))); ?></LABEL> 
</DIV>
<DIV style="LINE-HEIGHT: 30px;margin-top:8px; HEIGHT: 30px;"><LABEL>&nbsp;</LABEL>
<LABEL>
<INPUT id=action value=login type=hidden name=action> 
<INPUT style="WIDTH:150px;border:1px solid #ccc;" class=buttonsubmit value="点击登录后台管理系统" type=submit>
</LABEL> 
<!--<INPUT style="WIDTH: 15px" id=rememberme type=checkbox name=rememberme>记住登录</LABEL>-->
</DIV>
</FORM></DIV></DIV>
<DIV></DIV></DIV>
<SCRIPT language=javascript type=text/javascript>
    //初始化页面时验证是否记住了密码
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
	        $("#logintip").html("管理员账号不能为空!");	        
	        return false;
	    } 
	    var password = $("#password").val();
	    if (password == "") {
	        $("#logintip").html("登录密码不能为空!");
	        return false;
	    }
	    var code = $("#code").val();
	    if (code == "" || code == "点击查看") {
	        $("#logintip").html("验证码不能为空!");
	        return false;
	    }
	    try {
	        if ($("#rememberme").attr("checked") == true) {
	            //var account = $("#account").val();
	           // var password = $("#password").val();
	           // $.cookie("rememberme", "true", { expires: 7 }); // 存储一个带7天期限的 cookie
	           // $.cookie("account", account, { expires: 7 }); // 存储一个带7天期限的 cookie
	            //$.cookie("password", password, { expires: 7 }); // 存储一个带7天期限的 cookie
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
