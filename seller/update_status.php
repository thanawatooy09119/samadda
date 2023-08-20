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
<?php
if (isset($_POST['code']) && isset($_POST['status'])) {
    $_id = $_POST['code'];
    $_status = $_POST['status'];

    $sql = "UPDATE `$DBSOFTX`.`order` SET `status_order` = '$_status' WHERE `order`.`id_order` = '$_id' LIMIT 1";

    $on = $conn->query($sql);

    if ($on) {
        $sqlCheckDetail = "SELECT `qty_detail`, `id_product` FROM `$DBSOFTX`.`detail` WHERE `id_order` = '$_id'";
        $detailResult = $conn->query($sqlCheckDetail);

        if ($detailResult && $detailResult->num_rows > 0) {
            $row = $detailResult->fetch_assoc();
            $detailQty = intval($row['qty_detail']);
            $productCode = $row['id_product'];

            $sqlCheckStock = "SELECT `stock_product` FROM `$DBSOFTX`.`product` WHERE `id_product` = '$productCode'";
            $stockResult = $conn->query($sqlCheckStock);

            if ($stockResult && $stockResult->num_rows > 0) {
                $row = $stockResult->fetch_assoc();
                $currentStock = intval($row['stock_product']);

                // Calculate new stock after adding the returned quantity
                $newStock = $detailQty + $currentStock;

                if ($newStock >= 0) {
                    // Proceed with updating the stock
                    $sqlUpdateStock = "UPDATE `$DBSOFTX`.`product`
                                      SET `stock_product` = '$newStock'
                                      WHERE `id_product` = '$productCode'";
                    $updateResult = $conn->query($sqlUpdateStock);

                    if ($updateResult) {
                        // Stock update successful
                    } else {
                        // Stock update failed
                    }
                } else {
                    // Not enough stock for the update
                }
            } else {
                // Product not found or error in querying stock
            }
        }

        echo $_status;
    } else {
        echo 'no';
    }
}


?>