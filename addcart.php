<?php session_start();?>

<?php

include("connect.inc.php");
include("i_result.inc.php");

include "namesize.inc.php";
include "namecode.inc.php";

$_SESSION['all'] += 1;

$_SESSION['code'][$_SESSION['all']] = $_POST['code'];
$list_code = explode("-",$_POST['code']);
$real_code = $list_code[1];
$_SESSION['namecode'][$_SESSION['all']] = namecode(trim($real_code));
$_SESSION['size'][$_SESSION['all']] = $_POST['size'];
$_SESSION['namesize'][$_SESSION['all']] = namesize(trim($_POST['size']));
$_SESSION['qty'][$_SESSION['all']] = $_POST['qty'];
$_SESSION['product_id'][$_SESSION['all']] = $_POST['product_id'];
$_SESSION['price'][$_SESSION['all']] = $_POST['price'];
//$_SESSION['size'] = $_POST['size'];
//$_SESSION['qty'] = $_POST['qty'];

//echo $_POST['code'];
//echo $_POST['size'];
//echo $_POST['qty'];
echo $_SESSION['all'];



?>
<?php 
//session_destroy();
?>