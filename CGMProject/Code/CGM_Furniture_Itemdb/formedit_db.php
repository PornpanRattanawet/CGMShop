<?php
require_once 'connect.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ตัวแปร
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $img = $_POST['Image'];
    $price = $_POST['Price'];
    $description = $_POST['Description'];
    $type = $_POST['Type'];

    // อัพเดตข้อมูล
    $stmt = $conn->prepare("UPDATE sp_product SET name=:name, img=:img, price=:price, description=:description, type=:type WHERE id=:id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':img', $img, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':type', $type, PDO::PARAM_STR);

    $stmt->execute();

    echo "Record updated successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
if ($stmt->execute()) {
		header("location: index.php");
	} else {
		echo "Error updating record: " . $conn->errorInfo()[2];
	}
$conn = null;
?>
