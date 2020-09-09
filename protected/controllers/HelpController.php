<?php

/*
 *kermit:2012-11-24
 *前台用于一些生成程序的文件
 */
 
class HelpController extends Controller{
	
	public function actionindex(){
		
		exit;
	
	}
	
	//生成网站配置静态文件

	public function actionMakeWebset(){
		
		$array=Yii::app()->db->createCommand("select * from his_system limit 0,1")->query()->read();
		
		$writechar="<?php\r\n/*\r\n*file:webset file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';
		
		foreach($array as $key=>$value){
			
			if(!get_magic_quotes_gpc()) $value=addslashes($value);
			
			if(get_magic_quotes_gpc() && $key=='web_stat') $value=addslashes($value);
				
			$writechar.="\r\n\t'{$key}'=>'{$value}',";
			
			}
		
		$writechar.="\r\n\t);\r\n?>";
		
		$this->createFile($writechar,Yii::app()->basePath.'/coreData/webset.php');

		return true;
		
		}

//生成文件函数
		
	public function createFile($char,$filepath){
		
		if(empty($char)) exit('error null writechar!');
		
				if($fp=fopen($filepath, "wb")){
			   
						if(@fwrite($fp,$char)){
			   
							fclose($fp);
		   
							return true;
						
						}else{
							
							fclose($fp);
							
							return false;
		   
						}
		   
				}
												
		return false;
	   
	}





}//end class