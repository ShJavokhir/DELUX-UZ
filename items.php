 	<?php 
 				session_start();
 		       // include ("item_values.php");
 		        while ($e<=$_SESSION['soni']) {
      				$e++;
      				if($e==1){
      					echo '<li class="active"><a data-toggle="pill" href="#item'.$e.'">'.$e.'</a></li>';
      				}else{
    					echo '<li><a data-toggle="pill" href="#item'.$e.'">'.$e.'</a></li>';  					
      				}
      			}
 	 ?>

 