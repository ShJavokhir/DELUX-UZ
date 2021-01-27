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
                  
                
<div class="form-panel">
             <h3 class="mb">Barcha testlar</h3>
               <div id="res" class="table-responsive">
              <table class="table" >
    
      <tr>
        <th>ID</th>
        <th>Nomi</th>
        <th>Status</th>
        <th>Vaqt limiti</th>
        <th>Ball</th>
        <th>Testlar soni</th>
        <th>Mavzuga kirish kaliti</th>
        <th>Testlarga o'tish</th>
        <th>Taxrirlash</th>
        <th>Testlarni o'chirish</th>
        
      </tr>
    
    <tbody>
      <?php
      include_once("db_functions.php"); 
        if(isset($_GET['delete'])){
          $deleteid = $_GET['delete'];
          $u_id = $_SESSION['u_id'];
          $s = "DELETE FROM test_num WHERE id=".$deleteid." AND created_by=".$u_id;
          $n = queryMysql($s);
          //tekshirish kerak . USER ID  =  id
        //  if($n){
        //    echo "Muvaffaqiyatli o'chirildi".$u_id;
        //  }else{
         //   echo "O'chirishda xatolik yuzaga keldi :(";
         // }
          //  Qo'shimcha qilish kerak. Testlar bilan o'chishi kerak !!
        }
        
        $query = "select * from test_num where created_by=".$_SESSION['u_id'];
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
            echo "<td>".$row['key1']."</td>";
            echo "<td><a class='btn btn-success' href='/admin/testcatid.php?testcatid=".$row['id']."'</a>Testlarga o'tish</td>";
            echo "<td><a class='btn btn-info' href='/admin/cat_edit.php?testcatid=".$row['id']."&name=".$row['name']."&status=".$row['status']."&time_limit=".$row['time_limit']."&id=".$row['id']."&point1=".$row['point1']."&key=".$row['key1']."'</a>Mavzuni taxrirlash</td>";
            echo "<td><a class='btn btn-warning' href='/admin/all_cats.php?delete=".$row['id']."'</a>Mavzuni o'chirish</td>";
  
            echo "</tr>";
         }
       ?> 
      <?php 



       ?>
    </tbody>
  </table>    
  </div>  
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
    <script src="assets/js/sparkline-chart.js"></script>    
  <script src="assets/js/zabuto_calendar.js"></script>  
  
  
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>

