<?php
include 'include/settings.php';


/*	
	CliqsFramework v1.1	-A project built by cliqsteam.

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

$link=mysqli_connect('localhost','root','','food');

$rand=((int)(rand(1000,9999))-((int)(rand(20,85))));

	if($link){

		$sql=mysqli_query($link,"SELECT MAX(id) FROM mycart");
		list($highest)=mysqli_fetch_row($sql);

		$_SESSION['exploreID']=($rand).(($highest)+1);

		if(isset($_SESSION['exploreID'])){

			header('location:u0/index.php');

		}else{

			die('Our Resturant Encounter An Error, We Will Back Shortly');
		}
	}else{

			die('Communication Error, Please Bear With Us, We Will Back Shortly');

	}



?>