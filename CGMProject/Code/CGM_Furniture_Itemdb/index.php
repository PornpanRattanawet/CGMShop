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
                    <h3>รายการของใน Stock </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="3%">ID</th>
                                <th width="40%">Name</th>
								<th width="40%">Image</th>
								<th width="5%">Price</th>
								<th width="40%">Description</th>
								<th width="5%">Type</th>
                                <th width="2%">Edit</th>
                                <th width="2%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                            require_once 'connect.php';
                            $stmt = $conn->prepare("SELECT* FROM sp_product");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach($result as $k) {
                            ?>
                            <tr>
                                <td><?= $k['id'];?></td>
                                <td><?= $k['name'];?></td>
								<td><?= $k['img'];?></td>
								<td><?= $k['price'];?></td>
								<td><?= $k['description'];?></td>
								<td><?= $k['type'];?></td>
                                <td><a href="formEdit.php?id=<?= $k['id'];?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="del.php?id=<?= $k['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
					<a href="formadd.php" class="btn btn-success btn-sm">เพิ่มข้อมูลสินค้า</a>
                </div>
            </div>
        </div>
        <center>Database_CGM</center>
    </body>
</html>