<?php
$array_success = ["status" => "success"];
$array_fail = ["status" => "fail"];
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["opinion"])){
	// echo $_POST["name"];
		// connect to database
	include 'database.php';
	$conn = dbConnect();
	
	try{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['suject'];
		$opinion = $_POST['opinion'];
		$table_name = 'contact';
		$query_string = "INSERT INTO $table_name VALUES('$name', '$email', '$subject', '$opinion')";
		$query = mysqli_query($conn, $query_string);
		if($query){
			echo json_encode($array);	
		}
		else{
			echo json_encode($array_fail);
		}
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

?>