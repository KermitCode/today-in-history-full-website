	<div class="article"> 
	  <div class="arttitle">
      <div class="daytit"><h2>历史上各日期发生的大事记中英双版</h2></div>
      <div class="list" id="sitemap"><ul id="sitemap">
      <?php for($m=1;$m<13;$m++){
		  		//其中1月、3月、5月、7月、8月、10月、12月为31天；4月、6月、9月、11月为30天；2月为28天(闰年为29天)
				$day31=array(1,3,5,7,8,10,12);
				if(in_array($m,$day31)) $daynum=31;
				elseif($m==2) $daynum=29;
				else $daynum=30;	
		  		for($d=1;$d<=$daynum;$d++){
					$mdchar=$this->showMonth->month_arr[$m].' '.$d.'th';
					$ldate=$this->showMonth->makeDate($m,$d);
					echo "<li><a href='".$this->createUrl('Site/index',array('date'=>$ldate))."'>历史上的今天{$m}月{$d}日,历史上{$m}月{$d}日发生的事,历史上的{$m}月{$d}日</a></li>";
					echo "<li><a href='{$this->webset['web_url']}/en.php/Site/index/date/{$ldate}'>Event occurred on {$mdchar} in history,What happened in China on {$mdchar} in history</a></li>";
				}
		  }?>
      </ul></div>
      
      <div class="daytit" style="margin-top:20px;"><h2>一年365天每天出生的人幸运花和诞生石中英双版</h2></div>
      <div class="list" id="sitemap"><ul id="sitemap">
      <?php for($m=1;$m<13;$m++){
		  		//其中1月、3月、5月、7月、8月、10月、12月为31天；4月、6月、9月、11月为30天；2月为28天(闰年为29天)
				$day31=array(1,3,5,7,8,10,12);
				if(in_array($m,$day31)) $daynum=31;
				elseif($m==2) $daynum=29;
				else $daynum=30;	
		  		for($d=1;$d<=$daynum;$d++){
					$mdchar=$this->showMonth->month_arr[$m].' '.$d.'th';
					$ldate=$this->showMonth->makeDate($m,$d);
					echo "<li><a href='".$this->createUrl('HisBrith/view',array('date'=>$ldate))."'>{$m}月{$d}日出生的人,{$m}月{$d}日出生的人幸运花,{$m}月{$d}日出生的人诞生石</a></li>";
					echo "<li><a href='{$this->webset['web_url']}/en.php/HisBrith/view/date/{$ldate}'>Born on {$mdchar} lucky flower,Born on {$mdchar} Birthstone</a></li>";
					}
		  }?>
      </ul></div>
      
      <div class="daytit" style="margin-top:20px;"><h2>一年365天各日期出生的人的性格特点及优缺点</h2></div>
      <div class="list" id="sitemap"><ul id="sitemap">
      <?php for($m=1;$m<13;$m++){
		  		//其中1月、3月、5月、7月、8月、10月、12月为31天；4月、6月、9月、11月为30天；2月为28天(闰年为29天)
				$day31=array(1,3,5,7,8,10,12);
				if(in_array($m,$day31)) $daynum=31;
				elseif($m==2) $daynum=29;
				else $daynum=30;	
		  		for($d=1;$d<=$daynum;$d++){
					$mdchar=$this->showMonth->month_arr[$m].' '.$d.'th';
					$ldate=$this->showMonth->makeDate($m,$d);
					echo "<li><a href='".$this->createUrl('HisXingzuo/view',array('date'=>$ldate))."'>{$m}月{$d}日出生的人主要特征,{$m}月{$d}日出生的人优点缺点</a></li>";
					echo "<li><a href='{$this->webset['web_url']}/en.php/hisXingzuo/view/date/{$ldate}'>The main features of the people born on {$mdchar}</a></li>";
				}
		  }?>
      </ul></div>
      
      </div>
  </div>