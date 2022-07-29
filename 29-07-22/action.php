<?php
session_start();
if (isset($_REQUEST['addtocart'])) {
    echo $id = $_REQUEST['id'];
    $qty = 7;
    $_SESSION['mycart'][$id] = array('id' => $id, 'qty' => $qty);
    header('location: view_cart.php');
}
