<?php
	$server = 'db';
	$username = 'root';
	$password = 'root';
	
	//The name of the schema we created earlier in MySQL workbench
	$schema = 'csy2028as1';
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
	
	?>