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

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../style.css" type="text/css">


<script src="./moment/js/moment.js"></script>	
	<script src="./moment/js/moment-with-locales.js"></script>  

<script src="./js/back.js"></script>



  
<style>
.hi-home{
	padding-top:10%;
}	
</style>


<script type="text/javascript" src="../jquery-1.2.6.pack.js"></script>
<script type="text/javascript">  
 
function update()
{
    $.post("server.php", { idp: $("#myid").val()}, function(data){ $("#screen").html(data);});  
 
    setTimeout('update()', 1000);
}
 
$(document).ready(

 
function() 
    {
     update();
 
     $("#button").click(    
      function() 
      {         
       $.post("server.php",{ message: $("#message").val(),idp: $("#myid").val()},
    function(data){ 
    $("#screen").val(data); 
    $("#message").val("");
    }
    );
      }
     );

     $('#message').keypress(function(e) {
    if (e.which == 13) {
    //e.preventDefault();
    
    $("#button").trigger("click");
    }
  });


    });
 
 
</script>
</head>


<body>

<?php

include "menuadmin.inc.php";

?>


<h2 align="center">ติดต่อเจ้าหน้าที่</h2>



<input type="text" value="<?=$_GET['id'];?>" id="myid" hidden />
<div class="allbtn"><input id="message" size="40" class="iinput" autofocus ><button id="button" class="ibtn-orange"> Send </button></div>

<div id="screen" cols="40" rows="40"> </div> <br>  

 
<hr />


</body>
</html>