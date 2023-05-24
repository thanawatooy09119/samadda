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

<table border="0" cellpadding="0" cellspacing="0" id="allorder" align="center">
<tr>
    <th>
              ลำดับ
    </th>
    <th>
    ชื่อผู้ใช้(username)
    </th>
    <th>
             ชื่อ - สกุล
    </th>    
    <th>
             ที่อยู่
    </th>      
    <th>
             เบอร์โทร
    </th>     
    <th>
             สถานะ
    </th> 
    <th>
             แก้ไข
    </th> 
</tr>
<?php
$TB_NAME = "production";
$sql = "SELECT * FROM  `$TB_NAME`";
$on = $conn->query($sql);
$_row = $on->num_rows;
for($x=0;$x<$_row;$x++){

    
$_id = i_result($on,$x,"id_$TB_NAME");
$_user = i_result($on,$x,"user_$TB_NAME");
$_name = i_result($on,$x,"name_$TB_NAME");
$_address = i_result($on,$x,"address_$TB_NAME");
$_tel = i_result($on,$x,"tel_$TB_NAME");
$_status = i_result($on,$x,"status_$TB_NAME");


echo '<tr onmouseover="this.style.background=\'#ececec\'"  onmouseout="this.style.background=\'#ffffff\'" ';
if($_status!="yes"){ echo ' style="color:#ececec;"';}
echo '>';
echo '<td>'.($x+1).'</td>';
echo '<td>';
echo $_user;
echo '</td>';
echo '<td>';
echo $_name;
echo '</td>';
echo '<td>';
echo $_address;
echo '</td>';
echo '<td>';
echo $_tel;
echo '</td>';

echo '<td>';
if($_status=="yes"){echo 'อนุญาต';}else{echo 'ปิดการใช้งาน';}
echo '</td>';
echo '<td id="edit_2020'.$_id.'">';

echo '<a href="'.$TB_NAME.'_edit.php?id='.$_id.'">EDIT</a>';

echo '</td>';

echo '</tr>';





}
?>

</table>
<br>

</body>
</html>
