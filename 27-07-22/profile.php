<?php
include_once "header.php";
$SELECTJOIN = "SELECT * FROM signup INNER JOIN user_data ON signup.id=user_data.user_id INNER JOIN city ON user_data.city=city.city_id INNER JOIN gender ON user_data.gender=gender.gen_id WHERE id = '$user_id'";
$QUERY = mysqli_query($conn, $SELECTJOIN);
$rowJOIN = mysqli_fetch_array($QUERY);
echo $rowJOIN['img'];
?>
<div class="container">
    <form action="Function.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
        <div class="row">
            <center><b> Edit Profile</b></center>
            <div class="col-md-12 ">
                <img src="images/<?php echo $rowJOIN['img']; ?>" width="10%" alt="No Show ">
            </div>
            <div class="col-md-12 ">
                <label for="name">
                    User Image
                </label>

                <input type="file" id="name" class="form-control" value="" name="img">
            </div>
            <div class="col-md-6 ">
                <label for="name">
                    Enter Your Name
                </label>

                <input type="text" id="name" class="form-control" value="<?php echo $ROW_USERINFO['user_name']; ?>" name="name" placeholder="Enter Your Name">
            </div>
            <div class="col-md-6">
                <label for="">
                    Enter Your Email
                </label>
                <input type="email" class="form-control" name="email" value="<?php echo $ROW_USERINFO['user_email'] ?>" placeholder="Enter Your Email" readonly>
            </div>
            <div class="col-md-6">
                <label for="">
                    Select Gender
                </label>
                <br>
                <input type="radio" class="" name="gender" value="Male"> Male
                <input type="radio" class="" name="gender" value="Female"> Female
            </div>
            <div class="col-md-6">
                <label for="">
                    Enter Number
                </label>
                <input type="number" class="form-control" name="number" value="" placeholder="+92">
            </div>
            <div class="col-md-6">
                <label for="">
                    Enter Address
                </label>
                <textarea name="address" class="form-control" id="" cols="30" rows="2"></textarea>
            </div>
            <div class="col-md-6">
                <label for="">Select City</label>
                <select name="city" class="form-select" id="">
                    <?php
                    $selectCity = "SELECT * FROM city";
                    $queryCity = mysqli_query($conn, $selectCity);
                    while ($rowCity = mysqli_fetch_array($queryCity)) {

                    ?>
                        <option value="FSD"><?php echo $rowCity['city_name'] ?></option>

                    <?php

                    } ?>
                </select>
            </div>
            <div class="col-md-6">
                <br>
                <button class="btn btn-success" name="updateprofile">Update</button>
            </div>

        </div>
    </form>
</div>
<?php
include_once 'footer.php';
?>