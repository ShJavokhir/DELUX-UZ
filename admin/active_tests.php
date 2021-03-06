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
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

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

              <div class="row">
                  <div class="col-lg-12 main-chart">
                   <?php
               $status = "empty";
      include_once("db_functions.php"); 
        if(isset($_GET['delete'])){
          $deleteid = $_GET['delete'];
          $u_id = $_SESSION['u_id'];
          $s = "DELETE FROM test_num WHERE id=".$deleteid." AND created_by=".$u_id;
          $n = queryMysql($s);
          if($n){
            $status = "deleted";
          }else{
            $status = "error";
          }
        }
        ?>
         <?php 
                    if(isset($status)){
                  if ($status=="deleted") {
                    echo '<div class="showback">
              <h4><i class="fa fa-angle-right"></i> Holat</h4>
              <div class="alert alert-success"><b>Xammasi yaxshi!</b> Mavzu muvaffaqiyatli o`chirildi !</div>
               </div>';
                  }else if($status=="error"){
                    echo '<div class="showback">
              <h4><i class="fa fa-angle-right"></i> Holat</h4>
              <div class="alert alert-danger"><b>Qandaydir xatolik yuz berdi!</b> Xatolik haqida <a href="delux.uz/contact.php">bu yerda</a> moderatorlarga habar berishingiz mumkin. <b>Xatolik uchun uzr.</b></div>
               </div>';
                  }
                
               } 
                   ?>
                
<div class="form-panel">
 <h3 class="mb">Aktiv testlar</h3>
              <table class="table" >
    
      <tr>
        <th>ID</th>
        <th>Nomi</th>
        <th>Status</th>
        <th>Vaqt limiti</th>
        <th>Ball</th>
        <th>Testlar soni</th>
        <th>Testlarga o'tish</th>
        <th>Testlarni o'chirish</th>
        
      </tr>
    
    <tbody>
      <?php
      include_once("db_functions.php"); 
        if(isset($_GET['delete'])){
          $deleteid = $_GET['delete'];
          $s = "DELETE FROM test_num WHERE id=".$deleteid." AND created_by=".$_SESSION['u_id'];
          $n = queryMysql($s);
          if($n){
            echo "Muvaffaqiyatli o'chirildi";
          }else{
            echo "O'chirishda xatolik yuzaga keldi :(";
          }
          //  Qo'shimcha qilish kerak. Testlar bilan o'chishi kerak !!
        }
        
        $query = "select * from test_num where status='ACTIVE' AND created_by=".$_SESSION['u_id'];
        $result = queryMysql($query);
         while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $sorov = "select count(id) from tests where test_num=".$row['id']."";
            $natija = queryMysql($sorov);
            $qiymat = $natija->fetch_array(MYSQLI_ASSOC);
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td>".$row['time_limit']."</td>";
            echo "<td>".$row['point1']."</td>";
            echo "<td>".$qiymat['count(id)']."</td>";
            echo "<td><a class='btn btn-success' href='/admin/testcatid.php?testcatid=".$row['id']."'</a>Testlarga o'tish</td>";
            echo "<td><a class='btn btn-warning' href='/admin/all_cats.php?delete=".$row['id']."'</a>Mavzuni o'chirish</td>";
  
            echo "</tr>";
         }
       ?> 
      <?php 



       ?>
    </tbody>
  </table>      
</div>
                    
       
          </div><!-- /row --> 
          
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
               
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
       <?php    include_once("footer.php")?>
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

