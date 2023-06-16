<?php
  	$connection = new mysqli("localhost", "sinargrafindo_dev", "sinargrafindodev123", "sinargrafindo_dabsdevelopment");
  
  	if ($connection->connect_error) 
  		{ die("ERROR: Database connection failed : " . $connection->connect_error); } 
?>