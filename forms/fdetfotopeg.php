<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../desain/formlinkstyle.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FORM DATA DETAIL FOTO PEGAWAI</title>
</head>
<body>
	<br><center><h2>FORM DATA DETAIL FOTO PEGAWAI</h2></center><br>
<?php
    $qfoto = $connection->query("select foto from pegawai where idxpg = '$tidxpg';");   
    if ($aqfoto = mysqli_fetch_array($qfoto))
        { echo "<center><img src='$aqfoto[0]' width='35%' height'35%'></center>"; }
?>
</body>
</html>                                		                            
