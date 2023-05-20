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

$category = "category";
?>

 <!DOCTYPE html>
<head>


    <!-- <meta http-equiv="refresh" content="3;URL=all_<?=$category;?>.php" /> -->
    <meta http-equiv="refresh" content="3;URL= category.php"/>  

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">

</head>
<body>
<?php
    
    
    

$_id = $_list[1];
$_name = $_POST['name']; //ok
$_detail = $_POST['detail']; //ok

    $update_sql = "INSERT INTO  `$DBSOFTX`.`$category` (`name_$category` ,`detail_$category` )VALUES(NULL , '$_name',  '$_detail',);";


$on = $conn->query($update_sql);

if($on){

$chk_ok = "ok";
}else{

$chk_ok = "no";
}


?>

<div class="result"><?php
if($chk_ok=="ok"){echo 'Create New '.$category.' complete.';}else{
echo 'Fail!!!';

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