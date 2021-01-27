    <?php   
  //  session_start();
    if(isset($_POST['mavzu'])){
      
      $_SESSION['ism'] = $_POST['ism'];
      $_SESSION['familiya'] = $_POST['familiya'];
      $_SESSION['mavzu'] = $_POST['mavzu'];
      include_once("db_functions.php");
      header('Location: play_test.php'); 
    }else{
      header('Location: index.php');
      exit();
    }

   ?>
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
      $_SESSION['soni'] = $k;
      

    ?>
    