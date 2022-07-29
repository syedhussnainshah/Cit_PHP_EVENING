<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <center>
            <h1 class="bg-primary text-white">Products</h1>
        </center>
        <div class="row">
            <?php
            include_once 'connection.php';
            $select = "SELECT * FROM products";
            $query = mysqli_query($conn, $select);
            while ($row = mysqli_fetch_array($query)) {

            ?>
                <div class="col-md-3">
                    <div class="card">

                        <div class="card-body">
                            <img src="assets/images/<?php echo $row['product_image'] ?>" width="100%s" alt="">
                        </div>
                        <div class="card-footer">
                            <h6>Product: <?php echo $row['product_name'] ?></h6>
                            <h6>Price : <?php echo $row['product_price'] ?><del> 500</del></h6>
                            <form action="action.php" method="post">
                                <input type="text" value="<?php echo $row['product_id']; ?>" name="id">
                                <button class="btn btn-warning" type="submit" name="addtocart">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>