<?php 
session_start();

include 'HF/header.php';
//Connect DB
include 'controller/database.php';
$conn = dbConnect();

if (!isset($_SESSION['login'])) {
    # code...
    header('location: login.php');
} else {
    $mail       = $_SESSION['login']['email'];
    $name       = $_SESSION['login']['name'];
    $phone      = $_SESSION['login']['phone'];
    $address    = $_SESSION['login']['address'];
    $id         = $_SESSION['login']['id'];
}


?>
    

<div class="container my-account">
	<div class="row">
		<div class="col-sm-6">
			<h1>Account Information</h1>
		</div>
		<div class="col-sm-6">
            <form method="post" action="controller/account_process.php" enctype="multipart/form-data">
                <input type="text" name="id" hidden value="<?=$id?>">
                <div class="form-group">
                    <img src="<?=$_SESSION['login']['avatar']?>" alt="avatar" class="img-fluid avatar">
                    <input type="file" name="avatar">
                    <input type="text" name="avatar-old" hidden value="<?=$_SESSION['login']['avatar']?>">
			  	</div>
				<div class="form-group">
				    <label >Name</label>
                    <input type="text" name="Name" class="form-control" value="<?=$name?>">
			  	</div>
				<div class="form-group">
				    <label >Email</label>
                    <input type="email" name="Email" class="form-control" value="<?=$mail?>" readonly>
			  	</div>
			  	<div class="form-group">
				    <label >Phone</label>
                    <input type="text" name="Phone" class="form-control" value="<?=$phone?>">
			  	</div>
			  	<div class="form-group">
				    <label >Address</label>
                    <input type="text" name="Address" class="form-control" value="<?=$address?>">
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

        img.avatar {
            display: block;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            margin: auto;
            margin-bottom: 10px;
        }
        
        input[type='file'] {
            margin: auto;
            display: block;
        }
	</style>

<?php 
	include('HF/footer.php');
?>
