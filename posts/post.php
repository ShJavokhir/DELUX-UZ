
<!DOCTYPE html>

<html lang="en">

<?php
  include("header.php");
 ?>
    <!-- MAIN -->

    <div class="container">

      <div class="row">



    <?php include("siedbar.php"); ?>
        <!-- Post Content Column -->
        <?php
            if(isset($_GET['id'])){
              $id = Filter($_GET['id']);
              //view qo'shish
              $query = "UPDATE posts set views=views+1 where id=".$id;
              queryMysql($query);

              $query = "SELECT * FROM posts WHERE id=".$id;
              $result = queryMysql($query);
              $row = $result -> fetch_array(MYSQLI_ASSOC);

            }else{
              echo "<h2>Xatolik yuz berdi :(<h2>";
              exit();
            }
         ?>
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $row['title']; ?></h1>

          <p class="lead">
            Bo'lim:
            <a href="cats.php?id=<?php echo $row['category'] ?>"> <?php echo $row['cat_name']; ?></a>
          </p>
          <!-- Author -->

          <p class="lead">
            Muallif:
            <a href="#"> <?php echo $row['author']; ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Yozilgan sana: <?php echo $row['date']; ?></p>
          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $row['image'] ?>" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php
            echo $row['post'];
           ?></p>

          <hr>
          <p><span><?php echo $row['views']." marta ko'rildi" ?></span></p>

            </div>
          </div>

        </div>

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
