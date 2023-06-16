<?php 
	include ('../supports/connection.php');
	include ('../supports/regglobalvar.php');
	include ('../supports/session.php');
	include ('../supports/menu.php');
	include ('../supports/cleantext.php');
	include ('../supports/calmasakrj.php');
	include ('../desain/formlinkstyle.html');
	if (isset($submit))
		{ include ('../process/pinjaman.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM DAFTAR RINCIAN PINJAMAN PEGAWAI</title>
</head>
<body>
	<br><center><h2>FORM DAFTAR RINCIAN PINJAMAN PEGAWAI</h2></center><br>
	<form method="post" action="fpinjaman.php" enctype="multipart/form-data" name="fpinjaman" id="fpinjaman">
	<table align="center" width="97%" cellpadding="0" cellspacing="0">
		<tr>
			<td width="92%" class="h6">
			<b>PENCARIAN DATA :</b> Periode by Tgl.Bayar : 
			<?php 
                if (!isset($pawal))
                    { $pawal = date("d-m-Y"); }
                if (!isset($pakhir))
                    { $pakhir = date("d-m-Y"); }
                echo "<input type='text' class='h7' name='pawal' size='9' maxlength='10' value=".$pawal.">
                <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fabsensihr',
                // input name
                'controlname': 'pawal'
                }); 
                </script> to &nbsp";
                echo "<input type='text' class='h7' name='pakhir' size='9' maxlength='10' value=".$pakhir.">
                <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fabsensihr',
                // input name
                'controlname': 'pakhir'
                }); 
                </script> , ";

				if (isset($keyword))
                    { echo " Filter pencarian : <select name='filter'>";
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
                	    echo "<option value='kode'>ID</option><option value='nama'>Nama</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='25' maxlength='30' value='".$keyword."' class='h5'>"; }
                else
                    { echo " Filter pencarian : <select name='filter'>";
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
                      echo "<option value='kode'>ID</option><option value='nama'>Nama</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='25' maxlength='30' placeholder='keyword' class='h5'>"; }
			?>
			</td><td valign="top"><button name="submit_search" type="submit" value="search" class="btn-sm btn-secondary btn-lg btn-block">S E A R C H</button><input type="hidden" name="vcek" value="ok"></td>
		</tr></table><br>
	<table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">New</button></td><td width="40%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">Update</button></td><td><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">Delete</button></td></tr></table>
	<div class="table-striped table-hover table-responsive">
		<table align="center" width="97%" border="1" bordercolor="#eeeeee" class="h8">
			<thead class="btn-primary">
				<tr>
					<th width="3%" class="h8">&nbsp No</th>
					<th width="22%" class="h8">&nbsp NIP / Nama</a></th>
					<th width="8%" class="h8">&nbsp Tgl.Mulai</a></th>
                    <th width="8%" class="h8">&nbsp Tgl.Pelunasan</a></th>
                    <th width="4%" class="h8">Jangka</a></th>
                    <th width="6.5%" class="h8">&nbsp Plafon</a></th>
                    <th width="7%" class="h8">&nbsp Realisasi</a></th>
					<th width="8%" class="h8">&nbsp Tgl.Bayar</a></th>
					<th width="5%" class="h8">Ang.ke-</a></th>
					<th width="6%" class="h8">&nbsp Nominal</a></th>
					<th width="6.5%" class="h8">&nbsp Sudah Bayar</a></th>
					<th width="7%" class="h8">&nbsp Kurang Bayar</a></th>
					<th width="3%" class="h8">Upd.</th>
					<th width="3%" class="h8">Del.</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$counter1 = 0;
                if (isset($vkode))
                    { $qpinjaman  = $connection->query("select * from pinjaman where kode = '$vkode' order by tglbayar asc;"); }
                else
                    {
    				if (isset($vcek) and $vcek == "ok")
                        {
                        $pawal  = date_create($pawal);
                        $pawal  = date_format($pawal,"Y-m-d");
                        $pakhir = date_create($pakhir);
                        $pakhir = date_format($pakhir,"Y-m-d");
    					if (isset($keyword) and !empty($keyword)) {
    						switch ($filter) {
    		                    case 'kode':
    		                    $qpinjaman  = $connection->query("select * from pinjaman where tglbayar >= '$pawal' and tglbayar <= '$pakhir' and kode = '$keyword' order by tglbayar,kode asc;"); 
    		                    break;

    		                    case 'nama':
    		                    $qpinjaman  = $connection->query("select * from pinjaman where tglbayar >= '$pawal' and tglbayar <= '$pakhir' and nama like '%$keyword%' order by tglbayar,nama asc;"); 
    		                    break;
    		                    }
    	                	}
    	                else
    						{ $qpinjaman   = $connection->query("select * from pinjaman where tglbayar >= '$pawal' and tglbayar <= '$pakhir' order by tglbayar,nama asc;"); }
    					}
    				else
    					{ $qpinjaman   = $connection->query("select * from pinjaman order by tglbayar,nama asc limit 100;"); }
                    }
				if (mysqli_num_rows($qpinjaman) > 0)
					{
					while ($aqpinjaman = mysqli_fetch_array($qpinjaman))
						{
						$counter1 = $counter1+1;
						$tglmulai  = date_create($aqpinjaman[3]);
                        $tglmulai  = date_format($tglmulai,"d-m-Y");
                        $tgllunas  = date_create($aqpinjaman[4]);
                        $tgllunas  = date_format($tgllunas,"d-m-Y");
                        $tglbayar  = date_create($aqpinjaman[8]);
                        $tglbayar  = date_format($tglbayar,"d-m-Y");
                        echo "<tr height='20'><td align='right'><b>".$counter1."</b><input type='hidden' name='tidxpj[$counter1]' value='$aqpinjaman[0]'> &nbsp</td>";
						echo "<td>&nbsp ".$aqpinjaman[1] . "||" .$aqpinjaman[2]."</td>";
            			echo "<td><input type='text' name='ttglmulai[$counter1]' size='9' maxlength='10' style='height:20px;' value=".$tglmulai.">
                        <script language='JavaScript'>
                        new tcal ({
                        // form name
                        'formname': 'fpinjaman',
                        // input name
                        'controlname': 'ttglmulai[$counter1]'
                        }); 
                        </script> &nbsp</td>";
                        echo "<td><input type='text' name='ttgllunas[$counter1]' size='9' maxlength='10' style='height:20px;' value=".$tgllunas.">
                        <script language='JavaScript'>
                        new tcal ({
                        // form name
                        'formname': 'fpinjaman',
                        // input name
                        'controlname': 'ttgllunas[$counter1]'
                        }); 
                        </script> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tjangka[$counter1]' id='tjangka' style='text-align:right;' size='1' maxlength='2' value='".$aqpinjaman[5]."'></td>";
                        echo "<td>&nbsp <input type='text' name='ttotal[$counter1]' id='ttotal' style='text-align:right;' onKeyUp='fnumfor_ttotal(this.value)' size='8' maxlength='9' value='".number_format($aqpinjaman[6],0,',','.')."'></td>";
                        echo "<td>&nbsp <input type='text' name='trealisasi[$counter1]' id='trealisasi' style='text-align:right;' onKeyUp='fnumfor_trealisasi(this.value)' size='8' maxlength='9' value='".number_format($aqpinjaman[7],0,',','.')."'></td>";
            			echo "<td><input type='text' name='ttglbayar[$counter1]' size='9' maxlength='10' style='height:20px;' value=".$tglbayar.">
                        <script language='JavaScript'>
                        new tcal ({
                        // form name
                        'formname': 'fpinjaman',
                        // input name
                        'controlname': 'ttglbayar[$counter1]'
                        }); 
                        </script> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tnomorang[$counter1]' id='tnomorang' style='text-align:right;' onKeyUp='fnumfor_tbayar(this.value)' size='2' maxlength='2' value='".number_format($aqpinjaman[9],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='text' name='tbayar[$counter1]' id='tbayar' style='text-align:right;' onKeyUp='fnumfor_tbayar(this.value)' size='7' maxlength='8' value='".number_format($aqpinjaman[10],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='text' name='ttitip[$counter1]' id='ttitip' style='text-align:right;' onKeyUp='fnumfor_ttitip(this.value)' size='8' maxlength='9' value='".number_format($aqpinjaman[11],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='text' name='tsisa[$counter1]' id='tsisa' style='text-align:right;' onKeyUp='fnumfor_tsisa(this.value)' size='8' maxlength='9' value='".number_format($aqpinjaman[12],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='checkbox' name='cupdate[$counter1]'></td>";    
                        echo "<td>&nbsp <input type='checkbox' name='cdelete[$counter1]'></td></tr>";
						}
					echo "<input type='hidden' name='maxcount' value='$counter1'>";
					}
				echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
			?>
			</tbody>
		</table>
	</div>
	<table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">New</button></td><td width="40%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">Update</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">Delete</button></td></form><form method="post" action="../reports/rpinjaman.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-info btn-lg btn-block btn-sm">PRINT</button>
	<?php 
		if (isset($vcek)) 
        	{ echo "<input type='hidden' name='vcek' value='$vcek'>"; }
      	if (isset($filter)) 
        	{ echo "<input type='hidden' name='filter' value='$filter'>"; }
      	if (isset($keyword)) 
        	{ echo "<input type='hidden' name='keyword' value='$keyword'>"; }
      	if (isset($pawal)) 
        	{ echo "<input type='hidden' name='pawal' value='$pawal'>"; }
      	if (isset($pakhir)) 
        	{ echo "<input type='hidden' name='pakhir' value='$pakhir'>"; }
	?>
	</form></td></tr></table>
</body>
</html>                                		                            
