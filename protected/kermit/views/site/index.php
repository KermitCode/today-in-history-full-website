<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>历史上的今天-后台管理</TITLE>
<META content="text/html; charset=gb2312" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="<?php echo Yii::app()->baseUrl;?>/images/backend/reset.css" media=screen>
<LINK rel=stylesheet type=text/css href="<?php echo Yii::app()->baseUrl;?>/images/backend/index.css" media=screen>

<SCRIPT type=text/javascript src="<?php echo Yii::app()->baseUrl;?>/images/backend/jquery-1.3.2.min.js"></SCRIPT>
<!--
<LINK rel=stylesheet type=text/css href="<?php echo Yii::app()->baseUrl;?>/images/backend/invalid.css" media=screen>
<SCRIPT type=text/javascript src="<?php echo Yii::app()->baseUrl;?>/images/backend/simpla.jquery.configuration.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo Yii::app()->baseUrl;?>/images/backend/jquery.wysiwyg.js"></SCRIPT>
<LINK rel=stylesheet type=text/css href="<?php echo Yii::app()->baseUrl;?>/images/backend/jquery_dialog.css">
<SCRIPT type=text/javascript src="<?php echo Yii::app()->baseUrl;?>/images/backend/jquery_dialog.js"></SCRIPT>
-->

<!--[if IE]>
<SCRIPT type=text/javascript src="系统首页_files/jquery.bgiframe.js"></SCRIPT>
<![endif]--><!--[if IE 6]>
    <script type="text/javascript" src="scripts/DD_belatedPNG_0.0.7a.js"></script>
<![endif]-->
<SCRIPT>
function logoutsys() { //用户退出登录
		if (!confirm('您确实要退出系统吗？')) {
			return;
		}
		location.href = '<?php echo $this->createUrl('Site/Logout');?>';
	}
function show5() {
    if (!document.layers && !document.all) {
        return 
    }
    var Digital = new Date();
    var years = Digital.getYear();
    var months = Digital.getUTCMonth() + 1;
    var days = Digital.getDate();
    var hours = Digital.getHours();
    var minutes = Digital.getMinutes();
    var seconds = Digital.getSeconds();
    var dn = "上午";
    if (hours > 12) {
        dn = "下午"
        hours = hours - 12;
    }
    if (hours == 0) {
        hours = 12;
    }
    if (minutes <= 9) {
        minutes = "0" + minutes;
    }
    if (seconds <= 9) {
        seconds = "0" + seconds;}
        
    var myclock = "<font color='#333333'>当前时间:" + years + "-" + months + "-" + days + " " + hours + ":" + minutes + ":" + seconds + " " + dn + "</font>";
    
    if (document.layers) {
        document.layers.liveclock.document.write(myclock);
        document.layers.liveclock.document.close();
    } else if (document.all) {
        document.getElementById("liveclock").innerHTML = myclock;
    }
    setTimeout("show5()", 1000);
}
</SCRIPT>

<STYLE type=text/css>#infozone {
	WIDTH: 300px; HEIGHT: 30px; COLOR: #aa6; FONT-SIZE: 12px; OVERFLOW: hidden
}
#infozone DIV {
	LINE-HEIGHT: 26px; WHITE-SPACE: nowrap; HEIGHT: 30px; OVERFLOW: hidden
}
</STYLE>

<META name=GENERATOR content="MSHTML 8.00.6001.19088"></HEAD>
<BODY style="BACKGROUND-COLOR: #eaf7ff">
<DIV class=body_header>
<DIV class=header_left>
<H1 class=header_logo><A><IMG id=logo src="<?php echo Yii::app()->baseUrl;?>/images/backend/logo.jpg"></A></H1></DIV>
<DIV style="MARGIN-RIGHT: 10px" class=shortcut-buttons-set><IMG title=退出系统 onclick=logoutsys() alt=退出系统 src="<?php echo Yii::app()->baseUrl;?>/images/backend/layout.jpg"> </DIV>
<DIV class=shortcut-buttons-set><a href="http://www.mqwork.com" target="_blank"><IMG title=系统首页 onclick=enterindex() alt=平台首页 src="<?php echo Yii::app()->baseUrl;?>/images/backend/index.jpg"></a> </DIV>
<DIV id=profile-links>
<DIV id=usertip>当前登陆 : <?php echo Yii::app()->session['admin'];?></DIV>
<DIV id=smstip>用户身份 : <?php if(Yii::app()->session['admin']=='adminer') echo '超级管理员';
		elseif(Yii::app()->session['admin']=='admin') echo '网站管理员';
		else echo '后台浏览者';?></DIV></DIV></DIV>
<DIV id=body-wrapper>
<DIV id=left>
<DIV id=menutop><IMG border=0 src="<?php echo Yii::app()->baseUrl;?>/images/backend/menu-ico.jpg"> 后台管理菜单</DIV>
<DIV id=menubg>
<IFRAME id=leftFrame onload="Javascript:SetCwinHeight('leftFrame')" src="<?php echo $this->createUrl('Site/menu');?>" frameBorder=0 name=leftFrame scrolling=auto></IFRAME></DIV></DIV>
<DIV id=main><IFRAME style="BORDER-BOTTOM: #c0dcf2 1px solid; BORDER-LEFT: #c0dcf2 1px solid; BORDER-TOP: #c0dcf2 1px solid; BORDER-RIGHT: #c0dcf2 1px solid" 
id=mainFrame onload="Javascript:SetCwinHeight('mainFrame')" src="<?php echo $this->createUrl('Site/Control');?>" frameBorder=0 name=mainFrame scrolling=auto></IFRAME></DIV></DIV>
<DIV id=bottom-tip>
<DIV style="WIDTH: 750px" class=middle>
<DIV id=infozone>
<DIV style="WIDTH: 240px; FLOAT: left" id=liveclock></DIV>
<DIV style="WIDTH: 140px; BACKGROUND: url(pics/buttonright.jpg) no-repeat; FLOAT: right"></DIV></DIV>
<SCRIPT>
    show5();
	function SetCwinHeight(divid) {
		var cwin = document.getElementById(divid);
		if (document.getElementById) {
			if (cwin && !window.opera) {
				if (cwin.contentDocument && cwin.contentDocument.body.offsetHeight) {
					cwin.height = cwin.contentDocument.body.offsetHeight;
				}
				else if (cwin.Document && cwin.Document.body.scrollHeight) {
					cwin.height = cwin.Document.body.scrollHeight;
				}
			}
		}
	}
	function locationhref(url) {
		    window.frames['mainFrame'].location = url;
		    JqueryDialog.Close();
	    }
	    function closeDialog() {
		    JqueryDialog.Close();
    }

	document.getElementById("left").style.height = document.documentElement.clientHeight-127+"px";
	document.getElementById("leftFrame").style.height = document.documentElement.clientHeight-175+"px";
	document.getElementById("main").style.height = document.documentElement.clientHeight-127+"px";
	document.getElementById("mainFrame").style.height = document.documentElement.clientHeight-127+"px";
	document.getElementById("left").style.width = 200+"px";
	document.getElementById("leftFrame").style.width = 170+"px";
	document.getElementById("main").style.width = document.documentElement.clientWidth - 221+"px";
	document.getElementById("mainFrame").style.width = document.documentElement.clientWidth-221+"px";
	window.onresize = function() {
		document.getElementById("left").style.height = document.documentElement.clientHeight-127+"px";
		document.getElementById("leftFrame").style.height = document.documentElement.clientHeight-175+"px";
		document.getElementById("main").style.height = document.documentElement.clientHeight-127+"px";
		document.getElementById("mainFrame").style.height = document.documentElement.clientHeight-127+"px";
		document.getElementById("left").style.width = 200+"px";
		document.getElementById("leftFrame").style.width = 170+"px";
		document.getElementById("main").style.width = document.documentElement.clientWidth - 221+"px";
		document.getElementById("mainFrame").style.width = document.documentElement.clientWidth-221+"px";
		
    }

    function scrollup(o, d, c) {
        if (document.all) {
            if (d == c) {
                var t = o.firstChild.cloneNode(true);
                o.removeChild(o.firstChild);
                o.appendChild(t);
                t.style.marginTop = o.firstChild.style.marginTop = '0px';
            }
            else {
                var s = 3, c = c + s, l = (c >= d ? c - d : 0);
                o.firstChild.style.marginTop = -c + l + 'px';
                window.setTimeout(function() { scrollup(o, d, c - l) }, 100);
            }
        }
        else {
            if (d == c) {
                var t = o.childNodes[1].cloneNode(true);
                o.removeChild(o.childNodes[1]);
                o.appendChild(t);
                t.style.marginTop = o.childNodes[1].style.marginTop = '0px';
            }
            else {
                var s = 3, c = c + s, l = (c >= d ? c - d : 0);
                o.childNodes[1].style.marginTop = -c + l + 'px';
                window.setTimeout(function() { scrollup(o, d, c - l) }, 100);
            }
        }
    }
    var o = document.getElementById('infozone');
    window.setInterval(function() { scrollup(o, 20, 0); }, 5000);
</SCRIPT>
<DIV id=winpop>
<DIV class=title>消息提示<SPAN class=closeTip onclick=closeTip()>X</SPAN></DIV>
<DIV id=showContent class=con></DIV></DIV>
<SCRIPT language=javascript type=text/javascript>
	function changeH(str) {
		var MsgPop = document.getElementById("winpop");
		var popH = parseInt(MsgPop.style.height);
		if (str == "up") {
			if (popH <= 100) {
				MsgPop.style.height = (popH + 4).toString() + "px";
			}
			else {
				clearInterval(show);
			}
		}
		if (str == "down") {
			if (popH >= 4) {
				MsgPop.style.height = (popH - 4).toString() + "px";
			}
			else {
				clearInterval(hide);
				MsgPop.style.display = "none";
				$("#showplay").html("");
			}
		}
	}
	window.onload = function() {
		document.getElementById('winpop').style.height = '0px';
	}
	function closeTip() {
	    hide = setInterval("changeH('down')", 2); //开始以每0.002秒调用函数changeH("up"),即每0.002秒向上移动一次
	}
</SCRIPT>
</BODY></HTML>
