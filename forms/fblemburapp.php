<?php 
	include ('../supports/connection.php');
	include ('../supports/regglobalvar.php');
	include ('../supports/session.php');
	include ('../supports/menu.php');
	include ('../desain/formlinkstyle.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>PAGE BROWSING LEMBUR KARYAWAN</title>
</head>
<body>
	<center><h2>PAGE BROWSING LEMBUR KARYAWAN</h2></center>
	<?php 
		if (isset($message))
		    { 
		    echo "<script language='javascript'>";
      		echo "alert('".$message."');";
      		echo "</script>";
		    }
	      echo "<hr><table width='80%' align='center' border='0'><tr><td width='5%'>NIP</td><td width='2%'>:</td><td width='15%'>".$skode."</td><td width='5%'>Nama</td><td width='2%'>:</td><td width='15%'>".$snama."</td><td width='5%'>Divisi</td><td width='2%'>:</td><td width='15%'>".$sdivisi."</td><td width='5%'>Level</td><td width='2%'>:</td><td>".$slevel."</td></tr></table><hr>";
  ?>
	<form method="post" action="fblemburapp.php" enctype="multipart/form-data" name="fblemburapp" id="fblemburapp">
  <table align="center" width="97%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="92%" class="h6">
            <b>PENCARIAN DATA :</b> Periode by Tgl.Pengajuan Lembur : 
            <?php 
               if (!isset($pawal))
                    { $pawal = date("d-m-Y"); }
                if (!isset($pakhir))
                    { $pakhir = date("d-m-Y"); }
                echo "<input type='text' class='h7' name='pawal' size='9' maxlength='10' value=".$pawal.">
                <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fblemburapp',
                // input name
                'controlname': 'pawal'
                }); 
                </script> to &nbsp";
                echo "<input type='text' class='h7' name='pakhir' size='9' maxlength='10' value=".$pakhir.">
                <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fblemburapp',
                // input name
                'controlname': 'pakhir'
                }); 
                </script> &nbsp, ";

                if (isset($keyword))
                    { echo " Filter pencarian : <select name='filter'>";
                        if (isset($filter))
                           {
                           switch ($filter) {
                               case 'kodeldr':
                               echo "<option value='kode'>ID Leader</option>"; 
                               break;

                               case 'namaldr':
                               echo "<option value='nama'>Nama Leader</option>"; 
                               break;

                               case 'kode':
                               echo "<option value='kode'>ID staff</option>"; 
                               break;

                               case 'nama':
                               echo "<option value='nama'>Nama staff</option>"; 
                               break;
                               }
                            }
                      echo "<option value='kode'>ID</option><option value='nama'>Nama</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='19' maxlength='20' value='".$keyword."' class='h5'>"; }
                else
                    { echo " Filter pencarian : <select name='filter'>";
                      if (isset($filter))
                           {
                           switch ($filter) {
                               case 'kodeldr':
                               echo "<option value='kode'>ID Leader</option>"; 
                               break;

                               case 'namaldr':
                               echo "<option value='nama'>Nama Leader</option>"; 
                               break;

                               case 'kode':
                               echo "<option value='kode'>ID staff</option>"; 
                               break;

                               case 'nama':
                               echo "<option value='nama'>Nama staff</option>"; 
                               break;
                               }
                            }
                      echo "<option value='kode'>ID</option><option value='nama'>Nama</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='19' maxlength='20' placeholder='keyword' class='h5'>"; }
            ?>
            </td><td valign="top"><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button><input type="hidden" name="vcek" value="ok"></td>
        </tr>
    </table>
    <div class="table-striped table-hover table-responsive">
    <table align="center" width="97%" border="0" cellpadding="0" cellspacing="0" class="h7">
        <thead align="center" class="btn-primary">
      			<th width="3%" class='h7'>No</th>
    			<th width="15%" class='h7'>Kadiv.</th>
    			<th width="10%" class='h7'>No.Surat (Status)</th>
    			<th width="6%" class='h7'>Tgl.Pengajuan</th>
    			<th width="15%" class='h7'>Staff</th>	
    			<th width="14%" class='h7'>Tgl/Jam/Lama Lembur</th>
    			<th width="21%" class='h7'>Keterangan</th>	
    			<th width="5%" class='h7'>App.1</th>	
    			<th width="5%" class='h7'>App.2</th>
    			<th width="3%">Detail</th>
                <th width="4%">Report</th>
		</thead>
		<tbody class="h8">
	  <?php
	      $counter = 0;
        // Load setelah filter.
        if (isset($vcek) and $vcek == "ok")
            {
            $pawal  = date_create($pawal);
            $pawal  = date_format($pawal,"Y-m-d");
            $pakhir = date_create($pakhir);
            $pakhir = date_format($pakhir,"Y-m-d");
            switch ($slevel) 
                {
                case 'Hrd':
                if (isset($keyword) and !empty($keyword)) 
                    { 
                    switch ($filter) {
                        case 'kodeldr':
                        $qbrowse  = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kodeldr = '$keyword' order by kodesp asc;"); 
                        break;

                        case 'namaldr':
                        $qbrowse  = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and namaldr like '%$keyword%' order by company asc;"); 
                        break;

                        case 'kode':
                        $qbrowse  = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kode = '$keyword' order by namacu asc;"); 
                        break;

                        case 'nama':
                        $qbrowse  = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and nama like '%$keyword%' order by namasa asc;"); 
                        break;
                        }
                    }
                else 
                    { $qbrowse   = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' order by kodesp asc;"); }
                break;
                
                case 'Kadiv':
                if (isset($keyword) and !empty($keyword)) 
                    { 
                    switch ($filter) {
                        case 'kodeldr':
                        $qbrowse  = $connection->query("select * from lembur where divisi='$sdivisi' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kodeldr = '$keyword' order by kodesp asc;"); 
                        break;

                        case 'namaldr':
                        $qbrowse  = $connection->query("select * from lembur where divisi='$sdivisi' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' and namaldr like '%$keyword%' order by company asc;"); 
                        break;

                        case 'kode':
                        $qbrowse  = $connection->query("select * from lembur where divisi='$sdivisi' and  tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kode = '$keyword' order by namacu asc;"); 
                        break;

                        case 'nama':
                        $qbrowse  = $connection->query("select * from lembur where divisi='$sdivisi' and  tglpeng >= '$pawal' and tglpeng <= '$pakhir' and nama like '%$keyword%' order by namasa asc;"); 
                        break;
                        }
                    }
                else 
                    { $qbrowse   = $connection->query("select * from lembur where  divisi='$sdivisi' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' order by kodesp asc;"); }
                break;

                default:
                if (isset($keyword) and !empty($keyword)) 
                    { 
                    switch ($filter) {
                        case 'kodeldr':
                        $qbrowse  = $connection->query("select * from lembur where kode='$skode' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kodeldr = '$keyword' order by kodesp asc;"); 
                        break;

                        case 'namaldr':
                        $qbrowse  = $connection->query("select * from lembur where kode='$skode' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' and namaldr like '%$keyword%' order by company asc;"); 
                        break;

                        case 'kode':
                        $qbrowse  = $connection->query("select * from lembur where kode='$skode' and  tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kode = '$keyword' order by namacu asc;"); 
                        break;

                        case 'nama':
                        $qbrowse  = $connection->query("select * from lembur where kode='$skode' and  tglpeng >= '$pawal' and tglpeng <= '$pakhir' and nama like '%$keyword%' order by namasa asc;"); 
                        break;
                        }
                    }
                else 
                    { $qbrowse   = $connection->query("select * from lembur where kode='$skode' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' order by kodesp asc;"); }
                break;
                }
            }
        else
        // Load awal.
            { 
            switch ($slevel) {
                case 'Hrd':
                $qbrowse   = $connection->query("select * from lembur order by kode desc limit 100;");
                break;

                case 'Kadiv':
                $qbrowse   = $connection->query("select * from lembur where divisi='$sdivisi' order by kode desc limit 50;");
                break;
              
                default:
                $qbrowse   = $connection->query("select * from lembur where kode='$skode' order by kode desc limit 10;");
                break;
                }
            }
		while ($aqbrowse = mysqli_fetch_array($qbrowse))
			  {
			  $counter ++;
			  $tidxle   = $aqbrowse[0];
			  $dtglpeng = date_create($aqbrowse[3]);
			  $ttglpeng = date_format($dtglpeng,"d-m-Y");
			  $dtgllbr  = date_create($aqbrowse[6]);
			  $ttgllbr  = date_format($dtgllbr,"d-m-Y");
			  switch ($aqbrowse[2]) {
           case 'O':
           $status = "Open";
           break;
                
           case 'A':
           $status = "Approved";
           break;

           case 'R':
           $status = "Reject";
           break;

           default:
           $status = "-";
           break;
           }
			echo "<input type='hidden' name='tidxle' value=".$aqbrowse[0]."><input type='hidden' name='tkodele' value=".$aqbrowse[1].">";            
			echo "<tr height='25'><td align='right'><input type='hidden' name='tidxle[".$counter."]' value=".$aqbrowse[0].">".$counter." &nbsp</td>";
			echo "<td>&nbsp ".$aqbrowse[11]." - ".$aqbrowse[12]." - ".$aqbrowse[13]."</td>";
			echo "<td>&nbsp ".$aqbrowse[1] ." ( ".$status." )</td>";
			echo "<td>&nbsp ".$ttglpeng."</td>";
			echo "<td>&nbsp ".$aqbrowse[4]." - " .$aqbrowse[5]. "</td>";
			echo "<td>&nbsp ".$ttgllbr." | ".$aqbrowse[7]." - ".$aqbrowse[8]." | ".$aqbrowse[9]."</td>";
			echo "<td>&nbsp ".$aqbrowse[10]."</td>";
			echo "<td>&nbsp ".$aqbrowse[14]." ( " .$aqbrowse[15]. " )</td>";
			echo "<td>&nbsp ".$aqbrowse[16]." ( " .$aqbrowse[17]. " )</td>";
			echo "<td><a href='flembur.php?tidxle=$aqbrowse[0]' target='newwindow''>Detail</a></td>"; 
            echo "<td><a href='../reports/rlembur.php?tidxle=$aqbrowse[0]' target='newwindow'>Report</a></td></tr>"; 
			}
		echo "<input type='hidden' name='maxcount' value='".$counter."'><input type='hidden' name='appldrold' value='".$aqbrowse[15]."'><input type='hidden' name='apphrdold' value='".$aqbrowse[17]."'>";
		?>
	</tbody></table></div>
	<table align="center" width="97%" border="0" bgcolor="#ffffff"><tr></form><form method="post" action="../reports/rblemburapp.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn-sm btn-info btn-lg btn-block">PRINT</button>
	<?php 
        echo "<input type='hidden' name='tidxle' value=".$tidxle.">";
?>
</form></td></tr></table>
<?php 
	echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
?>
</body>
</html>