<?php

/*
 *filename:translate.php
 *message:for use
 *time:2012-12-31
 *author：kermit
----------------------------------------------------------------------------------------
*/

class Translate{
	
	public $value; 												//return value;
	
	public $url = "http://translate.google.com/translate_t";	//google api
	
public function __construct(){
	
	
	
	}
	
public function filterChar($text){

	$text=strip_tags($text);

	$text=htmlspecialchars_decode($text);

	return $text;
		
	}

public function dotranslate($text,$filter=false) {
	
	if($filter) $text=$this->filterChar($text);
	
	if(function_exists('file_get_contents')) $gphtml=$this->fileGetTran($text);
	
	else $gphtml=$this->postPage($this->url,$text);

	$start_char1='<span id=result_box class="long_text">';
	
	$start_char2='<span id=result_box class="short_text">';
	
	$str_pos=strpos($gphtml,$start_char1);

	if($str_pos===false){
		
		$str_pos=strpos($gphtml,$start_char2);
		
		$str_length=strlen($start_char2);
		
	}else{
		
		$str_length=strlen($start_char1);
		
		} 
		
	$start_pos=$str_pos+$str_length;
	
	$end_char='</span></div></div><div id=spell-place-holder style="display:none"></div><div id=gt-res-tools><div id=gt-res-tools-l>';
	
	$length=strpos($gphtml,$end_char)-$start_pos;
	
	$out = substr($gphtml,$start_pos,$length);

 	return strip_tags($out);

}

public function fileGetTran($text){ 
	
	$wf=file_get_contents('http://translate.google.cn/translate_t?hl=zh-CN&langpair=zh-CN|en&text='.urlencode($text).'#');
		
	return $wf;

} 

public function postPage($url, $text) {

	 $html ='';
	
	 if($url != "" && $text != "") {
	
		 $ch = curl_init($url);
		
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		 curl_setopt($ch, CURLOPT_HEADER, 1);
		
		 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		
		 curl_setopt($ch, CURLOPT_TIMEOUT, 15);

		/*	
		*langpair – src lang to dest lang
		 *ie – urlencode的编码方式?
		 *text – 要翻译的文本
		*/
	
		 $fields = array('hl=zh-CN', 'langpair=zh-CN|en', 'ie=gb2312','text='.urlencode(mb_convert_encoding($text,'UTF-8','GB2312')));
		
		 curl_setopt($ch, CURLOPT_POST, 1);
		
		 curl_setopt($ch, CURLOPT_POSTFIELDS, implode('&', $fields));
		
		 $html = curl_exec($ch);
		
		 if(curl_errno($ch)) $html = "";
		
		 curl_close ($ch);
	
	 }
	
	 return $html;
	
	}

	
}//enc class


?>