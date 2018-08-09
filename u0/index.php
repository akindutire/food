<?php
	

	include_once('../class/users.php');
	include_once('../include/settings.php');

	use cliqsFrameWork\users\INCLUDES as INCLUDES;
	use cliqsFrameWork\users\IMG as IMG;
 	use cliqsFrameWork\users\CA as C;



	use cliqsFrameWork\users\user as me;
	use cliqsFrameWork\users\connect as connectme;
	use cliqsFrameWork\users\performance as ivalid;
	use cliqsFrameWork\users\records as records;
	
	$me=new me();
	$connectme=new connectme();
	$checkme=new ivalid();
	$record=new records();
		


	header('Content-Type:text/html; charset=utf-8');



	$view=@(string)trim(stripslashes($_GET['ref']));



if($view!=null){

	if(is_readable(__DIR__."/$view/index.php")){

		include(__DIR__."/$view/index.php");

	}else{

		include("../404.html");
	}

}else{
	
	if(is_readable(__DIR__."/cpanel/index.php")){

			include(__DIR__."/cpanel/index.php");

		}else{

			echo "App::init() Error, App Fail to Initialize";
		}

	}
	

?>

<script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="../js/check.js"></script>