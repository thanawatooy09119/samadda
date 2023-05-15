<?php session_start();?>

<?php

include("./connect.inc.php");
include("./i_result.inc.php");

$sql = "SELECT * FROM `$DBSOFTX`.`howto` WHERE  `howto`.`id_howto` =1 LIMIT 1 ;";
$on = $conn->query($sql);


?>
<!DOCTYPE html>
<head>
<meta name="theme-color" content="#505050">

        <link rel="stylesheet" type="text/css" href="./noeditor.css">
        


<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
<link rel="stylesheet" href="css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?=i_result($on,0,"title_howto");?></title>
        <meta name="keyword" content="<?=i_result($on,0,"keyword_howto");?>" >
        <meta name="description" content="<?=i_result($on,0,"des_howto");?>" >
        <meta name="author" content="nkclassic.com">
        <meta name="copyright" content="nkclassic.com">
<meta name="robots" content="index, follow" >


<link href="style.css" rel="stylesheet" type="text/css" />
<link href="mobilestyle.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.min-1.12.4.js"></script>

<script src="js/show.js"></script>

</head>
<body onload="checker();">
<div class="main">


<?php include "header.inc.php";?>
<div id="mycontent">
<h1 align="center">
<?=i_result($on,0,"heading_howto");?>
</h1>



<?php
$str = str_replace("../img","./img",i_result($on,0,"content_howto"));
$str = str_replace("contenteditable","show",$str);
$str = str_replace("style=","istyle=",$str);
echo $str;
?>


</div>
<!-- <div class="Footer">

<?php include "infooter.inc.php";?>
</div> -->
</div>

                                                                     
                                                                     
</body>
</html>