<?php
  session_start();
  if (isset($_SESSION['u_role']) && $_SESSION['u_role']!="admin"){

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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php
        include_once("db_functions.php");
        if (isset($_GET['delete'])) {
          $delID = Filter($_GET['delete']);
          $query = 'DELETE from contact where id='.$delID;
          queryMysql($query);
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


              <div class="col-lg-12">
                <div class="form-panel">
                             <h3 class="mb">Barcha testlar</h3>
                               <div id="res" class="table-responsive">
                              <table class="table" >

                      <tr>
                        <th>ID</th>
                        <th>Sarlavha</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Message</th
                      </tr>

                    <tbody>
                      <?php

                        include_once("db_functions.php");
                        $query = "select * from contact";
                        $result = queryMysql($query);
                         while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['description']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['date']."</td>";
                            echo "<td>".$row['message']."</td>";
                            echo "<td><a class='btn btn-warning' href='/admin/contacts.php?delete=".$row['id']."'</a>Xabarni o'chirish</td>";

                            echo "</tr>";
                         }
                       ?>

                    </tbody>
                  </table>
                  </div>
                </div>
            </div><!-- /row -->




      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->


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
