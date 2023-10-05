<?php 

    session_start();
    require_once 'api/userdb.php';

    if (isset($_POST['signup'])) {
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

        if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: Register_form.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: Register_form.php");
        } else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: Register_form.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: Register_form.php");
        } else if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอก Username';
            header("location: Register_form.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: Register_form.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: Register_form.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: Register_form.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: Register_form.php");
        } else if (empty($birth)) {
            $_SESSION['error'] = 'กรุณากรอกวันเกิด';
            header("location: Register_form.php");
        } else if (empty($gender)) {
            $_SESSION['error'] = 'กรุณากรอกเพศ';
            header("location: Register_form.php");
        } else if (empty($address)) {
            $_SESSION['error'] = 'กรุณากรอกที่อยู่';
            header("location: Register_form.php");
        } else if (empty($phone)) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทร';
            header("location: Register_form.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);
				$check_username = $conn->prepare("SELECT username FROM users WHERE username = :username");
                $check_username->bindParam(":username", $username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {
                    $_SESSION['warning'] = "มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว <a href='Login_form.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: Register_form.php");
                }else if ($row['email'] == $email){
					$_SESSION['warning'] = "มี Email นี้อยู่ในระบบแล้ว <a href='Login_form.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
					header("location: Register_form.php");						
				}else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, email, username, password, birth, gender, phone, address) 
                                            VALUES(:firstname, :lastname, :email, :username, :password, :birth, :gender, :phone, :address)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":email", $email);
					$stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $passwordHash);
					$stmt->bindParam(":birth", $birth);
					$stmt->bindParam(":gender", $gender);
					$stmt->bindParam(":phone", $phone);
                    $stmt->bindParam(":address", $address);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='Login_form.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: Register_form.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: Register_form.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>