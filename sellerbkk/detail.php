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
if(!$_GET['order']){exit();}
$id_order = $_GET['order'];

include "../connect.inc.php";
include "../i_result.inc.php";
include "../namesize.inc.php";
?>
<!DOCTYPE html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">

<script src="../js/jquery.min-1.12.4.js"></script>

<script src="../js/show.js"></script>


<link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="../js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
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

<div style="width:60%;border:0px #888 solid;margin:0 auto;padding:4%;">
<?php
$sql = "SELECT * FROM  `order` WHERE `id_order` = '$id_order' limit 1";
$on = $conn->query($sql);
$_row = $on->num_rows;

?>

<table border="0" cellpadding="0" cellspacing="0" align="center" id="detail">

<tr>
    <td colspan="2">
    <?php
    
          if($_row==1){
          echo '<p style="padding-left:20px;text-align:left;">';
          echo 'รหัสสั่งซื้อ : <b>'.i_result($on,0,id_order).'</b>';
          echo '<br />';
          echo 'จำนวนรายการ :  <b>'.i_result($on,0,list_order).' รายการ</b>';
          echo '<br />';
          echo 'จำนวนสินค้า :  <b>'.i_result($on,0,qty_order).' ชิ้น</b>';
          echo '</p>';

          $_sender = i_result($on,0,send_order);
          $_name = i_result($on,0,name);
          $_addr = i_result($on,0,address);
          $_tel = i_result($on,0,tel);
          $_status = i_result($on,0,status_order);
          }
    
    ?>
    </td>
    <td colspan="2">
             <a href="javascript:print();" class="dontshowprn">พิมพ์</a>
    </td>        
</tr>
<tr>
<td colspan="4"><hr /></td>
</tr>
<tr>
    <th>
              ลำดับ
    </th>
    <th>
             สินค้า
    </th>
    <th>
              ประเภท
    </th>
    <th>
             จำนวน(ตัว)
    </th>        
</tr>
<tr>
<?php

//echo $sql = "SELECT * FROM  `detail` WHERE `id_order` = '$id_order'";
$sql = "SELECT * FROM  `detail` INNER JOIN  `product` ON  `detail`.`id_product` =  `product`.`id_product` WHERE  `id_order` =  '$id_order'";
$on = $conn->query($sql);
$_row = $on->num_rows;
if($_row>=1){

for($x=0;$x<$_row;$x++){
echo '<tr';
if(($x%2)==0){
echo ' style="background:#ececec;"';
}
echo '>';

echo '<td>'.($x+1).'</td>';
//echo '<td>'.i_result($on,$x,product_detail).'</td>';
echo '<td>';

$_img1 = i_result($on,$x,img1);
$_img2 = i_result($on,$x,img2);
$_img3 = i_result($on,$x,img3);
$_img4 = i_result($on,$x,img4);
$_img5 = i_result($on,$x,img5);

echo i_result($on,$x,name_product);
echo '<br>';

echo '<a href="../img/'.$_img1.'" rel="prettyPhoto[gallery'.$x.']" >';
echo i_result($on,$x,product_detail);
echo '</a>';
echo '<div class="dontshowimg"><div class="infiniteCarousel"><ul class="gallery clearfix"><li>';


if(($_img1!="") and ($_img1!=null)){
echo '<a href="../img/'.$_img1.'" rel="prettyPhoto[gallery'.$x.']" >';
            print '<img src="../img/thumbnails_'.$_img1.'"/>';
echo '</a>'; 
  }
  
if(($_img2!="") and ($_img2!=null)){
echo '<a href="../img/'.$_img2.'" rel="prettyPhoto[gallery'.$x.']" >';
            print '<img src="../img/thumbnails_'.$_img2.'"/>';
echo '</a>'; 
  }
  
if(($_img3!="") and ($_img3!=null)){
echo '<a href="../img/'.$_img3.'" rel="prettyPhoto[gallery'.$x.']" >';
            print '<img src="../img/thumbnails_'.$_img3.'"/>';
echo '</a>'; 
  }
  
if(($_img4!="") and ($_img4!=null)){
echo '<a href="../img/'.$_img4.'" rel="prettyPhoto[gallery'.$x.']" >';
            print '<img src="../img/thumbnails_'.$_img4.'"/>';
echo '</a>'; 
  }
  
if(($_img5!="") and ($_img5!=null)){
echo '<a href="../img/'.$_img5.'" rel="prettyPhoto[gallery'.$x.']" >';
            print '<img src="../img/thumbnails_'.$_img5.'"/>';
echo '</a>'; 
  }


echo '</li></ul></div></div>';   
echo'</td>';
echo '<td>'.namesize(i_result($on,$x,type_detail)).'</td>';
echo '<td>'.i_result($on,$x,qty_detail).'</td>';
echo '</tr>';

}

}

?>
<tr>
<td colspan="4">
<hr />
การจัดส่ง : 
<?php

if($_sender==0){
echo 'รับด้วยตัวเอง';
}else{

echo 'ไปรษณีย์พัสดุ EMS หรือ J&T';

}

?> 

</td>
</tr>

<td colspan="4" style="padding:1%;">
 
<?php



echo 'คุณ <b>'.$_name.'</b>';
echo '<br />'.$_addr;
echo '<br />'.$_tel;


?> 

</td>
</tr>

<th colspan="4">
 

<hr />
<?php
//สถานะ :   
if($_status=="complete"){
echo '<span style="color:green">จัดส่งแล้ว</span>';
}else
if($_status=="cancel"){
echo '<span style="color:red">ยกเลิก</span>';
}else{

echo 'ยังไม่ได้จัดส่ง';

}

?> 

</th>
</tr>



</table>


</div>

</body>
</html>
