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
      $stmt = $conn->prepare("SELECT* FROM users WHERE id=?");
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
          <h4>ฟอร์มแก้ไขข้อมูล</h4>
          <form action="formedit_db.php" method="post">
            <div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Firstname</label>
              <div class="col-sm-10">
                <input type="text" name="firstname" class="form-control" required value="<?= $row['firstname'];?>" minlength="3">
              </div>
            </div>
            
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Lastname</label>
              <div class="col-sm-10">
                <input type="text" name="lastname" class="form-control" required value="<?= $row['lastname'];?>" minlength="3">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control" required value="<?= $row['email'];?>" minlength="3">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" class="form-control" required value="<?= $row['username'];?>" minlength="3">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="text" name="password" class="form-control" required value="<?= $row['password'];?>" minlength="3">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Birthday</label>
              <div class="col-sm-10">
                <input type="date" name="birth" class="form-control" required value="<?= $row['birth'];?>" minlength="3">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="phone" class="form-label">Phone (0XX-XXXXXXX)</label>
              <div class="col-sm-10">
                <input type="tel" class="form-control" name="phone" aria-describedby="phone" pattern="[0-9]{3}-[0-9]{7}" required value="<?= $row['phone'];?>" minlength="3">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input type="text" name="address" class="form-control" required value="<?= $row['address'];?>" minlength="3">
              </div>
            </div>
			
			<div class="mb-1">
              <label for="name" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                <input type="radio" name="gender" value="male" required value="<?= $row['gender'];?>" minlength="3"> Male
				<input type="radio" name="gender" value="female" required value="<?= $row['gender'];?>" minlength="3"> Female
				<input type="radio" name="gender" value="Unknown" required value="<?= $row['gender'];?>" minlength="3"> Unknown
              </div>
            </div>
			
            <input type="hidden" name="id" value="<?= $row['id'];?>">
            <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>