<?php session_start();
if (!$_SESSION['login']) {
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




    <meta http-equiv="refresh" content="3;URL=all_category.php?id=<?= $_id; ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">


    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <link rel="stylesheet" href="../style.css" type="text/css">

</head>

<body>
    <?php


    $_id = $_POST['id'];
    $_name = $_POST['name'];

    // $update_sql = "update  `$DBSOFTX`.`category` (`id`, `name`) VALUES ($_id, '$_name');";
    $update_sql = "UPDATE `$DBSOFTX`.`category`  SET  `name` =  '" . $_name . "' WHERE  `category`.`id` = '" . $_id . "' LIMIT 1 ;";

    // print_r($update_sql);
// 
    // $sql = "DELETE FROM `category` WHERE `id` = $_id";
    $on = $conn->query($update_sql);





    //$insert_sql = "INSERT INTO  `$DBSOFTX`.`product` (`id_product` ,`name_product` ,`des_product` ,`type_product` ,`stock_product` ,`dprice_product` ,`price_product` ,`img1` ,`img2` ,`img3` ,`img4` ,`img5`)VALUES (NULL ,  '$_name',  '$_des',  '$_type',  '$_stock',  '$_dprice',  '$_price',  '".$big_img[1]."',  '".$big_img[2]."', '".$big_img[3]."' , '".$big_img[4]."' , '".$big_img[5]."');";
    // $update_sql = "UPDATE `$DBSOFTX`.`category`  SET  `name` =  '".$_name."',`des_product` =  '".$_des."', `type_product` =  '".$_type."', `stock_product` =  '".$_stock."', `dprice_product` =  '".$_dprice."', `price_product` =  '".$_price."', `img1` =  '".$big_img[1]."', `img2` =  '".$big_img[2]."', `img3` =  '".$big_img[3]."', `img4` =  '".$big_img[4]."', `img5` =  '".$big_img[5]."', `s` =  '".$_status."' WHERE  `categoey`.`id` = '".$_id."' LIMIT 1 ;";
    // $on = $conn->query($update_sql);



    if ($on) {

        $chk_ok = "ok";
    } else {

        $chk_ok = "no";
    }


    ?>

    <div class="result"><?php
                        if ($chk_ok == "ok") {
                            echo 'Update product complete.';
                        } else {
                            echo 'Fail!';
                        }

                        ?></div>
    <div <?php
            //if($chk_ok=="ok"){echo 'class="complete"';}else{
            echo 'class="loader"';

            //}

            ?>>&nbsp;</div>

</body>

</html>