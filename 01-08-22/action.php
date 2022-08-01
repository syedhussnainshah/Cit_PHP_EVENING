<?php
session_start();
if (isset($_REQUEST['addtocart'])) {
    echo $id = $_REQUEST['id'];
    $qty = 7;
    if (empty($qty)) {
        echo  $qty = 1;
    } else {
        echo $qty = $_REQUEST['product_qty'];
    }
    $_SESSION['mycart'][$id] = array('id' => $id, 'qty' => $qty);
    header('location: view_cart.php');
}
