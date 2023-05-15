<?php
function namesize($str){
$_result = "no";
global $Host,$User,$Pass,$Db1,$DBSOFTX,$conn;
$sql = "SELECT * FROM  `namesize` WHERE code_namesize = '$str' LIMIT 1";
$on = $conn->query($sql);
if($on){$_result = i_result($on,0,name_namesize);}
return $_result;
}
?>