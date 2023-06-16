<?php
session_start();
if (isset($_SESSION['sidxus']))
	{ 
	$sidxus    = $_SESSION['sidxus']; 
	$susername = $_SESSION['susername']; 
	$spassword = $_SESSION['spassword']; 
	$skode     = $_SESSION['skode']; 
	$snama     = $_SESSION['snama']; 
	$sdivisi   = $_SESSION['sdivisi']; 
	$slevel    = $_SESSION['slevel']; 
	$slokasi   = $_SESSION['slokasi']; 
	}  
else
	{ header('location :../index.php'); }
?>