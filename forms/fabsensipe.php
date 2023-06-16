<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../supports/menu.php');
    include ('../supports/cleantext.php');
    include ('../desain/formlinkstyle.html');
    if (isset($submit))
        { include ('../process/absensipe.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM DATA ABSENSI PERIODIKAL</title>
</head>
<body>
    <br><center><h2>FORM DATA ABSENSI PERIODIKAL</h2></center><br>
    <?php 
        if (isset($message))
            { 
            echo "<script language='javascript'>";
            echo "alert('".$message."');";
            echo "</script>";
            }
    ?>
    <form method="post" action="fabsensipe.php" enctype="multipart/form-data" name="fabsensipe" id="fabsensipe">
    <table align="center" valign="center" width="97%" border="0" cellspacing="0" cellspacing="0">
        <tr>
            <td width="25%" class="h6"> 
            <?php 
                if (!isset($pawal))
                    { $pawal = date("d-m-Y"); }
                else
                    { 
                    $pawal  = date_create($pawal);  
                    $pawal  = date_format($pawal,"d-m-Y"); 
                    }
                if (!isset($pakhir))
                    { $pakhir = date("d-m-Y"); }
                else
                    { 
                    $pakhir  = date_create($pakhir);        
                    $pakhir  = date_format($pakhir,"d-m-Y"); 
                    }
                echo "<input type='text' class='h6' name='pawal' size='9' maxlength='10' value=".$pawal.">
                <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fabsensipe',
                // input name
                'controlname': 'pawal'
                }); 
                </script> to &nbsp";
                echo "<input type='text' class='h6' name='pakhir' size='9' maxlength='10' value=".$pakhir.">
                <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fabsensipe',
                // input name
                'controlname': 'pakhir'
                }); 
                </script>";
            ?>
            </td><td width="30%"><button name="submit" type="submit" value="rekapabsensi" class="btn btn-warning btn-lg btn-sm btn-block">REKAP DATA ABSENSI</button></td><td><button name="submit" type="submit" value="rekaprinciabsensi" class="btn btn-primary btn-lg btn-sm btn-block">REKAP RINCI DATA ABSENSI</button></td>
        </tr>
    </table><br>
    <table align="center" width="97%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="75%" class="h6">
            <b>PENCARIAN DATA</b> : <select name="tjenis"><option value="pokok">Pokok</option><option value="rinci">Rinci</option></select> Periode : 
            <?php 
                echo "<select name='tperiode'>";
                $qperiode  = $connection->query("select periode from tperiode;");
                while($aqperiode = mysqli_fetch_array($qperiode))
                    { echo "<option value='$aqperiode[0]'>". $aqperiode[0] . "</option>"; }
                echo "</select>";

                if (isset($keyword))
                    { echo ", Filter : <select name='filter'><option value='kode'>ID</option><option value='nama'>Nama</option><option value='jabatan'>Jabatan</option><option value='lokasi'>Lokasi</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='17' maxlength='17' value='".$keyword."' class='h5'>"; }
                else
                    { echo ", Filter : <select name='filter'><option value='kode'>ID</option><option value='nama'>Nama</option><option value='jabatan'>Jabatan</option><option value='lokasi'>Lokasi</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='17' maxlength='17' placeholder='keyword' class='h5'>"; }
            ?>
            </td><td valign="top"><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button><input type="hidden" name="vcek" value="ok"></td>
        </tr>
    </table><br>
    <?php 
    if (isset($tjenis) and $tjenis == "rinci")
        {
    ?>
        <div class="table-striped table-hover table-responsive">
    <?php
        if (isset($tperiode))
            {
            if (isset($keyword) and !empty($keyword)) 
                { 
                switch ($filter) 
                    {
                    case 'kode':
                    $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where kode like '%$keyword%' and staktif='Y' order by kode asc;"); 
                    break;

                    case 'nama':
                    $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where nama like '%$keyword%' and staktif='Y' order by nama asc;"); 
                    break;

                    case 'jabatan':
                    $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan from pegawai where jabatan like '%$keyword%' and staktif='Y' order by jabatan asc;"); 
                    break;

                    case 'lokasi':
                    $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where lokasi like '%$keyword%' and staktif='Y' order by jabatan asc;"); 
                    break;
                    }
                }
            else 
                { $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where staktif='Y' order by nama asc;"); }
            }
        else
            { $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where staktif='Y' order by nama asc;"); }
        $counter1=0;
        if (mysqli_num_rows($qpegawai) > 0)
            {
            while ($aqpegawai = mysqli_fetch_array($qpegawai))
                {
                $counter1 = $counter1+1;
                $tjabatan = $aqpegawai[3];
                echo "<table border='0' align='center' width='97%' bgcolor='#CCFFDD' class='h6'><tr height='20'><td width='5%' align='right'>".$counter1." . </td><td width='10%'>&nbsp NIP : ".$aqpegawai[0]."</td><td width='25%'>&nbsp Nama : ".$aqpegawai[1]."</td><td width='12%'>&nbsp Perusahaan : ".$aqpegawai[2]."</td><td width='35%'>&nbsp Jabatan : ".$tjabatan."</td><td>&nbsp Lokasi : ".$aqpegawai[4]."</td></tr></table>";
                $qrabsensipe = $connection->query("select * from rinabsensipe where periode='$tperiode' and kode='$aqpegawai[0]' order by kode,tglabs asc;");
                $counter2  = 0;
                $totlbrby  = 0;
                $tottelat  = 0;
                $totlbrdt  = 0;
                $totlbr1   = 0;
                $totlbr2   = 0;
                $totpaid   = 0;
                $totunpaid = 0;
                echo "<table align='center' width='97%' border='0' bordercolor='#eeeeee' class='h8'><thead class='btn-primary'><tr><td width='5%'>No.</td><td width='13%'>Periode</td><td width='5%'>Hari</td><td width='7%'>Tanggal</td><td width='5%'>Jam Msk</td><td width='5%'>Jam Pul</td><td width='5%'>SPL</td><td width='5%'>Telat</td><td width='5%'>Lbr.Dt.</td><td width='5%'>Lbr.1</td><td width='5%'>Lbr.2</td><td width='5%'>Status</td><td>Keterangan</td></tr></thead>";
                echo "<tbody>";
                while ($aqrabsensipe = mysqli_fetch_array($qrabsensipe))
                    {
                    $counter2++;
                    $tglabs   = date_create($aqrabsensipe[4]);  
                    $tglabs   = date_format($tglabs,"d-m-Y"); 
                    $totlbrby = $totlbrby+$aqrabsensipe[7];
                    $tottelat = $tottelat+$aqrabsensipe[8];
                    $totlbrdt = $totlbrdt+$aqrabsensipe[9];
                    $totlbr1  = $totlbr1+$aqrabsensipe[10];
                    $totlbr2  = $totlbr2+$aqrabsensipe[11];
                    $tstabs   = $aqrabsensipe[12];
                    if (($tstabs=="Libur(S)") or ($tstabs=="Masuk") or ($tstabs=="Masuk(C)") or ($tstabs=="Paid") or ($tstabs=="Cuti") or ($tstabs=="Sakit"))
                        { $totpaid=$totpaid+1; }
                    if (($tstabs=="Alpha") or ($tstabs=="Unpaid"))
                        { $totunpaid=$totunpaid+1; }
                    echo "<tr height='20'>";
                    echo "<td align='right'>".$counter2." . </td>";
                    echo "<td>&nbsp ".$aqrabsensipe[1]."</td>";
                    echo "<td>&nbsp ".$aqrabsensipe[3]."</td>";
                    echo "<td>&nbsp ".$tglabs."</td>";
                    echo "<td>&nbsp ".$aqrabsensipe[5]."</td>";
                    echo "<td>&nbsp ".$aqrabsensipe[6]."</td>";
                    echo "<td align'right'>".$aqrabsensipe[7]." &nbsp</td>";
                    echo "<td align'right'>".$aqrabsensipe[8]." &nbsp</td>";
                    echo "<td align'right'>".$aqrabsensipe[9]." &nbsp</td>";
                    echo "<td align'right'>".$aqrabsensipe[10]." &nbsp</td>";
                    echo "<td align'right'>".$aqrabsensipe[11]." &nbsp</td>";
                    echo "<td>&nbsp ".$aqrabsensipe[12]."</td>";
                    echo "<td>&nbsp ".$aqrabsensipe[13]."</td>";
                    echo "</tr>";
                    }
                if ($tjabatan=="Driver")
                    { $totpaid=$totpaid+5; }
                echo "<tr class='h7'><td bgcolor='#FFCCCC'></td><td align='center' bgcolor='#FFCCCC'><b>Unpaid : ".$totunpaid."</b></td><td bgcolor='#FFCCCC'></td><td bgcolor='#FFCCCC'><b>Paid : ".$totpaid."</b></td><td bgcolor='#FFCCCC'></td><td align='right' bgcolor='#FFCCCC'><b>TOTAL = </b></td><td bgcolor='#FFCCCC'><b>".$totlbrby."</b></td><td bgcolor='#FFCCCC'><b>".$tottelat."</b></td><td bgcolor='#FFCCCC'><b>".$totlbrdt."</b></td><td bgcolor='#FFCCCC'><b>".$totlbr1."</b></td><td bgcolor='#FFCCCC'><b>".$totlbr2."</b></td><td bgcolor='#FFCCCC'></td><td bgcolor='#FFCCCC'></td></tr></tbody></table><br><br>";
                }
                echo "<input type='hidden' name='maxcount' value='$counter1'>";
            }
            echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
    ?>
        </div></form>
        <form method="post" action="../reports/rabsensipe.php" target="newwindow">
        <table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="50%"><button name="submit" type="submit" class="btn btn-info btn-lg btn-block">PRINT</button>
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
            if (isset($tperiode)) 
                { echo "<input type='hidden' name='tperiode' value='$tperiode'>"; }
            if (isset($tjenis)) 
                    { echo "<input type='hidden' name='tjenis' value='$tjenis'>"; }
        ?>
        </form></td><form method="post" action="../reports/rrinabsensipe.php" target="newwindow">
            <td><button name="submit" type="submit" class="btn btn-info btn-lg btn-block">PRINT RINCI</button>
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
                if (isset($tperiode)) 
                    { echo "<input type='hidden' name='tperiode' value='$tperiode'>"; }
            ?>
            </form></td></tr></table>
    <?php
            }
        else
            {
    ?>
            <div class="table-striped table-hover table-responsive">
                <table align="center" width="97%" border="1" bordercolor="#eeeeee" class="h9">
                    <thead class="btn-primary">
                        <tr>
                            <th width="3%">&nbsp No</th>
                            <th width="10%">&nbsp Periode</a></th>
                            <th width="5%">&nbsp ID</a></th>
                            <th width="12%">&nbsp Nama</a></th>
                            <th width="12%">&nbsp Jabatan</a></th>
                            <th width="7%">&nbsp Lokasi</a></th>
                            <th width="4%"> &nbsp Masuk</a></th>
                            <th width="5%"> &nbsp T.Masuk</a></th>
                            <th width="4%"> &nbsp Paid</a></th>
                            <th width="5%"> &nbsp Unpaid</a></th>
                            <th width="5%"> &nbsp Alpha</a></th>
                            <th width="4%"> &nbsp Cuti</a></th>
                            <th width="4%"> &nbsp Sakit</a></th>
                            <th width="5%"> &nbsp Telat</a></th>
                            <th width="5%"> &nbsp LemburDt</a></th>
                            <th width="5%"> &nbsp Lembur1</a></th>
                            <th width="5%"> &nbsp  &nbsp Lembur2</a></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $counter1 = 0;
                        if (isset($tperiode))
                            {
                            if (isset($keyword) and !empty($keyword)) 
                                { 
                                switch ($filter) {
                                    case 'kode':
                                        $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' and kode like '%$keyword%' order by kode asc;"); 
                                        break;

                                    case 'nama':
                                        $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' and nama like '%$keyword%' order by nama asc;"); 
                                        break;

                                    case 'jabatan':
                                        $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' and jabatan like '%$keyword%' order by jabatan asc;"); 
                                        break;

                                    case 'lokasi':
                                        $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' and lokasi like '%$keyword%' order by lokasi asc;"); 
                                        break;
                                    }
                                }
                            else { $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' order by nama asc;"); }
                            }
                        else
                            { $qabsensipe = $connection->query("select * from absensipe order by idxpe desc limit 150;"); }
                        if (mysqli_num_rows($qabsensipe) > 0)
                            {
                            while ($aqabsensipe = mysqli_fetch_array($qabsensipe))
                                {
                                $counter1 = $counter1+1;
                                echo "<tr>";
                                echo "<td align='right'>".$counter1." &nbsp<input type='hidden' name='tidxpe[$counter1]' value='$aqabsensipe[0]'></td>";
                                echo "<td>&nbsp ".$aqabsensipe[1]."</td>";
                                echo "<td>&nbsp ".$aqabsensipe[2]."</td>";
                                echo "<td>&nbsp ".$aqabsensipe[3]."</td>";
                                echo "<td>&nbsp ".$aqabsensipe[4]."</td>";
                                echo "<td>&nbsp ".$aqabsensipe[5]."</td>";
                                echo "<td>&nbsp ".$aqabsensipe[6]."</td>";
                                if ($aqabsensipe[7]>0)
                                    { echo "<td bgcolor='#ff9999'>&nbsp ".$aqabsensipe[7]."</td>"; }
                                else
                                    { echo "<td>&nbsp ".$aqabsensipe[7]."</td>"; }
                                echo "<td>&nbsp ".$aqabsensipe[8]."</td>";
                                if ($aqabsensipe[9]>0)
                                    { echo "<td bgcolor='#ffaaaa'>&nbsp ".$aqabsensipe[9]."</td>"; }
                                else
                                    { echo "<td>&nbsp ".$aqabsensipe[9]."</td>"; }
                                if ($aqabsensipe[10]>0)
                                    { echo "<td bgcolor='#ffbbbb'>&nbsp ".$aqabsensipe[10]."</td>"; }
                                else
                                    { echo "<td>&nbsp ".$aqabsensipe[10]."</td>"; }
                                if ($aqabsensipe[11]>0)
                                    { echo "<td bgcolor='#ffcccc'>&nbsp ".$aqabsensipe[11]."</td>"; }
                                else
                                    { echo "<td>&nbsp ".$aqabsensipe[11]."</td>"; }
                                if ($aqabsensipe[12]>0)
                                    { echo "<td bgcolor='#ffdddd'>&nbsp ".$aqabsensipe[12]."</td>"; }
                                else
                                    { echo "<td>&nbsp ".$aqabsensipe[12]."</td>"; }
                                if ($aqabsensipe[13]>0)
                                    { echo "<td bgcolor='#ffbbbb' align='right'>&nbsp ".$aqabsensipe[13]." mnt.</td>"; }
                                else
                                    { echo "<td align='right'>&nbsp ".$aqabsensipe[13]." mnt.</td>"; }
                                if ($aqabsensipe[14]>0)
                                    { echo "<td bgcolor='#ddffdd' align='right'>&nbsp ".$aqabsensipe[14]." mnt</td>"; }
                                else
                                    { echo "<td align='right'>&nbsp ".$aqabsensipe[14]." mnt</td>"; }
                                if ($aqabsensipe[15]>0)
                                    { echo "<td bgcolor='#ccffcc' align='right'>&nbsp ".$aqabsensipe[15]." mnt</td>"; }
                                else
                                    { echo "<td align='right'>&nbsp ".$aqabsensipe[15]." mnt</td>"; }
                                if ($aqabsensipe[16]>0)
                                    { echo "<td bgcolor='#ccddcc' align='right'>&nbsp ".$aqabsensipe[16]." mnt</td>"; }
                                else
                                    { echo "<td align='right'>&nbsp ".$aqabsensipe[16]." mnt</td>"; }
                                echo "</tr>";
                                }
                            echo "<input type='hidden' name='maxcount' value='$counter1'>";
                            }
                        echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
                    ?>
                    </tbody>
                </table>
            </div></form><form method="post" action="../reports/rabsensipe.php" target="newwindow">
            <table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="50%"><button name="submit" type="submit" class="btn btn-info btn-lg btn-block">PRINT</button>
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
                if (isset($tperiode)) 
                    { echo "<input type='hidden' name='tperiode' value='$tperiode'>"; }
            ?>
            </form><form method="post" action="../reports/rrinabsensipe.php" target="newwindow">
            <td><button name="submit" type="submit" class="btn btn-info btn-lg btn-block">PRINT RINCI</button>
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
                if (isset($tperiode)) 
                    { echo "<input type='hidden' name='tperiode' value='$tperiode'>"; }
            ?>
            </form></td></tr></table>
            <?php
            }
            ?>
</body>
</html>