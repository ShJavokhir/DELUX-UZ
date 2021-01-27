<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ichki testlar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js_new/jquery.min.js"></script>
  <script src="assets/js_new/bootstrap.min.js"></script>
   <link href="login/signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <form method="POST" action="u_play_test.php" class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Test topshirish uchun quyidagilarni to'ldiring</h1>
      <label for="inputEmail" class="sr-only">Ism</label>
      <input type="text" name="ism" class="form-control" placeholder="Ism" required autofocus>
      <br>
      <label for="inputEmail" class="sr-only">Familiya</label>
      <input type="text" name="familiya"  class="form-control" placeholder="Familiya" required autofocus>
    <br>
      <?php
 
      echo '<select name="mavzu" class="form-control">'; 
      include_once("db_functions.php");
     $query = "SELECT * FROM u_test_num where status='ACTIVE'";
     $result = queryMysql($query);
      while($row = $result->fetch_array(MYSQLI_ASSOC)){
      echo '<option  value="'.$row['id'].'">'.$row['name'].'</option>';                
    }
    echo '</select>';
    ?>


      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Testni boshlash</button>
      <br>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2018</p>
    </form>
</body>
</html>
