<?php
include_once 'connection.php';
if (isset($_POST['formsubmit'])) {
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $INSERT = "INSERT INTO signup (user_name, user_email, user_pass) VALUES ('$name','$email','$pass')";
    $query = mysqli_query($conn, $INSERT);
    if ($query) {
        header('location:index.php');
    } else {
        echo "Not INserted";
    }
} else {
    echo "Not Submit";
}
