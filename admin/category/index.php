<?php
	include_once('../../class/users.php');
	include_once('../../include/settings.php');

	use cliqsFrameWork\users\user as me;
	use cliqsFrameWork\users\connect as connectme;
	use cliqsFrameWork\users\performance as ivalid;
	use cliqsFrameWork\users\records as records;
	
	$me=new me();
	$connectme=new connectme();
	$checkme=new ivalid();
	$record=new records();
		
  $r='Staff';
  $me->verifylogin($r);	

header('Content-Type:text/html; charset=utf-8');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Captain Resturants Store| Category</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->

<script type="text/javascript" src="../../js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="../../js/check.js"></script>
<script type="text/javascript" src="../../js/boxOver.js"></script>

<style>

	@import "../../css/forms.css";
	@import "../../css/interim.css";
	@import "../../css/style.css";
	

</style>

</head
><body>
<div id="main_container">
  <div class="top_bar">
    <div class="top_search">
      <div class="search_text"><a> Search</a></div>
      <input type="text" class="search_input" name="search" />
      <input type="image" src="../../images/search.gif" class="search_bt"/>
    </div>
  </div>
  <div id="header">
    <div id="logo"> <a href="index.php"><img src="../../images/logo.png" alt="" border="0" width="237" height="140" /></a> </div>
    <div class="oferte_content">
      <div class="top_divider"><img src="../../images/header_divider.png" alt="" width="1" height="164" /></div>
      <div class="oferta">
        <div class="oferta_content">Order A Meal Today</div>
      </div>
      <div class="top_divider"><img src="../../images/header_divider.png" alt="" width="1" height="164" /></div>
    </div>
    <!-- end of oferte_content-->
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
      <ul class="menu">
        
        <li><a href="../login/" class="nav1"> Home</a></li>
        <li class="divider"></li>
        
        <li><a href="../orders/" class="nav2">View Orders</a></li>
        <li class="divider"></li>
        
        <li><a href="../deliver/" class="nav3">Deliver Product</a></li>
        <li class="divider"></li>
        
        <li><a href="../addproduct/" class="nav6">Add Product</a></li>
        <li class="divider"></li>

        <li><a href="../updateproduct/" class="nav6">Update Product</a></li>
        <li class="divider"></li>

        <li><a href="../addcategory/" class="nav6">Add Category</a></li>
        <li class="divider"></li>

        <li><a href="../salesreport/" class="nav6">Sales Report</a></li>
        <li class="divider"></li>

        
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> <img src='../../images/back.png' height="10px" width="auto"> <span class="current"><a href="../logout/">Logout</a></span> </div>
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
      <div class="center_title_bar" style="background:url(../images/bar_bg.gif) no-repeat center); background-size:contain;">Add Category</div>
      
      
      
      
      
      <!--<div class="prod_box">
        <div class="top_prod_box"></div>

        <div class="center_prod_box">
        
          <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
        
          <div class="product_img"> <a href="details.html"><img src="../../images/laptop.gif" alt="" border="0" /></a>  </div>

          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>

        </div>


        <div class="bottom_prod_box"></div>
        
        <div class="prod_details_tab"> 
          

          <a href="http://all-free-download.com/free-website-templates/" title="header=[Add to cart] body=[&nbsp;] fade=[off]"><img src="../../images/cart.gif" alt="" border="0" class="left_bt" /></a> 


          <a href="http://all-free-download.com/free-website-templates/" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="../../images/favs.gif" alt="" border="0" class="left_bt" /></a> 


          <a href="http://all-free-download.com/free-website-templates/" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="../../images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="details.html" class="prod_details">details</a> 

        </div>


      </div>-->


      		<?php //$record->getMealByRank(10); ?>

			<br><br><br><br>
           <div id="feedback" style="background:transparent; color:black; font-size:14px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px; font-family:amble;"></div>


          <form action="../../process/add.php" method="post">
              <!--Hidden Forms-->
              <input type="hidden" name="addid" value="1">
              
              <div class="all"><label>Category</label><input type="text" name="cat" id="cat"></div>

              
              <div class="all"><label></label><button type="submit" id="sbcat">Add Category</button></div>

          </form>
    
<br><br><br><br>
    </div>



    <!-- end of center content --><!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="center_footer"> Online Resturant, <a href="mailto:cliqsapp@gmail.com">Real Cliqs</a> 2015<br />
      <a href="http://csscreme.com"><img src="../../images/csscreme.jpg" alt="csscreme" border="0" /></a><br />
      <img src="../../images/payment.gif" alt="" /> </div>
  </div>
</div>
<!-- end of main_container -->
<div align=center></div></body>
</html>
