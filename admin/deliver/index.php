<?php
		
  $r='Delivery Man';
  $me->verifylogin($r,1);	

header('Content-Type:text/html; charset=utf-8');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Captain Resturants Store| Verify</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->


<script type="text/javascript" src="../js/boxOver.js"></script>

<style>

	@import "../css/forms.css";
	@import "../css/interim.css";
	@import "../css/style.css";
	@import "../css/table.css";

</style>

</head
><body>
<div id="main_container">
  <div class="top_bar">
    <div class="top_search">
      <div class="search_text"><a> Search</a></div>
      <input type="text" class="search_input" name="search" />
      <input type="image" src="../images/search.gif" class="search_bt"/>
    </div>
  </div>

  
 <div id="header">
    <div id="logo"> <a href="index.php"><img src='<?php echo IMG.'logo.png'; ?>' alt="" border="0" width="237" height="140" /></a> </div>
    <div class="oferte_content">
      <div class="top_divider"><img src='<?php echo IMG.'header_divider.png';  ?>' alt="" width="1" height="164" /></div>
      <div class="oferta">
        <div class="oferta_content">Order A Meal Today</div>
      </div>
      <div class="top_divider"><img src='<?php echo IMG.'header_divider.png'; ?>' alt="" width="1" height="164" /></div>
    </div>
    <!-- end of oferte_content-->
  </div>


  <div id="main_content">
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
      <ul class="menu">
        
        <!--Menu-->
        
          <li><a href='#' onclick="window.close()" class="nav6">Close</a></li>
          <li class="divider"></li>

        
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> <img src='<?php echo IMG.'back.png'; ?>' height="10px" width="auto"> <span class="current"><a href="<?php echo 'lgt.php';?>">Logout (<?php echo $_SESSION['role']; ?>)</a></span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
        <!--<li class="odd"><a href="">Processors</a></li>
        <li class="even"><a href="">Motherboards</a></li>
        <li class="odd"><a href="">Desktops</a></li>-->


        	<?php $record->loadCategory(); ?>


      </ul>
    </div>
    <!-- end of left content -->
    <div class="center_content" style="width:76%;">
      <div class="center_title_bar" style="background-size:contain;">Delivery Panel</div>
      
      
      

      		<?php  ?>

			<br><br><br><br>
           <div id="feedback" style="background:transparent; color:black; font-size:14px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px; font-family:amble;"></div>
		
        <?php
        	
		
			if(isset($_GET['hcomponent'])	&& 	filter_var($_GET['hcomponent'],FILTER_VALIDATE_INT)	&& $r=='Delivery Man'){
				
				$orderid=isset($_GET['orders'])?filter_var($_GET['orders'],FILTER_VALIDATE_INT):die('Restricted Access');
					
					
					//hcomponent	-1 Reveals Customer Invoice
					if($_GET['hcomponent']==1){
						
						$record->generate_Customer_Order_Details($orderid);
					
					}else if($_GET['hcomponent']==2){
						$orderid=isset($_GET['orders'])?filter_var(base64_decode($_GET['orders']),FILTER_VALIDATE_INT):die('Restricted Access');
						$record->generate_Customer_Payment_Form($orderid);
						
						}
				}else{
		?>

          <form action="#" method="post">
              <!--Hidden Forms-->
              
              
              <div class="all"><label>Order ID</label><input type="number" name="orderid" id="orderid"rrequired="required"></div>

              
              <div class="all"><label></label><button type="submit" id="sbverifycustomer">Enter</button></div>

          </form>
    
<br><br><br><br>
		<?php	}	?>
    </div>



    <!-- end of center content --><!-- end of right content -->
  </div>
  <!-- end of main content -->
   <?php

      #footer
      include('../include/footer.php');

    ?>
</div>
<!-- end of main_container -->
<div align=center></div></body>
</html>
