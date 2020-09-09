<?php
/*
maker:kermit
date:2013-1-2
notes:in about date class
email:kermit2011@126.com
*/

class showMonth{

/*******************************************************************************************/

	private $char;                          		  				//传递值
	
	public $year,$month,$day;						

	public $controller;
	
	public $action;
	
	public $predate,$nextdate;
	
	public $month_arr;
	
/*******************************************************************************************/	

//1，alert message or show message page

public function __construct($month='',$day=''){
	
	$this->year=date('Y');
	
	if(!$month) $this->month=date('n');
	
	else $this->month=$month;
	
	if(!$day) $this->day=date('j');
	
	else $this->day=$day;
	
	$this->controller=Yii::app()->controller->id;
	
	$this->action=Yii::app()->controller->getAction()->getId();
	
	if(strtolower($this->controller)=='hismain'){
		
		$this->controller='site';
		
		$this->action='index';
	
	}
	
	$this->setNearday();
	
	$this->month_arr=array(
		1=>'January',
		2=>'February',
		3=>'Marcy',
		4=>'April',
		5=>'May',
		6=>'June',
		7=>'July',
		8=>'August',
		9=>'September',
		10=>'October',
		11=>'November',
		12=>'December'
		);
	
	}
	
//show monthday

public function show_Monthday($date){
	
	if(BAN_LANGUAGE=='chinese') return intval(substr($date,0,2)).'月'.intval(substr($date,2,2)).'日';

	else return intval(substr($date,0,2)).'-'.intval(substr($date,2,2));

	}	
	
//set the next and pre day

public function setNearday(){
	
	$this_month_day=$this->getMonth_day();
	
	if($this->day!=1 && $this->day!=$this_month_day){
		
		$this->predate=$this->makeDate($this->month,$this->day-1);
		
		$this->nextdate=$this->makeDate($this->month,$this->day+1);
		
		
		
	}elseif($this->day==1){
		
		$pre_month=$this->month==1?12:($this->month-1);
		
		$pre_month_day=$this->getMonth_day($pre_month);
		
		$this->predate=$this->makeDate($pre_month,$pre_month_day);
		
		$this->nextdate=$this->makeDate($this->month,2);
		
	}else{
		
		$this->predate=$this->makeDate($this->month,$this->day-1);
		
		$next_month=$this->month==12?1:($this->month+1);
		
		$this->nextdate=$this->makeDate($next_month,1);

		}
		
	return;

	}

//get month func 

public function getMonth_select($month=''){
	
	if(!$month) $month=$this->month;
	
	$char='<select onchange="document.location.href=this.options[this.selectedIndex].value;">';

	$month_arr=$this->month_arr;
	
	for($i=1;$i<13;$i++){
		
		$date=$this->makeDate($i,$this->day);
		
		$url=Yii::app()->controller->webset['web_url'].Yii::app()->createUrl("{$this->controller}/{$this->action}",array('date'=>$this->makeDate($i,$this->day)));
		
		if(BAN_LANGUAGE=='english') $linkchar=$month_arr[$i];
		
		else $linkchar="{$i}月";
		
		if($i==$month) $char.="<option value='{$url}' selected>{$linkchar}</option>";
		
		else $char.="<option value='{$url}'>{$linkchar}</option>";
		
		}
		
	return $char.'</select>';
	
	}

public function getMonth_day($month=''){
	
	if(!$month) $month=$this->month;
	
	$month_day_arr=array(1=>31,2=>28,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);

	if($this->year%4==0 && $month==2) return 31;
	
	else return $month_day_arr[$month];	
	
	}

public function getMonth_char($month='',$day=''){
	
	if(!$month) $month=$this->month;
	
	if(!$day) $day=$this->day;

	$return_char='';
	
	$week_arr=array(1=>'一',2=>'二',3=>'三',4=>'四',5=>'五',6=>'六',7=>'日');
	
	if(BAN_LANGUAGE=='english') $week_arr=array(1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',6=>'Sat',7=>'Sat');
	
	$start=date('N',strtotime(date('Y-').$month.'-1'));

	for($i=$start;$i<7+$start;$i++){
		
		if($i>7) $j=$i-7;
		
		else $j=$i;
		
		$return_char.="<li>{$week_arr[$j]}</li>";	
		
		}
	
	for($i=1;$i<=$this->getMonth_day();$i++){
		
		$url=Yii::app()->controller->webset['web_url'].Yii::app()->createUrl("{$this->controller}/{$this->action}",array('date'=>$this->makeDate($month,$i)));
		
		if($day==$i) $return_char.="<li class='sele'>{$i}</li>";
		
		else $return_char.="<li><a href='{$url}'>{$i}</a></li>";
		
		}
	
	if($this->getMonth_day()%7!=0){
		
		$remain=7-$this->getMonth_day()%7;
		
		$nextmonth=$month==12?1:($month+1);
		
		for($k=1;$k<=$remain;$k++){
			
			$url=Yii::app()->controller->webset['web_url'].Yii::app()->createUrl("{$this->controller}/{$this->action}",array('date'=>$this->makeDate($nextmonth,$k)));
			
			$return_char.="<li class='nemo'><a href='{$url}'>{$k}</a></li>";
			
			}
		
		}
		
	return $return_char;
	
	
}

//make datechar

	public function makeDate($month,$day){
		
		$month=$month<10?('0'.$month):$month;
		
		$day=$day<10?('0'.$day):$day;
		
		return $month.$day;
			
	}	
	
	public function getWeek($week,$number=false){
		
		$week_arr=array(1=>'星期一',2=>'星期二',3=>'星期三',4=>'星期四',5=>'星期五',6=>'星期六',7=>'星期日');
		
		$english_week=array(1=>'Monday',2=>'Tuesday',3=>'Wednesday',4=>'Thurday',5=>'Friday',6=>'Saturday',7=>'Sunday');
		
		if($number) return $week_arr[$week];
		
		else{
			
			return $english_week[array_search($week,$week_arr)];
			
			} 

	}
	
	public function getMonthname($month){

		return $this->month_arr[$month];		
		
	}
	
	
	
	
	
	
}//end class



?>