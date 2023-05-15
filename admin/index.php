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


<script src="./moment/js/moment.js"></script>	
	<script src="./moment/js/moment-with-locales.js"></script>  

<script src="./js/back.js"></script>



  
<style>
.hi-home{
	padding-top:10%;
}	
</style>


</head>
<body>

<?php

include "menuadmin.inc.php";

?>

<div  class="myhome">
    
  <h5 style="text-align:center;"><span class="imadelogo">สมัดดา</span><span class="ibricklogo">ผ้าทอมือ</span></h5> 
  
  <div class="uhr"></div>
  <h5 style="text-align:center;">ระบบจัดการหลังบ้าน (Backend)</h5>
  <div class="uhr"></div>
  
  

</div>

</body>
</html>