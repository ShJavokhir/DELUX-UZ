<?php
  session_start();
  if (!isset($_SESSION['u_role'])){

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
      //user haqida ma'lumotlarni bazadan olish qismi
      if(isset($_SESSION['u_id'])){
        $query = "SELECT * from users where ID=".$_SESSION['u_id'];
        $result = queryMysql($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $name = $row['name'];
        $surname = $row['surname'];
        $email = $row['email'];
        $role = $row['role'];
        $reg_date = $row['reg_date'];
      }else{
        echo "<h2>Nima o'xshamay qoldimi ? :)</h2>";
        header('Location: /login.php?status=noentered');
        exit();
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



            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-md-12 col-sm-4 mb">
                              <div class="darkblue-panel pn">
                                <div class="darkblue-header">
                                  <h4>Foydalanuvchi</h4>
                                </div>
                                <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>


                                <footer>
                                  <div class="centered">

                                      </div>
                                </footer>
                              </h5></div>

                            </div>
              <div class="col-lg-12 col-md-6 col-sm-12">
                          <!--  ALERTS EXAMPLES -->
                          <div class="showback">

                            <div class="alert alert-success">
                              <h3>Ismi : <span class="label label-success"><?php echo $name; ?></span></h3>
                              <h3>Familiya : <span class="label label-success"><?php echo $surname?></span> </h3>
                              <h3>Saytdagi tajriba :<span class="label label-success"><?php echo $role; ?></span> </h3>
                              <h3>Elektron pochta : <span class="label label-success"><?php echo $email; ?></span></h3>
                              <h3>Ro'yhatdan o'tgan vaqti :<span class="label label-success"><?php echo $reg_date; ?></span> </h3>
                            </div>

                          </b></b></div><b><b>
                          <!-- /showback -->




                        </b></b></div>

            </div>




          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
        <?php include_once("footer.php") ?>
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


  </body>
</html>
