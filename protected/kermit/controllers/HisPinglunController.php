<?php

/*
  kermit:pinglun 
  useful:controller
  */
  
class HisPinglunController extends Controller{

	public $layout='//layouts/column2';

//kermit:2013-1-12

	public function beforeAction(){
		
		if($this->baseLoad()) return true;
		
	}
	
//delete pinglun

	public function actionDelete($id){
		
		$this->loadModel($id)->delete();
		
		$this->kermitBase->msg_show('成功删除!');
		
	}
	
//delete pinglun

	public function actionUpdate($id){
		
		$model=$this->loadModel($id);
		
		$model->pl_visible=$model->pl_visible==0?1:0;
		
		$model->save(false);
		
		$this->kermitBase->msg_show('修改成功!');
		
	}

//pinglun list

	public function actionIndex(){
		
		$dataProvider=new CActiveDataProvider('HisPinglun',array(
						'criteria'=>array(
								'with'=>array('title'),
								'order'=>'pl_id desc',
							),	
						));
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
		
		));
	
	}

//base function of load data

	public function loadModel($id){
		
		$model=HisPinglun::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


	
	
}//end class
