<?php
include("../../controller/database.php");
if (!isset($_GET['id'])){
    header('location: ../user.php');
}
$id = $_GET['id'];
$conn = dbConnect();
$sql = "DELETE FROM laptop WHERE id='$id'";
$conn->query($sql);
header('location: ../indexlaptop.php');
?>