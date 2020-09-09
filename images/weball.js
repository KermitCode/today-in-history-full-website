$(function() {
	var sWidth = $("#focus").width(); //��ȡ����ͼ�Ŀ�ȣ���ʾ�����
	var len = $("#focus ul li").length; //��ȡ����ͼ����
	var index = 0;
	var picTimer;
	
	//���´���������ְ�ť�Ͱ�ť��İ�͸������������һҳ����һҳ������ť
	var btn = "<div class='btnBg'></div><div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	$("#focus").append(btn);
	$("#focus .btnBg").css("opacity",0.5);

	//ΪС��ť�����껬���¼�������ʾ��Ӧ������
	$("#focus .btn span").css("opacity",0.4).mouseover(function() {
		index = $("#focus .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseover");

	//��һҳ����һҳ��ť͸���ȴ���
	$("#focus .preNext").css("opacity",0.2).hover(function() {$(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {$(this).stop(true,false).animate({"opacity":"0.2"},300);});

	//��һҳ��ť
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//��һҳ��ť
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//����Ϊ���ҹ�����������liԪ�ض�����ͬһ�����󸡶�������������Ҫ�������ΧulԪ�صĿ��
	$("#focus ul").css("width",sWidth * (len));
	
	//��껬�Ͻ���ͼʱֹͣ�Զ����ţ�����ʱ��ʼ�Զ�����
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //��4000�����Զ����ŵļ������λ������
	}).trigger("mouseleave");
	
	//��ʾͼƬ���������ݽ��յ�indexֵ��ʾ��Ӧ������
	function showPics(index) { //��ͨ�л�
		var nowLeft = -index*sWidth; //����indexֵ����ulԪ�ص�leftֵ
		$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //ͨ��animate()����ulԪ�ع������������position
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //Ϊ��ǰ�İ�ť�л���ѡ�е�Ч��
		$("#focusmessage").html($("#focus img:eq("+index+")").attr("alt")).fadeIn('normal');
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //Ϊ��ǰ�İ�ť�л���ѡ�е�Ч��
		
		}
});

$(function(){
/*add��favorite*/
$("#keep").click(function(){
  var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac')!=-1?'Command/Cmd': 'CTRL';
  if(document.all){window.external.addFavorite('http://www.mqwork.com', '�����ҿ���ʷ��');}
   else if(window.sidebar){window.sidebar.addPanel('�����ҿ���ʷ��', 'http://www.mqwork.com',"");}
   else{ alert('������ͨ����ݼ�' + ctrl + ' + D ���뵽�ղؼ�');}
});

/*forseacrh*/
$("#keyword").focusin(function(){if($(this).val()=='Search:') $(this).val('');});
$("#keyword").focusout(function(){if($(this).val()=='') $(this).val('Search:');});
$("#go").click(function(){
	if($('#keyword').val()=='Search:'){alert('������ؼ���');return false;} 
	else document.formsearch.submit();
});

/*copy*/
$("#copys").click(function(){
clipboardData.setData('Text',document.getElementById("xtitle").innerText+"\r\n"+document.getElementById("xtext").innerText+"\r\n"+"��ʷ�ϵĽ�����-ÿ�춼����ʷ:"+document.URL);
alert('���Ƴɹ�');
});

});

/*����cookies*/
function setCookie(c_name,value,expiredays){
	var exdate=new Date()
	exdate.setDate(exdate.getDate()+expiredays)
	document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}
/*ȡcookies*/
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
	if(plte==''){alert('����д��������(please write content)!');return false;}
	var name=$("#user").val();
	if(name!='') setCookie('name',name,365);
	if(plte=='�����ύ(submitting)...'){alert('�����ύ��(submitting,please wait)�����Ժ�...!');return false;}
	$("#plt").ajaxStart(function(){
		$("#plt").html('�����ύ(submitting)...');});	
		$.post(url,{'id':id,'text':plte,'name':name,'month':thismonth,'day':thisday},		
		function(msgs){
			if(msgs.rs==1){var oldtext=$('#pllist').html();$('#pllist').html("<li><span class='litt'>"+name+"--"+msgs.tim+"-</span>"+plte+"</li>"+oldtext);}
			else if(msgs.rs==2){alert('���ȵ�¼(please login)');}
			else if(msgs.rs==3){alert('��������۵�̫���ˣ�ЪϢЪϢ��(too many comments)');}
			else if(msgs.rs==4){alert('���������������дʣ����ܷ���(bad words)!');}
			else{alert('����ʧ��(failed)!');} 
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