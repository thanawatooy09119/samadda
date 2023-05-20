<?php 
$_data = 0;
if(!$_POST['order']){
echo 'ไม่พบราบการ';
exit;}

include "connect.inc.php";
include "i_result.inc.php";

$sp_order = explode("171",$_POST['order']);
$_id = $sp_order['1'];

$sql = "SELECT * FROM `$DBSOFTX`.`order` WHERE 	`id_order` = '$_id'";
$on = $conn->query($sql);
$_row = $on->num_rows;

if($_row==1){
$i_status = i_result($on,0,"status_order");
      
      if($i_status=='cancel'){
      
          $_data = 2;
          
            echo 'รายการสั่งซื้อถูกยกเลิก<hr />โปรดติดต่อเจ้าหน้าที่';
      
      }else
      if($i_status=='complete'){
      
          $_data = 2;
          
            echo '<font color="#33CC00"> สินค้าได้รับการจัดส่งเรียบร้อย</font>   ';
      
      }else
      if($i_status=='sending'){
      
          $_data = 2;
          
            echo '<font color="#FF6600"> กำลังดำเนินการจัดส่งสินค้า </font>  ';
      
      }else
      if($i_status=='checking'){
      
          $_data = 2;
          echo '';
            echo 'รายการสั่งซื้อได้รับการยืนยันการชำระเงินจากลูกค้าแล้ว <hr />  <font color="#3300FF"> อยู่ระหว่างการตรวจสอบ </font>';
      
      }else{
      
      echo '<b style="color:red">โปรดยืนยันการชำระสินค้า</b>';
      echo '<hr />';

      echo '<b style="color:blue">เลขบัญชีธนาคาร</b>';
      echo '<br />';

      echo '<b style="color:black">กรุงไทย 4200805111 สมัดดา กลางประพันธ์ </b>'; 
      echo '<br />';echo '<hr />';

print 'สินค้า '.i_result($on,0,"list_order").' รายการ จำนวน  '.i_result($on,0,"qty_order").'  ชิ้น';
echo '<hr />';
  if(i_result($on,0,"send_order")==0){
          echo 'รับด้วยตนเอง';
      }else{
      
          echo 'รับทางไปรษณีย์ หรือ J&T';
      
      }

echo '<hr />';

print 'รวมต้องชำระสินค้าทั้งสิน '.number_format(i_result($on,0,"price_order")).' บาท';
echo '<hr />';
      if(i_result($on,0,"id_member")==0){
          
            echo '<i>(ไม่ได้เป็นสมาชิก)</i><br>';
            
            echo 'ส่งสินค้าไปที่ <b>คุณ '.i_result($on,0,"name").'</b> <br>';
            echo 	i_result($on,0,"address");
            echo '<br>';
            echo 	'โทรศัพท์ '.i_result($on,0,"tel");
            
            
      }else{
            
          
            echo '<i>(สมาชิก)</i><br>';
            
            echo 'ส่งสินค้าไปที่ <b>คุณ '.i_result($on,0,"name").'</b> <br>';
            echo 	i_result($on,0,"address");
            echo '<br>';
            echo 	'โทรศัพท์ '.i_result($on,0,"tel");

            
      }
      
      
            $_data = 1;
      
      }// end check wait
      
      
      

}else{

echo 'ไม่พบรายการ ';
            $_data = 0;
}//end row



echo '|#|'.$_data;


?>