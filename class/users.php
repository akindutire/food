<?php
namespace cliqsFrameWork\users;


/*	
	Encryption Type: AES
	Database Salt: cliqsdiamond
	App Provider: Cliqs Team
	User Website: realcliqs.com
	Author: Akindutire Ayomide Samuel
	Email: cliqsapp@gmail.com or akindutire33@gmail.com
	GPL Free Licience
	Contact: 08107926083
	Database Encrypted, System Trial Flag Available, And Personalized Script
	
*/

$project='cphp/food';

define('EXKIT','../images/exp.bmp');
define('UPKIT','../conn/update.txt');
define('SIKIT','../include/silent.bmp');
define('RELOCATEKITDIRECTORY','../images/silent.bmp');

define('M',"http://".$_SERVER['HTTP_HOST']."/$project/");
define('IMG',"http://".$_SERVER['HTTP_HOST']."/$project/images/");
define('U0',"http://".$_SERVER['HTTP_HOST']."/$project/u0/");
define('CONN',"http://".$_SERVER['HTTP_HOST']."/$project/conn/");
define('CLASS',"http://".$_SERVER['HTTP_HOST']."/$project/class/");
define('FONTS',"http://".$_SERVER['HTTP_HOST']."/$project/fonts/");


define('X',101);

$link=mysqli_connect('localhost','root','','food');


class connect{
	
	public function iconnect(){
		
			global $link;
			
			if($link){
				
				echo "";

			}else{
				
				die("System Currently Not Available, Try Again Later");
				
				}
		}
	
}

/*This Class Checks The System Integrity*/


class performance{
	
	public static function sanitize($a){
		global $link;

	 	$a=htmlentities(strip_tags(stripslashes($a)));

	 	$a=mysqli_real_escape_string($link,$a);
	 	

	 	return $a;

	}


	public function checkSys(){
		
		global $link;
		
		$sql=mysqli_query($link,"SELECT * FROM performancetab WHERE st='1'") or die('101xFc: Unknown Reference');
		list($id,$start,$exp,$istatus,$lastmin)=mysqli_fetch_row($sql);
	
		if(mysqli_num_rows($sql)==0 && file_exists(EXKIT)==false){ 
			
			
			
			$this->createTrial(10);
		

		}else if(file_exists(EXKIT)==false){
		
		
			$this->repairTrial($exp,$lastmin);
		
		}else if($exp=='LP'){
		
			echo '';
		
		}else{
		
			$this->updateTrial($exp,$lastmin);
		
			}
	}
	
	//Inter Fc
	
	private function createTrial($trial){
		global $link;
		
		//@Db Salt;
		$salt='cliqsdiamond';
		
		
		$start=date(time());
		$exp=date(strtotime("+ $trial month"));
		
		$fd=fopen(EXKIT,'w+');
		fwrite($fd,$exp);
		
		mysqli_query($link,"INSERT INTO performancetab(id,ifr,tg,st,lm) VALUES('NULL','$start','$exp',1,'$start')");

	}
	
	private function repairTrial($exp,$lastmin){
		
		global $link;
		
		$fd=fopen(EXKIT,'w+');
		fwrite($fd,$exp);
		mysqli_query($link,"UPDATE performancetab SET lm='$lastmin' WHERE id=1 and st=1");

		
		}
	
	private function updateTrial($exp,$lastmin){
		
		global $link;
		
		$inow=date('d M Y, H:i a',time());
		
		$now=date(time());
		
			if($lastmin>$now){
				die('System/PC Time Inaccurate, Please Adjust Your Date,$inow');
			
			}else if($now>=$lastmin){
				
				file_exists(SIKIT)?'':die('Application Error: Some Modules Unable To Load, 01xfxc1');
				
				if($now>$exp){
							
					@rename(SIKIT,RELOCATEKITDIRECTORY);
					die('Unexpected Reference 101xF, Strongly Recommend Contacting App Provider.');
						
				}else{
					$new_min=date(time());
					mysqli_query($link,"UPDATE performancetab SET lm='$new_min' WHERE id=1 and st=1");
				}	
			}
		}
	
	
	public static function AppWriter($data){
		
		$time=date('d M Y, H:i a',time());
		$data="[$time]->$data\n
		----------------------------------------------------------------------------------";
		
		
		file_exists(UPKIT)?'':die('Application Error: Some Modules Unable To Load, 01xfxc2');
		
		$fd=fopen(UPKIT,'a+');
		fwrite($fd,$data);
		fclose($fd);
		}
	//End Inter Fc
		
}//End Class SysPerformance



class user{
	
	public function login($usr,$pwd){
		global $link;
		
		$sql=mysqli_query($link,"SELECT * FROM users WHERE mat='".mysqli_real_escape_string($link,$usr)."' AND password='".mysqli_real_escape_string($link,$pwd)."' AND bk='0'");
		
		if(mysqli_num_rows($sql)==1){
			$data="$usr LOGGED IN Through ".$_SERVER['HTTP_USER_AGENT'].' On A '.$_SERVER['HTTP_CONNECTION'].' Connection';
			
			$_SESSION['iusr']=$usr;
			$_SESSION['ipwd']=$pwd;

			performance::AppWriter($data);
			
			$isql=mysqli_query($link,"SELECT role FROM users WHERE mat='".mysqli_real_escape_string($link,$usr)."' AND password='".mysqli_real_escape_string($link,$pwd)."'");
		
			list($role)=mysqli_fetch_row($isql);
			$_SESSION['role']=$role;
			

			echo X;
		}else{
			
			printf("<img src='%scancel.png' width='auto' height='14px'>&nbsp;Invalid Combination",IMG);
	
			}
		
		}
		
	public function getdata(){
		global $link;
		
			$usr=$_SESSION['iusr'];
			$pwd=$_SESSION['ipwd'];
		
		
			$sql=mysqli_query($link,"SELECT id,role FROM users WHERE mat='".mysqli_real_escape_string($link,$usr)."' AND password='".mysqli_real_escape_string($link,$pwd)."'");
		
			list($id,$role)=mysqli_fetch_row($sql);
			
			
			return $id;
		}
		
		
	public function logout($admin){
		global $link;
		
			
			$_SESSION[]=array();
			session_unset();
			
			$usr=$_SESSION['iusr'];
			
			

		if($admin!=1){
			header('location:../../');
		}else{
			header('location:../admin');
			}

		}	
		
	
	public function verifylogin($role,$logintypeID){
		global $link;
		$usr_id=$this->getdata();
		$role=ucfirst($role);
		if($_SESSION['role']==$role){
			
			echo '';
			
		}else{
				if($logintypeID==null)
					$this->logout();
				else
					$this->logout(1);
			}		
		}
		
	public function haveexternalrights(){
		global $link;
		
		$usr_id=$this->getdata();
		$sql=mysqli_query($link,"SELECT extrights FROM users WHERE id='$usr_id'");
		list($ex)=mysqli_fetch_row($sql);
			
			return $ex;
		}
	
	public function get_Existing_Product_Information_Form($product_id){
		global $link;
		$sql=mysqli_query($link,"SELECT qty,des,cprice,uprice,discount FROM products WHERE id=$product_id");
		list($qty,$des,$cprice,$uprice,$discount)=mysqli_fetch_row($sql);


		echo" 
			<div class='all'><label></label><input type='hidden' name='cur_qty' id='cur_qty' value='$qty'></div>
			
			<div class='all'><label>Add to Qty</label><input type='number' name='qty' id='qty' placeholder='$qty'></div>
            <div class='all'><label>Cost Price</label><input type='number' name='cprice' id='cprice' value='0' readonly></div>
            <div class='all'><label>Unit Price</label><input type='number' name='uprice' id='uprice' placeholder='$uprice'></div>
            <div class='all'><label>Discount</label><input type='number' name='discount' id='discount' placeholder='$discount'></div>
            <div class='all'><label>Description</label><textarea name='des' id='des' placeholder='$des'></textarea>
            ";
            
	}
	
	public function addcat($a){

		global $link;

		$sql=mysqli_query($link,"INSERT INTO cat(id,cat,products) VALUES('NULL','$a','0')");

		if ($sql) {
			
			echo X;

		}else{

			echo "System Error, Please Retry";
		}
	}

	
	//Add to Product
	public function addproduct($product,$cat,$unit_price,$cost_price,$discount,$qty,$des){
		global $link;
		
		/**************Checking Product Existence*********/
		
		$exsql=mysqli_query($link,"SELECT * FROM products WHERE product_name='$product' AND qty!='0'");

		if(mysqli_num_rows($exsql)>0 && !empty($product)){

				die('This Product is Still Available in Store');
			
			}
		
		/**************Validations**********************/


		
		
		/*----------------------*********Registering Product by Preparing A Query*************************-----------*/
		
		$sql=mysqli_prepare($link,"INSERT INTO products(id,cat_id,product_name,qty,uprice,cprice,discount,pimg,date,des,qty_update) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
		
		
		$e='';
		$pimg=$_SESSION['funame'];

		$date=date('D, M Y: H:i:s a',time());
		
		$id=$this->getdata();
		
		
		mysqli_stmt_bind_param($sql,'iisiiiisssi',$e,$cat,$product,$qty,$unit_price,$cost_price,$discount,$pimg,$date,$des,$qty);
		if(mysqli_stmt_execute($sql)){
				
				rename("../uploads/product/del/$pimg","../uploads/product/$pimg");
				rename("../uploads/product/thumbdel/$pimg","../uploads/product/thumb/$pimg");

				#Change File Permission
						chmod('../uploads/product/'.$pimg, 0777);
						chmod('../uploads/product/thumb/'.$pimg, 0777);

				echo X;


			}else{
				echo "<img src='../images/cancel.png' width='auto' height='14px'>&nbsp;Product Registration Failed ,Please Retry";
				}

		}

	public function additem(){
		global $link;
		
		/**************Checking Book Existence*********/
		
		$isbnsql=mysqli_query($link,"SELECT * FROM table WHERE xxxxx='$xxxx'");
		if(mysqli_num_rows($isbnsql)>0 && !empty($isbn)){
			die('This book has been registered, try another isbn');
			}
		
		/**************Validations**********************/


		
		
		/*----------------------*********Registering Book by Preparing A Query*************************-----------*/
		
		$sql=mysqli_prepare($link,"INSERT INTO library(id,) VALUES()");
		
		
		$e='';
		$date=date('D, M Y: H:i:s a',time());
		$id=$this->getdata();
		
		
		//mysqli_stmt_bind_param($sql,'',);
		if(mysqli_stmt_execute($sql)){
		
		$usr=$_SESSION['iusr'];
		$data="$usr REGISTERED A BOOK Through ".$_SERVER['HTTP_USER_AGENT'].' On A '.$_SERVER['HTTP_CONNECTION'].' Connection';
			
		/*****************Log User Event*************/	
			
			performance::AppWriter($data);
			
			}else{
				echo "<img src='../images/cancel.png' width='auto' height='14px'>&nbsp;Registration FAILED ,Please Retry";
				}

		}


	//Delete Category
	public function DeleteCat($cat_id){
		global $link;

		$sql=mysqli_query($link,"DELETE FROM cat WHERE id='$cat_id'") or die("Couldn't Proceed Delete, An Error Occured");


		}
		
	
	//Delete Product/From Cart
	public function DeletePro($a,$flag){
		global $link;

			if($flag==1){

				$sql=mysqli_query($link,"DELETE FROM products WHERE id='$a'") or die("Couldn't Proceed Delete, An Error Occured");
		
			}else if($flag==2){
				
				$dsql=mysqli_query($link,"SELECT qty,product_id FROM mycart WHERE id='$a'");
				list($ordered_qty,$product_id)=mysqli_fetch_row($dsql);


				$sql=mysqli_query($link,"DELETE FROM mycart WHERE id='$a'") or die("Couldn't Proceed Delete, An Error Occured");

				$esql=mysqli_query($link,"SELECT qty FROM products WHERE id='$product_id'");
				list($db_qty,)=mysqli_fetch_row($esql);

				$nqty=(int)$ordered_qty+$db_qty;

				mysqli_query($link,"UPDATE products SET qty='$nqty' WHERE id='$product_id'");

			}

			if ($sql) {
				return 1;
			}
		}


	public function UpdatePro($product_id,$qty,$discount,$cprice,$uprice,$des,$cur_qty){
		global $link;

		

		$new_qty=abs($cur_qty+$qty);
		
		$sql=mysqli_query($link,"UPDATE products SET qty='$new_qty',qty_update='$new_qty',discount='$discount',cprice='$cprice',uprice='$uprice',des='$des' WHERE id='$product_id'");
			
			if($sql)

				echo X;
			else
				echo htmlspecialchars("Update Failed, Couldn't Proceed");
		

		}

	public function Add_to_Cart($product_id,$qtyorder,$exploreid){
		global $link;

		$rsq=mysqli_query($link,"SELECT qty,status FROM mycart WHERE product_id='$product_id' AND explore_id='$exploreid'");
		list($qty,$status)=mysqli_fetch_row($rsq);

		if($status==0){

			if(mysqli_num_rows($rsq)==0){

				$sql=mysqli_prepare($link,"INSERT INTO mycart(id,explore_id,product_id,qty,date,status) VALUES(?,?,?,?,?,?)");
		
				$e='';
				$status='0';

				$date=date(time());

				mysqli_stmt_bind_param($sql,'iiiisi',$e,$exploreid,$product_id,$qtyorder,$date,$status);

					if(mysqli_stmt_execute($sql)){
					
						mysqli_stmt_close($sql);

						$isql=mysqli_query($link,"SELECT qty FROM products WHERE id='$product_id'") or die('ERR1');
						list($db_qty)=mysqli_fetch_row($isql);

						$nqty=abs($db_qty-$qtyorder);
					
							mysqli_query($link,"UPDATE products SET qty='$nqty' WHERE id='$product_id'");
					
							echo X;
					
					}else{

						echo "System Error, Please Retry";
					}
			}else{

				
				$new_qty=($qty+$qtyorder);

				$sql=mysqli_query($link,"UPDATE mycart SET qty='$new_qty' WHERE product_id='$product_id' AND explore_id='$exploreid'");
			
					
					if($sql){

						$isql=mysqli_query($link,"SELECT qty FROM products WHERE id='$product_id'") or die('ERR1');
						list($db_qty)=mysqli_fetch_row($isql);

						$nqty=abs($db_qty-$qtyorder);
					
						mysqli_query($link,"UPDATE products SET qty='$nqty' WHERE id='$product_id'");
						
						echo X;

					}else{

						echo "System Error, Please Retry";
					}

				}

		}else{

			echo "Couldn't Proceed Transaction, Your ID Has Expired, Suggest You Closing Website And Re-open";
			
			}
		
		}//End Function
	
		
	public function Complete_Order($explore_id,$cname,$addr,$tel,$city,$sex){
		global $link;
		
			$rsq=mysqli_query($link,"SELECT * FROM client WHERE explore_id='$explore_id'");
			if(mysqli_num_rows($rsq)==0){

				$sql=mysqli_prepare($link,"INSERT INTO client(id,cname,addr,tel,city,sex,explore_id,date) VALUES(?,?,?,?,?,?,?,?)");
		
				$e='';
				$status='1';

				$date=date(time());

				mysqli_stmt_bind_param($sql,'isssssis',$e,$cname,$addr,$tel,$city,$sex,$explore_id,$date);

					if(mysqli_stmt_execute($sql)){
					
						mysqli_stmt_close($sql);

						mysqli_query($link,"UPDATE mycart SET status=1 WHERE explore_id='$explore_id' AND status='0'");

						$exploreid=base64_encode($_SESSION['exploreID']);
						header("location:../u0/index.php?ref=details&explore=$exploreid&qcomponent=4&hcomponent=4");
				
					}else{

						echo "System Error, Please Retry";
					}
			}else{

					echo "System Error, Please Retry";
			}
		}

	public function makepayment($order,$manual_discount,$price,$trans_type){
		global $link;
			
			$delivery_man_id=$this->getdata();
			
			$iop=mysqli_query($link,"SELECT cname,addr,tel,city FROM client WHERE explore_id='$order'");
			list($cname,$addr,$tel,$city)=mysqli_fetch_row($iop);			
			
			
				$sql=mysqli_prepare($link,"INSERT INTO payment(id,trans_type,amt_credited,delivery_man_id,trans_time,manual_discount,client_fname,addr,city,tel,trans_id) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
		
				$e='';
				$status='1';

				$date=date(time());
				
				
				mysqli_stmt_bind_param($sql,'isiisissssi',$e,$trans_type,$price,$delivery_man_id,$date,$manual_discount,$cname,$addr,$city,$tel,$order);

					if(mysqli_stmt_execute($sql)){
						mysqli_stmt_close($sql);
						
						mysqli_query($link,"UPDATE mycart SET status=2 WHERE explore_id='$order'");
						//mysqli_query($link,"DELETE FROM client WHERE explore_id='$order'");	*
						
						
					}
		}
	
	public function returntolib($i){
		global $link;
		
		
		
		}

}//End Class User


class records{
	
	public function get_customer_id($orderid){
		global $link;
		$sql=mysqli_query($link,"SELECT * FROM client WHERE explore_id='$orderid'");
			
			if($sql){
				echo X;
			}else{
				echo "Customer ID not Found, Please Confirm Again";	
				}
		}
	
	public function generate_Customer_Order_Details($orderid){
		global $link;
		$exploreid=trim($orderid);
				$agg=0;

				$sql=mysqli_query($link,"SELECT * FROM client WHERE explore_id='$exploreid'");
				list($id,$cname,$addr,$tel,$city,$sex,$date)=mysqli_fetch_row($sql);
				
				
				
				$fsql=mysqli_query($link,"SELECT * FROM mycart WHERE explore_id='$exploreid' and status='1'");
				
				if(mysqli_num_rows($fsql)!=0){
					
				echo "
					<center>
					<div style='font-size:23px; font-family:amble;'><b>INVOICE</b></div>

					<div>$cname, <b>($exploreid)</b></div>
					</center>
					<table>
					<tr>
						<td>Qty</td>
						<td>Product</td>
						<td>Rate</td>
						<td>Price</td>
					</tr>
				";
				$orderid=base64_encode($orderid);
				while(list($id,$xpl,$product_id,$qty,$idate)=mysqli_fetch_row($fsql)){


					$ty=mysqli_query($link,"SELECT product_name,uprice,discount FROM products WHERE id='$product_id'");
					list($prname,$uprice,$discount)=mysqli_fetch_row($ty);
					
					$rate=($uprice-$discount);	
					$price=($rate)*$qty;

					$time=date('d M Y, H:i a',$idate);
					
					$agg+=$price;

					echo "<center>
					
					
						
						<tr>

							<td>$qty</td>
							<td>$prname</td>
							<td>$rate</td>
							<td>$price</td>
						
						</tr>";

				}
				echo "

					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>N$agg</td>
					</tr>
				
				</table>
				<small style='float:right; color:green;'>$time</small>
				<hr>
				<button type='submit'><a style='color:white; text-decoration:none; 'href='index.php?ref=deliver&hcomponent=2&orders=$orderid'>Proceed To Payment</a></button>
				
				</center>
				
				";
			}else{
				echo "Restricted Access: No Order Found, Zero Invoice";
				}
		}
	
	public function generate_Customer_Payment_Form($orderid){
		global $link;
			
			$total=0;
			$sql=mysqli_query($link,"SELECT qty,product_id FROM mycart WHERE explore_id='$orderid' AND status=1");
			while(list($qty,$pro)=mysqli_fetch_row($sql)){
					
					$io=mysqli_query($link,"SELECT uprice,discount FROM products WHERE id='$pro'");
					list($up,$dis)=mysqli_fetch_row($io);
					$price=abs($qty*($up-$dis));
					
					$total+=$price;
				}
			
			if(mysqli_num_rows($sql)!=0){
			echo "
				<form action='../process/add.php' method='post'>
					
					<div class='all'><label></label><input type='hidden' name='addid' value='5'></div>
					
					<div class='all'><label></label><input type='hidden' name='orderid' value='$orderid'></div>
					
					<div class='all'><label>Trans. type</label><select name='trans_type' id='trans_type'>
						<option value='Cash'>Cash</option>
						<option value='Cheque'>Cheque</option>
						
					</select></div>
					
					<div class='all'><label>M. Discount</label><input type='number' name='manual_discount' id='manual_discount' value=0></div>
					<div class='all'><label>Total Charge</label><input type='number' name='price' id='price' readonly value='$total'></div>
					
					<div class='all'><label></label><button type='submit' id='transact'>Pay Now</button></div>
					
				</form>
			
			";
			}else{
				header("location:index.php?ref=deliver");
				}
		}
		
	public function loadCategory(){
		global $link;
		
			$sql=mysqli_query($link,"SELECT * FROM cat");
		
		
		while(list($id,$cat,$product)=mysqli_fetch_row($sql)){
			
			$sq=mysqli_query($link,"SELECT * FROM products WHERE cat_id='$id'");
			$product=mysqli_num_rows($sq);
			 
			 
	        echo "  

	        <li><a href='#'>$cat ($product)</a></li>";

			}
		echo "<li><a href='index.php?ref=addcategory' target='_new'><img src='../images/add.png' height='10px' width='auto'>Add Category</a></li>";
		} 

	public function load_Explicit_Category(){
		global $link;
		
			$sql=mysqli_query($link,"SELECT * FROM cat");
		
		
		while(list($id,$cat,$product)=mysqli_fetch_row($sql)){
			
			$sq=mysqli_query($link,"SELECT * FROM products WHERE cat_id='$id'");
			$product=mysqli_num_rows($sq);
			 
			 
        echo "  

        <li><a href='index.php?ref=cpanel&qcomponent=1&hcomponent=$id'>$cat ($product)</a></li>
        
        ";

			}
		} 



	public function getCategoryActiveList(){
		global $link;

			$sql=mysqli_query($link,"SELECT * FROM cat");
			
			$hs=mysqli_query($link,"SELECT qty FROM products");
			$total=mysqli_num_rows($hs);

			echo "

				<tr>
            		<th></th>
            		<th>Category</th>
            		<th>Available Product</th>
           			<th>Rating by Meals</th>
           			<th>Check Meal</th>
        		</tr>

			";

			while(list($id,$cat,$product)=mysqli_fetch_row($sql)){
				
				$sq=mysqli_query($link,"SELECT * FROM products WHERE cat_id='$id'");
				$product=mysqli_num_rows($sq);
				$cat=ucwords($cat);
				
				$percentage=round((($product/$total)*100));

				if($percentage<=30){

					$color='rgba(252, 114, 105, 0.88)';

				}else if ($percentage<=50 && $percentage>=30) {
				
					$color='rgba(253, 255, 59, 0.89)';
				
				}elseif ($percentage<=100 && $percentage>=50) {
					
					$color='rgba(0, 172, 0, 0.87)';
				
				}

				echo "

					<tr>
						<td><input type='checkbox' id='catcheck' name='catcheck[]' value='$id'></td>
						<td>$cat</td>
						<td>$product Available</td>
						<td> <center><p id='easywrap' width='$percentage%' style='padding:2px; font-family:amble; background:$color; color:white; font-size:9px;'>$percentage%</p></center></td>
						<td><a href='index.php?ref=cpanel&hcomponent=$id' title='Open Stock'><img src='../images/open.png' height='14px' width='auto'></a></td>
						
					</tr>

				";

			}

	}

	public function get_All_Orders($r){
		global $link;
		
		
		$sql=mysqli_query($link,"SELECT * FROM mycart ORDER BY date DESC");	
		$total=mysqli_num_rows($sql);
	
		if($r=='Stock Man' || $r=='Delivery Man'){
			
				echo "

				<tr>
            		
            		<th>Product Name</th>
					<th>Fullname</th>
					<th>Address</th>
					<th>Telephone</th>
            		<th>Qty</th>
					<th>Amt</th>
           			<th>Status</th>
					<th>Date</th>
        		
				</tr>

			";

			while(list($id,$orderer_id,$product_id,$qty,$date,$status)=mysqli_fetch_row($sql)){

				$sql_p=mysqli_query($link,"SELECT cname,addr,tel,date,city FROM client WHERE explore_id='$orderer_id'");
				list($cname,$addr,$tel,$idate,$city)=mysqli_fetch_row($sql_p);
				
				$outdate=date(strtotime('-7 day'));
				
				if($outdate>$idate){
					mysqli_query($link,"DELETE FROM mycart WHERE explore_id='$orderer_id'");
					mysqli_query($link,"DELETE FROM client WHERE explore_id='$orderer_id'");
					}
				
				$isq=mysqli_query($link,"SELECT product_name,uprice,discount FROM products WHERE id='$product_id'");
				list($product,$uprice,$discount)=mysqli_fetch_row($isq);
				$product=ucwords($product);
				
				$price=abs(($uprice-$discount)*$qty);
				
				$systime=date('d M Y',time());
				$utime=date('d M Y',$idate);
				$yesterday=date('d M Y',strtotime('-1 day'));
				
				if($systime==$utime){
				
					$idate='Today';
				
				}else if($utime==$yesterday){
				
					$idate='Yesterday';
				
				}else{
					
					$idate=$utime;
					}
				

				if($status==0){

					$status='On progress...';

				}else if ($status==1) {
				
					$status='Pending Delivery';
				
				}else if ($status==2) {
					
					$status='<a style="color:green;">Delivered</a>';
				
				}else if($status==3){
					
					$status='<a style="color:red;">Out Dated</a>';
					
					}

				echo "

					<tr>
						<td>$product</td>
						
						<td>$cname</td>
						<td>$city	-$addr</td>
						<td>$tel</td>
						<td>$qty</td>
						<td>N$price</td>
						<td>$status</td>
						<td>$idate</td>
						
						
					</tr>

				";

			}//End Loop
			
		}else{
			echo "";
			}
	}

	public function getProductActiveList($hcomponent){
		global $link;

			$catsql=mysqli_query($link,"SELECT cat FROM cat WHERE id='$hcomponent'");
			list($cat)=mysqli_fetch_row($catsql);



			echo "

				<tr>
            		<th></th>
            		<th>Category</th>
            		<th>Product</th>
           			
           			<th>Qty. (Rem.)</th>
           			<th>U. Price</th>
           			<th>C. Price</th>
           			<th>Discount</th>
           			<th>Action</th>
           			
        		</tr>

			";
			$sql=mysqli_query($link,"SELECT * FROM products WHERE cat_id='$hcomponent'");


			while(list($id,$cat_id,$product,$qty,$uprice,$cprice,$discount,$pimg,$date,$des,$qty_added_on_last_update)=mysqli_fetch_row($sql)){
				
				if($qty>=20){

					$rqty=$qty;
					$qet=floor($qty/2);
					
					
					if($rqty <= 2){

						$color='rgba(252, 114, 105, 0.88)';

					}else if ($rqty <= $qet && $rqty > 2) {
				
						$color='rgba(253, 255, 59, 0.89)';
				
					}else if ($rqty >= $qet) {
					
						$color='rgba(0, 172, 0, 0.87)';
				
					}	

				}else{

					$color='rgba(0,0,0,0.9)';
				}
				
				

				echo "

					<tr>
						<td>
						<input type='hidden' name='cat' id='icat' value='$cat_id'>
						<input type='checkbox' id='procheck' name='procheck[]' value='$id'>

						</td>
						
						<td>$cat</td>
						<td><img src='../uploads/product/thumb/$pimg' height='14px' width='14px'>&nbsp$product</td>
						
						<td> <a style='color:$color;'>$qty</a></td>
						<td> <a>N$uprice</a></td>
						<td> <a>N$cprice</a></td>
						<td> <a>N$discount</a></td>
						
						<td><a href='index.php?ref=updateproduct&hcomponent=$id' target='_new' title='Update Product'><img src='../images/update.png' height='14px' width='auto'></a></td>
						
					</tr>

				";

			}

	}

	public function get_Product_List_Meal($var,$flag){
		global $link;

		if($flag==0){


			$dsql=mysqli_query($link,"SELECT * FROM products");

			$csql=mysqli_query($link,"SELECT COUNT(id) FROM products");
			list($highest)=mysqli_fetch_row($csql);

			$start=$highest-7;

				if($start<0){

					$start=$highest-(mysqli_num_rows($dsql));
				}
				
			$sql=mysqli_query($link,"SELECT * FROM products WHERE qty!=0 ORDER BY RAND() LIMIT $start,$highest");
			
		}else if($flag==1){

			$sql=mysqli_query($link,"SELECT * FROM products WHERE qty!=0 AND cat_id='$var' ORDER BY date DESC");
		
		}
		
			while(list($id,$cat_id,$product_name,$qty,$uprice,$cprice,$discount,$pimg,$date,$des,$qty_update)=mysqli_fetch_row($sql)){

				$cv=$uprice-$discount;

					if($discount==0){

						$spclass="<span class='price'>N$uprice</span>";

					}else{

						$spclass="<span class='reduce'>N$uprice</span> <span class='price'>N$cv</span>";
					}

				echo "
				<div class='prod_box'>

        				<div class='top_prod_box'></div>

        				<div class='center_prod_box'>
        
          				<div class='product_title'><a href='index.php?ref=cpanel&qcomponent=2&hcomponent=$id'>$product_name</a></div>
        
          				<div class='product_img'> <a href='index.php?ref=cpanel&qcomponent=2&hcomponent=$id'><img src='../uploads/product/$pimg' height='100px' width='auto' alt='Product Thumb' border='0' /></a>  </div>


				        <div class='prod_price'>$spclass</div>

        			</div>

        			
        			<div class='bottom_prod_box'></div>
        
        			<div class='prod_details_tab'> 
    				
    				<input type='hidden' value='1' name='qtyorder' id='qtyorder'>

    				<input type='hidden' value='$id' name='product' id='product'>
        			
        			
          			<a id='tocart' style='cursor:pointer;'><img src='../images/cart.gif' alt='Add to Cart' border='0' class='left_bt' /></a> 


					<a href='index.php?ref=cpanel&qcomponent=2&hcomponent=$id' class='prod_details'>details</a> 

        			</div>

      			</div>
      			";

			}


	}


	public function get_Product_Details_Meal($var){
		global $link;
		
		$sql=mysqli_query($link,"SELECT id,des,qty,pimg,product_name,uprice,discount FROM products WHERE id='$var'");
		list($id,$des,$qty,$pimg,$product_name,$uprice,$discount)=mysqli_fetch_row($sql);


					$cv=$uprice-$discount;
					$price=($discount==0)?$uprice:$cv;

					if($discount==0){

						$spclass="<span class='reduce'>N$uprice</span>";

					}else{

						$spclass="<span class='reduce'>N$uprice</span> <span class='price'>N$price</span>";
					}


		echo "
			<div class='center_title_bar'>$product_name</div>
      		<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
       	 	<div class='center_prod_box_big'>
          
          	<div class='product_img_big'> <a href='javascript:popImage('../uploads/product/$pimg','$product_name')'><img src='../uploads/product/$pimg' width='180px' height='auto' alt='' border='0' /></a>
            
          	</div>
          
          <div class='details_big_box'>
            <div class='product_title_big'>$product_name</div>
            <div class='specifications'> Description: <span class='blue'>$des</span><br />
              Qty Remaininig In Stock: <span class='blue'>$qty</span><br />
              
            </div>

            <div class='prod_price_big'>$spclass</div><br><hr>
            <span>	

            	
            	<input type='number' value='1' name='qtyorder' id='qtyorder'><br>
            	<input type='hidden' value='$id' name='product' id='product'>

            	<a style='cursor:pointer;' id='tocart' title='Add To Cart' class='addtocart'>Add to cart</a></span>
        	
        	</div>
        	</div>

        	<div class='bottom_prod_box_big'></div>
      		</div>

        ";
      		
	
	}



	public function get_Basket_Content($a){
		global $link;
		$agg=0;

		$sql=mysqli_query($link,"SELECT * FROM mycart WHERE explore_id='$a' AND status='0'");

		echo "<ul class='left_menu'>";

		
			while(list($id,$exploreid,$product_id,$qtyorder,$date)=mysqli_fetch_row($sql)){

				$rsq=mysqli_query($link,"SELECT product_name,uprice,discount FROM products WHERE id='$product_id'");

				list($product_name,$uprice,$discount)=mysqli_fetch_row($rsq);
			 	
			 	echo "  

        			<li><a href='#'><input type='checkbox' value='$id' name='prolist[]' id='prolist' style='float:left;'>$product_name ($qtyorder)</a></li>
        		
        			";

        		$price=($uprice-$discount)*$qtyorder;

        		$agg+=$price;

		}

		echo "</ul>";



		$total_in_basket=(int)mysqli_num_rows($sql);
		

		echo "

			<div class='cart_details' align='center'>  $total_in_basket items <br />

          <hr> Total: <span class='price'><b> N$agg </b></span> 
          	<br>
        	</div>
        


			";	

	}

	public function cartmenu(){
		global $link;

		$explore=base64_encode($_SESSION['exploreID']);

		echo "
				<br>
				<div align='center'>
				<a href='#' id='deletefromcart' title='Delete Selected From Cart'><img src='../images/drop.png' height='20px' width='auto'></a>
				
				&nbsp;|&nbsp;
				
				<a href='index.php?ref=details&explore=$explore&qcomponent=3&hcomponent=3' title='Finalise Shopping,Print Invoice'><img src='../images/finalize.png' height='20px' width='auto'></a>

				</div>

		";
		
		}
	
	public function generate_Order_Details($exploreid,$flag){
		global $link;

			if ($flag==1) {
				# Order Form

				echo "
					<form action='../process/add.php' method='post' style='width:auto;'>
						<input type='hidden' name='addid' value='4'>
						<input type='hidden' name='explore' value='$exploreid'>
						<div class='all'><label>Fullname</label><input type='text' name='cname' id='cname'></div>
						<div class='all'><label>Address</label><input type='text' name='addr' id='addr'></div>
						<div class='all'><label>Telephone</label><input type='tel' name='tel' id='tel'></div>
						<div class='all'><label>City</label><input type='text' name='city' id='city'></div>
						<div class='all'><label>Sex</label><select name='sex' id='sex'>
							
							<option value='Male'>Male</option>
							<option value='Female'>Female</option>

						</select>
						</div>
						<div class='all'><label></label><button type='submit' id='completeorder'>Complete Order</button></div>
					</form>

				";

			}else if ($flag==2) {
				# Invoice
				
				$exploreid=base64_decode($exploreid);
				$agg=0;

				$sql=mysqli_query($link,"SELECT * FROM client WHERE explore_id='$exploreid'");
				list($id,$cname,$addr,$tel,$city,$sex,$date)=mysqli_fetch_row($sql);

				$fsql=mysqli_query($link,"SELECT * FROM mycart WHERE explore_id='$exploreid'");
				echo "
					<center>
					<div style='font-size:23px; font-family:amble;'><b>INVOICE</b></div>

					<div>$cname, <b>($exploreid)</b></div>
					</center>
					<table>
					<tr>
						<td>Qty</td>
						<td>Product</td>
						<td>Rate</td>
						<td>Price</td>
					</tr>
				";

				while(list($id,$xpl,$product_id,$qty,$idate)=mysqli_fetch_row($fsql)){


					$ty=mysqli_query($link,"SELECT product_name,uprice,discount FROM products WHERE id='$product_id'");
					list($prname,$uprice,$discount)=mysqli_fetch_row($ty);
					
					$rate=($uprice-$discount);	
					$price=($rate)*$qty;

					$time=date('d M Y, H:i a',$idate);
					
					$agg+=$price;

					echo "<center>
					
					
						
						<tr>

							<td>$qty</td>
							<td>$prname</td>
							<td>$rate</td>
							<td>$price</td>
						
						</tr>";

				}
				echo "

					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>N$agg</td>
					</tr>

				</table>
				<small>$time</small>
				</center>
				
				";
			}

			
		
		}


	public function get_All_Transactions($r){
		global $link;
		
		$sql=mysqli_query($link,"SELECT * FROM payment ORDER BY trans_time DESC");	
		$total=mysqli_num_rows($sql);
	
		if($r=='Stock Man'){
			
				echo "

				<tr>
            		
					<th>ID</th>   	
					<th>By</th>
            		<th>Client</th>
					<th>Credited</th>
					<th>M. Discount</th>
					<th>Delivery_Man</th>
            		<th>Date</th>
					<th>Addr</th>
				</tr>

			";

			while(list($id,$trans_type,$price,$delivery_man_id,$date,$manual_discount,$cname,$addr,$city,$tel,$order)=mysqli_fetch_row($sql)){

				$sql_p=mysqli_query($link,"SELECT mat FROM users WHERE id='$id'");
				list($dmail)=mysqli_fetch_row($sql_p);
				$date=date('d M Y, h:i a',$date);
				
				echo "

					<tr>
						<td>$order</td>
						
						<td>$trans_type</td>
						<td>$cname</td>
						<td>N$price</td>
						<td>N$manual_discount</td>
						<td>$dmail</td>
						<td>$date</td>
						<td>$city	-$addr</td>
						
						
					</tr>

				";

			}//End Loop
			
		}else{
			echo "";
			}
		}
	
	public function borrowers(){
		global $link;
			

		}
		


}//End Of Records




?>