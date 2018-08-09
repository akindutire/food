<?php
	
	namespace cliqsFrameWork\add;
	
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

	
		$ad=$_POST['addid'];
		if($ad==1){
			//Add category
			
			$cat=(string)ucwords(stripslashes($_POST['cat']));
			$me->addcat($cat);

		}else if($ad==2){
			//Add product

			$product=(string)trim(ucwords(stripcslashes($_POST['product'])));

			$des=(string)trim(ucwords(stripcslashes($_POST['des'])));

			$cat=(int)trim(abs($_POST['cat']));

			$unit_price=(int)trim(abs($_POST['uprice']));

			$cost_price=(int)trim(abs($_POST['cprice']));

			$discount=(int)trim(abs($_POST['discount']));

			$qty=(int)trim(abs($_POST['qty']));
			
			$me->addproduct($product,$cat,$unit_price,$cost_price,$discount,$qty,$des);

		}else if($ad==3){
			//Add to my Cart
			$product_id=$checkme->sanitize(abs($_POST['product']));
			$qtyorder=$checkme->sanitize(abs($_POST['qtyorder']));

				if(filter_var($product_id,FILTER_VALIDATE_INT) && filter_var($qtyorder,FILTER_VALIDATE_INT)){

					$me->Add_to_Cart($product_id,$qtyorder,$_SESSION['exploreID']);

				}else{

					echo "Invalid Input";
				}
		}else if($ad==4){
			//Add An Order
			$exploreid=$checkme->sanitize(ucwords($_POST['explore']));
			$cname=$checkme->sanitize(ucwords($_POST['cname']));
			$addr=$checkme->sanitize(ucwords($_POST['addr']));
			$tel=$checkme->sanitize(ucwords($_POST['tel']));
			$city=$checkme->sanitize(ucwords($_POST['city']));
			$sex=$checkme->sanitize(ucwords($_POST['sex']));

			if(is_string($cname) && is_string($city)){
					
					$exploreid=base64_decode($exploreid);

					$me->Complete_Order($exploreid,$cname,$addr,$tel,$city,$sex);

			}else{

				echo "Invalid Field Format";

			}
		}else if($ad==5){
			//Add Payment
			$trans_type=$checkme->sanitize($_POST['trans_type']);
			$manual_discount=$checkme->sanitize($_POST['manual_discount']);
			$price=$checkme->sanitize($_POST['price']);
			$order=$checkme->sanitize($_POST['orderid']);
			
			$price-=$manual_discount;
			
			
			$me->makepayment($order,$manual_discount,$price,$trans_type);	

				header("location:../admin/index.php?ref=transaction&hcomponent=2&trans=$trans_type&order=$order");
			
			
		}


?>