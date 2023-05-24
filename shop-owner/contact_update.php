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



    <meta http-equiv="refresh" content="3;URL='contact_edit.php'" />  

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">

</head>
<body>
<?php
//title,des,key,h1,content
$title = htmlspecialchars($_POST['title']);
$des = htmlspecialchars($_POST['desc']);
$key = htmlspecialchars($_POST['key']);
$h1 = htmlspecialchars($_POST['heading']);
//$content = htmlspecialchars($_POST['content']);
//$content = stripslashes($_POST['content']);
$content = $_POST['hidmycontent'];
##panda show
//$content = str_replace("contenteditable","pandashow",$_POST['content']);
$content = str_replace("ce-element ce-element--type-text ce-element--focused","ce-element ce-element--type-text",$content);

$sql = "UPDATE  `$DBSOFTX`.`howto` SET  `title_howto` =  '$title', `des_howto` =  '$des', `keyword_howto` =  '$key', `heading_howto` =  '$h1', `content_howto` =  '$content' WHERE  `howto`.`id_howto` =2 LIMIT 1 ;";
$on = $conn->query($sql);
if(!$on){
echo 'Error!';
}

?>


<div class="result">Wait. .</div>
<div <?php
 //if($chk_ok=="ok"){echo 'class="complete"';}else{
 echo 'class="loader"';
 
 //}
 
 ?>
 >&nbsp;</div>
 
 </body>
 </html>

