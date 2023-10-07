<?php session_start();
if (!$_SESSION['login']) {
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
      
      $id_produt = $_GET['id'];
   
      $sql = "select * from product where id_product = '$id_produt'";

      $on = $conn->query($sql);
      $_rows = $on->num_rows;
      if ($_rows != 1) {
            echo '<br><center>ไม่พบสินค้า</center>';
            exit();
      }
   
      $sql = "SELECT * FROM `category`";
      $on_category = $conn->query($sql);
      // print_r($on_category);
      $_rows_category = $on_category->num_rows;

      if ($_rows_category <= 0) {
          echo '<br><center>ไม่พบประเภทสินค้า</center>';
          exit();
      }

      // // Fetch all categories into an array
      $categories = $on_category->fetch_all(MYSQLI_ASSOC);


      // $sql_category = "select * from category";
      // $on_category = $conn->query($sql_category);
      // $_rows_category = $on_category->num_rows;
      // if ($_rows_category != 1) {
      //       echo '<br><center>ไม่พบประเภทสินค้า</center>';
      //       exit();
      // }

      $_type = i_result($on, 0, type_product);
      $_status = i_result($on, 0, status_product);

      ?>
    <br><br>
    <div>
        <div style="font-size: 16px; font-weight: bold; text-align: center;">
            แก้ไขข้อมูลสินค้า
        </div>
    </div><br>


    <form action="update_product.php" method="post" name="m2" id="m2">
        <table border="0" cellpadding="0" cellspacing="0" id="addproduct">
            <tr>
                <td>
                    ชื่อสินค้า :

                </td>
                <td>
                    <input type="text" name="namep" value="<?= i_result($on, 0, name_product); ?>" />
                    <input type="hidden" name="idp" value="<?= $_GET['id']; ?>" />

                </td>
            </tr>
            <tr>

                <td>
                    ประเภทสินค้า :

                </td>
                <td>
                    <select name="category_id" onchange="updateCategoryName(this)">
                        <option value="null">กรุณาเลือก</option>

                        <?php
                                    // Iterate over the categories and generate options
                                    foreach ($categories as $category) {
                                          $category_name = $category['name'];
                                          $category_id = $category['id'];

                                          // Check if the current category is selected
                                          // $selected = ($_type == $category_name) ? 'selected' : '';
                                     // Check if the current category is selected
                                $selected = (i_result($on, 0, category_id) == $category_id) ? 'selected' : '';

                                          // Output the option tag
                                          echo '<option value="' . $category_id . '" ' . $selected . '>' . $category_name . '</option>';
                                    }
                                    ?>
                    </select>
                    <input type="hidden" name="category_name" id="category_name" value="<?php echo $_type; ?>">
                </td>



            </tr>

            <tr>
                <td>
                    สถานะ :

                </td>
                <td>
                    <select name="statusp">
                        <option value="yes" <?php if ($_status == "yes") {
                                                                  echo ' selected';
                                                            } ?>>แสดง</option>
                        <option value="no" <?php if ($_status == "no") {
                                                                  echo ' selected';
                                                            } ?>>ไม่แสดง</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td>
                    ราคา :

                </td>
                <td>
                    <!-- <input type="text" name="dprice" style="color:#a00;text-decoration:line-through;" placeholder="ราคาปกติ" value="<?= i_result($on, 0, dprice_product); ?>"> -->
                    <input type="text" name="price" placeholder="ราคา" value="<?= i_result($on, 0, price_product); ?>">

                </td>
            </tr>
            <tr>
                <td nowrap>
                    จำนวนสินค้าทั้งหมด :

                </td>
                <td>

                    <input type="text" name="stockp" value="<?= i_result($on, 0, stock_product); ?>">

                </td>
            </tr>
            <tr>
                <td>
                    รายละเอียด :

                </td>
                <td>
                    <textarea cols="50" rows="5" name="desp">
       <?= i_result($on, 0, des_product); ?>
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

                                    for ($i = 1; $i <= 5; $i++) {
                                          $_img = "img" . $i;
                                          echo '<a href="../img/' . i_result($on, 0, $_img) . '" target="_blank"><img src="../img/thumbnails_' . i_result($on, 0, $_img) . '"></a>';
                                    }

                                    ?>

                    </div>
                    <div id="hid">
                        <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                          $_img = "img" . $i;
                                          echo '<input type="hidden" name="big' . $i . '" value="../img/' . i_result($on, 0, $_img) . '" />';
                                          echo '<input type="hidden" name="small' . $i . '" value="../img/thumbnails_' . i_result($on, 0, $_img) . '" />';
                                    }
                                    ?>
                    </div>


                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align:center;">


                    <input type="submit" value="Update product">

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
    <script>
    function updateCategoryName(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var category_name = selectedOption.text;
        document.getElementById('category_name').value = category_name;
    }
    </script>


</body>

</html>