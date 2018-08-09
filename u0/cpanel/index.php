
<?php
	
  $r='Customer';
  

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Captain Resturants Store| Home</title>
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
        

        <li><a href="../u0/" class="nav1"> Home</a></li>
        <li class="divider"></li>
        
        <li><a href="paypal.com" class="nav6" title="header=[Get A Paypal Account], body=[People Without A Paypal Account Would not be able to make online payment on this system]">Get A Paypal Account</a></li>
        <li class="divider"></li>
        
        <li class="currencies">Currencies
          <select>
            <option>NGR</option>
           
          </select>
        </li>
        
        
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> <img src='<?php echo IMG.'back.png'; ?>' height="10px" width="auto"> <span class="current"><a href="#">CustomerID <?php echo ' ('.$_SESSION['exploreID'].')'; ?></a></span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
        <!--<li class="odd"><a href="">Processors</a></li>
        <li class="even"><a href="">Motherboards</a></li>
        <li class="odd"><a href="">Desktops</a></li>-->


        	<?php $record->load_Explicit_Category(); ?>


      </ul>
    </div>
    <!-- end of left content -->
    <div class="center_content">
  
      
     
      
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

      <style type="text/css">
          

          .center_content input[type=submit],input[type=button],button[type=submit]{
      
                padding: 4px;
                text-align: center;
                float: none;

              } 
        </style>



        <?php

        //Qcomponent  1-Product List Aspect
        //Qcomponent  2-Details Of A Product Aspect
        if(isset($_GET['qcomponent']) && filter_var($_GET['qcomponent'],FILTER_VALIDATE_INT)){

            
            if(isset($_GET['hcomponent'])){
              //Hcomponent  1-Product List Of Hcomponent Category
              //Hcomponent  2-Order Form- Hcomponent Order
              //Hcomponent  3-Order Invoice

              //Url Attack Security

              if(filter_var($_GET['hcomponent'],FILTER_VALIDATE_INT)){

                  if($_GET['qcomponent']==1){

                    $record->get_Product_List_Meal($_GET['hcomponent'],1);

                  }else if($_GET['qcomponent']==2){

                    $record->get_Product_Details_Meal($_GET['hcomponent']);

                  }else if ($_GET['qcomponent']==3) {

                    //1 -flag Representing Order Form
                    $record->generate_Order_Details($_GET['exploreID'],1);
                  
                  }else if ($_GET['qcomponent']==4) {
                    
                    //2 -flag Representing Invoice
                    $record->generate_Order_Details($_GET['exploreID'],2);

                  }

                    
              }else{

                  die('Restricted Content');

              }
              
            }else{

                $record->get_Product_List_Meal(10,0);              
            }

        }else{

            $record->get_Product_List_Meal(10,0);
        }


        ?>

      	

			
        
        
        <center>
          
        
          
          
        </center>
          


      <br><br>
    </div>



    <!-- end of center content -->

    <div class="right_content">
      <div class="shopping_cart" id='shopping_cart'>
       
       
        <div class="title_box">Foods In Cart</div>
        
          <cc>
            <?php   $record->get_Basket_Content($_SESSION['exploreID']); ?>
          </cc>
        
      </div>
     
     
     
    </div>
    


    <?php      $record->cartmenu();    ?>
    
    <!-- end of right content -->





  </div>
  <!-- end of main content -->
  <?php   include('../include/footer.php');      ?>

    <br>
    <a href="../admin">*****</a>
   

</div>
<!-- end of main_container -->
<div align=center></div></body>
</html>
