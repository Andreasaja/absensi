<?php 
	include ('../supports/connection.php');
	include ('../supports/regglobalvar.php');
	include ('../supports/session.php');
	include ('../supports/menu.php');
	include ('../supports/cleantext.php');
	include ('../desain/formlinkstyle.html');
	if (isset($submit))
		{ include ('../process/kalender.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM SETTING HARI LIBUR RESMI KANTOR</title>
</head>
<body>
	<br><center><h2>FORM SETTING HARI LIBUR RESMI KANTOR</h2></center><br>
	<?php 
		if (isset($message))
		    { 
		    echo "<script language='javascript'>";
      		echo "alert('".$message."');";
      		echo "</script>";
		    }
	?>
	<form method="post" action="fkalender.php" enctype="multipart/form-data" name="fkalender" id="fkalender">
	<table align="center" width="90%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="75%" class="h6">
            <b>PENCARIAN DATA</b> : Periode by Tanggal : 
            <?php 
                if (isset($keyword))
                    { echo " &nbsp Filter pencarian : <select name='filter'><option value='bulan'>Bulan</option><option value='Keterangan'>Keterangan</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='20' maxlength='20' value='".$keyword."' class='h5'>"; }
                else
                    { echo " &nbsp Filter pencarian : <select name='filter'><option value='bulan'>Bulan</option><option value='Keterangan'>Keterangan</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='20' maxlength='20' placeholder='keyword' class='h5'>"; }
            ?>
            </td><td valign="top"><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button><input type="hidden" name="vcek" value="ok"></td>
        </tr>
    </table><br>
    <table align="center" width="90%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block">NEW</button></td><td width="60%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block">UPDATE</button></td><td width="30%"><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block">DELETE</button></td></tr></table>
	<div class="table-striped table-hover table-responsive">
		<table align="center" width="90%" border="1" bordercolor="#eeeeee" class="h6">
			<thead class="btn-primary">
				<tr>
					<th width="7%">&nbsp No</th>
					<th width="15%">&nbsp Bulan</a></th>
					<th width="10%">&nbsp Hari</a></th>
					<th width="15%">&nbsp Tanggal</a></th>
					<th width="35%">&nbsp Keterangan</a></th>
					<th width="9%">Update</th>
					<th width="9%">Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$counter1 = 0;
                if (isset($keyword) and !empty($keyword)) 
                    { 
                    switch ($filter) {
                        case 'bulan':
                        $qkalender  = $connection->query("select * from kalender where bulan like '%$keyword%' order by bulan asc;"); 
                        break;

                        case 'Keterangan':
                        $qkalender  = $connection->query("select * from kalender where keterangan like '%$keyword%' order by keterangan asc;"); 
                        break;
                        }
                    }
                else
                    { $qkalender = $connection->query("select * from kalender order by tanggal desc limit 100;"); }
				if (mysqli_num_rows($qkalender) > 0)
					{
					while ($aqkalender = mysqli_fetch_array($qkalender))
						{
						$counter1 = $counter1+1;
						$ttanggal[$counter1]  = date_create($aqkalender[3]);
                    	$ttanggal[$counter1]  = date_format($ttanggal[$counter1],"d-m-Y");
                    	echo "<tr>";
						echo "<td align='right'>".$counter1." &nbsp<input type='hidden' name='tidxka[$counter1]' value='$aqkalender[0]'></td>";
						echo "<td> &nbsp".$aqkalender[1]."</td>";
						echo "<td> &nbsp".$aqkalender[2]."</td>";
						echo "<td><input type='text' name='ttanggal[$counter1]' size='9' maxlength='10' value=".$ttanggal[$counter1].">
		                <script language='JavaScript'>
		                new tcal ({
		                // form name
		                'formname': 'fkalender',
		                // input name
		                'controlname': 'ttanggal[$counter1]'
		                }); 
		                </script> &nbsp</td>";
						echo "<td>&nbsp <input type='text' name='tketerangan[$counter1]' size='35' maxlength='30' placeholder='' value='$aqkalender[4]'></td>";
						echo "<td>&nbsp <input type='checkbox' name='cupdate[$counter1]'></td>";	
						echo "<td>&nbsp <input type='checkbox' name='cdelete[$counter1]'></td>";
						echo "</tr>";
						}
					echo "<input type='hidden' name='maxcount' value='$counter1'>";
					}
				echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
			?>
			</tbody>
		</table>
	</div>
	<table align="center" width="90%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block">NEW</button></td><td width="30%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block">UPDATE</button></td><td width="30%"><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block">DELETE</button></td></form><form method="post" action="../reports/rkalender.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-info btn-lg btn-block">PRINT</button>
	<?php 
		if (isset($filter)) 
            { echo "<input type='hidden' name='filter' value='$filter'>"; }
        if (isset($keyword)) 
            { echo "<input type='hidden' name='keyword' value='$keyword'>"; }
    ?>
	</form></td></tr></table>
</body>
</html>                                		                            
