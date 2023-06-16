<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../supports/menu.php');
    include ('../supports/cleantext.php');
    include ('../desain/formlinkstyle.html');
    if (isset($submit))
        { include ('../process/absensihr.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<script type="text/javascript">
    function fabsensihr_filterpg(str)
    {
    if (str=="")
      {
      document.getElementById("filterpg").innerHTML="";
      return;
      }
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("filterpg").innerHTML=xmlhttp.responseText;
        }
      }
    xmlhttp.open("GET","../query/qfabsensihr_filterpg.php?filterpg="+str,true);
    xmlhttp.send();
    }
</script>
<title>FORM DATA ABSENSI HARIAN</title>
</head>
<body>
    <br><center><h2>FORM DATA ABSENSI HARIAN</h2></center><br>
    <?php 
        if (isset($message))
            { 
            echo "<script language='javascript'>";
            echo "alert('".$message."');";
            echo "</script>";
            }
    ?>
    <form method="post" action="fabsensihr.php" enctype="multipart/form-data" name="fabsensihr" id="fabsensihr">
    <?php
      if ($slokasi == "All")
        { echo "<table align='center' width='97%' border='0' bgcolor='#ffffff'><tr><td><button name='submit' type='submit' value='sinchronyze' class='btn btn-primary btn-lg btn-block'>SINCHRONYZE DATA ABSENSI</button></td></table>"; }
    ?>
    <table align="center" width="97%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="80%" class="h6">
            <b>PENCARIAN DATA :</b> Periode by Tgl.Absensi : 
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
                </script> &nbsp, ";

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

                              case 'jabatan':
                              echo "<option value='jabatan'>Jabatan</option>"; 
                              break;

                              case 'lokasi':
                              echo "<option value='lokasi'>Lokasi</option>"; 
                              break;

                               case 'stabs':
                               echo "<option value='stabs'>St.Abs</option>"; 
                               break;

                              case 'keterangan':
                              echo "<option value='keterangan'>Keterangan</option>"; 
                              break;

                              case 'stdok':
                              echo "<option value='stdok'>St.Dok</option>"; 
                              break;

                              case 'Tidak Masuk':
                              echo "<option value='Tidak Masuk'>Tidak Masuk</option>"; 
                              break;
                              
                              case 'SPL':
                              echo "<option value='lemburby'>SPL</option>"; 
                              break;

                              case 'Terlambat':
                              echo "<option value='Terlambat'>Terlambat</option>"; 
                              break;

                              case 'Lembur':
                              echo "<option value='Lembur'>Lembur</option>"; 
                              break;
                              }
                            }
                      echo "<option value='kode'>ID</option><option value='nama'>Nama</option><option value='jabatan'>Jabatan</option><option value='lokasi'>Lokasi</option><option value='stabs'>St.Abs</option><option value='keterangan'>Keterangan</option><option value='stdok'>St.Dok</option><option value='Tidak Masuk'>Tidak Masuk</option><option value='lemburby'>SPL</option><option value='Terlambat'>Terlambat</option><option value='Lembur'>Lembur</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='19' maxlength='20' value='".$keyword."' class='h5'>"; }
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

                              case 'jabatan':
                              echo "<option value='jabatan'>Jabatan</option>"; 
                              break;

                              case 'lokasi':
                              echo "<option value='lokasi'>Lokasi</option>"; 
                              break;

                              case 'stabs':
                              echo "<option value='stabs'>St.Abs</option>"; 
                              break;

                              case 'keterangan':
                              echo "<option value='keterangan'>Keterangan</option>"; 
                              break;

                              case 'stdok':
                              echo "<option value='stdok'>St.Dok</option>"; 
                              break;

                              case 'Tidak Masuk':
                              echo "<option value='Tidak Masuk'>Tidak Masuk</option>"; 
                              break;
                              
                              case 'SPL':
                              echo "<option value='lemburby'>SPL</option>"; 
                              break;

                              case 'Terlambat':
                              echo "<option value='Terlambat'>Terlambat</option>"; 
                              break;

                              case 'Lembur':
                              echo "<option value='Lembur'>Lembur</option>"; 
                              break;
                              }
                            }
                      echo "<option value='kode'>ID</option><option value='nama'>Nama</option><option value='jabatan'>Jabatan</option><option value='lokasi'>Lokasi</option><option value='stabs'>St.Abs</option><option value='keterangan'>Keterangan</option><option value='stdok'>St.Dok</option><option value='Tidak Masuk'>Tidak Masuk</option><option value='lemburby'>SPL</option><option value='Terlambat'>Terlambat</option><option value='Lembur'>Lembur</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='19' maxlength='20' placeholder='keyword' class='h5'>"; }
            ?>
            </td><td valign="top"><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button><input type="hidden" name="vcek" value="ok"></td>
        </tr>
    </table><br>
    <?php
      if ($slokasi == "All")
        {
        echo "<table align='center' width='97%' border='0' bgcolor='#ffffff' class='h5'><tr valign='top'>";
        echo "<td width='12%'><input type='text' name='filterpg' size='10' maxlength='10' placeholder='search by name' onKeyPress='fabsensihr_filterpg(this.value)'></td>";
        echo "<td width='25%'><div id='filterpg'><select name='kode' style='width: 350px;'><option>List Pegawai...</option></select></div></td>";
        echo "<td width='15%'><input type='text' name='tglabs' size='9' maxlength='10' value=".date("d-m-Y").">
            <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fabsensihr',
                // input name
                'controlname': 'tglabs' }); 
            </script></td>";
        echo "<td width='10%'>&nbsp <input type='text' name='jammsk' size='6' maxlength='8'></td>";
        echo "<td width='10%'>&nbsp <input type='text' name='jampul' size='6' maxlength='8'></td>";
        echo "<td width='10%'><select name='stabs'><option value='Libur(S)'>Libur(S)</option><option value='Masuk'>Masuk</option><option value='Masuk(C)'>Masuk(C)</option><option value='Paid'>Paid</option><option value='Unpaid'>Unpaid</option><option value='Cuti'>Cuti</option><option value='Sakit'>Sakit</option><option value='Alpha'>Alpha</option></select></td>";
        echo "<td><input type='text' name='keterangan' size='30' maxlength='30'></td>";
        echo "</tr></table>";
        echo "<table align='center' width='97%' border='0' bgcolor='#ffffff'><tr><td width='25%'><button name='submit' type='submit' value='autoalpha' class='btn btn-info btn-lg btn-block btn-sm'>ALPHA CORRECTION</button></td><td width='25%'><button name='submit' type='submit' value='autoholiday' class='btn btn-secondary btn-lg btn-block btn-sm'>HOLIDAY/LIBUR(S) CORRECTION</button></td><td width='25%'><button name='submit' type='submit' value='autocuti' class='btn btn-warning btn-lg btn-block btn-sm'>CUTI CORRECTION</button></td><td><button name='submit' type='submit' value='add' class='btn btn-primary btn-lg btn-block btn-sm'>ADD</button></td></tr></table>";
        echo "<table align='center' width='97%' border='0' bgcolor='#ffffff'><tr><td width='60%'><button name='submit' type='submit' value='update' class='btn btn-warning btn-lg btn-block btn-sm'>Update</button></td><td><button name='submit' type='submit' value='delete' class='btn btn-danger btn-lg btn-block btn-sm'>Delete</button></td></tr></table>"; }
      else { 
        echo "<table align='center' width='97%' border='0' bgcolor='#ffffff'><tr><td width='100%'><button name='submit' type='submit' value='update' class='btn btn-warning btn-lg btn-block btn-sm'>Update</button></td></tr></table>"; }
    ?>
    <div class="table-striped table-hover table-responsive">
        <table align="center" width="140%" border="1" bordercolor="#eeeeee" cellpadding="0" cellspacing="0" class="h9">
            <thead class="btn-primary">
                <tr>
                    <th width="2%">&nbsp No</th>
                    <th width="2%">Updt.</th>
                    <th width="2%">Del.</th>
                    <th width="3%">&nbsp ID</a></th>
                    <th width="7%">&nbsp Nama</a></th>
                    <th width="8%">&nbsp Jabatan</a></th>
                    <th width="4%">&nbsp Lokasi</a></th>
                    <th width="4%">&nbsp Hari</a></th>
                    <th width="5%">&nbsp Tgl.Abs</a></th>
                    <th width="4%">Jam Msk.</a></th>
                    <th width="4%">&nbsp Jam Pul.</a></th>
                    <th width="19%">&nbsp In-Out lain.</a></th>
                    <th width="4%">&nbsp SPL(jam)</a></th>
                    <th width="3%">&nbsp Telat</a></th>
                    <th width="3%">&nbsp L.Dt</a></th>
                    <th width="3%">&nbsp L.Pl.1</a></th>
                    <th width="4%">&nbsp L.Pl.2</a></th>
                    <th width="5%">&nbsp St.Abs</a></th>
                    <th width="9%">&nbsp Keterangan</a></th>
                    <th width="2%">St.D</a></th>
                    <th width="3%">&nbsp Dok.</a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $counter1 = 0;
                if (isset($vcek) and $vcek == "ok")
                    {
                    $pawal  = date_create($pawal);
                    $pawal  = date_format($pawal,"Y-m-d");
                    $pakhir = date_create($pakhir);
                    $pakhir = date_format($pakhir,"Y-m-d");
                    if (isset($keyword) and !empty($keyword)) 
                        { 
                        switch ($filter) {
                            case 'kode':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and kode like '$keyword%' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and kode like '$keyword%' order by tglabs,nama asc;"); }
                                break;

                            case 'nama':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and nama like '%$keyword%' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and nama like '%$keyword%' order by tglabs,nama asc;"); }
                                break;

                            case 'jabatan':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and jabatan = '$keyword' order by tglabs,jabatan asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and jabatan = '$keyword' order by tglabs,jabatan asc;"); }
                                break;

                            case 'lokasi':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$keyword' order by tglabs,lokasi asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' order by tglabs,lokasi asc;"); }
                                break;
                        
                            case 'stabs':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and stabs like '%$keyword%' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and stabs like '%$keyword%' order by tglabs,nama asc;"); }
                                break;

                            case 'stdok':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and stdok like '%$keyword%' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and stdok like '%$keyword%' order by tglabs,nama asc;"); }
                                break;
                                
                            default:
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' order by tglabs,nama asc;"); }
                                break;
                            }
                        }
                    else { 
                        switch ($filter) {
                            case 'Tidak Masuk':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and stabs != 'Masuk' and stabs != 'Masuk(C)' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and stabs != 'Masuk' and stabs != 'Masuk(C)' order by tglabs,nama asc;"); }
                                break;
                        
                            case 'Terlambat':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and telat > 0 order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and telat > 0 order by tglabs,nama asc;"); }
                                break;
                                
                            case 'lemburby':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lemburby > 0 order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and lemburby > 0 order by tglabs,nama asc;"); }
                                break;

                            case 'Lembur':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and ( lemburdt > 0 or lembur1 > 0 or lembur2 > 0 ) order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and ( lemburdt > 0 or lembur1 > 0 or lembur2 > 0 ) order by tglabs,nama asc;"); }
                                break;

                            default:
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and lokasi = '$slokasi' and tglabs <= '$pakhir' order by tglabs,nama asc;"); }  
                                break;
                            }

                        }
                    }
                else
                    { 
                    if ($slokasi == "All")
                      { $qabsensihr = $connection->query("select * from absensihr order by tglabs,nama desc limit 100;"); }
                    else
                      { $qabsensihr = $connection->query("select * from absensihr where lokasi = '$slokasi' order by tglabs,nama desc limit 100;"); }
                    }
                if (mysqli_num_rows($qabsensihr) > 0)
                    {
                    $tottelat     = 0;
                    $totlemburby  = 0;
                    $totlemburdt  = 0;
                    $totlemburpl1 = 0;
                    $totlemburpl2 = 0;
                    while ($aqabsensihr = mysqli_fetch_array($qabsensihr))
                        {
                        $counter1            = $counter1+1;
                        $ttglabs[$counter1]  = date_create($aqabsensihr[6]);
                        $ttglabs[$counter1]  = date_format($ttglabs[$counter1],"d-m-Y");
                        $totlemburby         = $totlemburby + $aqabsensihr[10];
                        $tottelat            = $tottelat + $aqabsensihr[11];
                        $totlemburdt         = $totlemburdt + $aqabsensihr[12];
                        $totlemburpl1        = $totlemburpl1 + $aqabsensihr[13];
                        $totlemburpl2        = $totlemburpl2 + $aqabsensihr[14];
                        echo "<tr height='20'>";
                        echo "<td align='right'>".$counter1." &nbsp<input type='hidden' name='tidxah[$counter1]' value='$aqabsensihr[0]'></td>";
                        echo "<td>&nbsp <input type='checkbox' name='cupdate[$counter1]'></td>";    
                        echo "<td>&nbsp <input type='checkbox' name='cdelete[$counter1]'></td>";
                        echo "<td>&nbsp ".$aqabsensihr[1]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[2]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[3]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[4]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[5]."</td>";
                        echo "<td>&nbsp ".$ttglabs[$counter1]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[7]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[8]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[9]."</td>";
                        if ($aqabsensihr[10]>0)
                            { echo "<td bgcolor='#ffaacc' align='right'><input type='text' name='tlemburby[$counter1]' size='3' maxlength='5' style='text-align:right;' value='".$aqabsensihr[10]."'>"." &nbsp</td>"; }
                        else
                            { echo "<td align='right'><input type='text' name='tlemburby[$counter1]' size='3' maxlength='5'>"." &nbsp</td>"; }
                        if ($aqabsensihr[11]>0)
                            { echo "<td bgcolor='#ffaacc' align='right'>".$aqabsensihr[11]." mnt.&nbsp</td>"; }
                        else
                            { echo "<td></td>"; }
                        if ($aqabsensihr[12]>0)
                            { echo "<td bgcolor='#aaffaa' align='right'>".$aqabsensihr[12]." mnt.&nbsp</td>"; }
                        else
                            { echo "<td></td>"; }
                        if ($aqabsensihr[13]>0)
                            { echo "<td bgcolor='#aaffaa' align='right'>".$aqabsensihr[13]." mnt.&nbsp</td>"; }
                        else
                            { echo "<td></td>"; }
                        if ($aqabsensihr[14]>0)
                            { echo "<td bgcolor='#aaddaa' align='right'>".$aqabsensihr[14]." mnt.&nbsp</td>"; }
                        else
                            { echo "<td></td>"; }
                        switch ($aqabsensihr[15])
                            {
                            case 'Alpha':   
                            echo "<td bgcolor='#ff5555'>";
                            break;

                            case 'Paid':
                            echo "<td bgcolor='#ff9999'>";
                            break;

                            case 'Unpaid':
                            echo "<td bgcolor='#ff7777'>";
                            break;

                            case 'Cuti':
                            echo "<td bgcolor='#ffdddd'>";
                            break;

                            case 'Sakit':
                            echo "<td bgcolor='#ffbbbb'>";
                            break;
                            
                            default :
                            echo "<td>";
                            }
                        echo "&nbsp <select name='tstabs[$counter1]'><option value='$aqabsensihr[15]'>$aqabsensihr[15]</option><option value='Libur(S)'>Libur(S)</option><option value='Masuk'>Masuk</option><option value='Masuk(C)'>Masuk(C)</option><option value='Paid'>Paid</option><option value='Unpaid'>Unpaid</option><option value='Cuti'>Cuti</option><option value='Sakit'>Sakit</option><option value='Alpha'>Alpha</option></select></td>";
                        echo "<td>&nbsp <textarea name='tketerangan[$counter1]' rows='3' cols='30'>$aqabsensihr[16]</textarea></td>";
                        if ($aqabsensihr[17] == "Y")
                            { 
                            echo "<td bgcolor='#ffff66'>&nbsp ".$aqabsensihr[17]."</td>";
                            echo "<td bgcolor='#ffff66'>&nbsp <a href='fdokumen.php?sidxah=$aqabsensihr[0]' target='newwindow''>Dok.</a></td>"; 
                            }
                        else
                            { 
                            echo "<td>&nbsp ".$aqabsensihr[17]."</td>"; 
                            echo "<td></td>";
                            }   
                        echo "</tr>";
                        }
                    echo "<tr height='30' bgcolor='#FFDDEE'><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td bgcolor='#AAAAFF' align='right'><b>".$totlemburby." jam</b>&nbsp</td><td bgcolor='#FFAACC' align='right'><b>".$tottelat." mnt.</b>&nbsp</td><td bgcolor='#AAFFAA' align='right'><b>".$totlemburdt." mnt.</b>&nbsp</td><td bgcolor='#AAFFAA' align='right'><b>".$totlemburpl1." mnt.</b>&nbsp</td><td bgcolor='#AADDAA' align='right'><b>".$totlemburpl2." mnt.</b>&nbsp</td><td></td><td></td><td></td><td></td></tr>";
                    echo "<input type='hidden' name='maxcount' value='$counter1'>";
                    }
                echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
            ?>
            </tbody>
        </table>
    </div>
    <?php
      if ($slokasi == "All")
        { echo "<table align='center' width='97%' border='0' bgcolor='#ffffff'><tr><td width='50%'><button name='submit' type='submit' value='update' class='btn btn-warning btn-lg btn-block'>UPDATE</button></td><td width='20%'><button name='submit' type='submit' value='delete' class='btn btn-danger btn-lg btn-block'>DELETE</button></td></form><form method='post' action='../reports/rabsensihr.php' target='newwindow'><td width='30%'><button name='submit' type='submit' class='btn btn-info btn-lg btn-block'>PRINT</button>"; }    
      else { 
        echo "<table align='center' width='97%' border='0' bgcolor='#ffffff'><tr><td width='50%'><button name='submit' type='submit' value='update' class='btn btn-warning btn-lg btn-block'>UPDATE</button></td></form><form method='post' action='../reports/rabsensihr.php' target='newwindow'><td width='30%'><button name='submit' type='submit' class='btn btn-info btn-lg btn-block'>PRINT</button>"; }  
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