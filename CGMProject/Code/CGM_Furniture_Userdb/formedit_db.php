<?php
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['id'])) {
    require_once 'connect.php';
	
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	$birth = $_POST['birth'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	
	$passwordHash = password_hash($password, PASSWORD_DEFAULT);
	
	$stmt = $conn->prepare("UPDATE users SET firstname=:firstname, lastname=:lastname, email=:email, username=:username, password=:passwordHash, birth=:birth, gender=:gender, phone=:phone, address=:address WHERE id=:id");
	
	$stmt->bindParam(':id', $id , PDO::PARAM_INT);
	$stmt->bindParam(':firstname', $firstname , PDO::PARAM_STR);
	$stmt->bindParam(':lastname', $lastname , PDO::PARAM_STR);
	$stmt->bindParam(':email', $email , PDO::PARAM_STR);
	$stmt->bindParam(':username', $username , PDO::PARAM_STR);
	$stmt->bindParam(':passwordHash', $passwordHash , PDO::PARAM_STR);
	$stmt->bindParam(':birth', $birth , PDO::PARAM_STR);
	$stmt->bindParam(':gender', $gender , PDO::PARAM_STR);
	$stmt->bindParam(':phone', $phone , PDO::PARAM_STR);
	$stmt->bindParam(':address', $address , PDO::PARAM_STR);
	
	if ($stmt->execute()) {
		header("location: index.php");
	} else {
		echo "Error updating record: " . $conn->errorInfo()[2];
	}
	
	$conn = null;
}
?>
