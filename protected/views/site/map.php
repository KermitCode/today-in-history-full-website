	<div class="article"> 
	  <div class="arttitle">
      <div class="daytit"><h2>��ʷ�ϸ����ڷ����Ĵ��¼���Ӣ˫��</h2></div>
      <div class="list" id="sitemap"><ul id="sitemap">
      <?php for($m=1;$m<13;$m++){
		  		//����1�¡�3�¡�5�¡�7�¡�8�¡�10�¡�12��Ϊ31�죻4�¡�6�¡�9�¡�11��Ϊ30�죻2��Ϊ28��(����Ϊ29��)
				$day31=array(1,3,5,7,8,10,12);
				if(in_array($m,$day31)) $daynum=31;
				elseif($m==2) $daynum=29;
				else $daynum=30;	
		  		for($d=1;$d<=$daynum;$d++){
					$mdchar=$this->showMonth->month_arr[$m].' '.$d.'th';
					$ldate=$this->showMonth->makeDate($m,$d);
					echo "<li><a href='".$this->createUrl('Site/index',array('date'=>$ldate))."'>��ʷ�ϵĽ���{$m}��{$d}��,��ʷ��{$m}��{$d}�շ�������,��ʷ�ϵ�{$m}��{$d}��</a></li>";
					echo "<li><a href='{$this->webset['web_url']}/en.php/Site/index/date/{$ldate}'>Event occurred on {$mdchar} in history,What happened in China on {$mdchar} in history</a></li>";
				}
		  }?>
      </ul></div>
      
      <div class="daytit" style="margin-top:20px;"><h2>һ��365��ÿ������������˻��͵���ʯ��Ӣ˫��</h2></div>
      <div class="list" id="sitemap"><ul id="sitemap">
      <?php for($m=1;$m<13;$m++){
		  		//����1�¡�3�¡�5�¡�7�¡�8�¡�10�¡�12��Ϊ31�죻4�¡�6�¡�9�¡�11��Ϊ30�죻2��Ϊ28��(����Ϊ29��)
				$day31=array(1,3,5,7,8,10,12);
				if(in_array($m,$day31)) $daynum=31;
				elseif($m==2) $daynum=29;
				else $daynum=30;	
		  		for($d=1;$d<=$daynum;$d++){
					$mdchar=$this->showMonth->month_arr[$m].' '.$d.'th';
					$ldate=$this->showMonth->makeDate($m,$d);
					echo "<li><a href='".$this->createUrl('HisBrith/view',array('date'=>$ldate))."'>{$m}��{$d}�ճ�������,{$m}��{$d}�ճ����������˻�,{$m}��{$d}�ճ������˵���ʯ</a></li>";
					echo "<li><a href='{$this->webset['web_url']}/en.php/HisBrith/view/date/{$ldate}'>Born on {$mdchar} lucky flower,Born on {$mdchar} Birthstone</a></li>";
					}
		  }?>
      </ul></div>
      
      <div class="daytit" style="margin-top:20px;"><h2>һ��365������ڳ������˵��Ը��ص㼰��ȱ��</h2></div>
      <div class="list" id="sitemap"><ul id="sitemap">
      <?php for($m=1;$m<13;$m++){
		  		//����1�¡�3�¡�5�¡�7�¡�8�¡�10�¡�12��Ϊ31�죻4�¡�6�¡�9�¡�11��Ϊ30�죻2��Ϊ28��(����Ϊ29��)
				$day31=array(1,3,5,7,8,10,12);
				if(in_array($m,$day31)) $daynum=31;
				elseif($m==2) $daynum=29;
				else $daynum=30;	
		  		for($d=1;$d<=$daynum;$d++){
					$mdchar=$this->showMonth->month_arr[$m].' '.$d.'th';
					$ldate=$this->showMonth->makeDate($m,$d);
					echo "<li><a href='".$this->createUrl('HisXingzuo/view',array('date'=>$ldate))."'>{$m}��{$d}�ճ���������Ҫ����,{$m}��{$d}�ճ��������ŵ�ȱ��</a></li>";
					echo "<li><a href='{$this->webset['web_url']}/en.php/hisXingzuo/view/date/{$ldate}'>The main features of the people born on {$mdchar}</a></li>";
				}
		  }?>
      </ul></div>
      
      </div>
  </div>