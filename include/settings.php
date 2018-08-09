<?php
session_name('food345');
$project='cphp/food';

session_save_path($_SERVER['DOCUMENT_ROOT']."/$project/include/session");
session_start();

define('LIVE',error_reporting(0));
$Y=date('Y',time());

///////////////////////////CONSTANTS, SYSTEM FOLDERS, PLEASE DON'T MODIFY////////////////////////////////////////////////////
error_reporting(E_ALL);
/*

('IMG',$_SERVER['DOCUMENT_ROOT']."/$project/images/");
('U0',$_SERVER['DOCUMENT_ROOT']."/$project/u0/");
('CONN',$_SERVER['DOCUMENT_ROOT']."/$project/conn/");
('ADMIN',$_SERVER['DOCUMENT_ROOT']."/$project/admin/");
('CLASS',$_SERVER['DOCUMENT_ROOT']."/$project/class/");
('FONTS',$_SERVER['DOCUMENT_ROOT']."/$project/fonts/");
('INCLUDE',$_SERVER['DOCUMENT_ROOT']."/$project/include/");
('JS',$_SERVER['DOCUMENT_ROOT']."/$project/js/");
('UPLOADS',$_SERVER['DOCUMENT_ROOT']."/$project/uploads/");


*/

//////////////////////////////ABOUT ME////////////////////////////////////////////////////////////
/*ABOUT THE DEVELOPER 	
 I AM AKINDUTIRE AYOMIDE SAMUEL, I AM PASSIONATE ABOUT CODING, I BUILT 
 THIS SYSTEM ON THE BASIS OF PROFESSIONALISM AND SALES, BEING THE ORIGINAL
PROGRAMMER OF THIS APP. ALL ERRORS MUST BE REPORTED TO cliqsapp@gmail.com or
VISIT MY WEBSITE realcliqs.com THIS APP CAN RUN ON ANY OS OF WINDOW XP,7,8,8.1,NT WITH 
AT LEAST 512MB RAM, 1.5GHz PROCESSOR, 80GB HDD, AN INTERNET CONNECTION 
FOR MORE USABILITY. 
JAVASCRIPT SUPPORTED DEVICE	*/
//LIVE;
?>