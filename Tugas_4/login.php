<?php
session_start();
if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $a = new PDO('mysql:host=localhost;dbname=myapp', 'root', '');
    $query = $a->prepare("SELECT * FROM admins WHERE username='$username' AND password=SHA2('$password', 0)");
    $query->execute();
    if ($query->rowCount() > 0) {
        $_SESSION['login'] = true;
        header('Location: ./');
    }
    else{
    	print_r("LOGIN GAGAL");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>login</title>
		<link rel="stylesheet" href="./style.css">
	</head>
	<body>
		<div class='bold-line'></div>
		<div class='container'>
		  <div class='window'>
		    <div class='overlay'></div>
		    <div class='content'>
		      <form action="login.php" method="post">	
		        <input type='text' placeholder='Username'  name='username' class='input-line full-width'>
		        <input type='password' placeholder='Password' name='password' class='input-line full-width'>
				<button class='ghost-round full-width'>LOGIN</button>
		      	<a class='ghost-round full-width' href="index.php">HOME</a>
			</form>
		</div>
		  </div>
		</div>
		<a href="index.php">Halaman utama</a>
	</body>
</html>