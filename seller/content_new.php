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

//$sql = "SELECT * FROM `$DBSOFTX`.`howto` WHERE  `howto`.`id_howto` =1 LIMIT 1 ;";
//$on = $conn->query($sql);


?>
<!DOCTYPE HTML>
<html>

<head>
    <script src="../js/jquery-1.8.3.js"></script>
    <script src="./js/back.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Create new content</title>

    <!--
<script src="../js/jquery.min-1.12.4.js"></script>
<script src="../js/jquery.min-1.9.1.js"></script>
-->



    <script type="text/javascript" src="./js/demo.js?x=<?=rand();?>"></script>
    <script src="ajaxupload.js?x=<?=rand();?>"></script>
    <script src="./js/ed2.js?x=<?=rand();?>"></script>




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




    <script language="javascript" type="text/javascript">
    fields = 1;

    function addInput(im1, im2) {
        if (fields <= 5) {
            //alert('ok');
            document.getElementById('glr').innerHTML += "<a href=\"" + im1 + "\" target=\"_blank\" /><img src=\"" +
                im2 + "\" /></a>";

            switch (fields) {
                case 1:
                    document.m2.big1.value = im1;
                    document.m2.small1.value = im2;
                    break;
                case 2:
                    document.m2.big2.value = im1;
                    document.m2.small2.value = im2;
                    break;
                case 3:
                    document.m2.big3.value = im1;
                    document.m2.small3.value = im2;
                    break;
                case 4:
                    document.m2.big4.value = im1;
                    document.m2.small4.value = im2;
                    break;
                case 5:
                    document.m2.big5.value = im1;
                    document.m2.small5.value = im2;
                    break;
            }

            fields += 1;
        }


    }
    </script>

</head>

<body>

    <div id="onprofileimage2" style="display:none;">
        <div id="profileimage2" title="รูปภาพประจำบทความ">
            <img src="../icon/brick.jpg" id="clk2" style="max-width:560px;">
            Click to upload image
            <!-- /Input URL image  -->
            <br><input type="hidden" name="artimage" id="artimage" value="" placeholder="" tabindex="0" />
        </div>



        <form method="post" action="" enctype="multipart/form-data" id="myform">
            <div>
                <input type="file" id="file" name="file" onchange="" hidden />
                <input type="button" class="button" value="Upload" id="but_upload" hidden>
            </div>
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
        if ((document.m2.title.value != '') && (document.m2.title.value != null) &&
            (document.m2.heading.value != '') && (document.m2.heading.value != null) &&
            (document.m2.key.value != '') && (document.m2.key.value != null) &&
            (document.m2.desc.value != '') && (document.m2.desc.value != null)
        ) {

            if (confirm('Are you sure?')) {

                document.getElementById("m2").submit();
            }

        } else {

            alert("Please insert all values such as TITLE , KEYWORD , DESCRIPTION , HEADING etc. That's empty.");

        }

    }
    </script>




    <?php 
include "./menuadmin.inc.php";
?>
    <br><br>
    <div>
        <div style="font-size: 16px; font-weight: bold; text-align: center;">
            เขียนข่าวประชาสัมพันธ์
        </div>
    </div><br>
    <form action="content_insert.php" method="post" name="m2" id="m2">
        <div id="infomation">
            ชื่อเรื่อง: <input type="text" name="title" id="title" placeholder="your title"
                value="<?php //echo i_result($on,0,"title_howto");?>" />
            <br>
            หัวเรื่อง: <input type="text" name="heading" id="heading" placeholder="your heading"
                value="<?php //echo i_result($on,0,"heading_howto");?>">
            <br>
            คำสำคัญ: <input type="text" name="key" id="key" placeholder="keyword1 keyword2,keyword3,keyword4,keyword5"
                value="<?php //echo i_result($on,0,"keyword_howto");?>">
            <br>
            คำอธิบาย: <input type="text" name="desc" id="desc" placeholder="your description"
                value="<?php //echo i_result($on,0,"des_howto");?>">
            <hr />


            รูปภาพ (ไม่เกิน 5 รูป) :
            <b>Image Gallery</b> , Click <span class="glr2">Browse</span> image.
            <hr class="clr" />
            <div id="glr"></div>
            <div id="hid">
                <?php
    for($i=1;$i<=5;$i++){
    echo '<input type="hidden" name="big'.$i.'" value="" />';
    echo '<input type="hidden" name="small'.$i.'" value="" />';
    }
    ?>
            </div>

        </div>



        <input type="hidden" name="hidmycontent" value="mycon" id="hidmycontent" />
        <article class="article" id="mycontent">

            <?php
         //$str = i_result($on,0,"content_howto");
         //$str = str_replace("src=\"icon/exit.png\"","src=\"../icon/exit.png\"",$str);
         //$str = str_replace("<div class=\"ce-element ce-element--type-image","<div  contenteditable=\"true\" class=\"ce-element ce-element--type-image",$str);
         
         //echo $str;
         ?>

            <div class="c1">
                <div class="mymove"><img src="../icon/exit.png" onclick="return removeme(this)" class="removeme" />
                </div>
                <div class="pp" contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                <i class="drag">Drag 1 columns</i> <i class="fa fa-chevron-right fa-1" aria-hidden="true"></i>
            </div>

        </article>
    </form>




    <div id="tools" name="tools">

        <div id="controls" unselectable="on">

            <button type="button" class="btn-bold">&nbsp;</button>
            <button type="button" class="btn-italic">&nbsp;</button>
            <button type="button" class="btn-underline">&nbsp;</button>
            <button type="button" class="btn-link">&nbsp;</button>
            <button type="button" class="btn-unlink">&nbsp;</button>

            <button type="button" class="btn-h2">&nbsp;</button>
            <!--
<button type="button" class="btn-paragraph" title="paragraph">&nbsp;</button>

<button type="button" class="btn-code" title="source code">&nbsp;</button>
-->
            <button type="button" class="btn-youtube" title="youtube">&nbsp;</button>
            <button type="button" class="btn-image" title="Image">&nbsp;</button>
        </div>
        <div id="picker">
            <div class="jColorSelect" style="width: 336px;">
                <div style="background-color:#FFFFFF;" class="check checkblk"></div>
                <div style="background-color:#EEEEEE;"></div>
                <div style="background-color:#FFFF88;"></div>
                <div style="background-color:#FF7400;"></div>
                <div style="background-color:#CDEB8B;"></div>
                <div style="background-color:#6BBA70;"></div>
                <div style="background-color:#006E2E;"></div>
                <div style="background-color:#C3D9FF;"></div>
                <div style="background-color:#4096EE;"></div>
                <div style="background-color:#356AA0;"></div>
                <div style="background-color:#FF0096;"></div>
                <div style="background-color:#B02B2C;"></div>
                <div style="background-color:#000000;"></div>
                <div style="background-color:#FF0000;"></div>
                <div style="background-color:#00FF00;"></div>
                <div style="background-color:#0000FF;"></div>
                <div style="background-color:#555555;"></div>
            </div>
        </div>
        <div id="multi">
        </div>
        <!--
<a href="javascript:createLink(url = prompt('Enter the URL:','http://'))" >&lt;&nbsp;A&nbsp;&gt;&nbsp;(&nbsp;Link or URL&nbsp;)</a>
<a href="javascript:void(0);" onclick="document.execCommand('Bold')">B&nbsp;(&nbsp;Bold text&nbsp;)</a>
<a href="javascript:void(0);" onclick="document.execCommand('italic')"><i>I</i> (&nbsp;Italic text&nbsp;)</a>
<a href="javascript:void(0);" onclick="document.execCommand('underline')"><u>U</u>&nbsp;(&nbsp;Underline text&nbsp;)</a>
<a href="javascript:void(0);" onclick="document.execCommand('formatBlock', false, '<b>'+dataValue+'</b>');">Iframe&nbsp;(&nbsp;Import such as Map etc.&nbsp;)</a>


<a href="javascript:mrpandaman('quot');">&ldquo;&nbsp;&rdquo;&nbsp;(&nbsp;Double quote&nbsp;)</a>
<a href="javascript:addDiv();">DIV&nbsp;(&nbsp;Create paragraph&nbsp;)</a>

<a href="javascript:mrpandaman('h2');">H2&nbsp;(&nbsp;Secondary Headingh&nbsp;)</a>
-->
        <!--<a href="javascript:mrpandaman('h1');">H1&nbsp;(&nbsp;Top Heading&nbsp;)</a>-->


        <div class="c1">
            <div class="mymove"><img src="../icon/exit.png" onclick="return removeme(this)" class="removeme" /></div>
            <div class="pp" contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            <i class="drag">Drag 1 columns</i> <i class="fa fa-chevron-right fa-1" aria-hidden="true"></i>
        </div>




    </div>

    <div id="save">CREATE</div>


    <script>
    $("#tools").draggable();
    </script>





    <!-- start GLR -->


    <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
        <div id="drop">
            Drop Here

            <a>Browse</a>
            <input type="file" name="upl" multiple="">
        </div>
        <!--
			<ul>
				 The file uploads will be shown here 
			</ul>
-->
    </form>

    <!-- Our main JS file -->
    <script src="assets/js/jquery.knob.js"></script>

    <!-- jQuery File Upload Dependencies -->
    <script src="assets/js/jquery.ui.widget.js"></script>
    <script src="assets/js/jquery.iframe-transport.js"></script>
    <script src="assets/js/jquery.fileupload.js"></script>
    <script src="assets/js/script.js"></script>

    <!-- end GLR -->

</body>

</html>