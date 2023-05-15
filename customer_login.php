<?php session_start(); ?>
<?php
include "connect.inc.php";
include "i_result.inc.php";

?>
<?php
$login_status = "no";
$_user = $_POST['user'];
$_pass = $_POST['pass'];

$sql = "SELECT * FROM `$DBSOFTX`.`customer` WHERE user_customer = '$_user' AND pass_customer = '$_pass';";
$on = $conn->query($sql);


$_rows = $on->num_rows;


if($_rows==1){
$my_status = i_result($on,0,"status_customer");    

    if($my_status=="yes"){

        $_id = i_result($on,0,"id_customer");
        $_name = i_result($on,0,"name_customer");
        $_address = i_result($on,0,"address_customer");
        $_tel = i_result($on,0,"tel_customer");

            $login_status = "ok";
            $_SESSION['myid'] = $_id;
            $_SESSION['myuser'] = $_user;
            $_SESSION['myname'] = $_name;
            $_SESSION['myaddress'] = $_address;
            $_SESSION['mytel'] = $_tel;
    }else{

            $login_status = "inactive";
    }
    

}


echo $login_status;
?>