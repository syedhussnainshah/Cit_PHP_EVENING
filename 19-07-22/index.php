<?php
include_once 'header.php';

if (empty($_SESSION['user_id'])) {
    header('location: login.php');
}
echo $_SESSION['user_id'];
include_once 'connection.php';
?>
<section>

    <h1>Your Web content </h1>
</section>

<?php include_once 'footer.php'; ?>