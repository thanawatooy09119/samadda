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

$TB_NAME = "manufacturing";

?>

<!DOCTYPE html>

<head>



    <meta http-equiv="refresh" content="3;URL=all_<?=$TB_NAME;?>.php" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">


    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <link rel="stylesheet" href="../style.css" type="text/css">

</head>

<body>
    <?php
    
    
    

$_myid = $_list[1];
// $_myuser = $_POST['myuser'];
// $_mypass = $_POST['mypass'];
// $_mytel = $_POST['mytel'];
// $_myaddress = $_POST['myaddress'];

$_date = date("Y-m-d"); //ok
$_myname = $_POST['myuser']; //ok
$_qty = $_POST['myname']; //ok
// $_mytype = $_POST['mytype']; //ok
$_mytype = $_POST['category_name'];
$_category_id = $_POST['category_id'];

$_mystatus = $_POST['mystatus']; //ok


    // $update_sql = "INSERT INTO  `$DBSOFTX`.`$TB_NAME` (`id_$TB_NAME` ,`time_$TB_NAME` ,`name_$TB_NAME` ,`qty_$TB_NAME` ,`status_$TB_NAME`,`type_$TB_NAME`,)VALUES(NULL ,  '$_date',  '$_myname',  '$_qty',  '$_mystatus',  '$_mytype');";
    $update_sql = "INSERT INTO `$DBSOFTX`.`manufacturing` (`time_manufacturing`, `name_manufacturing`, `qty_manufacturing`, `status_manufacturing`, `type_manufacturing`, `category_id`)
    VALUES ('$_date', '$_myname', '$_qty', '$_mystatus', '$_mytype', '$_category_id');";
  
$on = $conn->query($update_sql);

if($on){

$chk_ok = "ok";
}else{
    $chk_ok = "no";
    // echo $on;
// $chk_ok = $on;
}


?>

    <div class="result"><?php
if($chk_ok=="ok"){echo 'Create New '.$TB_NAME.' complete.';}else{

echo 'Fail!';
echo $update_sql;
// echo $chk_ok;

}

?></div>
    <div <?php
 //if($chk_ok=="ok"){echo 'class="complete"';}else{
 echo 'class="loader"';
 
 //}
 
 ?>>&nbsp;</div>

</body>

</html>