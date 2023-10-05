<?php 

    session_start();
    require_once 'api/userdb.php';

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

      
        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอก Username';
            header("location: Login_form.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: Login_form.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: Login_form.php");
        } else {
            try {

                $check_data = $conn->prepare("SELECT * FROM users WHERE username = :username");
                $check_data->bindParam(":username", $username);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if ($username == $row['username']) {
                        if (password_verify($password, $row['password'])) {
                            if ($row['urole'] == 'admin') {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: admin.php");
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: index2.php");
                            }
                        } else {
                            $_SESSION['error'] = 'รหัสผ่านผิด';
                            header("location: Login_form.php");
                        }
                    } else {
                        $_SESSION['error'] = 'Username ผิด';
                        header("location: Login_form.php");
                    }
                } else {
                    $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                    header("location: Login_form.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>