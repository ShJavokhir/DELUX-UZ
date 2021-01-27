<?php
	session_start();
	if(isset($_POST['submit'])){
		if(isset($_POST['username'])){
			include_once("db_functions.php");
			$user = htmlentities($_POST['username']);
			$user = mysqli_real_escape_string($connection,$user);
			$password =($_POST['password']);


			$query = "SELECT * FROM users where username='".$user."'";
			$res = queryMysql($query);
			$rescheck = mysqli_num_rows($res);
			if($rescheck<1){
				header('Location: login.php?status=incorrect');
				exit();
			}else{
				//asosiy kirish
				if($row = mysqli_fetch_assoc($res)){
					//$hashedpwcheck = password_verify($password,$row['password']);
					if($password==$row['password']){
						$hashedpwcheck = true;
					}else{
						$hashedpwcheck = false;
					}
					if($hashedpwcheck == false){
						header('Location: login.php?status=incorrect');
						exit();
					}else{
						//kirish qismi
						$_SESSION['u_id'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['u_name'] = $row['name'];
						$_SESSION['u_email'] = $row['email'];
						$_SESSION['u_role'] = $row['role'];

						header('Location: login.php?status=success');
						exit();

					}
				}
			}
		}else{
			header('Location: login.php?status=nofull');
			exit();
		}
	}else{
		header('Location: login.php?status=nofull');
		exit();
	}

?>
