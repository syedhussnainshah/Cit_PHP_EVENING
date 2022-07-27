<?php include_once 'connection.php';
$select = "SELECT * FROM user_data INNER JOIN city ON user_data.city=city.city_id INNER JOIN gender ON user_data.gender=gender.gen_id";
$query = mysqli_query($conn, $select);
?>
<table>
    <tr>
        <th>User ID</th>
        <th>User City</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?php echo $row['city_name'] ?></td>
            <td><?php echo $row['user_id'] ?></td>
            <td><?php echo $row['gen_name'] ?></td>
            <td><?php echo $row['address'] ?></td>
        </tr>
    <?php
    }

    ?>
</table>