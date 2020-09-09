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
				$this->page_title="{$this->month}��{$this->day}�ճ���������Ҫ����{$model->xz_title}-��Ҫ�ŵ�-{$model->xz_youdian}-".$this->page_title;
				$this->page_keyword="{$this->month}��{$this->day}�ճ����Ը�����,{$model->xz_name}�Ը��ص�,{$model->xz_name}�ŵ��ȱ��,{$model->xz_youdian},{$model->xz_name}��������Щ";
				$this->page_description="{$this->month}��{$this->day}�ճ������˵�һЩ��Ҫ�Ը�����,{$model->xz_name}���Ը��ص��Լ���ȱ���Լ�-{$model->xz_name}���ػ��񽡿�֪ʶ�����Ƶ�";
			}else{
				$this->page_title='The main features of the people born on '.$this->showMonth->getMonthname($this->month)." {$this->day} Today in history";
				$this->page_keyword='The main features of the people born on '.$this->showMonth->getMonthname($this->month)." {$this->day} Today in history";
				$this->page_description='The main features of the people born on '.$this->showMonth->getMonthname($this->month)." {$this->day} Today in history";
				}
		
		}else{
			
			$this->page_title=$this->page_title.'-����������������-�Ը���ȱ��-��Ҫ��ʷ'.$this->webset['web_url'];
			
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
