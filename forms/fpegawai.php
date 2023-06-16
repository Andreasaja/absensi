<?php 
	include ('../supports/connection.php');
	include ('../supports/regglobalvar.php');
	include ('../supports/session.php');
	include ('../supports/menu.php');
	include ('../supports/cleantext.php');
	include ('../supports/calmasakrj.php');
	include ('../desain/formlinkstyle.html');
	if (isset($submit))
		{ include ('../process/pegawai.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM DATA PEGAWAI</title>
</head>
<body>
	<br><center><h2>FORM DATA PEGAWAI</h2></center><br>
	<form method="post" action="fpegawai.php" enctype="multipart/form-data" name="fpegawai" id="fpegawai">
	<table align="center" width="80%" cellpadding="0" cellspacing="0">
		<tr>
			<td width="65%" class="h5">
			<?php 
				if (isset($keyword))
                    { echo " &nbsp Filter pencarian : <select name='filter'>";
                	    if (isset($filter))
                	  	    {
                	  	    switch ($filter) {
                	  	  	   case 'kode':
                	  	  	   echo "<option value='kode'>ID</option>"; 
                	  	  	   break;

                	  	  	   case 'nama':
                	  	  	   echo "<option value='nama'>Nama</option>"; 
                	  	  	   break;

                	  	  	   case 'perusahaan':
                	  	  	   echo "<option value='perusahaan'>Perusahaan</option>"; 
                	  	  	   break;

                	  	  	   case 'jabatan':
                	  	  	   echo "<option value='jabatan'>Jabatan</option>"; 
                	  	  	   break;

                	  	  	   case 'masakrj':
                	  	  	   echo "<option value='masakrj'>Masa Kerja</option>"; 
                	  	  	   break;

                	  	  	   case 'status':
                	  	  	   echo "<option value='status'>Status</option>"; 
                	  	  	   break;

                	  	  	   case 'grup':
                	  	  	   echo "<option value='grup'>Grup</option>"; 
                	  	  	   break;

                	  	  	   case 'lokasi':
                	  	  	   echo "<option value='lokasi'>Lokasi</option>"; 
                	  	  	   break;

                	  	  	   case 'staktif':
                	  	  	   echo "<option value='staktif'>Aktif</option>"; 
                	  	  	   break;

                	  	  	   case 'alamat':
                	  	  	   echo "<option value='alamat'>Alamat</option>"; 
                	  	  	   break;

                	  	  	   case 'telpon':
                	  	  	   echo "<option value='telpon'>Telpon</option>"; 
                	  	  	   break;

                	  	  	   case 'ttgllhr':
                	  	  	   echo "<option value='ttgllhr'>Tgl.Lahir</option>"; 
                	  	  	   break;

                	  	  	   case 'noktp':
                	  	  	   echo "<option value='noktp'>No.KTP</option>"; 
                	  	  	   break;

                	  	  	   case 'stnikah':
                	  	  	   echo "<option value='stnikah'>Status Nikah</option>"; 
                	  	  	   break;

                	  	  	   case 'agama':
                	  	  	   echo "<option value='agama'>Agama</option>"; 
                	  	  	   break;

                	  	  	   case 'email':
                	  	  	   echo "<option value='email'>Email</option>"; 
                	  	  	   break;

                	  	  	   case 'nonpwp':
                	  	  	   echo "<option value='nonpwp'>No.NPWP</option>"; 
                	  	  	   break;

                	  	  	   case 'nobpjsks':
                	  	  	   echo "<option value='nobpjsks'>No.BPJS KS</option>"; 
                	  	  	   break;

                	  	  	   case 'nobpjstk':
                	  	  	   echo "<option value='nobpjstk'>No.BPJS TK</option>"; 
                	  	  	   break;
                	  	  	   
                	  	  	   case 'semua':
                	  	  	   echo "<option value='semua'>Semua Data</option>"; 
                	  	  	   break;
                	  	       }
                	  	    }
                	    echo "<option value='kode'>ID</option><option value='nama'>Nama</option><option value='perusahaan'>Perusahaan</option><option value='jabatan'>Jabatan</option><option value='masakrj'>Masa Kerja</option><option value='status'>Status</option><option value='grup'>Grup</option><option value='lokasi'>Lokasi</option><option value='staktif'>Aktif</option><option value='alamat'>Alamat</option><option value='telpon'>Telpon</option><option value='ttgllhr'>Tgl.Lahir</option><option value='noktp'>No.KTP</option><option value='stnikah'>Status Nikah</option><option value='agama'>Agama</option><option value='email'>Email</option><option value='nonpwp'>No.NPWP</option><option value='nobpjsks'>No.BPJS KS</option><option value='nobpjstk'>No.BPJS TK</option><option value='semua'>Semua Data</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='20' maxlength='20' value='".$keyword."' class='h5'>"; }
                else
                    { echo " &nbsp Filter pencarian : <select name='filter'>";
                	  if (isset($filter))
                	  	  {
                	  	  switch ($filter) {
                	  	  	   case 'kode':
                	  	  	   echo "<option value='kode'>ID</option>"; 
                	  	  	   break;

                	  	  	   case 'nama':
                	  	  	   echo "<option value='nama'>Nama</option>"; 
                	  	  	   break;

                	  	  	   case 'perusahaan':
                	  	  	   echo "<option value='perusahaan'>Perusahaan</option>"; 
                	  	  	   break;

                	  	  	   case 'jabatan':
                	  	  	   echo "<option value='jabatan'>Jabatan</option>"; 
                	  	  	   break;

                	  	  	   case 'masakrj':
                	  	  	   echo "<option value='masakrj'>Masa Kerja</option>"; 
                	  	  	   break;

                	  	  	   case 'status':
                	  	  	   echo "<option value='status'>Status</option>"; 
                	  	  	   break;

                	  	  	   case 'grup':
                	  	  	   echo "<option value='grup'>Grup</option>"; 
                	  	  	   break;

                	  	  	   case 'lokasi':
                	  	  	   echo "<option value='lokasi'>Lokasi</option>"; 
                	  	  	   break;

                	  	  	   case 'staktif':
                	  	  	   echo "<option value='staktif'>Aktif</option>"; 
                	  	  	   break;

                	  	  	   case 'alamat':
                	  	  	   echo "<option value='alamat'>Alamat</option>"; 
                	  	  	   break;

                	  	  	   case 'telpon':
                	  	  	   echo "<option value='telpon'>Telpon</option>"; 
                	  	  	   break;

                	  	  	   case 'ttgllhr':
                	  	  	   echo "<option value='ttgllhr'>Tgl.Lahir</option>"; 
                	  	  	   break;

                	  	  	   case 'noktp':
                	  	  	   echo "<option value='noktp'>No.KTP</option>"; 
                	  	  	   break;

                	  	  	   case 'stnikah':
                	  	  	   echo "<option value='stnikah'>Status Nikah</option>"; 
                	  	  	   break;

                	  	  	   case 'agama':
                	  	  	   echo "<option value='agama'>Agama</option>"; 
                	  	  	   break;

                	  	  	   case 'email':
                	  	  	   echo "<option value='email'>Email</option>"; 
                	  	  	   break;

                	  	  	   case 'nonpwp':
                	  	  	   echo "<option value='nonpwp'>No.NPWP</option>"; 
                	  	  	   break;

                	  	  	   case 'nobpjsks':
                	  	  	   echo "<option value='nobpjsks'>No.BPJS KS</option>"; 
                	  	  	   break;

                	  	  	   case 'nobpjstk':
                	  	  	   echo "<option value='nobpjstk'>No.BPJS TK</option>"; 
                	  	  	   break;
                	  	  	   
                	  	  	   case 'semua':
                	  	  	   echo "<option value='semua'>Semua Data</option>"; 
                	  	  	   break;
                	  	       }
                	  	  }
                      echo "<option value='kode'>ID</option><option value='nama'>Nama</option><option value='perusahaan'>Perusahaan</option><option value='jabatan'>Jabatan</option><option value='masakrj'>Masa Kerja</option><option value='status'>Status</option><option value='grup'>Grup</option><option value='lokasi'>Lokasi</option><option value='staktif'>Aktif</option><option value='alamat'>Alamat</option><option value='telpon'>Telpon</option><option value='ttgllhr'>Tgl.Lahir</option><option value='noktp'>No.KTP</option><option value='stnikah'>Status Nikah</option><option value='agama'>Agama</option><option value='email'>Email</option><option value='nonpwp'>No.NPWP</option><option value='nobpjsks'>No.BPJS KS</option><option value='nobpjstk'>No.BPJS TK</option><option value='semua'>Semua Data</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='20' maxlength='20' placeholder='keyword' class='h5'>"; }
			?>
			</td><td valign="top"><button name="submit_search" type="submit" value="search" class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button></td>
		</tr>
	</table><br>
	<table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="updmskrj" class="btn btn-secondary btn-lg btn-block btn-sm">Update Masa Kerja</button></td><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">New</button></td><td width="40%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">Update</button></td><td><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">Delete</button></td></tr></table>
	<div class="table-striped table-hover table-responsive">
		<table align="center" width="110%" border="1" bordercolor="#eeeeee">
			<thead class="btn-primary">
				<tr>
					<th width="3%" class="h7">&nbsp No</th>
					<th width="6%" class="h7">&nbsp ID</a></th>
					<th width="14%" class="h7">&nbsp Nama</a></th>
					<th width="5%" class="h7">&nbsp Persh.</a></th>
					<th width="12%" class="h7">&nbsp Jabatan</a></th>
					<th width="7%" class="h7">&nbsp Tgl.Join</a></th>
					<th width="5%" class="h7">&nbsp Masa Krj.</a></th>
					<th width="7%" class="h7">&nbsp Status</a></th>
					<th width="8%" class="h7">&nbsp Grup</a></th>
					<th width="8%" class="h7">&nbsp Lokasi</a></th>
					<th width="4%" class="h7">&nbsp TH</a></th>
					<th width="4%" class="h7">&nbsp TC</a></th>
					<th width="3%" class="h7">&nbsp CT</a></th>
					<th width="3%" class="h7">&nbsp SC</a></th>
					<th width="5%" class="h7">Aktif(Y/T)</a></th>
					<th width="3%" class="h7">&nbsp Upd.</th>
					<th width="3%" class="h7">&nbsp Del.</th>
				</tr>
			</thead>
		</table>
		<table align="center" width="110%" border="1" bordercolor="#eeeeee" class="h8">
			<?php
				$counter1 = 0;
				if (isset($keyword) and !empty($keyword)) {
					switch ($filter) {
	                    case 'kode':
	                    $qpegawai  = $connection->query("select * from pegawai where kode = '$keyword' order by nama asc;"); 
	                    break;

	                    case 'nama':
	                    $qpegawai  = $connection->query("select * from pegawai where nama like '%$keyword%' order by nama asc;"); 
	                    break;

	                    case 'perusahaan':
	                    $qpegawai  = $connection->query("select * from pegawai where perusahaan like '$keyword%' order by nama asc;"); 
	                    break;
	                        
	                    case 'jabatan':
	                    $qpegawai  = $connection->query("select * from pegawai where jabatan like '$keyword%' order by nama asc;"); 
	                    break;

	                    case 'masakrj':
	                    $qpegawai  = $connection->query("select * from pegawai where masakrj = '$keyword' order by masakrj asc;"); 
	                    break;

	                    case 'status':
	                    $qpegawai  = $connection->query("select * from pegawai where status like '$keyword%' order by nama asc;"); 
	                    break;

	                    case 'grup':
	                    $qpegawai  = $connection->query("select * from pegawai where grup like '$keyword%' order by nama asc;"); 
	                    break;

	                    case 'lokasi':
	                    $qpegawai  = $connection->query("select * from pegawai where lokasi = '$keyword' order by lokasi asc;"); 
	                    break;

	                    case 'staktif':
	                    $qpegawai  = $connection->query("select * from pegawai where aktif = '$keyword' order by nama asc;"); 
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
						echo "<tr><td><table class='h8' width='100%' border='0' cellpadding='0' cellspacing='0'><tr>";
						echo "<td align='right' width='3%'><b>".$counter1."</b><input type='hidden' name='tidxpg[$counter1]' value='$aqpegawai[0]'> &nbsp</td>";
						echo "<td width='6%'>&nbsp <input type='text' name='tkode[$counter1]' size='8' maxlength='8' value='".$aqpegawai[1]."'></td>";
						echo "<td width='14%'>&nbsp <input type='text' name='tnama[$counter1]' size='30' maxlength='30' value='".$aqpegawai[2]."'></td>";
						echo "<td width='5%'>&nbsp <select name='tperusahaan[$counter1]'><option value='$aqpegawai[3]'>$aqpegawai[3]</option>";
						$qperusahaan = $connection->query("select name from perusahaan order by name asc;");
						while($aqperusahaan = mysqli_fetch_array($qperusahaan))
							{ echo "<option value='$aqperusahaan[0]'>". $aqperusahaan[0] . "</option>"; }
						echo "</select></td>";
						echo "<td width='12%'>&nbsp <select name='tjabatan[$counter1]'><option value='$aqpegawai[4]'>$aqpegawai[4]</option>";
						$qjabatan  = $connection->query("select name from jabatan order by name asc;");
						while($aqjabatan = mysqli_fetch_array($qjabatan))
							{ echo "<option value='$aqjabatan[0]'>". $aqjabatan[0] . "</option>"; }
						echo "</select></td>";
						echo "<td width='7%'><input type='text' name='ttgljoin[$counter1]' size='9' maxlength='10' value='$ttgljoin[$counter1]'>
		                <script language='JavaScript'>
		                new tcal ({
		                // form name
		                'formname': 'fpegawai',
		                // input name
		                'controlname': 'ttgljoin[$counter1]'
		                }); 
		                </script></td>";
		                echo "<td width='5%'>&nbsp ".$aqpegawai[6]."</td>";
		                if ($aqpegawai[7] == 'New')
		                	{ echo "<td  width='7%' bgcolor='#ff6666'>"; }
		                else
		                	{ echo "<td width='7%'>"; }
		                echo "&nbsp <select name='tstatus[$counter1]' style='width:80px;'><option value='$aqpegawai[7]'>$aqpegawai[7]</option>";
						$qstatus = $connection->query("select name from status order by name asc;");
						while($aqstatus = mysqli_fetch_array($qstatus))
							{ echo "<option value='$aqstatus[0]'>". $aqstatus[0] . "</option>"; }
						echo "</select></td>";
		                echo "<td width='8%'>&nbsp <select name='tgrup[$counter1]'><option value='$aqpegawai[8]'>$aqpegawai[8]</option>";
						$qgrup = $connection->query("select name from grup order by name asc;");
						while($aqgrup = mysqli_fetch_array($qgrup))
							{ echo "<option value='$aqgrup[0]'>". $aqgrup[0] . "</option>"; }
						echo "</select></td>";
						echo "<td width='8%'>&nbsp <select name='tlokasi[$counter1]'><option value='$aqpegawai[9]'>$aqpegawai[9]</option>";
						$qlokasi = $connection->query("select name from lokasi order by name asc;");
						while($aqlokasi = mysqli_fetch_array($qlokasi))
							{ echo "<option value='$aqlokasi[0]'>". $aqlokasi[0] . "</option>"; }
						echo "</select></td>";
						echo "<td width='4%'>&nbsp <input type='text' name='tjumhrkrj[$counter1]' style='text-align:right;' size='2' maxlength='2' value='$aqpegawai[10]'></td>";
						echo "<td width='4%'>&nbsp <input type='text' name='ttotcuti[$counter1]' style='text-align:right;' size='2' maxlength='2' value='$aqpegawai[11]'></td>";
						echo "<td align='right' width='3%'>&nbsp ".$aqpegawai[12]."</td>";
						echo "<td align='right' width='3%'>&nbsp ".$aqpegawai[13]."</td>";
						if ($aqpegawai[14] =='Y')
							{ echo "<td width='5%'>&nbsp <input type='checkbox' name='cstaktif[$counter1]' checked></td>"; }
						else
							{ echo "<td width='5%'>&nbsp <input type='checkbox' name='cstaktif[$counter1]'></td>"; }
						echo "<td width='3%'>&nbsp <input type='checkbox' name='cupdate[$counter1]'></td>";	
						echo "<td width='3%'>&nbsp <input type='checkbox' name='cdelete[$counter1]'></td>";
						echo "</tr></table></td></tr>";
						echo "<tr><td><table width='100%' class='h8'><tr><td width='1%'></td><td width='3%' valign='top'>Foto</td><td width='1%' valign='top'>:</td><td width='25%' valign='top'><a href='fdetfotopeg.php?tidxpg=$aqpegawai[0]' target='newwindow'> <img src='$aqpegawai[19]' width='20' height='20'></a> <input name='tfoto$counter1' type='file' size='60'></td><td width='3%'>Tgl.lhr</td><td width='1%' valign='top'>:</td><td width='8%' valign='top'><input type='text' name='ttgllhr[$counter1]' size='11' maxlength='10' value='$ttgllhr[$counter1]'>
		                <script language='JavaScript'>
		                new tcal ({
		                // form name
		                'formname': 'fpegawai',
		                // input name
		                'controlname': 'ttgllhr[$counter1]'
		                }); 
		                </script></td><td width='5%'>Status Nikah</td><td width='1%' valign='top'>:</td><td width='8%'><select name='tstnikah[$counter1]' style='width:106px;'><option value='$aqpegawai[22]'>$aqpegawai[22]</option><option value='S'>S</option><option value='M'>M</option></select></td><td width='3%' valign='top'>Agama</td><td width='1%' valign='top'>:</td><td width='8%'><select name='tagama[$counter1]' style='width:106px;'><option value='$aqpegawai[23]'>$aqpegawai[23]</option><option value='Islam'>Islam</option><option value='Kristen'>Kristen</option><option value='Katholik'>Katholik</option><option value='Budha'>Budha</option><option value='Hindu'>Hindu</option><option value='Konghucu'>Konghucu</option></select></td><td width='4%' valign='top'>Email</td><td width='1%' valign='top'>:</td><td valign='top'><input type='text' name='temail[$counter1]' size='45' maxlength='50' value='$aqpegawai[24]'></td></tr>";
		                echo "<tr><td></td><td valign='top'>Alamat</td><td valign='top'> : </td><td><input type='text' name='talamat[$counter1]' size='65' maxlength='70' value='$aqpegawai[17]'></td><td>No.KTP</td><td valign='top'> : </td><td><input type='text' name='tnoktp[$counter1]' size='15' maxlength='17' value='$aqpegawai[21]'></td><td>No.NPWP</td><td valign='top'> : </td><td><input type='text' name='tnonpwp[$counter1]' size='15' maxlength='15' value='$aqpegawai[25]'></td><td>No.HP</td><td valign='top'> : </td><td><input type='text' name='ttelpon[$counter1]' size='15' maxlength='15' value='$aqpegawai[18]'></td><td>No.BPJS KS.</td><td valign='top'> : </td><td><input type='text' name='tnobpjsks[$counter1]' size='12' maxlength='15' value='$aqpegawai[26]'> &nbsp No.BPJS TK. : <input type='text' name='tnobpjstk[$counter1]' size='12' maxlength='15' value='$aqpegawai[27]'></td></tr></table></td></tr>";
						}
					echo "<input type='hidden' name='maxcount' value='$counter1'>";
					}
				echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
			?>
			</tbody>
		</table>
	</div>
	<table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">New</button></td><td width="40%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">Update</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">Delete</button></td></form><form method="post" action="../reports/rpegawai.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-info btn-lg btn-block btn-sm">PRINT</button>
	<?php 
		if (isset($filter)) 
            { echo "<input type='hidden' name='filter' value='$filter'>"; }
        if (isset($keyword)) 
            { echo "<input type='hidden' name='keyword' value='$keyword'>"; }
	?>
	</form></td></tr></table>
</body>
</html>                                		                            
