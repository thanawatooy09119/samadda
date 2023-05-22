<?php



date_default_timezone_set("Asia/Bangkok");
//print_r($_SERVER);
//echo $_SERVER['HTTP_HOST'];
if($_SERVER['REMOTE_ADDR']=="127.0.0.1" || $_SERVER['HTTP_HOST']=="192.168.173.1")

{

$Host="localhost";

$User = "root";

$Pass = "1234567899";

$Db1 = "Samadda";

		$DBSOFTX = "samadda";

$URL = "http://".$_SERVER['HTTP_HOST']."/Samadda.com/";

}

else

{

$URL = "http://www.Samadda.com/";

    $Host = "localhost";

		$User = "xxx";

		$Pass  = "yyy";

		$Db1 = "Samadda";
		$DBSOFTX = "Samadda";

}


$conn = mysqli_connect($Host,$User,$Pass,$DBSOFTX);



if(!$conn){

echo "No connect..";

exit();

}

$conn->query("SET NAMES utf8");
$conn->query("use $DBSOFTX");

/****/
?>