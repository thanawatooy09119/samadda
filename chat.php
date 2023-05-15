<?php session_start(); ?>
<?php
include "./connect.inc.php";
include "./i_result.inc.php";
?>
<!DOCTYPE html>
<head>
<meta name="theme-color" content="#505050">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/font-awesome.min.css">
  

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Title</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="mobilestyle.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.min-1.12.4.js"></script>

<script src="js/show.js"></script>

<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>


<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
<script type="text/javascript">  
 
function update()
{
    $.post("server.php", {}, function(data){ $("#screen").html(data);});  
 
    setTimeout('update()', 1000);
}
 
$(document).ready(

 
function() 
    {
     update();
 
     $("#button").click(    
      function() 
      {         
       $.post("server.php", 
    { message: $("#message").val()},
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
<div class="main">
<h2 align="center">ติดต่อเจ้าหน้าที่</h2>
<?php
include "header.inc.php";
?>
<div class="Content" id="article">


<div class="allbtn"><input id="message" size="40" class="iinput" autofocus ><button id="button" class="ibtn-orange"> Send </button> </div>

<div id="screen" cols="40" rows="40"> </div> <br>  

 
<hr />
</div>
    <div class="Footer">
          <?php include "infooter.inc.php";?>
    </div>
</div>

</body>
</html>