<?php 
  session_start();
  if (!isset($_SESSION['u_id'])) {
    header('Location: /login.php?status=noentered');
    exit();
  }
  ?>
  
<!-- /row mt -->	

                            <div class="row mt">
                   
                        
                                    <div class="col-md-4 mb">
                                          <!-- WHITE PANEL - TOP USER -->
                                          <div class="white-panel pn">
                                                <div class="white-header">
                                                      <h5>Foydalanuvchi</h5>
                                                </div>
                                                <p><img src="assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
                                                <p><b><?php echo $_SESSION['u_name'] ?></b></p>
                                                <div class="row">
                                                      <div class="col-md-6">
                                                            <p class="small mt">Email</p>
                                                            <p><?php echo $_SESSION['u_email'] ?></p>
                                                      </div>
                                                      
                                                </div>
                                          </div>
                                    </div><!-- /col-md-4 -->

                                    <div class="col-md-4 col-sm-4 mb">
                                          <!-- REVENUE PANEL -->
                                          <div class="darkblue-panel pn">
                                                <div class="darkblue-header">
                                                      <h5>Tayyorlash jarayonidagi funksiya (E'tiborsiz qoldiring)</h5>
                                                </div>
                                                <div class="chart mt">
                                                      <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[1000,135,667,333,526,996,564,123,890,464,655]"></div>
                                                </div>
                                                <p class="mt"><b>$ 17,980</b><br/>Month Income</p>
                                          </div>
                                    </div><!-- /col-md-4 -->
                                    
                        

                    </div><!-- /row -->
                                                      
                              <div class="row">
                                 
                              
                                    
                                   
                                 
                              </div><!-- /row -->
                              
                              <div class="row mt">
                      <!--CUSTOM CHART START -->
                      
                      <?php
      include_once("db_functions.php"); 
       
      $query = "SELECT role from users where id =".$_SESSION['u_id'];
    $result = queryMysql($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($row['role']=="admin"){
      $sorov = "SELECT visits from stat where id=1";
                  $result = queryMysql($sorov);
                  $r = $result->fetch_array(MYSQLI_ASSOC);
                  echo "<h3>Visits : ".$r[visits]."</h3>";
      
      echo ' <div class="border-head">
                          <h3>VISITS</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>10.000</span></li>
                              <li><span>8.000</span></li>
                              <li><span>6.000</span></li>
                              <li><span>4.000</span></li>
                              <li><span>2.000</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                      </div>';
    }
      ?>
                     
                      <!--custom chart end-->