<?php
  session_start();
  if (!isset($_SESSION['u_id'])) {
    header('Location: /login.php?status=noentered');
    exit();
  }
  ?>

<!-- /row mt -->

                            <div class="row mt">


                                 <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4>Foydalanuvchi</h4>
                  </div>
                  <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                  <h5><?php echo $_SESSION['u_name'] ?></5>
                  <footer>
                    <div class="centered">
                      <?php
                        include_once("db_functions.php");
                        $query = "SELECT count(id) from tests where created_by='".$_SESSION['u_id']."'";
                        $result = queryMysql($query);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                       ?>
                      <h5><i class="fa fa-trophy"></i> Bazamizdagi testlaringiz: <?php echo $row['count(id)'] ?></h5>
                    </div>
                  </footer>
                </div>
                <!--  /darkblue panel -->
              </div>

                                   <div class="col-lg-6 col-md-6 col-sm-12">
            <!--  ALERTS EXAMPLES -->
            <div class="showback">
              <h4><i class="fa fa-angle-right"></i> Holat</h4>
              <div class="alert alert-success"><b>Xabar !</b> Assalomu alaykum . Boshqaruv paneliga xush kelibsiz. Xatoliklar bo'lsa uzr so'raymiz.<br><br><b>Sayt holati<b> : <span class="label label-success">Aktiv (Beta)</span></div>

            </div>
            <!-- /showback -->




          </div>




                    </div><!-- /row -->

                              <div class="row">

                               <div class="col-lg-10 col-md-10 col-sm-12">
            <!--  ALERTS EXAMPLES -->
            <div class="showback">
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
        <th>Ishlaganlarni ko'rish</th>

      </tr>

    <tbody>
      <?php


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
             echo "<td><a class='btn btn-primary' href='/admin/user_taken_test.php?testcatid=".$row['id']."'</a>Topshirganlarni ko'rish</td>";

            echo "<td><a class='btn btn-success' href='/admin/testcatid.php?testcatid=".$row['id']."'</a>Testlarga o'tish</td>";

            echo "</tr>";
         }
       ?>

    </tbody>
  </table>
  </div>
</div>


            </div>
            <!-- /showback -->
            <div class="showback">

            <div class="form-panel">
                <!--asosiy qism -->
                <h3 class="mb">Barcha yozgan darslaringiz</h3>


                  <div id="res" class="table-responsive">
                 <table class="table" >
                      <tr>
                        <th>ID</th>
                        <th>Sarlavha</th>
                        <th>Bo'lim</th>
                        <th>Ko'rish</th>
                        <th>Taxrirlash</th>
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
                      echo "</tr>";
                    }
                   ?>
                 </tbody>
               </table>
               </div>
            </div>


          </div>
          </div>



                              </div><!-- /row -->

                              <div class="row mt">
                      <!--CUSTOM CHART START -->

                    
                      <!--custom chart end-->
