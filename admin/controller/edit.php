<?php
include("../../controller/database.php");
#1. Connect to database

$conn = dbConnect();


if( isset($_POST['submit']) ){
    $id = $_POST['txtID'];
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $address = $_POST['txtAddress'];
    $gender = $_POST['txtGender'];


    $sql = "UPDATE user SET id='$id', name='$name', email='$email', address='$address', gender='$gender'
     WHERE id='$id'";
    $conn->query($sql);
   
}



if (!isset($_GET['id'])){
    header('Location: ../user.php');
}

$variable = $_GET['id'];
$query = "SELECT * FROM user WHERE id='$variable'";
$rs = $conn->query($query);
$field = $rs->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <form method="POST">
    <div class="form-group">
      <label for="text">ID:</label> 
      <input type="text" class="form-control col-sm-5" readonly value="<?=$field['id']?>"
             placeholder="Enter ID" name="txtID" required>
    </div>
    <div class="form-group">
      <label for="text">Name:</label> 
      <input type="text" class="form-control col-sm-5" value="<?=$field['name']?>" 
             placeholder="Enter name" name="txtName" required>
    </div>
    <div class="form-group">
      <label for="text">Email:</label>
      <input type="email" class="form-control col-sm-5" value="<?=$field['email']?>"
             placeholder="Enter email" name="txtEmail" required>
    </div>
    <div class="form-group">
      <label for="text">Address:</label>
      <input type="text" class="form-control col-sm-5" value="<?=$field['address']?>"
             placeholder="Enter address" name="txtAddress" required>
    </div>
    <div class="form-group">
      <select  value="<?=$field['gender']?>" class="form-control" name="txtGender">
        <option value="0">Male</option>
        <option value="1">Female</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">OK</button>
  </form>
</div>

</body>
</html>
<?php $conn->close(); ?>
