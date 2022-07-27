<?php
session_start();
include_once 'connection.php';
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h3>Login Form</h3>
            <?php
            if (empty($_SESSION['message'])) {
                echo '';
            } else {
                echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            }
            ?>
            <form action="Function.php" method="POST">
                <input type="text" class="form-control" name="useremail" placeholder="Enter Your Email">
                <input type="text" class="form-control" name="userpass" placeholder="Enter Your Password">
                <input type="submit" name="loginform" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
</div>