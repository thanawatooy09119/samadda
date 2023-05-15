<?php session_start();
if(!$_SESSION['login']){
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
echo '<meta http-equiv="refresh" content="3;URL=login.php" />  ';
echo '<div class="result">Please wait</div>';
echo '<div class="loader"></div>';
exit();
}
 ?>
<?php
include "../connect.inc.php";
include "../i_result.inc.php";
?>

 <!DOCTYPE html>
<head>



    <meta http-equiv="refresh" content="3;URL=admin_all.php" />  

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">

</head>
<body>
<?php
    
    
    

$_myid = $_list[1];
$_myuser = $_POST['myuser'];
$_mypass = $_POST['mypass'];
$_myname = $_POST['myname'];
$_mystatus = $_POST['mystatus'];
$_mytel = $_POST['mytel'];
$_myaddress = $_POST['myaddress'];



$TB_NAME = "seller";
    
    $update_sql = "INSERT INTO  `$DBSOFTX`.`$TB_NAME` (`id_$TB_NAME` ,`user_$TB_NAME` ,`pass_$TB_NAME` ,`name_$TB_NAME` ,`status_$TB_NAME` ,`address_$TB_NAME` , `tel_$TB_NAME`)VALUES(NULL ,  '$_myuser',  '$_mypass',  '$_myname',  '$_mystatus',  '$_myaddress',  '$_mytel');";





$on = $conn->query($update_sql);

if($on){

$chk_ok = "ok";
}else{

$chk_ok = "no";
}


?>

<div class="result"><?php
if($chk_ok=="ok"){echo 'Create New '.$TB_NAME.' complete.';}else{
echo 'Fail!';

}

?></div>
<div <?php
 //if($chk_ok=="ok"){echo 'class="complete"';}else{
 echo 'class="loader"';
 
 //}
 
 ?>
 >&nbsp;</div>
 
 </body>
 </html>