<?php 
	$host='localhost';
	$dbname='blogphp';
	$dbuser = 'blogphp';
	$dbpassword = 'blogpwd';
	$dsn = 'mysql:host='.$host.';dbname='.$dbname;
	try {
		$pdo = new PDO($dsn,$dbuser,$dbpassword);
	} catch (Exception $e) {
		echo 'error';
	}

