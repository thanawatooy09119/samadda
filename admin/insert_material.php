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

$TBNAME = "material";
?>

 <!DOCTYPE html>
<head>



    <meta http-equiv="refresh" content="3;URL='add_<?=$TBNAME;?>.php'" />  

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">
<script>
setTimeout(function(){
window.location.replace("add_<?=$TBNAME;?>.php");
},3000);

</script>
</head>
<body>
<?php
    for($i=1;$i<=5;$i++){
    $big_img[$i] = str_replace("../img/","",$_POST['big'.$i]);
    $small_img[$i] = str_replace("../img/","",$_POST['small'.$i]);
    
    }
    

$_name = $_POST['namep'];
$_type = $_POST['typep'];
$_dprice = $_POST['dprice'];
$_price = $_POST['price'];
$_stock = $_POST['stockp'];
$_des = $_POST['desp'];

//$sql = "UPDATE  `$DBSOFTX`.`order` SET  `status_order` =  '".$_status."' WHERE  `order`.`id_order` = '".$_id."' LIMIT 1 ;";
$insert_sql = "INSERT INTO  `$DBSOFTX`.`$TBNAME` (`id_$TBNAME` ,`name_$TBNAME` ,`des_$TBNAME` ,`type_$TBNAME` ,`stock_$TBNAME` ,`dprice_$TBNAME` ,`price_$TBNAME` ,`img1` ,`img2` ,`img3` ,`img4` ,`img5`)VALUES (NULL ,  '$_name',  '$_des',  '$_type',  '$_stock',  '$_dprice',  '$_price',  '".$big_img[1]."',  '".$big_img[2]."', '".$big_img[3]."' , '".$big_img[4]."' , '".$big_img[5]."');";
$on = $conn->query($insert_sql);

if($on){

$chk_ok = "ok";
}else{

$chk_ok = "no";
}


?>

<div class="result"><?php
if($chk_ok=="ok"){echo "Add $TBNAME complete.";}else{
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