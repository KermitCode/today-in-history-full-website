$(function() {
	var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
	var len = $("#focus ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	
	//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
	var btn = "<div class='btnBg'></div><div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	$("#focus").append(btn);
	$("#focus .btnBg").css("opacity",0.5);

	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$("#focus .btn span").css("opacity",0.4).mouseover(function() {
		index = $("#focus .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseover");

	//上一页、下一页按钮透明度处理
	$("#focus .preNext").css("opacity",0.2).hover(function() {$(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {$(this).stop(true,false).animate({"opacity":"0.2"},300);});

	//上一页按钮
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//下一页按钮
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
	$("#focus ul").css("width",sWidth * (len));
	
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
		$("#focusmessage").html($("#focus img:eq("+index+")").attr("alt")).fadeIn('normal');
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
		
		}
});

$(function(){
/*add　favorite*/
$("#keep").click(function(){
  var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac')!=-1?'Command/Cmd': 'CTRL';
  if(document.all){window.external.addFavorite('http://www.mqwork.com', '明清我看历史网');}
   else if(window.sidebar){window.sidebar.addPanel('明清我看历史网', 'http://www.mqwork.com',"");}
   else{ alert('您可以通过快捷键' + ctrl + ' + D 加入到收藏夹');}
});

/*forseacrh*/
$("#keyword").focusin(function(){if($(this).val()=='Search:') $(this).val('');});
$("#keyword").focusout(function(){if($(this).val()=='') $(this).val('Search:');});
$("#go").click(function(){
	if($('#keyword').val()=='Search:'){alert('请输入关键词');return false;} 
	else document.formsearch.submit();
});

/*copy*/
$("#copys").click(function(){
clipboardData.setData('Text',document.getElementById("xtitle").innerText+"\r\n"+document.getElementById("xtext").innerText+"\r\n"+"历史上的今天网-每天都有历史:"+document.URL);
alert('复制成功');
});

});

/*设置cookies*/
function setCookie(c_name,value,expiredays){
	var exdate=new Date()
	exdate.setDate(exdate.getDate()+expiredays)
	document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}
/*取cookies*/
function getCookie(c_name){
	if (document.cookie.length>0){
	  c_start=document.cookie.indexOf(c_name + "=")
	  if (c_start!=-1)
		{ 
		c_start=c_start + c_name.length+1 
		c_end=document.cookie.indexOf(";",c_start)
		if (c_end==-1) c_end=document.cookie.length
		return unescape(document.cookie.substring(c_start,c_end))
		} 
	  }
	return ""
}

/*pinglun*/
function subpl(id,url){
	var plte=$("#plt").val();
	if(plte==''){alert('请填写评论内容(please write content)!');return false;}
	var name=$("#user").val();
	if(name!='') setCookie('name',name,365);
	if(plte=='正在提交(submitting)...'){alert('正在提交中(submitting,please wait)，请稍候...!');return false;}
	$("#plt").ajaxStart(function(){
		$("#plt").html('正在提交(submitting)...');});	
		$.post(url,{'id':id,'text':plte,'name':name,'month':thismonth,'day':thisday},		
		function(msgs){
			if(msgs.rs==1){var oldtext=$('#pllist').html();$('#pllist').html("<li><span class='litt'>"+name+"--"+msgs.tim+"-</span>"+plte+"</li>"+oldtext);}
			else if(msgs.rs==2){alert('请先登录(please login)');}
			else if(msgs.rs==3){alert('您这次评价得太多了，歇息歇息吧(too many comments)');}
			else if(msgs.rs==4){alert('评论内容中有敏感词，不能发表(bad words)!');}
			else{alert('评论失败(failed)!');} 
			$("#plt").html('');
		  },'json');
}

if(document.getElementById('user')){$('#user').val(getCookie('name'));}

document.oncontextmenu = function (event){
	if(window.event){
		event = window.event;
	}try{
		var the = event.srcElement;
		if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")){
			return false;
		}
		return true;
	}catch (e){
		return false; 
	} 
}