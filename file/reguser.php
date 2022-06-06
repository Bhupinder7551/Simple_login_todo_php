<?php
if(isset($_POST['regbtn'])){
	require 'connection.php';
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['psw'];
	$phone=$_POST['phone'];
	$check_email = mysqli_query($conn, "SELECT email FROM reguser where email = '$email' ");
	if(mysqli_num_rows($check_email) > 0){
    $error= 'Email Already exists. Please try another Email.';
    header( "location:../reg.php?error=".$error);
}else{
	$sql = "INSERT INTO reguser (name, email, password, phone)
	VALUES ('$name','$email', '$pass', '$phone')";
	if ($conn->query($sql) === TRUE) {
		$msg = "You have successfully registered. Please, login to continue.";
		header( "location:../login.php?msg=".$msg);
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../reg.php?error=".$error);
	}
	$conn->close();
}
}
?>