<?php 
	session_start();
	if($_SESSION['u_id']){
		header('Location: /admin/index.php');
	}
	//xatoliklar bo'lganda keladigan status (error) yoki (success)
	if(isset($_GET['status'])){
		$stat = $_GET['status'];
	
	if($stat == 'nofull'){
		$xatolik =  "Barcha darchani to'ldiring !";
	}
	if ($stat == 'noentered'){
		$xatolik = "Siz sayt admin paneliga kirmagansiz !";
	}
	if($stat == 'incorrect'){
		$xatolik =  "Login yoki parol noto'g'ri !";		
	}
	if($stat == 'success'){
		header('Location: /admin/index.php');
		exit();
	}
	}
 ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Saytga kirish</title>
  
  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js_new/jquery.min.js"></script>
  <script src="assets/js_new/bootstrap.min.js"></script>
   <link href="login/signin.css" rel="stylesheet">

  
</head>




  <body class="text-center">
    <form method="POST" action="login_check.php" class="form-signin">
    	<h1><?php echo $_SESSION['username']; ?></h1>
      <h1 class="h3 mb-3 font-weight-normal">Saytga kirish</h1>
      <br>
       <label for="inputEmail" class="sr-only">Login</label>
      <input type="text" name="username"  title="Iltimos loginni to'g'ri kiriting (faqat Lotin harflaridan foydalaning s) !!" class="form-control" placeholder="Login" required autofocus>
      <label for="inputPassword" class="sr-only">Parol</label>
      <input type="password" name="password" id="inputPassword"  pattern=".{3,}" title="Parol 6 ta belgidan kam bo'lmasligi kerak !" class="form-control" placeholder="Parol" required>
      <br>
      <p><?php echo $xatolik; ?></p>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Kirish</button>
      <br>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>


</html>
