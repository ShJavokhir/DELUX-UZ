<?php
    //testlarni tekshirish
		session_start();
    //testlar jo'natilganini tekshirish
		if (isset($_POST['tekshir'])) {

		//togri javoblarni ko'rsatish uchun o'zgaruvchilar
		$seeAnswer = array();
		$seeQuestion = array();
		$seeMyAnswer = array();
		$seeTestNumber = array();
		$i = -1;

		include("db_functions.php");
		$tj = 0;
		$k = 0;
    $session_mavzu = mysqli_real_escape_string($connection,$_SESSION['mavzu']);
    //test mavzu raqami bo'yicha testlar chaqirilib olinadi
	  $query = "select * from u_tests where test_num='".$session_mavzu."'";
      $result = queryMysql($query);
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
          $k++;
    //xullas bu yerini tushundingiz deb o'ylayman :)
		if ($_POST['answers'.$k.'']==$row['trueitem']) {
			$tj++;
		}else{
			//agarda javob xato bo'lsa test topshiruvchiga ko'rsatish uchun saqlansin
			$i++;
			if($row['trueitem']==1){
					$seeAnswer[$i] = $row['item1'];
			}else if($row['trueitem']==2){
					$seeAnswer[$i] = $row['item2'];
			 	}else if($row['trueitem']==3){
						$seeAnswer[$i] = $row['item3'];
					}

					if($_POST['answers'.$k.'']==1){
							$seeMyAnswer[$i] = $row['item1'];
					} else if($_POST['answers'.$k.'']==2){
							$seeMyAnswer[$i] = $row['item2'];
					} else if($_POST['answers'.$k.'']==3){
							$seeMyAnswer[$i] = $row['item3'];
					} else if($_POST['answers'.$k.'']==""){
						$seeMyAnswer[$i] = "Belgilanmagan";
					}
					$seeQuestion[$i] = $row['question'];
					$seeTestNumber[$i] = $k;
		}

	}
  //natija elementlari
	$tests_number = $k;
	$correct_tests = $tj;
    	$a = 100/$k;
		$percentage = $correct_tests*$a;
    }
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
    $finished = "HA";
    //tugatgan vaqti
    $end_time = date("d/m/Y")." | ".date("h:i:sa");
	//echo $tj;
    //va nihoyat qolgan natijalarni update qilish navbati keldi
	$query = "UPDATE u_user_taken_test set tests_number=".$tests_number.",correct_test=".$correct_tests.",end_time='".$end_time."',finished='".$finished."',ball=".$ball." where name='".$_SESSION['ism']."' AND surname='".$_SESSION['familiya']."' AND test_name='".$_SESSION['mavzu_name']."'";
	queryMysql($query);


?>
	<!---html qismi-->
	<!DOCTYPE html>
<html lang="en" >

<head>    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natija</title>

		<link href="Homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Homepage/css/business-frontpage.css" rel="stylesheet">


  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <script src="assets/js_new/jquery.min.js"></script>
  <script src="assets/js_new/bootstrap.min.js"></script>



</head>


  <body>
		<div class="container">
		    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		    <a class="navbar-brand" href="#">Delux.uz</a>
		    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>

		    <div class="navbar-collapse collapse" id="navbarColor02" style="">
		      <ul class="navbar-nav mr-auto">
		        <li class="nav-item active">
		          <a class="nav-link" href="index.php#">Bosh sahifa <span class="sr-only">(Hozirgi)</span></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="index.php#start">Test topshirish</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="index.php#res">Natijalar</a>
		        </li>
		        <li class="nav-item">
		<a class="nav-link" href="contact.php">Qayta a'loqa <span class="sr-only"></span></a>        </li>
		<li class="nav-item">
		<a class="nav-link" href="/posts">Darslar <span class="sr-only"></span></a>        </li>

		      </ul>

		    </div>
		  </nav>
		</div>
		  <br>
		  <br>
    <br>

    <div class="container">
    <div class="row">

      <div class="col-md-1"></div>
      <div class="col-md-10">
				<h2 align = "center">Natija</h2>
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
        <td><font size='5'><?php echo $tests_number-$correct_tests; ?></font></td>
        <td><font size='5'><?php echo $ball; ?></font></td>
        <td><font size='5'><?php echo $percentage." %"; ?></font></td>
      </tr>


    </tbody>
  </table>

      </div>
			<div class="table-responsive">
				<?php
				if(count($seeTestNumber)!=0){
					echo '<h2 align = "center">Xato belgilagan testlaringizni bilib oling:</h2>';
					echo '<table class="table table-bordered" border="true" align="center" style="width:100%">
					<thead>
						<tr class="success">';
					echo "<th ><font size='2'>Test nomeri</font></th>
					 <th><font size='2'>Savol</font></th>
						<th><font size='2'>Sizning javobingiz</font></th>
						 <th><font size='2'>To'g'ri javob</font></th>
				</tr>
			</thead>
			<tbody";
			for ($i=0; $i < count($seeTestNumber); $i++) {
						echo '<tr class="active">';
						echo "<td ><font size='2'>".$seeTestNumber[$i]."</font></td>";
						echo "<td ><font size='2'>".$seeQuestion[$i]."</font></td>";
						echo "<td ><font size='2'>".$seeMyAnswer[$i]."</font></td>";
						echo "<td ><font size='2'>".$seeAnswer[$i]."</font></td>";
						echo "</tr>";
				}
				echo "</tbody></table>";
				}
 ?>




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
