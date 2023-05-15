<?php session_start();
$_order = $_GET['order'];

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

</head>
<body onload="checker();">
<div class="main">


<?php include "header.inc.php";?>
<div class="Content" id="article">

<form action="confirm_submit.php" method="post" name="formconfirm" enctype="multipart/form-data" id="formconfirm" onsubmit="return checkform();">
<table border="0" cellpadding="1" cellspacing="1" id="allorder" align="center">
<tr>
<td>

&nbsp; <input type="text" value="<?=$_order;?>" name="orderid" id="orderid" />
</td>
<td>
&nbsp; <input type="button" name="find" value="FIND" class="find" />
</td>
</tr>

<tr>
<td colspan="2" id="res1">

&nbsp;
</td>
</tr>

<tr>
<td colspan="2" id="res2" style="display:none;" >
<font color="red">*</font>
<select name="pay"  style="font-weight:bold;" id="pay">
<option value="no">ธนาคารที่ท่านได้ชำระเงิน</option>
<option value="scb">ธนาคารกรุงไทย</option>
<!-- <option value="kbank">ธนาคารกสิกรไทย (KBANK)</option> -->
<!-- <option value="credit">บัตรเครดิต visa หรือ  master card</option> -->
<option value="other">อื่นๆ</option>
</select>
<hr>
<font color="red">*</font>
<select name="time" style="font-weight:bold;"  id="time">
<option value="no">เวลา ที่ท่านได้ชำระเงิน (โดยประมาณ)</option>
<option value="0-1">00.00-01.00</option>
<option value="1-2">01.00-02.00</option>
<option value="2-3">02.00-03.00</option>
<option value="3-4">03.00-04.00</option>
<option value="4-5">04.00-05.00</option>
<option value="5-6">05.00-06.00</option>
<option value="6-7">06.00-07.00</option>
<option value="7-8">07.00-08.00</option>
<option value="8-9">08.00-09.00</option>
<option value="9-10">09.00-10.00</option>
<option value="10-11">10.00-11.00</option>
<option value="11-12">11.00-12.00</option>
<option value="12-13">12.00-13.00</option>
<option value="13-14">13.00-14.00</option>
<option value="14-15">14.00-15.00</option>
<option value="15-16">15.00-16.00</option>
<option value="16-17">16.00-17.00</option>
<option value="17-18">17.00-18.00</option>
<option value="18-19">18.00-19.00</option>
<option value="19-20">19.00-20.00</option>
<option value="20-21">20.00-21.00</option>
<option value="21-22">21.00-22.00</option>
<option value="22-23">22.00-23.00</option>
<option value="23-24">23.00-24.00</option>
</select>
<hr>
รูปภาพหลักฐานการชำระเงิน (ถ้ามี) ไฟล์รูปภาพต้องเป็น jpg
<input type="file" name="img">
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="ยืนยันการชำระสินค้า" id="res3" style="display:none;" >
</td>
</tr>
</table>
</form>
<div id="hmm">
&nbsp;
</div>

</div>
<div class="Footer">

<?php include "infooter.inc.php";?>
</div>
</div>

</body>
</html>