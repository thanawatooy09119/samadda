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
<?php

$_status = $_POST['status'];

$sql = "UPDATE  `$DBSOFTX`.`order` SET  `status_order` =  '".$_status."' WHERE  `order`.`id_order` = '".$_id."' LIMIT 1 ;";
$on = $conn->query($sql);

if($on){
echo $_status;
}else{

echo 'no';
}


?>