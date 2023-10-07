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
  $id_manufacturing = $_GET['id'];
  $sql_manufacturing = "select * from manufacturing where id_manufacturing = '$id_manufacturing'";
  
  $result_manufacturing = $conn->query($sql_manufacturing);
  $_rows = $result_manufacturing->num_rows;
  $_name_manufacturing = i_result($result_manufacturing, 0, name_manufacturing);
  $_qty_manufacturing = i_result($result_manufacturing, 0, qty_manufacturing);
  $_type_manufacturing = i_result($result_manufacturing, 0, type_manufacturing);
  $_category_id_manufacturing = i_result($result_manufacturing, 0, category_id);
  
  // print_r($_name_manufacturing);
  // print_r($_qty_manufacturing);
  // print_r($_type_manufacturing);
  // print_r($_category_id_manufacturing);
  if ($_rows != 1) {
    echo '<br><center>ไม่พบการผลิต</center>';
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



  ?>
    <br><br>
    <div>
        <div style="font-size: 16px; font-weight: bold; text-align: center;">
            วางจำหน่ายสินค้า
        </div>
    </div><br>




    <form action="insert_product_sell.php" method="post" name="m2" id="m2">
        <table border="0" cellpadding="0" cellspacing="0" id="addproduct">
            <tr>
                <td>
                    ชื่อสินค้า : ขนาด :

                </td>
                <td>
                    <input type="text" name="namep" value="<?= $_name_manufacturing; ?>" />


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
                                  $selected = (i_result($result_manufacturing, 0, category_id) == $category_id) ? 'selected' : '';

                                          // Output the option tag
                                          echo '<option value="' . $category_id . '" ' . $selected . '>' . $category_name . '</option>';
                                    }
                                    ?>
                    </select>
                    <input type="hidden" name="category_name" id="category_name" value="<?php echo $_type; ?>">
                </td>
            </tr>

            <tr>


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

                    <input type="text" name="stockp" value="<?= $_qty_manufacturing; ?>">

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
            for ($i = 1; $i <= 5; $i++) {
              echo '<input type="hidden" name="big' . $i . '" value="" />';
              echo '<input type="hidden" name="small' . $i . '" value="" />';
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
    <script>
    function updateCategoryName(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var category_name = selectedOption.text;
        document.getElementById('category_name').value = category_name;
    }
    </script>


</body>

</html>