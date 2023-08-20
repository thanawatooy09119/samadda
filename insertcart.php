<?php session_start(); ?>
<?php
include "connect.inc.php";
include "i_result.inc.php";
?>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">


    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <link rel="stylesheet" href="style.css?x=<?=rand();?>" type="text/css">


    <script src="js/show.js"></script>

</head>
<?php
if($_SESSION['proc']=="processing" || 1==2){

$_send = $_POST['sender'];
$_product_id = $_POST['product_id'];
$_list = $_POST['list'];
$_qty = $_POST['qty'];
$_total = $_POST['total'];
$_member = $_SESSION['myid'];
$_name = $_SESSION['myname'];
$_addr = $_SESSION['myaddress'];
$_tel = $_SESSION['mytel'];
$_discount = 0;
$_status = 'wait';

$_date = date('d-m-Y');
$u_date = strtotime($_date);

// $sql = "INSERT INTO `$DBSOFTX`.`order` (`id_order` ,`send_order` ,`list_order` ,`qty_order`,`price_order` ,`id_member` ,`name` ,`address` ,`tel` ,`discount` ,`status_order`,`time_order`,`utime_order`,`time_paid`,`bank_paid`,`img_paid`, `product_id`)VALUES (NULL,  '$_send',  '$_list', '$_qty',  '$_total',  '$_member',  '$_name',  '$_addr',  '$_tel',  '$_discount','$_status','$_date','$u_date',NULL,NULL,NULL, '$_product_id');";
$sql = "INSERT INTO `$DBSOFTX`.`order` (`id_order` ,`send_order` ,`list_order` ,`qty_order`,`price_order` ,`id_member` ,`name` ,`address` ,`tel` ,`discount` ,`status_order`,`time_order`,`utime_order`,`time_paid`,`bank_paid`,`img_paid`)VALUES (NULL,  '$_send',  '$_list', '$_qty',  '$_total',  '$_member',  '$_name',  '$_addr',  '$_tel',  '$_discount','$_status','$_date','$u_date',NULL,NULL,NULL);";

$chk_ok = 'fail';
$on = $conn->query($sql);


if($on){

$on = $conn->query("SELECT id_order FROM `$DBSOFTX`.`order` order by id_order desc limit 1;");

$order_id = i_result($on,0,0);


$all = $_SESSION['all'];


for($x=1;$x<=$all;$x++){

$sql2 = "INSERT INTO `$DBSOFTX`.`detail` (`id_detail`, `id_order`, `product_detail`, `type_detail`, `price_detail`, `qty_detail`, `id_product`) VALUES (NULL, '".$order_id."', '".$_SESSION['code'][$x]."', '".$_SESSION['size'][$x]."', '".$_SESSION['price'][$x]."', '".$_SESSION['qty'][$x]."', '".end(explode("-",$_SESSION['code'][$x]))."');";
//      if($x==4){
      
  $sql3 = "UPDATE `$DBSOFTX`.`product`
  SET `stock_product` = `stock_product` - '$qty_detail'
  WHERE `id_product` = '".end(explode("-", $_SESSION['code'][$x]))."'";

$productCode = end(explode("-", $_SESSION['code'][$x]));
$qtyDetail = intval($_SESSION['qty'][$x]); 
$sqlCheckStock = "SELECT `stock_product` FROM `$DBSOFTX`.`product` WHERE `id_product` = '$productCode'";


//      }

$on2 = $conn->query($sql2);
    if($on2){ 
        $chk_ok = 'ok';
        try {
          $stockResult = $conn->query($sqlCheckStock);
      
          if ($stockResult && $stockResult->num_rows > 0) {
              $row = $stockResult->fetch_assoc();
              $currentStock = intval($row['stock_product']);
      
              // Calculate new stock after subtracting the sold quantity
              $newStock = $currentStock - $qtyDetail;
      
              if ($newStock >= 0) {
                  // Proceed with updating the stock
                  $sqlUpdateStock = "UPDATE `$DBSOFTX`.`product`
                                    SET `stock_product` = '$newStock'
                                    WHERE `id_product` = '$productCode'";
      
                  $updateResult = $conn->query($sqlUpdateStock);
      
                  if ($updateResult) {
                      // Stock update successful
                  } else {
                      // Stock update failed
                  }
              } else {
                  // Not enough stock for the update
              }
          } else {
              // Product not found or error in querying stock
          }
      } catch (Exception $e) {
          // Handle the exception
          $error_message = $e->getMessage();
          print_r("Error: $error_message");
      }
        
        }else{
          $sql_del = "DELETE FROM `$DBSOFTX`.`detail` WHERE id_order = ".$order_id.";";
            $conn->query($sql_del);
          $sql_del = "DELETE FROM `$DBSOFTX`.`order` WHERE id_order = ".$order_id.";";
            $conn->query($sql_del);
          
        $chk_ok = 'fail';
        break;
        }
}

if($chk_ok=="ok"){

### KILL ALL ###
$_SESSION['all'] = null;

$_SESSION['code'] = null;
$_SESSION['size'] = null;
$_SESSION['qty'] = null;
$_SESSION['price'] = null;


unset($_POST['sender']);
unset($_POST['list']);
unset($_POST['qty']);
unset($_POST['total']);
$_member = null;
unset($_POST['myname']);
unset($_POST['address']);
unset($_POST['tel']);
$_discount = null;
$_status = null;
### END KILL ALL ###

$_SESSION['proc'] = "processed";

}


}


} //end chk process
?>

<div class="result">
    <?php

if($chk_ok=="ok"){

  
  
echo '<i class="fa fa-check-circle biggreen"></i><br />';
echo 'เราได้รับการยืนยันการสั่งซื้อจากท่านแล้ว  รหัสสั่งซื้อ : <b>'.$order_id.'</b>';
echo '<br>';
echo 'กรุณาชำระค่าสินค้า พร้อมยืนยันการชำระสินค้าเพื่อความรวดเร็วในการจัดส่งสินค้า';
echo '<br>';
echo '<b>ยืนยันการชำระค่าสินค้าทันที <a href="./confirm.php?order='.$order_id.'" class="">คลิก</a></b>';
echo '<br>';
echo '<br>';

// echo '<a href="javascript:return false;" onclick="printPage(\'mydetail.php?order='.$order_id.'\');" class="dontshowprn ibtn-orange fa fa-print"> พิมพ์</a>';

echo '<script>
setTimeout(function(){
window.location.replace("./confirm.php?order='.$order_id.'");
},180000);

</script>';



}else{
echo 'FAIL';
echo '<script>
setTimeout(function(){
window.location.replace("allcart.php");
},3000);

</script>';

}



?>
</div>


<div <?php
 if($chk_ok=="ok"){echo 'class="complete"';}else{
 echo 'class="loader"';
 
 }
 
 ?>>&nbsp;</div>