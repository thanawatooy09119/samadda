<?php session_start();
$_order = $_GET['order'];
?>
<!DOCTYPE html>

<head>
    <meta name="theme-color" content="#505050">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">


    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Title</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="mobilestyle.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min-1.12.4.js"></script>

    <script src="js/show.js"></script>

</head>

<body onload="checker();">
    <div class="main">


        <?php include "header.inc.php"; ?>

        <h3>ยืนยันการชำระสินค้า</h3>
        <hr>
        <div class="Content" id="article">



            <form action="confirm_submit.php" method="post" name="formconfirm" enctype="multipart/form-data" id="formconfirm" onsubmit="return checkform();">
                <table border="0" cellpadding="1" cellspacing="1" id="allorder" align="center">
                    <tr>
                        <td>

                            &nbsp; กรอกรหัสสินค้า<input type="text" value=" <?= $_order; ?>" name="orderid" id="orderid" />
                        </td>
                        <td>
                            &nbsp; <input type="button" name="find" value="FIND" class="find" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" id="res1">

                            &nbsp;
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" id="res2" style="display:none;">
                            <font color="red">*</font>
                            <select name="pay" style="font-weight:bold;" id="pay">
                                <option value="no">ช่องทางที่ท่านได้ชำระเงิน</option>
                                <option value="cash">จ่ายด้วยเงินสด</option>
                                <option value="KTB">ธนาคารกรุงไทย</option>

                            </select>
                            <hr>
                            <font color="red">*</font>
                            <select name="time" style="font-weight:bold;" id="time">
                                <option value="no">เวลา ที่ท่านได้ชำระเงิน (โดยประมาณ)</option>
                                <option value="รับที่หน้าร้าน">รับที่หน้าร้าน</option>
                                <option value="เวลาชำระเงิน 0-1">00.00-01.00</option>
                                <option value="เวลาชำระเงิน 1-2">01.00-02.00</option>
                                <option value="เวลาชำระเงิน 2-3">02.00-03.00</option>
                                <option value="เวลาชำระเงิน 3-4">03.00-04.00</option>
                                <option value="เวลาชำระเงิน 4-5">04.00-05.00</option>
                                <option value="เวลาชำระเงิน 5-6">05.00-06.00</option>
                                <option value="เวลาชำระเงิน 6-7">06.00-07.00</option>
                                <option value="เวลาชำระเงิน 7-8">07.00-08.00</option>
                                <option value="เวลาชำระเงิน 8-9">08.00-09.00</option>
                                <option value="เวลาชำระเงิน 9-10">09.00-10.00</option>
                                <option value="เวลาชำระเงิน 10-11">10.00-11.00</option>
                                <option value="เวลาชำระเงิน 11-12">11.00-12.00</option>
                                <option value="เวลาชำระเงิน 12-13">12.00-13.00</option>
                                <option value="เวลาชำระเงิน 13-14">13.00-14.00</option>
                                <option value="เวลาชำระเงิน 14-15">14.00-15.00</option>
                                <option value="เวลาชำระเงิน 15-16">15.00-16.00</option>
                                <option value="เวลาชำระเงิน 16-17">16.00-17.00</option>
                                <option value="เวลาชำระเงิน 17-18">17.00-18.00</option>
                                <option value="เวลาชำระเงิน 18-19">18.00-19.00</option>
                                <option value="เวลาชำระเงิน 18-19">18.00-19.00</option>
                                <option value="เวลาชำระเงิน 18-19">18.00-19.00</option>
                                <option value="เวลาชำระเงิน 18-19">18.00-19.00</option>
                                <option value="เวลาชำระเงิน 18-19">18.00-19.00</option>
                                <option value="เวลาชำระเงิน 19-20">19.00-20.00</option>
                                <option value="เวลาชำระเงิน 20-21">20.00-21.00</option>
                                <option value="เวลาชำระเงิน 21-22">21.00-22.00</option>
                                <option value="เวลาชำระเงิน 22-23">22.00-23.00</option>
                                <option value="เวลาชำระเงิน 23-24">23.00-24.00</option>
                            </select>
                            <hr>
                            รูปภาพหลักฐานการชำระเงิน (ถ้ามี) ไฟล์รูปภาพต้องเป็น jpg
                            <hr>
                            <input type="file" name="img">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="ยืนยันการชำระสินค้า" id="res3" style="display:none;">
                        </td>
                    </tr>
                </table>
            </form>
            <div id="hmm">
                &nbsp;
            </div>

        </div>
        <!-- <div class="Footer">

<?php include "infooter.inc.php"; ?>
</div> -->
    </div>

</body>

</html>