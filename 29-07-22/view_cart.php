<?php
session_start();
include_once 'connection.php';
$mycart = $_SESSION['mycart'];
print_r($_SESSION['mycart']);
foreach ($mycart as $key => $value) {
    foreach ($value as $key => $value) {
        if ($key == 'id') {
            $product_id = $value;
        }
        if ($key == 'qty') {
            $product_qty = $value;
        }
    }
    $select = "SELECT * FROM products WHERE product_id='$product_id'";
    $query = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($query);
    echo $row['product_name'];
    echo $row['product_price']*$product_qty;
}
