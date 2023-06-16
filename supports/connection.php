<?php
  	$connection = new mysqli("localhost", "sinargrafindo_itsg", "waesakitsg1980", "sinargrafindo_dabs");
  
  	if ($connection->connect_error) 
  		{ die("ERROR: Database connection failed : " . $connection->connect_error); } 
?>