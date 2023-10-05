<?php 

    session_start();
    require_once 'api/userdb.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: Login_form.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGM Mart</title>

    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="container">
			<?php 

				if (isset($_SESSION['user_login'])) {
					$user_id = $_SESSION['user_login'];
					$stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			?>
			<div class="title">
			</div>
			
			
	</div>
    <nav>
        <div class="nav-container">
            <a href="index.html">
                <img src="./imgs/Home_Logo_01.png" class="logonav">
            </a>

            <div class="nav-profile">
				<h3 class="nav-profile-user">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3>
				<a href="Logout_Form.php" class="nav-profile-logout">Logout</a>				
                <p class="nav-profile-name"></p>
                <div onclick="openCart()" style="cursor: pointer;" class="nav-profile-cart">
                    <i class="fas fa-cart-shopping"></i>
                    <div id="cartcount" class="cartcount" style="display: none;">
                        0
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="sidebar">
            <input onkeyup="searchsomething(this)" id="txt_search" type="text" class="sidebar-search" placeholder="Search product...">
            
            <a onclick="searchproduct('all')" class="sidebar-items">
                All product
            </a>
            <a onclick="searchproduct('bedroom')" class="sidebar-items">
                Bedroom
            </a>
            <a onclick="searchproduct('livingroom')" class="sidebar-items">
                Living room
            </a>
			<a onclick="searchproduct('kitchen')" class="sidebar-items">
                Kitchen
            </a>
			<a onclick="searchproduct('Lockers')" class="sidebar-items">
                Lockers & Storage
            </a>
        </div>
        <div id="productlist" class="product">

            
            
        </div>
    </div>

    <div id="modalDesc" class="modal" style="display: none;">
        <div onclick="closeModal()" class="modal-bg"></div>
        <div class="modal-page">
            <h2>Detail</h2>
            <br>
            <div class="modaldesc-content">
                <img id="mdd-img" class="modaldesc-img" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="">
                <div class="modaldesc-detail">
                    <p id="mdd-name" style="font-size: 1.5vw;">Product name</p>
                    <p id="mdd-price" style="font-size: 1.2vw;">500 THB</p>
                    <br>
                    <p id="mdd-desc" style="color: #adadad;">Lorem iaudantium harum doloremque alias. Quae, vel ipsum quasi, voluptas, sit optio nemo magni numquam non dicta voluptates porro! Vero eveniet numquam sit aut vel eligendi officiis iste tenetur expedita. Delectus vero quibusdam adipisci in. Esse.</p>
                    <br>
                    <div class="btn-control">
                        <button onclick="closeModal()" class="btn">
                            Close
                        </button>
                        <button onclick="addtocart()" class="btn btn-buy">
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalCart" class="modal" style="display: none;">
        <div onclick="closeModal()" class="modal-bg"></div>
        <div class="modal-page">
            <h2>My cart</h2>
            <br>
            <div id="mycart" class="cartlist">

                
                
                
            </div>
            <div class="btn-control">
                <button onclick="closeModal()" class="btn">
                    Cancel
                </button>
                <button onclick="buynow()" class="btn btn-buy">
                    Buy
                </button>
            </div>
        </div>
    </div>
    
</body>
</html>