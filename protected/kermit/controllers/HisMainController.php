<?php

/*
 *kermit:2013-1-2
 *for main controller
 */
 
class HisMainController extends Controller{
	
	public $layout='//layouts/column2';
	
	public $month=1;
	
	public $day=1;

//kermit:2013-1-1

	public function beforeAction(){
		
		if($this->baseLoad()) return true;
		
	}
	
//list data

	public function actionIndex($month=0,$day=0){
		
		$sql=' 1 ';
		
		if($month>0){
		
			$this->month=$month;
			
			$sql.=" and ls_month='{$month}' ";
		
		}
		
		if($day>0){
			
			$sql.=" and ls_day='".$day."' ";
		
			$this->day=$day;
		
		}
		
		$dataProvider=new CActiveDataProvider('HisMain',array(
					'criteria'=>array(
						'order'=>'ls_id desc',
						'condition'=>$sql,
						),	
						
					));
		
		$this->render('index',array(
		
			'dataProvider'=>$dataProvider,
		
		));
	
	}
	
//list data

	public function actionEnglish(){
		
		$dataProvider=new CActiveDataProvider('HisMain');
		
		$this->render('english',array(
		
			'dataProvider'=>$dataProvider,
		
		));
	
	}	
	
//translate pages

	public function actionTrans(){
	
		header("Content-Type:text/html;charset=utf-8");
		
		$Translate=new Translate();
		
		$value=isset($_GET['value'])?$_GET['value']:'';
		
		$value=iconv("utf-8","gb2312",urldecode($value)); 
		
		if($value==''){
			
		exit(0);
			
		}else{
			
			echo iconv('gb2312','utf-8',$Translate->dotranslate($value));
		
		}

	}

//kermit:2012-1-12 add history things

	public function actionCreate(){
		
		$model=new HisMain;
		
		if(isset($_POST['HisMain'])){
			
			$eng_text=$_POST['engcont'];
			
			$model->attributes=$_POST['HisMain'];
			
			$model->publiced=1;$model->ls_time=time();

			$model->isNewRecord=true;

			
			if($model->save()){
				
				$this->createEngfile($model,$eng_text);//英文写入文件
				
				//主图片的处理
				
				if($_FILES){//for upload image

					$dst_imgpath=Yii::app()->basePath."/../img/uploak/{$model->ls_month}/";
					
					$UploadImg=new UploadImg($dst_imgpath,$model->ls_id);
					
					$newimg=$UploadImg->upload_imgfile('upimage');
					
					$url=$model->ls_month.'/'.$newimg;
					
					if($newimg) Yii::app()->db->createCommand("insert into his_main_img(img_url,img_contid,img_month,img_day) 
															 values('{$url}','{$model->ls_id}','{$model->ls_month}','{$model->ls_day}')")->query();
				
				}
				
				$this->kermitBase->msg_show('发表成功！',$this->createUrl('HisMain/index'));
				
			}else{
				
				$this->kermitBase->msg_show('发表失败：'.$model->getErrors());

			}
		
		}

		$this->render('create',array('model'=>$model,'eng_text'=>'',));
		
	}

//update main history

	public function actionUpdate($id){
		
		$model=$this->loadModel($id);

		if(isset($_POST['HisMain'])){
			
			$eng_text=$_POST['engcont'];
			
			$yuanfile=Yii::app()->basePath."/coreData/english_main/{$model->ls_day}/{$model->ls_id}.php";
			
			$model->attributes=$_POST['HisMain'];
			
			$newfile=Yii::app()->basePath."/coreData/english_main/{$model->ls_day}/{$model->ls_id}.php";
			
			if($model->save()){
				
				if($yuanfile!=$newfile) @unlink($yuanfile);

				$this->createEngfile($model,$eng_text);//英文写入文件
				
				//主图片的处理
				
				if($_FILES){//for upload image

					$dst_imgpath=Yii::app()->basePath."/../img/uploak/{$model->ls_month}/";
					
					for($i=0;$i<20;$i++){
						
						$newname=$model->ls_id.rand(11,99);
						
						if(!file_exists($dst_imgpath.$newname.'.gif') && !file_exists($dst_imgpath.$newname.'.jpg')) break;
						
						}
					
					$UploadImg=new UploadImg($dst_imgpath,$newname);
					
					$newimg=$UploadImg->upload_imgfile('upimage');
					
					$url=$model->ls_month.'/'.$newimg;
					
					if($newimg) Yii::app()->db->createCommand("insert into his_main_img(img_url,img_contid,img_month,img_day) 
															 values('{$url}','{$model->ls_id}','{$model->ls_month}','{$model->ls_day}')")->query();
															 
															 
				
				}
				
				$this->kermitBase->msg_show('修改成功！');
				
			}else{
				
				$this->kermitBase->msg_show('修改失败：'.$model->getErrors());
				
			}

		}
		
		$file_path=Yii::app()->basePath."/coreData/english_main/{$model->ls_day}/{$model->ls_id}.php";
		
		if(is_file($file_path)) $eng_text=require($file_path);
		
		else $eng_text='';

		$this->render('update',array('model'=>$model,'eng_text'=>$eng_text));
		
	}
	
//create english file

	public function createEngfile($model,$engcont){
		
		$file_path=Yii::app()->basePath."/coreData/english_main/{$model->ls_day}/";
		
		$filechar="<?php\r\n\r\n/*\r\n\tenglist file:{$model->ls_year}-{$model->ls_month}-{$model->ls_day}\r\n\tcreate time:";

		if(!get_magic_quotes_gpc()){
			
			$model->ls_englishtit=addslashes($model->ls_englishtit);
			
			$engcont=addslashes($engcont);
			
		}
		
		$filechar.=date("Y-m-d H:i:s")."\r\n*/\r\n\r\nreturn array(\r\n'title'=>'{$model->ls_englishtit}',\r\n'class'=>{$model->ls_class},\r\n'cont'=>'{$engcont}'\r\n);\r\n\r\n?>";

		$this->kermitBase->createFile($filechar,$file_path.$model->ls_id.'.php');
		
		return true;

	}
	
//get YINLI year month day

	public function actionYlyear(){
		
		header("Content-Type: text/html; charset=utf-8");
		
		$year=intval($this->kermitBase->getGetchar('year'));
		
		$month=intval($this->kermitBase->getGetchar('month'));
		
		$day=intval($this->kermitBase->getGetchar('day'));
		
		if($year<1901 || $year>2020) $rs=array('rs'=>0);

		else{
		
			$yinLi=new yinLi($year.'-'.$month.'-'.$day);
			
			$year_char=iconv('gbk','utf-8',substr($yinLi->yl_year,0,4));
			
			$yuan_month=str_replace('月','',$yinLi->yl_month);
			
			if($yuan_month=='十一') $month_char='冬';
			elseif($yuan_month=='十二') $month_char='腊';
			elseif($yuan_month=='一') $month_char='正';
			else $month_char=$yuan_month;
			
			$month_char=iconv('gbk','utf-8',$month_char);
			
			$day_char=iconv('gbk','utf-8',$yinLi->yl_day);
			
			$month_array=array(1=>'正',2=>'二',3=>'三',4=>'四',5=>'五',6=>'六',7=>'七',8=>'八',9=>'九',10=>'十',11=>'冬',12=>'腊');
			
			$month_array=array_flip($month_array);
			
			$month_array['十一']=11;$month_array['十二']=12;
			
			$month_num=$month_array[$yuan_month];
			
			$rs=array(
				'rs'=>1,
				'ylyear'=>$year_char,
				'ylmonth'=>$month_char,
				'ylday'=>$day_char,
				'month_num'=>$month_num,
				'day_num'=>$yinLi->yl_numday,
				);
			
			}
		
		echo iconv('gb2312','utf-8',json_encode($rs));
		
	}
		
//delete main history event

	public function actionDelete($id){
		
		exit('禁止删除');
		
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
		
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			
	}
	
//help funciton 

	public function getArray_type($type){
		
		$return_arr=array();
		
		if($type=='month'){for($i=1;$i<13;$i++){$return_arr[$i]=$i;}}
		
		elseif($type=='day'){for($i=1;$i<32;$i++){$return_arr[$i]=$i;}}
		
		elseif($type=='ylmonth'){
			
			$month_arr=array(1=>'正',2=>'二',3=>'三',4=>'四',5=>'五',6=>'六',7=>'七',8=>'八',9=>'九',10=>'十',11=>'冬',12=>'腊');
			
			foreach($month_arr as $key=>$value) $return_arr["$value"]=$value;
			
			}
		
		else;
		
		return $return_arr;
		
	}
	
//get yinlin daylist

public function getArray_day(){
	
		$ten=array('初','十','廿');
		
		$day_arr=array('一','二','三','四','五','六','七','八','九','十');
		
		$return_arr=array();
		
		foreach($ten as $keya=>$vala){
			
				foreach($day_arr as $keyb=>$valb){
			
						if($vala==$valb && $valb=='十')  $return_arr[$vala.$valb]='二十';
						
						if($vala=='廿' && $valb=='十')  $return_arr[$vala.$valb]='三十';
				
						else $return_arr[$vala.$valb]=$vala.$valb;
						
					}

			}
		
		return $return_arr;
		
	}	
	
//translate Year to yinli year

	public function getYear_char($year=''){
		
		$tiangan=array(1=>'甲',2=>'乙',3=>'丙',4=>'丁',5=>'戊',6=>'己',7=>'庚',8=>'辛',9=>'壬',10=>'癸');
		
		$dizhi=array(1=>'子',2=>'丑',3=>'寅',4=>'卯',5=>'辰',6=>'巳',7=>'午',8=>'未',9=>'申',10=>'酉',11=>'戌',12=>'亥');
		
		if(!$year){
			
			$return_arr=array();
			
			foreach($tiangan as $keya=>$vala){
			
				foreach($dizhi as $keyb=>$valb){
				
						$return_arr[$vala.$valb]=$vala.$valb;
						
					}

			}
		
			return $return_arr;
			
		}
		
		$gan=$year%10-3;$zhi=$year%12-3;
	
		while($gan<1){$gan=$gan+10;}
		
		while($gan>10){$gan=$gan-10;}
		
		while($zhi<1)$zhi=$zhi+12;
		
		while($zhi>12)$zhi=$zhi-12;
		
		if($year==$this->year) $this->year_char=$tiangan[$gan].$dizhi[$zhi];
		
		return $tiangan[$gan].$dizhi[$zhi];
	
	}//end function 

	public function loadModel($id){
		
		$model=HisMain::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}


}
