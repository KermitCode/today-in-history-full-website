<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->page_title;?></title>
<meta name="keywords" content="<?php echo $this->page_keyword;?>" />
<meta name="description" content="<?php echo $this->page_description;?>" />
<?php if(BAN_LANGUAGE=='chinese'){?>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<?php }else{?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php }?>
<link href="<?php echo $this->baseurl; ?>images/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->baseurl; ?>images/jquery_17min.js"></script>
<script language="javascript">
var thismonth=<?php echo $this->month;?>;
var thisday=<?php echo $this->day;?>;
</script>
<meta name="baidu-site-verification" content="bumUhrTc9N" />
</head>
<body>
<div class="main"><!--main start-->
<!--top start-->
	<div id="top">
    	<div class="topmess"><div class="mess">
        <div class="left"><?php echo $this->pagestips['topd'];?> <span class="special"><?php echo $this->webset['web_url'].' '.$this->pagestips['topjy'];?></span></div>
        <div class="right">
            <a href="<?php echo $this->webset['web_url']; ?>"><?php echo $this->pagestips['chinese'];?></a>&nbsp;&nbsp;<b>|</b>&nbsp;
            <a href="<?php echo $this->webset['web_url']; ?>/en.php" class="special"><?php echo $this->pagestips['english'];?></a>&nbsp;<b>|</b>&nbsp;
             <a href="<?php echo $this->webset['web_url'];?>/sitemap.html"><?php echo $this->pagestips['sitemap'];?></a>&nbsp;<b>|</b>&nbsp;
            <a href="javascript:alert('QQ:2265468867');"><?php echo $this->pagestips['hezuo'];?></a>&nbsp;<b>|</b>&nbsp;
            <a id="keep" href="javascript:void(0);"><?php echo $this->pagestips['shoucang'];?></a>&nbsp;<b>|</b>&nbsp;
			<a id="keep" href="http://www.04007.cn">04007CN</a>
        </div>
        </div></div>
        <div class="logo">
          <div class="logoimg"><a href="<?php echo $this->webset['web_url'];?>"><img src="<?php echo $this->baseurl; ?>images/logo.gif" width="200" height="60" alt="历史上的今天 (history in today)" /></a></div>
          <div class="ad_top"><?php echo stripslashes($this->webset['ad_web_navtop']);?></div>
          <div class="clr"></div>
        </div>
        
        <div class="nav"><div class="navc">
            <div class="menu"><ul>
              <li <?php echo $this->thispage[0];?>><a href="<?php 
			  if(BAN_LANGUAGE=='chinese') echo $this->webset['web_url'];
			  else echo $this->webset['web_url'].'/en.php';?>"><h1><?php echo $this->pagestips['lssdjt'];?></h1></a></li>
              <li <?php echo $this->thispage[1];?>><a href="<?php echo $this->webset['web_url'].$this->createUrl('HisBrith/view');?>"><h1><?php echo $this->pagestips['jthy'];?></h1></a></li>
              <li <?php echo $this->thispage[2];?>><a href="<?php echo $this->webset['web_url'].$this->createUrl('HisXingzuo/view');?>"><h1><?php echo $this->pagestips['jtxz'];?></h1></a></li>
              <li <?php echo $this->thispage[3];?>><a href="<?php echo $this->webset['web_url'].$this->createUrl('HisPinglun/index');?>"><h1><?php echo $this->pagestips['cgpls'];?></h1></a></li>
            </ul></div>
     		<div class="searchform"><form id="formsearch" name="formsearch" method="post" action="<?php echo $this->webset['web_url'].$this->createUrl('HisMain/index');?>">
              <span><input name="keyword" class="keyword" id="keyword" maxlength="80" value="<?php 
			  if($this->keyword=='') echo 'Search:';else echo $this->keyword;?>" type="text" /></span>
              <input name="search" src="<?php echo $this->baseurl; ?>images/searchbut.gif" class="search" type="image" id="go" /></form>
     		</div> 
    	</div></div>
	</div>
<!--top end--> 

<div class="content">
   
 <?php echo $content;?>

</div> 

<!--other cont--> 
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>*<?php echo $this->pagestips['syhy'];?></span></h2>
        <?php echo $this->getYuanhua();?>
      </div>
      <div class="col c2">
        <h2><span>*<?php echo $this->pagestips['syxz'];?></span></h2><p>
        <?php echo $this->getYuanxing();?>
      </p></div>
      <div class="clr"></div>
    </div>
  </div>
<!--other cont end-->  
 
<!--footer-->  
  <div class="footer">
    <div class="footer_resize">
      <p class="link"><a><b><?php echo $this->pagestips['links'];?></b></a>&nbsp;&nbsp;&nbsp;	<?php foreach($this->friend_link as $key=>$row){
		  if(BAN_LANGUAGE=='english') $row['title']=iconv('gbk','utf-8',$row['title']); 
		  echo "<a href='{$row['url']}' target='_blank'>{$row['title']}</a>	&nbsp;&nbsp;&nbsp;";}?></p>
      <p class="bq">
      	<span class="left"><?php echo $this->pagestips['beian'].' '; 
		if(BAN_LANGUAGE=='english') echo iconv('gbk','utf-8',$this->webset['web_beian']);
		else echo $this->webset['web_beian'];?></span>
        <span class="right">&copy; <?php echo $this->pagestips['lssdjt'];?> <?php echo $this->pagestips['address'];?> All Rights Reserved <?php 
		if(BAN_LANGUAGE=='chinese') echo stripslashes($this->webset['web_stat']);
		else echo iconv('gbk','utf-8',stripslashes($this->webset['web_stat']));?></span>
      	<span class="clr"></span>
      </p>
    </div>
  </div><!--footer end-->
</div><!--main end-->
<script type="text/javascript" src="<?php echo $this->baseurl; ?>images/weball.js" defer="defer"></script>
<?php  echo stripslashes($this->webset['ad_web_tanchuang']);//全站弹窗广告：
		echo stripslashes($this->webset['ad_web_duilian']);//全站对联广告?>
</body>
</html>
