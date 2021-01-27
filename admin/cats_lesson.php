<?php

  session_start();
  if (!isset($_SESSION['u_id'])) {
    header('Location: /login.php?status=noentered');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Online, Test, Testlash, Tizim, Online, Testlar">

    <title>Online test tizimi</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>


  </head>

  <body>
    <?php
        include_once("db_functions.php");
        if (isset($_POST['addCat'])) {
          $created_by = $_SESSION['u_id'];
          $query = "INSERT INTO post_cats(name,created_by) VALUES('".$_POST['catName']."',".$created_by.")";
          $result = queryMysql($query);
        }
     ?>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
       <header class="header black-bg">
              <?php include("header.php") ?>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <?php include("left_siedbar.php") ?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i>Dars bo'limlari</h3>

          <!-- BASIC FORM ELELEMNTS -->
          <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <!--asosiy qism -->

                    <h4 class="mb"> Bo'lim qo'shish</h4>
                    <form class="form-inline" role="form" method="POST" action="cats_lesson.php">
                          <div class="form-group">
                              <label class="sr-only" for="exampleInputEmail2">Bo'lim nomi</label>
                              <input type="text" name="catName" class="form-control" id="exampleInputEmail2" >
                          </div>
                          <button type="submit" name="addCat" class="btn btn-theme">Qo'shish</button>
                      </form>
                      <hr>

                      <div id="res" class="table-responsive">
                     <table class="table" >
                        <tr>
                          <th>ID</th>
                          <th>Nomi</th>
                          <th>Kim tomonidan</th>
                        </tr>
           <tbody>
                      <?php

                        $query = "SELECT * FROM post_cats ORDER BY id DESC";
                        $result = queryMysql($query);
                        while($row = $result -> fetch_array(MYSQLI_ASSOC)){
                          echo "<tr>";
                          echo "<td>".$row['id']."</td>";
                          echo "<td>".$row['name']."</td>";
                          $query1 = "SELECT * FROM users where id=".$row['created_by'];
                          $result1 = queryMysql($query1);
                          $row1 = $result1 -> fetch_array(MYSQLI_ASSOC);

                          echo "<td>".$row1['name']."</td>";
                          echo "</tr>";
                        }
                       ?>
                     </tbody>
                   </table>
                   </div>
                </div>
            </div><!-- col-lg-12-->
          </div><!-- /row -->



  </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
        <?php include("footer.php") ?>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

  </body>
</html>
