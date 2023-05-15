<?php session_start(); ?>
<?php
//include "../connect.inc.php";
//include "../i_result.inc.php";
?>

 <!DOCTYPE html>
<head>



    <meta http-equiv="refresh" content="2;URL='./'" />  

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="./style.css" type="text/css">

</head>
<body>
<?php
session_destroy();



?>

<div class="result">กรุณารอสักครู่. .</div>
<div <?php
 //if($chk_ok=="ok"){echo 'class="complete"';}else{
 echo 'class="loader"';
 
 //}
 
 ?>
 >&nbsp;</div>
 
 </body>
 </html>