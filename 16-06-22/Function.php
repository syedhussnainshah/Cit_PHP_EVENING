<?php
if (isset($_POST['formsubmit'])) {
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $pass = $_POST['userpass'];
    echo $name;
    echo $email;
    echo $pass;
} else {
    echo "Not Submit";
}
