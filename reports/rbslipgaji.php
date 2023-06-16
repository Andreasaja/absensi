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
<title>REPORT BROWSE SLIP GAJI PERIODIKAL</title>
</head>
<body>
    <br><center><h2>REPORT BROWSE SLIP GAJI PERIODIKAL</h2></center><br>
    <?php
        $counter1 = 0;
        if (isset($fperiode))
            {
            if (isset($keyword) and !empty($keyword)) 
                { 
                switch ($filter) {
                    case 'kode':
                    $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and kode like '$keyword%' order by perusahaan,nama asc;"); 
                    break;

                    case 'nama':
                    $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and nama like '%$keyword%' order by perusahaan,nama asc;"); 
                    break;

                    case 'perusahaan':
                    $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and perusahaan = '$keyword' order by tglabs,jabatan asc;"); 
                    break;
                            
                    case 'email':
                    $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and email like '%$keyword%' order by perusahaan,nama asc;"); 
                    break;

                    case 'nomorhp':
                    $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and nomorhp like '%$keyword%' order by perusahaan,nama asc;"); 
                    break;
                    }
                }
            else { $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' order by perusahaan,nama asc;"); }
            }
        else
            { $qslipgaji = $connection->query("select * from slipgaji order by perusahaan,nama asc limit 100;"); }
        echo "<table align='center' width='97%' border='1' bordercolor='#eeeeee' class='h9'><tr><td>";
        if (mysqli_num_rows($qslipgaji) > 0)
            {
            while ($aqslipgaji = mysqli_fetch_array($qslipgaji))
                {
                $counter1 = $counter1+1;
                $tgapok        = intval(criptper_text(2,$aqslipgaji[7]));
                $tgapokhr      = intval(criptper_text(2,$aqslipgaji[8]));
                $tumaperhr     = intval(criptper_text(2,$aqslipgaji[9]));
                $tutrperhr     = intval(criptper_text(2,$aqslipgaji[10]));
                $thrkerja      = intval(criptper_text(2,$aqslipgaji[11]));
                $tlembur1      = intval(criptper_text(2,$aqslipgaji[12]));
                $tlembur2      = $aqslipgaji[13];
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
                //PERIODE,ID,NAMA,PERUSAHAAN,EMAIL,NOMORHP
                //1,2,3,4,5,6
                echo "<table border='0' bgcolor='#EEEEFF' class='h7' width='100%'><tr><td width='2%' align='right'>$counter1 . </td><td width='78%'>ID : $aqslipgaji[2] , &nbsp NAMA : $aqslipgaji[3], &nbsp Perusahaan : $aqslipgaji[4], &nbsp Email : $aqslipgaji[5], &nbsp Nomor Hp : $aqslipgaji[6] &nbsp</td><td width='20%' align='right'>Periode : ".$aqslipgaji[1]." &nbsp </td></tr></table>";

                echo "<table border='0' width='100%' class='h9'><tr><td width='2%'></td><td width='4%'>Data</td><td width='1%'>:</td><td width='8%'>Gapok. ".number_format($tgapok,0,',','.')."</td><td width='9%'>Gapok/hr. ".number_format($tgapokhr,0,',','.')."</td><td width='7%'>UM/hr. ".number_format($tumaperhr,0,',','.')."</td><td width='7%'>UT/hr. ".number_format($tutrperhr,0,',','.')."</td><td width='9%'>Hr.Kerja. ".$thrkerja."</td><td width='9%'>Lembur 1. ".$tlembur1."</td><td width='9%'>Lembur 2. ".$tlembur2."</td><td width='9%'></td><td width='9%'></td><td width='9%'></td><td></td></tr>";

                echo "<tr><td></td><td>Pendapatan<td>:</td></td><td>Uang Makan. ".number_format($tuma,0,',','.')."</td><td>Uang Transport. ".number_format($tutransport,0,',','.')."</td><td>Tun.Keh. ".number_format($ttunkeh,0,',','.')."</td><td>Tun.Lain. ".number_format($ttunlainnya,0,',','.')."</td><td>Uang Lembur. ".number_format($tulembur,0,',','.')."</td><td>".$aqslipgaji[19].". ".number_format($tnomfreetepe1,0,',','.')."</td><td>".$aqslipgaji[21].". ".number_format($tnomfreetepe2,0,',','.')."</td><td>".$aqslipgaji[23].". ".number_format($tnomfreetepe3,0,',','.')."</td><td>".$aqslipgaji[25].". ".number_format($tnomfreetepe4,0,',','.')."</td><td>".$aqslipgaji[27].". ".number_format($tnomfreetepe5,0,',','.')."</td><td>".$aqslipgaji[29].". ".number_format($tnomfreetepe6,0,',','.')."</td></tr>";

                echo "<tr><td></td><td>Potongan<td>:</td></td><td>BPJS-TK. ".number_format($tbpjstk,0,',','.')."</td><td>BPJS-KS. ".number_format($tbpjsks,0,',','.')."</td><td>PPH.21. ".number_format($tpph21,0,',','.')."</td><td>Pinjaman. ".number_format($tpinjaman,0,',','.')."</td><td>Pot.Unp/Lev. ".number_format($tpotunle,0,',','.')."</td><td>Terlambat. ".number_format($tterlambat,0,',','.')."</td><td>".$aqslipgaji[37].". ".number_format($tnomfreetepo1,0,',','.')."</td><td>".$aqslipgaji[39].". ".number_format($tnomfreetepo2,0,',','.')."</td><td></td><td></td><td></td></tr>";
                echo "<tr bgcolor='#FFEEEE' class='h7'><td></td><td>Terima<td>:</td><td>".number_format($ttotal,0,',','.')."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></table>";
                }
            echo "<input type='hidden' name='maxcount' value='$counter1'>";
            }
        echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
        echo "</td></tr></table>";
    ?>    
</body>
</html>                                                                 
