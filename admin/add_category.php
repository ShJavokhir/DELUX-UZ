<?php
  session_start();
  if (!isset($_SESSION['u_id'])) {
    header('Location: /login.php?status=noentered');
    exit();
  }
?>
<?php
  include_once("db_functions.php");
            $stat = "empty";

  if(isset($_POST['edit'])){

          $name = Filter($_POST['name']);
          $time_limit = Filter($_POST['time_limit']);
          $point1 = Filter($_POST['point']);
          $status = Filter($_POST['status']);
          $created_by = Filter($_SESSION['u_id']);
          $key = Filter($_POST['key']);
          $created_time = date("d/m/Y");
          $query = "INSERT INTO  test_num (
                name  , point1 , status, created_by,created_time,key1)
                VALUES ('".$name."', '".$point1."',
                '".$status."','".$created_by."','".$created_time."','".$key."');";
          $result  = queryMysql($query);
          if($result){
            $stat = "succes";
          }else{
            $stat = "error";
          }
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
                <?php
                  if(isset($stat)){
                    if($stat=="succes"){
                         echo '<div class="showback">
              <h4><i class="fa fa-angle-right"></i> Holat</h4>
              <div class="alert alert-success">Mavzu muvaffaqiyatli qo`shildi !</div>
               </div>';
                    }else if($stat=="error"){
                       echo '<div class="showback">
              <h4><i class="fa fa-angle-right"></i> Holat</h4>
              <div class="alert alert-success"><b>Xatolik yuz berdi. !</div>
               </div>';
                    }
                  }
                 ?>
                  <div class="form-panel">
                      <h3 class="mb"> Yangi bo'lim qo'shish uchun formalarni to'ldiring</h3>
                      <form class="form-horizontal style-form" method="POST" >
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bo'lim nomi</label>
                              <div class="col-sm-10">
                                  <input type="text" name="name" class="form-control" placeholder="Misol uchun : Matematika bo'yicha test">
                              </div>
                          </div>




                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" >Har to'g'ri javob uchun ball</label>
                              <div class="col-sm-10">
                                  <input name="point" type="number" class="form-control" placeholder="Ballni kiriting. 100 ballik tizmida baholash uchun 0 ni kiriting " >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Testga kirish kaliti</label>
                              <div class="col-sm-10">
                                  <input type="text" name="key" class="form-control">
                              </div>
                          </div>


                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-10">
                                  <select name="status" class="form-control">
                                      <option  value="ACTIVE">Faol</option>
                                      <option  value="INACTIVE">Nofaol</option>

                                  </select>
                                   </div>
                                    </div>
                                  <br>
                                  <input type="hidden" name="edit">
                                   <button type="submit" class="btn btn-theme03"><i class="fa fa-check"></i> Qo'shish</button>

                                   <button type="reset" class="btn btn-theme04"><i class="fa fa-check"></i> Tozalash</button>
                              </div>






                      </form>
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->





      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->


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
