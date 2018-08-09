
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
        

        <li><a href="../" class="nav1"> Home</a></li>
        <li class="divider"></li>
        
        <li><a href="paypal.com/register" class="nav6" title="header=[Get A Paypal Account], body=[People Without A Paypal Account Would not be able to make online payment on this system]">Get A Paypal Account</a></li>
        <li class="divider"></li>
        
        <li><a href='#' onclick="window.print()" class="nav6" >Print</a></li>
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
      
      <!--<div class="title_box">Categories</div>-->

      <ul class="left_menu">



      </ul>
    </div>
    <!-- end of left content -->
    <div class="center_content">
  
      
     

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
        if(filter_var($_GET['qcomponent'],FILTER_VALIDATE_INT)){

            
            
              //Hcomponent  1-Product List Of Hcomponent Category
              //Hcomponent  2-Order Form- Hcomponent Order
              //Hcomponent  3-Order Invoice

              //Url Attack Security

              if(filter_var($_GET['hcomponent'],FILTER_VALIDATE_INT)){

                  if($_GET['qcomponent']==3){

                    //1 -flag Representing Order Form
                    $record->generate_Order_Details($_GET['explore'],1);

                  }else if($_GET['qcomponent']==4){

                    //2 -flag Representing Order Form
                    $record->generate_Order_Details($_GET['explore'],2);

                  }
                    
              }else{

                  die('Restricted Content');

              }
              
        }else{

            echo "<a href='../index.php'>Go Back</a>";
        }


        ?>



      <br><br>
    </div>



    <!-- end of center content -->

    
    


    

    <!-- end of right content -->





  </div>
  <!-- end of main content -->
  <?php   include('../include/footer.php');      ?>
</div>
<!-- end of main_container -->
<div align=center></div></body>
</html>
