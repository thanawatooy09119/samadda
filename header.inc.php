<?php session_start(); ?>
<?php
# Check DIR
//$dir_current = end(explode("\\",getcwd()));
//print(getcwd());
$all_self = $_SERVER["PHP_SELF"];
$_self = end(explode("/", $all_self));
//$dir_current = explode("/",dirname(getcwd().$_SERVER["PHP_SELF"]));

//$dir_current = explode("/",dirname(getcwd().$_SERVER["PHP_SELF"]));
//$dir_current = end($dir_current);
//$dir_current = end(explode("/",$dir_current ));


$sql_category = "select * from category";

$on_category = $conn->query($sql_category);
$_rows_category = $on_category->num_rows;


if ($_rows_category <= 0) {
  echo '<br><center>ไม่พบประเภทสินค้า</center>';
  exit();
}

// // Fetch all categories into an array
$categories = $on_category->fetch_all(MYSQLI_ASSOC);
?>

<div class="Header">


  <a id="showmobile">&nbsp;</a>


  <div id="sidr">

    <div class="inheader">
      <!-- <span class="fa fa-home" style="font-size:22px"></span> -->

      <!-- <?php phpinfo(); ?> -->

      <img src="images/123456.jpg" alt="" width="50" height="30"><a href="./" class="dropbtn2"><span></span><span class="dropbtn2">สมัดดาผ้าทอมือ</span></a>
      <span class="no">&nbsp;</span>



      <div class="dropdown2">
        <a href="product.php" class="dropbtn2<?php if ($_GET['id'] == "small" || $_GET['id'] == "big" || $_GET['id'] == "other" || $_self == "product.php") {
                                                echo ' curent';
                                              } ?> fa fa-caret-down">&nbsp;สินค้าทั้งหมด</a>
        <div class="dropdown-content2">
          <?php
          foreach ($categories as $category) {
            $category_name = $category['name'];
            $category_id = $category['id'];

            // Output the option tag
            // echo '<option value="' . $category_id . '" ' . $selected . '>' . $category_name . '</option>';

            // echo '<a href="product.php?id=' . $category_id . '" class="curent">' . $category_name . '</a>';
            echo '<a href="product.php?id=' . $category_id . '"';
            if ($_GET['id'] == $category_id) {
              echo ' class="curent"';
            }
            echo '>' . $category_name . '</a>';
          }
          ?>




        </div>
      </div>


      <span class="no">&nbsp;</span>

      <a href="story.php" <?php if ($_self == "story.php") {
                            echo ' class="curent"';
                          } ?>><span class="fa fa-comments" style="font-size:22px"></span>&nbsp;ข่าวประชาสัมพันธ์</a>

      <span class="no">&nbsp;</span>
      <!-- fa fa-shopping-cart -->
      <a href="howto.php" <?php if ($_self == "howto.php") {
                            echo ' class="curent"';
                          } ?>><span class="fa fa-question-circle" style="font-size:22px"></span>&nbsp;วิธีการสั่งซื้อ</a>
      <span class="no">&nbsp;</span>
      <!-- <a href="confirm.php" <?php if ($_self == "confirm.php") {
                                    echo ' class="curent"';
                                  } ?>><span class="fa fa-credit-card" style="font-size:22px"></span>&nbsp;ยืนยันการชำระสินค้า</a> 
        <span class="no">&nbsp;</span>  -->
      <a href="contact.php" <?php if ($_self == "contact.php") {
                              echo ' class="curent"';
                            } ?>><span class="fa fa-phone-square" style="font-size:22px"></span>&nbsp;ติดต่อเรา</a>
      <span class="no">&nbsp;&nbsp;&nbsp;</span>


      <?php
      if ($_SESSION['myuser']) {


        echo ' <div class="dropdown2">
              <a href="#">สวัสดี&nbsp;' . $_SESSION['myname'] . '&nbsp;<span class="fa fa-caret-down" style="font-size:22px"></span></a> 

              <div class="dropdown-content2">';

        echo '<a href="myorder.php" ';
        if ($_self == "myorder.php") {
          echo ' class="curent"';
        }
        echo '>ประวัติการสั่งซื้อ (History)</a>';

        echo '<a href="#" class="gosetting">ตั้งค่าผู้ใช้งาน (Setting)</a>  
                  <a href="confirm.php">ยืนยันการชำระสินค้า</a>        
                  <a href="logout.php">ออกจากระบบ (Logout)</a> 
              </div>
        </div>  ';
      } else {
      ?>

        <div class="dropdown2">
          <a href="#" <?php if ($_self == "contact.php") {
                        echo ' class="curent"';
                      } ?>>&nbsp;สมาชิก&nbsp;<span class="fa fa-caret-down" style="font-size:22px"></span></a>

          <div class="dropdown-content2">
            <a href="#" class="gologin">เข้าสู่ระบบ</a>
            <a href="#" class="goregis">สมัครสมาชิก</a>
          </div>
        </div>



      <?php
      }
      ?>


      <a href="#" class="hidmenu"><span class="fa fa-reorder" style="font-size:22px"></span>&nbsp;ปิดเมนู</a>





    </div>
  </div>
</div>





<div class="loginbox">
</div>

<div class="loginform">
  <form id="loginform">
    <h5 style="text-align:center;"><span class="imadelogo">สมัดดาผ้าทอมือ</span><span class="ibricklogo"></span> (เข้าสู่ระบบ)</h5>
    <div class="ihr"></div>
    <input type="text" name="firstname" class="customerusername" placeholder="ชื่อผู้ใช้งาน (username)" />
    <br />

    <input type="password" name="pwd" class="customerpassword" placeholder="รหัสผ่าน (Password)" />
    <div class="ihr"></div>

    <input type="button" value="เข้าสู่ระบบ" class="loginsubmit" />

    <button type="button" class="logincancel">ยกเลิก</button>

  </form>

  <div class="loginstatus">เข้าสู่ระบบ | <span class="goregis iunder hand">สมัครสมาชิก</span></div>


</div>



<div class="regisbox">
</div>

<div class="regisform">
  <form id="regisform">
    <h5 style="text-align:center;"><span class="imadelogo">สมัดดาผ้าทอมือ</span><span class="ibricklogo"></span> (สมัครสมาชิก)</h5>

    <div class="ihr"></div>
    <input type="text" name="firstname" class="regisuser" placeholder="ชื่อผู้ใช้งาน (username)" />
    <br />

    <input type="password" name="pwd" class="regispass" placeholder="รหัสผ่าน (password)" />
    <input type="password" name="confirm" class="regisconfirm" placeholder="ยืนยันรหัสผ่าน (confirm)" />

    <div class="ihr"></div>
    <input type="text" name="fullname" class="regisfullname" placeholder="ชื่อ - สกุล" />
    <input type="text" name="address" class="regisaddress" placeholder="ที่อยู่" />
    <input type="text" name="tel" class="registel" placeholder="เบอร์โทร" />
    <div class="ihr"></div>

    <input type="button" value="สมัครสมาชิก" class="regissubmit" />

    <button type="button" class="regiscancel">ยกเลิก</button>

    <div class="regisstatus">&nbsp;</div>
  </form>
</div>






<div class="settingbox">
</div>

<div class="settingform">
  <form id="settingform">
    <h5 style="text-align:center;"><span class="imadelogo">สมัดดาผ้าทอมือ</span><span class="ibricklogo"></span> (ตั้งค่าผู้ใช้งาน)</h5>

    <div class="ihr"></div>
    <input type="text" name="firstname" class="settinguser" placeholder="ชื่อผู้ใช้งาน (username)" value="<?= $_SESSION['myuser']; ?>" disabled />
    <br />

    <input type="password" name="pwd" class="settingpass" placeholder="รหัสผ่านใหม่ (password)" />
    <input type="password" name="confirm" class="settingconfirm" placeholder="ยืนยันรหัสผ่านใหม่ (confirm)" />

    <div class="ihr"></div>
    <input type="text" name="fullname" class="settingfullname" placeholder="ชื่อ - สกุล" value="<?= $_SESSION['myname']; ?>" />
    <input type="text" name="address" class="settingaddress" placeholder="ที่อยู่" value="<?= $_SESSION['myaddress']; ?>" />


    <input type="text" name="tel" class="settingtel" placeholder="เบอร์โทร" value="<?= $_SESSION['mytel']; ?>" />
    <div class="ihr"></div>

    <input type="button" value="ตกลง" class="settingsubmit" />

    <button type="button" class="settingcancel">ยกเลิก</button>

    <div class="settingstatus">&nbsp;</div>
  </form>
</div>