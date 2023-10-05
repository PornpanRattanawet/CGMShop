<?php
// กำหนดข้อมูลฐานข้อมูล
require_once 'connect.php';

// สร้าง PDO object
$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
$pdo = new PDO($dsn, $username, $password, $options);

// สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูล
$sql = "INSERT INTO sp_product (id, name, img, price, description, type) 
        VALUES (:id, :name, :img, :price, :description, :type)";

// สร้าง prepared statement
$stmt = $pdo->prepare($sql);

// กำหนดค่า parameter ให้กับ prepared statement
$id = null; // ใช้ null เพื่อให้ MySQL สร้างค่าใหม่ให้อัตโนมัติ
$name = $_POST['Name'];
$img = $_POST['Image'];
$price = $_POST['Price'];
$description = $_POST['Description'];
$type = $_POST['Type'];
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':img', $img, PDO::PARAM_STR);
	$stmt->bindParam(':price', $price, PDO::PARAM_INT);
	$stmt->bindParam(':description', $description, PDO::PARAM_STR);
	$stmt->bindParam(':type', $type, PDO::PARAM_STR);

// ทำการ execute prepared statement
$stmt->execute();

// แจ้งเตือนว่าเพิ่มข้อมูลสำเร็จ
echo "เพิ่มข้อมูลสำเร็จ";
?>
