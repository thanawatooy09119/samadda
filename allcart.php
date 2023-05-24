<?php session_start();
$all = $_SESSION['all'];

if ($all >= 1) {
    $_SESSION['proc'] = "processing";
} else {
    echo '<script>window.location.replace("./");</script>';
};
?>

<?php

include("./connect.inc.php");
include("./i_result.inc.php");

$sql = "SELECT * FROM `$DBSOFTX`.`howto` WHERE  `howto`.`id_howto` =2 LIMIT 1 ;";
$on = $conn->query($sql);


?>
<!DOCTYPE html>

<head>
    <meta name="theme-color" content="#505050">

    <link rel="stylesheet" type="text/css" href="./noeditor.css">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">


    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?= i_result($on, 0, "title_howto"); ?></title>
    <meta name="keyword" content="<?= i_result($on, 0, "keyword_howto"); ?>">
    <meta name="description" content="<?= i_result($on, 0, "des_howto"); ?>">
    <meta name="author" content="nkclassic.com">
    <meta name="copyright" content="nkclassic.com">
    <meta name="robots" content="index, follow">


    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="mobilestyle.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min-1.12.4.js"></script>

    <script src="js/show.js"></script>

</head>

<body onload="checker();">
    <div class="main">

        <?php include "header.inc.php"; ?>

        <div class="container col-md-12">
            <?php

            if ($all != 0) {
                print_r($all);
                echo '"' . $_SESSION['code'] . '"';
            ?>
                <!-- <h1>Hello World</h1> -->
                <form action="insertcart.php" method="post" name="myform">
                    <table border="0" cellpadding="0" cellspacing="0" id="allproduct" align="center">
                        <tr>
                            <th>ลำดับที่ (No.)</th>
                            <th>สินค้า (Product)</th>
                            <th><span class="inone">ประเภท/ขนาด (Type,Size)</span></th>
                            <th>จำนวน (QTY)</th>
                            <th nowrap>ราคา (Price)</th>
                        </tr>
                        <?php
                        $all_qty = 0;
                        $all_price = 0;
                        for ($x = 1; $x <= $all; $x++) {
                            echo '<tr onmouseover="this.style.background=\'#ececec\'"  onmouseout="this.style.background=\'#ffffff\'" >';
                            print '<td>' . $x . '</td>';

                            print '<td>' . $_SESSION['namecode'][$x] . '<br/ ><i style="color:#aaa">(' . $_SESSION['code'][$x] . ')</i></td>';

                            print '<td><span class="inone">' . $_SESSION['namesize'][$x] . '<br/ ><i style="color:#aaa">(' . $_SESSION['size'][$x] . ')</i></span></td>';
                            $all_qty = $all_qty + $_SESSION['qty'][$x];
                            print '<td>' . number_format($_SESSION['qty'][$x]) . ' x ' . number_format($_SESSION['price'][$x], 2) . '</td>';
                            $all_price = $all_price + ($_SESSION['price'][$x] * $_SESSION['qty'][$x]);
                            print '<td nowrap>' . number_format(($_SESSION['price'][$x] * $_SESSION['qty'][$x]), 2) . '</td>';
                            echo '</tr>';
                        }

                        ?>
                        <tr>
                            <th colspan="4">รวมสินค้าทั้งสิ้น <?= $x - 1; ?> รายการ จำนวน <?= $all_qty; ?> ตัว

                                <input type="hidden" name="list" id="list" value="<?= $x - 1; ?>" />

                                <input type="hidden" name="qty" id="qty" value="<?= $all_qty; ?>" />
                            </th>
                            <th nowrap><?= number_format($all_price, 2); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">วิธีจัดส่ง
                                <select name="sender" id="sender" style="cursor:pointer;">
                                    <option value="0">รับด้วยตนเอง</option>
                                    <option value="50">รับทางไปรษณีย์ หรือ J&T (50-)</option>
                                </select>
                            </th>
                            <th>
                                <span id="valsender">0</span>
                                <input type="hidden" name="allprice" id="allprice" value="<?= $all_price; ?>" />
                                <input type="hidden" name="total" id="total" value="<?= $all_price; ?>" />
                            </th>
                        </tr>
                        <tr style="color:red;">
                            <th colspan="4">รวมราคาทั้งสิ้น</th>
                            <th nowrap><span id="showtotal"><?= number_format($all_price); ?></span> บาท</th>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['myuser']) {


                            ?>
                        </tr>
                        <tr>
                            <th>
                                ชื่อ (Name and family name.)
                            </th>
                            <th colspan="4">
                                <?= $_SESSION['myname']; ?>
                                <input type="hidden" name="myname" placeholder="นายแดง สดใส" id="myname" value="<?= $_SESSION['myname']; ?>" />

                            </th>
                        </tr>
                        <tr>
                            <th>
                                ที่อยู่ (Address.)
                            </th>
                            <th colspan="4"><input type="hidden" name="address" placeholder="1/11 ม.1 ถ.กลางเมือง ต.ในเมือง อ.เมือง จ.อุดร 42000 " id="address" value="<?= $_SESSION['myaddress']; ?>" />
                                <?= $_SESSION['myaddress']; ?>

                            </th>
                        </tr>
                        <th>
                            เบอร์โทรศัพท์ (Tel.)
                        </th>
                        <th colspan="4"><input type="hidden" name="tel" placeholder="0812345678" id="tel" value="<?= $_SESSION['mytel']; ?>" />

                            <?= $_SESSION['mytel']; ?>

                        </th>
                        </tr>

                        <tr>
                            <th colspan="5">
                                <a href="#" class="buy3" onclick="return checksubmit(this);">ยืนยันการสั่งซื้อสินค้า
                                    (Checkout) &gt;&gt;</a>
                            </th>
                        </tr>
                    <?php
                            } else {

                                echo '
                    <th colspan="5">

                    <input type="button" value="เข้าสู่ระบบ / สมัครมาชิก เพื่อสั่งซื้อสินค้า" class="precheckout" />

                    </th>
                    </tr>';
                            } //end check login
                    ?>

                    </table>
                </form>
            <?php
            } //end check all
            ?>

            <!-- <h1>Hello World</h1> -->
        </div>
        <?php include "infooter.inc.php"; ?>

    </div>

</body>

</html>