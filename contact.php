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
<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d929.0311650843543!2d104.3470762342677!3d16.48993894577804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313da12dced7a5df%3A0xb3fac9f01a56e3e2!2z4Lir4LiZ4Lit4LiH4Liq4Li54LiH4LmA4Lir4LiZ4Li34LitIOC4reC4s-C5gOC4oOC4rSDguKvguJnguK3guIfguKrguLnguIcg4Lih4Li44LiB4LiU4Liy4Lir4Liy4LijIOC4m-C4o-C4sOC5gOC4l-C4qOC5hOC4l-C4og!5e1!3m2!1sth!2sus!4v1684909995010!5m2!1sth!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d726.9337228379175!2d104.34700968486126!3d16.490017553340927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313da13ba050dc2b%3A0xb205afc711a6a5e7!2z4Lij4LmJ4Liy4LiZ4Lit4Liy4Lir4Liy4Lij4Liq4Li44LiU4LiV4Liy4LmB4Lil4LiI4Li04LmJ4Lih4LiI4Li44LmI4Lih!5e0!3m2!1sth!2sus!4v1684910171475!5m2!1sth!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>

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