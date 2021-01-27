<?php 
  session_start();
  if (!isset($_SESSION['u_id'])) {
    header('Location: /login.php?status=noentered');
    exit();
  }
  ?>
        

 <?php 

            include("db_functions.php");
            if(isset($_GET['question'])){
               $question=$item1=$item2=$item3=$trueitem=$test_num = "";
                $question = strtocode($_GET['question']);
                $item1 = strtocode($_GET['item1']);
                $item2 = strtocode($_GET['item2']);
                $item3 = strtocode($_GET['item3']);
                $trueitem = strtocode($_GET['trueitem']);
                $test_num = $_GET['test_num'];
                $created_by = $_SESSION['u_id'];

                //echo "<h1>".$test_num."<br>".$trueitem."<br>".$item3."</h1>";
                $sorov = "INSERT INTO  u_tests (
                question , item1 , item2 , item3 ,
                trueitem , test_num)
                VALUES ('".$question."',  '".$item1."', '".$item2."',  
                '".$item3."','".$trueitem."', '".$test_num."');"; 
                $result = queryMysql($sorov);
                if ($result) {
                echo "<h1>Test joylashtirildi !</h1>";
                exit();
                }else{
                echo "<h1>Xatolik yuz berdi !</h1>";
                exit();  
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

                 
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h3 class="mb"> Testlarni joylash uchun formalarni to'ldiring</h3>
                      <form class="form-horizontal style-form" method="GET" action="u_new_post.php">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Test savoli</label>
                              <div class="col-sm-10">
                                  <input type="text" name="question" class="form-control" placeholder="Misol uchun : Uchburchakning yuzini topish formulasini ko'rsating">
                              </div>
                          </div>
                          

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" >1-javob</label>
                              <div class="col-sm-10">
                                  <input name="item1" type="text" class="form-control">
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">2-javob</label>
                              <div class="col-sm-10">
                                  <input type="text" name="item2" class="form-control">
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">3-javob</label>
                              <div class="col-sm-10">
                                  <input type="text" name="item3" class="form-control">
                              </div>
                          </div>
                           
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">To'g'ri javob</label>
                              <div class="col-sm-10">
                                  <select name="trueitem" class="form-control">
                                      <option  value="1">1 - javob</option>
                                      <option  value="2">2 - javob</option>
                                      <option  value="3">3 - javob</option>
                                  </select>
                                   </div>
                                    </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Testlar guruhini</label>
                              <div class="col-sm-10">
                                  <?php echo '<select name="test_num" class="form-control">'; 
                                    include_once("db_functions.php");
                                    $query = "SELECT * FROM u_test_num";
                                    $result = queryMysql($query);
                                    while($row = $result->fetch_array(MYSQLI_ASSOC)){

                                      echo '<option  value="'.$row['id'].'">'.$row['name'].'</option>';

                                    }
                                  echo '</select>';
                                  ?>
                                  
                                     
                                  
                                 
                                  <br>             
                                   <button type="submit" class="btn btn-theme03"><i class="fa fa-check"></i> Joylashtirish</button>
                                   
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

