<?php

class HisBrithController extends Controller{
	
	public function beforeAction(){
	
		$this->baseLoad(1);
		
		return true;
		
	}

	public function actionView(){
		
		list($month,$day)=$this->datearr;
		
		$model=HisBrith::model()->find("bri_month='{$month}' and bri_day='{$day}'");
		
		if($this->month!=date('n')||$this->day!=date('j')){
			
			if(BAN_LANGUAGE!='english'){
				$this->page_title="{$this->month}月{$this->day}日出生的人幸运花是{$model->bri_huaname}-花语{$model->bri_huayu}-诞生石{$model->bri_dansheng}-".$this->page_title;
				$this->page_keyword="{$this->month}月{$this->day}日幸运花是什么花,{$this->month}月{$this->day}日的诞生石是什么石,{$this->month}月{$this->day}日花语是什么";
				$this->page_description="{$this->month}月{$this->day}日出生的人幸运花是{$model->bri_huaname}-花语是{$model->bri_huayu}-诞生石是{$model->bri_dansheng}";
			}else{
				$this->page_title='Born on '.$this->showMonth->getMonthname($this->month)." {$this->day} lucky flower language and Birthstone-Today in history";
				$this->page_keyword='Born on '.$this->showMonth->getMonthname($this->month)." {$this->day} lucky flower language and Birthstone-Today in history";
				$this->page_description='Born on '.$this->showMonth->getMonthname($this->month)." {$this->day} lucky flower language and Birthstone-Today in history";
			}
		
		}else{
			
			$this->page_title=$this->page_title.'-每天的幸运花花语和诞生石-就要历史'.$this->webset['web_url'];
			
			BAN_LANGUAGE=='english' && $this->page_title='The daily lucky Flower language and Birthstone-Today in history';
			
		}

		$img_path=Yii::app()->basePath.'/../img/'.$model->bri_img;
		
		if(!file_exists($img_path)){
			
			$img_path=$this->baseurl.'images/404img.gif';
		
			$widchar=" width='450' height='450' ";
		
		}else{
			
			list($width,$height,$type,$attr)=getimagesize($img_path);
			
			$widchar=$this->kermitBase->getNewsize($width,$height);
			
			$img_path="{$this->baseurl}img/{$model->bri_img}";
		
		}
		
		$imgchar="<div class='art_img'><img src='$img_path' alt='{$model->bri_month}月{$model->bri_day}日出生的人幸运花是{$model->bri_huaname},诞生石是{$model->bri_dansheng}' /></div>";

		
		
		$this->render('view',array(
		
			'model'=>$model,
			'imgchar'=>$imgchar,
			
			));
		
	}


	public function loadModel($id){
		
		$model=HisBrith::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}

}
