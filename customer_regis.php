<?php session_start(); ?>
<?php
include "connect.inc.php";
include "i_result.inc.php";

?>
<?php
$all_status = "no";
$_user = $_POST['myuser'];
$_pass = $_POST['mypass'];


$_fullname = $_POST['myfull'];
$_address = $_POST['myaddr'];
$_tel = $_POST['mytel'];

$sql = "INSERT INTO  `$DBSOFTX`.`customer` (`id_customer` ,    `user_customer` ,    `pass_customer` ,    `name_customer` ,    `status_customer` ,    `address_customer` ,    `tel_customer`    )    VALUES (    NULL ,  '$_user',  '$_pass',  '$_fullname',  'yes',  '$_address',  '$_tel');";
$on = $conn->query($sql);




if($on){
    

    $all_status = "ok";

}


echo $all_status;
?>