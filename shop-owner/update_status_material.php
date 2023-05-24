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
$_id = end(explode("171",$_POST['code']));
$_status = $_POST['status'];
$TBNAME = "order_supplier";


$sql = "UPDATE  `$DBSOFTX`.`$TBNAME` SET  `status_$TBNAME` =  '".$_status."' WHERE  `$TBNAME`.`id_$TBNAME` = '".$_id."' LIMIT 1 ;";
$on = $conn->query($sql);

if($on){
echo $_status;
}else{

echo 'no';
}


?>