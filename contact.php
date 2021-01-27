<?php
session_start();

 ?>
<!DOCTYPE html>

<html lang="en">
  <?php
    include("header.php")
  ?>


  <?php
    include_once("db_functions.php");
    if(isset($_POST['submit'])){
      $message = Filter($_POST['message']);
      $email = Filter($_POST['email']);
      $description = Filter($_POST['description']);
      $time = date('l jS \of F Y h:i:s A');
      $query = "INSERT INTO contact(description,message,email,date) VALUES ('".$description."','".$message."','".$email."','".$time."')";
      $result = queryMysql($query);
      $status = "";
      if($result){
        $status = "accept";
      }else{
        $status = "error";
      }

  }
   ?>
    <!-- MAIN -->
   <div align="center" class="container">
<div class="row">
  <div class="col-sm-12" id="start"><h1>
    <?php
      if($status == "error")
          echo 'Xatolik sodir bo`ldi';
      if($status == "accept")
            echo 'Xabaringiz manzilga yetkazildi';
      if($status =="")
          echo "Savol yoki takliflaringiz bo'lsa yozing";
     ?>

  </h1>

  <br>

</div>
  </div>
</div>
<br>
 <div align="center" class="container">
<div class="row">

  <!-- Natijalar-->

  <div id="res" class="table-responsive">
  <form method="POST" action="contact.php">
  <div class="form-group">
    <label for="description">Mavzu</label>
    <input type="text" name="description" class="form-control" id="description" aria-describedby="emailHelp" placeholder="Mavzu">
    <br>
   <div class="form-group">
    <label for="exampleInputEmail1">Siz bilan bog'lanish uchun email,telegram yoki telefon nomeri (Shart emas)</label>
    <input type="text" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email, telefon nomer yoki telegram (Shart emas)">
  </div>
  </div>
  <br>
  <div class="form-group">
     <label for="message">Asosiy qism</label>
    <textarea name="message" class="form-control" id="message" placeholder="Asosiy qism" rows="4"></textarea>
  </div>
  <div class="form-check">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Jo'natish</button>
</form>
 </div>
</div>
</div>

  <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">©IntelectSoft 2018 Copyright:
      <a href="https://Delux.uz/"> Delux.uz (BETA)</a>
    </div>
    <!-- Copyright -->
    <!-- Bootstrap core JavaScript -->
    <script src="Homepage/vendor/jquery/jquery.min.js"></script>
    <script src="Homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
