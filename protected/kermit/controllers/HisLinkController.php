<?php

class HisLinkController extends Controller{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

//kermit:2012-11-3 adminer checker
	
	public function beforeAction(){	
			
		if($this->baseLoad()) return true;
			
	}

//create php cache file kermit:2012-11-11

	public function makeLinkfile(){
		
		$models=HisLink::model()->findAll(array('order'=>'lk_hot desc','condition'=>'lk_state=1'));
		
		$writechar="<?php\r\n/*\r\n*file:linkweb file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';
		
		foreach($models as $model){
			
			$writechar.="\r\n\t{$model->lk_id}=>array('title'=>'{$model->lk_title}','url'=>'{$model->lk_url}'),";
			
			}
		
		$writechar.="\r\n\t);\r\n?>";
		
		$this->kermitBase->createFile($writechar,Yii::app()->basePath.'/coreData/friend_link.php');
		
		}

//add new link kermit:2012-11-11

	public function actionCreate(){
		
		$model=new HisLink;

		if(isset($_POST['HisLink'])){
			
				$this->BaseRight(1);
			
				if($_POST['HisLink']['lk_title']=='' || $_POST['HisLink']['lk_title']==''){
					
					$this->kermitBase->msg_show('��վ���ƺ�URL����Ϊ�գ�');
					
					}
				
				$_POST['HisLink']['lk_datetime']=date("Y-m-d H:i:s");
				
				$_POST['HisLink']['lk_state']=1;
	
				$model->attributes=$_POST['HisLink'];
				
				$model->save(false);
				
				$this->makeLinkfile();
					
				$this->kermitBase->msg_show('�����ɹ�!',$this->createUrl('HisLink/index'));
		
			}
		
		$model->lk_url='http://www.';

		$this->render('create',array('model'=>$model,));
		
	}

//kermit:2012-11-11 change linkurl state

	public function actionShow($id){
		
		$this->BaseRight(1);
		
		$model=$this->loadModel($id);
		
		if($model->getattribute('lk_state')) $model->setattribute('lk_state',0);
		
		else $model->setattribute('lk_state',1);
		
		$model->save(false);
		
		$this->makeLinkfile();

		$this->kermitBase->msg_show('�����ɹ�!');
		
	}

//kermit:modify link url

	public function actionUpdate($id){

		$model=$this->loadModel($id);

		if(isset($_POST['HisLink'])){
			
			$this->BaseRight(1);
		
			if($_POST['HisLink']['lk_title']=='' || $_POST['HisLink']['lk_title']==''){
				
				$this->kermitBase->msg_show('��վ���ƺ�URL����Ϊ�գ�');
				
				}
			
			$model->attributes=$_POST['HisLink'];
			
			$model->save(false);
			
			$this->makeLinkfile();
				
			$this->kermitBase->msg_show('�ѳɹ��޸����ӣ�');
		
		}

		$this->render('update',array('model'=>$model,));
	
	}

//delete link url

	public function actionDelete($id){
		
		$this->BaseRight(2);
		
		$this->loadModel($id)->delete();
		
		$this->makeLinkfile();
		
		$this->kermitBase->msg_show('�ѳɹ�ɾ�������ӣ�');

		exit;

	}

//list all link url 

	public function actionIndex(){
		
		$dataProvider=new CActiveDataProvider('HisLink',array(
						'criteria'=>array(
							'order'=>'lk_id desc',
							),
						'pagination'=>array(
							'pageSize'=>12,
							),
					));
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
		
		));
	
	}

//base funcion 

	public function loadModel($id){
		
		$model=HisLink::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}


}//end class