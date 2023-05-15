<?php session_start(); ?>
<?php
include "./connect.inc.php";
include "./i_result.inc.php";

$_id = 0;
if($_GET['id']){
$_id = $_GET['id'];
}
//$sql = "SELECT * FROM `$DBSOFTX`.`content` WHERE  `howto`.`id_howto` =1 LIMIT 1 ;";
if($_id==0){
$sql = "SELECT * FROM `$DBSOFTX`.`content` ";
}else{

$sql = "SELECT * FROM `$DBSOFTX`.`content` WHERE id_content = '$_id'";
}
$on = $conn->query($sql);
$_row = $on->num_rows;
?>
<!DOCTYPE html>
<head>
<meta name="theme-color" content="#505050">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/font-awesome.min.css">
  
        <link rel="stylesheet" type="text/css" href="./noeditor.css">

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Title</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="mobilestyle.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.min-1.12.4.js"></script>

<script src="js/show.js"></script>

<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="main">

<!-- <img src="images/555.jpg"> -->
<?php
include "header.inc.php";
?>
<div class="Content" id="mycontent">


<?php
if($_id==0){
for($x=0;$x<$_row;$x++){


echo '<div class="box2">';
echo '<img src="img/thumbnails_'.i_result($on,$x,img1).'" style="border-radius:5px;">';
echo '<p>';
echo '<a href="story.php?id='.i_result($on,$x,id_content).'">';
echo i_result($on,$x,title_content);
echo '</a> ';
echo '<br /> ';
echo i_result($on,$x,des_content);
echo '<br /> ';
echo '<br /> ';
echo '</p>';
echo '<a href="story.php?id='.i_result($on,$x,id_content).'">Continue reading →</a>';
//echo '<div style="text-align:left;">';
//echo '</div>';
echo '</div>';

}

}else{
echo '<h1 align="center">'.i_result($on,0,"heading_content").'</h1>';
$str = str_replace("../img","./img",i_result($on,0,"content_content"));
$str = str_replace("contenteditable","show",$str);
$str = str_replace("style=","istyle=",$str);
echo $str;




}// nested

?>


</div>

<!-- <div class="Footer">
          <?php include "infooter.inc.php";?>
</div> -->
</div>

                                                                     
                                                                     
</body>
</html>
