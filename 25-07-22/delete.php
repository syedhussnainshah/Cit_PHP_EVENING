<?php
include_once 'connection.php';
$del_id = $_GET['del_id'];
$delete = "DELETE FROM `signup` WHERE id = '$del_id'";
$query = mysqli_query($conn, $delete);
if (!$query) {
    echo "Not Delete";
} else {
    header('location: index.php');
}
