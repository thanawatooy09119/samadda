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

<h4 align="center">ประเภทสินค้า ร้านสมัดดาผ้าทอมือ แสดง ณ วันที่: <script>document.write(new Date().toLocaleDateString());</script></h4>

<br>
<a href="javascript:print();" class="dontshowprn ibtn-orange fixright">พิมพ์</a>
<br />

<table border="0" cellpadding="1" cellspacing="1" id="allorder" align="center">
<tr>
    <th>
              ลำดับ
    </th>
    <th>
              ประเภทสินค้า
    </th>
    <th>
              รายละเอียด
    </th>
</tr>
<?php
$sql = "SELECT * FROM `category`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $_id = $row["id"];
    $_name = $row["name"];
    $_detail = $row["detail"];

    echo '<tr>';
    echo '<th style="max-width:400px;text-align:center;">' . $_id . '</th>';
    echo '<td>' . $_name . '</td>';
    echo '<td>' . $_detail . '</td>';
    echo '</tr>';
  }
} else {
  echo "<tr><td colspan='3'>No categories found.</td></tr>";
}
?>

</table>
<br>

</body>
</html>
