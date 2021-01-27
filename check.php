<?php
    //testlarni tekshirish
		session_start();
    //testlar jo'natilganini tekshirish
		if (isset($_POST['tekshir'])) {


		include("db_functions.php");
		$tj = 0;
		$k = 0;
    $session_mavzu = mysqli_real_escape_string($connection,$_SESSION['mavzu']);
    //test mavzu raqami bo'yicha testlar chaqirilib olinadi
	  $query = "select * from tests where test_num='".$session_mavzu."'";
      $result = queryMysql($query);
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
          $k++;
          //echo $_POST['answers'.$k.'']." <br>" ;
      		//echo $k;
    //xullas bu yerini tushundingiz deb o'ylayman :)
		if ($_POST['answers'.$k.'']==$row['trueitem']) {
			$tj++;
			//cho $row['id'];
				//echo $_POST['answers'.$k.'']."<br>";

		}
	}
  //natija elementlari
	$tests_number = $k;
	$correct_tests = $tj;
	$incorrect_tests = $k-$tj;
  //1 to'g'ri javobga qancha ball berilishini topish
	$query = "select point1 from test_num where id='".$_SESSION['mavzu']."'";

    $result = queryMysql($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    //buyog'i oddiy matematika :D

    	$a = 100/$k;
    	$percentage = $correct_tests*$a;
    /*else{
    	$a = $row['point1']/$k;
		$percentage = $correct_tests*$a." %";
	}*/
    //ball ni hisoblash
    if ($percentage>=86) {
    	$ball = 5;
    }elseif ($percentage>=76) {
    	$ball = 4;
    }elseif ($percentage>=60) {
    	$ball = 3;
    }else{
    	$ball = 2;
    }
    $finished = "Ha";
    //tugatgan vaqti
    $end_time = date("d/m/Y")." | ".date("h:i:sa");
	//echo $tj;
    //va nihoyat qolgan natijalarni update qilish navbati keldi
	$query = "UPDATE user_taken_test set tests_number=".$tests_number.",correct_test=".$correct_tests.",incorrect_test=".$incorrect_tests.",percentage='".$percentage."',end_time='".$end_time."',finished='".$finished."' where name='".$_SESSION['ism']."' AND surname='".$_SESSION['familiya']."' AND test_num=".$_SESSION['mavzu'];
	queryMysql($query);

		}else{
			echo "Xatolik yuz berdi :(";
			exit();
		}
?>
	<!---html qismi-->
	<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Tizimga kirish</title>


  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <script src="assets/js_new/jquery.min.js"></script>
  <script src="assets/js_new/bootstrap.min.js"></script>



</head>


  <body>
    <br>
    <br>
    <br>
    <br>

    <div class="container">
    <div class="row">

      <div class="col-md-1"></div>
      <div class="col-md-10">
          <div class="table-responsive">
  <table class="table table-bordered" border="true" align="center" style="width:100%">
    <thead>
      <tr class="success">

        <th ><font size='4'>Ism</font></th>
         <th><font size='4'>Familiya</font></th>
          <th><font size='4'>Testlar soni</font></th>
           <th><font size='4'>To'g'ri javoblar</font></th>
           <th><font size='4'>Noto'g'ri javoblar</font></th>
           <th><font size='4'>Ball</font></th>
           <th><font size='4'>Foiz</font></th>

      </tr>
    </thead>
    <tbody>
      <tr class="active">
        <td ><font size='5'><?php echo $_SESSION['ism'] ?></font></td>
        <td ><font size='5'><?php echo $_SESSION['familiya']?></font></td>
        <td><font size='5'><?php echo $tests_number ?></font></td>
        <td><font size='5'><?php echo $correct_tests; ?></font></td>
        <td><font size='5'><?php echo $incorrect_tests; ?></font></td>
        <td><font size='5'><?php echo $ball; ?></font></td>
        <td><font size='5'><?php echo $percentage; ?> %</font></td>
      </tr>
      <tr>


      </tr>

    </tbody>
  </table>
      </div>
    </div>
      <div class="col-md-1"></div>

    </div>
    </div>
  </body>
</html>
<?php

	session_unset();
	session_destroy();

 ?>
