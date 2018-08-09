<?php
		
  $r='Stock Man';
  $me->verifylogin($r,1);	

header('Content-Type:text/html; charset=utf-8');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Captain Resturants Store| Add Product</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->


<script type="text/javascript" src="../js/boxOver.js"></script>


<style>

	@import "../css/forms.css";
	@import "../css/interim.css";
	@import "../css/style.css";
	

</style>

</head>
<body>
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
        
          <?php include('../include/menu.php'); ?>

        
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> <img src='<?php echo IMG.'back.png'; ?>' height="10px" width="auto"> <span class="current"><a href="<?php echo 'lgt.php';?>">Logout</a></span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
        
        	<?php $record->loadCategory(); ?>


      </ul>
    </div>
    <!-- end of left content -->
    <div class="center_content" style="width:76%;">
      <div class="center_title_bar" style="background-size:contain;">Add Item</div>
      
      
      
      
      
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


          <form action="../process/add.php" method="post">
              <!--Hidden Forms-->
              <input type="hidden" name="addid" value="2">
              
              <div class="all"><label>Category</label>

                <select name="cat" id="cat">
                    
                    <?php

                        $sql=mysqli_query($link,"SELECT * FROM cat");
                        while(list($id,$cat)=mysqli_fetch_row($sql)){

                            echo "<option value='$id'>$cat</option>";

                        }

                    ?>

                </select>

              </div>

            <div class="all"><label>Thumbnail</label><input type="file" name="pfile" id="pfile"></div>
            <div class="all"><label>Item name</label><input type="text" name="product" id="product"></div>
            <div class="all"><label>Quantity</label><input type="number" name="qty" id="qty"></div>
            <div class="all"><label>Cost Price</label><input type="number" name="cprice" id="cprice" value="0" readonly></div>
            <div class="all"><label>Unit Price</label><input type="number" name="uprice" id="uprice"></div>
            <div class="all"><label>Discount</label><input type="number" name="discount" id="discount"></div>
            <div class="all"><label>Description</label><textarea name="des" id="des"></textarea>
            

              <div class="all"><label></label><button type="submit" id="sbprod">Add Product</button></div>

          </form>
    
      <br><br><br><br>
    </div>



    <!-- end of center content --><!-- end of right content -->
  </div>
  <!-- end of main content -->
    <?php
        include('../include/footer.php');
    ?>
</div>
<!-- end of main_container -->
<div align=center></div></body>
</html>
