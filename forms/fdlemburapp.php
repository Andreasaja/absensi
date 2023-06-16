<?php 
  include ('../supports/connection.php');
  include ('../supports/regglobalvar.php');
  include ('../supports/session.php');
  include ('../supports/menu.php');
  include ('../desain/formlinkstyle.html');
  if (isset($submit))
      { include ('../process/dlemburapp.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM APPROVAL LEMBUR KARYAWAN</title>
</head>
<body>
  <center><h2>FORM APPROVAL LEMBUR KARYAWAN</h2></center>
  <?php 
    if (isset($message))
        { 
        echo "<script language='javascript'>";
        echo "alert('".$message."');";
        echo "</script>";
        }
  ?>
  <form method="post" action="fdlemburapp.php" enctype="multipart/form-data" name="fdlemburapp" id="fdlemburapp"><hr>
  <?php
      echo "<table width='80%' align='center' border='0'><tr><td width='5%'>NIP</td><td width='2%'>:</td><td width='10%'>".$skode."</td><td width='5%'>Nama</td><td width='2%'>:</td><td width='30%'>".$snama."</td><td width='5%'>Divisi</td><td width='2%'>:</td><td width='10%'>".$sdivisi."</td><td width='5%'>Level</td><td width='2%'>:</td><td>".$slevel."</td></tr></table>";
  ?>
  <hr>
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
                'formname': 'fdlemburapp',
                // input name
                'controlname': 'pawal'
                }); 
                </script> to &nbsp";
              echo "<input type='text' class='h7' name='pakhir' size='9' maxlength='10' value=".$pakhir.">
                <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fdlemburapp',
                // input name
                'controlname': 'pakhir'
                }); 
                </script> &nbsp, ";

              if (isset($keyword))
                  { 
                  echo " Filter pencarian : <select name='filter'>";
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
                  echo "<option value='kode'>ID</option><option value='nama'>Nama</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='19' maxlength='20' value='".$keyword."' class='h5'>";
                  }
              else
                  { 
                  echo " Filter pencarian : <select name='filter'>";
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
                      echo "<option value='kode'>ID</option><option value='nama'>Nama</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='19' maxlength='20' placeholder='keyword' class='h5'>"; 
                  }
          ?>
            </td><td valign="top"><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button><input type="hidden" name="vcek" value="ok"></td>
        </tr>
  </table>
  <div class="table-striped table-hover table-responsive">
  <table align="center" width="100%" border="0" bgcolor="#ffffff" cellpadding="0" cellspacing="0">
      <thead class="btn-primary">
          <tr height="30" class='h8'>
              <th width="3%">No</th>
              <th width="6%">No.Surat</th>
              <th width="4%">Status</th>
              <th width="5.5%">Tgl.Pengajuan </th>
              <th width="5%">NIP</th> 
              <th width="14%">Nama</th> 
              <th width="5.5%">Tgl.Lembur</th>
              <th width="15">Jam Lembur</th>
              <th width="19%">Keterangan</th> 
              <th width="2%">App.1 </th>  
              <th width="4%">Nama</th>
              <th width="2%">App.2 </th>
              <th width="4%">Nama</th>
              <th width="2.5%">Upd.</th>
              <th width="2.5%">Del.</th>
              <th width="3.5%">Detail</th>
              <th width="3.5%">Report</th>
          </tr>
      </thead>
      <tbody class='h8'>
      <?php
          $counter     = 0;
          $pawal  = date_create($pawal);
          $pawal  = date_format($pawal,"Y-m-d");
          $pakhir = date_create($pakhir);
          $pakhir = date_format($pakhir,"Y-m-d");
          if ($slevel == "Hrd")
              {
              if (isset($keyword) and !empty($keyword)) 
                  { 
                  if ($filter == "kode")
                      { $qlembur = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and status='P' and appldr='Y' and apphrd='T' and kode like '%$keyword%';"); }
                  else
                      { $qlembur = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and status='P' and appldr='Y' and apphrd='T' and nama like '%$keyword%';"); }
                  }
              else
                  { $qlembur = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and status='P' and appldr='Y' and apphrd='T';"); }
              }
          else
              {
              if (isset($keyword) and !empty($keyword)) 
                  { 
                  if ($filter == "kode")
                      { $qlembur = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and divisi='$sdivisi' and status='P' and appldr='T' and kode like '%$keyword%';"); }
                  else
                      { $qlembur = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and divisi='$sdivisi' and status='P' and appldr='T' and nama like '%$keyword%';"); }
                  }
              else
                  { $qlembur = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and divisi='$sdivisi' and status='P' and appldr='T';"); } 
              }
          while ($aqlembur = mysqli_fetch_array($qlembur))
              {
              $counter++;
              $nidxle   = $aqlembur[0];
              $dtglpeng = date_create($aqlembur[3]);
              $ttglpeng = date_format($dtglpeng,"d-m-Y");
              $dtgllbr  = date_create($aqlembur[6]);
              $ttgllbr  = date_format($dtgllbr,"d-m-Y");
              switch ($aqlembur[2]) {
                  case 'O':
                  $status = "Open";
                  break;

                  case 'P':
                  $status = "Process";
                  break;
                    
                  case 'A':
                  $status = "Approved";
                  break;

                  case 'Reject':
                  $status = "Reject";
                  break;

                  default:
                  $status = "-";
                  break;
                  }
              echo "<tr><td align='right'><input type='hidden' name='tidxle[".$counter."]' value=".$aqlembur[0].">".$counter." .&nbsp</td>";
              echo "<td>&nbsp ".$aqlembur[1]."</td>";
              echo "<td><select name='tstatus[$counter]'><option value='".$status."'>".$status."</option><option value='Reject'>Reject</option></select></td>";
              echo "<td>&nbsp ".$aqlembur[3]."</td>";
              echo "<td>&nbsp ".$aqlembur[4]."</td>";
              echo "<td>&nbsp ".$aqlembur[5]."</td>";
              echo "<td>&nbsp ".$aqlembur[6]."</td>";
              echo "<td><select name='tjammul[$counter]'><option value='".$aqlembur[7]."'>".$aqlembur[7]."</option><option value='15.00'>15.00</option><option value='16.00'>16.00</option><option value='17.00'>17.00</option></select> sd <select name='tjamsel[$counter]'><option value='".$aqlembur[8]."'>".$aqlembur[8]."</option><option value='17.00'>17.00</option><option value='18.00'>18.00</option><option value='19.00'>19.00</option></select> <b>( ".$aqlembur[9]." jam )</b><br></td>";
              echo "<td>&nbsp <textarea name='tnoteslbr[$counter]' rows='2' cols='45'>".$aqlembur[10]."</textarea></td>";
              if ($slevel == "Kadiv")
                  {
                  if ($aqlembur[14]=="Y")
                      { echo "<td>&nbsp <input type='checkbox' name='cappldr[$counter]' value='$aqlembur[14]' checked></td>"; }
                  else
                      { echo "<td>&nbsp <input type='checkbox' name='cappldr[$counter]' value='$aqlembur[14]'></td>"; }
                  }
              else
                  {
                  if ($aqlembur[14]=="Y")
                      { echo "<td>&nbsp <input type='checkbox' name='cappldr[$counter]' value='$aqlembur[14]' checked disabled></td>"; }
                  else
                      { echo "<td>&nbsp <input type='checkbox' name='cappldr[$counter]' value='$aqlembur[14]' disabled></td>"; }
                  }
              echo "<td>&nbsp ".$aqlembur[15]."</td>"; 
              if ($slevel == "Hrd")
                  {
                  if ($aqlembur[16]=="Y")
                      { echo "<td>&nbsp <input type='checkbox' name='capphrd[$counter]' value='$aqlembur[16]' checked></td>"; }
                  else
                      { echo "<td>&nbsp <input type='checkbox' name='capphrd[$counter]' value='$aqlembur[16]'></td>"; }
                  }
              else
                   if ($aqlembur[16]=="Y")
                      { echo "<td>&nbsp <input type='checkbox' name='capphrd[$counter]' value='$aqlembur[16]' checked disabled></td>"; }
                  else
                      { echo "<td>&nbsp <input type='checkbox' name='capphrd[$counter]' value='$aqlembur[16]' disabled></td>"; }
              echo "<td>&nbsp ".$aqlembur[17]."</td>";
              // Jika data sudah di Cek maka tidak bisa diubah
              echo "<input type='hidden' name='appldrold[$counter]' value='$aqlembur[14]'>";
              echo "<input type='hidden' name='apphrdold[$counter]' value='$aqlembur[16]'>";
              echo "<td>&nbsp <input type='checkbox' name='cupd[$counter]'></td>";    
              echo "<td>&nbsp <input type='checkbox' name='cdel[$counter]'></td>";
              echo "<td>&nbsp <a href='flembur.php?tidxle=$aqlembur[0]' target='newwindow''>Detail</a></td>"; 
              echo "<td>&nbsp <a href='../reports/rlembur.php?tidxle=$aqlembur[0]' target='newwindow''>Report</a></td></tr>"; 
              }
              echo "<input type='hidden' name='maxcount' value='".$counter."'><input type='hidden' name='appldrold' value='".$aqlembur[15]."'><input type='hidden' name='apphrdold' value='".$aqlembur[17]."'>";
      ?>
  </tbody></table></div>  
  <table align="center" width="99%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="update" class="btn-sm btn-warning btn-lg btn-block" onClick="javascript: return confirm('Apakah anda benar-benar akan meng-update data ini?');">Update</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn-sm btn-danger btn-lg btn-block" onClick="javascript: return confirm('Apakah anda benar-benar akan meng-hapus data ini?');">Delete</button></td></form><form method="post" action="../reports/rdlemburapp.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn-sm btn-info btn-lg btn-block">PRINT</button>
  </form></td></tr></table>
  <?php 
       echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
  ?>
</body>
</html>