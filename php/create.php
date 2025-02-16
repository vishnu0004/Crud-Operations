<?php
include('../database/config.php');
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $upload = "../uploads/";
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $full_path = $upload.$image;
    $add_data = "insert into add_data (name,image,email) values('$name','$full_path','$email')";
    $result = $conn->query($add_data);
    if($result){
        if(move_uploaded_file($tmp_name,$full_path)){
            echo "uploaded file";
            header("location:view.php");
        }
        else{
            echo "not upload file";
        }
    }
    else{
        echo "not inserted data into data base";
    }
}
?>
