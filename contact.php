<?php session_start();?>

<?php

include("./connect.inc.php");
include("./i_result.inc.php");

$sql = "SELECT * FROM `$DBSOFTX`.`howto` WHERE  `howto`.`id_howto` =2 LIMIT 1 ;";
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
<div id="mymap">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7593.651507964396!2d102.78326929999999!3d17.893599400000017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sth!2sth!4v1454227414469" width="400" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
</div>

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