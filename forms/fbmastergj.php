<?php 
	include ('../supports/connection.php');
	include ('../supports/regglobalvar.php');
	include ('../supports/session.php');
	include ('../supports/menu.php');
	include ('../supports/cleantext.php');
	include ('../supports/calmasakrj.php');
	include ('../desain/formlinkstyle.html');
	if (isset($submit))
		{ include ('../process/bmastergj.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM DAFTAR MASTER GAJI PEGAWAI</title>
</head>
<body>
	<br><center><h2>FORM DAFTAR MASTER GAJI PEGAWAI</h2></center><br>
	<form method="post" action="fbmastergj.php" enctype="multipart/form-data" name="fbmastergj" id="fbmastergj">
	<table align="center" width="71%" cellpadding="0" cellspacing="0">
		<tr>
			<td width="66%" class="h5">
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
                	  	       }
                	  	    }
                	    echo "<option value='kode'>ID</option><option value='nama'>Nama</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='20' maxlength='20' value='".$keyword."' class='h5'>"; }
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
                	  	       }
                	  	  }
                      echo "<option value='kode'>ID</option><option value='nama'>Nama</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='20' maxlength='20' placeholder='keyword' class='h5'>"; }
			?>
			</td><td valign="top"><button name="submit_search" type="submit" value="search" class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button></td>
		</tr>
	</table><br>
	<table align="center" width="100%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">New</button></td><td width="40%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">Update</button></td><td><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">Delete</button></td></tr></table>
	<div class="table-striped table-hover table-responsive">
		<table align="center" width="100%" border="1" bordercolor="#eeeeee">
			<thead class="btn-primary">
				<tr>
					<th width="5%" class="h8">&nbsp No</th>
					<th width="6%" class="h8">&nbsp Tgl.Input</a></th>
					<th width="30%" class="h8">&nbsp NIP</a></th>
					<th width="6%" class="h8">&nbsp Gapok.Bl</a></th>
					<th width="5%" class="h8">&nbsp Gapok.Hr</a></th>
					<th width="4%" class="h8">&nbsp UM/Hr</a></th>
					<th width="5%" class="h8">&nbsp UT/Hr</a></th>
					<th width="5%" class="h8">&nbsp Tun.Hdr</a></th>
					<th width="5%" class="h8">&nbsp Tun.Lain</a></th>
					<th width="4%" class="h8">&nbsp BPJSTK</a></th>
					<th width="4%" class="h8">&nbsp BPJSKS</a></th>
					<th width="5%" class="h8">&nbsp PPH21</a></th>
                    <th width="5%" class="h8">&nbsp Unpaid</a></th>
                    <th width="5%" class="h8">&nbsp Terlambat</a></th>
					<th width="3%" class="h8">Upd.</th>
					<th width="3%" class="h8">Del.</th>
				</tr>
			</thead>
		</table>
		<table align="center" width="100%" border="1" bordercolor="#eeeeee" class="h8">
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
						$counter1  = $counter1+1;
						$tglinput  = date_create($aqmastergj[1]);
			            $tglinput  = date_format($tglinput,"d-m-Y");
			            $tglmulpj  = date_create($aqmastergj[13]);
			            $tglmulpj  = date_format($tglmulpj,"d-m-Y");
			            $tgllunas  = date_create($aqmastergj[14]);
			            $tgllunas  = date_format($tgllunas,"d-m-Y");
                        echo "<tr><td><table class='h8' width='100%' border='0' cellpadding='0' cellspacing='0'>";
						echo "<tr height='30'><td align='right' width='5%'><b>".$counter1."</b><input type='hidden' name='tidxmg[$counter1]' value='$aqmastergj[0]'> &nbsp</td>";
						echo "<td width='6%'>&nbsp ".$aqmastergj[1]."</td>";
						echo "<td width='30%'>&nbsp <select name='tkode[$counter1]'><option value='$aqmastergj[2]'>$aqmastergj[2]</option>";
            			$qkode = $connection->query("select kode,nama from pegawai where lokasi != 'Jakarta' order by kode asc;");
            			while($aqkode = mysqli_fetch_array($qkode))
                			{ echo "<option value='$aqkode[0]'>". $aqkode[0] . " || ". $aqkode[1] ."</option>"; }
            			echo "</select></td>";
            			echo "<td width='6%'>&nbsp <input type='text' name='tgpbl[$counter1]' id='tgpbl' style='text-align:right;' onKeyUp='fnumfor_tgpbl(this.value)' size='7' maxlength='10' value='".number_format($aqmastergj[4],0,',','.')."'></td>";
            			echo "<td width='5%'>&nbsp <input type='text' name='tgphr[$counter1]' id='tgapokhr' style='text-align:right;' onKeyUp='fnumfor_tgphr(this.value)' size='4' maxlength='6' value='".number_format($aqmastergj[5],0,',','.')."'></td>";
            			echo "<td width='4%'>&nbsp <input type='text' name='tumhr[$counter1]' id='tumhr' style='text-align:right;' onKeyUp='fnumfor_tumhr(this.value)' size='3' maxlength='5' value='".number_format($aqmastergj[6],0,',','.')."'></td>";
            			echo "<td width='5%'>&nbsp <input type='text' name='tuthr[$counter1]' id='tuthr' style='text-align:right;' onKeyUp='fnumfor_tuthr(this.value)' size='4' maxlength='6' value='".number_format($aqmastergj[7],0,',','.')."'></td>";
            			echo "<td width='5%'>&nbsp <input type='text' name='tthdr[$counter1]' id='tthdr' style='text-align:right;' onKeyUp='fnumfor_tthdr(this.value)' size='3' maxlength='5' value='".number_format($aqmastergj[8],0,',','.')."'></td>";
            			echo "<td width='5%'>&nbsp <input type='text' name='ttlain[$counter1]' id='ttlain' style='text-align:right;' onKeyUp='fnumfor_tlain(this.value)' size='4' maxlength='6' value='".number_format($aqmastergj[9],0,',','.')."'></td>";
            			echo "<td width='4%'>&nbsp <input type='text' name='tbpjstk[$counter1]' id='tbpjstk' style='text-align:right;' onKeyUp='fnumfor_tbpjstk(this.value)' size='3' maxlength='5' value='".number_format($aqmastergj[10],0,',','.')."'></td>";
            			echo "<td width='4%'>&nbsp <input type='text' name='tbpjsks[$counter1]' id='tbpjsks' style='text-align:right;' onKeyUp='fnumfor_tbpjsks(this.value)' size='3' maxlength='5' value='".number_format($aqmastergj[11],0,',','.')."'></td>";
            			echo "<td width='5%'>&nbsp <input type='text' name='tpph21[$counter1]' id='tpph21' style='text-align:right;' onKeyUp='fnumfor_tpph21(this.value)' size='4' maxlength='6' value='".number_format($aqmastergj[12],0,',','.')."'></td>";
            			echo "<td width='5%'>&nbsp <input type='text' name='tnunpaid[$counter1]' id='tnunpaid' style='text-align:right;' onKeyUp='fnumfor_tnunpaid(this.value)' size='4' maxlength='6' value='".number_format($aqmastergj[20],0,',','.')."'></td>";
            			echo "<td width='5%'>&nbsp <input type='text' name='tntelat[$counter1]' id='tntelat' style='text-align:right;' onKeyUp='fntelat_tntelat(this.value)' size='3' maxlength='5' value='".number_format($aqmastergj[21],0,',','.')."'></td>";
            			echo "<td width='3%'>&nbsp <input type='checkbox' name='cupdate[$counter1]'></td>";    
                        echo "<td width='3%'>&nbsp <input type='checkbox' name='cdelete[$counter1]'></td></tr>";
		                echo "</table></td></tr>";
                        echo "<tr><td><table class='h8' width='100%' border='0' cellpadding='0' cellspacing='0'><tr><td width='5.5%'></td><td width='20%'>Nama : ".$aqmastergj[3]."</td><td width='14%'>Tgl.mulai pinjam : <input type='text' name='ttglmulpj[$counter1]' size='8' maxlength='10' value=".$tglmulpj.">
		                	<script language='JavaScript'>
		                    new tcal ({
		                    // form name
		                    'formname': 'fdmastergj',
		                    // input name
		                    'controlname': 'ttglmulpj$counter1'
		                    }); 
		               		</script></td><td width='13%'>Tgl.Pelunasan : <input type='text' name='ttgllunas[$counter1]' size='8' maxlength='10' value=".$tgllunas.">
		                	<script language='JavaScript'>
		                    new tcal ({
		                    // form name
		                    'formname': 'fdmastergj',
		                    // input name
		                    'controlname': 'ttgllunas$counter1'
		                    }); 
		               		</script></td><td width='7.5%'> Jangka : <input type='text' name='tjangkapj[$counter1]' id='tjangkapj$counter1' style='text-align:right;' size='2' maxlength='2' value='$aqmastergj[15]'></td><td width='9%'>Plafon : <input type='text' name='ttotal[$counter1]' id='ttotal$counter1' style='text-align:right;' onKeyUp='fnumfor_ttotal(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[16],0,',','.')."'></td><td width='10%'>Realisasi : <input type='text' name='trealisasi[$counter1]' id='trealisasi$counter1' style='text-align:right;' onKeyUp='fnumfor_trealisasi(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[17],0,',','.')."'></td><td width='8%'>Angsuran : ". number_format($aqmastergj[18],0,',','.') ."</td><td>Sisa : ". number_format($aqmastergj[19],0,',','.') ."</td></tr></table>";
                        echo "</td></tr></table>";
						}
					echo "<input type='hidden' name='maxcount' value='$counter1'>";
					}
				echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
			?>
			</tbody>
		</table>
	</div>
	<table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">New</button></td><td width="40%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">Update</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">Delete</button></td></form><form method="post" action="../reports/rbmastergj.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-info btn-lg btn-block btn-sm">PRINT</button>
	<?php 
		if (isset($filter)) 
            { echo "<input type='hidden' name='filter' value='$filter'>"; }
        if (isset($keyword)) 
            { echo "<input type='hidden' name='keyword' value='$keyword'>"; }
	?>
	</form></td></tr></table>
</body>
</html>                                		                            
