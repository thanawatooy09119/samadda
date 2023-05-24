<?php session_start();?>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1234';
 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) 
or die ('Error connecting to mysql');
 
mysql_set_charset('utf8',$conn);
$dbname = 'Samadda';
 
mysql_select_db($dbname);
 
$message = $_POST['message'];
//  $_myid = $_SESSION['myid'];



$_myid = $_POST['idp'];



if($message != "")
{
 $sql = "INSERT INTO `chat` VALUES(NULL,'$message','admin','$_myid')";
 mysql_query($sql);

 
 $sql = "UPDATE `customer` SET `read` = '0' WHERE `id_customer` = '$_myid' LIMIT 1;";
 mysql_query($sql);
}
 
$sql = "SELECT `Text`,`type` FROM `chat` WHERE `id_customer` = '$_myid' ORDER BY `Id` DESC";
$result = mysql_query($sql);
 
while($row = mysql_fetch_array($result)){
    if($row['type']=="admin"){
        echo '<div class="chatbox-admin2">';
        
        
        echo $row['Text'];
        echo '<span class="inchat"><i class="fa fa-user-circle" aria-hidden="true"></i> admin(seller):</span>';
        echo "</div>";
        
    }else{
        echo '<div class="chatbox2">';
        echo $row['Text'];
        echo '<span class="inchat"><i class="fa fa-user-circle" aria-hidden="true"></i> member:</span>';     
        echo "</div>";   

    }
}
 
 
?>