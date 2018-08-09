<?php

	namespace cliqsFrameWork\update;
	
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

	
		$up=$_POST['upid'];
		if($up==1){
			//Update Product
			
			$product_id=(int)$checkme->sanitize(trim(abs($_POST['product_id'])));

			$des=(string)$checkme->sanitize(trim(ucwords($_POST['des'])));

			$unit_price=(int)$checkme->sanitize(trim(abs($_POST['uprice'])));

			$cost_price=(int)$checkme->sanitize(trim(abs($_POST['cprice'])));

			$discount=(int)$checkme->sanitize(trim(abs($_POST['discount'])));

			$qty=(int)$checkme->sanitize(trim(abs($_POST['qty'])));

			$cur_qty=(int)$checkme->sanitize(trim(abs($_POST['cur_qty'])));


			if(filter_var($product_id,FILTER_VALIDATE_INT)	|| 	filter_var($unit_price,FILTER_VALIDATE_INT)	|| filter_var($discount,FILTER_VALIDATE_INT)	||	filter_var($qty,FILTER_VALIDATE_INT) )

				$me->UpdatePro($product_id,$qty,$discount,$cost_price,$unit_price,$des,$cur_qty);
			else
				echo "Invalid Input";

		}else if($up==2){
			//

			
			//$me->addproduct($product,$cat,$unit_price,$cost_price,$discount,$qty,$des);

		}else if($up==3){
			
			}
	


?>