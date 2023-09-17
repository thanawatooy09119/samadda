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

    <script src="../js/jquery-1.8.3.js"></script>
    <script src="./js/back.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">


    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <link rel="stylesheet" href="../style.css" type="text/css">


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
    <?php 
include "./menuadmin.inc.php";
?>


    <form action="insert_product.php" method="post" name="m2" id="m2">
        <table border="0" cellpadding="0" cellspacing="0" id="addproduct">
            <tr>
                <td>
                    ชื่อสินค้า :

                </td>
                <td>
                    <input type="text" name="namep" />

                </td>
            </tr>
            <tr>
                <td>
                    ประเภทสินค้า :

                </td>
                <td>
                    <select name="typep">
                        <option value="null">กรุณาเลือก</option>
                        <option value="shirt">เสื้อ</option>

                        <option value="sarong">ผ้าซิ่น</option>

                        <option value="skirt">กระโปรง</option>
                        <option value="sabai">สไบ</option>




                        <!-- <option value="refractorybrick">อิฐทนไฟ</option> 


        
        <option value="blockbrick">อิฐบล็อก</option> 

        
        <option value="laterite">ศิลาแลง</option> 

        
        <option value="claytile">กระเบื้องดินเผา</option> 
        <option value="others">อื่นๆ</option>  -->
                    </select>

                </td>
            </tr>
            <tr>
                <td>
                    ราคา :

                </td>
                <td>
                    <!-- <input type="text" name="dprice" style="color:#a00;text-decoration:line-through;" placeholder="ราคาปกติ" > -->
                    <input type="text" name="price" placeholder="ราคา">

                </td>
            </tr>
            <tr>
                <td nowrap>
                    จำนวนสินค้าทั้งหมด (ถ้ามี) :

                </td>
                <td>

                    <input type="text" name="stockp" value="0">

                </td>
            </tr>
            <tr>
                <td>
                    รายละเอียด :

                </td>
                <td>
                    <textarea cols="50" rows="5" name="desp">
      </textarea>

                </td>
            </tr>

            <tr>
                <td colspan="2" align="center" style="text-align:center;">
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


                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align:center;">


                    <input type="submit" value="+ Add new product">

                </td>
            </tr>

        </table>
    </form>

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