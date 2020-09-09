<?php

class HisBrithController extends Controller{
	
	public $layout='//layouts/column2';

//kermit:2013-1-1

	public function beforeAction(){
		
		if($this->baseLoad()) return true;
		
	}

//modify birthpage

	public function actionUpdate($id){
		
		$model=$this->loadModel($id);

		if(isset($_POST['HisBrith'])){
			
			$model->attributes=$_POST['HisBrith'];
			
			if($model->save())
			
			$this->kermitBase->msg_show('ÐÞ¸Ä³É¹¦!',$this->createUrl('HisBrith/update',array('id'=>$model->bri_id)));
				
		}

		$this->render('update',array(
		
			'model'=>$model,
			
		));
		
	}

//list all birthpages

	public function actionIndex(){
		
		$dataProvider=new CActiveDataProvider('HisBrith');
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
		
		));
	
	}

//base funciton

	public function loadModel($id){
		
		$model=HisBrith::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}//end class
