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
<title>FORM DATA DETAIL IMAGE</title>
</head>
<body>
	<br><center><h2>FORM DATA DETAIL IMAGE</h2></center><br>
<?php
    $qimage = $connection->query("select dokumen from absensihr where idxah = '$tidxah';");   
    if ($aqimage = mysqli_fetch_array($qimage))
        { echo "<center><img src='$aqimage[0]' width='80%' height'80%'></center>"; }
?>
</body>
</html>                                		                            
