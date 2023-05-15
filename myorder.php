<?php session_start(); ?>

<?php
include "./connect.inc.php";
include "./i_result.inc.php";

$_myid = $_SESSION['myid'];
?>
<!DOCTYPE html>
<head>
<meta name="theme-color" content="#505050">
<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
<link rel="stylesheet" href="css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Title</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="mobilestyle.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.min-1.12.4.js"></script>

<script src="js/show.js"></script>

<script src="./admin/js/back.js"></script>


</head>
<body>
<div class="main">


<?php include "header.inc.php";?>
    <div class="Content" id="article">
    <!-- All in the body -->

    
<div id="overlay-wait" style="display:none;">
<form action="#" method="post" name="form-wait" id="form-wait">
<div class="addcart">
<span class="exit-wait">x</span>

<p>
<a href="#" class="yes-wait" onclick="return false;" >ยืนยันการชำระเงิน</a>

<a href="#" class="cancel-wait" onclick="return false;" >ยกเลิกรายการ</a>


<input type="hidden" value="code" name="code_wait" id="code_wait">


</p>
</div>
</form>
</div><!-- end overlay -->


<div id="overlay-check" style="display:none;">
<form action="addcart.php" method="post" name="sentcart" id="form-check">
<div class="addcart">
<span class="exit-check">x</span>

<p>
<a href="#" class="yes-check" onclick="return false;" >หลักฐานถูกต้อง</a>

<a href="#" class="cancel-check" onclick="return false;" >ยกเลิกรายการ</a>


<input type="hidden" value="code" name="code_check" id="code_check">


</p>
</div>
</form>
</div><!-- end overlay -->

<div id="overlay-send" style="display:none;">
<form action="addcart.php" method="post" name="sentcart" id="form-send">
<div class="addcart">
<span class="exit-send">x</span>

<p>
<a href="#" class="yes-send" onclick="return false;" >ส่งสินค้าเรียบร้อย</a>

<a href="#" class="cancel-send" onclick="return false;" >ยกเลิกรายการ</a>


<input type="hidden" value="code" name="code_send" id="code_send">


</p>
</div>
</form>
</div><!-- end overlay -->



<h1 class="ih1">ประวัติการสั่งซื้อสินค้า (Order History)</h1>
<br>

<table border="0" cellpadding="1" cellspacing="1" id="allorder" align="center">
<tr>
    <th>
              ลำดับ
    </th>
    <th>
              รหัส
    </th>
    <th>
              วันที่
    </th>
    <th>
             รายละเอียด
    </th>    
    <th>
             ราคารวม
    </th>  
        
    <th>
             สถานะ
    </th> 

    <th>
             สั่งพิมพ์
    </th> 
    
    
</tr>
<?php
$sql = "SELECT * FROM  `order` WHERE `order`.`id_member` = '$_myid' ORDER BY `order`.`id_order` DESC;";
$on = $conn->query($sql);
$_row = $on->num_rows;
for($x=0;$x<$_row;$x++){

$_status = i_result($on,$x,"status_order"); 
$id_order = i_result($on,$x,"id_order");
echo '<tr>';
echo '<td>'.($x+1).'</td>';
echo '<td>171'.$id_order.'</td>';
echo '<td>'.i_result($on,$x,"time_order").'</td>';
echo '<td>';
echo '<a href="mydetail.php?order=171'.$id_order.'" target="_blank">';

echo i_result($on,$x,"list_order");
echo ' รายการ ';
echo ' / ';
echo i_result($on,$x,"qty_order");
echo ' ชิ้น';
echo '</a></td>';

echo '<td style="font-weight:bold;">'.number_format(i_result($on,$x,"price_order")).'</td>';


echo '<td id="bill_171'.$id_order.'">';
if($_status=="wait"){

    echo '(รอ) ';
echo '<a href="confirm.php?order=171'.$id_order.'" class="st-wait">';
echo 'ยืนยันการชำระสินค้า';
echo '</a>';

}else
if($_status=="checking"){

// echo '<a href="#" class="st-checking" onclick="return false;" data-panda="171'.$id_order.'">';
echo 'รอตรวจสอบ';
// echo '</a>';

}else
if($_status=="sending"){
// echo '<a href="#" class="st-sending" onclick="return false;" data-panda="171'.$id_order.'">';
echo 'ดำเนินการจัดส่ง';
// echo '</a>';


}else
if($_status=="complete"){
echo '<font color="#008800">สำเร็จ</font>';



}else{

echo '<font color="#880000">ยกเลิกแล้ว</font>';

}


echo '</td>';

echo '<td>';
    echo '<a href="javascript:return false;" onclick="printPage(\'mydetail.php?order=171'.$id_order.'\');" class="dontshowprn ibtn-orange">พิมพ์ <i class="fa fa-print"></i></a>';
echo '</td>';


echo '</tr>';





}
?>

</table>
<br>





    <!-- End All in the body -->

    </div>
    <!-- <div class="Footer">

    <?php include "infooter.inc.php";?>
    </div> -->
</div>

</body>
</html>