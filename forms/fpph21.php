<?php 
	include ('../supports/connection.php');
	include ('../supports/regglobalvar.php');
	include ('../supports/session.php');
	include ('../supports/menu.php');
	include ('../supports/cleantext.php');
	include ('../supports/calmasakrj.php');
	include ('../desain/formlinkstyle.html');
	if (isset($submit))
		{ include ('../process/pph21.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM DAFTAR RINCIAN PPH21 PEGAWAI</title>
</head>
<body>
	<br><center><h2>FORM DAFTAR RINCIAN PPH21 PEGAWAI</h2></center><br>
	<form method="post" action="fpph21.php" enctype="multipart/form-data" name="fpph21" id="fpph21">
	<table align="center" width="95%" cellpadding="0" cellspacing="0">
		<tr>
			<td width="90%" class="h6">
			<b>PENCARIAN DATA :</b> Periode by Tgl.Input : 
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
	<table align="center" width="95%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">New</button></td><td width="40%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">Update</button></td><td><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">Delete</button></td></tr></table>
	<div class="table-striped table-hover table-responsive">
		<table align="center" width="95%" border="1" bordercolor="#eeeeee" class="h8">
			<thead class="btn-primary">
				<tr>
					<th width="3%" class="h8">&nbsp No</th>
					<th width="8%" class="h8">&nbsp Tgl.Input</a></th>
					<th width="42%" class="h8">&nbsp NIP / Nama</a></th>
					<th width="7%" class="h8">&nbsp PH/tahun</a></th>
					<th width="7%" class="h8">&nbsp PTKP/tahun</a></th>
					<th width="7%" class="h8">&nbsp PKP/tahun</a></th>
					<th width="6%" class="h8">&nbsp Bonus THR</a></th>
					<th width="7%" class="h8">&nbsp PPH21/tahun</a></th>
					<th width="7%" class="h8">&nbsp PPH21/bulan</a></th>
					<th width="3%" class="h8">Upd.</th>
					<th width="3%" class="h8">Del.</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$counter1 = 0;
				if (isset($vkode))
                    { $qpph21  = $connection->query("select * from rinpph21 where kode = '$vkode' order by tglinpp asc;"); }
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
			                    $qpph21  = $connection->query("select * from rinpph21 where tglinpp >= '$pawal' and tglinpp <= '$pakhir' and kode = '$keyword' order by tglinpp,kode asc;"); 
			                    break;

			                    case 'nama':
			                    $qpph21  = $connection->query("select * from rinpph21 where tglinpp >= '$pawal' and tglinpp <= '$pakhir' and nama like '%$keyword%' order by tglinpp,nama asc;"); 
			                    break;
			                    }
		                	}
		                else
							{ $qpph21   = $connection->query("select * from rinpph21 where tglinpp >= '$pawal' and tglinpp <= '$pakhir' order by tglinpp,nama asc;"); }
						}
					else
						{ $qpph21   = $connection->query("select * from rinpph21 order by tglinpp,nama asc limit 100;"); }
					}
				if (mysqli_num_rows($qpph21) > 0)
					{
					while ($aqpph21 = mysqli_fetch_array($qpph21))
						{
						$counter1 = $counter1+1;
						$tglinpp  = date_create($aqpph21[1]);
                        $tglinpp  = date_format($tglinpp,"d-m-Y");
                        echo "<tr height='20'><td align='right'><b>".$counter1."</b><input type='hidden' name='tidxpp[$counter1]' value='$aqpph21[0]'> &nbsp</td>";
						echo "<td><input type='text' name='ttglinpp[$counter1]' size='9' maxlength='10' style='height:20px;' value=".$tglinpp.">
                        <script language='JavaScript'>
                        new tcal ({
                        // form name
                        'formname': 'fpph21',
                        // input name
                        'controlname': 'ttglinpp[$counter1]'
                        }); 
                        </script> &nbsp</td>";
						echo "<td>&nbsp <select name='tkode[$counter1]'><option value='$aqpph21[2]'>$aqpph21[2]</option>";
            			$qkode = $connection->query("select kode,nama from pegawai order by nama asc;");
            			while($aqkode = mysqli_fetch_array($qkode))
                			{ echo "<option value='$aqkode[0]'>". $aqkode[0] . " || ". $aqkode[1] ."</option>"; }
            			echo "</select>&nbsp ".$aqpph21[2] . "||" .$aqpph21[3]."</td>";
            			echo "<td>&nbsp <input type='text' name='tphtahun[$counter1]' id='tphtahun' style='text-align:right;' onKeyUp='fnumfor_tphtahun(this.value)' size='8' maxlength='9' value='".number_format($aqpph21[4],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='text' name='tptkpth[$counter1]' id='tptkpth' style='text-align:right;' onKeyUp='fnumfor_tptkpth(this.value)' size='8' maxlength='9' value='".number_format($aqpph21[6],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='text' name='tpkpth[$counter1]' id='tpkpth' style='text-align:right;' onKeyUp='fnumfor_tpkpth(this.value)' size='8' maxlength='9' value='".number_format($aqpph21[7],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='text' name='tbonthr[$counter1]' id='tbonthr' style='text-align:right;' onKeyUp='fnumfor_tbonthr(this.value)' size='6' maxlength='8' value='".number_format($aqpph21[5],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='text' name='tpphth[$counter1]' id='tpphth' style='text-align:right;' onKeyUp='fnumfor_tpphth(this.value)' size='8' maxlength='9' value='".number_format($aqpph21[8],0,',','.')."'></td>";
            			echo "<td>&nbsp <input type='text' name='tpphbl[$counter1]' id='tpphbl' style='text-align:right;' onKeyUp='fnumfor_tpphbl(this.value)' size='6' maxlength='8' value='".number_format($aqpph21[9],0,',','.')."'></td>";
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
	<table align="center" width="95%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">New</button></td><td width="40%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">Update</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">Delete</button></td></form><form method="post" action="../reports/rpph21.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-info btn-lg btn-block btn-sm">PRINT</button>
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
