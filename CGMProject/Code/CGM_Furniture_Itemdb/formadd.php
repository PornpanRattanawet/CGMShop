<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Basic CRUD PHP PDO by devbanban.com 2021</title>
  </head>
  <body>
    <?php
    if(isset($_GET['id'])){
      require_once 'connect.php';
      $stmt = $conn->prepare("SELECT* FROM sp_product WHERE id=?");
      $stmt->execute([$_GET['id']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
      if($stmt->rowCount() < 1){
          header('Location: index.php');
          exit();
      }
    }//isset
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h4>ฟอร์มเพิ่มข้อมูล สินค้า</h4>
          <form action="formadd_db.php" method="post">
            <div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="Name" class="form-control" minlength="3">
              </div>
            </div>
            
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="text" name="Image" class="form-control" minlength="1">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-10">
                <input type="text" name="Price" class="form-control" minlength="2">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <input type="text" name="Description" class="form-control">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Type</label>
              <div class="col-sm-10">
                <input type="text" name="Type" class="form-control" minlength="3">
              </div>
            </div>
			
			<input type="hidden" name="id" value="<?= $row['id'];?>">
            <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>