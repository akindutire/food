<?php
	
	namespace cliqsFrameWork\upload;
	
	include_once('../include/settings.php');
	

	$project='cphp/food';

	define('X',101);
	define('M',"http://".$_SERVER['HTTP_HOST']."/$project/");
	define('IMG',"http://".$_SERVER['HTTP_HOST']."/$project/images/");
	define('UPLOADS',"http://".$_SERVER['HTTP_HOST']."/$project/uploads/");
	
	function compress_image($source,$destination,$quality){
	
		$info=getimagesize($source);

			if($info['mime']=='image/jpeg'){

				$image=imagecreatefromjpeg($source);
	
			}else if($info['mime']=='image/gif'){

				$image=imagecreatefromgif($source);

			}else if($info['mime']=='image/png'){

				$image=imagecreatefrompng($source);

			}

		imagejpeg($image,$destination,$quality);
		return $destination;

	}



	$name=strtolower($_FILES['file']['name']);
	$type=$_FILES['file']['type'];
	$size=(int)($_FILES['file']['size']);
	$tmp=$_FILES['file']['tmp_name'];
	

	
	
	if(@getimagesize($tmp)){	/*Check If file is image*/
	
		$arraytype=array('image/jpeg','image/jpg','image/png');
		
		if(!empty($name)){	/*Check If file empty*/
			
			if(in_array($type,$arraytype)){		/*does file have demanded extension*/

				if($size<=(800*1024) and !empty($size)){	/*Check if filesize is below assigned Limit *****thing*byte(1024), 1024byte==1kb*/


					#Append Upload timestamp to file to avoid data Collision
					$filename=time().$name;

					
					#Move file to web filesytem
					if(move_uploaded_file($tmp,'../uploads/product/del/'.$filename)){
						
						#Compress File to Save Bandwidth
						compress_image('../uploads/product/del/'.$filename,'../uploads/product/thumbdel/'.$filename,40);


					
						#Assign A Session to File For Global Reasons
						$_SESSION['funame']=$filename;

						
						#Create A Thumbnail;
						
						
						
						
						//Return A FLAG As Success in its Upload
						echo X;



						}else{
							printf("<img src='%scancel.png' width='auto' height='13px'>System Error: Couldn't Complete File Submission",IMG);
							}
					
					
					}else{
						printf("<img src='%scancel.png' width='15px' height='15px'>&nbsp;File too large, upload below 800kb",IMG);
						}
			}else{
				printf("<img src='%scancel.png' width='15px' height='15px'>&nbsp;Unsupported File format, Suggest Using jpeg,jpg or gif file",IMG);
				}
		}else{
			printf("<img src='%scancel.png' width='15px' height='15px'>&nbsp;No File Selected",IMG);
			}
	}else{
		printf("<img src='%scancel.png' width='15px' height='15px'>&nbsp;Please Upload A Real Image File",IMG);
		}
exit();	
?>