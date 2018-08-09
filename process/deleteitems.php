<?php
	
	namespace cliqsFrameWork\delete;
	
	//@param-class || subclass
	
	include_once('../include/settings.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\users\X as X;
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

		

		$dv=$_POST['deleteid'];
		if($dv==1){
			//Delete A Category
			
			foreach ($_POST['catcheck'] as $cat_id) {
			
				$me->DeleteCat($cat_id);	
				
			}

			$sql=mysqli_query($link,"DELETE FROM products WHERE cat_id='$cat_id'") or die("Couldn't Proceed Delete, An Error Occured");
				if($sql)
					echo X;			
			//End Delete Cat.

		}else if($dv==2){
			//Delete A Product
			
			foreach ($_POST['procheck'] as $pro_id) {
			
				$me->DeletePro($pro_id,1);	
				echo X;
			}
		}else if($dv==3){
			//Delete From cart
			
			foreach ($_POST['prolist'] as $pro_id) {
			
				if ($me->DeletePro($pro_id,2)==1) {
					$set_me=true;	
				}else{
					$set_me=false;
				}	
			}

			if ($set_me) 
				echo X;
			else
				echo "Couldn't Update Server, try again later";
		}

exit();
?>