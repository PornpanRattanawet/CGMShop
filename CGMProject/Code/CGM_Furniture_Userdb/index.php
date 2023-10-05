<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Database Config CGM</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3>รายการสมาชิก </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="40%">Firstname</th>
                                <th width="40%">Lastname</th>
								<th width="40%">E-mail</th>
								<th width="40%">Username</th>
								<th width="40%">Birthday</th>
								<th width="40%">Gender</th>
								<th width="40%">Phone</th>
								<th width="40%">Address</th>
                                <th width="5%">Edit</th>
                                <th width="5%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                            require_once 'connect.php';
                            $stmt = $conn->prepare("SELECT* FROM users");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach($result as $k) {
                            ?>
                            <tr>
                                <td><?= $k['id'];?></td>
                                <td><?= $k['firstname'];?></td>
                                <td><?= $k['lastname'];?></td>
								<td><?= $k['email'];?></td>
								<td><?= $k['username'];?></td>
								<td><?= $k['birth'];?></td>
								<td><?= $k['gender'];?></td>
								<td><?= $k['phone'];?></td>
								<td><?= $k['address'];?></td>
                                <td><a href="formEdit.php?id=<?= $k['id'];?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="del.php?id=<?= $k['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <center>Database_CGM</center>
    </body>
</html>