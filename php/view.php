<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>image</th>
            <th>delete</th>
            <th>update</th>
        </tr>
        <?php
        include('../database/config.php');

        $data = "select * from add_data";
        $result = $conn->query($data);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id  =    $row['id'];
                $demail =  $row['email'];
                $dname =   $row['name'];
                $dimage =   $row['image'];
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name'];  ?></td>
                    <td><?php echo $row['email'];  ?></td>
                    <td><?php echo $row['image'];  ?></td>
                    <td><a href="../html/delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
                    <td><a href="../html/update.php?id=<?php echo $row['id'];?>">update</a></td>
                </tr>

        <?php
            }
        }
        ?>
    </table>
</body>

</html>