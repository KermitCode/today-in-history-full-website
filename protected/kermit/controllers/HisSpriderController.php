<?php

class HisSpriderController extends Controller{

	public $layout='//layouts/column2';

//2013-1-1

	public function beforeAction(){
		
		if($this->baseLoad()) return true;
		
	}

//delete data

	public function actionDelete($id){
		
		$this->BaseRight(1);
		
		$this->loadModel($id)->delete();
		
		$this->kermitBase->msg_show('删除成功！');

	}

//list data

	public function actionIndex($sprider=''){

		if($sprider!='' && $sprider!=='0') $sql="sprider='{$sprider}'";
		
		else $sql='';
		
		$dataProvider=new CActiveDataProvider('HisSprider',array(
						'criteria'=>array(
							'order'=>'id desc',
							'condition'=>$sql,
							),
						'pagination'=>array(
							'pageSize'=>12,
							),
					));
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
			'sprider'=>$sprider,
			
					));
	
	}
	
//table list

	public function actiontable(){
		
		$this->BaseRight(1);
		
		$result=Yii::app()->db->createCommand("SHOW TABLE STATUS")->query()->readAll();

		$this->render('table',array(
			
				'result'=>$result,
		
					));
		
		}

//clear all data

	public function actionClear(){
		
		$this->BaseRight(1);
		
		Yii::app()->db->createCommand("delete from his_sprider")->query();
		
		$this->kermitBase->msg_show('成功清除！');

	}
	
	public function loadModel($id){
		
		$model=HisSprider::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}


	protected function performAjaxValidation($model){
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='his-sprider-form')
		
		{
			echo CActiveForm::validate($model);
			
			Yii::app()->end();
			
		}
		
	}
	
	
}//end class