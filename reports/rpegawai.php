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
<title>REPORT DATA PEGAWAI</title>
</head>
<body>
	<br><center><h2>REPORT DATA PEGAWAI</h2></center><br>
	<div class="table-striped table-responsive">
		<table align="center" width="97%" border="1" bordercolor="#eeeeee">
			<thead align="center" class="h8">
				<tr>
					<th width="3%">&nbsp No</th>
					<th width="5%">&nbsp ID</a></th>
					<th width="14%">&nbsp Nama</a></th>
					<th width="8%">&nbsp Perusahaan</a></th>
					<th width="10%">&nbsp Jabatan</a></th>
					<th width="7%">&nbsp Tgl.Join</a></th>
					<th width="8%">&nbsp Masa Kerja</a></th>
					<th width="7%">&nbsp Status</a></th>
					<th width="8%">&nbsp Grup</a></th>
					<th width="8%">&nbsp Lokasi</a></th>
					<th width="5%">&nbsp Hr.Krj.</a></th>
					<th width="5%">&nbsp Total.</a></th>
					<th width="4%">&nbsp Cuti</a></th>
					<th width="4%">&nbsp Sisa</a></th>
					<th width="4%">St.Aktif</a></th>
				</tr>
			</thead>
		</table>
		<table align="center" width="97%" border="1" bordercolor="#eeeeee">
			<tbody class="h8">
			<?php
				$counter1 = 0;
				if (isset($keyword) and !empty($keyword)) {
					switch ($filter) {
	                    case 'kode':
	                    $qpegawai  = $connection->query("select * from pegawai where kode = '$keyword' order by tgljoin asc;"); 
	                    break;

	                    case 'nama':
	                    $qpegawai  = $connection->query("select * from pegawai where nama like '%$keyword%' order by tgljoin asc;"); 
	                    break;

	                    case 'perusahaan':
	                    $qpegawai  = $connection->query("select * from pegawai where perusahaan like '%$keyword%' order by tgljoin asc;"); 
	                    break;
	                        
	                    case 'jabatan':
	                    $qpegawai  = $connection->query("select * from pegawai where jabatan like '%$keyword%' order by tgljoin asc;"); 
	                    break;

	                    case 'masakrj':
	                    $qpegawai  = $connection->query("select * from pegawai where masakrj = '$keyword' order by masakrj asc;"); 
	                    break;

	                    case 'status':
	                    $qpegawai  = $connection->query("select * from pegawai where status like '%$keyword%' order by tgljoin asc;"); 
	                    break;

	                    case 'grup':
	                    $qpegawai  = $connection->query("select * from pegawai where grup like '%$keyword%' order by grup asc;"); 
	                    break;

	                    case 'lokasi':
	                    $qpegawai  = $connection->query("select * from pegawai where lokasi = '$keyword' order by lokasi asc;"); 
	                    break;

	                    case 'staktif':
	                    $qpegawai  = $connection->query("select * from pegawai where staktif = '$keyword' order by staktif asc;"); 
	                    break;

	                    case 'alamat':
	                    $qpegawai  = $connection->query("select * from pegawai where alamat like '$keyword%' order by nama asc;"); 
	                    break;

	                    case 'telpon':
	                    $qpegawai  = $connection->query("select * from pegawai where telpon like '%$keyword%' order by nama asc;"); 
	                    break;

	                    case 'tgllhr':
	                    $qpegawai  = $connection->query("select * from pegawai where tgllhr like '$keyword%' order by nama asc;"); 
	                    break;
	                        
	                    case 'stnikah':
	                    $qpegawai  = $connection->query("select * from pegawai where stnikah like '$keyword%' order by nama asc;"); 
	                    break;

	                    case 'agama':
	                    $qpegawai  = $connection->query("select * from pegawai where agama = '$keyword' order by masakrj asc;"); 
	                    break;

	                    case 'email':
	                    $qpegawai  = $connection->query("select * from pegawai where email like '$keyword%' order by nama asc;"); 
	                    break;

	                    case 'nonpwp':
	                    $qpegawai  = $connection->query("select * from pegawai where nonpwp like '$keyword%' order by nama asc;"); 
	                    break;

	                    case 'nobpjsks':
	                    $qpegawai  = $connection->query("select * from pegawai where nobpjsks = '$keyword' order by lokasi asc;"); 
	                    break;

	                    case 'nobpjstk':
	                    $qpegawai  = $connection->query("select * from pegawai where nobpjstk = '$keyword' order by nama asc;"); 
	                    break;
	                    
	                    case 'semua':
	                    $qpegawai  = $connection->query("select * from pegawai order by nama asc;"); 
	                    break;
	                    }
                	}
                else
					{ 
					if ($filter == "semua")
					    { $qpegawai  = $connection->query("select * from pegawai order by nama asc;"); }
					else
					    { $qpegawai  = $connection->query("select * from pegawai where lokasi ='Karanganyar' order by nama asc;"); }
					}
				if (mysqli_num_rows($qpegawai) > 0)
					{
					while ($aqpegawai = mysqli_fetch_array($qpegawai))
						{
						$counter1 = $counter1+1;
						$ttgljoin[$counter1] = date_create($aqpegawai[5]);
                    	$ttgljoin[$counter1] = date_format($ttgljoin[$counter1],"d-m-Y");
                    	$ttgllhr[$counter1]  = date_create($aqpegawai[20]);
                    	$ttgllhr[$counter1]  = date_format($ttgllhr[$counter1],"d-m-Y");
                    	echo "<tr><td><table align='center' width='100%' border='0' bordercolor='#eeeeee' class='h8'>";
						echo "<tr><td width='3%' align='right'>".$counter1." &nbsp</td>";
						echo "<td width='5%' align='right'>".$aqpegawai[1]." &nbsp</td>";
						echo "<td width='14%'>&nbsp ".$aqpegawai[2]."</td>";
						echo "<td width='8%'>&nbsp ".$aqpegawai[3]."</td>";
						echo "<td width='10%'>&nbsp ".$aqpegawai[4]."</td>";
						echo "<td width='7%'>&nbsp ".$ttgljoin[$counter1]."</td>";
						echo "<td width='8%'>&nbsp ".$aqpegawai[6]."</td>";
						echo "<td width='7%'>&nbsp ".$aqpegawai[7]."</td>";
						echo "<td width='8%'>&nbsp ".$aqpegawai[8]."</td>";
						echo "<td width='8%'>&nbsp ".$aqpegawai[9]."</td>";
						echo "<td width='5%' align='right'>".$aqpegawai[10]." &nbsp</td>";
						echo "<td width='5%' align='right'>".$aqpegawai[11]." &nbsp</td>";
						echo "<td width='4%' align='right'>".$aqpegawai[12]." &nbsp</td>";
						echo "<td width='4%' align='right'>".$aqpegawai[13]." &nbsp</td>";
						echo "<td width='4%'>&nbsp ".$aqpegawai[14]."</td></tr>";
						echo "</table align='center' width='97%' border='1' bordercolor='#eeeeee'></td></tr>";
						echo "<tr><td><table align='center' width='100%' border='0' bordercolor='#eeeeee' class='h8'>";	
						echo "<tr><td width='1%'></td><td width='4%' valign='top'>Alamat</td><td width='1%' valign='top'>:</td><td width='25%' valign='top'>$aqpegawai[17]</td><td width='4%' valign='top'>Tgl.lhr</td><td width='1%' valign='top'>:</td><td width='10%' valign='top'>$ttgllhr[$counter1]</td><td width='6%'>Status Nikah</td><td width='1%' valign='top'>:</td><td width='10%' valign='top'>$aqpegawai[22]</td><td width='4%' valign='top'>Agama</td><td width='1%' valign='top'>:</td><td width='10%' valign='top'>$aqpegawai[23]</td><td width='5%' valign='top'>Email</td><td width='1%' valign='top'>:</td><td valign='top'>$aqpegawai[24]</td></tr>";
		                echo "<tr><td></td><td></td><td></td><td></td><td valign='top'>No.KTP</td><td valign='top'> : </td><td valign='top'>$aqpegawai[21]</td><td valign='top'>No.NPWP</td><td valign='top'> : </td><td valign='top'>$aqpegawai[25]</td><td valign='top'>No.HP</td><td valign='top'> : </td><td valign='top'>$aqpegawai[18]</td><td valign='top'>No.BPJS KS.</td><td valign='top'> : </td><td valign='top'>$aqpegawai[26] &nbsp No.BPJS TK. : $aqpegawai[27] </td></tr>";
						echo "</table align='center' width='97%' border='1' bordercolor='#eeeeee'></td></tr>";
						}
					}
			?>
			</tbody>
		</table>
	</div>
</body>
</html>                                		                            
