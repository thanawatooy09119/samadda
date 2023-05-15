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
$TBNAME = "manufacturing";
?>
<!DOCTYPE html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">

<script src="../js/jquery.min-1.12.4.js"></script>

<script src="./js/back3.js"></script>



</head>
<body>


<?php 
include "./menuadmin.inc.php";
?>

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
<a href="#" class="yes-check" onclick="return false;" >การผลิตสำเร็จ</a>

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
<a href="#" class="yes-send" onclick="return false;" >ส่งวัสดุเรียบร้อย</a>

<a href="#" class="cancel-send" onclick="return false;" >ยกเลิกรายการ</a>


<input type="hidden" value="code" name="code_send" id="code_send">


</p>
</div>
</form>
</div><!-- end overlay -->

<br>

<h4 align="center">สรุปรายการผลิตสินค้าร้านสมัดดาผ้าทอมือ แสดง ณ วันที่: <script>document.write(new Date().toLocaleDateString());</script></h4>

<br>
<a href="javascript:print();" class="dontshowprn ibtn-orange fixright">พิมพ์</a>
<br />

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
             รายการผลิต
    </th>    
    <th>
             จำนวนรวม
    </th>      
    <th>
           &nbsp;  
    </th>     
    <th>
             สถานะ
    </th> 
</tr>
<?php
$sql = "SELECT * FROM  `$DBSOFTX`.`$TBNAME` ORDER BY `$TBNAME`.`id_$TBNAME` DESC;";
$on = $conn->query($sql);
$_row = $on->num_rows;
for($x=0;$x<$_row;$x++){

$_status = i_result($on,$x,"status_$TBNAME"); 
$id_order = i_result($on,$x,"id_$TBNAME");
echo '<tr>';
echo '<td>'.($x+1).'</td>';
echo '<td>171'.$id_order.'</td>';
echo '<td>'.i_result($on,$x,"time_$TBNAME").'</td>';
echo '<td>';

echo i_result($on,$x,"name_$TBNAME");

echo '</td>';

echo '<td style="font-weight:bold;">'.number_format(i_result($on,$x,"qty_$TBNAME")).'</td>';
echo '<td>';


echo '</td>';
echo '<td id="bill_171'.$id_order.'">';
if($_status=="wait"){

echo '<a href="#" class="st-wait" onclick="return false;" data-panda="171'.$id_order.'">';
echo 'กำลังผลิต';
echo '</a>';

}else
if($_status=="checking"){

echo '<a href="#" class="st-checking" onclick="return false;" data-panda="171'.$id_order.'">';
echo 'กำลังผลิต';
echo '</a>';

}else
if($_status=="sending"){
echo '<a href="#" class="st-sending" onclick="return false;" data-panda="171'.$id_order.'">';
echo 'รอตรวจสอบ';
echo '</a>';


}else
if($_status=="complete"){

echo '<font color="#008800">สำเร็จ</font>';



}else{

echo '<font color="#880000">ยกเลิกการผลิต</font>';

}


echo '</td>';

echo '</tr>';





}
?>

</table>
<br>

</body>
</html>
