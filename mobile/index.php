<!DOCTYPE html>
<html lang="en">
<head>
<link href="../desain/index.css" rel="stylesheet" type="text/css"/>
<title>Form Login (Mobile View)</title>
</head>
<body class="text-center"><br><br><br><br>
    <center><h1 class="h3 mb-3 font-weight-normal">PENGAJUAN LEMBUR KARYAWAN</h1></center><br><br>
    <div class="login-card">
        <h1>FORM LOGIN</h1><br>
        <form method="post" action="../supports/validitas.php">
	        <input type="text" name="username" placeholder="Username">
	        <input type="password" name="password" placeholder="Password">
	        <input type="hidden" name="mobile" value="1">
	        <input type="submit" name="login" class="login login-submit" value="login">
        </form>
    </div>
</body>
</html>                                		                            