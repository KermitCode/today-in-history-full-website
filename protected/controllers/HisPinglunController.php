<?php

class HisPinglunController extends Controller{
	
	public $mainid=0;

	public function beforeAction(){
	
		$this->baseLoad(3);
		
		return true;
		
	}

	//public pinglun
	
	public function actionCreate(){

		$model=new HisPinglun;
		
		$result=array('rs'=>0);
		$model->pl_month=$this->kermitBase->getPostchar('month');
		$model->pl_day=$this->kermitBase->getPostchar('day');
		$model->pl_main_id=$this->kermitBase->getPostchar('id');
		$model->pl_text=$this->kermitBase->getPostchar('text','simple');
		$model->pl_ip=$this->kermitBase->getuserip();
		$model->pl_time=time();
		$model->pl_user=$this->kermitBase->getPostchar('name');
		$model->pl_visible=$this->webset['pingjia_right']==0?1:0;

		if(Yii::app()->session['pingjia_num']>=$this->webset['pingjia_most']){
			
			$result=array('rs'=>3);
		
		}elseif(!$model->pl_month || $model->pl_day || $model->pl_text==''){
	
			if($model->pl_text!='' && $model->pl_main_id){//有效评价
			
				$model->pl_user=strip_tags(iconv('utf-8','gbk',$model->pl_user));
			
				$model->pl_text=strip_tags(iconv('utf-8','gbk',$model->pl_text));
			
				$model->pl_text=$this->kermitBase->keyword_filtrate($model->pl_text,$this->webset['bad_words'],$this->webset['bad_words_do']);

				if($model->pl_text===false) $result=array('rs'=>4);//阻止操作
			
				else{//已过滤敏感词

					if($model->save(false)){
							
							$result=array('rs'=>1,'tim'=>date('Y-m-d H:i:s',$model->pl_time));
							
							if(!Yii::app()->session['pingjia_num']){Yii::app()->session['pingjia_num']=1;}
							
							else{Yii::app()->session['pingjia_num']=Yii::app()->session['pingjia_num']+1;}
							
					}else $result=array('rs'=>0);
					
			}
			
		}else $result=array('rs'=>0);

	}
	
	header("Content-type: text/html; charset=utf-8"); 
	
	echo json_encode($result);

}

	//list user pinglun
	
	public function actionIndex($all=1){
		
		if($this->month!=date('n')||$this->day!=date('j')){
			
			$this->page_title="对历史上{$this->month}月{$this->day}日发生的大事评论-".$this->page_title;
			
			BAN_LANGUAGE=='english' && $this->page_title='Comment to Major events in history on '.$this->showMonth->getMonthname($this->month)." {$this->day}-Today in history";
		
		}else{
			
			$this->page_title=$this->page_title.'-对历史上的今天发生的大事评论-就要历史'.$this->webset['web_url'];
			
			BAN_LANGUAGE=='english' && $this->page_title='Comment to Major events in history-'.$this->webset['web_url'];
			
		}
		
		$cond='pl_visible=1';
		
		if(!$all){
				
			list($month,$day)=$this->datearr;
			
			$cond.=" and pl_month='{$month}' and pl_day='{$day}'";
	
		}
		
		if(BAN_LANGUAGE=='chinese') $sql="ls_title";
		
		else $sql="ls_englishtit as ls_title";
		
		$dataProvider=new CActiveDataProvider('HisPinglun',array(
							'criteria'=>array(
								'order'=>'pl_month desc,pl_day desc,pl_id desc',
								'condition'=>$cond,
								'with'=>array(
									'main'=>array('select'=>"ls_year,{$sql}"),
									),
								),
							'pagination'=>array(
								'pageSize'=>15,
								),
							
						));
		
		$this->render('index',array(
		
			'dataProvider'=>$dataProvider,
			
			'all'=>$all,
			
		));
		
	}


	public function loadModel($id){
		
		$model=HisPinglun::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}


}//end class