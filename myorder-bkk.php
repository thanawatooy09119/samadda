<?php session_start(); ?>

<?php
include "./connect.inc.php";
include "./i_result.inc.php";
?>
<!DOCTYPE html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="./style.css" type="text/css">

<script src="./js/jquery.min-1.12.4.js"></script>

<script src="./admin/js/back.js"></script>



</head>
<body>




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
             หลักฐานการชำระเงิน
    </th>     
    <th>
             สถานะ
    </th> 
</tr>
<?php
$sql = "SELECT * FROM  `order`";
$on = $conn->query($sql);
$_row = $on->num_rows;
for($x=0;$x<$_row;$x++){

$_status = i_result($on,$x,"status_order"); 
$id_order = i_result($on,$x,"id_order");
echo '<tr>';
echo '<td>'.($x+1).'</td>';
echo '<td>'.$id_order.'</td>';
echo '<td>'.i_result($on,$x,"time_order").'</td>';
echo '<td>';
echo '<a href="detail.php?order='.$id_order.'" target="_blank">';
echo i_result($on,$x,"list_order");
echo ' / ';
echo i_result($on,$x,"qty_order");
echo '</a></td>';

echo '<td style="font-weight:bold;">'.number_format(i_result($on,$x,"price_order")).'</td>';
echo '<td>';
echo ' '.i_result($on,$x,"bank_paid");
echo ' / ';
echo ' '.i_result($on,$x,"time_paid");
if((trim(i_result($on,$x,"img_paid"))!="no") and (trim(i_result($on,$x,"img_paid"))!=null)){
echo '<br>';

echo '<a href="../'.i_result($on,$x,"img_paid").'" target="_blank">ดูรูปภาพ</a>';
}

echo '</td>';
echo '<td id="bill_171'.$id_order.'">';
if($_status=="wait"){

echo '<a href="#" class="st-wait" onclick="return false;" data-panda="171'.$id_order.'">';
echo 'ยังไม่ได้ส่งหลักฐาน';
echo '</a>';

}else
if($_status=="checking"){

echo '<a href="#" class="st-checking" onclick="return false;" data-panda="171'.$id_order.'">';
echo 'รอตรวจสอบ';
echo '</a>';

}else
if($_status=="sending"){
echo '<a href="#" class="st-sending" onclick="return false;" data-panda="171'.$id_order.'">';
echo 'ดำเนินการจัดส่ง';
echo '</a>';


}else
if($_status=="complete"){
echo '<font color="#008800">จัดส่งแล้ว</font>';



}else{

echo '<font color="#880000">ยกเลิกแล้ว</font>';

}


echo '</td>';

echo '</tr>';





}
?>

</table>
<br>

</body>
</html>
