<?php session_start();

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

<script src="js/show.js"></script>

<script src="./admin/js/back.js"></script>



</head>

<body>


<?php 
include "./menuadmin.inc.php";
?>

<div class="main">


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

<br>

<h4 align="center">สรุปรายงานรายจ่ายทั้งหมด (Expense Report) </h4>

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
$TBNAME = "order_supplier";
$sql = "SELECT * FROM  `$TBNAME` ORDER BY `$TBNAME`.`id_$TBNAME` DESC;";
$on = $conn->query($sql);
$_row = $on->num_rows;

$sum_price = 0;
$_count = 0;
for($x=0;$x<$_row;$x++){

    $_status = i_result($on,$x,"status_$TBNAME"); 
    if($_status!="complete"){continue;}

        $id_order = i_result($on,$x,"id_$TBNAME");
        $_price = i_result($on,$x,"price_$TBNAME");
        $sum_price = $sum_price+$_price;
        $_count++;


echo '<tr>';
echo '<td>'.($_count).'</td>';
echo '<td>'.i_result($on,$x,"time_$TBNAME").'</td>';
echo '<td>'.$id_order.'</td>';
echo '<td>';

echo '</td>';

echo '<td style="font-weight:bold;">'.number_format($_price).'</td>';
echo '<td>';
        

        echo '</td>';
        echo '<td id="bill_'.$id_order.'">';
       


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

    <!-- End All in the body -->

    </div>
    
</div>

</body>
</html>