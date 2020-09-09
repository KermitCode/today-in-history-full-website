<?php
/*
maker:kermit
date:2012-11-3
notes:in Yii framework for help class
email:kermit2011@126.com
*/



class kermitBase{

/*******************************************************************************************/

	private $value;                          		  				//传递值
	
	public static $ip='';                             				//静态定义IP地址
	
/*******************************************************************************************/	

//1，alert message or show message page

public function __construct(){
	

	
	}

public function msg_show($message='',$url='',$refresh=''){

		if($refresh){
			
			if(!$message) exit("you have not set the message which you wang to show to the viewer");
			
			 //set time and not use alert method to show message	
				/*
				$content = addslashes(file_get_contents(ROOT_PATH."inc/message.html"));
				
				//require(ROOT_PATH."inc/message.html");$content=ob_get_contents();
				
				@ob_end_clean();
				
				$change_char=array('{{refresh}}','{{url}}','{{message}}','{{image}}');
				
				$changeto_char=array($refresh,$url,$message,$image);
				
				$content=str_replace($change_char,$changeto_char,$content);
				
				echo stripslashes($content);exit;
			*/
		}else{   
		
				if(!$url){
					
					 if(!$message) echo "<html><body><script language='javascript'>window.history.go(-1);</script></body></html>";
					 
					 else echo "<html><body><script language='javascript'>alert('$message');window.history.go(-1);</script></body></html>";
					 
					 exit;
			
				}else{
					 
					 if(!$message) echo "<html><body><script language='javascript'>window.location.href='$url';</script></body></html>";
					
					 echo "<html><body><script language='javascript'>alert('$message');window.location.href='$url';</script></body></html>";
			
					 exit;
					 
					 }
				
		}
	
}

public function jsOnly($message){

	 echo "<script language='javascript'>alert('$message');</script>";

}

//2，getuserIP function
	
public function getuserip(){
	
			if(self::$ip!='') return self::$ip;
	
			if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")){
				
					$ip = getenv("HTTP_CLIENT_IP");
				
			}elseif(getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")){
				
					$ip = getenv("HTTP_X_FORWARDED_FOR");
				
			}elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")){
				
					$ip = getenv("REMOTE_ADDR");
				
			}elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")){
				
					$ip = $_SERVER['REMOTE_ADDR'];
					
			}else{ 
			
					$ip = "unknown";
					
			}
			
			self::$ip=$ip;
				
			return $ip; 

}//end get ip address

//3，cut chinese char function

public function str_cut($string,$length,$dot = '...'){
	
		$strlen=strlen($string);
		 
		if($strlen<=$length) return $string; 
		 
		$strcut=''; 
		
		$dotlen = strlen($dot); 
			
		$maxi = $length - $dotlen - 1; 
			
		for($i=0;$i<$maxi;$i++){
				
		$strcut.=ord($string[$i])>127?$string[$i].$string[++$i]:$string[$i]; 

				}
		 
		return $strcut.$dot; 

} //end

//4,return datetime 

public function getTime($type='0',$time=0){
	
	switch($type){
		
		case 'ymdhis':return date("Y-m-d H:i:s",$time);break;
		case 'ymd':	  return date("Y-m-d",$time);break;
		case 'md':	  return date("m-d",$time);break;
		case 'mdhis': return date("m-d H:i:s",$time);break;
		case 'md':	  return date("m-d",$time);	break;
		case '0':     return date("Y-m-d H:i:s");break;
		case '1':	  return date("Y-m-d H:i:s",$time);break;
		default:	  return date("Y-m-d H:i:s");break;
		}

	
	}

//5,make file

public function createFile($char,$filepath){
	
	if(empty($char)) exit('error null writechar!');

	if($this->makeDir(dirname($filepath))){
	
			if($fp=fopen($filepath, "wb")){
		   
					if(@fwrite($fp,$char)){
		   
						fclose($fp);
	   
						return true;
					
					}else{
						
						fclose($fp);
						
						return false;
	   
					}
	   
			}
												
	}
											
	return false;
   
}

//kermit:2012-11-3 

public function makeDir($dir){//create dir

   if(!$dir) exit('invalid dir');
   
   if(is_dir($dir)) return true;

   $dir=str_replace("/data/home/hmu148007/htdocs/protected/coreData","/protected/coreData",$dir);

   $dir = str_replace( "\\", "/", $dir );
  
   $mdir = "";
   
   foreach( explode( "/", $dir ) as $val ) {
	   
   		$mdir .= $val."/";
   
   		if( $val == ".." || $val == "." || trim( $val ) == "" ) continue;
  
  		if(!is_dir( $mdir ) ) {
	   
   			if(!@mkdir( $mdir)){
	   
   				return false;
  
  			 }
   		
		}
   }
   
   return true;
   
	}

//filter simple

	public function filter_simple($value){
	
		$delchar=array("'",'"','#','$','//','/*',"*",";",'“','”','\\','/','~','!','^','‘','’','`');	
					   
		$value=trim(str_replace($delchar,'',trim($value)));
	
		return $value;
		
	}

//kermit:2012-11-5 normal filter

public function filter_normal($value){
	
		$delchar=array("'",'"','#','$','//','/*',"*",";",':','"','"','\\',' ','.','/','~','!','^','&nbsp;','‘','’',
		
					   '[',']','{','}','|','`','=','“','”',' ',' ');	
					   
		$value=trim(str_replace($delchar,'',trim($value)));
	
		return $value;
		
	}

public function filter_adminer($value){
	
		$delchar=array("'",'"','#','$','/',"*",':','\\','.','~','!','^','&nbsp;','‘','’','|','`','“','”',' ');	
					   
		$value=trim(str_replace($delchar,'',$value));
	
		return $value;
		
	}
	
//make keywords
	
	public function makeKeyword($key){
		
		if(!$key) return;
		
		$key=str_replace(array('，',' '),array(',',''),$key);
		
		$key=trim(trim($key),',');
		
		return $key;
		
	}
	
//get get char

	public function getGetchar($index,$model='normal',$default=''){
		
		if(!isset($_GET[$index]))  return $default;
		
		if($model=='normal') return $this->filter_normal($_GET[$index]);
		
		elseif($model=='adminer') return $this->filter_adminer($_GET[$index]);
		
		else return $this->filter_simple($_GET[$index]);
		
		}
		
	public function getPostchar($index,$model='normal',$default=''){
		
		if(!isset($_POST[$index]))  return $default;
		
		if($model=='normal') return $this->filter_normal($_POST[$index]);
		
		elseif($model=='adminer') return $this->filter_adminer($_POST[$index]);
		
		else return $this->filter_simple($_POST[$index]);
		
		}

//delete bad words

public function keyword_filtrate($value,$keyword,$type='1'){
	
	if(!$keyword) return $value;
	
	$keyword=explode('|',$keyword);
	
	if(!is_array($keyword)) return $value;
	
	if($type!='3'){
		
			$goal_char='';
			
			$type=='2' && $goal_char='***';
	
			foreach($keyword as $key=>$val){
		
		  			 $value=str_replace($val,$goal_char,$value);
		
					}
					
		   return $value;
					
	}else{
		
			foreach($keyword as $key=>$val){
		
		  			if(strpos($value,$val)){return 1;}
		
					}
			
			return false;
		
		}
	
}
	
	
//get microseconds

public function get_microtime(){
	
	$value=explode(' ',microtime());
		
	$value=$value[0]+$value[1];
		
	return $value;
	
	}	
	
	
//clear a file or a floder $path not need / in the end

public function clearFloder($path){
		
		if(is_file($path)){
			
			@unlink($path);return true;
			
			}
		
		if(!is_dir($path)) return false;
	
		$dir=@opendir($path);
			
			while($file=@readdir($dir)){
				
				if($file!='.' && $file!='..'){
	
					if(is_file($path.'/'.$file)) @unlink($path.'/'.$file);
	   
					else{
					
						$dir1=@opendir($path.'/'.$file);
					
						while($file1=@readdir($dir1)){
						 
						if($file!='.' && $file!='..') @unlink($path.'/'.$file.'/'.$file1);}	
							
						} 					
				
				 }
											  
			}//end while
										
		    @closedir( $dir );
   
   	  return true;
	
	}	
	
//得出图片的新高宽	
	
public function getNewsize($width,$height){
	
	if(!$width || !$height) return '';
	
	$maxwidth=640;
	
	if($width<=$maxwidth) return "width='{$width}' height='{$height}'";
	
	$newwidth=$maxwidth;
	
	$newheight=intval(($maxwidth/$width)*$height);
	
	return "width='{$newwidth}' height='{$newheight}'";
	
	}	
	
public function gbk2utf8($char,$language='english'){
	
	if($language=='english') return iconv('gbk','utf-8',$char);
	
	else return $char;
	
	}	
	
	
	

	
}//end class



?>