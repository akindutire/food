<?php
	
	namespace cliqsFrameWork\retrieve;
	
	//@param-class || subclass
	
	include_once('../include/settings.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\users\user as me;
	use cliqsFrameWork\users\connect as connectme;
	use cliqsFrameWork\users\performance as ivalid;
	use cliqsFrameWork\users\records as records;
	
	$me=new me();
	$connectme=new connectme();
	$checkme=new ivalid();
	$record=new records();


			$connectme->iconnect();
			$checkme->checkSys();

	
		$rv=$_POST['retrieveid'];
		if($rv==1){
			//Load Active Categories

			$record->getCategoryActiveList();
			
		}else if($rv==2){
			//Load Active Products

			$record->getProductActiveList($_POST['cat']);
			
		}else if($rv==3){
			//Retrieve Items On Cart
			
			$record->get_Basket_Content($_SESSION['exploreID']);
			
		}else if($rv==4){
			//Retrieve Customer ID
			
			$orderid=$_POST['orderid'];
			$record->get_customer_id($orderid);

			
		}else if($rv==5){
			//Retrieve Borrowers
			
			
			}
			
		
		
	
	exit();
?>