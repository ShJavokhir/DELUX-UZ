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
        if (isset($_POST['submit'])) {
          $title = Filter($_POST['title']);
          $cat_name = Filter($_POST['category']);
          $post = mysqli_real_escape_string($connection,$_POST['main']);
          $query = "SELECT * FROM post_cats where name='".$cat_name."'";
          $result = queryMysql($query);
          $row = $result -> fetch_array(MYSQLI_ASSOC);
          $category = $row['id'];
          $image = "../assets/img/".$cat_name.".png";
          $author = $_SESSION['u_name'];
          $confirmed = "YES";
          $created_by = $_SESSION['u_id'];
          $time = date("Y/m/d");
          $query = "INSERT INTO posts(title,post,category,image,author,cat_name,date,confirmed,created_by) VALUES('".$title."','".$post."','".$category."','".$image."','".$author."','".$cat_name."','$time','".$confirmed."',".$created_by.")";
          $result = queryMysql($query);
          if($result){
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
          <h3><i class="fa fa-angle-right"></i> Yangi dars qo'shish</h3>

          <!-- BASIC FORM ELELEMNTS -->
          <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                  <?php
                    if(isset($status)){
                      if($status=="success"){
                           echo '<div class="showback">
                <h4><i class="fa fa-angle-right"></i> Holat</h4>
                <div class="alert alert-success">Dars joylandi. Raxmat !</div>
                 </div>';
               }else if($status=="error"){
                         echo '<div class="showback">
                <h4><i class="fa fa-angle-right"></i> Holat</h4>
                <div class="alert alert-success"><b>Xatolik yuz berdi !</div>
                 </div>';
                      }
                    }
                   ?>
                  <form class="form-horizontal style-form" action="new_lesson.php" method="POST">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Sarlavha</label>
                              <div class="col-sm-10">
                                  <input type="text" name="title" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Bo'lim</label>
                          <div class="col-sm-10">
                          <select name="category" class="form-control">
                                  <?php
                                    $query = "SELECT * FROM post_cats";
                                    $result = queryMysql($query);
                                    while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option>".$row['name']."</option>";
                                    }

                                   ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Asosiy Qism</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" name="main" rows="20" cols="30"></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-success btn-lg">Joylash</button>
                          </div>
                      </div>
                      </form>

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

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
  <script src="assets/js/zabuto_calendar.js"></script>
  </body>
</html>
