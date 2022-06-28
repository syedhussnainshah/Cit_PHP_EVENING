<?php include_once 'header.php';
include_once 'connection.php';
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <center>
                <h3>Form</h3>
            </center>
            <div class="col-md-6 offset-3">
                <form action="Function.php" method="POST">
                    <label for="" class="w-100">
                        Enter Your Name
                        <input type="text" class="form-control" name="username" placeholder="Enter Your Name">
                    </label>
                    <label for="" class="w-100">
                        Enter Your Email
                        <input type="text" class="form-control" name="useremail" placeholder="Enter Your Name">
                    </label>
                    <label for="" class="w-100">
                        Enter Your Password
                        <input type="text" class="form-control" name="userpass" placeholder="Enter Your Name">
                    </label>
                    <input type="submit" name="formsubmit" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
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