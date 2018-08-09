<?php
	

	use cliqsFrameWork\users\INCLUDES as INCLUDES;
	use cliqsFrameWork\users\IMG as IMG;
  	use cliqsFrameWork\users\CA as C;

	
  	$r='Stock Man';
  

header('Content-Type:text/html; charset=utf-8');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Captain Resturants Store| Mpanel</title>
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
        

        <?php include('../include/menu.php'); ?>        
        
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> <img src='<?php echo IMG.'back.png'; ?>' height="10px" width="auto"> <span class="current"><a href="<?php echo 'lgt.php';?>">Logout<?php echo ' ('.$_SESSION['role'].')'; ?></a></span> </div>
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
  

      <style type="text/css">
          

          .center_content input[type=submit],input[type=button],button[type=submit]{
      
                padding: 4px;
                text-align: center;
                float: none;

              } 
        </style>





      		<?php //$record->getMealByRank(10); ?>

			
        <?php  $cat_id=@$_GET[hcomponent]; if($cat_id==null){  ?>

          <table>
          
                  <?php  $record->getCategoryActiveList(); ?>

          </table>
  

        <?php   }  else{  

                      if($_SESSION['role']!=$r){

                          die('Restricted Access: Sensitive Content Not Visible To Visible Except A '.$r);
  
                      }else{

                          $me->verifylogin($r,1);

                          if(filter_var($cat_id,FILTER_VALIDATE_INT)){

                            echo "";

                          }else{

                            die("Restricted Access");
                          }
  
          ?>

          <table>
          
                  <?php  $record->getProductActiveList($cat_id); ?>

          </table>


        <?php

                      } 

              }//End Of Outer else   

        ?>
        
        
        <center>
          
          <hr></hr>

          <form action="../process/deleteitems.php" method="post">
           
          <?php
          if($cat_id==null){
              echo "
              <input type='hidden' name='deleteid' value='1'>
              <button type='submit' id='sbdeletecat'>Delete</button>
              ";

          }else{
            echo "
            <input type='hidden' name='deleteid' value='2'>
            <button type='submit' id='sbdeletepro'>Delete</button>
            ";

          }
            
            ?>


          </form>


        </center>
          


      <br><br>
    </div>



    <!-- end of center content --><!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php   include('../include/footer.php');      ?>
</div>
<!-- end of main_container -->
<div align=center></div></body>
</html>
