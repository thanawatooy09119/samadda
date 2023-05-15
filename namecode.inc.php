<?php
function namecode($str){
$_result = "no";
global $Host,$User,$Pass,$Db1,$DBSOFTX,$conn;
$sql = "SELECT id_product,name_product FROM  `product` WHERE id_product = '$str' LIMIT 1";
$on = $conn->query($sql);
if($on){$_result = i_result($on,0,name_product);}
return $_result;
}
?>