<?php

	$dsn = "mysql:host=localhost;dbname=isierp";

	try {
		$pdo = new PDO($dsn, 'root', '');
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}

?>
