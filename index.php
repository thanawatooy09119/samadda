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
</head>

<body>
  <div class="main">
   
    <!-- <img src="images/555.jpg"> -->
    <?php
    include "header.inc.php";
    ?>


<div class="container col-md-12">
<img src="images/105.jpg" alt="Forest" class="w3-opacity-min" width="850" height="300">



</div>


    <div class="Content" id="article">

      <div id="overlay" style="display:none;">
        <form action="addcart.php" method="post" name="sentcart" id="sentcart">
          <div class="addcart">
            <span class="cancel">x</span>
            <p id="showitem1">&nbsp;</p>
            <p id="showitem2">&nbsp;</p>

            <p>
              <input type="hidden" value="code" name="code" id="code">
              <input type="hidden" value="0" name="price" id="price">
              <input type="hidden" value="null" name="namecode" id="namecode">
              <span class="inone">
                ประเภท <select name="size">
                  <option value="m">ทั่วไป</option>
                </select>

                &nbsp;
              </span>
              จำนวน <select name="qty">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>

              </select>
              ตัว
            <p>
            <p>
              <a href="#" class="buy2" onclick="return false;">เพิ่มลงในตะกร้าสินค้า</a>
            <p>
          </div>
        </form>
      </div>

      <h2>สินค้าทั้งหมด</h2>

      <?php
      $_id = "";
      if ($_GET['id']) {
        $_id = "and(type_product = '" . $_GET['id'] . "')";
      }
      $sql = "select * from product where status_product = 'yes' $_id;";
      $on = $conn->query($sql);
      $_rows = $on->num_rows;
      for ($x = 0; $x < $_rows; $x++) {

        echo ' <div class="box">
                                  <div class="showimg">';
        $_img1 = i_result($on, $x, img1);
        $_img2 = i_result($on, $x, img2);
        $_img3 = i_result($on, $x, img3);
        $_img4 = i_result($on, $x, img4);
        $_img5 = i_result($on, $x, img5);
        echo '<div class="infiniteCarousel"><ul class="gallery clearfix"><li>';


        if (($_img1 != "") and ($_img1 != null)) {
          echo '<a href="img/' . $_img1 . '" rel="prettyPhoto[gallery' . $x . ']" >';
          print '<img src="img/thumbnails_' . $_img1 . '"/>';
          echo '</a>';
        }

        if (($_img2 != "") and ($_img2 != null)) {
          echo '<a href="img/' . $_img2 . '" rel="prettyPhoto[gallery' . $x . ']" >';
          print '<img src="img/thumbnails_' . $_img2 . '"/>';
          echo '</a>';
        }

        if (($_img3 != "") and ($_img3 != null)) {
          echo '<a href="img/' . $_img3 . '" rel="prettyPhoto[gallery' . $x . ']" >';
          print '<img src="img/thumbnails_' . $_img3 . '"/>';
          echo '</a>';
        }

        if (($_img4 != "") and ($_img4 != null)) {
          echo '<a href="img/' . $_img4 . '" rel="prettyPhoto[gallery' . $x . ']" >';
          print '<img src="img/thumbnails_' . $_img4 . '"/>';
          echo '</a>';
        }

        if (($_img5 != "") and ($_img5 != null)) {
          echo '<a href="img/' . $_img5 . '" rel="prettyPhoto[gallery' . $x . ']" >';
          print '<img src="img/thumbnails_' . $_img5 . '"/>';
          echo '</a>';
        }



        echo '</li></ul></div>';
        echo '</div>';
        print '<p class="desproduct">';
        echo '<b>' . i_result($on, $x, name_product) . '</b>';
        echo '&nbsp;';
        echo i_result($on, $x, des_product);
        echo '</p>';

        print '<p class="priceproduct">';
        // echo '
        //               ราคา <span class="del">'.number_format(i_result($on,$x,dprice_product),2).' บาท</span> 
        //     <br>        
        //        ลดเหลือ <b class="redprice">'.number_format(i_result($on,$x,price_product),2).' บาท</b>';
        // echo '</p>';

        echo '     
       ราคา <b class="redprice">' . number_format(i_result($on, $x, price_product),) . ' บาท</b>';
        echo '</p>';


        echo '            <a href="#" onclick="return false;" class="buy" data-panda="' . i_result($on, $x, id_product) . '" data-type="' . i_result($on, $x, type_product) . '" data-price="' . i_result($on, $x, price_product) . '" data-img="' . i_result($on, $x, img1) . '" data-myname="' . i_result($on, $x, name_product) . '" data-mydes="' . i_result($on, $x, des_product) . '" data-dprice="' . i_result($on, $x, dprice_product) . '" data-redprice="' . i_result($on, $x, price_product) . '">รายละเอียด</a>
      </div>';
      }
      ?>





      <hr />
      <h2>ข่าวประชาสัมพันธ์</h2>
      <?php

      $sql = "SELECT * FROM `$DBSOFTX`.`content` ORDER BY `id_content` DESC LIMIT 2";

      $on = $conn->query($sql);
      $_row = $on->num_rows;

      for ($x = 0; $x < $_row; $x++) {


        echo '<div class="box2">';
        echo '<img src="img/thumbnails_' . i_result($on, $x, img1) . '" style="border-radius:5px;">';
        echo '<p>';
        echo '<a href="story.php?id=' . i_result($on, $x, id_content) . '">';
        echo i_result($on, $x, title_content);
        echo '</a> ';
        echo '<br /> ';
        echo i_result($on, $x, des_content);
        echo '<br /> ';
        echo '<br /> ';
        echo '</p>';
        echo '<a href="story.php?id=' . i_result($on, $x, id_content) . '">Continue reading →</a>';
        //echo '<div style="text-align:left;">';
        //echo '</div>';
        echo '</div>';
      }

      ?>

      <!--
      <hr />
<h2>สินค้าแนะนำ (Recommended)</h2>

<hr />
<?php
$_recomment = array("small" => 3, "big" => 3, "other" => 2);

foreach ($_recomment as $y => $y_value) {





  $_id = "and(type_product = '$y')";
  $sql = "select * from product where status_product = 'yes' $_id order by id_product desc limit $y_value;";
  $on = $conn->query($sql);
  $_rows = $on->num_rows;

  $gallery_number += 1;
  for ($x = 0; $x < $_rows; $x++) {

    echo ' <div class="box">
<div class="showimg">';
    $_img1 = i_result($on, $x, img1);
    $_img2 = i_result($on, $x, img2);
    $_img3 = i_result($on, $x, img3);
    $_img4 = i_result($on, $x, img4);
    $_img5 = i_result($on, $x, img5);
    echo '<div class="infiniteCarousel"><ul class="gallery clearfix"><li>';


    if (($_img1 != "") and ($_img1 != null)) {
      echo '<a href="img/' . $_img1 . '" rel="prettyPhoto[gallery' . $x . $gallery_number . ']" >';
      print '<img src="img/thumbnails_' . $_img1 . '"/>';
      echo '</a>';
    }

    if (($_img2 != "") and ($_img2 != null)) {
      echo '<a href="img/' . $_img2 . '" rel="prettyPhoto[gallery' . $x . $gallery_number . ']" >';
      print '<img src="img/thumbnails_' . $_img2 . '"/>';
      echo '</a>';
    }

    if (($_img3 != "") and ($_img3 != null)) {
      echo '<a href="img/' . $_img3 . '" rel="prettyPhoto[gallery' . $x . $gallery_number . ']" >';
      print '<img src="img/thumbnails_' . $_img3 . '"/>';
      echo '</a>';
    }

    if (($_img4 != "") and ($_img4 != null)) {
      echo '<a href="img/' . $_img4 . '" rel="prettyPhoto[gallery' . $x . ']" >';
      print '<img src="img/thumbnails_' . $_img4 . '"/>';
      echo '</a>';
    }

    if (($_img5 != "") and ($_img5 != null)) {
      echo '<a href="img/' . $_img5 . '" rel="prettyPhoto[gallery' . $x . $gallery_number . ']" >';
      print '<img src="img/thumbnails_' . $_img5 . '"/>';
      echo '</a>';
    }



    echo '</li></ul></div>';
    echo '</div>';
    print '<p class="desproduct">';
    echo '<b>' . i_result($on, $x, name_product) . '</b>';
    echo '&nbsp;';
    echo i_result($on, $x, des_product);
    echo '</p>';

    print '<p class="priceproduct">';
    // echo '
    //               ราคา <span class="del">'.number_format(i_result($on,$x,dprice_product),2).' บาท</span> 
    //     <br>        
    //        ลดเหลือ <b class="redprice">'.number_format(i_result($on,$x,price_product),2).' บาท</b>';
    // echo '</p>';

    echo 'ราคา <b class="redprice">' . number_format(i_result($on, $x, price_product),) . ' บาท</b>';
    echo '</p>';


    echo '            <a href="#" onclick="return false;" class="buy" data-panda="' . i_result($on, $x, id_product) . '" data-type="' . i_result($on, $x, type_product) . '" data-price="' . i_result($on, $x, price_product) . '" data-img="' . i_result($on, $x, img1) . '" data-myname="' . i_result($on, $x, name_product) . '" data-mydes="' . i_result($top_on, $x, des_product) . '" data-dprice="' . i_result($top_on, $x, dprice_product) . '" data-redprice="' . i_result($top_on, $x, price_product) . '">รายละเอียด</a>
      </div>';
  }
} //end foreach
?>
-->

      <hr>

      <a href="story.php">เรื่องราวที่น่าสนใจอื่นๆ</a>

      <hr />
    </div>
    <!-- <div class="Footer">
          <?php include "infooter.inc.php"; ?> 
    </div> -->
  </div>
  <div id="allmycart" <?php if (!$_SESSION['all']) {
                        echo 'style="display:none;"';
                      } ?>><a href="allcart.php"><?php if ($_SESSION['all']) {
                                                                                                            echo $_SESSION['all'];
                                                                                                          } else {
                                                                                                            echo '0';
                                                                                                          } ?>&nbsp;รายการ</a></div>
</body>

</html>