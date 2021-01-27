<?php 
  session_start();
  if (!isset($_SESSION['u_id'])) {
    header('Location: /login.php?status=noentered');
    exit();
  }

 ?>
<?php 
  
  session_start();

 ?>
<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Xush kelibisiz <?php echo $_SESSION['u_name']; ?></h5>
                    
                  <li class="mt">
                      <a class="active" href="/admin/index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Asosiy panel</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/admin/new_post.php" >
                          <i class="fa fa-desktop"></i>
                          <span>Testlar</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/new_post.php">Yangi qo'shish</a></li>
                          <li><a  href="/admin/all_cats.php">Barcha testlar</a></li>
                          <li><a  href="/admin/active_tests.php">Aktiv testlar</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Mavzular</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin/add_category.php">Mavzu qo'shish</a></li>
                          <li><a  href="/admin/all_cats.php">Barcha Mavzu</a></li>
                          <!--<li><a  href="todo_list.html">Todo List</a></li>-->
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Foydalanuvchilar</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="user_taken_test_cat.php">Test topshirganlar</a></li>
                          <li><a  href="login.html">Barcha foydalanuvchilar</a></li>
                          <li><a  href="lock_screen.html">Test boshqaruvchilari</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>So'rovnomalar</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Yangi qo'shish</a></li>
                      </ul>
                      <ul class="sub">
                          <li><a  href="form_component.html">Barcha formalar</a></li>
                      </ul>
                      </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Ma'lumotlar</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Diagrammalarda</a></li>
                          <li><a  href="responsive_table.html">Grafiklarda</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Sozlamalar</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>