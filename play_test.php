<?php
      session_start();
      include_once("db_functions.php");

    if(isset($_POST['mavzu'])){


      $query = "SELECT * from test_num where id=".$_POST['mavzu'];
      $result = queryMysql($query);
      if (mysqli_num_rows($result)) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row['key1']!=$_POST['key']) {
          echo "Kalit nomeri xato";
          exit();
        }
      }else{
        echo "Bunday test mavzusi yo'q";
        exit();
      }
       $query = "SELECT * FROM test_num where id=".$_POST['mavzu']." AND status='ACTIVE'";
      $result = queryMysql($query);
      if(mysqli_num_rows($result)<1){
        echo "Siz kiritgan test raqami hozirda Faol emas";
        exit();
      }
      $admin_id = $row['created_by'];
      $_SESSION['ism'] = $_POST['ism'];
      $_SESSION['familiya'] = $_POST['familiya'];
      $_SESSION['mavzu'] = $_POST['mavzu'];
      $start_time = date("d/m/Y")." | ".date("h:i:sa");

      $query = "INSERT INTO user_taken_test(finished,name,surname,test_num,start_time,admin_id) VALUES('Yo`q','".$_SESSION['ism']."','".$_SESSION['familiya']."','".$_SESSION['mavzu']."','".$start_time."',".$admin_id.")";
      $result = queryMysql($query);
      $s = "select count(id) from tests where test_num=".$_SESSION['mavzu'];
      $res = queryMysql($s);
      $i = $res->fetch_array(MYSQLI_ASSOC);
      $_SESSION['soni'] = $i['count(id)']-1;
      if($_SESSION['soni']==-1){
        echo "<center><H1>Testga kirish kaliti noto'g'ri !!!</H1></center>";
        echo "<center><a href='/index.php'>Ortga....</a></center>";
        exit();
      }
    }else{
      echo "Test mavzusi tanlanmadi !";
      exit();
    }

   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test topshirish oynasi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js_new/jquery.min.js"></script>
  <script src="assets/js_new/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3><?php echo "Ism :".$_SESSION['ism']." |  Familiya :".$_SESSION['familiya'] ; ?></h3>
    <form method="POST" id="tekshirish" action="check.php">
      <input type="hidden" name="tekshir">
    <!-- Savol nomerlari bolimi -->
     <ul class="nav nav-pills">
    <?php
      while ($e<=$_SESSION['soni']) {
              $e++;
              if($e==1){
                echo '<li  class="active"><a id='.$e.' data-toggle="pill" href="#item'.$e.'">'.$e.'</a></li>';
              }else{
              echo '<li ><a id='.$e.' data-toggle="pill" href="#item'.$e.'">'.$e.'</a></li>';
              }
            }
     ?>
  </ul>
    <!-- Savol nomerlari bolimi tugashi -->

  <div class="tab-content">

    <!-- Test javoblarini belgilash bo'limi -->
    <?php

    $query = 'select * from tests where test_num='.$_SESSION['mavzu'];
      $result = queryMysql($query);
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

          $k++;
          if($k==1){

               echo '<div id="item'.$k.'" class="tab-pane fade in active"> ';
                echo '<h3>'.$row['question'].'</h3>';
               echo "<br>";
                echo '<div class="radio">';
                echo '  <label><input type="radio" group="a" value="1" name="answers'.$k.'">'.$row['item1'].'</label>';
                echo '</div>';
                echo "<br>";
                echo '<div class="radio">';
                echo '  <label><input type="radio" group="a" value="2" name="answers'.$k.'">'.$row['item2'].'</label>';
                 echo '</div>';
                 echo "<br>";
                 echo '<div class="radio">';
                 echo '  <label><input type="radio" group="a" value="3" name="answers'.$k.'">'.$row['item3'].'</label>';
                echo '</div>';
                echo '</div>';
          }else{

               echo '<div id="item'.$k.'" class="tab-pane fade"> ';
              echo '<h3>'.$row['question'].'</h3>';
                   echo "<br>";
                 echo '<div class="radio">';
                echo '  <label><input type="radio" value="1" name="answers'.$k.'">'.$row['item1'].'</label>';
                echo '</div>';
                echo "<br>";
                echo '<div class="radio">';
                echo '  <label><input type="radio" value="2" name="answers'.$k.'">'.$row['item2'].'</label>';
                 echo '</div>';
                 echo "<br>";
                 echo '<div class="radio">';
                 echo '  <label><input type="radio" value="3" name="answers'.$k.'">'.$row['item3'].'</label>';
                echo '</div>';
                echo '</div>';

          }

      }

       ?>
    <!-- Test javoblarini belgilash bo'limi -->  <div class="btn-group btn-group-justified">
  						  <div class="btn-group">
                  <button  type="button" class="btn btn-primary" id="prev">oldingi</button>
                 </div>
  						  <div class="btn-group">
                  <button  type="button" class="btn btn-primary" id="next">keyingi</button>
                </div>
  						</div>
      <br>


      <button name="submitt" type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#contact_dialog">Testni tugatish</button>
      <script>
        let next = document.getElementById('next');
        let prev = document.getElementById('prev');
        next.addEventListener('click',nextF);
        function nextF(){
          (document.getElementById(parseInt(document.querySelector('.nav-pills > .active').children[0].id)+1).click());
        }

        prev.addEventListener('click',prevF);
        function prevF(){
          (document.getElementById(parseInt(document.querySelector('.nav-pills > .active').children[0].id)-1).click());
        }
      </script>
    </div>
</div>
</form>
<div class="modal fade" id="contact_dialog" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
                <div class="modal-body">
                  <h4 class="modal-title">Testni tugatmoqchimisiz ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Yo'q</button>
                    <button type="button" id="submitForm" class="btn btn-default">Ha</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    $("#submitForm").on('click', function() {
       $("#tekshirish").submit();
   });
   </script>
</body>
</html>
