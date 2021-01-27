<?php 
	if(isset($_GET['status'])){
		if($_GET['status']=='true'){
			session_start();
			session_unset();
			session_destroy();
			header('Location: login.php');
			exit();		
		}
	}else{
		echo "Nima qilmoqchisiz ?? :((";
	}
	


 ?>