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

include("../connect.inc.php");
include("../i_result.inc.php");

//$sql = "SELECT * FROM `$DBSOFTX`.`content` WHERE  `howto`.`id_howto` =1 LIMIT 1 ;";
$sql = "SELECT * FROM `$DBSOFTX`.`content` ;";
$on = $conn->query($sql);
$_row = $on->num_rows;

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php if($on){echo 'All content';}else{echo '..';}?></title>

    <!--
<script src="../js/jquery.min-1.12.4.js"></script>
<script src="../js/jquery.min-1.9.1.js"></script>
-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/back.js"></script>
    <script type="text/javascript" src="./js/demo.js"></script>
    <script src="ajaxupload.js"></script>
    <script src="./js/ed2.js"></script>




    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">




    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="./style2.css" type="text/css">

    <script src="./js/ui.1.12.js"></script>


    <script>
    $(document).ready(function() {
        $("div.pp").focusin(function() {
            $(this).css("background-color", "#FFFFEC");
            $("#tools").css("opacity", "1");
        });
        $("div.pp").focusout(function() {
            $(this).css("background-color", "#FFFFFF");
            $("#tools").css("opacity", "0.5");
        });

        $("div#tools")
            .mouseover(function() {
                $("#tools").css("opacity", "1");

            })
            .mouseout(function() {

                $("#tools").css("opacity", "0.5");
            });
    });
    </script>

</head>

<body>

    <div id="onprofileimage2" style="display:none;">
        <div id="profileimage2" title="รูปภาพประจำบทความ">
            <img src="../icon/bangkok2.jpg" id="clk2">
            Click to upload image /

            Input URL image
            <br><input type="text" name="artimage" id="artimage" value=""
                placeholder="http://www.softexpedient.com/img/myicon.png" tabindex="0" />
        </div>
        <form action="ajaxupload_image_cat.php" method="post" name="sleeker2" id="sleeker2"
            enctype="multipart/form-data"><input type="hidden" name="ra1" value="medium"
                onclick="setSize(this.form,'400')" checked hidden />

            <input type="hidden" name="maxSize" value="9999999999" />
            <input type="hidden" name="maxW" value="560" />
            <input type="hidden" name="fullPath" value="../img/" />
            <input type="hidden" name="relPath" value="../img/" />
            <input type="hidden" name="colorR" value="255" />
            <input type="hidden" name="colorG" value="255" />
            <input type="hidden" name="colorB" value="255" />
            <input type="hidden" name="maxH" value="600" />
            <input type="hidden" name="filename" value="filename" />
            <input type="hidden" name="typeName" value="computer" />
            <input type="file" name="filename"
                onchange="ajaxUpload(this.form,'ajaxupload_image_cat.php?filename=name&amp;typeName=computer&amp;maxSize=9999999999&amp;maxW=560&amp;fullPath=../img/&amp;relPath=img/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=600','profileimage2','&lt;img src=\'img/loading.gif\' width=\'120\' border=\'0\' /&gt;','&lt;img src=\'img/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;"
                id="clk" hidden />
        </form>


        <div id="allbutton">
            <button id="setimage">OK</button>
            <button id="canimage">CANCEL</button>
        </div>

    </div>

    <!-- end image -->




    <script>
    $(function() {





        <
        !--END TOOLS-- >

        document.getElementById("mycontent").spellcheck = false;
        document.getElementById("mycontent").focus();
        document.getElementById("mycontent").blur();

        $("#save").click(function() {
            copyContent();
        });

        $("#mycontent").sortable({
            handle: ".mymove"
        });
        $("#tools .c1").draggable({
            //alert('asdf');
            connectToSortable: "#mycontent",
            helper: "clone",
            revert: "invalid"
        });
        $('#tools .c1').bind('mouseup', function() {

            $("#mycontent").append(
                '<div class="c1" id="toggle"><div class="mymove"><img src="../icon/exit.png" onclick="return removeme(this)" class="removeme" /></div><div class="pp" contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div><i class="drag">Drag 1 columns</i> <i class="fa fa-chevron-right fa-1" aria-hidden="true"></i></div>'
            );
            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });

            $("#toggle").effect("highlight", {}, 3000);
            $(".c1").removeAttr("id");


        });
        //$( "#tools .c1" ).mouseup({
        //alert('asdf');
        //  connectToSortable: "#mycontent",
        //  helper: "clone",
        //  revert: "invalid"
        //});
        $(".LeftMenu .c2").draggable({
            connectToSortable: "#mycontent",
            helper: "clone",
            //this._addClass( makeid() ),
            revert: "invalid"
        });
        $(".LeftMenu .c3").draggable({
            //alert('asdf');
            connectToSortable: "#mycontent",
            helper: "clone",
            revert: "invalid"
        });



    });
    </script>

    <script>
    function copyContent() {



        document.getElementById("hidmycontent").value = document.getElementById("mycontent").innerHTML;
        if (confirm('Are you sure?')) {
            document.getElementById("howto").submit();
        }
    }
    </script>




    <?php 
include "./menuadmin.inc.php";
?>
    <br><br>
    <div>
        <div style="font-size: 16px; font-weight: bold; text-align: center;">
            ข่าวประชาสัมพันธ์ทั้งหมด
        </div>
    </div>
    <br>
    <table id="allorder">
        <tr>
            <th>
                ลำดับ
            </th>
            <th>
                ชื่อเรื่อง
            </th>
            <th>
                แก้ไข
            </th>
            <th>
                ลบ
            </th>
        <tr>
            <?php
for($x=0;$x<$_row;$x++){
echo '<tr>';

echo '<td>'.($x+1).'</td>';
echo '<td style="text-align:left;text-indent:4em">'.i_result($on,$x,title_content).'</td>';
echo '<td><a href="content_edit.php?id='.i_result($on,$x,id_content).'">EDIT</a></td>';
echo '<td><a href="content_delete.php?id='.i_result($on,$x,id_content).'" onclick="return confirm(\'Are you sure you want to delete this item?\');">DELETE</a></td>';
echo '</tr>';
}

?>
    </table>



</body>

</html>