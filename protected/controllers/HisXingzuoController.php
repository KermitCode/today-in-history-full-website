<?php

class HisXingzuoController extends Controller{

	public function beforeAction(){
	
		$this->baseLoad(2);
		
		return true;
		
	}
	
	public function actionView(){
		
		list($month,$day)=$this->datearr;
		
		$model=HisXingzuo::model()->find("xz_month='{$month}' and xz_day='{$day}'");
		
		if($this->month!=date('n')||$this->day!=date('j')){
			
			if(BAN_LANGUAGE!='english'){
				$this->page_title="{$this->month}月{$this->day}日出生的人主要特征{$model->xz_title}-主要优点-{$model->xz_youdian}-".$this->page_title;
				$this->page_keyword="{$this->month}月{$this->day}日出生性格特征,{$model->xz_name}性格特点,{$model->xz_name}优点和缺点,{$model->xz_youdian},{$model->xz_name}名人有哪些";
				$this->page_description="{$this->month}月{$this->day}日出生的人的一些主要性格特征,{$model->xz_name}的性格特点以及优缺点以及-{$model->xz_name}的守护神健康知识塔罗牌等";
			}else{
				$this->page_title='The main features of the people born on '.$this->showMonth->getMonthname($this->month)." {$this->day} Today in history";
				$this->page_keyword='The main features of the people born on '.$this->showMonth->getMonthname($this->month)." {$this->day} Today in history";
				$this->page_description='The main features of the people born on '.$this->showMonth->getMonthname($this->month)." {$this->day} Today in history";
				}
		
		}else{
			
			$this->page_title=$this->page_title.'-各个日期星座分析-性格优缺点-就要历史'.$this->webset['web_url'];
			
			BAN_LANGUAGE=='english' && $this->page_title='Various dates constellation analysis - character strengths and weaknesses-Today in history';
			
		}
		
		$this->render('view',array(
		
			'model'=>$model,
		
		));
		
	}


	public function loadModel($id){
		
		$model=HisXingzuo::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}


}
