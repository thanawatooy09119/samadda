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
$TBNAME = "material";
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
$id_produt = $_GET['id'];

$sql = "select * from $TBNAME where id_$TBNAME = '$id_produt'";
$on = $conn->query($sql);
$_rows = $on->num_rows;
if($_rows!=1){echo '<br><center>ไม่พบสินค้า</center>'; exit();}

$_type = i_result($on,0,"type_$TBNAME");
$_status = i_result($on,0,"status_$TBNAME");

?>


    <form action="update_<?=$TBNAME;?>.php" method="post" name="m2" id="m2">
        <table border="0" cellpadding="0" cellspacing="0" id="addproduct">
            <tr>
                <td>
                    ชื่อสินค้า :

                </td>
                <td>
                    <input type="text" name="namep" value="<?=i_result($on,0,"name_$TBNAME");?>" />
                    <input type="hidden" name="idp" value="<?=$_GET['id'];?>" />

                </td>
            </tr>
            <tr>
                <td>
                    ประเภทสินค้า :

                </td>
                <td>
                    <select name="typep">
                        <option value="null">กรุณาเลือก</option>
                        <option value="clay" <?php if($_type=="clay"){echo ' selected';}?>>ดิน</option>

                        <option value="husk" <?php if($_type=="husk"){echo ' selected';}?>>แกลบ</option>

                        <option value="firewood" <?php if($_type=="firewood"){echo ' selected';}?>>ฟืน</option>


                        <option value="other" <?php if($_type=="other"){echo ' selected';}?>>อื่นๆ</option>
                    </select>



                </td>
            </tr>

            <tr>
                <td>
                    สถานะ :

                </td>
                <td>
                    <select name="statusp">
                        <option value="yes" <?php if($_status=="yes"){echo ' selected';}?>>แสดง</option>
                        <option value="no" <?php if($_status=="no"){echo ' selected';}?>>ไม่แสดง</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td>
                    ราคา :

                </td>
                <td>
                    <!-- <input type="text" name="dprice" style="color:#a00;text-decoration:line-through;" placeholder="ราคาปกติ" value="<?=i_result($on,0,"dprice_$TBNAME");?>" > -->
                    <input type="text" name="price" placeholder="ราคา" value="<?=i_result($on,0,"price_$TBNAME");?>">

                </td>
            </tr>
            <tr>
                <td nowrap>
                    จำนวนสินค้าทั้งหมด :

                </td>
                <td>

                    <input type="text" name="stockp" value="<?=i_result($on,0,"stock_$TBNAME");?>">

                </td>
            </tr>
            <tr>
                <td>
                    รายละเอียด :

                </td>
                <td>
                    <textarea cols="50" rows="5" name="desp">
       <?=i_result($on,0,"des_$TBNAME");?>
      </textarea>

                </td>
            </tr>

            <tr>
                <td colspan="2" align="center" style="text-align:center;">
                    รูปภาพ (ไม่เกิน 5 รูป) :
                    <b>Image Gallery</b> , Click <span class="glr2">Browse</span> image.
                    <hr class="clr" />
                    <div id="glr">
                        <?php
        
    for($i=1;$i<=5;$i++){
    $_img = "img".$i;
            echo '<a href="../img/'.i_result($on,0,$_img).'" target="_blank"><img src="../img/thumbnails_'.i_result($on,0,$_img).'"></a>';
    
    }
        
        ?>

                    </div>
                    <div id="hid">
                        <?php
    for($i=1;$i<=5;$i++){
    $_img = "img".$i;
    echo '<input type="hidden" name="big'.$i.'" value="../img/'.i_result($on,0,$_img).'" />';
    echo '<input type="hidden" name="small'.$i.'" value="../img/thumbnails_'.i_result($on,0,$_img).'" />';
    }
    ?>
                    </div>


                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align:center;">


                    <input type="submit" value="Update <?=$TBNAME;?>">

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