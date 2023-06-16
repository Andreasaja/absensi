<?php 
	include ('../supports/connection.php');
	include ('../supports/regglobalvar.php');
	include ('../supports/session.php');
	include ('../desain/reportlinkstyle.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>REPORT DATA HARI LIBUR RESMI KANTOR</title>
</head>
<body>
	<br><center><h2>REPORT DATA HARI LIBUR RESMI KANTOR</h2></center><br>
	<div class="table-striped table-responsive">
		<table align="center" width="70%" border="1" bordercolor="#eeeeee" class="h6">
			<thead align="center">
				<tr>
					<th width="8%">&nbsp No</th>
					<th width="18%">&nbsp Bulan</a></th>
					<th width="10%">&nbsp Hari</a></th>
					<th width="10%">&nbsp Tanggal</a></th>
					<th width="34%">&nbsp Keterangan</a></th>
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
                    { $qkalender = $connection->query("select * from kalender order by bulan,tanggal desc limit 100;"); }
				if (mysqli_num_rows($qkalender) > 0)
					{
					while ($aqkalender = mysqli_fetch_array($qkalender))
						{
						$counter1 = $counter1+1;
						$ttanggal[$counter1]  = date_create($aqkalender[3]);
                    	$ttanggal[$counter1]  = date_format($ttanggal[$counter1],"d-m-Y");
                    	echo "<tr>";
						echo "<td align='right'>".$counter1." &nbsp</td>";
						echo "<td> &nbsp".$aqkalender[1]."</td>";
						echo "<td> &nbsp".$aqkalender[2]."</td>";
						echo "<td> &nbsp".$ttanggal[$counter1]."</td>";
						echo "<td> &nbsp".$aqkalender[4]."</td>";
						echo "</tr>";
						}
					}
			?>
			</tbody>
		</table>
	</div>
</body>
</html>                                		                            
