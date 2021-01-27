<div class="col-lg-3">

  <h1 class="my-4">Bo'limlar</h1>
  <div class="list-group">

<?php

  include_once("../db_functions.php");

  $query = "SELECT * from post_cats";
  $result = queryMysql($query);
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
          echo '<a href="cats.php?id='.$row['id'].'" class="list-group-item">'.$row['name'].'</a>';
  }

 ?>

</div>

</div>
