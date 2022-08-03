<?php
session_start();
include_once 'connection.php';
$mycart = $_SESSION['mycart'];
print_r($_SESSION['mycart']);

?>
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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($mycart as $key => $value) {
                foreach ($value as $key => $value) {
                    if ($key == 'id') {
                        $product_id = $value;
                    }
                    if ($key == 'qty') {
                        $product_qty = $value;
                    }
                }
                $select = "SELECT * FROM products WHERE product_id='$product_id'";
                $query = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($query);
                echo '<tr>
               <th scope="row">' . $row['product_id'] . '</th>
               <td><img src="assets/images/' . $row['product_image'] . '" width="50px"></td>
               <td>' . $row['product_name'] . '</td>
               <td>
               <form action="action.php" method="post">
               <input type="number" name="product_qty" value="' . $product_qty . '">
               <input type="hidden" name="id" value="' . $row['product_id'] . '">
               <input type="submit" class="btn btn-info" name="addtocart" value="update">
               </form>
               </td>
               <td>' . $row['product_price'] . '</td>
               <td>' . $row['product_price'] * $product_qty . '</td>
               ' . $total +=  $row['product_price'] * $product_qty . '
           </tr>';
            }
            echo "<tr>
            <td></td>  
            <td></td>  
            <td></td>  
            <td></td>  
            <td></td>  
            <td>" . $total . "</td></tr>";
            ?>


        </tbody>
    </table>
</body>

</html>