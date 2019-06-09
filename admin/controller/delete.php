<?php
include("../../controller/database.php");
if (!isset($_GET['id'])){
    header('location: ../user.php');
}
$variable = $_GET['id'];
$conn = dbConnect();
$sql = "DELETE FROM user WHERE id='$variable'";
$conn->query($sql);
header('location: ../index.php');
?>