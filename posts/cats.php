
<!DOCTYPE html>

<html lang="en">

    <?php
      //include header
      include("header.php");
     ?>

    <div class="container">

    <div class="row">


      <?php   //include siedbar
       include("siedbar.php") ?>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">

          <?php
            if(isset($_GET['id'])){
              $id = mysqli_real_escape_string($connection,$_GET['id']);
            $query = "SELECT * FROM posts where category=".$id." ORDER BY id DESC";
            $result = queryMysql($query);

            while($row = $result ->fetch_array(MYSQLI_ASSOC)){
              echo '<div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="'.$row['image'].'" alt=""></a>
                    <div class="card-body">
                    <h4 class="card-title">';
                    echo  '<a href="post.php?id='.$row['id'].'">'.$row['title'].'</a></h4>';
                    $post = substr($row['post'],0,180).'<a href="post.php?id='.$row['id'].'"> davomi...</a>';
                    echo '<p class="card-text">'.$post.'</p';
                    echo '</div><div class="card-footer">';
                    echo '<small class="text-muted">Bo`lim: '.$row['cat_name'].'</small><br>
                          <small class="text-muted">Muallif: '.$row['author'].'</small>
                          </div>
                          </div>
                          </div>
                          </div>';
            }
          }else{
            echo "<h2>XATOLIK YUZ BERDI :(</h2>";
          }
          ?>






        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

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
    <script src="../Homepage/vendor/jquery/jquery.min.js"></script>
    <script src="../Homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
