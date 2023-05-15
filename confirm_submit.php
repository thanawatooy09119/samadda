<?php session_start(); ?>
<?php
include "connect.inc.php";
include "i_result.inc.php";
?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<?php

$sp_order = explode("171", $_POST['orderid']);
$order_id = $sp_order['1'];
$_bank = $_POST['pay'];
$time_paid = $_POST['time'];
//echo $_FILES['img']['name'];
?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_real = $target_dir.date("d-m-Y").'_'.rand(1,1000000).'.'.$imageFileType;
// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
if($_FILES["img"]["tmp_name"]){
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    }
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
    //echo $imageFileType;
    if(($uploadOk==1) && (($imageFileType == "jpg") || ($imageFileType == "png") || ($imageFileType == "jpeg") || ($imageFileType == "gif"))){
    
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_real)) {
                //echo "The file ". basename($_FILES["img"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
    
    }else{
    
    $target_real = "no";
    
    }
    
    
//}



$sql = "UPDATE `$DBSOFTX`.`order` SET `status_order` = 'checking', 	`time_paid` = '$time_paid',`bank_paid` = '$_bank',`img_paid` = '$target_real'  WHERE `id_order` = '$order_id';";
$on = $conn->query($sql);
if($on){
$chk_ok = 'ok';

}


?>
<div class="result">
<?php
if($chk_ok == 'ok'){
echo 'Confirmation was complete.';



}else{

echo 'Error, please check your order again.';

}

echo '<script>
setTimeout(function(){
window.location.replace("confirm.php?order='.$_POST['orderid'].'");
},3000);

</script>';
?>
</div>
<div class="loader"></div>

<body>
</html>