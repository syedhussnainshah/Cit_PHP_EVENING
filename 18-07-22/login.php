<?php
session_start();
include_once 'header.php';
include_once 'connection.php';
?>
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