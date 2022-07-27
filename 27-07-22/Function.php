<?php
session_start();
include_once 'connection.php';
if (isset($_POST['formsubmit'])) {
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $SelectST = "SELECT * FROM signup WHERE user_email = '$email'";
    $QueryST = mysqli_query($conn, $SelectST);
    $RowST = mysqli_fetch_array($QueryST);
    echo $RowST['user_email'];
    if (mysqli_num_rows($QueryST) > 0) {
        echo "Already exist";
    } else {
        $INSERT = "INSERT INTO signup (user_name, user_email, user_pass) VALUES ('$name','$email','$pass')";
        $query = mysqli_query($conn, $INSERT);
        if ($query) {
            header('location:index.php');
        } else {
            echo "Not INserted";
        }
    }
}
if (isset($_REQUEST['formupdate'])) {
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $edit_id = $_REQUEST['edit_id'];
    $update = "UPDATE `signup` SET `user_name`='$name',`user_email`='$email' WHERE id = '$edit_id'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        header('location:index.php');
    } else {
        echo "No Update";
    }
}
if (isset($_REQUEST['loginform'])) {
    echo $email = $_REQUEST['useremail'];
    echo $pass = $_REQUEST['userpass'];
    $select = "SELECT * FROM signup WHERE user_email= '$email' AND user_pass = '$pass'";
    $query = mysqli_query($conn, $select);
    if (mysqli_num_rows($query) > 0) {
        $Row = mysqli_fetch_array($query);
        if ($Row['status'] == 'Admin') {
            $_SESSION['user_id'] = $Row['id'];
            header('location: Dashboard/index.php');
        } else {

            $_SESSION['user_id'] = $Row['id'];
            header('location:index.php');
        }
    } else {
        $_SESSION['message'] = "Email or Password Are Not Match";
        header('location: login.php');
    }
}
if (isset($_REQUEST['updateprofile'])) {
    $name =  $_REQUEST['name'];
    $number = $_REQUEST['number'];
    $gender = $_REQUEST['gender'];
    $address =  $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $img = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $folder = "images/" . $img;
    move_uploaded_file($tmp, $folder);
    echo $img;
    echo  $user_id = $_REQUEST['user_id'];
    $Select = "SELECT * FROM `user_data` WHERE `user_id` ='$user_id'";
    $query = mysqli_query($conn, $Select);
    $row = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) > 0) {
        $update = "UPDATE `user_data` SET `gender`='$gender',`address`='$address',`number`='$number',`city`='$city',`img`='$img' WHERE `user_id`='$user_id'";
        $query = mysqli_query($conn, $update);
        if ($query) {
            // header('location: profile.php');
        } else {
            echo "No Update";
        }
    } else {
        $INSERT = "INSERT INTO `user_data`(`gender`, `address`, `number`, `city`, `user_id`) VALUES ('$gender','$address','$number','$city','$user_id')";
        $query = mysqli_query($conn, $INSERT);
        if ($query) {
            header('location: profile.php');
        } else {
            echo "No Insert";
        }
    }
}
