<?php 
  //if foydalanuvchi saytga kirgan bo'lsa admin panelga redirect bo'ladi
  session_start();
  if(isset($_SESSION['u_id'])){
    header('Location: admin/index.php');
    exit();
 
}
?>
<?php 
   if (isset($_GET['status'])) {
      if($_GET['status']=='ue_exist'){
        $xato = 'Siz kiritgan login yoki email band';
      }
    }
if(isset($_POST['name'])){
    include("db_functions.php");
    //ma'lumotlarni filtrlash kerak
    $username = mysqli_real_escape_string($connection,$_POST['username']); 
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $surname = mysqli_real_escape_string($connection,$_POST['surname']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $captcha = $_POST['captcha'];
    $ans = $_POST['a'];
    if($captcha != $ans){
      echo "Kaptchani xato kiritdingiz. Iltimos qayta urinib ko'ring. Noqulaylik uchun uzr.";
      exit();

    }
    $role = "USER";
    $reg_date = date("d/m/Y");

    //echo $username;
    $query = "SELECT * FROM users where username='".$username."' OR email='".$email."'";
    $result = queryMysql($query);
    if(mysqli_num_rows($result)>=1){
       header('Location: registration.php?status=ue_exist');
       exit();
      
    }
  
    $query = "INSERT INTO users(name,surname,username,email,password,role,reg_date) VALUES ('".$name."','".$surname."','".$username."','".$email."','".$password."','".$role."','".$reg_date."')";
    $result = queryMysql($query);
    if($result==true){
      header('Location: /login.php');
    }else{
      echo "xatolik yuzaga keldi :((";
    }

  }

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Ro'yhatdan o'tish</title>
  
  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js_new/jquery.min.js"></script>
  <script src="assets/js_new/bootstrap.min.js"></script>
   <link href="login/signin.css" rel="stylesheet">

  
</head>


  <body class="text-center">
    <form method="POST" action="registration.php" class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Ro'yhatdan o'tish</h1>
      <br>
       <label for="inputEmail" class="sr-only">Login</label>
      <input type="text" name="username"  title="Iltimos loginni to'g'ri kiriting (faqat Lotin harflaridan foydalaning s) !!" class="form-control" placeholder="Login" required autofocus>
      <label for="inputEmail" class="sr-only">Ism</label>
      <input type="text" name="name"  pattern="[A-Za-z]{1,20}" title="Iltimos ismni to'g'ri kiriting !!" class="form-control" placeholder="Ism" required autofocus>
      <label for="inputEmail" class="sr-only">Familiya</label>
      <input type="text" name="surname" id="inputEmail" title="Iltimos familiyani to'g'ri kiriting !!" name="email"  pattern="[A-Za-z]{1,30}" class="form-control" placeholder="Familiya" required autofocus>

      <label for="inputEmail" class="sr-only"></label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Elektron pochta" required autofocus>
      <label for="inputPassword" class="sr-only">Parol</label>
      <input type="password" name="password" id="inputPassword"  pattern=".{5,}" title="Parol 5 ta belgidan kam bo'lmasligi kerak !" class="form-control" placeholder="Parol" required>
      <br>
      <h5>Kaptcha:</h5> <?php
        $a = rand(2,10);
        $b = rand(2,10);
        $ans = $a+$b;
        echo $a." + ".$b." = ";
        ?>
        <input type="text" name="captcha">
        <input type="hidden" name="a" value="<?php echo $ans ?>">
      <br>
      <p><?php echo $xato; ?></p>
      <br>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Ro'yhatdan o'tish</button>
      <br>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </body>
</html>

