<?php
session_start();
include_once 'connection.php';

$user_id =  $_SESSION['user_id'];
$SELECTG = "SELECT * FROM signup WHERE id = '$user_id'";
$query = mysqli_query($conn, $SELECTG);
$ROW = mysqli_fetch_array($query);
if ($ROW['status'] == 'user') {
    header('location: ../index.php');
}


if (empty($_SESSION['user_id'])) {
    header('location: login.php');
}
echo $_SESSION['user_id'];
include_once 'header.php';
?>
<section>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
        $select = "SELECT * FROM `signup`";
        $query = mysqli_query($conn, $select);
        while ($row = mysqli_fetch_array($query)) {


        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['user_name'] ?></td>
                <td><?php echo $row['user_email'] ?></td>
                <td><?php echo $row['user_pass'] ?></td>
                <td><a href="edit.php?edit_id=<?php echo $row['id'] ?>"><button class="btn btn-primary">Edit</button></a></td>
                <td><a href="delete.php?del_id=<?php echo $row['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</section>

<?php include_once 'footer.php'; ?>