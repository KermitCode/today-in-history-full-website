<?php



class Controller extends CController{



	public $layout='//layouts/column1';

	public $webset;

	public $kermitBase;

	

	//only check admin login

	

	public function baseLoad($check=false){



		if(!Yii::app()->session['admin']){

			

			header("Location:".$this->createUrl('Site/login'));

			

			exit;

			

		}

		$this->webset=require(Yii::app()->basePath."/coreData/webset.php");

		$this->kermitBase=new kermitBase();

		

		return true;



	}//end function

	

	public function BaseRight($right=1){

		

		//check super admin right;:1=>admin 2=>superadmin

		

		if($right==1){

			

				if(Yii::app()->session['admin']!='admin' && Yii::app()->session['admin']!='adminer')

				

					$this->kermitBase->msg_show('你无权进行此操作!');

		

		 }else{

			 

			 	if(Yii::app()->session['admin']!='adminer')

				

					$this->kermitBase->msg_show('你无权进行此操作!');

			 

			 }

		

		//only check admin right

		

	}

	

	

	

	

	

	

	

}