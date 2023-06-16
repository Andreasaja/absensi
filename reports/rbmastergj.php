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
<title>REPORT DAFTAR MASTER GAJI PEGAWAI</title>
</head>
<body>
	<br><center><h2>REPORT DAFTAR MASTER GAJI PEGAWAI</h2></center><br>
	<div class="table-striped table-responsive">
		<table align="center" width="97%" border="1" bordercolor="#eeeeee" class="h9">
			<thead align="center">
				<tr>
					<th width="3%">&nbsp No</th>
					<th width="5%">Tgl.Input</a></th>
					<th width="4%">&nbsp NIP</a></th>
					<th width="15%">&nbsp Nama</a></th>
					<th width="5%">&nbsp Gapok.Bl</a></th>
					<th width="4%">Gapok.Hr</a></th>
					<th width="3%">&nbsp Um.Hr</a></th>
					<th width="3%">&nbsp Ut.Hr</a></th>
					<th width="4%">&nbsp Tun.Hdr</a></th>
					<th width="4%">&nbsp Tun.Lain</a></th>
					<th width="3.5%">&nbsp BPJSTK</a></th>
					<th width="3.5%">&nbsp BPJSKS</a></th>
					<th width="4%">&nbsp PPH21</a></th>
					<th width="4%">&nbsp Unpaid</a></th>
                    <th width="4%">Terlambat</a></th>
					<th width="5%">Tgl.Mul.Pin</a></th>
					<th width="5%">Tgl.Pelunasan</a></th>
					<th width="2%">Jk.</a></th>
					<th width="4.5%">&nbsp Plafon</a></th>
					<th width="4.5%">&nbsp Realisasi</a></th>
					<th width="3.5%">Angsuran</a></th>
					<th width="4.5%">&nbsp Sisa</a></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$counter1 = 0;
				if (isset($keyword) and !empty($keyword)) {
					switch ($filter) {
	                    case 'kode':
	                    $qmastergj  = $connection->query("select * from mastergj where kode = '$keyword' order by kode asc;"); 
	                    break;

	                    case 'nama':
	                    $qmastergj  = $connection->query("select * from mastergj where nama like '%$keyword%' order by nama asc;"); 
	                    break;
	                    }
                	}
                else
					{ $qmastergj   = $connection->query("select * from mastergj order by nama asc;"); }
				if (mysqli_num_rows($qmastergj) > 0)
					{
					while ($aqmastergj = mysqli_fetch_array($qmastergj))
						{
						$counter1 = $counter1+1;
						$tglinput = date_create($aqmastergj[1]);
                        $tglinput = date_format($tglinput,"d-m-Y");
                        $tglmulpj = date_create($aqmastergj[13]);
                        $tglmulpj = date_format($tglmulpj,"d-m-Y");
                        $tgllunas = date_create($aqmastergj[14]);
                        $tgllunas = date_format($tgllunas,"d-m-Y");
                    	echo "<tr><td align='right'>".$counter1." &nbsp</td>";
                    	echo "<td>&nbsp ".$tglinput."</td>";
                    	echo "<td>&nbsp ".$aqmastergj[2]."</td>";
                    	echo "<td>&nbsp ".$aqmastergj[3]."</td>";
						echo "<td align='right'>".number_format($aqmastergj[4],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[5],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[6],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[7],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[8],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[9],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[10],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[11],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[12],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[20],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[21],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".$tglmulpj." &nbsp</td>";
						echo "<td align='right'>".$tgllunas." &nbsp</td>";
						echo "<td align='right'>".$aqmastergj[15]." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[16],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[17],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[18],0,',','.')." &nbsp</td>";
						echo "<td align='right'>".number_format($aqmastergj[19],0,',','.')." &nbsp</td>";
						}
					}
			?>
			</tbody>
		</table>
	</div>
</body>
</html>                                		                            
