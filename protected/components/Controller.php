<?php

/**
 * kermit:2012-11-15
 * allbase load data
 */
 
//base load function:

date_default_timezone_set('Asia/Shanghai');	

error_reporting(E_ALL ^ E_NOTICE);
 
class Controller extends CController{
	
	public $layout,$lay;
	
	public $kermitBase,$showMonth,$yinLi;

	public $webset,$friend_link;
	
	public $sprider='unknown';
	
	public $page_title,$page_keyword,$page_description;
	
	public $baseurl,$thispage;//��ǰҳ�����
	
	public $datearr=array();//all use the date char
	
	public $month,$day; //all use month and day data
	
	public $keyword,$pagestips;
	
	public $pinglun;
	
	//����ҳ��������س���
	
	public function baseLoad($thispage=0){
		
		$this->baseurl=Yii::app()->baseUrl.'/';
		
		$this->kermitBase=new kermitBase();
		
		if($date=$this->kermitBase->getGetchar('date')){//��ǰ������
			
			$month=intval(substr($date,0,2));
			
			$day=intval(substr($date,2,2));
			
			if($month>12 || $month<1) $month=date('n');
			
			if($day>31 || $day<1) $day=date('j');

		}else{
				
			$month=date('n');
			
			$day=date('j');
			
		}

		$this->datearr=array($month,$day);
		
		$this->month=$month;$this->day=$day;
		
		$this->showMonth=new showMonth($month,$day);
		
		$this->yinLi=new yinLi(date('Y-').$month.'-'.$day);
		
		//ҳ�沼�ָ���
		
		if(isset($_GET['lay'])){

			$lay=$_GET['lay']==0?0:1;
			
			$this->lay=$lay;
			
			$this->layout=Yii::app()->session['layout']=$this->lay==1?'//layouts/column1':'//layouts/column2';
			
			Yii::app()->session['layout']=$this->layout;
			
		}
		
		if($this->layout==''){
			
			$this->layout=Yii::app()->session['layout'];
			
			$this->lay=$this->layout=='//layouts/column1'?1:0;
			
			}
		
		if($this->layout==''){
			
			$this->layout='//layouts/column1';
		
			$this->lay=$this->layout=='//layouts/column1'?1:0;
			
			}
		
		//��Ӣ���л�
		
		$this->pagestips=require(Yii::app()->basePath."/coreData/language.php");
		
		$this->pagestips=$this->pagestips[BAN_LANGUAGE];
			
		$this->webset=require(Yii::app()->basePath."/coreData/webset.php");
		
		if(!$this->webset['web_open']){ echo $this->webset['web_close_words'];exit;}
		
		$this->friend_link=require(Yii::app()->basePath."/coreData/friend_link.php");

		$this->noIptodo();//��ֹIP���ʴ���

		$this->is_sprider();//���������¼
		
		if($this->webset['web_fangshuaxin'] && $this->sprider=='') $this->forBitfresh();//���û�ˢ�����ܴ�ʱ����

		if(date('H')>=8 && intval(rand(1,$this->webset['auto_public_precent']))==1) $this->auto_public_fun();//��վ�Զ��������� $this->sprider=='' && 
		
		//��ʼ����ҳ��ؼ��ʣ����⣬����
		
		$this->page_title=$this->webset['web_name'];
	
		BAN_LANGUAGE=='english' && $this->page_title='Today in History-What happened in history-www.mqwork.com';
		
		$this->page_keyword=$this->webset['web_keyword'];
	
		BAN_LANGUAGE=='english' && $this->page_keyword=$this->webset['index_class_arr'];
		
		$this->page_description=$this->webset['web_description'];
		
		BAN_LANGUAGE=='english' && $this->page_description=$this->webset['image_pagenum']; 
		
		//��ֹ��������JS��CSS�ļ�
		
		Yii::app()->clientScript->scriptMap['*.js'] = false;
			
		Yii::app()->clientScript->scriptMap['*.css'] = false;
		
		$this->setthispage($thispage);
		
		$this->pinglun=Yii::app()->db->createCommand("select * from his_pinglun where pl_visible=1 order by pl_id desc limit 0,15")->query()->readAll();
		
	}
	
	//��ǰҳ�����
	
	public function setthispage($thispage){
		
		for($i=0;$i<4;$i++) $this->thispage[$i]='';
		
		$this->thispage[$thispage]='class="active"';
		
		}
	
	//��ֹIP���ʴ���
	
	public function noIptodo(){

			if($this->webset['no_ips']!=''){
				
				$jzips=explode('|',trim($this->webset['no_ips'],'|'));
			
				if(in_array($this->kermitBase->getuserip(),$jzips)){
					
					if($this->webset['no_ips_do']){echo "<script language='javascript'>for(var i=1;i<5000;i++){alert('�����ĳ�������ֹ��ϣ���ر�����');}</script>";die();}
					
					else{
						
						header("Content-type: text/html; charset=gbk"); 
						
						exit("����IP�ж��Υ�������IP�ѱ���ֹ������ϵ��վ����Ա���䣺shirley_33xiao@126.com");die();
						
						}
					
					}
			
			}
		
	}
	
	//��Ե����PHP�����ļ�
	
	public function getYuanhua(){
		
		if(BAN_LANGUAGE=='english'){
			
			return $this->getEnglish_Yuanhua();
		
		}else{
		
			$file_path=Yii::app()->basePath.'/coreData/cache/huayu.php';
			
			$month=date('n');$day=date('j');
			
			if(file_exists($file_path) && time()-filemtime($file_path)<$this->webset['stat_day_cachetime']*3600) return require($file_path);//�ļ�δ����ֱ�ӷ���
			
			$array=Yii::app()->db->createCommand("(select bri_id,bri_month,bri_day,bri_img,bri_huaname,bri_huayu,bri_dansheng from his_brith where bri_month={$month} and bri_day={$day})  union (select bri_id,bri_month,bri_day,bri_img,bri_huaname,bri_huayu,bri_dansheng from his_brith where bri_month!={$month} and bri_day!={$day} ORDER BY RAND () limit 5)")->queryAll();
		
			$writechar="<?php\r\n/*\r\n*file:huayu cache:{$month}��{$day}��\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return "';
			
			foreach($array as $key=>$row){
				
				$url=$this->webset['web_url'].Yii::app()->createUrl('HisBrith/view',array('date'=>$this->showMonth->makeDate($row['bri_month'],$row['bri_day'])));
				
				$alt="{$row['bri_month']}��{$row['bri_day']}��-���ջ�:{$row['bri_huaname']}-����:{$row['bri_huayu']}-����ʯ:{$row['bri_dansheng']}";
	
				$writechar.="<a href='{$url}'><img src='{$this->baseurl}img/{$row['bri_img']}' width='90' height='90' alt='{$alt}' /></a>";
				
				}
		
			$writechar.="\";\r\n?>";
		
			$this->kermitBase->createFile($writechar,$file_path);
			
			return require($file_path);
			
		}
		
	}
		
	//��Ե����PHP�����ļ�__Ӣ�ﻺ��
	
	public function getEnglish_Yuanhua(){
		
		$file_path=Yii::app()->basePath.'/coreData/cache/eng_huayu.php';
		
		$month=date('n');$day=date('j');
		
		if(file_exists($file_path) && time()-filemtime($file_path)<$this->webset['stat_day_cachetime']*3600) return require($file_path);//�ļ�δ����ֱ�ӷ���
		
		$array=Yii::app()->db->createCommand("(select bri_id,bri_month,bri_day,bri_img,bri_huaname,bri_huayu,bri_dansheng from his_brith where bri_month={$month} and bri_day={$day})  union (select bri_id,bri_month,bri_day,bri_img,bri_huaname,bri_huayu,bri_dansheng from his_brith where bri_month!={$month} and bri_day!={$day} ORDER BY RAND () limit 5)")->queryAll();
	
		$writechar="<?php\r\n/*\r\n*file:English huayu cache:{$month}��{$day}��\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return "';
		
		$eng_data_brith=require(Yii::app()->basePath.'/coreData/eng_data_brith.php');
		
		foreach($array as $key=>$row){
			
			$newkey="{$row['bri_month']}-{$row['bri_day']}";
			
			$this_arr=isset($eng_data_brith[$newkey])?$eng_data_brith[$newkey]:array('id'=>'','name'=>'','hy'=>'','dss'=>'');
			
			$url=$this->webset['web_url'].Yii::app()->createUrl('HisBrith/view',array('date'=>$this->showMonth->makeDate($row['bri_month'],$row['bri_day'])));
			
			$alt="{$row['bri_month']}-{$row['bri_day']}-Birthday Flowers:{$this_arr['name']}-Florid:{$this_arr['hy']}-Birthstone:{$this_arr['dss']}";

			$writechar.="<a href='{$url}'><img src='{$this->baseurl}img/{$row['bri_img']}' width='90' height='90' alt='{$alt}' /></a>";
			
			}
	
		$writechar.="\";\r\n?>";
	
		$this->kermitBase->createFile($writechar,$file_path);
		
		return require($file_path);
		
	}
		
	//ҳ��ײ���������PHP�����ļ�
	
	public function getYuanxing(){
		
		if(BAN_LANGUAGE=='english'){
			
			return $this->getEnglish_yuanxing();
		
		}else{
		
			$file_path=Yii::app()->basePath.'/coreData/cache/xingzuo.php';
			
			$month=date('n');$day=date('j');
			
			if(file_exists($file_path) && time()-filemtime($file_path)<$this->webset['stat_all_cachetime']*3600) return require($file_path);//�ļ�δ����ֱ�ӷ���
			
			$array=Yii::app()->db->createCommand("(select xz_title,xz_month,xz_day,xz_youdian from his_xingzuo where xz_month={$month} and xz_day={$day}) union (select xz_title,xz_month,xz_day,xz_youdian from his_xingzuo where xz_month!={$month} and xz_day!={$day} ORDER BY RAND () limit 9)")->queryAll();
		
			$writechar="<?php\r\n/*\r\n*file:xingzuo cache:{$month}��{$day}��\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return "';
			
			foreach($array as $key=>$row){
				
				$url=$this->webset['web_url'].Yii::app()->createUrl('HisXingzuo/view',array('date'=>$this->showMonth->makeDate($row['xz_month'],$row['xz_day'])));
				
				$row['xz_youdian']=trim($row['xz_youdian'],'��');
	
				$writechar.="<a href='{$url}'>{$row['xz_month']}��{$row['xz_day']}�ճ���������Ҫ������{$row['xz_title']}-�Ҿ���{$row['xz_youdian']}���ŵ�</a><br>";
				
				}
		
			$writechar.="\";\r\n?>";
		
			$this->kermitBase->createFile($writechar,$file_path);
			
			return require($file_path);
		
		}
		
	}
		
	//����Ӣ����Ե��������
	
	public function getEnglish_yuanxing(){
		
		$file_path=Yii::app()->basePath.'/coreData/cache/eng_xingzuo.php';
		
		$month=date('n');$day=date('j');
		
		if(file_exists($file_path) && time()-filemtime($file_path)<$this->webset['stat_all_cachetime']*3600) return require($file_path);//�ļ�δ����ֱ�ӷ���
		
		$array=Yii::app()->db->createCommand("(select xz_month,xz_day from his_xingzuo where xz_month={$month} and xz_day={$day}) union (select xz_month,xz_day from his_xingzuo where xz_month!={$month} and xz_day!={$day} ORDER BY RAND () limit 9)")->queryAll();
	
		$writechar="<?php\r\n/*\r\n*file:English xingzuo cache:{$month}��{$day}��\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return "';
		
		$eng_xingzuo_arr=require(Yii::app()->basePath.'/coreData/eng_data_xingzuo.php');
		
		foreach($array as $key=>$row){
			
			$newkey="{$row['xz_month']}-{$row['xz_day']}";
			
			$this_arr=isset($eng_xingzuo_arr[$newkey])?$eng_xingzuo_arr[$newkey]:array('id'=>'','tit'=>'','yd'=>'');
			
			$url=$this->webset['web_url'].Yii::app()->createUrl('HisXingzuo/view',array('date'=>$this->showMonth->makeDate($row['xz_month'],$row['xz_day'])));
			
			$this_arr['yd']=trim($this_arr['yd'],'��');

			$writechar.="<a href='{$url}'>Born on ".$this->showMonth->getMonthname($row['xz_month'])."-{$row['xz_day']}:{$this_arr['tit']},{$this_arr['yd']}</a><br>";
			
			}
	
		$writechar.="\";\r\n?>";
	
		$this->kermitBase->createFile(utf8_encode($writechar),$file_path);
		
		unset($eng_xingzuo_arr);
		
		return require($file_path);

	}
	
		
	//���ɿ����ļ��������
	
	public function makeWebset(){
		
		list($controller_sec,$action)=Yii::app()->createController('Help/actionMakeWebset');
										
		$controller_sec->$action();
		
	}
	
	
		
	//�û�����Υ���������	
		
	public function RecordForbid($what){
		
		if(!$what) return;
		
		$insert_arr=array(
		
				'jin_ip'=>$this->kermitBase->getuserip(),
				'jin_say'=>$what.Yii::app()->request->getUrl(),
				'jin_time'=>time(),
				'jin_user'=>Yii::app()->session['user']['er_name'],
			);
		
		Yii::app()->db->createCommand()->insert('his_errors',$insert_arr);
		
	}	
			
	//����������ʼ�¼
	
	public function is_sprider(){
		
			if($this->sprider!='unknown') return $this->sprider;
		
			if(empty($_SERVER['HTTP_USER_AGENT'])){$this->sprider=''; return $this->sprider;}
		
			$searchs = Yii::app()->params['sprider'];
		
			$sprider_agent=strtolower($_SERVER['HTTP_USER_AGENT']);
		
			foreach($searchs as $key=>$value){
				
					if (strpos($sprider_agent,$value)!==false){//Ϊ����������м�¼
					   
							$this->sprider=$key;
							
							//�������¼�����ﵽ����ʱ���
							
							$allnum=Yii::app()->db->createCommand("select count(*) as num from his_sprider")->query()->read();
							
							if($allnum['num']>=$this->webset['sprider_num'])
							
									Yii::app()->db->createCommand("delete from his_sprider")->query();
							
							//������������м�¼-����Сʱ��¼һ��
					
							$thistime=time()-$this->webset['sprider_time']*3600;
							 
							Yii::app()->db->createCommand("LOCK TABLES his_sprider WRITE")->query();
							
							$nowtime=time();
							
							$allnum=Yii::app()->db->createCommand("select count(*) as num from his_sprider where cometime>{$thistime}")->query()->read();
					
							if(!$allnum['num'])	Yii::app()->db->createCommand("insert into his_sprider(sprider,cometime) values('$key',$nowtime)")->query();
									
							Yii::app()->db->createCommand("UNLOCK TABLES")->query();
		
							return $this->sprider;
						
					}
					
			}//����forѭ��
		
			$this->sprider = '';return $this->sprider;
	
	}	
		
	//�Զ��������
	
	public function auto_public_fun(){
		
				if($this->webset['auto_public_num']){//�Զ���������Ц������ͼƬ
					
						$public_date=$this->webset['auto_public_day'];
						
						$nowday=date('Y-m-d');$month=date('n');$day=date('j');$start=time();
						
						if($public_date!=$nowday){//���·�������
							
								Yii::app()->db->createCommand("update his_system set auto_public_day='{$nowday}',auto_public=0 where xh_system=1")->query();
									
								$this->makeWebset();
									
								return true;
		
						}else{//���뷢�����

								if($this->webset['auto_public_num'] && $this->webset['auto_public']<$this->webset['auto_public_num']){//���������·�����δ�����㹻
								
								$month=$this->month;$day=$this->day;
								
	Yii::app()->db->createCommand("update his_main set publiced=1,ls_time={$start} where ls_month='{$month}' and ls_day='{$day}' ORDER BY RAND () limit 1")->query();	
											
	Yii::app()->db->createCommand("update his_system set auto_public=auto_public+1 where xh_system=1")->query();	
													
								$this->makeWebset();
								
								return true;
									
								}
			
					 }//end else	
					
				}

	}//end	
		
	//��վ����ҳ���ˢ�¹��� //�����������������
		
	public function forBitfresh(){
	
			$nowtime=$this->kermitBase->get_microtime();
			
			$thisip=$this->kermitBase->getuserip();
			
			$jzips=explode('|',trim($this->webset['no_ips'],'|'));
			
			if(isset($_COOKIE['times'])){//����ˢĻ��¼���������
				
					if($_COOKIE['times']>=$this->webset['web_shuapin_num']){
					
							$seconds=intval($this->webset['web_shuapin_time']*60+$_COOKIE['visittime']-$nowtime);
				
							$minute=floor($seconds/60);$second=$seconds%60;
				
							$timetxt=($minute==0)?$second:$minute.' �� '.$second;
				
							if($_COOKIE['times']!='yes'){//ÿһ�δﵽˢ����׼���м�¼
						
								$this->RecordForbid('����ˢ��ҳ');
						
								setcookie("times",'yes',time()+$seconds);}
								
							//ȡ�õ�ǰIP��¼����
							
							$allnum=Yii::app()->db->createCommand("select count(*) as nums from his_errors where jin_ip='{$thisip}'")->query()->read();
						
							if($allnum['nums']==$this->webset['web_shua_times_jinip']){//����ˢ����Ϊ����
						
									if(empty($jzips) || !in_array($thisip,$jzips)){//�����ֹIP���޴�IP�����

											Yii::app()->db->createCommand("update his_system set no_ips=concat(no_ips,'|$thisip')")->query();
											
											$this->makeWebset();
									
											}
							
									$this->RecordForbid('����ˢ�������ֹIP��');
							
									exit('����ˢ�´������࣬IP����ֹ');
								
								}			
					
					exit("<br>&nbsp;^_^�����ʵ��ٶ�̫���ˣ�����Ϣ ".$timetxt.' ����ٷ��ʰ�');
					
					}
					
				}
		
			//��ֹҳ��ˢ�¹���

			if(!isset($_COOKIE['visittime'])){
				
				setcookie("visittime",$nowtime);
			
			}else{
				
				if(($nowtime-$_COOKIE['visittime'])<$this->webset['web_fangshuapin']/1000){
					
					if(isset($_COOKIE['times'])) setcookie("times",$_COOKIE['times']+1,time()+$this->webset['web_shuapin_time']*60);
					
					else setcookie("times",1,time()+$this->webset['web_shuapin_time']*60);
				
				}
				
				setcookie("visittime",$nowtime);
					
		}

	}	
		
	
	
	
		
		
}//end class