<?php
	$dbhost  = 'localhost';    	// o'zgartirish shart emas
	$dbname  = '';    		// Ma'lumotlar bazasi nomi
	$dbuser  = '';   		// user nomi
	$dbpass  = '';   			// parol

	// server bilan aloqa o'rnatish
	$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if ($connection->connect_error) {
	    die("MySQLga ulanishda xatolik sodir bo`ldi: ". 
	    	$connection->connect_error);
	}
	
?>