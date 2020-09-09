<?php

/*
 *kermit:2012-11-14 for indexpage
 */
 
class SiteController extends Controller{

//kermit:2012-11-3 for all user function 

	public function beforeAction(){
		
			$this->baseLoad(0);
			
			return true;
			
		}
		
//web cache
/*
	 public function filters() {

		return array (
			array (

				'COutputCache + Index',
				'duration' =>3600,
				'varyByRoute'=>true,
				'varyByParam' => array('date','lay'),
				'dependency' => array(		
								'class'=>'CDbCacheDependency',				
								'sql'=>"SELECT count(ls_id) FROM his_main where publiced=0 and ls_month='".$this->month."' and ls_day='".$this->day."'",		
							),
					),
			);

	}*/

//kermit:2012-10-10 ��վ��ҳ����

	public function actionIndex(){
		
		if($this->month!=date('n')||$this->day!=date('j')){
			
			if(BAN_LANGUAGE=='chinese'){
				
				$this->page_title="��ʷ�ϵĽ���{$this->month}��{$this->day}��-��ʷ��{$this->month}��{$this->day}�շ�������-".$this->page_title;
				$this->page_keyword="��ʷ�ϵĽ���,��ʷ�ϵ�{$this->month}��{$this->day}��,{$this->month}��{$this->day}�շ�������,��ʷ��{$this->month}��{$this->day}�շ������Ĵ���,��ʷ��{$this->month}��{$this->day}�շ�������Щ��";
				$this->page_description="��ʷ�ϵĽ��췢���Ĵ���,��ʷ�ϵ�{$this->month}��{$this->day}��,{$this->month}��{$this->day}�շ�������,��ʷ��{$this->month}��{$this->day}�շ������Ĵ���,��ʷ��{$this->month}��{$this->day}�շ�������Щ��";
				
			}else{
				
				$this->page_title='today on history,Event occurred on '.$this->showMonth->getMonthname($this->month)." {$this->day} in history-What happened in China on ".$this->showMonth->getMonthname($this->month)." {$this->day} -Today in History";
				$this->page_keyword='today on history,'.$this->showMonth->getMonthname($this->month)." {$this->day} on history,what happened in china on ".$this->showMonth->getMonthname($this->month).' '.$this->day.',today on history';
				$this->page_description='today on history,'.$this->showMonth->getMonthname($this->month)." {$this->day} on history,what happened in china on ".$this->showMonth->getMonthname($this->month).' '.$this->day.',today on history';
			}
		
		}else{
			
			if(BAN_LANGUAGE=='chinese') $this->page_title=$this->page_title.'-��ʷ�Ͻ��췢���Ĵ��¼�-'.$this->webset['web_url'];
			
			else $this->page_title='Event occurred today in history-What happened in China  Today in History-'.$this->webset['web_url'];
			
		}
		
		if(BAN_LANGUAGE=='chinese') $lang_title='ls_title';
		
		else $lang_title='ls_englishtit as ls_title'; 
		
		$main_rs=&Yii::app()->db->createCommand("select ls_id,{$lang_title},ls_class,ls_year,ls_month,ls_day from his_main where publiced=1 and ls_month='{$this->month}' and ls_day='{$this->day}' order by ls_year desc,ls_id desc")->query()->readAll();
		
		$main_rs_last=array();
		
		foreach($main_rs as $key=>$row){$main_rs_last[$row['ls_id']]=$row;}
		
		unset($main_rs);
	
		$image_rs=Yii::app()->db->createCommand("select * from his_main_img where img_month='{$this->month}' and img_day='{$this->day}' group by img_contid order by img_id desc")->query()->readAll();
		
		$this->render('index',array('main_rs_last'=>$main_rs_last,'image_rs'=>$image_rs));
	
	}
	

//kermit:2012-12-6����ÿ����Ŀ�������ļ��������ɻ���

	public function getClassrs($classid,$num=7){
		
		$file_path=Yii::app()->basePath.'/coreData/newclass/new'.$classid.'.php';
		
		if(file_exists($file_path)) return require($file_path);//�ļ�����ֱ�ӷ��ػ���
		
		$array=Yii::app()->db->createCommand("select * from xh_title where cl_id='{$classid}' and publiced=1 and tt_visible=1 order by tt_time desc limit 0,{$num}")->queryAll();
	
		$writechar="<?php\r\n/*\r\n*file:new��classID:{$classid} file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';	$i=0;
		
		foreach($array as $key=>$row){
			
			$title=addslashes($row['tt_title']);
			
			$writechar.="\r\n\t{$i}=>array('tt_id'=>'{$row['tt_id']}','cl_id'=>'{$row['cl_id']}','tt_title'=>'{$title}','tt_showviews'=>'{$row['tt_showviews']}','tt_time'=>'{$row['tt_time']}'),";
			
			$i++;
			
			}
	
		$writechar.="\r\n\t);\r\n?>";
	
		$this->kermitBase->createFile($writechar,Yii::app()->basePath.'/coreData/newclass/new'.$classid.'.php');
		
		return $array;
		
		}
	
//kermit:2012-11-25 ȫվ��ҳ��Ե����

	public function actionYuan(){
		
		//if($action!='yuan') exit('no');
		
		$rand_title=Yii::app()->db->createCommand("SELECT tt_id,tt_title FROM xh_title WHERE  publiced=1 and tt_visible=1 ORDER BY RAND () limit 1 ")->query()->read();
		
		$pgid=$rand_title['tt_id'];
		
		$rand_text=Yii::app()->db->createCommand("SELECT te_text FROM xh_title_text WHERE te_tt_id={$pgid}")->query()->read();
		
		$rand_text=str_replace(array('<br>','<br />','<BR>'),'',trim($rand_text['te_text']));
		
		if(strlen($rand_text)>500) $rand_text=$this->kermitBase->str_cut($rand_text,500,"..<a href='".$this->createUrl('XhTitle/view',array('id'=>$pgid))."'>>>�鿴ȫ��</a>");
		
		$outjson=json_encode(array(
					'title'=>iconv("gbk","utf-8",$rand_title['tt_title']),
					'text'=>iconv("gbk","utf-8",$rand_text),
					));
		$rand_array=array(1,1,1,1,1,1,2,2,2,2,3,3,4);$show_add=$rand_array[rand(0,12)];

		Yii::app()->db->createCommand("update xh_title set tt_views=tt_views+1,tt_showviews=tt_showviews+$show_add where tt_id={$pgid}")->query();			
					
		Yii::app()->db->createCommand("SELECT tt_id,tt_title FROM xh_title WHERE  publiced=1 and tt_visible=1 ORDER BY RAND () limit 1 ")->query();
		
		Yii::app()->db->createCommand("update xh_system set yuan_number=yuan_number+1 where xh_system=1")->query();
		
		header("Content-type: text/html; charset=utf-8"); 

		echo $outjson;
	
		}	

//��ҳ����ͳ�����ݻ���

	public function getStatdata(){
		
		$datafile=Yii::app()->basePath.'/coreData/stat.php';
		
		$date_thistime=strtotime(date('Y-m-d'));
		
		if(file_exists($datafile)){//�ļ�����
			
				$data=require($datafile);$mtime=filemtime($datafile);$change=false;
				
				if(time()-$mtime>$this->webset['stat_day_cachetime']){//��Ҫ���µ�������
					
					$dayi=Yii::app()->db->createCommand("select count(*) as dayi from xh_image where im_visible=1 and publiced=1 and im_time>$date_thistime")->query()->read();
			
					$dayw=Yii::app()->db->createCommand("select count(*) as dayw from xh_title where tt_visible=1 and publiced=1 and tt_time>$date_thistime")->query()->read();
					
					$change=true;$data['dayi']=$dayi['dayi'];$data['dayw']=$dayw['dayw'];}
				
				if(time()-$mtime>3600*$this->webset['stat_all_cachetime']){//��Ҫ������վ������
					
					$alli=Yii::app()->db->createCommand("select count(*) as alli from xh_image where im_visible=1 and publiced=1")->query()->read();
			
					$allw=Yii::app()->db->createCommand("select count(*) as allw from xh_title where tt_visible=1 and publiced=1")->query()->read();
					
					$change=true;$data['alli']=$alli['alli'];$data['allw']=$allw['allw'];}
					
				if($change){
					
					$char="<?php\r\nreturn array('dayi'=>{$data['dayi']},'dayw'=>{$data['dayw']},'alli'=>{$data['alli']},'allw'=>{$data['allw']});\r\n?>";
					
					$this->kermitBase->createFile($char,$datafile);
					
					}
					
				return $data;
	
		}else{//�ļ�������
			
				$dayi=Yii::app()->db->createCommand("select count(*) as dayi from xh_image where im_visible=1 and publiced=1 and im_time>$date_thistime")->query()->read();
		
				$dayw=Yii::app()->db->createCommand("select count(*) as dayw from xh_title where tt_visible=1 and publiced=1 and tt_time>$date_thistime")->query()->read();	
				
				$alli=Yii::app()->db->createCommand("select count(*) as alli from xh_image where im_visible=1 and publiced=1")->query()->read();
			
				$allw=Yii::app()->db->createCommand("select count(*) as allw from xh_title where tt_visible=1 and publiced=1")->query()->read();
				
				$char="<?php\r\nreturn array('dayi'=>{$dayi['dayi']},'dayw'=>{$dayw['dayw']},'alli'=>{$alli['alli']},'allw'=>{$allw['allw']});\r\n?>";
					
				$this->kermitBase->createFile($char,$datafile);
				
				return array('dayi'=>$dayi['dayi'],'dayw'=>$dayw['dayw'],'alli'=>$alli['alli'],'allw'=>$allw['allw']);
						
		}
		
	}
		
//������ʾ����
		
	public function actionError(){
		
		if($error=Yii::app()->errorHandler->error){
			
			if(Yii::app()->request->isAjaxRequest)
				
				echo $error['message'];
			
			else
				
				$this->render('error', $error);
		
		}
	
	}//end error class

//map
	
	public function actionMap(){
		
		$this->layout='//layouts/column3';
		
		$this->page_title='��վ��ͼ';
		
		$this->page_keyword='��վ��ͼ,��վ�ṹ,��վ���,��վ����,��վ��,��վ�������,�������';
		
		$this->page_description='���Ǳ�վ��վ��ͼ';
		
		$this->render('map');

	}



}