<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="stylesheet" href="../css/view.css">
</head>

<body>
    <div class="container">
        <h2>Users List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php
            include('../database/config.php');

            $data = "SELECT * FROM add_data";
            $result = $conn->query($data);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <img src="<?php echo $row['image']; ?>" alt="User Image">
                        </td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-btn">Delete</a></td>
                        <td><a href="update.php?id=<?php echo $row['id']; ?>" class="update-btn">Update</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>
