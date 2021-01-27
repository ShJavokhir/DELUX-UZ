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
        if (isset($_GET['delete'])) {
          $user_id = $_SESSION['u_id'];
          $delete_id = Filter($_GET['delete']);

          $query = "DELETE FROM posts where id=".$delete_id." AND created_by=".$user_id;
          $result = queryMysql($query);
          if ($result) {
            $status = "success";
          }else{
            $status = "error";
          }
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
              <?php
                if(isset($status)){
                  if($status=="succes"){
                       echo '<div class="showback">
            <h4><i class="fa fa-angle-right"></i> Holat</h4>
            <div class="alert alert-success">Dars muvaffaqiyatli o`chirildi !</div>
             </div>';
           }else if($status=="error"){
                     echo '<div class="showback">
            <h4><i class="fa fa-angle-right"></i> Holat</h4>
            <div class="alert alert-success"><b>Xatolik yuz berdi !</div>
             </div>';
                  }
                }
               ?>
                <div class="form-panel">
                    <!--asosiy qism -->
                      <div id="res" class="table-responsive">
                     <table class="table" >
                          <tr>
                            <th>ID</th>
                            <th>Sarlavha</th>
                            <th>Bo'lim</th>
                            <th>Ko'rish</th>
                            <th>Taxrirlash</th>
                            <th>O'chirish</th>
                          </tr>
                        <tbody>
                      <?php
                        //bolim chiqarilmayapdi  11:29
                        $query = "SELECT * FROM posts where created_by=".$_SESSION['u_id']." ORDER BY id DESC";
                        $result = queryMysql($query);
                        while($row = $result -> fetch_array(MYSQLI_ASSOC)){
                          echo "<tr>";
                          echo "<td>".$row['id']."</td>";
                          echo "<td>".$row['title']."</td>";
                          echo "<td>".$row['cat_name']."</td>";
                          echo '<td><a class="btn btn-success" href="../posts/post.php?id='.$row['id'].'" <="" a="">Darsga o`tish</a></td>';
                          echo '<td><a class="btn btn-warning" href="edit_lesson.php?edit_id='.$row['id'].'" <="" a="">Darsni Taxrirlash</a></td>';
                          echo '<td><a class="btn btn-warning" href="my_lessons.php?delete='.$row['id'].'" <="" a="">Darsni o`chirish</a></td>';
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
