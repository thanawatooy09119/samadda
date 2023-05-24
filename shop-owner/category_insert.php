<?php
session_start();
if (!$_SESSION['login']) {
    echo '<link rel="stylesheet" href="../style.css" type="text/css">';
    echo '<meta http-equiv="refresh" content="3;URL=login.php" />';
    echo '<div class="result">Please wait</div>';
    echo '<div class="loader"></div>';
    exit();
}

include "../connect.inc.php";
include "../i_result.inc.php";

$category = "category";
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="refresh" content="3;URL=all_<?=$category;?>.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<?php
$_id = $_list[1];
$_name = $_POST['name'];
// $_detail = $_POST['detail'];

$insert_sql = "INSERT INTO `$DBSOFTX`.`category` (`id`, `name`) VALUES (NULL, '$_name');";

$on = $conn->query($insert_sql);

if ($on) {
    $chk_ok = "ok";
} else {
    $chk_ok = "no";
}
?>

<div class="result">
    <?php
    if ($chk_ok == "ok") {
        echo 'Create New '.$category.' complete.';
    } else {
        echo 'Fail!';
    }
    ?>
</div>
<div class="loader">&nbsp;</div>
</body>
</html>
