<?php
  session_start();
  if (!isset($_SESSION['u_id'])) {
    header('Location: /login.php?status=noentered');
    exit();
  }
  ?>
  <?php
  include_once("db_functions.php");
  if (isset($_GET['idq'])){
    $name = Filter($_GET['name']);
    $status = Filter($_GET['status']);
    $time_limit = Filter($_GET['time_limit']);
    $point  = Filter($_GET['point']);
    $key = Filter($_GET['key']);

    $query = "UPDATE test_num set name='".$name."',status='".$status."',point1=".$point.",key1='".$key."' WHERE id=".$_GET['idq']." AND created_by=".$_SESSION['u_id'];
    $result = queryMysql($query);
    $status = true;
    if($result){
      $status = true;
    }else{
      $status = false;
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

         <header class="header black-bg">
              <?php include("header.php") ?>
        </header>

      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <?php include("left_siedbar.php") ?>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

            <h3><i class="fa fa-angle-right"></i> Mavzuni taxrirlash</h3>


            <div class="row mt">
              <div class="col-lg-12">
                  <?php   if(isset($status)){
                  if ($status) {
                    echo '<div class="showback">
              <h4><i class="fa fa-angle-right"></i> Holat</h4>
              <div class="alert alert-success"><b>Xammasi yaxshi!</b> Test muvaffaqiyatli taxrirlandi !</div>
               </div>';
                  }else{
                    echo '<div class="showback">
              <h4><i class="fa fa-angle-right"></i> Holat</h4>
              <div class="alert alert-danger"><b>Qandaydir xatolik yuz berdi!</b> Xatolik haqida <a href="delux.uz/contact.php">bu yerda</a> moderatorlarga habar berishingiz mumkin. <b>Xatolik uchun uzr.</b></div>
               </div>';
                  }

               }
            ?>
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Mavzuni taxrirlash uchun formalarni to'ldiring</h4>
                      <form class="form-horizontal style-form" method="GET">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mavzu nomi</label>
                              <div class="col-sm-10">
                                  <input type="text" name="name" value="<?php echo $_GET['name'] ?>" class="form-control">
                              </div>
                          </div>
                          <input type="hidden" name="idq" value="<?php echo $_GET['id'] ?>">

                      

                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" >Har to'g'ri javob uchun ball</label>
                              <div class="col-sm-10">
                                  <input name="point" type="number" class="form-control" value="<?php echo $_GET['point1'] ?>" >
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
                                     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" >Testga kirish kaliti</label>
                              <div class="col-sm-10">
                                  <input name="key" type="password" class="form-control" value="<?php echo $_GET['key'] ?>" >
                              </div>
                          </div>
                                  <br>
                                   <button type="submit" class="btn btn-theme03"><i class="fa fa-check"></i> Taxrirlash</button>

                                   <button type="reset" class="btn btn-theme04"><i class="fa fa-check"></i> Tozalash</button>
                              </div>






                      </form>
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->


          </div><!-- /row -->

                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->



      <!--main content end-->
      <!--footer start-->
      <?php include("footer.php") ?>
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
