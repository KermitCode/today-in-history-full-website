<?php

class HisErrorsController extends Controller{
	
	public $layout='//layouts/column2';

//kermit:2013-1-1

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

	public function actionIndex(){
		
		$dataProvider=new CActiveDataProvider('HisErrors',array(
						'criteria'=>array(
							'order'=>'id desc',
							),
						'pagination'=>array(
							'pageSize'=>14,
							),
					));
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
		
		));
		
	}
	
//list content image

	public function actionView($id){
		
		if(!$id) exit('no id value');
		
		$rs=Yii::app()->db->createCommand("select * from his_main_img where img_contid={$id}")->query()->readAll();
		
		$this->render('view',array(
			
			'rs'=>$rs,
			'id'=>$id,
		
		));
		
	}
	
//delete img 

	public function actionchanimg($id){
		
		if(!$id) exit('no image id');
		
		$rs=Yii::app()->db->createCommand("select * from his_main_img where img_id={$id}")->query()->read();
		
		if(!$rs) $this->kermitBase->msg_show('图片记录不存在！');
		
		Yii::app()->db->createCommand("delete from his_main_img where img_id={$id}")->query();
		
		//delete image file
		
		@unlink(Yii::app()->basePath."/../img/uploak/{$rs['img_url']}");
		
		$this->kermitBase->msg_show('删除成功！');
		
	}
	
	public function loadModel($id){
		
		$model=HisErrors::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}


}//end class