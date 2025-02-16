<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Form</title>
    <link rel="stylesheet" href="../css/create.css">
</head>
<body>
    <div class="container">
        <form action="../php/create.php" method="post" enctype="multipart/form-data">
            <h2>Add Here</h2>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email" required>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="submit" value="Add" name="submit">
        </form>
    </div>
</body>
</html>

