<?php

/*
 *kermit:2012-11-24
 *ǰ̨����һЩ���ɳ�����ļ�
 */
 
class HelpController extends Controller{
	
	public function actionindex(){
		
		exit;
	
	}
	
	//������վ���þ�̬�ļ�

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

//�����ļ�����
		
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