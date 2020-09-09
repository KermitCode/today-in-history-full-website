<?php

class HisXingzuoController extends Controller{

	public $layout='//layouts/column2';

//kermit:2013-1-1

	public function beforeAction(){
		
		if($this->baseLoad()) return true;
		
	}

//update xingzuo language

	public function actionUpdate($id){
		
		$model=$this->loadModel($id);

		if(isset($_POST['HisXingzuo'])){
			
			$model->attributes=$_POST['HisXingzuo'];
			
			if($model->save())
			
				$this->kermitBase->msg_show('ÐÞ¸Ä³É¹¦!',$this->createUrl('HisXingzuo/update',array('id'=>$model->xz_id)));
				
		}

		$this->render('update',array(
		
			'model'=>$model,
			
		));
		
	}

//list xingzuo 

	public function actionIndex(){
		
		$dataProvider=new CActiveDataProvider('HisXingzuo');
		
		$this->render('index',array(
		
			'dataProvider'=>$dataProvider,
			
		));
		
	}

//base function of load data
	
	public function loadModel($id){
		
		$model=HisXingzuo::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}
	

}//end class