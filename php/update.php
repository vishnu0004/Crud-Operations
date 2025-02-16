<?php
session_start();
include('../database/config.php');
$_SESSION['id'] = $_GET['id'];
$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $upload = "../uploads/";
    $imageName = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    // If new image is uploaded, use it; otherwise, keep old image
    if (!empty($imageName)) {
        $full_path = $upload . basename($imageName);
        move_uploaded_file($tmp_name, $full_path);
    } else {
        $full_path = $_SESSION['img']; // Keep old image
    }

    $update = "UPDATE add_data SET name = '$name', email = '$email', image = '$full_path' WHERE id = '$id'";
    $result = $conn->query($update);
    if ($result) {
        header("location:view.php");
    } else {
        echo "Failed to update data!";
    }
} else {
    $select = "SELECT * FROM add_data WHERE id = '$id'";
    $run = $conn->query($select);
    if (mysqli_num_rows($run) > 0) {
        while ($row = mysqli_fetch_assoc($run)) {
            $_SESSION['i'] = $row['id'];
            $_SESSION['n'] = $row['name'];
            $_SESSION['e'] = $row['email'];
            $_SESSION['img'] = $row['image'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/update.css">
</head>

<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="id">ID:</label>
            <input type="number" id="id" name="id" value="<?php echo $_SESSION['i']; ?>" readonly>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['n']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['e']; ?>" required>

            <label for="image">Upload New Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <div class="image-preview">
                <p>Current Image:</p>
                <img src="<?php echo $_SESSION['img']; ?>" alt="User Image">
            </div>

            <input type="submit" value="Update" name="submit">
        </form>
    </div>
</body>

</html>
