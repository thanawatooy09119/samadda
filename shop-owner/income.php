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
<!DOCTYPE html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">

<script src="../js/jquery.min-1.12.4.js"></script>

<script src="./js/back.js"></script>



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
<hr>
<h4 align="center">สรุปรายงานรายรับร้านสมัดดาผ้าทอมือ 1  </h4>ร้านสมัดดาผ้าทอมือ แสดง ณ วันที่: <script>document.write(new Date().toLocaleDateString());

<br>


<a href="javascript:print();" class="dontshowprn ibtn-orange fixright">พิมพ์</a>

<br />

<table border="0" cellpadding="1" cellspacing="1" id="allorder" align="center">

<tr>
    <th>
              ลำดับ
    </th>
    <th>
              วันที่
    </th>
    <th>
              รหัสสั่งซื้อ
    </th>
    <th>

    </th>    
    <th>
             ราคารวม
    </th>      
    <th>
            
  
    </th>     
    <th>
             <!-- สถานะ -->
    </th> 
</tr>
<?php
$sql = "SELECT * FROM  `order` ORDER BY `order`.`id_order` DESC;";
$on = $conn->query($sql);
$_row = $on->num_rows;

$sum_price = 0;
$_count = 0;
for($x=0;$x<$_row;$x++){

    $_status = i_result($on,$x,"status_order"); 
    if($_status!="complete"){continue;}

        $id_order = i_result($on,$x,"id_order");
        $_price = i_result($on,$x,"price_order");
        $sum_price = $sum_price+$_price;
        $_count++;


echo '<tr>';
echo '<td>'.($_count).'</td>';
echo '<td>'.i_result($on,$x,"time_order").'</td>';
echo '<td>171'.$id_order.'</td>';
echo '<td>';
// echo '<a href="detail.php?order=171'.$id_order.'" target="_blank">';
// echo i_result($on,$x,"list_order");
// echo ' / ';
// echo i_result($on,$x,"qty_order");
// echo '</a>';
echo '</td>';

echo '<td style="font-weight:bold;">'.number_format($_price).'</td>';
echo '<td>';
        // echo ' '.i_result($on,$x,"bank_paid");
        // echo ' / ';
        // echo ' '.i_result($on,$x,"time_paid");
        // if((trim(i_result($on,$x,"img_paid"))!="no") and (trim(i_result($on,$x,"img_paid"))!=null)){
        // echo '<br>';

        // echo '<a href="../'.i_result($on,$x,"img_paid").'" target="_blank">ดูรูปภาพ</a>';
        // }

        echo '</td>';
        echo '<td id="bill_171'.$id_order.'">';
        // if($_status=="wait"){

        // echo '<a href="#" class="st-wait" onclick="return false;" data-panda="171'.$id_order.'">';
        // echo 'ยังไม่ได้ส่งหลักฐาน';
        // echo '</a>';

        // }else
        // if($_status=="checking"){

        // echo '<a href="#" class="st-checking" onclick="return false;" data-panda="171'.$id_order.'">';
        // echo 'รอตรวจสอบ';
        // echo '</a>';

        // }else
        // if($_status=="sending"){
        // echo '<a href="#" class="st-sending" onclick="return false;" data-panda="171'.$id_order.'">';
        // echo 'ดำเนินการจัดส่ง';
        // echo '</a>';


        // }else
        // if($_status=="complete"){
        // echo '<font color="#008800">จัดส่งแล้ว</font>';



        // }else{

        // echo '<font color="#880000">ยกเลิกแล้ว</font>';

        // }


echo '</td>';

echo '</tr>';



}



echo '<tr>';
echo '<th colspan="1">';
    echo '';
echo '</th>';
echo '<th colspan="3">';
    echo 'รวมทั้งหมด';
echo '</th>';
    echo '<th >';
        echo '<u>';
        echo number_format($sum_price);
        echo '</u>';
    echo '</th>';
    echo '<th>';
        echo 'บาท';
    echo '</th>';
echo '</tr>';

?>

</table>
<br>

</body>
</html>
