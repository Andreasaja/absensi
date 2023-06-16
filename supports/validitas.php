<?php
	include ('connection.php');
	include ('regglobalvar.php');
	$login     = 0;
	$vpassword = md5($password);
	$ceklogin  = $connection->query("SELECT idxus,username,password,kode,nama,divisi,level,lokasi FROM user where username='$username' and password='$vpassword';");
	while ($aceklogin = mysqli_fetch_array($ceklogin))
		{
		if ($vpassword == $aceklogin[2])
			{ 
			session_start();
			$_SESSION['sidxus']    = $aceklogin[0];
			$_SESSION['susername'] = $username;
			$_SESSION['spassword'] = $password;
			$_SESSION['skode']     = $aceklogin[3];
			$_SESSION['snama']     = $aceklogin[4];
			$_SESSION['sdivisi']   = $aceklogin[5];
			$_SESSION['slevel']    = $aceklogin[6];
			$_SESSION['slokasi']   = $aceklogin[7];
			$login                 = 1;
			break;
			}
		}

	if ($login == 1)
		{ 
		if (isset($mobile) and ($mobile='1'))
		    { header('location:../mobile/flembur.php'); }
		else
		    {
    		switch ($aceklogin[6])
    			{
    			case "Staff" :   
    			header('location:../forms/flembur.php');
    			break;
    
    			case "Kadiv" :   
    			header('location:../forms/fdlemburapp.php');
    			break;
    			    
    			default :
    			header('location:../forms/fabsensihr.php'); 
    			}
		    }
		}
	else
		{ 
		echo "<br><br><br><br><br><h1><center>Data Salah! LOGIN GAGAL!<br><br><br>";
		echo "<a href=../index.php><b>ULANGI LAGI</b></a></center></h1>";
		}
?>
		
