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


<?php

$_list = explode("171",$_POST['idp']);
$_id = $_list[1];
?>

    <meta http-equiv="refresh" content="3;URL=customer_edit.php?id=171<?=$_id;?>" />  

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">

</head>
<body>
<?php
    
    
    

$_myid = $_list[1];
// $_myuser = $_POST['myuser'];
$_mypass = $_POST['mypass'];
$_myname = $_POST['myname'];
$_mystatus = $_POST['mystatus'];
$_mytel = $_POST['mytel'];
$_myaddress = $_POST['myaddress'];



$TB_NAME = "customer";


if($_mypass==""){

    $update_sql = "UPDATE  `$DBSOFTX`.`$TB_NAME` SET `name_customer` =  '$_myname',`status_customer` =  '$_mystatus',`address_customer` =  '$_myaddress',`tel_customer` =  '$_mytel' WHERE  `$_TBNAME`.`id_customer` = '$_myid' LIMIT 1 ;";

}else{
    $update_sql = "UPDATE  `$DBSOFTX`.`$TB_NAME` SET  `pass_customer` =  '$_mypass',
    `name_customer` =  '$_myname',`status_customer` =  '$_mystatus',`address_customer` =  '$_myaddress',`tel_customer` =  '$_mytel' WHERE  `$_TBNAME`.`id_customer` = '$_myid' LIMIT 1 ;";
}



$on = $conn->query($update_sql);

if($on){

$chk_ok = "ok";
}else{

$chk_ok = "no";
}


?>

<div class="result"><?php
if($chk_ok=="ok"){echo 'Update customer complete.';}else{
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