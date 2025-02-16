<?php
include('../database/config.php');
$id = $_GET['id'];

$delete = "delete from add_data where id = '$id'";
$result = $conn->query($delete);
if($result){
    header("location: view.php");
}
?>