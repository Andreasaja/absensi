<?php 
	include ('../supports/connection.php');
	include ('../supports/regglobalvar.php');
	include ('../supports/session.php');
	include ('../supports/menu.php');
	include ('../supports/cleantext.php');
	include ('../desain/formlinkstyle.html');
	if (isset($submit))
		{ include ('../process/user.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FORM DATA USER</title>
</head>
<body>
	<br><center><h2>FORM DATA USER</h2></center><br>
	<form method="post" action="fuser.php" enctype="multipart/form-data" name="fuser" id="fuser">
	<table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="50%"><button name="submit" type="submit" value="new" class="btn-sm btn-primary btn-lg btn-block">NEW</button></td><td width="30%"><button name="submit" type="submit" value="update" class="btn-sm btn-warning btn-lg btn-block">UPDATE</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn-sm btn-danger btn-lg btn-block">DELETE</button></td></tr></table>
	<div class="table-striped table-hover table-responsive">
		<table align="center" width="97%" border="1" bordercolor="#eeeeee" class="h9">
			<thead class="btn-primary">
				<tr>
					<th width="3%">&nbsp No</th>
					<th width="6%">&nbsp NIP</th>
					<th width="14%">&nbsp Nama</th>	
					<th width="7%">&nbsp Divisi</th>
					<th width="5%">&nbsp Username</th>
					<th width="5%">&nbsp Password</th>	
					<th width="5%">&nbsp Level</th>
					<th width="6%">&nbsp Lokasi</th>
					<th width="3%">&nbsp User</th>
					<th width="3%">&nbsp Kldr.</th>
					<th width="3%">&nbsp Peg.</th>
					<th width="5%">&nbsp Lembur</th>
					<th width="6%">Appr.Lembur</th>
					<th width="5%">Abs.Hr.</th>	
					<th width="5%">Abs.Per.</th>
					<th width="5%">&nbsp Mast.Gaji</th>
					<th width="5%">&nbsp Slip Gaji</th>
					<th width="3%">&nbsp Dok.</th>
					<th width="3%">Upd.</th>	
					<th width="3%">Del.</th>	
				</tr>
			</thead>
			<tbody>
			<?php
				$counter1 = 0;
				$quser = $connection->query("select * from user order by username asc;");
				while ($aquser = mysqli_fetch_array($quser))
					{
					$counter1  = $counter1+1;
					echo "<tr>";
					echo "<td align='right'>".$counter1." &nbsp <input type='hidden' name='tidxus[$counter1]' value='$aquser[0]'></td>";
					echo "<td>&nbsp <input type='text' name='tkode[$counter1]' size='8' maxlength='8' placeholder='' value='$aquser[1]'></td>";
					echo "<td>&nbsp <input type='text' name='tnama[$counter1]' size='28' maxlength='30' placeholder='' value='$aquser[2]'></td>";
					echo "<td>&nbsp <select name='tdivisi[$counter1]' style='width:80px; height:20px;'><option>$aquser[3]</option><option>Accounting</option><option>Armada</option><option>Finance</option><option>Gudang</option><option>HRD</option><option>IT</option><option>Piutang</option><option>Security</option><option>Umum</option></select></td>";
					echo "<td>&nbsp <input type='text' name='tusername[$counter1]' size='5' maxlength='5' placeholder='' value='$aquser[4]'></td>";
					echo "<td>&nbsp <input type='text' name='tpassword[$counter1]' size='5' maxlength='5' placeholder='' value='*****'></td>";	
					echo "<td>&nbsp <select name='tlevel[$counter1]'><option>$aquser[6]</option><option>Hrd</option><option>Kadiv</option><option>Staff</option><option>Admin</option></select></td>";
					echo "<td>&nbsp <select name='tlokasi[$counter1]'><option>$aquser[7]</option><option>All</option><option>Bandung</option><option>Cikupa</option><option>Jakarta</option><option>Surabaya</option></select></td>";
					include ('../process/user_checkbox1.php');
					echo "<td>&nbsp <input type='checkbox' name='cupdate[$counter1]'></td>";	
					echo "<td>&nbsp <input type='checkbox' name='cdelete[$counter1]'></td>";	
					echo "</tr>";
					}
				echo "<input type='hidden' name='maxcount' value='".$counter1."'>";
				echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
			?>
			</tbody>
		</table></div>
		<table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="50%"><button name="submit" type="submit" value="new" class="btn-sm btn-primary btn-lg btn-block">NEW</button></td><td width="30%"><button name="submit" type="submit" value="update" class="btn-sm btn-warning btn-lg btn-block">UPDATE</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn-sm btn-danger btn-lg btn-block">DELETE</button></td></tr></table>
	</form>
</body>
</html>                                		                            
