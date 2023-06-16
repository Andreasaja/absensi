<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../supports/criptpertext.php');
    include ('../desain/reportlinkstyle.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>REPORT RINCIAN SLIP GAJI KARYAWAN</title>
</head>
<body>
<?php
    if (isset(($tidxsg)))
        { $qslipgaji   = $connection->query("select * from slipgaji where idxsg = '$tidxsg';"); }
    else
        { $qslipgaji   = $connection->query("select * from slipgaji order by idxsg desc limit 1;"); }
    if  ($aqslipgaji   = mysqli_fetch_array($qslipgaji))
        {
        $tgapok        = intval(criptper_text(2,$aqslipgaji[7]));
        $tgapokhr      = intval(criptper_text(2,$aqslipgaji[8]));
        $tumaperhr     = intval(criptper_text(2,$aqslipgaji[9]));
        $tutrperhr     = intval(criptper_text(2,$aqslipgaji[10]));
        $thrkerja      = intval(criptper_text(2,$aqslipgaji[11]));
        $tlembur1      = intval(criptper_text(2,$aqslipgaji[12]));
        $tlembur2      = intval(criptper_text(2,$aqslipgaji[13]));
        $tuma          = intval(criptper_text(2,$aqslipgaji[14]));
        $tutransport   = intval(criptper_text(2,$aqslipgaji[15]));
        $ttunkeh       = intval(criptper_text(2,$aqslipgaji[16]));
        $ttunlainnya   = intval(criptper_text(2,$aqslipgaji[17]));
        $tulembur      = intval(criptper_text(2,$aqslipgaji[18]));
        $tnomfreetepe1 = intval(criptper_text(2,$aqslipgaji[20]));
        $tnomfreetepe2 = intval(criptper_text(2,$aqslipgaji[22]));
        $tnomfreetepe3 = intval(criptper_text(2,$aqslipgaji[24]));
        $tnomfreetepe4 = intval(criptper_text(2,$aqslipgaji[26]));
        $tnomfreetepe5 = intval(criptper_text(2,$aqslipgaji[28]));
        $tnomfreetepe6 = intval(criptper_text(2,$aqslipgaji[30]));
        $tbpjstk       = intval(criptper_text(2,$aqslipgaji[31]));
        $tbpjsks       = intval(criptper_text(2,$aqslipgaji[32]));
        $tpph21        = intval(criptper_text(2,$aqslipgaji[33]));
        $tpinjaman     = intval(criptper_text(2,$aqslipgaji[34]));
        $tpotunle      = intval(criptper_text(2,$aqslipgaji[35]));
        $tterlambat    = intval(criptper_text(2,$aqslipgaji[36]));
        $tnomfreetepo1 = intval(criptper_text(2,$aqslipgaji[38]));
        $tnomfreetepo2 = intval(criptper_text(2,$aqslipgaji[40]));
        $ttotal        = intval(criptper_text(2,$aqslipgaji[41]));
        $totalpen      = $tgapok+$tuma+$tutransport+$ttunkeh+$ttunlainnya+$tulembur+$tnomfreetepe1+$tnomfreetepe2+$tnomfreetepe3+$tnomfreetepe4+$tnomfreetepe5+$tnomfreetepe6;
        $totalpot      = $tbpjstk+$tbpjsks+$tpph21+$tpinjaman+$tpotunle+$tterlambat+$tnomfreetepo1+$tnomfreetepo2;
        $terima        = $ttotal;
        echo "<br>";
        echo "<table align='center' width='95%' border='1' bordercolor='#666666'><tr><td>";
        echo "<table align='center' width='95%' border='0'>";
        echo "<tr height='80'><td align='center'><h3>SLIP GAJI KARYAWAN</h3></td></tr>";
        echo "<tr><td>";
        echo "<table width='50%' border='0' bordercolor='#eeeeee' class='h5'>";
        echo "<tr><td width='32%'>Nama</td><td width='5%'>:</td><td>".$aqslipgaji[3]."</td></tr>";
        echo "<tr><td>Perusahaan</td><td>:</td><td>".$aqslipgaji[4]."</td></tr>";
        echo "<tr><td>Periode</td><td>:</td><td>".$aqslipgaji[1]."</td></tr>";
        echo "</table>";
        echo "</td></tr>";
        echo "<tr><td><table align='center' width='100%' border='1' bordercolor='#eeeeee' class='h7'><tr><td width='27%' valign='top'>";
        echo "<table align='center' width='95%' border='0'><tr><td width='60%'></td><td width='2%'></td><td align='right'><u><h5>DATA</h5></u></td></tr>";
        echo "<tr><td>Gaji Pokok</td><td>:</td><td align='right'>".number_format($tgapok,0,',','.')."</td></tr>";
        echo "<tr><td>Gaji Pokok/hr</td><td>:</td><td align='right'>".number_format($tgapokhr,0,',','.')."</td></tr>";
        echo "<tr><td>Uang Makan/hari</td><td>:</td><td align='right'>".number_format($tumaperhr,0,',','.')."</td></tr>";
        echo "<tr><td>Transport/hari</td><td>:</td><td align='right'>".number_format($tutrperhr,0,',','.')."</td></tr>";
        echo "<tr><td>Hari Kerja</td><td>:</td><td align='right'>".number_format($thrkerja,0,',','.')."</td></tr>";
        echo "<tr><td>Lembur 1</td><td>:</td><td align='right'>".number_format($tlembur1,0,',','.')."</td></tr>";
        echo "<tr><td>Lembur 2</td><td>:</td><td align='right'>".number_format($tlembur1,0,',','.')."</td></tr>";
        echo "</table></td>";
        echo "<td width='40%' valign='top'><table align='center' width='95%' border='0'>";
        echo "<tr><td width='58%'></td><td width='2%'></td><td align='right'><u><h5>PENDAPATAN</h5></u></td></tr>";
        echo "<tr><td>Gaji Pokok</td><td>:</td><td align='right'>".number_format($tgapok,0,',','.')."</td></tr>";
        echo "<tr><td>Uang Makan</td><td>:</td><td align='right'>".number_format($tuma,0,',','.')."</td></tr>";
        echo "<tr><td>Uang Transport</td><td>:</td><td align='right'>".number_format($tutransport,0,',','.')."</td></tr>";
        echo "<tr><td>Tunjangan Kehadiran</td><td>:</td><td align='right'>".number_format($ttunkeh,0,',','.')."</td></tr>";
        echo "<tr><td>Tunjangan lain-lain</td><td>:</td><td align='right'>".number_format($ttunlainnya,0,',','.')."</td></tr>";
        echo "<tr><td>Uang Lembur</td><td>:</td><td align='right'>".number_format($tulembur,0,',','.')."</td></tr>";
        if ($tnomfreetepe1>0)
            { echo "<tr><td>".$aqslipgaji[19]."</td><td>:</td><td align='right'>".number_format($tnomfreetepe1,0,',','.')."</td></tr>"; }
        if ($tnomfreetepe2>0)
            { echo "<tr><td>".$aqslipgaji[21]."</td><td>:</td><td align='right'>".number_format($tnomfreetepe2,0,',','.')."</td></tr>"; }
        if ($tnomfreetepe3>0)
            { echo "<tr><td>".$aqslipgaji[23]."</td><td>:</td><td align='right'>".number_format($tnomfreetepe3,0,',','.')."</td></tr>"; }
        if ($tnomfreetepe4>0)
            { echo "<tr><td>".$aqslipgaji[25]."</td><td>:</td><td align='right'>".number_format($tnomfreetepe4,0,',','.')."</td></tr>"; }
        if ($tnomfreetepe5>0)
            { echo "<tr><td>".$aqslipgaji[27]."</td><td>:</td><td align='right'>".number_format($tnomfreetepe5,0,',','.')."</td></tr>"; }
        if ($tnomfreetepe6>0)
            { echo "<tr><td>".$aqslipgaji[29]."</td><td>:</td><td align='right'>".number_format($tnomfreetepe6,0,',','.')."</td></tr>"; }
        echo "<tr><td><b>Total pendapatan</b></td><td><b>:</b></td><td align='right'><b>".number_format($totalpen,0,',','.')."</b></td></tr>";
        echo "</table></td>";
        echo "<td valign='top'><table align='center' width='95%' border='0'>";
        echo "<tr><td width='75%'></td><td width='2%'></td><td align='right'><u><h5>POTONGAN</h5></u></td></tr>";
        echo "<tr><td>BPJS - TK</td><td>:</td><td align='right'>".number_format($tbpjstk,0,',','.')."</td></tr>";
        echo "<tr><td>BPJS - KS</td><td>:</td><td align='right'>".number_format($tbpjsks,0,',','.')."</td></tr>";
        echo "<tr><td>PPH 21</td><td>:</td><td align='right'>".number_format($tpph21,0,',','.')."</td></tr>";
        echo "<tr><td>Pinjaman</td><td>:</td><td align='right'>".number_format($tpinjaman,0,',','.')."</td></tr>";
        echo "<tr><td>Pot.Unpaid/Leave</td><td>:</td><td align='right'>".number_format($tpotunle,0,',','.')."</td></tr>";
        echo "<tr><td>Terlambat</td><td>:</td><td align='right'>".number_format($tterlambat,0,',','.')."</td></tr>";
        if ($tnomfreetepo1>0)
            { echo "<tr><td>".$aqslipgaji[37]."</td><td>:</td><td align='right'>".number_format($tnomfreetepo1,0,',','.')."</td></tr>"; }
        if ($tnomfreetepo2>0)
            { echo "<tr><td>".$aqslipgaji[39]."</td><td>:</td><td align='right'>".number_format($tnomfreetepo2,0,',','.')."</td></tr>"; }
        echo "<tr><td><b>Total potongan</b></td><td><b>:</b></td><td align='right'><b>".number_format($totalpot,0,',','.')."</b></td></tr>";
        echo "</table>";
        echo "</td></tr></table>";
        echo "</td></tr>";
        echo "<tr height='100'><td align='center'><u><h5>TOTAL TERIMA = ".number_format($terima,0,',','.')."</h5></u></td></tr>";
        echo "</td></tr>";
        echo "</table>";
        echo "</td></tr>";
        echo "</table>";
        }
?>
</body>
</html>                                                                 
