<?php session_start(); ?>
<?php
include "../connect.inc.php";
include "../i_result.inc.php";
?>

 <!DOCTYPE html>
<head>



    <meta http-equiv="refresh" content="3;URL='login.php'" />  

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">

</head>
<body>
<?php
   
   $_user = $_POST['uname'];
   $_pass = $_POST['psw'];

   
$login_status = "no";
// $_user = $_POST['user'];
// $_pass = $_POST['pass'];

$TB_NAME = "seller";

$sql = "SELECT * FROM `$DBSOFTX`.`$TB_NAME` WHERE user_$TB_NAME = '$_user' AND pass_$TB_NAME = '$_pass';";
$on = $conn->query($sql);


$_rows = $on->num_rows;


if($_rows==1){
$my_status = i_result($on,0,"status_$TB_NAME");    

    if($my_status=="yes"){

        $_id = i_result($on,0,"id_$TB_NAME");
        $_name = i_result($on,0,"name_$TB_NAME");
        $_address = i_result($on,0,"address_$TB_NAME");
        $_tel = i_result($on,0,"tel_$TB_NAME");

            $login_status = "ok";
            $_SESSION['adminid'] = $_id;
            $_SESSION['adminuser'] = $_user;
            $_SESSION['adminname'] = $_name;
            $_SESSION['adminaddress'] = $_address;
            $_SESSION['admintel'] = $_tel;
    }else{

            $login_status = "inactive";
    }
    

}



   

if($login_status=="ok"){

$_SESSION['login'] = "ok";
}else{
session_destroy();
}


?>

<div class="result"><?php
if($_SESSION['login']){echo 'กำลังเข้าสู่ระบบ. .';}else if($login_status=="inactive"){
echo 'ผู้ใช้งานไม่ได้รับอนุญาต (ติดต่อเจ้าหน้าที่)';

}else{
    echo 'ชื่อผู้ใช้งาน และ/หรือ รหัสผ่านไม่ถูกต้อง';

}

?></div>
<div <?php
 //if($chk_ok=="ok"){echo 'class="complete"';}else{
 echo 'class="loader"';
 
 //}
 
 ?>
 >&nbsp;</div>
 
 </body>
 </html>