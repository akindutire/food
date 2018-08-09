  <?php	if($_SESSION['role']=='Stock Man'){	?>
  
        <li><a href="<?php echo 'index.php?ref=cpanel'; ?>" class="nav1"> Category</a></li>
        <li class="divider"></li>	 

        <li><a href="<?php echo 'index.php?ref=transaction'; ?>" target='_new' class="nav3">Transactions</a></li>
        <li class="divider"></li>
        
        <li><a href="<?php echo 'index.php?ref=orders'; ?>" class="nav2">View Orders</a></li>
        <li class="divider"></li>
     
     
        <li><a href="<?php echo 'index.php?ref=addproduct'; ?>" class="nav6">Add Item</a></li>
        <li class="divider"></li>

       <!-- <li><a href="<?php //echo 'index.php?ref=salesreport'; ?>" class="nav6">Sales Report</a></li>
        <li class="divider"></li>-->
     
	 <?php	}else{	?>

        <li><a href="<?php echo 'index.php?ref=cpanel'; ?>" class="nav1"> Items</a></li>
        <li class="divider"></li>	 

	 	<li><a href="<?php echo 'index.php?ref=orders'; ?>" class="nav2">View Orders</a></li>
        <li class="divider"></li>
     
	    <li><a href="<?php echo 'index.php?ref=deliver'; ?>" target="_new" class="nav3">Deliver Item</a></li>
        <li class="divider"></li>
     
	 
	 <?php	}	?>
	 