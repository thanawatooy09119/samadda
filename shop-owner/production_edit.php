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

    <script src="../js/jquery-1.8.3.js"></script>
    <script src="./js/back.js"></script>
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">


 <script language="javascript" type="text/javascript">
fields = 1;
function addInput(im1,im2) {
if (fields <= 5) {
//alert('ok');
document.getElementById('glr').innerHTML += "<a href=\""+im1+"\" target=\"_blank\" /><img src=\""+im2+"\" /></a>";
         
      switch(fields){
        case 1 :
          document.m2.big1.value=im1;
          document.m2.small1.value=im2;
          break;
        case 2 :
          document.m2.big2.value=im1;
          document.m2.small2.value=im2;
          break;
        case 3 :
          document.m2.big3.value=im1;
          document.m2.small3.value=im2;
          break;
        case 4 :
          document.m2.big4.value=im1;
          document.m2.small4.value=im2;
          break;
        case 5 :
          document.m2.big5.value=im1;
          document.m2.small5.value=im2;
          break;
          }
          
          fields+=1;
} 

    
}
</script>


</head>
<body>
<?php 
include "./menuadmin.inc.php";

$_id = $_GET['id'];
$TB_NAME = "production";
$sql = "select * from $TB_NAME where id_$TB_NAME = '$_id'";
$on = $conn->query($sql);
$_rows = $on->num_rows;
if($_rows!=1){echo '<br><center>ไม่พบสมาชิก</center>'; exit();}


$_status = i_result($on,0,"status_$TB_NAME");

?>


<form action="<?=$TB_NAME;?>_update.php" method="post" name="m2" id="m2">
<table border="0" cellpadding="0" cellspacing="0" id="addproduct">
<tr>
      <td>
                        ชื่อผู้ใช้ (Username) :

      </td>
      <td>
      <input type="text" name="myuser" value="<?=i_result($on,0,"user_$TB_NAME");?>" disabled />
      <input type="hidden" name="idp" value="<?=$_GET['id'];?>" />
      

      </td>
</tr> 
<tr>
      <td>
                        รหัสผ่าน (Password) :

      </td>
      <td>
      <input type="password" name="mypass" value="" placeholder="ไม่เปลี่ยนแปลง (กรุณาเว้นว่างไว้)" style="border:1px #c0c0c0 solid;color:red;" />
      

      </td>
</tr>
<tr>
      <td>
                        ชื่อ - สกุล (Fullname) :

      </td>
      <td>
      <input type="text" name="myname" value="<?=i_result($on,0,"name_$TB_NAME");?>" />
      

      </td>
</tr>

<tr>
      <td>
                        สถานะ (Status) :

      </td>
      <td>
      <select name="mystatus">
          <option value="yes"<?php if($_status=="yes"){echo ' selected';}?>>อนุญาต</option>
          <option value="no"<?php if($_status=="no"){echo ' selected';}?>>ปิดใช้งาน</option>
      </select>

      </td>
</tr>
<tr>
      <td>
                        โทรศัพท์ (Tel.) :

      </td>
      <td>
      <input type="text" name="mytel" value="<?=i_result($on,0,"tel_$TB_NAME");?>" />
      

      </td>
</tr>
<tr>
      <td>
                        ที่อยู่ (Address) :

      </td>
      <td>
      <textarea cols="50" rows="5" name="myaddress"><?=i_result($on,0,"address_$TB_NAME");?></textarea>

      </td>
</tr>


<tr>
      <td colspan="2"  style="text-align:center;">
             
             
        <input type="submit" value="แก้ไขผู้ใช้งาน">

      </td>
</tr>

</table>
</form>

 <!-- start GLR -->
						
						
		<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
			<div id="drop" >
				Drop Here

				<a>Browse</a>
				<input type="file" name="upl" multiple="">
			</div>
<!--
			<ul>
				 The file uploads will be shown here 
			</ul>
-->
		</form>
		
		<!-- Our main JS file -->
		<script src="assets/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="assets/js/jquery.ui.widget.js"></script>
		<script src="assets/js/jquery.iframe-transport.js"></script>
		<script src="assets/js/jquery.fileupload.js"></script>
		<script src="assets/js/script.js"></script>
						
						<!-- end GLR -->



</body>
</html>