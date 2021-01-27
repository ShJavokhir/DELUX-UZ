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

                  <p class="centered"><a href="index.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Xush kelibisiz <span><?php echo $_SESSION['u_name']; ?></span></h5>

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
                          <?php
                          if($_SESSION['u_id']==2){
                         echo '<li><a  href="/admin/add_u_test.php">Umumiy test</a></li>';
                        }
                          ?>
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


                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Darslar</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="new_lesson.php">Yangi qo'shish</a></li>
                      </ul>
                      <ul class="sub">
                          <li><a  href="my_lessons.php">Mening darslarim</a></li>
                      </ul>
                      <ul class="sub">
                          <li><a  href="cats_lesson.php">Bo'limlar</a></li>
                      </ul>
                      <ul class="sub">
                        <?php
                          if($_SESSION['u_id']==2){
                          echo '<li><a  href="confirm_posts.php">Testlarni boshqarish</a></li>';
                      }
                        ?>
                      </ul>
                      </li>
                      <?php
                        if($_SESSION['u_role']=="admin"){

                            echo '<li class="sub-menu">
                               <a href="javascript:;" >
                                   <i class="fa fa-tasks"></i>
                                   <span>Xabarlar</span>
                               </a>
                               <ul class="sub">
                                   <li><a  href="contacts.php">Barchasini ko`rish</a></li>
                               </ul
                               </li>';

                        }
                       ?>


                
                  <li class="sub-menu">
                      <a href="profile.php" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Kabinet</span>
                      </a>

                  </li>

              </ul>
