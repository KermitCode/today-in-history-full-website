<?php

/*
 *for qingdaonews uploadimg
 *kermit 2012-10-17
 *make upload image 400*300PX  
 */


class UploadImg{
	
	public $imgpath;										//the place store image
	
	private $img_face=array('width'=>200,'height'=>150);	//the width and height change image to
	
	private $imgname='';									//the fix upload image name
	
	private $maxsize=5120000;								//the limited image size:500KB
		
	private $uptypes=array('image/jpg', 'image/jpeg','image/png','image/pjpeg','image/gif','image/bmp','image/x-png'); //the image type limited

public function __construct($imgpath='',$imgname='',$img_face='',$maxsize='',$uptypes=''){
	
	$args_arr=func_get_args();
	
	$args_array=array('imgpath','imgname','img_face','maxsize','uptypes');
	
	foreach($args_arr as $key=>$value){
		
		if($value!='') $this->$args_array[$key]=$value;
	
		}//end foreach
		
	unset($args_arr,$args_array,$key,$value);
	
	if(!$this->imgpath) exit('img filepath is not assign!');
	
}//end function--1

//$mane:the image file form name and this function return the end image file path

public function upload_imgfile($name){
	
	if($name=='' || !is_uploaded_file($_FILES[$name]['tmp_name'])) return;

	$imagefile=$_FILES[$name];
	
	if($this->maxsize<$imagefile["size"]) exit('文件大小不能超过'.intval(($this->maxsize)/1024).'Kb!');

  	if(!in_array($imagefile["type"],$this->uptypes)) exit("文件类型{$imagefile['type']}不符!");
        
	$img_path=$this->imgpath;

	$file_name=$imagefile["name"];

	if($this->imgname!=''){
		
		$return_back=$img_path.$this->imgname.substr($file_name,strrpos($file_name,'.'));
	
		$newname_back=$this->imgname.substr($file_name,strrpos($file_name,'.'));
	
	}else{//auto make file name
		
			if(file_exists($img_path.$file_name)){//check file is or not exist
			
				$return_back=$img_path.date("mdHis").rand(1,99).substr($file_name,strrpos($file_name,'.'));
			
			}else $return_back=$img_path.$file_name;
	
	}
	
	if(!move_uploaded_file($imagefile["tmp_name"],$return_back)) exit("图片上传出错");
	
	//change file size to the fix size
	
	if($this->img_face['width']) $this->change_size_2($return_back);
	
	return $newname_back;

}//end function--2

//按$class值：1返回由imgname创建出来的图像 0将imgfile图像流输出至浏览器

public function create_imgfile($imgname,$imgtype,$class=1,$imgfile=''){

	switch($imgtype){
		
		case 1:if($class) return imagecreatefromgif($imgname);
			   else imagejpeg($imgfile,$imgname);break;
			   
		case 2:if($class) return imagecreatefromjpeg($imgname);
			   else imagejpeg($imgfile,$imgname);break;
			   
		case 3:if($class) return imagecreatefrompng($imgname);
			   else imagepng($imgfile,$imgname);break;
			   
		case 6:if($class) return imagecreatefromwbmp($imgname);
			   else imagewbmp($imgfile,$imgname);break;
			   
		default:exit("不支持的文件类型");

		}

}//end function 3

//make image to the fix size:type 1 use white to fit the blank place	
	
public function change_size($img,$rgb=array(255,255,255)){
	
		$maxwidth=$this->img_face['width'];
		
		$maxheight=$this->img_face['height'];

		list($width,$height,$type,$attr)=getimagesize($img);
		
		list($red,$green,$blue)=$rgb;
	
		$widthratio=$heightratio=1;
		
		if($width>$maxwidth){$widthratio=($maxwidth/$width);}
				
		if($height>$maxheight){$heightratio=($maxheight/$height);}
	
		$ratio=$widthratio<$heightratio?$widthratio:$heightratio;
		
		$newwidth=$width*$ratio; $newheight=$height*$ratio;
		
		$dst_x=($maxwidth-$newwidth)/2;
		
		$dst_y=($maxheight-$newheight)/2;
		
		$im=$this->create_imgfile($img,$type,1);
				
	    if(function_exists("imagecopyresampled")){
	
	  		   $newim=imagecreatetruecolor($maxwidth,$maxheight);
			   
			   $color=imagecolorallocate($newim,$red,$green,$blue);
			   
			   imagefill($newim,0,0,$color);
	  
	  		   imagecopyresampled($newim,$im,$dst_x,$dst_y,0,0,$newwidth,$newheight,$width,$height);
  
	    }else{

			   $newim = imagecreate($maxwidth,$maxheight);
			   
			   $color=imagecolorallocate($newim,$red,$green,$blue);

			   imagefill($newim,0,0,$color);
		
			   imagecopyresized($newim,$im,$dst_x,$dst_y,0,0,$newwidth,$newheight,$width,$height);

	    }
						
		ImageJpeg($newim,$img);

		ImageDestroy($newim);

	return $img;
	
}//end function 4
	
//make image to the fix size:type2 make suit size image	
	
public function change_size_2($img,$rgb=array(255,255,255)){
	
		$maxwidth=$this->img_face['width'];
		
		$maxheight=$this->img_face['height'];

		list($width,$height,$type,$attr)=getimagesize($img);
		
		list($red,$green,$blue)=$rgb;

		$fixradio=$maxwidth/$maxheight;
		
		$srcradio=$width/$height;

		if($srcradio>$fixradio){//widther image
			
			$srcheight=$height;
			
			$srcwidth=$height*$fixradio;
			
		}else{
			
			$srcwidth=$width;
			
			$srcheight=$srcwidth/$fixradio;
			
			}

		$im=$this->create_imgfile($img,$type,1);
				
	    if(function_exists("imagecopyresampled")){
	
	  		   $newim=imagecreatetruecolor($maxwidth,$maxheight);
			   
			   $color=imagecolorallocate($newim,$red,$green,$blue);
			   
			   imagefill($newim,0,0,$color);
	  
	  		   imagecopyresampled($newim,$im,0,0,0,0,$maxwidth,$maxheight,$srcwidth,$srcheight);
  
	    }else{

			   $newim = imagecreate($maxwidth,$maxheight);
			   
			   $color=imagecolorallocate($newim,$red,$green,$blue);

			   imagefill($newim,0,0,$color);
		
			   imagecopyresized($newim,$im,0,0,0,0,$maxwidth,$maxheight,$srcwidth,$srcheight);

	    }
						
		ImageJpeg($newim,$img);

		ImageDestroy($newim);

	return $img;
	
}//end function 5

	
}//end class


?>





