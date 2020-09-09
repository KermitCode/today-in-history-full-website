<?php


class HisMainController extends Controller{
	
	public function beforeAction(){
		
			$this->baseLoad(0);
			
			return true;
			
	}


	public function actionInterface($date='')
	{

		$main_rs=Yii::app()->db->createCommand("select ls_id,ls_title,ls_class,ls_year,ls_month,ls_day from his_main where publiced=1 and ls_month='{$this->month}' and ls_day
='{$this->day}' order by ls_year desc limit 8")->query()->readAll();
        $main_rs_last=array();
        $ids = array();
        foreach($main_rs as $key=>$row){
            $main_rs_last[$row['ls_id']]=$row;
            $ids[] = $row['ls_id'];
        }   
        $temp = current($main_rs_last);
        $first_id = $temp['ls_id'];

        $main_rs_last[$first_id]['img'] = ''; 
        $image_rs=array();
        $ids_char = implode(',', $ids);
        if($ids) $image_rs = Yii::app()->db->createCommand("select img_contid,img_url from his_main_img where img_contid in ({$ids_char}) order by field(img_contid,{$ids_char
}) limit 1")->query()->read();
        if($image_rs)
        {   
            $main_rs_last[$image_rs['img_contid']]['img'] = $image_rs['img_url'];
        }   
            
        #echo '<pre>';
        #print_r($main_rs_last);
        #echo '</pre>';

        echo '<ul>';
            foreach($main_rs_last as $id=>$row){
                if($row['img']){
                    echo "<li style='max-width:400px;height:auto;text-align:center;padding-bottom:1px;'><a href='http://history.04007.cn/HisMain/{$id}.html' target='_blank' t
itle='{$row['ls_title']}'><img class='img-thumbnail'  style='width:400px;' title='{$row['ls_title']}' alt='{$row['ls_title']}' src='http://history.04007.cn/img/uploak/{$row['
img']}'></a></li>";
                }
                echo "<li><a href='http://history.04007.cn/HisMain/{$id}.html' title='{$row['ls_title']}' target='_blank'>[{$row['ls_year']}年{$row['ls_month']}月{$row['ls_da
y']}日]{$row['ls_title']}</a></li>";
            }
        echo '</ul>';
	}
//展示内容页

	public function actionView($id){
		
		$pinglun=Yii::app()->db->createCommand("select * from his_pinglun where pl_main_id={$id} and pl_visible=1 order by pl_id desc")->query()->readAll();
		
		$model=$this->loadModel($id);
		
		if(BAN_LANGUAGE=='english') $model->ls_title=$model->ls_englishtit;
		
		$month=$model->ls_month;
		
		$day=$model->ls_day;
		
		$year=$model->ls_year;
		
		if(BAN_LANGUAGE=='chinese'){
			
			$this->page_title="{$model->ls_year}年{$model->ls_month}月{$model->ls_day}日-".$model->ls_title."-".$this->page_title;
			$this->page_keyword="{$model->ls_year}年{$model->ls_month}月{$model->ls_day}日-".$model->ls_title.",历史上的{$model->ls_month}月{$model->ls_day}日,历史上{$model->ls_month}月{$model->ls_day}日发生的大事";
			$this->page_description=htmlspecialchars($this->kermitBase->str_cut(strip_tags($model->ls_cont),250,''));
		
		}else{
			
			$this->page_title=$this->showMonth->getMonthname($model->ls_month)." {$model->ls_day}.".$model->ls_year.$model->ls_title.'-Today in History';
			$this->page_keyword=$this->showMonth->getMonthname($model->ls_month)." {$model->ls_day}.".$model->ls_year.$model->ls_title.',what happened on '.$this->showMonth->getMonthname($model->ls_month)." {$model->ls_day}";
			$this->page_description=$this->page_title;
		
		}
		
		$preid=Yii::app()->db->createCommand("select ls_id from his_main where ls_month='{$month}' and ls_day='{$day}' and ls_year>{$year} order by ls_year asc,ls_id desc limit 1")->query()->read();
		
		$nextid=Yii::app()->db->createCommand("select ls_id from his_main where ls_month='{$month}' and ls_day='{$day}' and ls_year<{$year} order by ls_year desc,ls_id desc limit 1")->query()->read();	
		
		if($preid) $preid=$preid['ls_id'];
		
		if($nextid) $nextid=$nextid['ls_id'];
		
		$model->updateCounters(array('ls_views'=>1),"ls_id={$id}");
		
		$this->render('view',array(
	
			'model'=>$model,
			'pinglun'=>$pinglun,
			'nextid'=>$nextid,
			'preid'=>$preid,
			'id'=>$id,
		
		));

	}
	
	//search main things
	
	public function actionIndex(){
		
		$keyword=$this->kermitBase->getPostchar('keyword');
		
		if($keyword=='') $keyword=$this->kermitBase->getGetchar('keyword');
		
		if($keyword!=''){
			
			$_GET['keyword']=$keyword;
			
			$this->keyword=$keyword;
			
			if(BAN_LANGUAGE=='chinese') $cond="ls_title like '%$keyword%'";
			
			else $cond="ls_englishtit like '%$keyword%'";
			
			$dataProvider=new CActiveDataProvider('HisMain',array(
								'criteria'=>array(
									'order'=>'ls_id desc',
									'condition'=>$cond,
									),
								'pagination'=>array(
									'pageSize'=>40,
									),	
							));
			
		}else $dataProvider=null;
		
		$this->render('index',array(
		
			'dataProvider'=>$dataProvider,
			
			));	
		
	}

	public function loadModel($id){
		
		$model=HisMain::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}
