<?php 
	session_start();

	include 'HF/header.php';
         session_start();
        //Connect DB
        include 'controller/database.php';
        $conn = dbConnect();
        
        //Lấy dữ liệu email
        $mail = $_SESSION['login']['email'];
        $sql = "SELECT * FROM user WHERE email = '$mail'";
        
        $rs = $conn->query($sql);
        $row = mysqli_fetch_assoc($rs);
?>
    

	<div class="container my-account">
		<div class="row">
			<div class="col-sm-6">
				<h1>Account Information</h1>
			</div>
			<div class="col-sm-6">
                            <form method="post">
                                        <input type="text" name="id" hidden value="<?=$row['id']?>">
					<div class="form-group">
					    <label >Name</label>
                                            <input type="text" name="Name" class="form-control" value="<?php echo $row['name']?>">
				  	</div>
					<div class="form-group">
					    <label >Email</label>
                                            <input type="email" class="form-control" value="<?php echo $row['email']?>" readonly>
				  	</div>
				  	<div class="form-group">
					    <label >Phone</label>
                                            <input type="text" name="Phone" class="form-control" value="<?php echo $row['phone']?>">
				  	</div>
				  	<div class="form-group">
					    <label >Address</label>
                                            <input type="text" name="Address" class="form-control" value="<?php echo $row['address']?>">
				  	</div>
                                       
                                        <div class="row">
                                            <div class="col-5"></div>
                                            <div class="col-3">
                                                <button type="submit" class="btn btn-danger" name="update">Update</button>
                                            </div>
                                        </div>
                                        
				</form>
			</div>
		</div>
	</div>


	<style>
		div.my-account {
			margin-top: 150px;
			padding: 100px 0;

		}

		div.my-account div.col-sm-6:nth-child(1) {
			border-right: 1px solid black;
		}
	</style>

<?php 

	include('HF/footer.php');
?>


<?php
        //Change password
        if(isset($_POST['update'])){
            $name = $_POST['Name'];
            $address = $_POST['Address'];
            $phone  = $_POST['Phone'];
            $id = $_POST['id'];
            
            $sql = "UPDATE user SET name = '$name', phone = '$phone', address = '$address' WHERE id = '$id'";
            
            $conn->query($sql);
            
        }
?>
