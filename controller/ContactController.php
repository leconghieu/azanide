<?php
$array_success = ["status" => "success"];
$array_fail = ["status" => "fail"];
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["opinion"])){
	// echo $_POST["name"];
		// connect to database
	include 'database.php';
	$conn = dbConnect();
	if(!$conn)
	{
		die("fail");
	}
	try{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$opinion = $_POST['opinion'];
		$table_name = 'contact';
		$query_string = "INSERT INTO $table_name (name, email, subject, opinion) VALUES ('$name', '$email', '$subject', '$opinion')";
		$query =  mysqli_query($conn, $query_string);
		// $statement = $conn->query($query_string);
		if($query){
			echo json_encode($array_success);	
		}
		else{
			echo mysqli_error($query);
		}
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

?>